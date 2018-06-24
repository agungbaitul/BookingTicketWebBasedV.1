<?php
include "../inc/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon"  href="../images/logo.jpg"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script language='javascript' >
        var txt=' Selamat Datang di Website Primajasa *****';
        var speed=300;var refresh=null;function move() { document.title=txt;
        txt=txt.substring(1,txt.length)+txt.charAt(0);
        refresh=setTimeout("move()",speed);}move();
    </script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="../images/primajasa.jpg" alt="" width="250" height="200" class="navbar-brand">
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                        <li class="utama">
                            <a href="../inc/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-desktop"></i> Home</a>
                    </li>
                    <li>
                        <a href="datauser.php"><i class="fa fa-fw fa-edit"></i> Data User </a>
                    </li>
                    <li>
                        <a href="datasupir.php"><i class="fa fa-fw fa-edit"></i> Data Supir </a>
                    </li>
                    <li>
                        <a href="datajadwal.php"><i class="fa fa-fw fa-edit"></i> Data Jadwal </a>
                    </li>
                    <li>
                        <a href="datakendaraan.php"><i class="fa fa-fw fa-edit"></i> Data Kendaraan </a>
                    </li>
                    <li class="active">
                        <a href="databookinguser.php"><i class="fa fa-fw fa-edit"></i> Data Booking User </a>
                    </li>
                    <li>
                        <a href="databookingmember.php"><i class="fa fa-fw fa-edit"></i> Data Booking Member </a>
                    </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Booking User
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class=""></i> Menu
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Booking
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php
                    $no_pesan = @$_POST['no_pesan'];
                    $no_pesan = @$_GET['id'];
                    $aksi = @$_GET['aksi'];
                    if(($aksi<>"") and ($no_pesan<>"")){
                    $sql_delete = "delete from tb_user where no_pesan='$no_pesan'" or die (mysqli_error());
                    $delete = mysqli_query($con, $sql_delete);
                    echo "<script type=text/javascript>window.location.href='http://localhost/primajasa/admin/databookinguser.php';</script>" ;
                                    }
                                    ?>
                        
                        <div class="jumbotron">
                        <fieldset>
                        <form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <tr style="background-color:#fc0;">
                                <th>No Pemesanan</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Tanggal</th>
                                <th>Seat</th>
                                <th>Opsi</th>
                            </tr>

                            <?php
                            $sql = "select * from tb_user" or die (mysqli_error());
                            $tampil = mysqli_query($con, $sql);
                            while($data = mysqli_fetch_array($tampil)) {        
                            ?>

                            <tr>
                                <td><?php echo $data['no_pesan']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['tgl_keb']; ?></td>
                                <td><?php echo $data['seat']; ?></td>
                                <td align="center">
                                <a  href="editbookinguser.php?id=<?php echo $data['no_pesan']; ?>" class="btn btn-xs btn-default" title="Edit" ><i class="fa fa-edit fa-fw"></i></a>
                                <a onclick="return confirm('Anda yakin akan menghapus');" href="databookinguser.php?id=<?php echo $data['no_pesan']; ?>&aksi=hapus" class="btn btn-xs btn-default" title="Hapus"><i class="fa fa-times fa-fw"></i></a>
                                </td>
                            </tr>

                            <?php
                            }
                            ?>

                            </table>
                            </form>
                            </fieldset>
                            </div>

                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <p><font face="Time New Roman" color="#000000"><center>Copyright ©2016 Primajasa All Rights Reserved </center></font></p>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
