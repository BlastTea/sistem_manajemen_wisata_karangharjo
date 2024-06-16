<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Image;
use App\Providers\Auth;
use App\Providers\Route;
use App\Providers\Request;
use App\Models\TourPackage;
use App\Providers\Validator;

class DashboardAdminController
{
    public function show(Request $request)
    {
        $user = Auth::user();
        if ($user->role == 'admin'){
            return view('app_admin/dashboard-admin');
        }
        return Route::redirect('home');
    }

    public function showPakets()
    {
        // Mengambil semua paket tur beserta relasi gambar
        $tourPackages = TourPackage::all();

        // Menyiapkan array untuk menampung data yang diformat
        $list_paket = [];

        foreach ($tourPackages as $package) {
            // Menyiapkan data untuk setiap paket tur
            $packageData = [
                'id' => $package->id,
                'name' => $package->name,
                'price' => $package->price,
                'expiration' => '2 days',
                'visible' => true,
            ];

            // Ambil gambar pertama dari relasi images jika ada
            $image = Image::where('tour_package_id', '=', $package->id)->first();

            if ($image) {
                // Sesuaikan path URL sesuai dengan struktur direktori yang benar
                $packageData['image'] = $_ENV['APP_URL'] . '/storage/images/background/' . $image->image_url;
            } else {
                $packageData['image'] = ''; // Atau berikan default jika tidak ada gambar
            }

            // Masukkan data paket tur ke dalam array $list_paket
            $list_paket[] = $packageData;
        }

        return view('app_admin/paket', ['list_paket' => $list_paket]);
    }

    public function addPakets(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'harga' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cek validasi
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        try {
            // Buat instance TourPackage
            $tourPackage = new TourPackage();
            $tourPackage->name = $request->input('nama');
            $tourPackage->price = $request->input('harga');
            $tourPackage->description = $request->input('deskripsi');

            // // Tangani upload gambar jika ada
            // if ($request->hasFile('gambar')) {
            //     $image = $request->file('gambar');
            //     $imageName = time() . '.' . $image->getClientOriginalExtension();

            //     // Ambil direktori penyimpanan dari .env
            //     $storagePath = $_ENV['APP_STORAGE_PATH'] ?? 'storage/images/';
            //     $image->move($storagePath, $imageName);

            //     // Simpan URL gambar ke database
            //     $tourPackage->image_url = $storagePath . $imageName;
            // }

            // Simpan data tour package
            $tourPackage->save();


            Route::redirect('/dashboard/paket');

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add Tour Package. ' . $e->getMessage()], 500);
        }
    }

    // Method untuk menyimpan perubahan dari form edit
    public function updatePakets(Request $request, $id)
    {
        echo ('masuk kok ke server');
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                Route::redirect('dashboard/paket');
            }

            // Cari paket wisata yang akan diupdate
            $tourPackage = TourPackage::find($id);

            if (!$tourPackage) {
                return response()->json(['error' => 'Tour Package not found'], 404);
            }

            // Update data paket wisata
            $tourPackage->name = $request->input('name');
            $tourPackage->price = $request->input('price');
            $tourPackage->description = $request->input('description');

            // Jika ada upload gambar baru, proses gambar
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/background', $imageName); // Simpan gambar di storage

                // Cari atau buat relasi gambar untuk paket wisata ini
                $imageInstance = new Image();
                $imageInstance->tour_package_id = $tourPackage->id;
                $imageInstance->image_url = $imageName;
                $imageInstance->save();
            }

            // Simpan perubahan
            $tourPackage->save();

            // Redirect dengan pesan sukses
            Route::redirect('dashboard/paket');

        } catch (\Exception $e) {
            // Handle jika terjadi exception
            Route::redirect('dashboard/paket');
            // return redirect()->back()->with('error', 'Failed to update Tour Package. ' . $e->getMessage());
        }
    }

    public function deletePaket(Request $request)
    {
        try {
            $id = $request->input('id');
            $tourPackage = TourPackage::find($id);

            if (!$tourPackage) {
                return response()->json(['message' => 'Tour Package not found.'], 404);
            }

            // Hapus relasi terkait, misalnya jika ada gambar, video, atau layanan yang terhubung
            $tourPackage->images()->delete();
            $tourPackage->videos()->delete();
            $tourPackage->services()->delete();
            $tourPackage->transactionDetails()->delete();

            // Hapus tour package
            $tourPackage->delete();

            return response()->json(['message' => 'Tour Package deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete Tour Package. ' . $e->getMessage()], 500);
        }
    }


    public function showInvoice()
    {
        $orders = [
            ['name' => 'Free Package', 'price' => '$0.00', 'date' => 'Jan 13, 2023', 'status' => 'Paid'],
            ['name' => 'Basic Package', 'price' => '$19.99', 'date' => 'Feb 20, 2023', 'status' => 'Pending']
        ];
        return view('app_admin/pesanan', ['orders' => $orders]);
    }

    public function showCalendar()
    {
        // $events = [
        //     1 => ['Redesign Website', '1 Dec - 2 Dec'],
        //     25 => ['App Design', '25 Dec - 27 Dec']
        // ];

        // $calendarData = [];
        // for ($i = 0; $i < 5; $i++) {
        //     $week = [];
        //     for ($j = 1; $j <= 7; $j++) {
        //         $day = $i * 7 + $j;
        //         $dayData = ['day' => $day, 'event' => null];
        //         if (isset($events[$day])) {
        //             $event = $events[$day];
        //             $start_date = "$day Dec";
        //             $width = $this->calculateWidth($start_date, $event[1]);
        //             $dayData['event'] = ['name' => $event[0], 'date' => $event[1], 'width' => $width];
        //         }
        //         $week[] = $dayData;
        //     }
        //     $calendarData[] = $week;
        // }

        // Passing data kalender ke view
        // return view('app_admin/calender', ['calendarData' => $calendarData]);
        return view('app_admin/calender');
    }

    private function calculateWidth($start_date, $end_date)
    {
        $start = new DateTime($start_date);
        $end = new DateTime($end_date);
        $interval = $start->diff($end);
        return ($interval->days + 1) * 100;
    }
}