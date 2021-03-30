<?php 
	
	session_start();
	if(isset($_SESSION["username"])){
		header("Location: Customer Services/index_cs.php");
		echo "LogIn";
	}
	include("Modul Database/koneksi.php");
	include("Modul Database/databaseprovider.php");
?>

<!DOCTYPE html>
<html Wlang="en">
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
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/icheck/skins/flat/aero.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body style="background-color:#fff;" >

      <div class="container">
		<br/>
		<br/>
        <form class="form-signin" method="POST">
          <div class="panel periodic-login">
              <div class="panel-body text-center">
                  <h4>Login <span style="font-size:16px;" class="label label-warning">Customer Service </span></h4><br>
                  <p class="element-name">
					<center>
					<div style="border-radius:100px;width:80px; height:80px; background-color:#fff;">
						<img style="padding-top:10px;width:60px;"  src="asset/img/firli.ID.png"/>
					</div>
					</center>
				  </p>

                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input  name="username" type="text" class="form-text" required>
                    <span class="bar"></span>
                    <label>Username</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input name="password" name="password" type="password" class="form-text" required>
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                  
                  <input name="SignIn" type="submit" class="btn col-md-12" value="LogIn"/>
              </div>
                <div class="text-center" style="padding:5px;">
                    <a href="login_adv.php">Login Sebagai  <span style="font-size:12px;" class="label label-success">Advertiser<span> </a><br/><br/>
                    <a href="login_own.php">Login Sebagai <span style="font-size:12px;" class="label label-danger">Owner</span></a>
                </div>
          </div>
        </form>
      </div>
	  
	  <?php 
		if(isset($_POST['SignIn'])){
			$username = $_POST['username']; 
			$password = $_POST['password']; 
			
		   $databaseprovider = new databaseprovider($conn); 
			$check = $databaseprovider->logIn($username, $password ,0);
			
			if($check) {
				$_SESSION['username'] = $username."_cs";			
				header('Location: Customer Services/index_cs.php');
			}
		}
	  ?>

      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="asset/js/jquery.min.js"></script>
      <script src="asset/js/jquery.ui.min.js"></script>
      <script src="asset/js/bootstrap.min.js"></script>

      <script src="asset/js/plugins/moment.min.js"></script>
      <script src="asset/js/plugins/icheck.min.js"></script>

      <!-- custom -->
      <script src="asset/js/main.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html>