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
		if($username == "" || $password == "" ) return false;
			$n=0;
			$result = null;
			if($type == 0) {
				/* for CS */
			   $result = mysqli_query($this->conn,"SELECT * FROM ds_account_cs WHERE username = '$username'");
			   $data = mysqli_fetch_array($result); 
			   if($data['password_cs'] == $password){
				    $n = 1;
			   }else{
					$n = 0;
			   }
			}else if($type == 1) {
			   /* for ADV */
			   $result = mysqli_query($this->conn,"SELECT * FROM ds_account_adv WHERE username = '$username' ");
				$data = mysqli_fetch_array($result); 
			   if($data['password_adv'] == $password){
				   $n = 1;
			   }else{
					$n = 0;
			   }
			}else if($type == 2){
			   /* for OWNER */
			   $result = mysqli_query($this->conn,"SELECT * FROM ds_account_owner WHERE username = '$username'"); 
				$data = mysqli_fetch_array($result); 
			   if($data['password_owner'] == $password){
				    $n = 1;
			   }else{
					$n = 0;
			   }
			}
			
			
			return ($n !=0 ? true : false);
	
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
		
		function deleteAccount($id ="" , $type = -1){
			$test="";
			$check = false; 
			if($type == 0) {
				/* for CS */
			   $check = mysqli_query($this->conn,"DELETE FROM ds_account_cs WHERE id_account_cs='$id'"); 
			}else if($type == 1) {
			   /* for ADV */
			   $check = mysqli_query($this->conn,"DELETE FROM ds_account_adv WHERE id_account_adv='$id'"); 
			}else if($type == 2){
			   /* for OWNER */
			   $check = mysqli_query($this->conn,"DELETE FROM ds_account_owner WHERE id_account_own='$id'"); 	
			}

			return $check; 		
		}
		
		///////////// for advertiser ///////////////////////
		
		function update_ss_jualan($id_ss_jualan,
								$tanggal,
								$code_campaign, 
								$product, 
								$adv,
								$cs, 
								$lead_fb, 
								$add_spent, 
								$margin,
								$kontak,
								$janji_transfer,
								$sales){
			$new_id = "dt_jual_".$product;
			$check = mysqli_query($this->conn, 
				"UPDATE `ds_ss_jualan` SET `id_ss_jualan`='$new_id',
										`tanggal`='$tanggal',
										`code_campaign`='$code_campaign',
										`product`='!$product',
										`adv`='$adv',
										`cs`='$cs',
										`lead_fb`=$lead_fb,
										`add_spent`=$add_spent,
										`margin`=$margin,
										`kontak`=$kontak,
										`janji_transfer`=$janji_transfer,
										`sales`=$sales 
										WHERE id_ss_jualan");
			return $check;
		}
		
		
		function update_ss_adv( $id,
								$tanggal,
								$code_campaign, 
								$product, 
								$cs, 
								$lead_fb, 
								$add_spent){
			$new_id = "dt_jual_".$product;
			$check = mysqli_query($this->conn, 
				"UPDATE `ds_ss_jualan` SET 
										`tanggal`='$tanggal',
										`code_campaign`='$code_campaign',
										`product`='$product',
										`cs`='$cs',
										`lead_fb`=$lead_fb,
										`add_spent`=$add_spent
										WHERE id_ss_jualan='$id'");
			return $check;
		}
		
		function insert_data_cs($id,
							$Margin,$Kontak , $JT , $Sales)
		{
			$check = mysqli_query($this->conn, 
				"UPDATE `ds_ss_jualan` SET margin=$Margin,`kontak`=$Kontak,`janji_transfer`=$JT,`sales`=$Sales WHERE id_ss_jualan='$id'");
			return $check;
		}
		
		
		function insert_ss_jualan(
								$tanggal,
								$code_campaign, 
								$product, 
								$adv,
								$cs, 
								$lead_fb, 
								$add_spent, 
								$kontak,
								$janji_transfer,
								$sales){
			$check = mysqli_query($this->conn, 
			   "INSERT INTO `ds_ss_jualan` 
						VALUES(0,
								'$tanggal',
								'$code_campaign', 
								'$product', 
								'$adv',
								'$cs', 
								$lead_fb, 
								$add_spent,
								0,
								$kontak,
								$janji_transfer,
								$sales)");
			return $check;
		}
		
		function delete_ss_jualan($id=""){
			$check = mysqli_query($this->conn, "DELETE FROM `ds_ss_jualan` WHERE id_ss_jualan=$id");
			return $check;
		}
		
		function delete_semua_ss_jualan(){
			$check = mysqli_query($this->conn, "DELETE * FROM `ds_ss_jualan`");
			return $check;
		}
		
		
		///////////// for consumer ///////////////////////
		
		function update_achievment($id= 0,$Type, $Target)
		{
			$check = mysqli_query($this->conn, 
				"UPDATE ds_achievment SET 
				    type='$Type',
					target=$Target
					WHERE id_achievment=$id ");
			return $check;
		}
		
		
		function insert_achievment($Type, $Target){
							
			$check = mysqli_query($this->conn, 
			   "INSERT INTO `ds_achievment` VALUES(0,'$Type',$Target )");
			return $check;
		}
		
		function delete_achievment($id=0){
			$check = mysqli_query($this->conn, "DELETE FROM ds_achievment WHERE id_achievment=$id");
			return $check;
		}
		
		function delete_all_achievment(){
			$check = mysqli_query($this->conn, "DELETE * FROM `ds_achievment`");
			return $check;
		}
		
		/////////////////////////// for accpunt /////////////////////////////////////////////////////////
		
		function update_akun($id,$username, $nama_akun, $password_akun , $type)
		{
		   $check = false;
			switch($type) {
				case 1 : 
					    $id_build = "usradv_".$username;
						$check = mysqli_query($this->conn, 
							"UPDATE ds_account_adv SET 
								id_account_adv='$id_build',
								username='$username',
								nama_adv='$nama_akun',
								password_adv='$password_akun'
								WHERE id_account_adv='$id' ");
						break; 
				case 2 :
						$id_build = "usrcs_".$username;			
						$check = mysqli_query($this->conn, 
							"UPDATE ds_account_cs SET 
								id_account_cs='$id_build',
								username='$username',
								nama_cs='$nama_akun',
								password_cs='$password_akun'
								WHERE id_account_cs='$id' ");
						break; 
				case 3 : 
						$id_build = "usrown_".$username;			
						$check = mysqli_query($this->conn, 
							"UPDATE ds_account_owner SET
								id_account_own='$id_build',							
								username='$username',
								nama_owner='$nama_akun',
								password_owner='$password_akun'
								WHERE id_account_own='$id' ");

						break;
			}
			return $check;
		}
		
		function insert_akun($username,$nama_akun, $password_akun , $type){
			$check = false; 
			
			switch($type){
				case 1 :
					$id = "usradv_".$username;
					$check = mysqli_query($this->conn, 
				   "INSERT INTO `ds_account_adv` VALUES('$id','$username','$nama_akun', '$password_akun')");
						break; 
				case 2 :
					$id = "usrcs_".$username;
					$check = mysqli_query($this->conn, 
				   "INSERT INTO `ds_account_cs` VALUES('$id','$username','$nama_akun', '$password_akun')");
					break; 
				case 3 :
					$id = "usrown_".$username;				
					$check = mysqli_query($this->conn, 
				   "INSERT INTO `ds_account_owner` VALUES('$id','$username','$nama_akun', '$password_akun')");
					break;
			}
			
			return $check;
		}
		
		function delete_akun($id, $type){
			$check = false;
			switch($type){
				case 1: 
				$check = mysqli_query($this->conn, "DELETE FROM `ds_account_adv` WHERE id_account_adv='$id'");
			
						break; 
				case 2: 
				$check = mysqli_query($this->conn, "DELETE FROM ds_account_cs WHERE id_account_cs='$id'");
			
						break; 
				case 3: 
				$check = mysqli_query($this->conn, "DELETE FROM `ds_account_owner` WHERE id_account_own='$id'");
			
				        break;
			}
			return $check;
		}
		
		function delete_all_akun(){
			$check = mysqli_query($this->conn, "DELETE * FROM `ds_cs_data`");
			return $check;
		}
	
	////////////////////////////////////////////////// relation /////////////////////////////////
	
		function update_relation($id= 0,$adv, $cs)
		{
			$check = mysqli_query($this->conn, 
				"UPDATE 'ds_relation_cs_adv' SET `
				    'adv'='$adv',
					'cs'='$cs'
					WHERE id_relation=$id ");
			return $check;
		}
		
		
		
		function insert_relation($adv, $cs){
			$check = false;
			$result=mysqli_query($this->conn,"Select * From ds_relation_cs_adv where adv='usradv_".$adv."' AND cs='usrcs_".$cs."' ");
			$rowcount=mysqli_num_rows($result);
			  
			if($rowcount ==0)
			$check = mysqli_query($this->conn, 
			   "INSERT INTO `ds_relation_cs_adv` 
							VALUES(0,'usradv_".$adv."', 'usrcs_".$cs."' )");
			return $check;
		}
		
		function delete_rel($adv,$cs){
			$check = mysqli_query($this->conn, "DELETE FROM `ds_relation_cs_adv` where adv='usradv_".$adv."' AND cs='usrcs_".$cs."'");
			return $check;
		}
		
		
		function delete_relation($id=0){
			$check = mysqli_query($this->conn, "DELETE FROM `ds_relation_cs_adv` WHERE id_relation=$id");
			return $check;
		}
		
		function delete_all_relation(){
			$check = mysqli_query($this->conn, "DELETE * FROM `ds_relation_cs_adv`");
			return $check;
		}
	
	
	}
?>