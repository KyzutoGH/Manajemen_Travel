<div class="row">
    <div class="col-md-offset-4 col-md-4">
        <div class="panel panel-warning">
            <div class="panel-heading">
                Informasi
            </div>
            <div class="panel-body">
                <?php
                // Get the current URL
                $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                // Determine the base URL
                $baseURL = dirname($currentURL) . "/";

                // Set the login path based on whether it's an admin or pelanggan page
                $loginPath = strpos($currentURL, "/admin/") !== false ? "../admin/login.php" : "../pelanggan/login.php";
                ?>
                <p>Maaf, Anda tidak berhak mengakses halaman ini secara langsung. Silahkan login terlebih dahulu.</p>
                <a class="btn btn-warning pull-right" role="button" href="<?php echo $baseURL . $loginPath; ?>">Login</a>
            </div>
        </div>
    </div>
</div>