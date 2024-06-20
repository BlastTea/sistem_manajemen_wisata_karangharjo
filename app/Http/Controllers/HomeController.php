<?php

namespace App\Http\Controllers;

use App\Providers\Auth;

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
}