<?php
    
	class databaseprovider{
		private $conn;
		
		public function __construct($conn) {
			$this->conn = $conn;
		}
		function insert_pemasukanCS($lead_fb=0, $kontak_wa=0, $janji_transfer=0, $sales=0, $margin=0, $diskon=0){
			$check = mysqli_query($this->conn, "INSERT INTO ds_cs_pemasukan VALUES(0,$lead_fb, $kontak_wa, $janji_transfer, $sales, $margin, $diskon)");
			return $check;
		}
		
		function update_pemasukanCS($id=0,$lead_fb=0, $kontak_wa=0, $janji_transfer=0, $sales=0, $margin=0, $diskon=0){
			$check = mysqli_query($this->conn, 
				"UPDATE `ds_cs_pemasukan` SET `lead_fb`= $lead_fb,`kontak_wa`= $kontak_wa,`janji_transfer`= $janji_transfer,`sales`= $sales,`margin`= $margin,`diskon`= $diskon WHERE 'id_pemasukan' = $id");
			return $check;
		}
		
		
		function delete_pemasukanCS($id=0){
			$check = mysqli_query($this->conn,"DELETE FROM ds_cs_pemasukan WHERE id_pemasukan='$id'");
			return $check;
		}
		
		
		function delete_semuapemasukanCS(){
			$check = mysqli_query($this->conn, "DELETE * FROM ds_cs_pemasukan");
			return $check;
		}
		
		
	/*========================================================================================================*/
		function insert_pengeluaranCS_Daily($ads_spent_daily=0, $gp_sales_daily=0, $bonus_daily=0, $id_account = ""){
			$check = mysqli_query($this->conn, "INSERT INTO ds_cs_pengeluaran_daily VALUES(0,$ads_spent_daily, $gp_sales_daily, $bonus_daily,'$id_account')");
			return $check;
		}
		
		function update_pengeluaranCS_Daily($id= 0, $ads_spent_daily=0, $gp_sales_daily=0, $bonus_daily=0){
			$check = mysqli_query($this->conn, 
				"UPDATE `ds_cs_pengeluaran_daily` SET `ads_spent_daily`= $ads_spent_daily,`gp_sales_daily`= $gp_sales_daily,`bonus_daily`= $bonus_daily WHERE 'id_pengeluaran_daily' = $id");
			return $check;
		}
		
		function delete_pengeluaranCS_Daily($id=0){
			$check = mysqli_query($this->conn, "DELETE FROM ds_cs_pengeluaran_daily WHERE id_pengeluaran_daily='$id'");
			return $check;
		}
		
		
		function delete_semuapengeluaranCS_Daily(){
			$check = mysqli_query($this->conn, "DELETE * FROM ds_cs_pengeluaran_daily");
			return $check;
		}
		
	/*========================================================================================================*/
		
		function insert_pengeluaranCS_Weekly($ads_spent_weekly=0, $gp_sales_weekly=0, $roas_weekly=0){
			$check = mysqli_query($this->conn, "INSERT INTO ds_cs_pengeluaran_weekly VALUES($ads_spent_weekly, $gp_sales_weekly, $roas_weekly)");
			return $check;
		}
		
		function update_pengeluaranCS_Weekly($id=0, $ads_spent_weekly=0, $gp_sales_weekly=0, $roas_weekly=0){
			$check = mysqli_query($this->conn, 
				"UPDATE `ds_cs_pengeluaran_weekly` SET `ads_spent_weekly`= $ads_spent_weekly,`gp_sales_weekly`= $gp_sales_weekly,`roas_weekly`= $roas_weekly WHERE 'id_pengeluaran_weekly' = $id");
			return $check;
		}
		
		
		function delete_pengeluaranCS_Weekly($id=0){
			$check = mysqli_query($this->conn, "DELETE FROM ds_cs_pengeluaran_weekly WHERE id_pengeluaran_weekly='$id'");
			return $check;
		}
		
		
		function delete_semuapengeluaranCS_Weekly(){
			$check = mysqli_query($this->conn, "DELETE * FROM ds_cs_pengeluaran_weekly");
			return $check;
		}
		
	/*========================================================================================================*/
		function update_pengeluaranCS_Monthly($id= 0, $ads_spent_monthly=0, $gp_sales_monthly=0, $roas_monthly=0){
			$check = mysqli_query($this->conn, 
				"UPDATE `ds_cs_pengeluaran_monthly` SET `ads_spent_monthly`= $ads_spent_monthly,`gp_sales_monthly`= $gp_sales_monthly,`roas_monthly`= $roas_monthly WHERE 'id_pengeluaran_monthly' = $id");
			return $check;
		}
		
		function insert_pengeluaranCS_Monthly($ads_spent_monthly=0, $gp_sales_monthly=0, $roas_monthly=0){
			$check = mysqli_query($this->conn, "INSERT INTO ds_cs_pengeluaran_monthly VALUES($ads_spent_monthly, $gp_sales_monthly, $roas_monthly)");
			return $check;
		}
		
		function delete_pengeluaranCS_Monthly($id=0){
			$check = mysqli_query($this->conn, "DELETE FROM ds_cs_pengeluaran_monthly WHERE id_pengeluaran_monthly='$id'");
			return $check;
		}
		
		function delete_semuapengeluaranCS_Monthly(){
			$check = mysqli_query($this->conn, "DELETE * FROM ds_cs_pengeluaran_monthly");
			return $check;
		}
	/*========================================================================================================*/ 
		function logIn($username = "" , $password ="" , $type = -1){
			$result = null;
			if($type == 0) {
				/* for CS */
			   $result = mysqli_query($this->conn,"SELECT * FROM ds_account_cs WHERE nama_cs = '$username' AND password_cs='$password'"); 
			}else if($type == 1) {
			   /* for ADV */
			   $result = mysqli_query($this->conn,"SELECT * FROM ds_account_adv WHERE nama_adv = '$username' AND password_adv='$password'"); 
			}else if($type == 2){
			   /* for OWNER */
			   $result = mysqli_query($this->conn,"SELECT * FROM ds_account_owner WHERE nama_owner = '$username' AND password_owner='$password'"); 	
			}
			
			$row_cnt = $result->num_rows;
			
			return ($row_cnt !=0 ? true : false);
	
		}
		
		function insertAccount($username = "" , $password ="" , $type = -1){
			
			$check = false; 
			if($type == 0) {
				/* for CS */
			   $check = mysqli_query($this->conn,"INSERT INTO ds_account_cs VALUES(0,'$username' ,'$password')"); 
			}else if($type == 1) {
			   /* for ADV */
			   $check = mysqli_query($this->conn,"INSERT INTO ds_account_adv VALUES(0,'$username' ,'$password')"); 
			}else if($type == 2){
			   /* for OWNER */
			   $check = mysqli_query($this->conn,"INSERT INTO ds_account_owner VALUES(0,'$username' ,'$password')"); 	
			}

			return $check;
			
		}
		
		function deleteAccount($id = 0 , $type = -1){
			
			$check = false; 
			if($type == 0) {
				/* for CS */
			   $check = mysqli_query($this->conn,"DELETE * FROM ds_account_cs WHERE id_account=$id"); 
			}else if($type == 1) {
			   /* for ADV */
			   $check = mysqli_query($this->conn,"DELETE * FROM ds_account_adv WHERE id_account=$id"); 
			}else if($type == 2){
			   /* for OWNER */
			   $check = mysqli_query($this->conn,"DELETE * FROM ds_account_owner WHERE id_account=$id"); 	
			}

			return $check; 		
		}
		
		///////////// for advertiser ///////////////////////
		
		function update_adv($id= 0,$tanggal,$product,
							$advertiser,$costumerservice,
							$leadfb,$kontak,$jt,
							$sales,$addspent,$gpsales){
			$check = mysqli_query($this->conn, 
				"UPDATE `ds_adv_data` SET 
				`tanggal`='$tanggal',
				`produk`='$product',
				`advertiser`='$advertiser',
				`cs`='$costumerservice',
				`lead_fb`=$leadfb,
				`kontak`=$kontak,
				`jt`=$jt,
				`sales`=$sales,
				`add_spent`=$addspent,
				`gp_sales`=$gpsales WHERE id_adv_data=$id");
			return $check;
		}
		
		function insert_adv($tanggal,$product,$advertiser,$costumerservice,$leadfb,$kontak,$jt,$sales,$addspent,$gpsales){
			$check = mysqli_query($this->conn, 
			   "INSERT INTO `ds_adv_data` 
						VALUES(0,$tanggal,$product,$advertiser,$costumerservice,$leadfb,$kontak,$jt,$sales,$addspent,$gpsales)");
			return $check;
		}
		
		function delete_adv($id=0){
			$check = mysqli_query($this->conn, "DELETE FROM `ds_adv_data` WHERE id_adv_data='$id'");
			return $check;
		}
		
		function delete_advs(){
			$check = mysqli_query($this->conn, "DELETE * FROM `ds_adv_data`");
			return $check;
		}
		
		
		///////////// for consumer ///////////////////////
		
		function update_cs($id= 0,$Tanggal, $Produk,
							$Advertiser , $CS , $Lead_FB,
							$Kontak , $JT , $Sales,
							$add_spent , $diskon , $margin_total,
							$ten_per_margintotal , $gp_sales)
		{
			$check = mysqli_query($this->conn, 
				"UPDATE 'ds_cs_data' SET `
				    'tanggal'='$Tanggal',
					'produk'='$Produk',
					'advertiser'='$Advertiser',
					'CS'='$CS',
					'Lead_FB'=$Lead_FB,
					'Kontak'=$Kontak,
					'JT'=$JT,
					'Sales'=$Sales,
					'add_spent'=$add_spent,
					'diskon'=$diskon,
					'margin_total'=$margin_total,
					'ten_per_margintotal'=$ten_per_margintotal,
					'gp_sales'=$gp_sales WHERE id_cs_data=$id ");
			return $check;
		}
		
		function insert_cs($Tanggal, $Produk,
							$Advertiser , $CS , $Lead_FB,
							$Kontak , $JT , $Sales,
							$add_spent , $diskon , $margin_total,
							$ten_per_margintotal , $gp_sales){
							
			$check = mysqli_query($this->conn, 
			   "INSERT INTO `ds_cs_data` VALUES(0,'$Tanggal', '$Produk',
							'$Advertiser' , '$CS' , $Lead_FB,
							$Kontak , $JT , $Sales,
							$add_spent , $diskon , $margin_total,
							$ten_per_margintotal , $gp_sales)");
			return $check;
		}
		
		function delete_cs($id=0){
			$check = mysqli_query($this->conn, "DELETE FROM `ds_cs_data` WHERE id_cs_data=$id");
			return $check;
		}
		
		function delete_all_css(){
			$check = mysqli_query($this->conn, "DELETE * FROM `ds_cs_data`");
			return $check;
		}
		
		/////////////////////////// for accpunt /////////////////////////////////////////////////////////
		
		function update_akun($id= 0,$username, $nama_akun, $password_akun , $type)
		{
		   $check = false;
			switch($type) {
				case 1 : 
									
						$check = mysqli_query($this->conn, 
							"UPDATE 'ds_account_adv' SET `
								'username'='$username',
								'nama_adv'='$nama_akun',
								'password_adv'='$password_akun'
								WHERE id_account=$id ");
						break; 
				case 2 :
									
						$check = mysqli_query($this->conn, 
							"UPDATE 'ds_account_cs' SET `
								'username'='$username',
								'nama_cs'='$nama_akun',
								'password_cs'='$password_akun'
								WHERE id_account=$id ");
						break; 
				case 3 : 
									
						$check = mysqli_query($this->conn, 
							"UPDATE 'ds_account_owner' SET `
								'username'='$username',
								'nama_owner'='$nama_akun',
								'password_owner'='$password_akun'
								WHERE id_account=$id ");

						break;
			}
			return $check;
		}
		
		function insert_akun($username,$nama_akun, $password_akun , $type){
			$check = false; 
			
			switch($type){
				case 1 : 
					$check = mysqli_query($this->conn, 
				   "INSERT INTO `ds_account_adv` VALUES(0,'$username','$nama_akun', '$password_akun')");
						break; 
				case 2 : 
					
					$check = mysqli_query($this->conn, 
				   "INSERT INTO `ds_account_cs` VALUES(0,'$username','$nama_akun', '$password_akun')");
					break; 
				case 3 : 
					$check = mysqli_query($this->conn, 
				   "INSERT INTO `ds_account_owner` VALUES(0,'$username','$nama_akun', '$password_akun')");
					break;
			}
			
			return $check;
		}
		
		function delete_akun($id=0, $type){
			$check = false;
			switch($type){
				case 1: 
				$check = mysqli_query($this->conn, "DELETE FROM `ds_account_adv` WHERE id_cs_data=$id");
			
						break; 
				case 2: 
				$check = mysqli_query($this->conn, "DELETE FROM `ds_account_cs` WHERE id_cs_data=$id");
			
						break; 
				case 3: 
				$check = mysqli_query($this->conn, "DELETE FROM `ds_account_owner` WHERE id_cs_data=$id");
			
				        break;
			}
			return $check;
		}
		
		function delete_all_akun(){
			$check = mysqli_query($this->conn, "DELETE * FROM `ds_cs_data`");
			return $check;
		}
		
	}
?>