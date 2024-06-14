<!-- Start Modal Add Data Paket -->
<div x-data="{ isOpen: false }">
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
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 z-999" aria-hidden="true">
    </div>

    <!-- Start Modal Tambah Paket Baru -->
    <div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90" class="modal-style">
        <div class="relative bg-white dark:bg-boxdark p-8 rounded-lg shadow-lg w-10/12">
            <!-- Isi Modal -->
            <h2 class="text-2xl font-semibold text-boxdark dark:text-gray-2 mb-6">Tambah Paket Baru</h2>
            <form action="<?php echo $_ENV['APP_URL'] . '/dashboard/paket/create' ?>" method="POST" enctype="multipart/form-data">
                <!-- Input Gambar -->
                <div class="mb-4">
                    <label for="gambar" class="labels-style-modal">Gambar Paket</label>
                    <input type="file" id="gambar" name="gambar" class="input-modal-style">
                </div>

                <!-- Input Nama -->
                <div class="mb-4">
                    <label for="nama" class="labels-style-modal">Nama Paket</label>
                    <input type="text" id="nama" name="nama" class="input-modal-style"
                        placeholder="Masukkan nama paket">
                </div>

                <!-- Input Harga -->
                <div class="mb-4">
                    <label for="harga" class="labels-style-modal">Harga Paket</label>
                    <input type="number" id="harga" name="harga" class="input-modal-style"
                        placeholder="Masukkan harga paket">
                </div>

                <!-- Input Deskripsi -->
                <div class="mb-6">
                    <label for="deskripsi" class="labels-style-modal">Deskripsi Paket</label>
                    <textarea id="deskripsi" name="deskripsi" class="input-modal-style h-32 resize-none"
                        placeholder="Masukkan deskripsi paket"></textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end space-x-3">
                    <button type="button" @click="isOpen = false" class="btn-reject">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white rounded-md hover:bg-opacity-90">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Modal -->
</div>
<!-- End Modal Add Data Paket -->