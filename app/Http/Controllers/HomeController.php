<?php

namespace App\Http\Controllers;

use App\Providers\Auth;
use App\Providers\Request;

class HomeController
{
    public function show()
    {
        // Set base URL dan range nomor gambar
        $baseUrl = storage_path('images/background/');
        $start = 121;
        $end = 130;

        $sliderItems = '';
        for ($i = $start; $i <= $end; $i++) {
            $imageSrc = $baseUrl . 'IMG_0' . $i . '.png';
            $sliderItems .= "<div class=\"relative h-screen bg-center bg-cover\" style=\"background-image: url('$imageSrc');\"></div>";
        }

        // Passing slider items to view
        return view('home', ['sliderItems' => $sliderItems, 'data' => Auth::user()]);
    }

    public function getData(Request $request)
    {
        $filter = $request->input('filter', 'day');

        $data = [
            'day' => [
                'categories' => ['Hour 1', 'Hour 2', 'Hour 3', 'Hour 4', 'Hour 5', 'Hour 6', 'Hour 7', 'Hour 8', 'Hour 9', 'Hour 10', 'Hour 11', 'Hour 12', 'Hour 13', 'Hour 14', 'Hour 15', 'Hour 16', 'Hour 17', 'Hour 18', 'Hour 19', 'Hour 20', 'Hour 21', 'Hour 22', 'Hour 23', 'Hour 24'],
                'productOne' => [2, 3, 5, 6, 7, 8, 9, 10, 15, 20, 25, 30, 22, 19, 17, 13, 12, 11, 10, 9, 8, 7, 6, 5],
                'productTwo' => [1, 2, 4, 5, 6, 7, 8, 9, 14, 19, 24, 29, 21, 18, 16, 12, 11, 10, 9, 8, 7, 6, 5, 4]
            ],
            'week' => [
                'categories' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                'productOne' => [70, 80, 90, 100, 110, 120, 130],
                'productTwo' => [60, 70, 80, 90, 100, 110, 120]
            ],
            'month' => [
                'categories' => ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                'productOne' => [300, 400, 500, 600],
                'productTwo' => [250, 350, 450, 550]
            ]
        ];

        $response = isset($data[$filter]) ? $data[$filter] : $data['day'];

        return response()->json($response);
    }
}