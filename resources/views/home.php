<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || false }"
    x-init="$watch('darkMode', (value) => { localStorage.setItem('darkMode', value) })" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <title>Wisata Desa Karangharjo Jember - Pesona Alam & Edukasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= css_path('homepage.css') ?>">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="favicon.ico">

    <!-- SEO -->
    <meta name="description"
        content="Jelajahi keindahan alam dan wisata edukasi di Desa Karangharjo, Jember. Temukan pesona alam, budaya lokal, dan destinasi wisata menarik lainnya.">
    <meta name="keywords"
        content="wisata karangharjo, wisata jember, wisata alam, wisata edukasi, desa wisata, tempat wisata, objek wisata, karangharjo jember, jember, indonesia">

    <!-- Open Graph Protocol -->
    <meta property="og:title" content="Wisata Desa Karangharjo Jember - Pesona Alam & Edukasi" />
    <meta property="og:description"
        content="Jelajahi keindahan alam dan wisata edukasi di Desa Karangharjo, Jember. Temukan pesona alam, budaya lokal, dan destinasi wisata menarik lainnya." />
    <meta property="og:image" content="https://www.contohwebsite.com/gambar-menarik.jpg" />
    <meta property="og:url" content="https://www.contohwebsite.com/" />

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Wisata Desa Karangharjo Jember - Pesona Alam & Edukasi">
    <meta name="twitter:description"
        content="Jelajahi keindahan alam dan wisata edukasi di Desa Karangharjo, Jember. Temukan pesona alam, budaya lokal, dan destinasi wisata menarik lainnya.">
    <meta name="twitter:image" content="https://www.contohwebsite.com/gambar-menarik.jpg">
</head>

<body x-data="{ loading:true, isDarkmode:false }" x-init="window.onload = () => loading = false"
    :class="{ 'overflow-hidden': loading}" class="antialiased bg-base-light dark:bg-base-dark">
    <!-- Elemen Loading -->
    <div x-show="loading" class="loader">
        <div class="loader-body"></div>
    </div>

    <!-- Navbar Start -->
    <header x-data="{ navbarOpen: true, mobileMenuOpen:true, lastScrollY: 0 }"
        x-init="()=>{window.addEventListener('scroll',()=>{navbarOpen=window.scrollY<=lastScrollY;lastScrollY=window.scrollY;})}"
        :class="{ 'transform translate-y-0 opacity-100': navbarOpen, 'transform -translate-y-full opacity-0': !navbarOpen }"
        class="fixed top-0 left-0 right-0 z-50 flex flex-col justify-between bg-opacity-100 navbar-transition">

        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center justify-between py-3 text-primary dark:text-base-light">
                <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                    <a href="#" class="text-xl font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap ">
                        Rumah Pintar
                    </a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class=" cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-180" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': mobileMenuOpen, 'hidden': !mobileMenuOpen}"
                    class="lg:flex flex-grow items-center max-w-full justify-center transition-all duration-500 lg:transition-none capitalize"
                    id="collapse-navbar">
                    <ul class="flex flex-col items-center font-sans mt-2 lg:space-x-4 lg:flex-row list-none lg:ml-auto">
                        <li class="nav-item">
                            <a class="px-3 py-2 flex items-center text-sm leading-snug hover:opacity-75" href="#home">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 py-2 flex items-center text-sm leading-snug hover:opacity-75"
                                href="#services">
                                services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 py-2 flex items-center text-sm leading-snug hover:opacity-75" href="#ticket">
                                ticket
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 py-2 flex items-center text-sm leading-snug hover:opacity-75" href="#about">
                                About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="flex items-center">
                                <button x-on:click="darkMode = !darkMode"
                                    class="w-12 h-6 rounded-full bg-white flex items-center p-1 transition duration-300 focus:outline-none shadow"
                                    onclick="toggleTheme()">
                                    <div id="switch-toggle"
                                        class="w-6 h-6 rounded-full transition duration-500 transform bg-yellow-500 -translate-x-2 flex items-center justify-center text-white">
                                    </div>
                                </button>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Navbar End -->

    <main x-show="!loading" x-transition:enter="transition-opacity duration-2000" x-transition:enter-start="opacity-0">
        <!-- Hero Start  -->
        <section class="h-screen flex items-center">
        </section>
        <section class="h-screen flex items-center">
        </section>
        <!-- Hero End -->
    </main>



    <!-- Start footer Section -->
    <footer>
    </footer>
    <!-- End Section -->

    <!-- Script Modul -->
    <script type="Modul" src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
    <script type="" defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <!-- <script src="<?= js_path("homepage/index.js") ?>"></script> -->
    <script>
        const switchToggle = document.querySelector('#switch-toggle');
        let isDarkmode = false

        const darkIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>`

        const lightIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>`

        function toggleTheme() {
            isDarkmode = !isDarkmode
            localStorage.setItem('isDarkmode', isDarkmode)
            switchTheme()
        }

        function switchTheme() {
            if (isDarkmode) {
                switchToggle.classList.remove('bg-yellow-500', '-translate-x-4')
                switchToggle.classList.add('bg-gray-700', 'translate-x-6')
                setTimeout(() => {
                    switchToggle.innerHTML = darkIcon
                }, 250);
            } else {
                switchToggle.classList.add('bg-yellow-500', '-translate-x-4')
                switchToggle.classList.remove('bg-gray-700', 'translate-x-6')
                setTimeout(() => {
                    switchToggle.innerHTML = lightIcon
                }, 250);
            }
        }
        switchTheme()
    </script>
</body>

</html>