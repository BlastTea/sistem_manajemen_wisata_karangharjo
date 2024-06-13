<!-- Pop up Edit -->
<div x-show="showEditPopup" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50"
    x-transition:enter="transform transition ease-out duration-300" x-transition:enter-start="scale-75"
    x-transition:enter-end="scale-100" x-transition:leave="transform transition ease-in duration-300"
    x-transition:leave-start="scale-100" x-transition:leave-end="scale-75">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Edit Item</h2>
        <form>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama</label>
                <input type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    x-model="currentRow.name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Harga</label>
                <input type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    x-model="currentRow.price">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Tanggal</label>
                <input type="date"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    x-model="currentRow.date">
            </div>
            <div class="flex justify-end space-x-4 mt-4">
                <button @click="showEditPopup = false" type="button"
                    class="px-4 py-2 bg-gray-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition">
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
<div x-show="showDeletePopup" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50"
    x-transition:enter="transform transition ease-out duration-300" x-transition:enter-start="scale-75"
    x-transition:enter-end="scale-100" x-transition:leave="transform transition ease-in duration-300"
    x-transition:leave-start="scale-100" x-transition:leave-end="scale-75">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Hapus Item</h2>
        <p class="text-gray-800">Apakah Anda yakin ingin menghapus item ini?</p>
        <p class="text-gray-800">Nama: <span x-text="currentRow ? currentRow.name : ''"></span></p>
        <div class="flex justify-end space-x-4 mt-4">
            <button @click="showDeletePopup = false"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition">
                Hapus
            </button>
            <button @click="showDeletePopup = false"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 transition">
                Batal
            </button>
        </div>
    </div>
</div>