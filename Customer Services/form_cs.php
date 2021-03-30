<?php
	
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../login_cs.php");
	}else if(isset($_SESSION["username"])){
		$temp = explode('_',$_SESSION["username"]);
		if($temp[1] != "cs" ) {
		 header("Location: ../login_cs.php");
		}
	}
	include("../Modul Database/koneksi.php");
	include("../Modul Database/databaseprovider.php");

	$id; 
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	if(isset($_GET['send'])){
		echo "<script> alert('masuk') </script>"; 
	}
	
?>
<!DOCTYPE html>
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
                <a href="index_cs.php" class="navbar-brand"> 
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
                        <li><a href="../logOut.php"><span class="fa fa-power-off "> Log Out</span></a></li>
                     
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
                    <li>
                        <a href="index_cs.php">
                           <span class="fa fa-dashboard"></span>Dashboard
                        </a>
                    </li>
					
                    <li>
                        <a href="daily_cs.php">
                           <span class="fa fa-paw"></span>Margin Sales Harian dan bonus
                        </a>
                    </li>
                    <li>
                        <a href="inputdata_cs.php">
                           <span class="fa fa-pencil"></span>Input Data
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
                        <h3 class="animated fadeInLeft">Form Data Customer Service</h3>
                        <p class="animated fadeInDown">
                          Input Data <span class="fa-angle-right fa"></span> Tambah Data
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Form Data Customer Service</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:30px;">
                          <div class="col-md-12">
						   <form onkeypress="return event.keyCode != 13;" method="POST">
								<?php
									$query = mysqli_query($conn,"SELECT * FROM ds_ss_jualan where id_ss_jualan='$id'");	
									$data = mysqli_fetch_array($query);
								?>
								<div class="form-group">
								<label class="col-sm-2 control-label text-right">Tanggal</label>
								  <div class="col-sm-10">
										   <input disabled value="<?php echo "$data[tanggal]"; ?>" class="form-control datepicker" type="date" name="dateData"/>
								  </div>
								</div>
								<div class="form-group"><label class="col-sm-2 control-label text-right">Code Campaign</label>
								  <div  class="col-sm-10"><input disabled  value="<?php echo "$data[code_campaign]"; ?>" name="code campaign" type="text" class="form-control" placeholder="Code Campaign"></div>
								</div>
								<div class="form-group"><label class="col-sm-2 control-label text-right">Product</label>
								  <div  class="col-sm-10"><input disabled value="<?php echo "$data[product]"; ?>" name="product" type="text" class="form-control" placeholder="Product"></div>
								</div>
								<div class="form-group"><label class="col-sm-2 control-label text-right">Lead FB</label>
								  <div class="col-sm-10"><input disabled value="<?php echo "$data[lead_fb]"; ?>" name="lead_fb" type="number" class="form-control" placeholder="Lead FB"></div>
								</div>
								
								<div class="form-group"><label class="col-sm-2 control-label text-right">Margin Total</label>
								  <div class="col-sm-10"><input required value="<?php echo "$data[margin]"; ?>" name="margin" type="number" class="form-control" placeholder="Kontak"></div>
								</div>
								
								<div class="form-group"><label class="col-sm-2 control-label text-right">Kontak</label>
								  <div class="col-sm-10"><input required value="<?php echo "$data[kontak]"; ?>" name="kontak" type="number" class="form-control" placeholder="Kontak"></div>
								</div>
								
								<div class="form-group"><label class="col-sm-2 control-label text-right">JT</label>
								  <div class="col-sm-10"><input required value="<?php echo "$data[janji_transfer]"; ?>" name="jt" type="number" class="form-control" placeholder="Janji Transfer"></div>
								</div>
								
								
								<div class="form-group"><label class="col-sm-2 control-label text-right">Sales</label>
								  <div class="col-sm-10"><input required value="<?php echo "$data[sales]"; ?>" name="sales" type="number" class="form-control" placeholder="Sales"></div>
								</div>
							
								<div class="panel-body">
									<div class="col-sm-10"></div>
									<input type="Submit" class=" btn btn-3d btn-primary" value="<?php echo $edit=""?'Tambah Data':'Edit Data';  ?>" name="Submit"/>    
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
			if(isset($_POST['Submit'])) {
				$margin			= $_POST['margin'];
				$kontak			= $_POST['kontak'];
				$jt				= $_POST['jt'];
				$sales			= $_POST['sales'];
				
				$databaseprovider = new databaseprovider($conn); 
				
					$check = $databaseprovider->insert_data_cs($id,
								$margin	,
								$kontak,
								$jt,
								$sales
							);
					if($check) {
						echo"<script> alert('data berhasil masuk'); window.location.href='../Customer Services/inputdata_cs.php'; </script>";
					}else{
						echo"<script> alert('data gagal masuk');  </script>";
					}
				exit;
			}
		  ?>
          
      </div>

<!-- start: Javascript -->
<script> 
		var wb = XLSX.utils.table_to_book(document.getElementById('datatables-example'), {sheet:"Sheet JS"});
        var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
        function s2ab(s) {
                        var buf = new ArrayBuffer(s.length);
                        var view = new Uint8Array(buf);
                        for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                        return buf;
        }
        $("#button-a").click(function(){
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'test.xlsx');
        });
	</script>
	
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>

<!-- plugins -->

<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>
<script src="asset/js/main.js"></script>
<!-- custom -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
<!-- end: Javascript -->
</body>
</html>