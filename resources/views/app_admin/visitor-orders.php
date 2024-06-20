<!DOCTYPE html>
<html lang="en">

<head>
    <?php include view_path('root_components\head_app.php'); ?>
    <title>Dashboard | Rumah Pintar Karangharjo</title>
</head>

<body
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">

    <?php include view_path('root_components/loading.php') ?>

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">

        <!-- ===== Sidebar Start ===== -->
        <?php include view_path('root_components/sidebar.php') ?>
        <!-- ===== Sidebar End ===== -->

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

            <!-- ===== Header Start ===== -->
            <?php include view_path('root_components/header.php') ?>
            <!-- ===== Header End ===== -->

            <!-- ===== Main Content Start ===== -->
            <main>
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                    <div class="mx-auto max-w-7xl">
                        <!-- Breadcrumb Start -->
                        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                                Pesanan Pelanggan
                            </h2>

                            <nav>
                                <ol class="flex items-center gap-2">
                                    <li>
                                        <a class="font-medium" href="index.html">Dashboard /</a>
                                    </li>
                                    <li class="font-medium">Paket /</li>
                                    <li class="font-medium text-primary">Pesanan</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- Breadcrumb End -->

                        <?php include view_path('app_admin/partials/modal-add-transaction.php') ?>

                        <!-- Table invoice -->
                        <div x-data="{ showEditPopup: false, showDeletePopup: false, currentRow: null }"
                            class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                            <div class="max-w-full overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-left dark:bg-meta-4">
                                            <th
                                                class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                                Pemesanan</th>
                                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                                                Pengajuan Invoice</th>
                                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                                Status</th>
                                            <th class="px-4 py-4 font-medium text-black dark:text-white">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Di dalam template Alpine.js -->
                                        <template
                                            x-for="(row, index) in <?= htmlspecialchars(json_encode($orders), ENT_QUOTES, 'UTF-8') ?>"
                                            :key="index">
                                            <tr>
                                                <td
                                                    class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                                    <h5 class="font-medium text-black dark:text-white"
                                                        x-text="row.name"></h5>
                                                    <p class="text-sm" x-text="row.price"></p>
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p class="text-black dark:text-white" x-text="row.date"></p>
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p x-text="row.status" :class="{
                                                            'bg-success text-success': row.status === 'paid',
                                                            'bg-warning text-warning': row.status === 'pending',
                                                            'bg-danger text-danger': row.status === 'refund'
                                                        }"
                                                        class="inline-flex rounded-full px-3 py-1 text-sm font-medium bg-opacity-10">
                                                    </p>
                                                </td>

                                                <td class="border-b px-4 py-5 dark:border-strokedark">
                                                    <div class="flex items-center space-x-3.5">
                                                        <button class="hover:text-primary">
                                                            <!-- Icon untuk disetujui -->
                                                            <svg class="fill-current text-green-500" width="18"
                                                                height="18" viewBox="0 0 20 20" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0ZM8.74927 14.0188L3.89877 9.16834L5.10127 7.96584L8.74927 11.6123L14.8998 5.46184L16.1023 6.66434L8.74927 14.0188Z"
                                                                    fill="" />
                                                            </svg>
                                                        </button>
                                                        <button class="hover:text-primary">
                                                            <!-- Icon untuk ditolak -->
                                                            <svg class="fill-current text-red-500" width="18"
                                                                height="18" viewBox="0 0 20 20" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0ZM12.4176 13.1788L13.5963 12.0001L10.0196 8.42334L13.5963 4.84659L12.4176 3.66784L8.84089 7.24459L5.26414 3.66784L4.08539 4.84659L7.66214 8.42334L4.08539 12.0001L5.26414 13.1788L8.84089 9.60208L12.4176 13.1788Z"
                                                                    fill="" />
                                                            </svg>
                                                        </button>
                                                        <button class="hover:text-primary"
                                                            @click="currentRow = row; showEditPopup = true">
                                                            <!-- Icon untuk edit -->
                                                            <svg class="fill-current text-blue-500" width="18"
                                                                height="18" viewBox="0 0 20 20" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M2.5 14.9998V17.4998H5L14.8733 7.62652L12.3733 5.12652L2.5 14.9998ZM17.675 4.82585C18.0883 4.41252 18.0883 3.76252 17.675 3.34919L16.1508 1.82419C15.7375 1.41085 15.0875 1.41085 14.6742 1.82419L13.4 3.09852L15.9 5.59852L17.675 4.82585Z"
                                                                    fill="" />
                                                            </svg>
                                                        </button>
                                                        <button class="hover:text-primary"
                                                            @click="currentRow = row; showDeletePopup = true">
                                                            <!-- Icon untuk hapus -->
                                                            <svg class="fill-current text-gray-500" width="18"
                                                                height="18" viewBox="0 0 20 20" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M5 7.5V15C5 15.825 5.675 16.5 6.5 16.5H13.5C14.325 16.5 15 15.825 15 15V7.5H5ZM7.5 9H9.16667V14.5H7.5V9ZM10.8333 9H12.5V14.5H10.8333V9ZM8.33333 2.5L7.5 3.33333H5V4.16667H15V3.33333H12.5L11.6667 2.5H8.33333ZM3.33333 4.16667V5H16.6667V4.16667H3.33333Z"
                                                                    fill="" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include view_path('app_admin/partials/orders-popup.php') ?>
            </main>
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script defer src="<?= js_path('bundle.js') ?>"></script>
</body>

</html>