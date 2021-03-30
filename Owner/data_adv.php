<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../login_own.php");
	}
	include("../Modul Database/koneksi.php");
	include("../Modul Database/databaseprovider.php");
	
	
	$sort ="";
	if(isset($_GET['sort'])){
		
		$sort =$_GET['sort'];
		
	}
	
	$searchDate = "";
	if( isset($_GET['searchDate'])){
		 $searchDate = $_GET['searchDate'];
	}
	
	if(isset($_GET['delete'])){
		$databaseprovider = new databaseprovider($conn);
		$check = $databaseprovider->delete_ss_jualan($_GET['delete']);
		if($check) {
			echo "<script> alert('data ".$_GET['delete']." berhasil di hapus'); </script>"; 
		}else{
			echo "<script> alert('data ".$_GET['delete']." gagal di hapus'); </script>";
		}
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
		#datatables-example_wrapper .row .col-sm-12 {
			overflow : auto;
		}
	</style>
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
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Melihat Data Advertiser</h3>
                        <p class="animated fadeInDown">
                          Melihat Data <span class="fa-angle-right fa"></span> Melihat Data Advertiser
                        </p>
                        <div class="row" style="padding-left:10px;">
								   <input type="text" id="rangeDate" value="<?php echo $searchDate; ?>" placeholder="Please select Date Time" data-input>
							<script>
								function searchDataOnDate(sort) {
									if(sort != "") 
										window.location.href = "../Owner/data_adv.php?searchDate="+document.getElementById("rangeDate").value+ "&sort=" + sort;	  
									else
										window.location.href = "../Owner/data_adv.php?searchDate="+document.getElementById("rangeDate").value;
								
								}
							</script>
							
								  <button onClick=searchDataOnDate(<?php echo "'$sort'"; ?>) class=" btn btn-circle btn-mn btn-primary" value="primary">
											<span class="fa fa-search"></span>
								  </button>
								 
							  </div>
                       
                    </div>
                  </div>
                </div>
              <div class="col-md-12 top-25 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Data Advertiser</h3></div>
                    <div class="col-md-0">
                    </div>
                    <div class="panel-body">
                      <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?php 
								if($sort =="" || $sort =="all") {
									echo "Melihat Semua Data Advertiser";
								}else{
								  echo "Melihat Data ".$sort;
								}
								
							  ?>
                              <span class="fa fa-angle-down"></span>
                            </button>
                            <ul class="dropdown-menu">
							<li><a href="../Owner/data_adv.php?sort=all<?php echo ($searchDate == "" ? "" : "&searchDate=".$searchDate ); ?>">all</a></li>
							
							<?php
								$akun_adv = mysqli_query($conn,"SELECT * FROM ds_account_adv");
											
								while($data = mysqli_fetch_array($akun_adv)){
											
										
						    ?>
								<li><a href="../Owner/data_adv.php?sort=<?php echo $data['username']; echo ($searchDate == "" ? "" : "&searchDate=".$searchDate ); ?>"><?php echo $data['username']; ?></a></li>
							
							<?php
								}
							?>
                              
                            </ul>
                      </div>
                            <button class=" btn btn-circle btn-mn" value="primary">
                                <span id="convert" class="fa fa-download"></span>
                            </button>
                    </div>
					<script>
								function deleteData(data) {
								  var txt;
								  if (confirm("Apakah anda yakin mau hapus item ini!")) {
									window.location.href = "../Owner/data_adv.php?delete="+data ;
								  } else {
								  
								  }
								  
								}
					</script>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
							 <thead>
                       	<tr>
                          
                          <th>Tanggal</th>
                          <th>Code Camapaign</th>
                          <th>Product</th>
						  <th>CS</th>
						  <th>Kontak</th>
						  <th>Janji Transfer</th>
						  <th>Sales</th>
                          <th>Add Spent</th>
						  <th>Total Margin</th>
						  <th>10% Total Margin</th>
                          <th>GP Sales</th>
                          <th>5% gp sales</th>
                          <th id="action">Aksi</th>
						  
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					   				$textquery = "SELECT * FROM ds_ss_jualan LEFT JOIN ds_account_adv
											ON ds_ss_jualan.adv = ds_account_adv.id_account_adv  ";
						$relation;		
						
						if($sort != "" && $sort != "all" ){	
							
							$textquery .= " where adv='usradv_".$sort."'";
						}
						
						if($searchDate !="") {
							$temp = explode(" to ",$searchDate); 
							$textquery .= " AND tanggal BETWEEN '$temp[0]' AND '$temp[1]' ";
						}
						
						$query = mysqli_query($conn,$textquery);
						while($data = mysqli_fetch_array($query)){
					  ?>
                        <tr>
                          <td><?php echo "$data[tanggal]"; ?></td>
                          <td><?php echo "$data[code_campaign]"; ?></td>
                          <td><?php echo "$data[product]"; ?></td>
                          <td><?php echo "$data[username]"; ?></td>
                          <td><?php echo "$data[kontak]"; ?></td>
                          <td><?php echo "$data[janji_transfer]"; ?></td>
                          <td><?php echo "$data[sales]"; ?></td>
                          <td><?php echo "Rp.".number_format("$data[add_spent]"); ?></td>
                          <td><?php echo "Rp.".number_format("$data[margin]"); ?></td>
						  <td><?php echo "Rp.".number_format((0.1 * $data['margin'])); ?></td>
                          <td><?php echo "Rp.".number_format(($data['margin']-$data['add_spent'])); ?></td>
                          <td><?php echo "Rp.".number_format(0.5 *($data['margin']-$data['add_spent'])); ?></td>
						  <td>
							<a href="../Owner/form_adv.php?edit=<?php echo "$data[id_ss_jualan]"; ?>" >
                            <button class=" btn btn-circle btn-mn btn-success" value="primary">
                                <span class="fa fa-pencil"></span>
                            </button>
							</a>
							
							
							<button onClick=deleteData('<?php echo "$data[id_ss_jualan]"; ?>') class=" btn btn-circle btn-mn btn-danger" value="primary">
                                <span class="fa fa-ban"></span>
                            </button>
							
                          </td>
                        </tr>
					<?php 
					    }
					?>
						
                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>
          <!-- end: content -->

<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="../plugin/js-xlsx-master/dist/xlsx.full.min.js"> </script>
<script src="../plugin/FileSaver.js-master/dist/FileSaver.min.js"></script>

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

<script> 
		$("#action").html("");
		var wb = XLSX.utils.table_to_book(document.getElementById('datatables-example'), {sheet:"Sheet JS"});
        var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
        $("#action").html("aksi");
		function s2ab(s) {
                        var buf = new ArrayBuffer(s.length);
                        var view = new Uint8Array(buf);
                        for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                        return buf;
        }
        $("#convert").click(function(){
		
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'ADV.xlsx');
        });
</script>
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
    mode: 'range',
    dateFormat: "Y-m-d"
});
  </script>
</body>
