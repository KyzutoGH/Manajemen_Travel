<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            
            <!-- Perjalanan Menu -->
            <li class="treeview <?= ($submenu == "Armada" || $submenu == "Jadwal") ? "active" : "" ?>">
                <a href="#">
                    <i class="fa fa-table" style="color: skyblue;"></i><span>Perjalanan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php
                    $subzero = isset($_GET['subzero']) ? $_GET['subzero'] : '';
                    $armadaActive = ($submenu == "Armada") ? "active" : "";
                    $jadwalActive = ($submenu == "Jadwal") ? "active" : "";
                    ?>
                    <li class="<?= $armadaActive ?>">
                        <a href="<?= isset($subzero) && ($subzero == "Armada" || $subzero == "Jadwal") ? '..' : '.' ?>/index.php?submenu=Armada">
                            <i class="fa fa-bus text-aqua"></i> Data Armada
                        </a>
                    </li>
                    <li class="<?= $jadwalActive ?>">
                        <a href="<?= isset($subzero) && ($subzero == "Jadwal" || $subzero == "Armada") ? '..' : '.' ?>/index.php?submenu=Jadwal">
                            <i class="fa fa-table text-red"></i> Data Jadwal
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Pelanggan Menu -->
            <li class="treeview <?= ($submenu == "Pelanggan" || $submenu == "Penumpang") ? "active" : "" ?>">
                <a href="#">
                    <i class="fa fa-user" style="color: skyblue;"></i><span>Pelanggan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php
                    $pelangganActive = ($submenu == "Pelanggan") ? "active" : "";
                    $penumpangActive = ($submenu == "Penumpang") ? "active" : "";
                    ?>
                    <li class="<?= $pelangganActive ?>">
                        <a href="<?= isset($subzero) && ($subzero == "Pelanggan") ? '..' : '.' ?>/index.php?submenu=Pelanggan">
                            <i class="fa fa-bus text-aqua"></i> Data Pelanggan
                        </a>
                    </li>
                    <li class="<?= $penumpangActive ?>">
                        <a href="<?= isset($subzero) && ($subzero == "Penumpang") ? '..' : '.' ?>/index.php?submenu=Penumpang">
                            <i class="fa fa-table text-red"></i> Data Penumpang
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Transaksi Menu -->
            <li class="<?= ($submenu == "Transaksi") ? "active" : "" ?>">
                <a href="<?= isset($subzero) && ($subzero == "Transaksi") ? '..' : '.' ?>/index.php?submenu=Transaksi">
                    <i class="fa fa-money text-green"></i><span>Transaksi</span>
                </a>
            </li>

            <!-- Laporan Menu -->
            <li class="<?= ($submenu == "Laporan") ? "active" : "" ?>">
                <a href="<?= isset($subzero) && ($subzero == "Laporan") ? '..' : '.' ?>/index.php?submenu=Laporan&tanggal=<?= date('Y-m-d'); ?>">
                    <i class="fa fa-print text-yellow"></i><span>Laporan</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
