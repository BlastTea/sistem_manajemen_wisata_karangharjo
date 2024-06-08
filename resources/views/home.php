<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <?php include 'components/head.php' ?>
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] . '/css/homepage.css' ?>">

    <title>Wisata Desa Karangharjo | Homepage</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="<?= $_ENV['APP_URL'] . '/js/homepage.js' ?>">
</head>

<body class="font-sans antialiased bg-gray-900 text-white" x-data="{ scrolled: false }"
    @scroll.window="scrolled = (window.pageYOffset > 50)">
    <div :class="scrolled ? 'bg-light shadow-lg' : 'bg-dark bg-opacity-10'"
        class="navbar fixed top-0 left-0 right-0 transition navbar-transition z-50">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
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
            <a class="btn btn-ghost text-xl">daisyUI</a>
        </div>
        <div class="navbar-end hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
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
    </div>
   
    <section class="h-screen bg-blue-500">
        <div class="container mx-auto h-full flex items-center justify-center">
            <h1 class="text-white text-4xl">Welcome to Hero Section</h1>
        </div>
    </section>

    <section class="content h-screen bg-gray-100">
        <div class="container mx-auto h-full flex items-center justify-center">
            <h2 class="text-gray-800 text-2xl">Content Section</h2>
        </div>
    </section>
</body>

</html>