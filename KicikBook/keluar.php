<?php
include "proses/connect.php";
// Query untuk mengambil daftar pupuk dari tabel tb_barang
$query_pupuk = mysqli_query($conn, "SELECT * FROM tb_barang");
while ($row_pupuk = mysqli_fetch_assoc($query_pupuk)) {
    $daftar_pupuk[] = $row_pupuk;
}

// Query untuk mengambil data keluar beserta nama pupuk dan nama user
$query_keluar = mysqli_query($conn, "SELECT tb_keluar.*, tb_barang.nama_pupuk, tb_user.nama
                            FROM tb_keluar
                            JOIN tb_barang ON tb_keluar.id_pupuk = tb_barang.id_pupuk
                            JOIN tb_user ON tb_keluar.id_user = tb_user.id_user");

while ($record = mysqli_fetch_array($query_keluar)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2 ">
    <div class="card">
        <div class="card-header">
            Halaman Barang Keluar
        </div>
        <div>
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button class="btn" style="background-color :violet;" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah Barang Keluar</button>
                    </div></div>
                    <!-- Modal tambah pupuk keluar -->
                    <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pupuk Keluar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_barangkeluar.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="form-floating mb-3">
                                                    <!-- Dropdown untuk memilih produk -->
                                                    <select class="form-select" aria-label="Default select example" name="id_pupuk" required>
                                                        <option selected hidden value="">Pilih Nama Pupuk</option>
                                                        <?php
                                                        // Tampilkan daftar nama pupuk dari tabel pupuk
                                                        foreach ($daftar_pupuk as $pupuk) {
                                                            echo "<option value=\"" . $pupuk['id_pupuk'] . "\">" . $pupuk['nama_pupuk'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="nama_pupuk">Nama Pupuk</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Nama Pupuk.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-floating mb-3">
                                                    <!-- Input untuk jumlah stock yang keluar -->
                                                    <input type="number" class="form-control" id="jumlah_keluar" placeholder="Jumlah Stock Keluar" name="jumlah_keluar" required>
                                                    <label for="jumlah_keluar">Jumlah Stock Keluar</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Jumlah Stock Keluar.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <!-- Input untuk nama pelanggan -->
                                                    <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" required>
                                                    <label for="pelanggan">Nama Pelanggan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Pelanggan.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn" style="background-color :violet;" name="input_order_validate" value="12345">Buat Data Keluar</button>
                                </div>
                                    </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            

                <!-- end modal tambah barang keluar-->
                <?php
                if (empty($result)) {
                    echo "Data Barang Keluar Tidak Ada";
                } else {
                    foreach ($result as $row) {
                ?>


                        <!-- Modal edit-->
                        <div class="modal fade" id="ModalEdit<?php echo $row['id_pupuk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang Keluar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_edit_barangkeluar.php" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="uploadFoto" name="kode_keluar" value="<?php echo $row['id_keluar'] ?>" readonly>
                                                        <label for="uploadFoto">Kode Keluar</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Kode Keluar.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="nama pupuk" name="nama pupuk" value="<?php echo $row['nama_pupuk'] ?>" required>
                                                        <label for="floatingInput">Nama Pupuk</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama Pupuk.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" value="<?php echo $row['pelanggan'] ?>" required>
                                                        <label for="pelanggan">Nama Pelanggan</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama Pelanggan.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="nama pupuk" name="Kasir" required value="<?php echo $row['nama'] ?>">
                                                        <label for="floatingInput">Nama Kasir</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama Kasir
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn" style="background-color :violet;" name="edit_order_validate" value="12345">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end modal edit -->

                        <!-- Modal view pupuk keluar-->
                        <div class="modal fade" id="ModalView<?php echo $row['id_pupuk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Pupuk </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_input_barangkeluar.php" method="POST">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" class="form-control" id="uploadFoto" name="kode_keluar" value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                                                        <label for="uploadFoto">Kode Keluar</label>
                                                        <div class="invalid-feedback">
                                                            Masukan Kode Keluar.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" class="form-control" id="floatingInput" placeholder="nama pupuk" value="<?php echo $row['nama_pupuk'] ?>" name="nama_pupuk" required>
                                                        <label for="floatingInput">Nama Pupuk</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama Pupuk.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" class="form-control" id="pelanggan" placeholder="Jumlah Keluar" value="<?php echo $row['jumlah_keluar'] ?>" name="jumlah_keluar" required>
                                                        <label for="pelanggan">Jumlah Keluar</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Jumlah Keluar.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" class="form-control" id="pelanggan" placeholder="Nama Kasir" value="<?php echo $row['nama'] ?>" name="nama" required>
                                                        <label for="pelanggan">Nama Kasir</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama Kasir.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" value="<?php echo $row['pelanggan'] ?>" name="pelanggan" required>
                                                        <label for="pelanggan">Nama Pelanggan</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama Pelanggan.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            <!-- end modal view barang keluar-->

            <!-- Modal delete-->
            <div class="modal fade" id="ModalDelete<?php echo $row['id_pupuk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Barang Keluar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_delete_barangkeluar.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id_keluar'] ?>" name="id_keluar">
                                <div class="col-lg-12">
                                    Apakah anda ingin menghapus barang keluar atas nama pelanggan <b><?php echo $row['pelanggan'] ?></b> dengan kode barang keluar <b><?php echo $row['id_keluar'] ?></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="delete_order_validate" value="12345">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal delete -->


        <?php
                    }

        ?>
        <div class="table-responsive mt-2 ms-3">
            <table class="table table-hover" id="example">
                <thead>
                    <tr class="text-nowap">
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang Keluar</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Kasir</th>
                        <th scope="col">Jumlah Keluar</th>
                        <th scope="col">Waktu Keluar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($result as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?php echo $row['nama_pupuk'] ?></td>
                            <td><?php echo $row['pelanggan'] ?></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['jumlah_keluar'] ?></td>
                            <td><?php echo $row['tanggal_keluar'] ?></td>
                            <td>
                                <div class="d-flex">

                                    <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id_pupuk'] ?>"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_pupuk'] ?>"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_pupuk'] ?>"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
                }
    ?>
    </div>
</div>
</div>


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>