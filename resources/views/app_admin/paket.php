<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '\..\root_components\head_app.php'; ?>
    <title>Dashboard | Rumah Pintar Karangharjo</title>
</head>

<body
    x-data="{ page: 'ecommerce', loaded: true, darkMode: true, stickyMenu: false, sidebarToggle: false, scrollTop: false, currentRow: null, showEditPopup: false, showDeletePopup: false, paketList: <?php echo htmlspecialchars(json_encode($list_paket), ENT_QUOTES, 'UTF-8');
    ; ?>, previewImage: ''}"
    x-init="
            darkMode = JSON.parse(localStorage.getItem('darkMode'));
            $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)));
        " :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">

    <?php include __DIR__ . '\..\root_components\loading.php'; ?>

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">

        <!-- ===== Sidebar Start ===== -->
        <?php include __DIR__ . '\..\root_components\sidebar.php'; ?>
        <!-- ===== Sidebar End ===== -->

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

            <!-- ===== Header Start ===== -->
            <?php include __DIR__ . '\..\root_components\header.php'; ?>
            <!-- ===== Header End ===== -->

            <!-- ===== Main Content Start ===== -->
            <main>
                <div class="mx-auto max-w-screen-2xl p-2 md:p-6 2xl:p-10">
                    <div class="mx-auto max-w-7xl">
                        <!-- Breadcrumb Start -->
                        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                                Paket Wisata
                            </h2>
                            <nav>
                                <ol class="flex items-center gap-2">
                                    <li>
                                        <a class="font-medium" href="index.html">Dashboard /</a>
                                    </li>
                                    <li class="font-medium">paket /</li>
                                    <li class="font-medium text-primary">admin</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- Breadcrumb End -->

                        <?php include __DIR__ . '/partials/modalAddPaket.php'; ?>

                        <!-- Table invoice -->
                        <div class="overflow-x-auto w-screen">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-left">
                                        <th
                                            class="min-w-fit px-4 py-4 font-medium text-black dark:text-bodydark1 xl:pl-11">
                                            Package</th>
                                        <th class="min-w-fit px-4 py-4 font-medium text-black dark:text-bodydark1">
                                            Expiration</th>
                                        <th class="min-w-fit px-4 py-4 font-medium text-black dark:text-bodydark1">
                                            Visible</th>
                                        <th class="px-4 py-4 font-medium text-black dark:text-bodydark1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="(row, index) in paketList" :key="index">
                                        <tr>
                                            <td class="border-b border-gray-300 px-4 py-4 xl:pl-11">
                                                <div class="flex items-center space-x-6">
                                                    <img :src="row.image" class="h-auto rounded-sm mr-5 hidden sm:block"
                                                        width="150px" alt="Package Image">
                                                    <div>
                                                        <h5 class="font-medium text-black dark:text-bodydark1"
                                                            x-text="row.name"></h5>
                                                        <p class="text-sm" x-text="row.price"></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-b border-gray-300 px-4 py-4">
                                                <p class="text-black dark:text-bodydark1" x-text="row.expiration"></p>
                                            </td>
                                            <td class="border-b border-gray-300 px-4 py-4">
                                                <span
                                                    class="text-sm font-medium inline-flex rounded-full bg-opacity-10 px-4 py-2"
                                                    :class="row.visible ? 'bg-success text-success' : 'bg-danger text-danger'"
                                                    x-text="row.visible ? 'Yes' : 'No'"></span>
                                            </td>
                                            <td class="border-b px-4 py-5 dark:border-strokedark">
                                                <div class="flex items-center space-x-3.5">
                                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                            fill="" />
                                                        <path
                                                            d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                            fill="" />
                                                    </svg>
                                                    <button class="hover:text-primary"
                                                        @click="currentRow = row; showEditPopup = true; previewImage = row.image">
                                                        <!-- Icon untuk edit -->
                                                        <svg class="fill-current text-blue-500" width="18" height="18"
                                                            viewBox="0 0 20 20" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.5 14.9998V17.4998H5L14.8733 7.62652L12.3733 5.12652L2.5 14.9998ZM17.675 4.82585C18.0883 4.41252 18.0883 3.76252 17.675 3.34919L16.1508 1.82419C15.7375 1.41085 15.0875 1.41085 14.6742 1.82419L13.4 3.09852L15.9 5.59852L17.675 4.82585Z"
                                                                fill="" />
                                                        </svg>
                                                    </button>
                                                    <button class="hover:text-primary"
                                                        @click="currentRow = row; showDeletePopup = true">
                                                        <!-- Icon untuk hapus -->
                                                        <svg class="fill-current text-gray-500" width="18" height="18"
                                                            viewBox="0 0 20 20" fill="none"
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
                        <?php include __DIR__ . '/partials/paketPopup.php' ?>
                    </div>
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