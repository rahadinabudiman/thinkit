
<?php
$GetData = $koneksi->query("SELECT * FROM settings WHERE title='Alamat'");
$row = $GetData->fetch_assoc();

$GetDataHubungi = $koneksi->query("SELECT * FROM settings WHERE title='Hubungi Kami'");
$rowHubungi = $GetDataHubungi->fetch_assoc();

$GetDataJamKerja = $koneksi->query("SELECT * FROM settings WHERE title='Jam Kerja'");
$rowJamKerja = $GetDataJamKerja->fetch_assoc();
?>

 <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                     Current Address : <?php echo $row['keterangan']; ?></div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                        <form method="POST">
            <input class="form-control" type="text" name="alamat_kami" value="<?php echo $row['keterangan']; ?>"required>
            <button class="btn btn-primary btn-sm ms-auto" name="simpan_alamat">Simpan Data</button>
        </form>
        <?php
        if(isset($_POST['simpan_alamat'])){
            $id = $row['id'];

            $alamat = $_POST['alamat_kami'];
            $koneksi->query("UPDATE settings SET keterangan='$alamat' WHERE id='$id'");
            echo "<script>alert('Data Alamat Berhasil Diubah');</script>";
            echo "<script>location='index.php?halaman=setting';</script>";
        }
        ?>
    </div>
                 </div>
                 <div class="col-auto">
                     <i class="fas fa-calendar fa-2x text-gray-300"></i>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                     Current Phone : <?php echo $rowHubungi['keterangan']; ?></div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                     <form method="POST">
                        <input class="form-control" type="text" name="hubungi_kami" value="<?php echo $rowHubungi['keterangan']; ?>"required>
                        <button class="btn btn-primary btn-sm ms-auto" name="simpan_hubungi">Simpan Data</button>
                     </form>
                     <?php
                        if(isset($_POST['simpan_hubungi'])){
                            $id = $rowHubungi['id'];

                            $hubungi = $_POST['hubungi_kami'];
                            $koneksi->query("UPDATE settings SET keterangan='$hubungi' WHERE id='$id'");
                            echo "<script>alert('Data Hubungi Berhasil Diubah');</script>";
                            echo "<script>location='index.php?halaman=setting';</script>";
                        }
                     ?>
                    </div>
                 </div>
                 <div class="col-auto">
                     <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4">
     <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jam Kerja
                     </div>
                     <div class="row no-gutters align-items-center">
                         <div class="col-auto">
                             <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                             <form method="POST">
                                <input class="form-control" type="text" name="jam_kerja" value="<?php echo $rowJamKerja['keterangan']; ?>"required>
                                <button class="btn btn-primary btn-sm ms-auto" name="simpan_jam">Simpan Data</button>
                            </form>
                            <?php
                                if(isset($_POST['simpan_jam'])){
                                    $id = $rowJamKerja['id'];

                                    $jam_kerja = $_POST['jam_kerja'];
                                    $koneksi->query("UPDATE settings SET keterangan='$jam_kerja' WHERE id='$id'");
                                    echo "<script>alert('Data Hubungi Berhasil Diubah');</script>";
                                    echo "<script>location='index.php?halaman=setting';</script>";
                                }
                            ?>
                            </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                 </div>
             </div>
         </div>
     </div>
</div>