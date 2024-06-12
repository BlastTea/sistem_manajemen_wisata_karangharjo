<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <title>Wisata Desa Karangharjo | Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] . '/css/homepage.css' ?>">

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
            }); visu
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
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-gray-700 rounded-box w-52 font-medium">
                    <li><a>Home</a></li>
                    <li><a>Services</a></li>
                    <li><a>Ticket</a></li>
                    <li><a>About Us</a></li>
                    <div class="btn btn-info">Masuk</div>
                </ul>
            </div>
            <a class="text-xl btn btn-ghost">Rumah Pintar</a>
        </div>
        <div class="hidden navbar-end lg:flex">
            <ul class="px-1 menu menu-horizontal font-medium">
                <li><a>Home</a></li>
                <li><a>Services</a></li>
                <li><a>Ticket</a></li>
                <li><a>About Us</a></li>
            </ul>
            <div class="btn btn-info">Masuk</div>
        </div>
    </nav>

    <!-- Start Content -->
    <section>
        <div class="absolute z-30">
            <div class="grid h-screen grid-cols-1 px-3 pt-95 bg-overlay lg:grid-cols-2 md:px-4 lg:px-8">
                <div class="flex flex-col gap-5 text-white md:gap-8">
                    <div class="flex flex-col gap-4 mt-72">
                        <h2 class="text-xl font-semibold md:text-3xl lg:text-4xl">Selamat Datang di Rumah Pintar
                            Karangharjo, Jember</h2>
                        <p>
                            Kami dengan senang hati menyambut Anda di Rumah Pintar
                            Karangharjo, destinasi wisata edukasi yang menawarkan pengalaman unik dan menarik di
                            Jember.
                            <span class="hidden lg:block"> Temukan berbagai kegiatan
                                yang menginspirasi, edukatif, dan menyenangkan bagi seluruh keluarga. Dari pameran
                                interaktif
                                hingga workshop kreatif, kami memiliki sesuatu untuk semua orang.</span>
                        </p>
                        <div>
                            <div class="grid grid-cols-1 mt-5 mb-10">
                                <p><strong class="font-bold">Buka</strong> 08:00 - 17:00</p>
                                <p><strong class="font-bold">Lokasi:</strong> Desa Karangharjo, Jember</p>
                            </div>
                            <div class="flex gap-3 md:ml-auto">
                                <a href="#" class="btn btn-secondary">Lihat Aktivitas <i
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
        <div id="main-slider" class="relative z-0 owl-carousel owl-theme bg-cover">
            <?= $sliderItems ?>
        </div>
    </section>
    <!-- End Content -->

    <!-- Start Section -->
    <section class="container mx-auto my-8 h-auto">
        <div class="text-center mb-8 mt-32">
            <h1 class="font-bold text-4xl text-green-600">
                Layanan Rumah Pintar
            </h1>
            <p class="text-lg text-gray-500">Mengenal Alam dan Budaya dengan Cara yang Menyenangkan</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-5 md:p-10 lg:p-20 text-black">
            <!-- Card 1 -->
            <div class="card w-full border border-gray-400 bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="text-6xl text-green-600 mb-4">
                        <i class="fas fa-tree"></i>
                    </div>
                    <h2 class="card-title text-2xl font-semibold">Petualangan Hutan</h2>
                    <p class="text-gray-600">Ajari anak-anak tentang ekosistem hutan dan keanekaragaman hayati dengan
                        pengalaman langsung di alam.</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card w-full border border-gray-400 bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="text-6xl text-green-600 mb-4">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h2 class="card-title text-2xl font-semibold">Pembelajaran Pertanian</h2>
                    <p class="text-gray-600">Kenalkan anak-anak pada dunia pertanian dan cara bercocok tanam, dari
                        menanam biji hingga panen.</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="card w-full border border-gray-400 bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="text-6xl text-green-600 mb-4">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h2 class="card-title text-2xl font-semibold">Eksplorasi Budaya</h2>
                    <p class="text-gray-600">Perkenalkan anak-anak pada berbagai budaya dan tradisi melalui aktivitas
                        interaktif dan edukatif.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Section -->
    <section class="container mx-auto my-8 h-screen">
        <div class="text-center mb-8 mt-32">
            <h1 class="font-bold text-4xl text-green-600">
                Paket Liburan Rumah Pintar
            </h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-5 lg:p-10 text-black">

            <!-- Card 1 -->
            <!-- Card 1 -->
            <a href="#">
                <div class="card card-compact w-full bg-base-100 shadow-xl">
                    <figure><img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                            alt="Shoes" /></figure>
                    <div class="badge badge-warning text-sm py-2 text-white rounded-sm w-full">100% Refund tersedia
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Paket Agrowisata</h2>
                        <div class="badge badge-success text-sm py-2 text-white rounded-md">Diskon 20%</div>
                        <p class="hidden lg:block">Explore the great outdoors and save 20% with our Agrotourism Package.
                            Enjoy the freedom with
                            our 100% refund guarantee.</p>
                        <div class="card-actions justify-end">
                            <h1 class="font-semibold text-gray-700 p-5 text-lg">IDR 10.000</h1>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Card 2 -->
            <a href="#">
                <div class="card card-compact w-full bg-base-100 shadow-xl">
                    <figure><img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                            alt="Shoes" /></figure>
                    <div class="badge badge-warning text-sm py-2 text-white rounded-sm w-full">100% Refund tersedia
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Paket Outbond</h2>
                        <div class="badge badge-success text-sm py-2 text-white rounded-md">Diskon 20%</div>
                        <p class="hidden lg:block">Embark on thrilling adventures with our Outbound Package. Avail of a
                            20% discount and enjoy
                            peace of mind with our 100% refund guarantee.</p>
                        <div class="card-actions justify-end">
                            <h1 class="font-semibold text-gray-700 p-5 text-lg">IDR 10.000</h1>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Card 3 -->
            <a href="#">
                <div class="card card-compact w-full bg-base-100 shadow-xl">
                    <figure><img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                            alt="Shoes" /></figure>
                    <div class="badge badge-warning text-sm py-2 text-white rounded-sm w-full">100% Refund tersedia
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Paket Permainan Tradisional</h2>
                        <div class="badge badge-success text-sm py-2 text-white rounded-md">Diskon 20%</div>
                        <p class="hidden lg:block">Experience traditional joy with our Traditional Games Package. Enjoy
                            a 20% discount and
                            ensure satisfaction with our 100% refund guarantee.</p>
                        <div class="card-actions justify-end">
                            <h1 class="font-semibold text-gray-700 p-5 text-lg">IDR 10.000</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Section -->
    <!-- End Section -->

    <!-- Include FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>