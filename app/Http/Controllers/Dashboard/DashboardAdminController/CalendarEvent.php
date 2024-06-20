<?php
namespace App\Http\Controllers\Dashboard\DashboardAdminController;

use DateTime;

class CalendarEvent
{
    public function show()
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
        return view('app_admin/calendar-events');
    }
    private function calculateWidth($start_date, $end_date)
    {
        $start = new DateTime($start_date);
        $end = new DateTime($end_date);
        $interval = $start->diff($end);
        return ($interval->days + 1) * 100;
    }
}