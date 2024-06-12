<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . '\..\root_components\head_app.php'; ?>
    <title>Dashboard | Rumah Pintar Karangharjo</title>
</head>

<body
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">

    <?php include __DIR__ . '\..\root_components/loading.php' ?>

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">

        <!-- ===== Sidebar Start ===== -->
        <?php include __DIR__ . '\..\root_components/sidebar.php' ?>
        <!-- ===== Sidebar End ===== -->

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

            <!-- ===== Header Start ===== -->
            <?php include __DIR__ . '\..\root_components/header.php' ?>
            <!-- ===== Header End ===== -->

            <!-- ===== Main Content Start ===== -->
            <main>
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                    <div class="mx-auto max-w-7xl">
                        <!-- Breadcrumb Start -->
                        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                                Calendar
                            </h2>

                            <nav>
                                <ol class="flex items-center gap-2">
                                    <li>
                                        <a class="font-medium" href="index.html">Dashboard /</a>
                                    </li>
                                    <li class="text-primary">Calendar</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- Breadcrumb End -->

                        <!-- ====== Calendar Section Start -->
                        <div class="calender">
                            <table class="w-full">
                                <thead>
                                    <tr class="grid grid-cols-7 rounded-t-sm bg-primary text-white">
                                        <th class="coloms-calender rounded-tl-sm">
                                            <span id="large-rows"> Sunday </span>
                                            <span id="small-rows"> Sun </span>
                                        </th>
                                        <th class="coloms-calender">
                                            <span id="large-rows"> Monday </span>
                                            <span id="small-rows"> Mon </span>
                                        </th>
                                        <th class="coloms-calender">
                                            <span id="large-rows"> Tuesday </span>
                                            <span id="small-rows"> Tue </span>
                                        </th>
                                        <th class="coloms-calender">
                                            <span id="large-rows"> Wednesday </span>
                                            <span id="small-rows"> Wed </span>
                                        </th>
                                        <th class="coloms-calender">
                                            <span id="large-rows"> Thursday </span>
                                            <span id="small-rows"> Thur </span>
                                        </th>
                                        <th class="coloms-calender">
                                            <span id="large-rows"> Friday </span>
                                            <span id="small-rows"> Fri </span>
                                        </th>
                                        <th class="coloms-calender rounded-tr-sm">
                                            <span id="large-rows"> Saturday </span>
                                            <span id="small-rows"> Sat </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Line 1 -->
                                    <tr>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">1</span>
                                            <div class="group calender-event">
                                                <span class="group-hover:text-primary md:hidden">
                                                    More
                                                </span>
                                                <div class="event event-style w-[200%] md:w-[190%] md:opacity-100">
                                                    <span
                                                        class="event-name text-sm font-semibold text-black dark:text-white">
                                                        Redesign Website
                                                    </span>
                                                    <span class="time text-sm calender-text">
                                                        1 Dec - 2 Dec
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">2</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">3</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">4</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">5</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">6</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">7</span>
                                        </td>
                                    </tr>
                                    <!-- Line 1 -->
                                    <!-- Line 2 -->
                                    <tr>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">8</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">9</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">10</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">11</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">12</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">13</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">14</span>
                                        </td>
                                    </tr>
                                    <!-- Line 2 -->
                                    <!-- Line 3 -->
                                    <tr>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">15</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">16</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">17</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">18</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">19</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">20</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">21</span>
                                        </td>
                                    </tr>
                                    <!-- Line 3 -->
                                    <!-- Line 4 -->
                                    <tr>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">22</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">23</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">24</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">25</span>
                                            <div class="group calender-event">
                                                <span class="group-hover:text-primary md:hidden">
                                                    More
                                                </span>
                                                <div class="event event-style w-[300%] md:w-[290%] md:opacity-100">
                                                    <span
                                                        class="event-name text-sm font-semibold text-black dark:text-white">
                                                        App Design
                                                    </span>
                                                    <span class="time text-sm calender-text">
                                                        25 Dec - 27 Dec
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">26</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">27</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">28</span>
                                        </td>
                                    </tr>
                                    <!-- Line 4 -->
                                    <!-- Line 5 -->
                                    <tr>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">29</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">30</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">31</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">1</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">2</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">3</span>
                                        </td>
                                        <td class="rows-calender ease">
                                            <span class="calender-text">4</span>
                                        </td>
                                    </tr>
                                    <!-- Line 5 -->
                                </tbody>
                            </table>
                        </div>
                        <!-- ====== Calendar Section End -->
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