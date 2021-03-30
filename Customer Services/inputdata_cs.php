<?php 
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../login_cs.php");
		echo "LogIn";
	}else if(isset($_SESSION["username"])){
		$temp = explode('_',$_SESSION["username"]);
		if($temp[1] != "cs" ) {
		 header("Location: ../login_cs.php");
		}
	}
	include("../Modul Database/koneksi.php");
	include("../Modul Database/databaseprovider.php");
	
	$searchDate = "";
	if(isset($_GET['searchDate'])  ){
		$searchDate =$_GET['searchDate'];
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
                    <li >
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
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Input Data Customer Service</h3>
                        <input type="text" id="rangeDate" value="<?php echo $searchDate; ?>" placeholder="Please select Date Time" data-input>
							<script>
								function searchDataOnDate() {
									
										window.location.href = "../Customer Services/inputdata_cs.php?searchDate="+document.getElementById("rangeDate").value;
								
								}
							</script>
							
								  <button onClick=searchDataOnDate() class=" btn btn-circle btn-mn btn-primary" value="primary">
											<span class="fa fa-search"></span>
								  </button>
                       
                    </div>
                  </div>
                </div>
              <div class="col-md-12 top-25 padding-0">
                <div class="col-md-12">
                  <div class="panel">                    
                    <div class="panel-heading"><h3>Data Customer Service</h3>
                    </div>
                      <div class="panel-body">
                             <button id="convert" class=" btn btn-circle btn-mn" value="primary">
                                <span class="fa fa-download"></span>
                            </button>       
                      </div>
                    <div class="col-md-0">
                    </div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                       <thead>
                        <tr>
                         <th>Tanggal</th>
                          <th>Code Campaign</th>
                          <th>Product</th>
						  <th>Adv</th>
                          <th>Lead fb (N) </th>
                          <th>Kontak (N)</th>
                          <th>JT (N) </th>
                          <th>Sales</th>
                          <th>Margin total</th>
                          <th>10% Margin total</th>
                          <th>GP Sales</th>
                          <th>5% GP Sales</th>						  
						  <th id="action"> aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						$textquery = "SELECT * FROM ds_ss_jualan 
												LEFT JOIN ds_account_adv
												ON ds_account_adv.id_account_adv= ds_ss_jualan.adv
												where cs='usrcs_".$temp[0]."'";	
								
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
                          <td><?php echo "$data[lead_fb]"; ?></td>
                          <td><?php echo "$data[kontak]"; ?></td>
                          <td><?php echo ("$data[janji_transfer]"); ?></td>
                          <td><?php echo "$data[sales]"; ?></td>
                          <td><?php echo "Rp.".number_format("$data[margin]"); ?></td>
                          <td><?php echo "Rp.".number_format((0.1 * $data['margin'])); ?></td>
                          <td><?php echo "Rp.".number_format(($data['margin']-$data['add_spent'])); ?></td>
                          <td><?php echo "Rp.".number_format(0.5 *($data['margin']-$data['add_spent'])); ?></td>
                          
                          <td>
                            <a href="form_cs.php?id=<?php echo "$data[id_ss_jualan]"; ?>">
								<button class=" btn btn-circle btn-mn btn-success" value="primary">
									<span class="fa fa-pencil"></span>
								</button>
							</a>
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
          
      </div>

<!-- start: Javascript -->
	
<script src="../plugin/js-xlsx-master/dist/xlsx.full.min.js"> </script>
<script src="../plugin/FileSaver.js-master/dist/FileSaver.min.js"></script>
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
			saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'CS_<?php echo $temp[0];  ?>.xlsx');
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
    mode: 'range',
    dateFormat: "Y-m-d"
});
  </script>
</body>