<!-- Pop up Edit -->
<div x-show="showEditPopup" class="modal-popup" x-transition:enter="transform transition ease-out duration-300"
    x-transition:enter-start="scale-75" x-transition:enter-end="scale-100"
    x-transition:leave="transform transition ease-in duration-300" x-transition:leave-start="scale-100"
    x-transition:leave-end="scale-75">
    <div class="modal-popup-edit overflow-scroll">
        <h2 class="text-lg font-bold mb-4 text-boxdark dark:text-bodydark">Edit Paket Wisata</h2>
        <form @submit.prevent="showEditPopup = false" @submit.prevent="updateTourPackage(currentRow.id)" method=" POST"
            enctype="multipart/form-data">
            <div class=" mb-4">
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
<!-- <div x-show="showDeletePopup" class="modal-popup" x-transition:enter="transform transition ease-out duration-300"
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
                onclick="deleteTourPackage(currentRow.id)" class="btn-danger">
                Hapus
            </button>
            <button @click="showDeletePopup = false" class="btn-reject">
                Batal
            </button>
        </div>
    </div>
</div> -->

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
            <button @click="showDeletePopup = false; deleteTourPackage(currentRow.id);" class="btn-danger">
                Hapus
            </button>
            <button @click="showDeletePopup = false" class="btn-reject">
                Batal
            </button>
        </div>
    </div>
</div>


<!-- Bagian JavaScript -->

<!-- Edit Data -->
<script>
    const updateTourPackage = async (id) => {
        try {
            const formData = new FormData();
            formData.append('name', currentRow.name);
            formData.append('price', currentRow.price);
            formData.append('expiration', currentRow.expiration);
            formData.append('visible', currentRow.visible ? '1' : '0');
            // tambahkan data lain yang perlu di-update

            // Pengecekan URL sebelum melakukan fetch
            const appUrl = "<?php echo base_url() ?>";
            if (!appUrl) {
                throw new Error('APP_URL is not set properly.');
            }

            const url = `${appUrl}/dashboard/paket/update?id=${id}`;
            const response = await fetch(url, {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                throw new Error('Failed to update Tour Package.');
            }

            showEditPopup = false;

        } catch (error) {
            console.error('Error updating Tour Package:', error);
        }
    };

</script>

<!-- JavaScript menggunakan Alpine.js -->
<script>
    const app = {
        showDeletePopup: false,
        currentRow: null,
        paketList: <?php echo htmlspecialchars(json_encode($list_paket), ENT_QUOTES, 'UTF-8'); ?>,

        deleteTourPackage(id) {
            // Kirim permintaan penghapusan ke server
            fetch(`<?php echo base_url() ?>/dashboard/paket/delete?id=${id}`, {
                method: 'POST',
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to delete Tour Package.');
                    }
                    // Hapus item dari daftar lokal setelah berhasil
                    this.paketList.splice(this.paketList.findIndex(paket => paket.id === id), 1);
                    this.showDeletePopup = false;
                })
                .catch(error => {
                    console.error('Error deleting Tour Package:', error);
                    // Tampilkan pesan atau tindakan lain jika gagal menghapus
                });
        },
    };
</script>