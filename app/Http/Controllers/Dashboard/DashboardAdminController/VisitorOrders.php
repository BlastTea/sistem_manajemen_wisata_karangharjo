<?php
namespace App\Http\Controllers\Dashboard\DashboardAdminController;

use App\Providers\Auth;
use App\Models\Visitors;
use App\Providers\Route;
use App\Providers\Request;
use App\Models\TourPackage;
use App\Models\Transaction;
use App\Providers\Validator;
use App\Models\TransactionDetail;

class VisitorOrders
{
    // Section Controller Visitor
    public function show()
    {
        // Mengambil semua paket tur menggunakan model TourPackage
        $tourPackages = TourPackage::all();

        // Transformasi data untuk disiapkan ke dalam format yang diinginkan
        $tourPackageData = array_map(function ($package) {
            return [
                'id' => $package->id,
                'name' => $package->name,
                'price' => $package->price,
                'description' => $package->description,
                'created_at' => $package->created_at,
                'updated_at' => $package->updated_at
            ];
        }, $tourPackages);

        // Ambil data lain yang mungkin diperlukan
        $orders = $this->getDataIndex();

        // Kirimkan data ke view
        return view('app_admin/visitor-orders', [
            'orders' => $orders,
            'tour_packages' => $tourPackageData,
        ]);
    }


    public function add(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'visitor-name' => 'required|string|max:50',
                'number-phone' => 'nullable|numeric|digits_between:1,13',
                'asal-kab' => 'required|string|max:13',
                'email' => 'nullable|string|email|max:100',
                'name-paket' => 'required|string|max:100',
                'jumlah_tiket' => 'required|integer|min:1',
            ]);

            $packege_id = TourPackage::where('name', '=', $request->input('name-paket'))->first();

            if ($validator->fails() || !$packege_id) {
                return response()->json(['message' => $validator->errors(), 'package id' => 'not found'], 422);
            }

            $user_id = 0;
            if (!Auth::user()) {
                $user_id = Auth::user()->id;
            }

            $visitor = new Visitors();
            $visitor->visitor_name = $request->input('visitor-name');
            $visitor->email = $request->input('email');
            $visitor->telp = $request->input('number-phone');
            $visitor->region = $request->input('asal-kab');
            $visitor->user_id = $user_id;
            $visitor->save();

            $newTransaction = new Transaction();
            $newTransaction->visitor_id = $visitor->id;
            $newTransaction->discount = 0;
            $newTransaction->status = 'invoice';
            $newTransaction->save();

            $newTransactionDetail = new TransactionDetail();
            $newTransactionDetail->transaction_id = $newTransaction->id;
            $newTransactionDetail->tour_package_id = $packege_id->id;
            $newTransactionDetail->name = $request->input('name-paket');
            $newTransactionDetail->price = $packege_id->price;
            $newTransactionDetail->amount_of_people = $request->input('jumlah_tiket');
            $newTransactionDetail->save();

            Route::redirect('dashboard/admin/visitor-orders');
        } catch (\Exception $e) {
            logError(new \Exception('error in add VisitorOrders.php, ' . $e));
        }
    }

    private function getDataIndex()
    {
        $orders = [
            ['name' => 'Free Package', 'price' => '$0.00', 'date' => 'Jan 13, 2023', 'status' => 'Paid'],
            ['name' => 'Basic Package', 'price' => '$19.99', 'date' => 'Feb 20, 2023', 'status' => 'Pending']
        ];

        return $orders;
    }
}