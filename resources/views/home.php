<?php
// Set base URL dan range nomor gambar
$baseUrl = $_ENV['APP_URL'] . '/storage/images/background/';
$start = 121;
$end = 130;

$sliderItems = '';
for ($i = $start; $i <= $end; $i++) {
    $imageSrc = $baseUrl . 'IMG_0' . $i . '.png';
    $sliderItems .= "<div class=\"relative h-screen bg-center bg-cover\" style=\"background-image: url('$imageSrc');\"></div>";
}
?>


<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <title>Wisata Desa Karangharjo | Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] . '/css/app.css' ?>">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Style -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap");

        body {
            font-family: "Montserrat", sans-serif;
            color: #fff;
            overflow-x: hidden;
        }

        .bg-overlay {
            background: rgba(0, 0, 0, 0.5);
        }

        .btn-secondary {
            @apply bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700;
        }

        .btn-primary {
            @apply bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700;
        }

        .outline-icon {
            @apply border border-gray-300 text-gray-300 hover:border-white hover:text-white;
        }

        /* Adjust Owl Carousel */
        .owl-carousel .owl-item img {
            width: 100%;
            height: auto;
        }

        .navbar-transition {
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .bg-dark {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .bg-light {
            background-color: white;
        }
    </style>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            const main_slider = $("#main-slider");
            main_slider.owlCarousel({
                rtl: false,
                loop: true,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000, // Durasi slide
                autoplaySpeed: 1000, // Kecepatan transisi otomatis
                smartSpeed: 1000, // Kecepatan transisi manual
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    }
                }
            });
        });
    </script>
</head>

<body>
    <nav class="fixed top-0 left-0 right-0 z-50 transition navbar navbar-transition bg-dark bg-opacity-10">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Item 1</a></li>
                    <li tabindex="0">
                        <a class="justify-between">
                            Parent
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <ul class="p-2">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </li>
                    <li><a>Item 3</a></li>
                </ul>
            </div>
            <a class="text-xl btn btn-ghost">daisyUI</a>
        </div>
        <div class="hidden navbar-end lg:flex">
            <ul class="px-1 menu menu-horizontal">
                <li><a>Item 1</a></li>
                <li tabindex="0">
                    <details>
                        <summary>Parent</summary>
                        <ul class="p-2">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </details>
                </li>
                <li><a>Item 3</a></li>
            </ul>
        </div>
    </nav>

    <section>
        <div id="main-slider" class="relative z-0 owl-carousel owl-theme">
            <?= $sliderItems ?>
        </div>

        <div class="absolute top-0 z-30">
            <div class="grid h-screen grid-cols-1 px-3 pt-95 bg-overlay lg:grid-cols-2 md:px-4 lg:px-8">
                <div class="flex flex-col gap-5 text-white md:gap-8">
                    <div class="flex flex-col gap-4">
                        <h2 class="text-xl font-semibold md:text-3xl lg:text-4xl">Selamat Datang di Rumah Pintar
                            Karangharjo, Jember</h2>
                        <p>
                            Kami dengan senang hati menyambut Anda di Rumah Pintar Karangharjo, destinasi wisata edukasi
                            yang menawarkan pengalaman unik dan menarik di Jember. Temukan berbagai kegiatan yang
                            menginspirasi, edukatif, dan menyenangkan bagi seluruh keluarga. Dari pameran interaktif
                            hingga workshop kreatif, kami memiliki sesuatu untuk semua orang.
                        </p>
                        <div>
                            <div class="flex gap-3 mb-10">
                                <p><strong class="font-bold">Buka</strong> 08:00 - 17:00</p>
                                <p><strong class="font-bold">Lokasi:</strong> Desa Karangharjo, Jember</p>
                            </div>
                            <div class="flex gap-3 md:ml-auto">
                                <a href="single-video.html" class="btn btn-secondary">Lihat Aktivitas <i
                                        class="pl-2 fas fa-play"></i></a>
                                <button class="btn btn-primary">Pesan Paket <i class="pl-2 fas fa-plus"></i></button>
                                <button
                                    class="flex items-center justify-center w-10 h-10 border border-gray-300 rounded-full outline-icon">
                                    <i class="fas fa-share-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Content -->
    </section>


    <section class="z-50 h-screen bg-blue-500">
        <div class="container flex items-center justify-center h-full mx-auto">
            <h1 class="text-4xl text-white">Welcome to Hero Section</h1>
        </div>
    </section>

    <section class="h-screen bg-gray-100 content">
        <div class="container flex items-center justify-center h-full mx-auto">
            <h2 class="text-2xl text-gray-800">Content Section</h2>
        </div>
    </section>
</body>

</html>