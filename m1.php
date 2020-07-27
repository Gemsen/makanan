<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
$secret = '83415d06-ec4e-11e6-a41b-6c40088ab51e';
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'X-AppVersion: 3.27.0';
$headers[] = "X-Uniqueid: ac94e5d0e7f3f".rand(111,999);
$headers[] = 'X-Location: -8.67117611,115.21381181';
echo "\n";
// function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        echo color("purple","📲▶️NOMER HP ELO : ");
        // $no = trim(fgets(STDIN));
        $nohp = trim(fgets(STDIN));
        $nohp = str_replace("62","62",$nohp);
        $nohp = str_replace("(","",$nohp);
        $nohp = str_replace(")","",$nohp);
        $nohp = str_replace("-","",$nohp);
        $nohp = str_replace(" ","",$nohp);

        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            if (substr(trim($nohp),0,3)=='62') {
                $hp = trim($nohp);
            }
            else if (substr(trim($nohp),0,1)=='0') {
                $hp = '62'.substr(trim($nohp),1);
        }
         elseif(substr(trim($nohp), 0, 2)=='62'){
            $hp = '6'.substr(trim($nohp), 1);
        }
        else{
            $hp = '1'.substr(trim($nohp),0,13);
        }
    }
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$hp.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","📶▶️Kode verifikasi sudah di kirim")."\n";
        otp:
        echo color("yellow","💬▶️KODE OTP     : ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"ff27aceb-07b2-4bf2-935f-71674a5df465"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
    
        if(strpos($verif, '"access_token"')){
        echo color("green","✔️▶️Berhasil mendaftar\n");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo color("nevy","+]Your access token : ".$token."\n\n");
        save("token.txt",$token);
        sleep(5);
	echo color("green","\n================================");
        echo color("green","\n     AUTO CLAIM VC GOFOOD");
	echo color("yellow","\nTime: ".date('[d-m-Y] [H:i:s]')."\n");	
	echo color("green","\n================================");	
	echo "\n";
        echo "\n".color("nevy","+]Klaim FOOD A");
        //echo "\n".color("yellow","Please wait  ");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(15);}
        
        $code1 = request2('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2107"}');
        $message = fetch_value($code1,'"message":"','"');
        //echo ("\n".$code1);
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","+]Message: ".$message);}
        else{
        echo "\n".color("red","!]Message: ".$message);}
	     
        echo "\n".color("nevy","+]Klaim FOOD B");
        //echo "\n".color("yellow","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(10);}
          
        $code1 = request3('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2107"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","+]Message: ".$message);}
        else{
        echo "\n".color("red","!]Message: ".$message);}
          
        echo "\n".color("nevy","+]Klaim FOOD C");
        //echo "\n".color("yellow","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(5);}
          
        $code1 = request7('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2107"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","+]Message: ".$message);}
        else{
        echo "\n".color("red","!]Message: ".$message);}
       
        echo "\n".color("nevy","+]Klaim FOOD D");
        //echo "\n".color("yellow","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(5);}
          
        $code1 = request1('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2107"}');
        $message = fetch_value($code1,'"message":"','"');
        // echo "\n".$code1;
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","+]Message: ".$message);}
        else{
        echo "\n".color("red","!]Message: ".$message);}
        
        echo "\n".color("nevy","Klaim Reff");
        //echo "\n".color("yellow","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(1);}
          
        $data = '{"referral_code":"G-QQ4CZTZ"}';
        $claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
        $message = fetch_value($claim,'"message":"','"');
        // echo "\n".$claim;
        if(strpos($claim, 'Kode referralnya berhasil ditukerin')){
        echo "\n".color("green","+]Message: ".$message);
        }else{
        echo "\n".color("red","!]Message: ".$message);
        }
        
        echo "\n \n";
          /*
        $boba09 = request1('/customer_referrals/v1/campaign/enrolment', $token, '{"referral_code":"G-QQ4CZTZ"}');
        $messageboba09 = fetch_value($boba09,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
          echo "\n".color("green","Message: ".$message);}
        else{
          echo "\n".color("red","Message: ".$message);}
        
        */
        
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=13&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
        $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
        $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
        $voucher11 = getStr1('"title":"','",',$cekvoucher,"11");
        $voucher12 = getStr1('"title":"','",',$cekvoucher,"12");
        $voucher13 = getStr1('"title":"','",',$cekvoucher,"13");
        echo "\n".color("purple","Total vouchers ".$total." : ");
        echo "\n".color("nevy","1. ".$voucher1);
        echo "\n".color("nevy","2. ".$voucher2);
        echo "\n".color("nevy","3. ".$voucher3);
        echo "\n".color("nevy","4. ".$voucher4);
        echo "\n".color("nevy","5. ".$voucher5);
        echo "\n".color("nevy","6. ".$voucher6);
        echo "\n".color("nevy","7. ".$voucher7);
        echo "\n".color("nevy","8. ".$voucher8);
        echo "\n".color("nevy","9. ".$voucher9);
        echo "\n".color("nevy","10. ".$voucher10);
      	echo "\n".color("nevy","11. ".$voucher11);
        echo "\n".color("nevy","12. ".$voucher12);
        echo "\n".color("nevy","13. ".$voucher13);
        echo"\n";
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
        $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
        $expired8 = getStr1('"expiry_date":"','"',$cekvoucher,'8');
        $expired9 = getStr1('"expiry_date":"','"',$cekvoucher,'9');
        $expired10 = getStr1('"expiry_date":"','"',$cekvoucher,'10');
        $expired11 = getStr1('"expiry_date":"','"',$cekvoucher,'11');
        $expired12 = getStr1('"expiry_date":"','"',$cekvoucher,'12');
        $expired13 = getStr1('"expiry_date":"','"',$cekvoucher,'13');
 /*     $TOKEN  = "1032900146:AAE7V93cvCvw1DNuTk0Hp1ZFywJGmjiP7aQ";
      	$chatid = "";//"785784404";
      	$pesan 	= "";//"[+] Gojek Account Info [+]\n\n".$token."\n\nTotalVoucher = ".$total."\n[+] ".$voucher1."\n[+] Exp : [".$expired1."]\n[+] ".$voucher2."\n[+] Exp : [".$expired2."]\n[+] ".$voucher3."\n[+] Exp : [".$expired3."]\n[+] ".$voucher4."\n[+] Exp : [".$expired4."]\n[+] ".$voucher5."\n[+] Exp : [".$expired5."]\n[+] ".$voucher6."\n[+] Exp : [".$expired6."]\n[+] ".$voucher7."\n[+] Exp : [".$expired7."]\n[+] ".$voucher8."\n[+] Exp : [".$expired8."]\n[+] ".$voucher9."\n[+] Exp : [".$expired9."]\n[+] ".$voucher10."\n[+] Exp : [".$expired10."] ".$voucher11."\n[+] Exp : [".$expired11."]\n[+] ".$voucher12."\n[+] Exp : [".$expired12."]\n[+] ".$voucher13."\n[+] Exp : [".$expired13."]\n[+]";
      	$method	= "sendMessage";
      	$url    = "https://api.telegram.org/bot" . $TOKEN . "/". $method;
      	$post = [
      		'chat_id' => $chatid,
                'text' => $pesan
        	];
                $header = [
                "X-Requested-With: XMLHttpRequest",
                "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" 
                        ];
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post );   
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                        $datas = curl_exec($ch);
                                        $error = curl_error($ch);
                                        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                        curl_close($ch);
                                        $debug['text'] = $pesan;
                                        $debug['respon'] = json_decode($datas, true);
     */
         setpin:
         echo "\n".color("red","-]SET PIN SEKALIAN BIAR AMAN (Y/N)!!! ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("nevy","-]INI PIN GOPAY ENTE = 112233 ")."\n";
         $data2 = '{"pin":"112233"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "-]OTP PIN  : ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] GAGAL!!!\n");
         }
         
         
        // tutup sini
         }else{
         echo color("red","-] Otp yang anda input salah");
         //echo"\n鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆\n\n";
         echo color("purple","!] Silahkan input kembali\n");
         goto otp;
         }
         }else{
         echo color("red","-] Nomor sudah teregistrasi \n");
         echo color("green","Kode verifikasi sudah di kirim")."\n";
        
        //echo"\n鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆鈻柆\n\n";
        // echo color("purple","!] Silahkan registrasi kembali\n");
        //echo "\n".color("nevy","Claim Reff: ");
        //echo "\n".color("yellow","� Please wait");
       /* for($a=1;$a<=5;$a++){
          echo color("yellow",$a);
          sleep(1);}
          */

$login = curl('https://api.gojekapi.com/v3/customers/login_with_phone', '{"phone":"+' . $hp . '"}', $headers);
		$logins = json_decode($login[0]);
		if($logins->success == true) {
			echo color("purple","OTP : ");
			$otp = trim(fgets(STDIN));
			$data1 = '{"scopes":"gojek:customer:transaction gojek:customer:readonly","grant_type":"password","login_token":"' . $logins->data->login_token . '","otp":"' . $otp . '","client_id":"gojek:cons:android","client_secret":"' . $secret . '"}';
			$verif = curl('https://api.gojekapi.com/v3/customers/token', $data1, $headers);
			$verifs = json_decode($verif[0]);
			
/*$code1 = request1('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"STAYGOFOOD201105SCE"}');
        $message = fetch_value($code1,'"message":"','"');
        */
			
			
			if($verifs->success == true) {
				// Claim reff
				
$token = $verifs->data->access_token;
        save("token.txt",$token);
        
				
echo "\n".color("nevy","Claim Reff 1: ");
    for($a=0;$a<=5;$a++){
          echo color("yellow",$a);
          sleep(1);}
				
				$data = '{"referral_code":"G-QQ4CZTZ"}';
        $claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
        $message = fetch_value($claim,'"message":"','"');
        if(strpos($claim, 'Promo kamu sudah bisa dipakai')){
          echo "\n".color("green","+] Message: ".$message);
        }else{
          echo "\n".color("red","-] Message: ".$message);
        }
        
echo "\n".color("nevy","Claim Voucher 1: ");
    for($a=0;$a<=5;$a++){
          echo color("yellow",$a);
          sleep(1);}
				
			//	$data = '{"promo_code":"STAYGOFOOD201105SCE"}';
		$data = '{"promo_code":"STAYGOFOOD201105SCE"}';
        $claim = request("/go-promotions/v1/promotions/enrollments", $token, $data);
        $message = fetch_value($claim,'"message":"','"');
        if(strpos($claim, 'Promo kamu sudah bisa dipakai')){
          echo "\n".color("green","+] Message: ".$message);
        }else{
          echo "\n".color("red","-] Message: ".$message);
        }
        
echo "\n \n";
				
$cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=13&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
        $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
        $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
        $voucher11 = getStr1('"title":"','",',$cekvoucher,"11");
        $voucher12 = getStr1('"title":"','",',$cekvoucher,"12");
        $voucher13 = getStr1('"title":"','",',$cekvoucher,"13");
        echo "\n".color("purple","Total vouchers ".$total." : ");
        echo "\n".color("nevy","1. ".$voucher1);
        echo "\n".color("nevy","2. ".$voucher2);
        echo "\n".color("nevy","3. ".$voucher3);
        echo "\n".color("nevy","4. ".$voucher4);
        echo "\n".color("nevy","5. ".$voucher5);
        echo "\n".color("nevy","6. ".$voucher6);
        echo "\n".color("nevy","7. ".$voucher7);
        echo "\n".color("nevy","8. ".$voucher8);
        echo "\n".color("nevy","9. ".$voucher9);
        echo "\n".color("nevy","10. ".$voucher10);
      	echo "\n".color("nevy","11. ".$voucher11);
        echo "\n".color("nevy","12. ".$voucher12);
        echo "\n".color("nevy","13. ".$voucher13);
        echo"\n";
$expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
        $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
        $expired8 = getStr1('"expiry_date":"','"',$cekvoucher,'8');
        $expired9 = getStr1('"expiry_date":"','"',$cekvoucher,'9');
        $expired10 = getStr1('"expiry_date":"','"',$cekvoucher,'10');
        $expired11 = getStr1('"expiry_date":"','"',$cekvoucher,'11');
        $expired12 = getStr1('"expiry_date":"','"',$cekvoucher,'12');
        $expired13 = getStr1('"expiry_date":"','"',$cekvoucher,'13');

				

			} else {
				die("OTP salah!");
			}
		} else {
//echo "\n".$nohp;
			die("ERROR !");
			
		}
		
        
        
         }
//  }

// echo change()."\n";
