<?php 
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../login_own.php");
	}
	
	include("../Modul Database/koneksi.php");
	include("../Modul Database/databaseprovider.php");
	$sort="";
	
	$searchDate = "";
		if( isset($_GET['searchDate'])){
		 $searchDate = $_GET['searchDate'];
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
		
		.box-v1 .panel-body {
		  padding : 10px;
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
                <li class="user-name"><span>		<?php
								
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
                        <h3 class="animated fadeInLeft">Owner</h3>
                        <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Bandung, Indonesia</p>
                       	<input type="text" id="rangeDate" value="<?php echo $searchDate; ?>" placeholder="Please select Date Time" data-input>
                       <script>
								function searchDataOnDate() {
									window.location.href = "../Owner/index_own.php?searchDate="+document.getElementById("rangeDate").value;
								
								}
						</script>
						
					   <button onClick=searchDataOnDate() class=" btn btn-circle btn-mn btn-primary" value="primary">
                                <span class="fa fa-search"></span>
                      </button>
							
                    </div>
                  </div>
                </div>
			<?php 	
					   $Target_CS = ""; 
					   $Target_ADV = ""; 
					   $all_margin_total = 0;
					   $all_gp_sales= 0;
					   $all_bonus_cs = 0;
					   $all_bonus_adv = 0;
					   
					   $date = explode("/",date("m/d/Y"));
					   $position = 0;
					   $textquery = "SELECT * FROM ds_ss_jualan ";
					   if($searchDate !="") {
							$date = explode(" to ",$searchDate); 
							$textquery .= " where tanggal BETWEEN '$date[0]' AND '$date[1]' ";
						}else{
							$date = explode("/",date("m/d/Y"));
							$textquery .=" where tanggal BETWEEN '".$date[2]."-".$date[0]."-01' AND DATE_ADD('".$date[2]."-".$date[0]."-01', INTERVAL 1 MONTH) ";
						}
						 $query = mysqli_query($conn,$textquery);
						 while($data = mysqli_fetch_array($query)){
							   $all_gp_sales += ($data['margin']-$data['add_spent']);
							   $all_margin_total += $data['margin'];
							   $all_bonus_cs += ( 0.1 * $data['add_spent']);
							   $all_bonus_adv += ( 0.05 * ($data['margin']-$data['add_spent']));
						 }
						 
						 
						$textquerydaily = "SELECT * FROM ds_achievment"; 
						$query = mysqli_query($conn,$textquerydaily);
						while($data = mysqli_fetch_array($query)){
							if($data['type'] == "CS") {
								$Target_CS =$data['target'];
							}else if ($data['type'] == "ADV"){
								$Target_ADV =$data['target'];
							}
							 
						
						}
						
						$all_acv_monthly = $data['target']; 
				?>
              <div class="col-md-12" style="">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12 padding-0">
                            <div class="col-md-12 padding-0">
								<div class="col-md-3">
								`	<div class="panel-heading bg-white border-none">
                                          <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                            <h2 class="text-left">CS</h2>
											<hr/>
                                          </div>
									</div>
                                
                                    <div class="panel box-v1">
									<br/><br/>
									<br/><br/>
                                      <div class="panel-body text-center">
                                        <h4> Target Bulan Ini (CS) <span >  <?php echo "Rp.".number_format($Target_CS); ?> <span></h4>
                                        
                                      </div>
									  
                                      <div class="panel-body text-center">
                                        <h4> Margin Sales s.d tgl <?php echo explode("/",date("m/d/Y"))[1];  ?> <span > <?php echo "Rp.".number_format($all_margin_total); ?> </span></h4>
                                      </div>
									  
                                      <div class="panel-body text-center">
										<h4> Achievement </h4>
                                        <h1> <?php echo number_format(($all_margin_total*100) / $Target_CS, 2) ; ?> %</h1>
										<a href="laporanCS.php">
                                          <p>Lihat Detail</p>
                                        </a>
                                        
									  </div>
                                    </div>
                                 </div>
                          
								<div class="col-md-3">
									`	<div class="panel-heading bg-white border-none">
                                          <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                            <h2 class="text-left">ADV</h2>
											<hr/>
                                          </div>
									</div>
                                
                                    <div class="panel box-v1">
									 			<br/><br/>
										<br/><br/>
                                      <div class="panel-body text-center">
										<h4>Target Bulan Ini (ADV) <span > <?php echo "Rp.".number_formaT($Target_ADV); ?> <span></h4>
                                      </div>
									  
									  <div class="panel-body text-center">
                                              <h4>GP Sales s.d tgl <?php echo explode("/",date("m/d/Y"))[1];  ?> </h4>
											  <h4><span > <?php echo "Rp.".number_format($all_gp_sales); ?></span></h4>
									   </div>
									  
                                      <div class="panel-body text-center">
										<h4>Achievement </h4>
										<h1><?php echo number_format(($all_gp_sales*100)/$Target_ADV,2); ?>%</h1>
                                        <a href="laporanADV.php">
                                          <p>Lihat Detail</p>
                                        </a>
                                      </div>
                                    </div>
									
                                </div>
                                <br/>
								<div class="col-md-3">
                                    <div class="panel-heading bg-white border-none">
                                          <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                            <h2 class="text-left">Bonus</h2>
											<hr/>
                                          </div>
									</div>
									<div class="panel box-v1">
									  <br/>
									  <br/>
									  <br/>
									  <br/>
                                      <div class="panel-body text-center">
                                        <h4>Bonus Semua CS </h4>
										<h4><?php echo "Rp.".number_format($all_bonus_cs); ?></h4>
                                       
                                      </div>
									  
									  <div class="panel-body text-center">
                                        <h4>Bonus Semua Advertiser </h4>
										<h4><?php echo "Rp.".number_format($all_bonus_adv); ?></h4>
                                        
                                      </div>
									  
                                    </div>
                                </div>
								
							</div>
                        </div>
					</div>
                          

                    <!-- start: Content -->
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Data Penjualan</h3></div>
                  
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
                          <th>CS</th>
                          <th>Lead fb</th>
                          <th>Kontak</th>
                          <th>JT</th>
                          <th>Sales</th>
                          <th>Add Spent</th>
                          <th>Margin total</th>
                          <th>10% Margin total</th>
                          <th>GP Sales</th>
                          <th>5% GP Sales</th>
                        </tr>
                      </thead>
                      <tbody>		  
					  <?php 
						
					   $position = 0;
						$textquery = "SELECT * FROM ds_ss_jualan LEFT JOIN ds_account_cs
											ON ds_ss_jualan.cs = ds_account_cs.id_account_cs ";
						if($searchDate !="") {
							$temp = explode(" to ",$searchDate); 
							$textquery .= "where  tanggal BETWEEN '$temp[0]' AND '$temp[1]' ";
						}else{
							$date = explode("/",date("m/d/Y"));
							$textquery .=" where tanggal BETWEEN '".$date[2]."-".$date[0]."-01' AND DATE_ADD('".$date[2]."-".$date[0]."-01', INTERVAL 1 MONTH) ";
						}
						
						 $query = mysqli_query($conn,$textquery);
						 while($data = mysqli_fetch_array($query)){
					  ?>
                        <tr>
                          <td><?php echo "$data[tanggal]"; ?></td>
                          <td><?php echo "$data[code_campaign]"; ?></td>
                          <td><?php echo "$data[product]"; ?></td>
                          <td><?php echo "$data[username]"; ?></td>
                          <td><?php echo "$data[cs]"; ?></td>
                          <td><?php echo "$data[lead_fb]"; ?></td>
                          <td><?php echo "$data[kontak]"; ?></td>
                          <td><?php echo "$data[janji_transfer]"; ?></td>
                          <td><?php echo "$data[sales]"; ?></td>
                          <td><?php echo "Rp.".number_format("$data[add_spent]"); ?></td>
                          <td><?php echo "Rp.".number_format("$data[margin]"); ?></td>
						  <td><?php echo "Rp.".number_format((0.1 * $data['margin'])); ?></td>
                          <td><?php echo "Rp.".number_format(($data['margin']-$data['add_spent'])); ?></td>
                          <td><?php echo "Rp.".number_format(0.5 *($data['margin']-$data['add_spent'])); ?></td>
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
            
          <!-- end: content -->

                    <div class="col-md-12">
                        <div class="panel">
                          <div class="panel-heading bg-white border-none" style="padding:20px;">
                            <div class="col-md-6 col-sm-6 col-sm-12 text-left">
                              <h4>Margin Total & GP Sales</h4>
                            </div>
                          </div>
                          <div class="panel-body" style="padding-bottom:50px;">
                              <div id="canvas-holder1">
                                <canvas class="bar-chart"></canvas>
                              </div>
                              <div class="col-md-12 padding-0" >
                                <br/>
								<center>
									<h1 style="font-size:23px;" class = "label label-primary">  1 =  Rp.1000  </h1>
									&nbsp
									<h1 style="font-size:23px;" class = "label label-warning">  1 =  Rp.1000   </h1>
									
								</center>
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
    <script src="asset/js/plugins/moment.min.js"></script>
    <script src="asset/js/plugins/fullcalendar.min.js"></script>
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="asset/js/plugins/jquery.vmap.min.js"></script>
    <script src="asset/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="asset/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="asset/js/plugins/chart.min.js"></script>
    <script src="asset/js/plugins/moment.min.js"></script>
    <script src="asset/js/plugins/jquery.datatables.min.js"></script>
    <script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>

    <!-- custom -->
     <script src="asset/js/main.js"></script>
     <script type="text/javascript">
      (function(jQuery){

        var barChartData = {
                labels: [<?php 
							if($searchDate !=""){
								$rangeDate = explode(" to ",$searchDate);
								$startDate = explode ("-" , $rangeDate[0])[2];
								$endDate = explode ("-" ,$rangeDate[1])[2];
								//format date
								$date = explode("-",date("Y-m-t",strtotime($rangeDate[0])));
							
							}else{
								$date = explode("-",date("Y-m-d"));
							}
							for ($i=1; $i<=$date[2] ; $i++)
								echo $i.",";
						  ?>],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(21,186,103,0.4)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(21,186,103,0.2)",
                        highlightStroke: "rgba(21,186,103,0.2)",
                        data: [<?php
							
							if($searchDate !=""){
								$rangeDate = explode(" to ",$searchDate);
								$startDate = explode ("-" , $rangeDate[0])[2];
								$endDate = explode ("-" ,$rangeDate[1])[2];
								//format date
								$date = explode("-",date("Y-m-t",strtotime($rangeDate[0])));
							
							}else{
								$date = explode("-",date("Y-m-d"));
							}
							
							for ($n=1; $n<=(int)$date[2] ; $n++ ){
								
								if($searchDate !="" && !( $n >= $startDate && $n <= $endDate ) ) {
									echo "0,";
									continue;
								}
								$total = 0;
								$textQuery = "SELECT * FROM ds_ss_jualan where tanggal='".$date[0]."-".$date[1]."-".($n<10 ? "0".$n : $n)."'";
								$query = mysqli_query($conn,$textQuery);
								while($data = mysqli_fetch_array($query)){
										$total += $data['margin'];
								}
								
								echo ($total/1000).",";
							}
						
						?>]
                    },
					{
                        label: "My First dataset",
                        fillColor: "rgba(255,140,0,0.4)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(255,140,0,0.2)",
                        highlightStroke: "rgba(21,186,103,0.2)",
                        data: [<?php
							if($searchDate !=""){
								$rangeDate = explode(" to ",$searchDate);
								$startDate = explode ("-" , $rangeDate[0])[2];
								$endDate = explode ("-" ,$rangeDate[1])[2];
								//format date
								$date = explode("-",date("Y-m-t",strtotime($rangeDate[0])));
							}else{
								$date = explode("-",date("Y-m-d"));
							}
							
							for ($n=1; $n<=(int)$date[2] ; $n++ ){
								
								if($searchDate !="" && !( $n >= $startDate && $n <= $endDate ) ) {
									echo "0,";
									continue;
								}
								$total = 0;
								$textQuery = "SELECT * FROM ds_ss_jualan where tanggal='".$date[0]."-".$date[1]."-".($n<10 ? "0".$n : $n)."'";
								$query = mysqli_query($conn,$textQuery);
								while($data = mysqli_fetch_array($query)){
										$total += ($data['margin']-$data['add_spent']);

								}
								
								echo ($total/1000).",";
							}
						
						?>]
                    }
                ]
            };

         window.onload = function(){
                var ctx3 = $(".bar-chart")[0].getContext("2d");
                window.myLine = new Chart(ctx3).Bar(barChartData, {
                     responsive: true,
                        showTooltips: true
                });

                var ctx4 = $(".doughnut-chart2")[0].getContext("2d");
                window.myDoughnut2 = new Chart(ctx4).Doughnut(doughnutData2, {
                    responsive : true,
                    showTooltips: true
                });

            };
        
        //  end:  Chart =============

      })(jQuery);
     </script>

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
    mode: 'range',
    dateFormat: "Y-m-d"
});
  </script>
</body>
