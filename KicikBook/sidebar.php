<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded border mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="width: 50px;"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link ps-3 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>" style="<?php echo (isset($_GET['x']) && $_GET['x'] == 'home') ? 'background-color: violet;' : ''; ?>" aria-current="page" href="home"><i class="bi bi-house-door"></i> Dashboard</a>

                        </li>

                        <?php if ($hasil['level'] == 1) { ?>

                            <li class="nav-item">
                                <a class="nav-link ps-3 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'user') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>" style="<?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'background-color: violet;' : ''; ?>" aria-current="page" href="user"><i class="bi bi-person-fill"></i> User</a>

                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1 || $hasil['level'] == 2 || $hasil['level'] == 3) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-3 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'katpupuk') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>" style="<?php echo (isset($_GET['x']) && $_GET['x'] == 'katpupuk') ? 'background-color: violet;' : ''; ?>" aria-current="page" href="katpupuk"><i class="bi bi-tags"></i> Kategori Pupuk</a>

                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1 || $hasil['level'] == 2 || $hasil['level'] == 3) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-3 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'stokbarang') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>" style="<?php echo (isset($_GET['x']) && $_GET['x'] == 'stokbarang') ? 'background-color: violet;' : ''; ?>" aria-current="page" href="stokbarang"><i class="bi bi-tags"></i> Stock Barang</a>

                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link ps-3 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'masuk') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>" style="<?php echo (isset($_GET['x']) && $_GET['x'] == 'masuk') ? 'background-color: violet;' : ''; ?>" aria-current="page" href="masuk"><i class="bi bi-box-arrow-right"></i> Barang Masuk</a>

                        </li>


                        <li class="nav-item">
                            <a class="nav-link ps-3 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'keluar') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>" style="<?php echo (isset($_GET['x']) && $_GET['x'] == 'keluar') ? 'background-color: violet;' : ''; ?>" aria-current="page" href="keluar"><i class="bi bi-box-arrow-left"></i> Barang Keluar</a>

                        </li>
                        <?php if ($hasil['level'] == 1 || $hasil['level'] == 2) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-3 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'report') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>" style="<?php echo (isset($_GET['x']) && $_GET['x'] == 'report') ? 'background-color: violet;' : ''; ?>" aria-current="page" href="report"><i class="bi bi-file-bar-graph"></i> Report</a>

                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>