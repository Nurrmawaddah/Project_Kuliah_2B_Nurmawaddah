<nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width:250px">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']== 'home') ? 'active link-light' : 'link-dark' ; ?> " aria-current="page" href="home"><i class="bi bi-house"></i> Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']== 'user') ? 'active link-light' : 'link-dark' ; ?> " href="user"><i class="bi bi-person-fill"></i> User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']== 'masuk') ? 'active link-light' : 'link-dark' ; ?> " href="masuk"><i class="bi bi-box-arrow-right"></i> Barang Masuk</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']== 'keluar') ? 'active link-light' : 'link-dark' ; ?> " href="keluar"><i class="bi bi-box-arrow-left"></i> Barang Keluar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']== 'report') ? 'active link-light' : 'link-dark' ; ?> " href="report"><i class="bi bi-file-bar-graph"></i> Report</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>