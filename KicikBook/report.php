<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_keluar.*,nama, nama_pupuk FROM tb_keluar
                            LEFT JOIN tb_user ON tb_user.id_user = tb_keluar.id_user
                            LEFT JOIN tb_barang ON tb_barang.id_pupuk = tb_keluar.id_pupuk
                            WHERE tb_keluar.tanggal_keluar BETWEEN '2023-12-01 00:00:00' AND '2023-12-31 23:59:59'
                            ORDER BY tb_keluar.tanggal_keluar ASC");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Report
        </div>
        <div class="card-body">

            <?php
            if (empty($result)) {
                echo "Data Tidak Ada";
            } else {
            ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowap">
                                <th scope="col">No</th>
                                <th scope="col">ID Keluar</th>
                                <th scope="col">Tanggal Keluar</th>
                                <th scope="col">Jumlah Keluar</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Nama Pupuk</th>
                                <th scope="col">Nama Kasir</th>
                                <!-- <th scope="col">Aksi</th> -->
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
                                    <td><?php echo $row['tanggal_keluar'] ?></td>
                                    <td><?php echo $row['jumlah_keluar'] ?></td>
                                    <td><?php echo $row['pelanggan'] ?></td>
                                    <td><?php echo $row['nama_pupuk'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- Tambahkan aksi sesuai kebutuhan -->
                                            <!-- Contoh: <a class="btn btn-info btn-sm me-1" href="#">Aksi</a> -->
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