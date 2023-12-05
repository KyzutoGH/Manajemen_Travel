<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Akun Saya</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Akun Saya</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <?php
                    $aidi = $_GET['IDPelanggan'];
                    $data = mysqli_query($koneksi, "select * from pelanggan WHERE IDPelanggan=$aidi");
                    $d = mysqli_fetch_array($data)
                    ?>
                    <div class="box-body">
                        <div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <img class="profile-user-img img-responsive img-circle" src="../dist/img/user4-128x128.jpg" alt="User profile picture">
                                    <h3 class="profile-username text-center"><?php echo $d['NamaPelanggan']; ?></h3>
                                    <p class="text-muted text-center">Software Engineer</p>
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Followers</b> <a class="pull-right">1,322</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Following</b> <a class="pull-right">543</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Friends</b> <a class="pull-right">13,287</a>
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>

                                </div>
                                <div class="col-sm-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>