<?php

namespace App\Http\Controllers;

use DateTime;
use App\Providers\Request;

class DashboardAdminController
{
    public function show(Request $request)
    {
        return view('app_admin/dashboard-admin');
    }

    public function showPakets(Request $request)
    {
        $list_paket = [
            ['name' => 'Free Package', 'image' => $_ENV['APP_URL'] . '/storage/images/background/IMG_0121.png', 'price' => '$0.00', 'expiration' => '7 days', 'visible' => true],
            ['name' => 'Basic Package', 'image' => $_ENV['APP_URL'] . '/storage/images/background/IMG_0122.png', 'price' => '$29.99', 'expiration' => '30 days', 'visible' => false],
            ['name' => 'Premium Package', 'image' => $_ENV['APP_URL'] . '/storage/images/background/IMG_0123.png', 'price' => '$99.99', 'expiration' => '90 days', 'visible' => true]
        ];

        return view('app_admin/paket', ['list_paket' => $list_paket]);
    }

    public function showInvoice(Request $request)
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