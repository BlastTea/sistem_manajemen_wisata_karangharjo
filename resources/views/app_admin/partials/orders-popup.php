<!-- Pop up Edit -->
<div x-show="showEditPopup" class="modal-popup" x-transition:enter="transform transition ease-out duration-300"
    x-transition:enter-start="scale-75" x-transition:enter-end="scale-100"
    x-transition:leave="transform transition ease-in duration-300" x-transition:leave-start="scale-100"
    x-transition:leave-end="scale-75">
    <div class="modal-popup-edit z-9999">
        <h2 class="text-lg font-bold mb-4 text-boxdark dark:text-bodydark">Edit Item</h2>
        <form>
            <div class="mb-4">
                <label class="labels-style-modal">Nama</label>
                <input type="text" class="input-modal-style" x-model="currentRow.name">
            </div>
            <div class="mb-4">
                <label class="labels-style-modal">Harga</label>
                <input type="text" class="input-modal-style" x-model="currentRow.price">
            </div>
            <div class="mb-4">
                <label class="labels-style-modal">Tanggal</label>
                <input type="date" class="input-modal-style" x-model="currentRow.date">
            </div>
            <div class="flex justify-end space-x-4 mt-4">
                <button @click="showEditPopup = false" type="button" class="btn-reject">
                    Batal
                </button>
                <button @click="showEditPopup = false" type="button"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">
                    Simpan
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