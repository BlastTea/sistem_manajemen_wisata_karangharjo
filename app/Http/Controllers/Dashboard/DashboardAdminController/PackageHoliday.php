<?php
namespace App\Http\Controllers\Dashboard\DashboardAdminController;

use App\Models\Image;
use App\Providers\Route;
use App\Providers\Request;
use App\Models\TourPackage;
use App\Providers\Validator;

class PackageHoliday
{
    public function show()
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
                $packageData['image'] = storage_path($image->image_url);
            } else {
                $packageData['image'] = ''; // Atau berikan default jika tidak ada gambar
            }

            // Masukkan data paket tur ke dalam array $list_paket
            $list_paket[] = $packageData;
        }

        return view('app_admin/holiday-packages', ['list_paket' => $list_paket]);
    }

    public function add(Request $request)
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


            redirect('/dashboard/admin/holiday-packages');

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add Tour Package. ' . $e->getMessage()], 500);
        }
    }

    // Method untuk menyimpan perubahan dari form edit
    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                redirect('dashboard/admin/holiday-packages');
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
            redirect('dashboard/admin/holiday-packages');

        } catch (\Exception $e) {
            // Handle jika terjadi exception
            redirect('dashboard/admin/holiday-packages');
            // return redirect()->back()->with('error', 'Failed to update Tour Package. ' . $e->getMessage());
        }
    }

    public function delete(Request $request)
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
}