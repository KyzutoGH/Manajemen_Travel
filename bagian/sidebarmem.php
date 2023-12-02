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
                    $armadaActive = ($submenu == "Jadwal") ? "active" : "";
                    $jadwalActive = ($submenu == "Pencarian") ? "active" : "";
                    ?>
                    <li class="<?= $armadaActive ?>">
                        <a href="<?= isset($subzero) && ($subzero == "Jadwal" || $subzero == "Pencarian") ? '..' : '.' ?>/index.php?submenu=Jadwal">
                            <i class="fa fa-bus text-aqua"></i> Data Perjalanan
                        </a>
                    </li>
                    <li class="<?= $jadwalActive ?>">
                        <a href="<?= isset($subzero) && ($subzero == "Jadwal" || $subzero == "Pencarian") ? '..' : '.' ?>/index.php?submenu=Pencarian">
                            <i class="fa fa-table text-red"></i> Pencarian perjalanan
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
        </ul>
    </section>
</aside>
