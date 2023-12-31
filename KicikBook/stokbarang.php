<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_barang");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kat_pupuk = mysqli_query($conn, "SELECT id_pupuk,nama_pupuk FROM tb_barang");
?>

<div class="col-lg-9 mt-2 ">
    <div class="card">
        <div class="card-header">
            Halaman Stok Barang
        </div>
        <div class="card-body">
            <?php
            if (empty($result)) {
                echo "Data Pupuk Tidak Ada";
            } else {
                foreach ($result as $row) {
            ?>
                    <!-- Modal view-->
                    <div class="modal fade" id="ModalView<?php echo $row['id_pupuk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Pupuk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_pupuk.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['nama_pupuk'] ?>">
                                                    <label for="floatingInput">Nama Pupuk</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Pupuk.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Keterangan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" aria-label="Default select example">
                                                        <option selected hidden value="">Pilih Kategori Pupuk</option>
                                                        <?php
                                                        foreach ($select_kat_menu as $value) {
                                                            if ($row['kategori'] == $value['id_kat_pupuk']) {
                                                                echo "<option selected value=" . $value['id_kat_pupuk'] . ">$value[kategori_pupuk]</option>";
                                                            } else {
                                                                echo "<option value=" . $value['id_kat_pupuk'] . ">$value[kategori_pupuk]</option>";
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                    <label for="floatingInput">Kategori Pupuk</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Kategori Pupuk.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" placeholder="stok" value="<?php echo $row['stock'] ?>">
                                                    <label for="floatingInput">Stok</label>
                                                    <div class="invalid-feedback">
                                                        Jumlah Stok Pupuk.
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
                    <!-- end modal view -->

                    <!-- Modal edit-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id_pupuk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pupuk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_pupuk.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $row['id_pupuk'] ?>" name="id_pupuk">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto" required>
                                                    <label class="input-group-text" for="uploadFoto">Upload Photo Pupuk</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Foto
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="nama pupuk" name="nama_pupuk" required value="<?php echo $row['nama_pupuk'] ?>">
                                                    <label for="floatingInput">Nama Pupuk</label>
                                                    <div class="invalid-feedback">
                                                        Masukkkan Nama Pupuk.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="keterangan" name="keterangan" value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Keterangan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" aria-label="Default select example" name="kat_pupuk">
                                                        <option selected hidden value="">Pilih Kategori Pupuk</option>
                                                        <?php
                                                        foreach ($select_kat_menu as $value) {
                                                            if ($row['kategori'] == $value['id_kat_pupuk']) {
                                                                echo "<option selected value=" . $value['id_kategori'] . ">$value[kategori_pupuk]</option>";
                                                            } else {
                                                                echo "<option value=" . $value['id_kategori'] . ">$value[kategori_pupuk]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Kategori Pupuk</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Kategori Pupuk
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="stok" name="stok" required value="<?php echo $row['stock'] ?>">
                                                    <label for="floatingInput">Stok</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Stok Pupuk.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn" style="background-color :violet;" name="input_menu_validate" value="12345">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal edit -->



                    <!-- Modal delete-->
                    <div class="modal fade" id="ModalDelete<?php echo $row['id_pupuk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Pupuk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_stockbarang.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id_pupuk'] ?>" name="id_pupuk">
                                        <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                        <div class="col-lg-12">
                                            Apakah anda inggin menghapus data pupuk ini <b><?php echo $row['nama_pupuk'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345">Delete</button>
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
                                <th scope="col">Foto Pupuk</th>
                                <th scope="col">Nama Pupuk</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Stok</th>
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
                                    <td>
                                        <div style="width: 70px"><img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="..."></div>
                                    </td>
                                    <td><?php echo $row['nama_pupuk'] ?></td>
                                    <td><?php echo $row['keterangan'] ?></td>
                                    <td><?php echo $row['stock'] ?></td>
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