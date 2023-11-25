<div class="card-body">
    <form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">
                <h2>Tambah Data Category</h2>
                </p>
                <button class="btn btn-primary btn-sm ms-auto" name="simpan">Simpan Data</button>
            </div>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Category</label>
                        <input class="form-control" type="text" name="nama_category" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Deskripsi Category</label>
                        <input class="form-control" type="text" name="deskripsi_category" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Summary Category</label>
                        <input class="form-control" type="text" name="summary_category" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto Category</label>
                            <input class="form-control" type="file" name="foto_category" required>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form>
</div>
<?php 
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');
    if(isset($_POST['simpan'])){
        // check if file is not jpeg or jpg or png
        $allowed = array('jpeg', 'jpg', 'png');
        $filename = $_FILES['foto_category']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            echo "<div class='alert alert-danger'>Foto harus berformat jpeg, jpg, atau png</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_category'>";
            exit();
        }

        if (empty($_FILES['foto_category']['name'])) {
            echo "<div class='alert alert-danger'>Foto tidak boleh kosong</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_category'>";
            exit();
        } else {
            $nama = $_FILES['foto_category']['name'];
            $lokasi = $_FILES['foto_category']['tmp_name'];
            move_uploaded_file($lokasi, "assets/images/category/".$nama);
    
            $koneksi->query("INSERT INTO category (nama_category, deskripsi_category, summary_category, images_category) VALUES ('$_POST[nama_category]', '$_POST[deskripsi_category]', '$_POST[summary_category]', '$nama')");
            
            echo "<div class='alert alert-info'>Data Tersimpan</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=category'>";
        }
    }
?>