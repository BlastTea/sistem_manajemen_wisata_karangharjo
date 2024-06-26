<!-- Pop up Edit -->
<div x-show="showEditPopup" class="modal-popup" x-transition:enter="transform transition ease-out duration-300"
    x-transition:enter-start="scale-75" x-transition:enter-end="scale-100"
    x-transition:leave="transform transition ease-in duration-300" x-transition:leave-start="scale-100"
    x-transition:leave-end="scale-75">
    <div class="modal-popup-edit z-9999">
        <h2 class="text-lg font-bold mb-4 text-boxdark dark:text-bodydark">Edit Item</h2>
        <form method="post" action="<?php echo base_url('dashboard/admin/visitor-orders/update') ?>">
            <div>
                <!-- Input Nama -->
                <input type="hidden" id="id_transaction" name="id_transaction" class="input-modal-style"
                    placeholder="Masukkan nama paket" x-model="currentRow.id_transaction">
                <div class="mb-4">
                    <label for="visitor-name" class="labels-style-modal">Nama Pengunjung</label>
                    <input type="text" id="visitor-name" name="visitor-name" class="input-modal-style"
                        placeholder="Masukkan nama pengunjung" x-model="currentRow.name">
                </div>

                <!-- Input Nomor Telepon -->
                <div class="mb-4">
                    <label for="number-phone" class="labels-style-modal">Nomor Telepon</label>
                    <input type="number" id="number-phone" name="number-phone" class="input-modal-style"
                        placeholder="Masukkan nomor telepon (boleh kosong)" x-model="currentRow.no_telp">
                </div>

                <!-- Input Email -->
                <div class=" mb-4">
                    <label for="email" class="labels-style-modal">Email</label>
                    <input type="email" id="email" name="email" class="input-modal-style"
                        placeholder="Masukkan Email (boleh kosong)" x-model="currentRow.email">
                </div>

                <!-- Input Asal (Kabupaten) -->
                <div class="mb-6">
                    <label for="asal-kab" class="labels-style-modal">Asal (Kabupaten)</label>
                    <input type="text" id="asal-kab" name="asal-kab" class="input-modal-style"
                        placeholder="Masukkan asal kabupaten" x-model="currentRow.region">
                </div>
            </div>
            <div>
                <!-- Input Nama Paket (Dropdown) -->
                <div class="mb-4">
                    <label for="name-paket" class="labels-style-modal">Pilih Paket</label>
                    <select id="name-paket" name="name-paket" class="input-modal-style"
                        @change="hargaTiket = $event.target.options[$event.target.selectedIndex].dataset.harga">
                        <option value="" disabled>Pilih nama paket</option>
                        <template
                            x-for="(package, index) in <?= htmlspecialchars(json_encode($tour_packages), ENT_QUOTES, 'UTF-8') ?>"
                            :key="index">
                            <option :value="package.name" :data-harga="package.price" x-text="package.name"
                                :selected="package.name === currentRow.tipe_paket"></option>
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
            </div>
            <div class="flex justify-end space-x-4 mt-4">
                <button @click="showEditPopup = false" type="button" class="btn-reject">
                    Batal
                </button>
                <button @click="showEditPopup = false" type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Pop up Delete -->
<div x-show="showDeletePopup" class="modal-popup" x-transition:enter="transform transition ease-out duration-300"
    x-transition:enter-start="scale-75" x-transition:enter-end="scale-100"
    x-transition:leave="transform transition ease-in duration-300" x-transition:leave-start="scale-100"
    x-transition:leave-end="scale-75">
    <div class="bg-white dark:bg-boxdark-2 p-6 rounded-lg shadow-lg">
        <h2 class="text-lg font-bold mb-4 text-boxdark dark:text-bodydark">Hapus Item</h2>
        <p class="text-boxdark dark:text-bodydark1">Apakah Anda yakin ingin menghapus item ini?</p>
        <p class="text-boxdark dark:text-bodydark1">Nama: <span x-text="currentRow ? currentRow.name : ''"></span></p>
        <div class="flex justify-end space-x-4 mt-4">
            <button @click="showDeletePopup = false" class="btn-danger">
                Hapus
            </button>
            <button @click="showDeletePopup = false" class="btn-reject">
                Batal
            </button>
        </div>
    </div>
</div>