<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <title>Wisata Desa Karangharjo | Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= css_path('homepage.css') ?>">

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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/accounting/accounting.min.js"></script>
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
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-gray-700 rounded-box w-52 font-medium">
                    <li><a>Home</a></li>
                    <li><a>Services</a></li>
                    <li><a>Ticket</a></li>
                    <li><a>About Us</a></li>
                    <a href="<?php echo base_url('login') ?>" class="btn btn-info">login</a>
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
            <a href="<?php echo base_url('login') ?>" class="btn btn-info">login</a>
        </div>
    </nav>

    <!-- Start Hero Content -->
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
                                <a href="javascript:void(0)" class="btn btn-secondary">Lihat Aktivitas <i
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

    <!-- Start services Section -->
    <section class="container mx-auto my-8 h-auto">
        <p>User Sudah login</p>
        <p>User belom login</p>
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

    <!-- Start Paket Section -->
    <section class="container mx-auto my-8 h-screen" x-data="{ 
            open: false,
            paket: '',
            masaBerlaku: '',
            hargaTiket: 0,
            jumlahTiket: 1,
            tambahTiket: function() {
                this.jumlahTiket++;
            },
            kurangiTiket: function() {
                if (this.jumlahTiket > 1) {
                    this.jumlahTiket--;
                }
            }
        }" @click.away="open = false">
        <div class="text-center mb-8 mt-32">
            <h1 class="font-bold text-4xl text-green-600">
                Paket Liburan Rumah Pintar
            </h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-5 lg:p-10 text-black">

            <!-- Card 1 -->
            <a href="javascript:void(0)"
                @click="open = true; paket = 'Paket Agrowisata'; masaBerlaku = '13 Jun 2024'; hargaTiket = 10000">
                <div class="card card-compact w-full h-full bg-base-100 shadow-xl">
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
            <a href="javascript:void(0)"
                @click="open = true; paket = 'Paket Outbond'; masaBerlaku = '14 Jun 2024'; hargaTiket = 15000">
                <div class="card card-compact w-full h-full bg-base-100 shadow-xl">
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
            <a href="javascript:void(0)"
                @click="open = true; paket = 'Paket Permainan Tradisional'; masaBerlaku = '15 Jun 2024'; hargaTiket = 20000">
                <div class="card card-compact w-full h-full bg-base-100 shadow-xl">

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

        <!-- Popup Container -->
        <div x-show="open" x-transition:enter="transition-transform transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-full"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-end justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg m-2 lg:max-w-2xl w-full">
                <!-- Close Button -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">Detail Pesanan</h2>
                    <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <!-- Content -->
                <div>
                    <!-- Form -->
                    <form method="post" action="proses.php" class="text-gray-700 font-sans">
                        <!-- Paket Terpilih -->
                        <div class="bg-gray-100 p-4 rounded-lg mb-4">
                            <h3 class="font-semibold mb-1">Paket Terpilih</h3>
                            <p class="text-gray-700" x-text="paket"></p>
                            <p class="text-gray-500" x-text="'Masa Berlaku: ' + masaBerlaku"></p>
                            <p class="text-yellow-600 text-sm mt-2">Bisa 100% Refund dengan asuransi</p>
                        </div>

                        <!-- Tanggal Kunjungan -->
                        <div class="mb-4" x-data="{ tanggalKunjungan: 'sekarang' }">
                            <h3 class="font-semibold mb-2">Tanggal Kunjungan</h3>
                            <div class="grid grid-cols-2 gap-3 space-x-2 mb-2">
                                <label
                                    :class="{ 'bg-blue-200 text-blue-700 px-3 py-2 rounded-lg cursor-pointer': tanggalKunjungan === 'sekarang', 'bg-gray-200 text-gray-700 px-3 py-2 rounded-lg cursor-pointer': tanggalKunjungan !== 'sekarang' }">
                                    <input type="radio" x-model="tanggalKunjungan" value="sekarang" class="hidden"
                                        name="tanggal_kunjungan">
                                    Sekarang<br>12 Jun
                                </label>
                                <label
                                    :class="{ 'bg-blue-200 text-blue-700 px-3 py-2 rounded-lg cursor-pointer': tanggalKunjungan === 'besok', 'bg-gray-200 text-gray-700 px-3 py-2 rounded-lg cursor-pointer': tanggalKunjungan !== 'besok' }">
                                    <input type="radio" x-model="tanggalKunjungan" value="besok" class="hidden"
                                        name="tanggal_kunjungan">
                                    Besok<br>13 Jun
                                </label>
                            </div>
                            <label class="mt-8 font-medium cursor-pointer">
                                <input type="radio" x-model="tanggalKunjungan" value="pilih" class="sr-only"
                                    name="tanggal_kunjungan">
                                <p class="text-blue-600 underline">Pilih Tanggal saja</p>
                            </label>
                            <input type="date" x-show="tanggalKunjungan === 'pilih'"
                                class="bg-gray-100 px-3 col-span-2 py-5 rounded-lg w-full"
                                name="tanggal_kunjungan_pilih">
                        </div>

                        <!-- Jumlah Tiket -->
                        <div class="mb-4 mt-8">
                            <h3 class="font-semibold mb-2">Jumlah Tiket</h3>
                            <div class="flex items-center">
                                <p class="font-semibold text-green-600 text-lg"
                                    x-text="'IDR ' + accounting.formatMoney(hargaTiket, '', 0, ',', '.') + '/pax'"></p>
                                <div class="flex items-center ml-auto">
                                    <span @click="kurangiTiket" role="button"
                                        class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg">-</span>
                                    <input type="text" x-model="jumlahTiket"
                                        class="w-12 text-center mx-2 bg-gray-100 rounded-lg" name="jumlah_tiket">
                                    <span @click="tambahTiket" role="button"
                                        class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg">+</span>
                                </div>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="flex justify-end items-center mb-4">
                            <p class="font-semibold text-lg"
                                x-text="'Total (' + jumlahTiket + ' pax): ' + 'IDR ' + accounting.formatMoney(hargaTiket * jumlahTiket, '', 0, ',', '.')">
                            </p>
                        </div>

                        <!-- Pesan Button -->
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">Pesan</button>
                    </form>

                </div>

            </div>
        </div>
    </section>

    <!-- End Section -->


    <!-- Start footer Section -->
    <footer>
    </footer>
    <!-- End Section -->

    <!-- Include FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>