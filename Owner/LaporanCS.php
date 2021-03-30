<?php 

	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../login_own.php");
	}
	include("../Modul Database/koneksi.php");
	include("../Modul Database/databaseprovider.php");
	
	
	$searchDate = "";
		if( isset($_GET['searchDate'])){
		 $searchDate = $_GET['searchDate'];
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
                        <h3 class="animated fadeInLeft">Laporan</h3>
                                              	<input type="text" id="rangeDate" value="<?php echo $searchDate; ?>" placeholder="Please select Date Time" data-input>
                       <script>
								function searchDataOnDate() {
									window.location.href = "../Owner/laporanCS.php?searchDate="+document.getElementById("rangeDate").value;
								
								}
						</script>
						
					   <button onClick=searchDataOnDate() class=" btn btn-circle btn-mn btn-primary" value="primary">
                                <span class="fa fa-search"></span>
                      </button>
                      </div>   
                    </div>
                        

              <div class="col-md-12" style="">
                    <div class="col-md-12 padding-0">
                        
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
                          <th>CS</th>
                          <th>Margin total</th>
                          <th>10% Margin total</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
						$textquery = "SELECT * FROM ds_ss_jualan 
												LEFT JOIN ds_account_cs
												ON ds_account_cs.id_account_cs= ds_ss_jualan.cs";	
						
						
						if($searchDate !="") {
							$date = explode(" to ",$searchDate); 
							$textquery .= " where tanggal BETWEEN '$date[0]' AND '$date[1]' ";
						}
						$query = mysqli_query($conn,$textquery);
					
						while($data = mysqli_fetch_array($query)){
					  ?>
                        <tr>
                          <td><?php echo "$data[tanggal]"; ?></td>
                          <td><?php echo "$data[username]"; ?></td>
						  <td><?php echo "$data[margin]"; ?></td>
                          <td><?php echo (0.1 * $data['margin']); ?></td>
                          
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

        // start: Chart =============

        Chart.defaults.global.pointHitDetectionRadius = 1;
        Chart.defaults.global.customTooltips = function(tooltip) {

            var tooltipEl = $('#chartjs-tooltip');

            if (!tooltip) {
                tooltipEl.css({
                    opacity: 0
                });
                return;
            }

            tooltipEl.removeClass('above below');
            tooltipEl.addClass(tooltip.yAlign);

            var innerHtml = '';
            if (undefined !== tooltip.labels && tooltip.labels.length) {
                for (var i = tooltip.labels.length - 1; i >= 0; i--) {
                    innerHtml += [
                        '<div class="chartjs-tooltip-section">',
                        '   <span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[i].fill + '"></span>',
                        '   <span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
                        '</div>'
                    ].join('');
                }
                tooltipEl.php(innerHtml);
            }

            tooltipEl.css({
                opacity: 1,
                left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
                top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
                fontFamily: tooltip.fontFamily,
                fontSize: tooltip.fontSize,
                fontStyle: tooltip.fontStyle
            });
        };
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };
        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                fillColor: "rgba(21,186,103,0.4)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(66,69,67,0.3)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                 data: [18,9,5,7,4.5,4,5,4.5,6,5.6,7.5]
            }, {
                label: "My Second dataset",
                fillColor: "rgba(21,113,186,0.5)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [4,7,5,7,4.5,4,5,4.5,6,5.6,7.5]
            }]
        };

        var doughnutData = [
                {
                    value: 300,
                    color:"#129352",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 50,
                    color: "#1AD576",
                    highlight: "#15BA67",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                {
                    value: 40,
                    color: "#0F5E36",
                    highlight: "#15BA67",
                    label: "Peta"
                },
                {
                    value: 120,
                    color: "#15A65D",
                    highlight: "#15BA67",
                    label: "X"
                }

            ];


        var doughnutData2 = [
                {
                    value: 100,
                    color:"#129352",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 250,
                    color: "#FF6656",
                    highlight: "#FF6656",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                {
                    value: 40,
                    color: "#FD786A",
                    highlight: "#15BA67",
                    label: "Peta"
                },
                {
                    value: 120,
                    color: "#15A65D",
                    highlight: "#15BA67",
                    label: "X"
                }

            ];

        var barChartData = {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(21,186,103,0.4)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(21,186,103,0.2)",
                        highlightStroke: "rgba(21,186,103,0.2)",
                        data: [<?php
						
							$date = explode("/",date("m/d/Y"));
							for ($n=1; $n<=(int)$date[1] ; $n++ ){
								$total = 0;
								$textQuery = "SELECT * FROM ds_ss_jualan where tanggal='".$date[2]."-".$date[0]."-".($n<10 ? "0".$n : $n)."'";	
								
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