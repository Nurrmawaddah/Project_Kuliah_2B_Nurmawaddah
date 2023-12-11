<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_keluar LEFT JOIN tb_user ON tb_user.id_user = tb_keluar.id_user");
while ($record = mysqli_fetch_array($query)) {
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
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah Barang Keluar</button>
                </div>
            </div>
            <!-- Modal tambah pupuk keluar  -->
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
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="uploadFoto" name="kode_keluar" value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                                            <label for="uploadFoto">Kode Keluar</label>
                                            <div class="invalid-feedback">
                                                Masukan Kode Keluar.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="nama pupuk" name="nama_pupuk" required>
                                            <label for="floatingInput">Nama Pupuk</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pupuk.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" required>
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
                            <button type="submit" class="btn btn-primary" name="input_order_validate" value="12345">Buat Data Keluar</button>
                        </div>
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
                <div class="modal fade" id="ModalEdit<?php echo $row['id_keluar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang Keluar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_edit_barangkeluar.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="uploadFoto" name="kode_keluar" value="<?php echo $row['id_keluar'] ?>" readonly>
                                                <label for="uploadFoto">Kode Keluar</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Kode Keluar.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="nama pupuk" name="nama_pupuk" value="<?php echo $row['nama_pupuk'] ?>" required>
                                                <label for="floatingInput">Nama Pupuk</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Pupuk.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" value="<?php echo $row['pelanggan'] ?>" required>
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
                                <button type="submit" class="btn btn-primary" name="edit_order_validate" value="12345">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end modal edit -->

                <!-- Modal view pupuk baru-->
                <div class="modal fade" id="ModalView<?php echo $row['id_keluar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pupuk </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_barangkeluar.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="uploadFoto" name="kode_keluar" value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                                                <label for="uploadFoto">Kode Keluar</label>
                                                <div class="invalid-feedback">
                                                    Masukan Kode Keluar.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="nama pupuk" name="nama_pupuk" required>
                                                <label for="floatingInput">Nama Pupuk</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Pupuk.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" required>
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
                                <button type="submit" class="btn btn-primary" name="input_order_validate" value="12345">Buat Data Keluar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
    <!-- end modal view barang keluar-->

    <!-- Modal delete-->
    <div class="modal fade" id="ModalDelete<?php echo $row['id_keluar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Barang Keluar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="proses/proses_delete_keluar.php" method="POST">
                        <input type="hidden" value="<?php echo $row['id_keluar'] ?>" name="kode_keluar">
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
<div class="table-responsive ms-3 mt-2 me-3">
    <table class="table table-hover" id="example">
        <thead>
            <tr class="text-nowap">
                <th scope="col">No</th>
                <th scope="col">Kode Barang Keluar</th>
                <th scope="col">Nama Barang Keluar</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Kasir</th>
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
                    <td><?php echo $row['id_keluar'] ?></td>
                    <td><?php echo $row['nama_pupuk'] ?></td>
                    <td><?php echo $row['pelanggan'] ?></td>
                    <td><?php echo $row['id_user'] ?></td>
                    <td><?php echo $row['waktu'] ?></td>
                    <td>
                        <div class="d-flex">

                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id_keluar'] ?>"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_keluar'] ?>"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_keluar'] ?>"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
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