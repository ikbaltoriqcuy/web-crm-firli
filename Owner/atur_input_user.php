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
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.3/css/selectize.default.min.css'>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body id="mimin" class="dashboard">

<style>
	
<style> 
.label{
	color : #000;
}
	* {
  box-sizing: border-box;
}

#searchName , #searchName1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL , #myUL1 {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
#list , #list1{
	border: 1px solid #ddd;
	height :150px;
	overflow : auto;
	margin-bottom:20px;
}
#myUL li a ,#myUL1 li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  padding: 12px;
  text-decoration: none;
  font-size: 14px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) ,#myUL1 li a:hover:not(.header) {
  background-color: #eee;
}

.selectize-input.items.not-full.has-options.has-items div{
  background-color:#f00 !important;
}
</style>


<script>
function getListName(e) {
	document.getElementById("searchName").value = e;
}

function getListName1(e) {
	document.getElementById("searchName1").value = e;
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

function myFunction1() {
    var input, filter, ul, li, a, i, txtValue,list,status;
    input = document.getElementById("searchName1");
	list  = document.getElementById("list1");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL1");
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
                <a href="index_own.html" class="navbar-brand"> 
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
                    <li>
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
                        <h3 class="animated fadeInLeft">Pengaturan Input User</h3>
                        <p class="animated fadeInDown">
                          Kelola User <span class="fa-angle-right fa"></span> Pengaturan Input User
                        </p>
                    </div>
                  </div>
                </div>
				<?php
					
					$query = mysqli_query($conn,
									             "SELECT * FROM ds_relation_cs_adv 
														where id_relation='$edit'");
					$relation = mysqli_fetch_array($query);
				?>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-12">
0                      <div class="panel form-element-padding">
                        <div class="panel-heading">
                         <h4>Pengaturan Input User</h4>
                        </div>
                         <div class="panel-body" style="padding-bottom:20px;">
                          <div class="col-md-12">
                            <form onkeypress="return event.keyCode != 13;" method="POST">
                              <div class="col-sm-10">
                                <div class="panel-body">
                                <div class="col-sm-12 padding-0">
                                 <div class="form-group"><label class="col-sm-2 control-label text-right">ADV</label>
								  <div class="col-sm-10"><input value="<?php echo ($edit!="" ? explode("_", $edit)[1] : ""); ?>" name="adv" type="text" id="searchName" onkeyup="myFunction()" placeholder="Search  for names.." title="Type in a name" required>
										<div id="list">
										<ul id="myUL">
										  <?php 
												$query = mysqli_query($conn,"SELECT * FROM ds_account_adv");
												 while($data = mysqli_fetch_array($query)){
											  ?>
												  <li><a href="#" onClick=getListName(<?php echo str_replace('"' ,"","'$data[username]'"); ?>);><?php echo "$data[username]"; ?></a></li>
											<?php 
												}
											?>
										  </div>
										</div>
								</div>
								<div class="form-group"><label class="col-sm-2 control-label text-right">CS</label>
								  <div class="col-sm-10"><input value="<?php
													
												$query = mysqli_query($conn,"SELECT * FROM ds_relation_cs_adv LEFT JOIN ds_account_cs ON ds_relation_cs_adv.cs = ds_account_cs.id_account_cs where adv='$edit'");
												
												 while($data = mysqli_fetch_array($query)){
													echo "$data[username],";
												 }
								  ?>" name="cs" type="text" id="searchName1" required>
										</div>
								</div>
			
                                </div>
                              </div>
                              </div>	
                            <div style="float:right;" class="panel-body">
                                <div class="col-sm-10"></div>
                                <input type="submit" name="add" class=" btn btn-3d btn-primary" value="Simpan Pengaturan"/>   
                            </div>
						  </form>
						  </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          <!-- end: content -->
      </div>
	  
	  <?php 
		if(isset($_POST['add'])) {
			
			$currentCS = ""; 
			$query = mysqli_query($conn,"SELECT * FROM ds_relation_cs_adv LEFT JOIN ds_account_cs ON ds_relation_cs_adv.cs = ds_account_cs.id_account_cs where adv='$edit'");
			
			 while($data = mysqli_fetch_array($query)){
				$currentCS .= "$data[username]," ;
			}
			
			$tempCS = explode(",",$currentCS);
			$adv = $_POST['adv'];
			$cs	 = explode(",",$_POST['cs']);
			$databaseprovider = new databaseprovider($conn); 
			
			for($i = 0 ; $i< count($cs) ; $i++) {
				if (!in_array($cs[$i], $tempCS)) {
					$check = $databaseprovider->delete_rel($adv,$cs[$i]);
				}

				$check = $databaseprovider->insert_relation($adv,$cs[$i]);
				
				if($check) {
					echo "<script> alert('Data berhasil ".$cs[$i] ." ". ($edit==""? " di tambahkan" : " di tambahkan")  ."'); </script>";
				}else{
					if ($edit == "")
						echo "<script> alert('Data gagal ".$cs[$i] ." ". ($edit==""? " gagal di tambahkan" : " gagal di edit")."'); </script>";
				}
				
			}
			echo "<script> window.location.href='../Owner/kelola_user_relation.php' </script>;";
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


<!-- custom -->
<script src="asset/js/main.js"></script>
<script>
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
 $(document).ready(function(){
  $('#searchName1').selectize({
    plugins: ['remove_button'],
    persist: false,
    maxItems: ,
    valueField: 'email',
    labelField: 'name',
    searchField: ['name'],
    options: [
         <?php 
			$n=0;
			$query = mysqli_query($conn,"SELECT * FROM ds_account_cs");
			 while($data = mysqli_fetch_array($query)){
		  ?>
		  {"email": '<?php echo $data['username']; ?>', "name": '<?php echo $data['username']; ?>'},
     
		<?php 
			}
		?>
		

    ],
    render: {
        item: function(item, escape) {
            return '<div>' +
                (item.name ? '<span class="name">' + escape(item.name) + '</span>' : '') +
            '</div>';
        },
        option: function(item, escape) {
            var label = item.name || item.email;
            return '<div>' +
                '<span class="">' + escape(label) + '</span>' +
            '</div>';
        }
    },
    createFilter: function(input) {
        var match, regex;

        // email@address.com
        regex = new RegExp('^' + REGEX_EMAIL + '$', 'i');
        match = input.match(regex);
        if (match) return !this.options.hasOwnProperty(match[0]);

        // name <email@address.com>
        regex = new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i');
        match = input.match(regex);
        if (match) return !this.options.hasOwnProperty(match[2]);

        return false;
    },
});
})

</script>
<!-- end: Javascript -->
</body>
</html>