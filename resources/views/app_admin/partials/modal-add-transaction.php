<!-- Start Modal Add Data Paket -->
<div
    x-data="{ isOpen: false, step: 1, hargaTiket: 0, jumlahTiket: 1, tambahTiket() { this.jumlahTiket++; }, kurangiTiket() { if (this.jumlahTiket > 1) { this.jumlahTiket--; } } }">
    <!-- Trigger Tombol -->
    <button @click="isOpen = true" class="btn-add-paket">
        <span>
            <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10 4C10.5523 4 11 4.44772 11 5V9H15C15.5523 9 16 9.44772 16 10C16 10.5523 15.5523 11 15 11H11V15C11 15.5523 10.5523 16 10 16C9.44772 16 9 15.5523 9 15V11H5C4.44772 11 4 10.5523 4 10C4 9.44772 4.44772 9 5 9H9V5C9 4.44772 9.44772 4 10 4Z" />
            </svg>
        </span>
        Tambah Paket
    </button>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 z-999" aria-hidden="true"></div>

    <!-- Start Modal Tambah Pesanan Tiket -->
    <div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90" class="modal-style">
        <div class="relative bg-white dark:bg-boxdark p-8 rounded-lg shadow-lg w-10/12">
            <form method="post" action="<?php echo base_url('dashboard/admin/visitor-orders/create') ?>">
                <div x-show="step === 1">
                    <!-- Isi Modal -->
                    <h2 class="text-2xl font-semibold text-boxdark dark:text-gray-2 mb-6">Tambah Pesanan Tiket</h2>
                    <h2 class="text-xl font-medium text-boxdark dark:text-gray-2 mb-6">Langkah 1 : Informasi Pelanggan
                    </h2>
                    <div>
                        <!-- Input Nama -->
                        <div class="mb-4">
                            <label for="visitor-name" class="labels-style-modal">Nama Pengunjung</label>
                            <input type="text" id="visitor-name" name="visitor-name" class="input-modal-style"
                                placeholder="Masukkan nama paket">
                        </div>

                        <!-- Input Nomor Telepon -->
                        <div class="mb-4">
                            <label for="number-phone" class="labels-style-modal">Nomor Telepon</label>
                            <input type="number" id="number-phone" name="number-phone" class="input-modal-style"
                                placeholder="Masukkan nomor telepon (boleh kosong)">
                        </div>

                        <!-- Input Email -->
                        <div class="mb-4">
                            <label for="email" class="labels-style-modal">Email</label>
                            <input type="email" id="email" name="email" class="input-modal-style"
                                placeholder="Masukkan Email (boleh kosong)">
                        </div>

                        <!-- Input Asal (Kabupaten) -->
                        <div class="mb-6">
                            <label for="asal-kab" class="labels-style-modal">Asal (Kabupaten)</label>
                            <input type="text" id="asal-kab" name="asal-kab" class="input-modal-style"
                                placeholder="Masukkan asal kabupaten"></input>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex justify-end space-x-3">
                            <button type="button" @click="isOpen = false" class="btn-reject">Batal</button>
                            <button type="button" @click="step = 2"
                                class="px-4 py-2 bg-primary text-white rounded-md hover:bg-opacity-90">Selanjutnya</button>
                        </div>
                    </div>
                </div>
                <div x-show="step === 2">
                    <!-- Isi Modal -->
                    <h2 class="text-2xl font-semibold text-boxdark dark:text-gray-2 mb-6">Tambah Pesanan Tiket</h2>
                    <h2 class="text-xl font-medium text-boxdark dark:text-gray-2 mb-6">Langkah 2 : Pemilihan Paket</h2>
                    <div>
                        <!-- Input Nama Paket (Dropdown) -->
                        <div class="mb-4">
                            <label for="name-paket" class="labels-style-modal">Pilih Paket</label>
                            <select id="name-paket" name="name-paket" class="input-modal-style"
                                @change="hargaTiket = $event.target.options[$event.target.selectedIndex].dataset.harga">
                                <option value="" disabled selected>Pilih nama paket</option>
                                <template
                                    x-for="(package, index) in <?= htmlspecialchars(json_encode($tour_packages), ENT_QUOTES, 'UTF-8') ?>"
                                    :key="index">
                                    <option :value="package.name" :data-harga="package.price"
                                        x-text="package.name"></option>
                                </template>
                            </select>
                        </div>

                        <!-- Jumlah Tiket -->
                        <div class="mb-4 mt-8">
                            <h3 class="font-semibold mb-2">Jumlah Tiket</h3>
                            <div class="flex items-center">
                                <p class="font-semibold text-green-600 text-lg"
                                    x-text="'IDR ' + (hargaTiket * jumlahTiket).toLocaleString('id-ID') + '/pax'"></p>
                                <div class="flex items-center ml-auto">
                                    <span @click="kurangiTiket" role="button"
                                        class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg">-</span>
                                    <input type="number" x-model="jumlahTiket"
                                        class="w-12 text-center mx-2 bg-gray-100 rounded-lg" name="jumlah_tiket">
                                    <span @click="tambahTiket" role="button"
                                        class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg">+</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex justify-end space-x-3">
                            <button type="button" @click="step = 1" class="btn-reject">Kembali</button>
                            <button type="submit"
                                class="px-4 py-2 bg-primary text-white rounded-md hover:bg-opacity-90">Selesai</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Modal -->
</div>
<!-- End Modal Add Data Paket -->