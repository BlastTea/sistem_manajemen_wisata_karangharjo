<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '\..\root_components\head_app.php'; ?>
    <title>Sign In | TailAdmin - Tailwind CSS Admin Dashboard Template</title>
</head>

<body
    x-data="{ page: 'signin', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">

    <!-- ===== Preloader Start ===== -->
    <?php include __DIR__ . '\..\root_components/loading.php' ?>
    <!-- ===== Preloader End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div class="main-content">
        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Daftar ke Rumah Pintar
                    </h2>
                </div>
                <!-- Breadcrumb End -->

                <!-- ====== Forms Section Start -->
                <div class="form-auth">
                    <div class="flex flex-wrap items-center">
                        <div class="hidden w-full xl:block xl:w-1/2">
                            <div class="px-26 py-17.5 text-center">
                                <span class="mt-15 inline-block">
                                    <img src="<?= $_ENV['APP_URL'] . '/storage/images/illustration/illustration-02.svg' ?>"
                                        alt="illustration" />
                                </span>
                            </div>
                        </div>
                        <div class="w-full border-stroke dark:border-strokedark xl:w-1/2 xl:border-l-2">
                            <div class="w-full p-4 sm:p-12.5 xl:p-17.5">
                                <span class="mb-1.5 block font-medium">Satu langkah untuk kesuksesan bersama</span>
                                <h2 class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2">
                                    Sign Up to Rumah Pintar
                                </h2>

                                <form method="post" action="<?php echo $_ENV['APP_URL'] . '/register' ?>">
                                    <div class="mb-4">
                                        <label class="label-form-auth">Nama</label>
                                        <div class="relative">
                                            <input type="text" name="username" placeholder="Enter your Name"
                                                class="form-input" required />
                                            <span class="absolute right-4 top-4">
                                                <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <!-- Icon SVG -->
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="label-form-auth">Email</label>
                                        <div class="relative">
                                            <input type="email" name="email" placeholder="Enter your email"
                                                class="form-input" required />
                                            <span class="absolute right-4 top-4">
                                                <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <!-- Icon SVG -->
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <label class="label-form-auth">Password</label>
                                        <div class="relative">
                                            <input type="password" name="password" placeholder="6+ Characters"
                                                class="form-input" required />
                                            <span class="absolute right-4 top-4">
                                                <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <!-- Icon SVG -->
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <label class="label-form-auth">Ulangi Password</label>
                                        <div class="relative">
                                            <input type="password" name="confirm_password" placeholder="6+ Characters"
                                                class="form-input" required />
                                            <span class="absolute right-4 top-4">
                                                <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <!-- Icon SVG -->
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <input type="submit" value="Daftar" class="form-auth-submit" />
                                    </div>

                                    <div class="mt-6 text-center">
                                        <p class="font-medium">
                                            Sudah memiliki akun? <a href="<?= $_ENV['APP_URL'] . '/login' ?>"
                                                class="text-primary">Login</a>
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ====== Forms Section End -->
            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script defer src="<?= $_ENV['APP_URL'] . '/js/bundle.js' ?>"></script>
</body>

</html>