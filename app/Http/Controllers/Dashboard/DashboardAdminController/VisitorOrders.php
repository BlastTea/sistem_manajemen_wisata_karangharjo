<?php
namespace App\Http\Controllers\Dashboard\DashboardAdminController;

use DateTime;
use App\Providers\Auth;
use App\Models\Visitors;
use App\Providers\Route;
use App\Providers\Request;
use App\Models\TourPackage;
use App\Models\Transaction;
use App\Providers\Validator;
use App\Models\TransactionDetails;

class VisitorOrders
{
    // Section Controller Visitor
    public function show()
    {
        // Data tour paket
        $tourPackageData = $this->getDataTour();

        // Data order visitor
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
                'number-phone' => 'nullable|string|max:20',
                'asal-kab' => 'required|string|max:100',
                'email' => 'nullable|string|email|max:100',
                'name-paket' => 'required|string|max:100',
                'jumlah_tiket' => 'required|integer|min:1',
            ]);

            $packege_id = TourPackage::where('name', '=', $request->input('name-paket'))->first();

            if ($validator->fails() || !$packege_id) {
                return response()->json(['message' => $validator->errors(), 'package id' => 'not found'], 422);
            }


            $visitor = new Visitors();
            $visitor->visitor_name = $request->input('visitor-name');
            $visitor->email = $request->input('email');
            $visitor->telp = $request->input('number-phone');
            $visitor->region = $request->input('asal-kab');
            if (Auth::user()) {
                $visitor->user_id = Auth::user()->id;
            }
            $visitor->save();

            $newTransaction = new Transaction();
            $newTransaction->visitor_id = $visitor->id;
            $newTransaction->discount = 0;
            $newTransaction->status = 'invoice';
            $newTransaction->save();

            $newTransactionDetail = new TransactionDetails();
            $newTransactionDetail->transaction_id = $newTransaction->id;
            $newTransactionDetail->tour_package_id = $packege_id->id;
            $newTransactionDetail->name = $request->input('name-paket');
            $newTransactionDetail->price = $packege_id->price;
            $newTransactionDetail->amount_of_people = $request->input('jumlah_tiket');
            $newTransactionDetail->save();

            Route::redirect('dashboard/admin/visitor-orders');
        } catch (\Exception $e) {
            logError($e);
        }
    }

    private function getDataIndex()
    {
        try {
            $transactions = Transaction::all();

            // Mengubah format data sesuai kebutuhan
            $orders = array_map(function ($transaction) {
                // Mengambil detail order berdasarkan transaction_id
                $detail_order = TransactionDetails::where('transaction_id', '=', $transaction->id)->first();

                if (!$detail_order) {
                    throw new \Exception("Detail order not found for transaction ID: {$transaction->id}");
                }

                // Menghitung total tiket dari detail transaksi
                $total_tickets = $detail_order->amount_of_people;

                // Mengambil data pelanggan/visitor
                $visitor = Visitors::find($transaction->visitor_id);

                if (!$visitor) {
                    throw new \Exception("Visitor not found with ID: {$transaction->visitor_id}");
                }

                // Mengambil tipe paket berdasarkan tour_package_id
                $tipe_package = TourPackage::find($detail_order->tour_package_id);

                if (!$tipe_package) {
                    throw new \Exception("Tour package not found with ID: {$detail_order->tour_package_id}");
                }

                // Menghitung harga berdasarkan total tiket dan harga per tiket dari tipe paket
                $price = $total_tickets * $tipe_package->price;

                return [
                    'name' => $visitor->visitor_name,
                    'detail_order' => $detail_order,
                    'price' => 'IDR ' . number_format($price, 2),
                    'date' => isToday($transaction->created_at) ? formatDateTime($transaction->created_at, 'H:i') : formatDateTime($transaction->created_at, 'M d, Y'),
                    'status' => $transaction->status
                ];
            }, $transactions);

            return $orders;
        } catch (\Exception $e) {
            logError($e);
        }
    }

    private function getDataTour()
    {
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

        return $tourPackageData;
    }
}