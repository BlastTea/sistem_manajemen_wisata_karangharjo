<!-- Pop up Edit -->
<div x-show="showEditPopup" class="modal-popup" x-transition:enter="transform transition ease-out duration-300"
    x-transition:enter-start="scale-75" x-transition:enter-end="scale-100"
    x-transition:leave="transform transition ease-in duration-300" x-transition:leave-start="scale-100"
    x-transition:leave-end="scale-75">
    <div class="modal-popup-edit overflow-scroll">
        <h2 class="text-lg font-bold mb-4 text-boxdark dark:text-bodydark">Edit Paket Wisata</h2>
        <form @submit.prevent="showEditPopup = false">
            <div class="mb-4">
                <label class="labels-style-modal dark:text-white">Nama</label>
                <input type="text" class="input-modal-style" x-model="currentRow.name">
            </div>
            <div class="mb-4">
                <label class="labels-style-modal dark:text-white">Harga</label>
                <input type="text" class="input-modal-style" x-model="currentRow.price">
            </div>
            <div class="mb-4">
                <label class="labels-style-modal dark:text-white">Tanggal</label>
                <input type="text" class="input-modal-style" x-model="currentRow.expiration">
            </div>
            <div class="mb-4">
                <label class="labels-style-modal dark:text-white">Visible</label>
                <select class="input-modal-style" x-model="currentRow.visible">
                    <option :value="true">Yes</option>
                    <option :value="false">No</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="labels-style-modal dark:text-white">Image</label>
                <input type="file" @change="updateImage($event)" class="input-modal-style">
                <img :src="previewImage" alt="Image Preview" class="mt-4 h-32">
            </div>
            <div class="flex justify-end space-x-4 mt-4">
                <button @click="showEditPopup = false" type="button" class="btn-reject">
                    Batal
                </button>
                <button type="submit"
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
        <h2 class="text-lg font-bold mb-4 text-boxdark dark:text-bodydark">Hapus Paket Wisata</h2>
        <p class="text-boxdark dark:text-bodydark1">Apakah Anda yakin ingin menghapus paket wisata ini?</p>
        <p class="text-boxdark dark:text-bodydark1">Nama: <span x-text="currentRow ? currentRow.name : ''"></span>
        </p>
        <div class="flex justify-end space-x-4 mt-4">
            <button @click="showDeletePopup = false; paketList.splice(paketList.indexOf(currentRow), 1)"
                class="btn-danger">
                Hapus
            </button>
            <button @click="showDeletePopup = false" class="btn-reject">
                Batal
            </button>
        </div>
    </div>
</div>

<script>
    function updateImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                currentRow.image = e.target.result;
                previewImage = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>