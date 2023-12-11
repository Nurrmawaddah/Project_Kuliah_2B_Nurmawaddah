<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_kat_pupuk");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2 ">
    <div class="card">
        <div class="card-header">
            Halaman Kategori Pupuk
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah Kategori Pupuk</button>
                </div>
            </div>
            <!-- Modal tambah kategori Pupuk-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Pupuk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_katpupuk.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="jenispupuk" id="">
                                                <option value="1">Akar</option>
                                                <option value="2">Buah</option>
                                                <option value="3">Daun</option>
                                                <option value="4">Batang</option>
                                            </select>
                                            <label for="floatingInput">Jenis Pupuk</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jenis Pupuk.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Pupuk" name="katpupuk" required>
                                            <label for="floatingInput">Kategori Pupuk</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kategori Pupuk.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_katmenu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal kategori pupuk -->
            <?php
            foreach ($result as $row) {
            ?>
                <!-- Modal edit-->
                <div class="modal fade" id="ModalEdit<?php echo $row['id_kat_pupuk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kategori Pupuk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_edit_katpupuk.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id_kat_pupuk'] ?>" name="id">
                                <div class="row"> 
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" require name="jenispupuk" id="">
                                                    <?php
                                                    $data = array("Akar", "Buah","Daun","Batang");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['jenis_pupuk'] == $key + 1) {
                                                            echo "<option selected value = ".($key+1).">$value</option>";
                                                        } else {
                                                            echo "<option value = ".($key+1).">$value</option>";
                                                        }
                                                    }
                                                    ?>
                                        </select>
                                            <label for="floatingInput">Jenis Pupuk</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jenis Pupuk.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Pupuk" name="katpupuk" required value="<?php echo $row['kategori_pupuk'] ?>">
                                            <label for="floatingInput">Kategori Pupuk</label>
                                            <div class="invalid-feedback">
                                                Masukkan Katergori Pupuk.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_katmenu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal edit -->



                <!-- Modal delete-->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_kat_pupuk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Kategori Pupuk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_katpupuk.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_kat_pupuk'] ?>" name="id">
                                    <div class="col-lg-12">
                                    Apakah anda ingin menghapus kategori <b><?php echo $row['kategori_pupuk'] ?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="hapus_kategori_validate" value="12345">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal delete -->

            <?php
            }
            if (empty($result)) {
                echo "Data Kategori Pupuk Tidak Ada";
            } else {
            ?>
                <!-- table daftar kategori pupuk-->
                <div class="table-responsive mt-2">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Deskripsi</th>
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
                                    <td><?php echo ($row['nama_kategori'] == 1) ? "Bubuk" : "Butir" ?></td>
                                    <td><?php echo $row['deskripsi'] ?></td>
                                    <td class="d-flex">
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_kategori'] ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_kategori'] ?>"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- end table daftar kategori pupuk -->
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