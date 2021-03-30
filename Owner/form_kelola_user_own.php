<?php 
	
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../login_own.php");
	}
	include("../Modul Database/koneksi.php");
	include("../Modul Database/databaseprovider.php");
	$edit="";
	if(isset($_GET['edit'])){
		$edit = $_GET['edit'];
	}
?>
<!DOCTYPE php>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Firli.id</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/php5shiv/3.7.2/php5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body id="mimin" class="dashboard">
    <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index_own.php" class="navbar-brand"> 
                 <b>FIRLI.ID</b>
                </a>

              <ul class="nav navbar-nav search-nav">
                <li>
                   <div class="search">
                    <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                    <div class="form-group form-animate-text">
                      <input type="text" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search">Type anywhere to <b>Search</b> </label>
                    </div>
                  </div>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><?php
								
								if(isset($_SESSION["username"])){
									echo explode("_",$_SESSION["username"])[0];
								}
							?></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                  <ul class="dropdown-menu user-dropdown">
						<li><a href="../logOut.php"><span class="fa fa-power-off "></span> Log Out</a></li>
					 </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li >
                        <a href="index_own.php">
                           <span class="fa fa-dashboard"></span>Dashboard
                        </a>
                    </li>
                    <li ><a class="tree-toggle nav-header"><span class="fa fa-user"></span> Kelola User<span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="kelola_user_cs.php">Kelola User CS</a></li>
                        <li><a href="kelola_user_adv.php">Kelola User Advertiser</a></li>
                        <li><a href="kelola_user_own.php">Kelola User Owner</a></li>
                        <li><a href="kelola_user_relation.php">Pengaturan Input User</a></li>
                      </ul>
                    </li>
                    <li ><a class="tree-toggle nav-header"><span class="fa fa-table"></span> Melihat Data<span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="data_cs.php">Melihat Data CS</a></li>
                        <li><a href="data_adv.php">Melihat Data Advertiser</a></li>
                      </ul>
                    </li>
                    <li >
                        <a href="input_target.php">
                           <span class="fa fa-pencil"></span>Input Presentasi Acv
                        </a>
                    </li>
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->
          
          <!-- start: Content -->
            <div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Form Kelola User Owner</h3>
                        <p class="animated fadeInDown">
                          Kelola User <span class="fa-angle-right fa"></span> Kelola User Own <span class="fa-angle-right fa"></span> Tambah Data User Owner
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Tambah Data Owner</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:20px;">
                          <div class="col-md-12">
						    <?php 
								$query = mysqli_query($conn,"SELECT * FROM ds_account_owner where id_account_own='$edit'");
								$data = mysqli_fetch_array($query);
							?>
                            <form method="POST">
								<div class="form-group"><label class="col-sm-2 control-label text-right">Nama Owner</label>
								  <div class="col-sm-10"><input required value="<?php echo "$data[nama_owner]"; ?>" name="nama" type="text" class="form-control" placeholder="Nama Own"></div>
								</div>
								<div class="form-group">
								 <label class="col-sm-2 control-label text-right">Username/Email</label>
								  <div class="col-sm-10">
								 <input onkeypress="return event.keyCode != 32;" required value="<?php echo "$data[username]"; ?>" name="username" type="text" class="form-control" placeholder="Email">
								
								</div>
								</div>
								<div class="form-group"><label class="col-sm-2 control-label text-right">Password</label>
								  <div onkeypress="return event.keyCode != 32;" class="col-sm-10"><input required value="<?php echo "$data[password_owner]"; ?>" name="password" type="text" class="form-control" placeholder="Password"></div>
								</div>
								<div class="panel-body">
									<div class="col-sm-10"></div>
									<input name="addUser" type="submit" class=" btn btn-3d btn-primary" value="<?php echo ($edit =="" ? "Tambah Data" : "Edit Data") ; ?>"/>   
								</div>
							</form>
                          </div>
						  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          <!-- end: content -->
          <?php 
			if(isset($_POST['addUser'])){
				$username = $_POST['username'];
				$nama = $_POST['nama'];
				$password = $_POST['password'];
				$check;
				$databaseprovider = new databaseprovider($conn); 
				if($edit=="") {
								$check = $databaseprovider->insert_akun(
							                               $username,
														   $nama,
														   $password,
														   3);
				
				}else{
				
							$check = $databaseprovider->update_akun(
														   $edit,
							                               $username,
														   $nama,
														   $password,
														   3);
				
				} 
										
				if($check) {
					echo"<script> alert('data berhasil masuk');  </script>";
				}else{
					echo"<script> alert('data gagal masuk');  </script>";
				}
				
				echo "<script>window.location.href='../Owner/kelola_user_own.php'; </script>";
			}
		  ?>
      </div>

<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>


<!-- custom -->
<script src="asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
<!-- end: Javascript -->
</body>
</html>