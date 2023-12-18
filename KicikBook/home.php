<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_barang");
while ($row = mysqli_fetch_array($query)) {
    $result[] = $row;
}
$query_chart = mysqli_query($conn,"SELECT nama_pupuk, tb_barang.id_pupuk FROM tb_barang
LEFT JOIN tb_kat_pupuk ON tb_kat_pupuk.id_kategori = tb_kat_pupuk.deskripsi
GROUP BY tb_barang.id_pupuk
ORDER BY tb_barang.id_pupuk ASC");

// $result_chart = array();
while ($record_chart = mysqli_fetch_array($query_chart)) {
    $result_chart[] = $record_chart;
}

$array_pupuk = array_column($result_chart,'nama_pupuk');
$array_pupuk_qoute = array_map(function ($id_pupuk){
    return "'".$id_pupuk."'";
}, $array_pupuk);
$string_pupuk = implode(',', $array_pupuk_qoute);


$array_jumlah_keluar= array_column($result_chart, 'stock');
$string_jumlah_keluar =implode( ',', $array_jumlah_keluar);


?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="col-lg-9 mt-2 ">
    <!-- carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            $slide = 0;
            $firstSlideButton = true;
            foreach ($result as $dataTombol) {
                ($firstSlideButton) ? $aktif = "active" : $aktif = "";
                $firstSlideButton = false;
            ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>" class="<?php echo $aktif ?>" aria-current="true" aria-label="Slide <?php echo $slide + 1 ?>"></button>
            <?php
                $slide++;
            }
            ?>
        </div>
        <div class="carousel-inner rounded">
            <?php
            $firstSlide = true;
            foreach ($result as $data) {
                ($firstSlide) ? $aktif = "active" : $aktif = "";
                $firstSlide = false;
            ?>
                <div class="carousel-item <?php echo $aktif ?>">
                    <img src="assets/img/<?php echo $data['foto'] ?>" class="img-fluid" style="height: 500px; width:1000px; object-fit: cover" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $data['nama_pupuk'] ?></h5>
                        <p><?php echo $data['keterangan'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end carousel -->

    <!-- judul -->
    <div class="card mt-4 border-0 bg-light">
        <div class="card-body text-center">
            <h5 class="card-title">KICIKBOOK - APLIKASI STOK BARANG</h5>
            <p class="card-text">Aplikasi stok barang di toko pupuk adalah sebuah perangkat lunak yang dirancang khusus untuk membantu manajemen dan pemantauan stok barang pada sebuah toko yang menjual pupuk. Aplikasi ini memberikan kemampuan untuk mengelola informasi stok, transaksi penjualan, penerimaan barang, dan berbagai aspek lainnya yang terkait dengan persediaan pupuk di toko.</p>
            <a href="masuk" class="btn" style="background-color: violet; color: white; text-decoration: none;">Add Barang Masuk</a>

        </div>
    </div>
<!-- end judul -->

<!-- chart -->
<div class="card mt-4 border-0 bg-light">
        <div class="card-body text-center">
        <div>
            <canvas id="myChart"></canvas>
        </div>
        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php echo $string_pupuk?>],
                    datasets: [{
                        label: 'Jumlah Pupuk Keluar',
                        data: [<?php echo $string_jumlah_keluar?>],
                        borderWidth: 1,
                        backgroundColor:[
                            'rgba(255, 182, 182, 1)',
                            'rgba(168, 249, 255, 0.6)',
                            'rgba(249, 255, 168, 1)',
                            'rgba(182, 255, 183, 1)',
                            'rgba(202, 182, 255, 1)',
                            'rgba(250, 178, 104, 1)'
                        ]
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        </div>
    </div>
</div>
<!-- end chart -->