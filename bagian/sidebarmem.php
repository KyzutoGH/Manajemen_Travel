<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <?php
            $armadaActive = ($submenu == "Jadwal") ? "active" : "";
            ?>
            <li class="<?= $armadaActive ?>">
                <a href="<?= isset($subzero) && ($subzero == "Jadwal" || $subzero == "Pencarian") ? '..' : '.' ?>/index.php?submenu=Jadwal">
                    <i class="fa fa-bus text-aqua"></i> <span>Data Perjalanan</span>
                </a>
            </li>

            <!-- Transaksi Menu -->
            <li class="<?= ($submenu == "Transaksi" || $submenu == "Akun" || $submenu == "Tiket") ? "active" : "" ?>">
                <a href="<?= isset($subzero) && ($subzero == "Transaksi") ? '..' : '.' ?>/index.php?submenu=Transaksi">
                    <i class="fa fa-money text-green"></i><span>Transaksi</span>
                </a>
            </li>
        </ul>
    </section>
</aside>