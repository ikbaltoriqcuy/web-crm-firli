<?php 
	$temp ="";
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../login_adv.php");
	}else if(isset($_SESSION["username"])){
		$temp = explode('_',$_SESSION["username"]);
		if($temp[1] != "adv" ) {
		 header("Location: ../login_adv.php");
		}
	}

	
	$id=""; 
	if(isset($_GET['edit'])) {
		$id=$_GET['edit'];
	}
	include("../Modul Database/koneksi.php");
	include("../Modul Database/databaseprovider.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
.
  
  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Firli.id</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
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

<style> 
	* {
  box-sizing: border-box;
}

#searchName {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
#list{
	border: 1px solid #ddd;
	height :150px;
	overflow : auto;
	margin-bottom:20px;
}
#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  padding: 12px;
  text-decoration: none;
  font-size: 14px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}

</style>
	
<script>
function getListName(e) {
	document.getElementById("searchName").value = e;

}
function myFunction() {
    var input, filter, ul, li, a, i, txtValue,list,status;
    input = document.getElementById("searchName");
	list  = document.getElementById("list");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
	status = true;
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
				li[i].style.display = "";
				status = true;
		} else {
				li[i].style.display = "none";
				status = false;
		}
    }
	
	
}
</script>

    <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index_adv.php" class="navbar-brand"> 
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
                <li class="user-name"><span>		<?php
								
								if(isset($_SESSION["username"])){
									echo $temp[0];
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
                        <a href="index_adv.php">
                           <span class="fa fa-dashboard"></span>Dashboard
                        </a>
                    </li>
					
					<li>
                        <a href="daily_adv.php">
                           <span class="fa fa-paw"></span> GP Sales Harian dan bonus
                        </a>
                    </li>
                    <li>
                        <a href="inputdata_adv.php">
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
                        <h3 class="animated fadeInLeft">Form Data Advertiser</h3>
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
                         <h4>Form Data Advertiser</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:20px;">
                          <div class="col-md-12">
								<?php	
									$query_jualan = "";
									$data_jualan = "";
									if($id !="") {
										$query_jualan = mysqli_query($conn,
														"SELECT * FROM ds_ss_jualan 
															LEFT JOIN ds_account_cs
															ON ds_ss_jualan.cs = ds_account_cs.id_account_cs
														where id_ss_jualan='$id'");
										$data_jualan = mysqli_fetch_array($query_jualan);
									}
								?>
						   <form onkeypress="return event.keyCode != 13;" id="myForm" method="POST"> 
								<div class="form-group"><label class="col-sm-2 control-label text-right">Tanggal</label>
								  <div class="col-sm-10"><input name="tanggal" type="text" id="rangeDate" value="" placeholder="Please select Date Time" data-input></div>
								</div>
								<div class="form-group"><label class="col-sm-2 control-label text-right">Code Campaign</label>
								  <div class="col-sm-10"><input required value="<?php echo ($id == "" ?  "" :"$data_jualan[code_campaign]"); ?>" name="code_campaign" type="text" class="form-control" placeholder="Code Campaign"></div>
								</div>
								<div class="form-group"><label class="col-sm-2 control-label text-right">Product</label>
								  <div class="col-sm-10"><input required value="<?php echo ($id == "" ?  "" :"$data_jualan[product]"); ?>" name="product" type="text" class="form-control" placeholder="Produk"></div>
								</div>
								<div class="form-group"><label class="col-sm-2 control-label text-right">CS</label>
							
								  <div class="col-sm-10"><input required value="<?php echo ($id == "" ?  "" :"$data_jualan[username]"); ?>" name="cs" type="text" id="searchName" onkeyup="myFunction()" placeholder="Search  for names.." title="Type in a name">
										<div id="list">
										<ul id="myUL">
										  <?php 
													
												$all_connection = mysqli_query($conn,"SELECT * FROM `ds_relation_cs_adv` 
																			 LEFT JOIN ds_account_cs 
																			 ON ds_relation_cs_adv.cs = ds_account_cs.id_account_cs 
																		   where adv='usradv_".$temp[0]."' 
																		  "); 
								
												 while($data = mysqli_fetch_array($all_connection)){
											  ?>
												  <li><a href="#" onClick=getListName(<?php echo "'$data[username]'"; ?>);><?php echo "$data[username]"; ?></a></li>
											<?php 
												}
											?>
										  </div>
										</div>
								</div>
								<div class="form-group"><label class="col-sm-2 control-label text-right">Lead FB</label>
								  <div  class="col-sm-10"><input required value="<?php echo ($id == "" ?  "" :"$data_jualan[lead_fb]"); ?>" name="lead_fb" type="number" class="form-control" placeholder="lead fb"></div>
								</div>
								<div class="form-group"><label class="col-sm-2 control-label text-right">Add Spent</label>
								  <div class="col-sm-10"><input required value="<?php echo ($id == "" ?  "" :"$data_jualan[add_spent]"); ?>" name="add_spent" type="number" class="form-control" placeholder="add sepnt"></div>
								</div>
								<div class="panel-body">
									<div class="col-sm-10"></div>
									<input type="Submit" class=" btn btn-3d btn-primary" value="<?php echo ($id==""?'Tambah Data':'Edit Data');  ?>" name="tambahData"/>    
								</div>
						   </form> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          <!-- end: content -->
          
      </div>
	  
	  <?php 
		if(isset($_POST['tambahData'])) {
			$tanggal = $_POST['tanggal']; 
			$code_campaign =$_POST['code_campaign'];
			$product =  $_POST['product'];
			$cs =$_POST['cs'];
			$lead_fb =$_POST['lead_fb'];
			$add_spent =$_POST['add_spent'];
			
			$databaseprovider = new databaseprovider($conn); 
			$check;
			if($id == ""){
				$check = $databaseprovider->insert_ss_jualan(
									$tanggal,
									$code_campaign, 
									$product, 
									"usradv_".$temp[0],
									"usrcs_".$cs, 
									$lead_fb, 
									$add_spent, 
									0,
									0,
									0);
				
				if($check) {
					echo "<script> alert('Data Berhasil ditambahkan'); </script>";
				}else{
					echo "<script> alert('Data Gagal ditambahkan'); </script>";
				}
				
			}else{
				$check = $databaseprovider->update_ss_adv(
								$tanggal,
									$code_campaign, 
									$product, 
									"usrcs_".$cs, 
									$lead_fb, 
									$add_spent, 
									$margin);
				
				if($check) {
					echo "<script> alert('Data Berhasil diedit'); </script>";
				}else{
					echo "<script> alert('Data Gagal diedit'); </script>";
				}
			}
			
			echo "<script> window.location.href='../Advertiser/inputdata_adv.php' </script>;";
			
		}
	  ?>

<!-- start: Javascript -->
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

<head>
  <title>Using Flatpickr</title>
  
</head>
<body>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
  <script>
$("#rangeDate").flatpickr({
    enableTime: false,
    dateFormat: "Y-m-d"
});
  </script>
</body>