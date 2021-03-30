<?php 
	
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../login_adv.php");
	}else if(isset($_SESSION["username"])){
		$temp = explode('_',$_SESSION["username"]);
		if($temp[1] != "adv" ) {
		 header("Location: ../login_adv.php");
		}
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
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Advertiser</h3>
                        <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Bandung, Indonesia</p>
                    
				  <script>
						function searchDataOnDate(sort) {
									if(sort != "") 
										window.location.href = "../Advertiser/daily_adv.php?searchDate="+document.getElementById("rangeDate").value+ "&sort=" + sort;	  
									else
										window.location.href = "../Advertiser/daily_adv.php?searchDate="+document.getElementById("rangeDate").value;
								
						}
				  </script>
							
					  <input type="text" id="rangeDate" value="<?php echo $searchDate; ?>" placeholder="Please select Date Time" data-input>
							 <button onClick=searchDataOnDate(<?php echo "'$sort'"; ?>) class=" btn btn-circle btn-mn btn-primary" value="primary">
								<span class="fa fa-search"></span>
							</button>
							</div>
                  </div>   
                </div>
			<?php 
					   
					   $all_gp_sales = 0;
					   $all_bonus = 0;
					  
					   
					   
						$textquery = "SELECT * FROM ds_ss_jualan LEFT JOIN ds_account_cs
											ON ds_ss_jualan.cs = ds_account_cs.id_account_cs where";
						$relation;		
						
						if($sort != "" && $sort != "all" ){	
							$textquery .= "  cs='usrcs_".$sort."' AND  ";
						}
						
						if($searchDate !="") {
							$date = explode(" to ",$searchDate); 
							$textquery .= "  tanggal BETWEEN '$date[0]' AND '$date[1]' ";
						}else{
							$date = explode("/",date("m/d/Y"));
							$textquery .="  tanggal BETWEEN '".$date[2]."-".$date[0]."-01' AND DATE_ADD('".$date[2]."-".$date[0]."-01', INTERVAL 1 MONTH) ";
						}
						
						 $query = mysqli_query($conn,$textquery);
						 while($data = mysqli_fetch_array($query)){
							   if($data['adv'] == "usradv_".$temp[0]){
									$all_gp_sales += ($data['margin']-$data['add_spent']);
									$all_bonus += 0.5 * ($data['margin']-$data['add_spent']);
							   }
							   
						}
						 
				?>
              <div class="col-md-12" style="">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12 padding-0">
                                <div class="col-md-3">
                                    <div class="panel box-v1">
                                      <div class="panel-heading bg-white border-none">
                                          <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                            <h4 class="text-left">gp sales personal</h4>
                                          </div>
                                      </div>
                                      <div class="panel-body text-center">
                                        <h3><?php echo "Rp.".number_format($all_gp_sales); ?></h3>
                                        <hr/>
                                      </div>
                                    </div>
                                </div>
                              <div class="col-md-3">
                                    <div class="panel box-v1">
                                      <div class="panel-heading bg-white border-none">
                                          <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                            <h4 class="text-left">bonus</h4>
                                          </div>
                                      </div>
                                      <div class="panel-body text-center">
                                        <h3><?php echo "Rp.".number_format($all_bonus); ?></h3>
                                        <hr/>
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
						<div align="center"  class="row"> 
							<div  class="col-lg col-md-2 col-xs-6 order-stat">
								
						
								<select onchange=handleSelect(this)>
										<option  value="index_adv.php?sort=all">Lihat Semua</option>	
									<?php
										$relation;
										
										$relation = mysqli_query($conn,"SELECT * FROM ds_relation_cs_adv 
																			LEFT JOIN ds_account_cs
																			ON ds_relation_cs_adv.cs = ds_account_cs.id_account_cs
																		where adv='usradv_".$temp[0]."'");
											
										while($data = mysqli_fetch_array($relation)){
									?>
											<option 
												<?php
													if($sort == $data['username'] ){
														echo "selected";	
													}
												?>
											
											value="daily_adv.php?sort=<?php echo "$data[username]"; ?>"> <?php echo "$data[username]"; ?> </option> 
									<?php
										}
					
									?>	
									<script>
										function handleSelect(elm)
										{
										   window.location = elm.value;
										}
									</script>
								</select>
							</div>
			
			
						</div>
						
						<br/>
						<br/>
						<br/>
						
					  
						
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Tanggal</th>
                          <th>GP Sales</th>
                          <th>5% gp sales</th>
						</tr>
                      </thead>
                      <tbody>
					  <?php 
						
						$textquery = "SELECT * FROM ds_ss_jualan LEFT JOIN ds_account_cs
											ON ds_ss_jualan.cs = ds_account_cs.id_account_cs where ";
						$relation;		
						
						if($sort != "" && $sort != "all" ){	
							$textquery .= "adv='usradv_".$temp[0]."' AND cs='usrcs_".$sort."'";
						}else{
							$textquery .= " adv='usradv_".$temp[0]."'"; 
						}
						
						if($searchDate !="") {
							$date = explode(" to ",$searchDate); 
							$textquery .= " AND tanggal BETWEEN '$date[0]' AND '$date[1]' ";
						}
						 $query = mysqli_query($conn,$textquery);
						 while($data = mysqli_fetch_array($query)){
					  ?>
                        <tr>
                          <td><?php echo "$data[tanggal]"; ?></td>
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
                              <h4>GP Sales</h4>
                            </div>
                          </div>
                          <div class="panel-body" style="padding-bottom:50px;">
                              <div id="canvas-holder1">
                                <canvas class="bar-chart"></canvas>
                              </div>
                              <div class="col-md-12 padding-0" >
                                <div  style="padding-top:20px;">
									<center>
									<h1 style="font-size:23px;" class = "label label-primary">  1 =  Rp.1000   </h1>
									</center>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

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
	<script>
$("#basicDate").flatpickr({
    enableTime: true,
    dateFormat: "F, d Y H:i"
});
  </script>
     <script type="text/javascript">
      (function(jQuery){

        // start: Chart =============

        var barChartData = {
                labels: [
					<?php 
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
						  ?>
				],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(21,186,103,0.4)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(21,186,103,0.2)",
                        highlightStroke: "rgba(21,186,103,0.2)",
                        data: [
						<?php
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
								$textQuery = "SELECT * FROM ds_ss_jualan where adv='usradv_".$temp[0]."' AND tanggal='".$date[0]."-".$date[1]."-".($n<10 ? "0".$n : $n)."'";
								$query = mysqli_query($conn,$textQuery);
								while($data = mysqli_fetch_array($query)){
										$total += ($data['margin']-$data['add_spent']);

								}
								
								echo ($total/1000).",";
							}
						
						?>
						]
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