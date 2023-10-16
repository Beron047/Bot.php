<?php
system("clear");
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
function curl($url, $post = 0, $httpheader = 0, $proxy = 0){
        $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            curl_setopt($ch, CURLOPT_COOKIE,TRUE);
            curl_setopt($ch, CURLOPT_COOKIEFILE,"cookienoko.txt");
            curl_setopt($ch, CURLOPT_COOKIEJAR,"cookienoko.txt");
            if($post){
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            }
            if($httpheader){
              curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
            }
            if($proxy){
              curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
              curl_setopt($ch, CURLOPT_PROXY, $proxy);
              // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
            }
            curl_setopt($ch, CURLOPT_HEADER, true);
            $response = curl_exec($ch);
            $httpcode = curl_getinfo($ch);
            if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
              $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
              $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
              curl_close($ch);
              return array($header, $body);
            }
   }
    function get($url, $ua){
     return curl($url, null, $ua)[1];
   }
   
   function post($url, $data, $ua){
     return curl($url, $data, $ua)[1];
   }
   function bot($a, $b, $c) {
    return[
        "+".$a."+".$c."+".$b,
        "+".$a."+".$b."+".$c,
        "+".$b."+".$c."+".$a,
        "+".$b."+".$a."+".$c,
        "+".$c."+".$b."+".$a,
        "+".$c."+".$a."+".$b
    ];}
    function x($awal,$akhir,$res,$no){
     $data = explode($akhir,explode($awal,$res)[$no])[0];
     return $data;
    }
    function antb($res,$no){
     $bot = x('rel=\"','\"',$res,$no);
     return $bot;
    }
    function recaptcha3($user, $ur, $cook){
     $u=array("Host: www.google.com","X-Requested-With: XMLHttpRequest","user-agent: $user","cookie: $cook");
     $url=$ur;
     $k=explode("&",$url)[1];
     $co=explode("&",$url)[2];
     $v=explode("&",$url)[4];
     $res=get($url,'',$u);
     $rtk=explode('"',explode('<input type="hidden" id="recaptcha-token" value="',$res)[1])[0];
     $data="$v&reason=q&c=$rtk&$v&$co";
     $res=post("https://www.google.com/recaptcha/api2/reload?$k",$data,"www.google.com");
     $v3=explode('"',explode('["rresp","',$res)[1])[0];
     if($v3){
       echo slow("\033[1;92mget captcha            \r");
       return $v3;
      }else{
          echo Slow(" \033[1;91mwait captcha           \r");
      }
  }
   /*
\033[1;90m Abu Gelap
\033[1;91m Merah
\033[1;92m Hijau
\033[1;93m Kuning
\033[1;94m Biru Gelap
\033[1;95m Ungu
\033[1;96m Biru Telor Asin
\033[1;97m Putih
*/
$ab="\033[1;90m";
$m="\033[1;91m";
$h="\033[1;92m";
$k="\033[1;93m";
$bg="\033[1;94m";
$u="\033[1;95m";
$bta="\033[1;96m";
$p="\033[1;97m";
    function Col($str,$color){
      if($color=="rand"){
        $color=['h','k','p','k','m'][array_rand(['h','k','b','u','m'])];
      }
      $war=array('rw'=>"\033[107m\033[1;31m",'rt'=>"\033[106m\033[1;31m",'ht'=>"\033[0;30m",'p'=>"\033[1;97m",'a'=>"\033[1;30m",'m'=>"\033[1;31m",'h'=>"\033[1;32m",'k'=>"\033[1;33m",'b'=>"\033[1;34m",'u'=>"\033[1;35m",'c'=>"\033[1;36m",'rr'=>"\033[101m\033[1;37m",'rg'=>"\033[102m\033[1;34m",'ry'=>"\033[103m\033[1;30m",'rp1'=>"\033[104m\033[1;37m",'rp2'=>"\033[105m\033[1;37m");
      return $war[$color].$str."\033[0m";
    }
    function timer($timer){
      date_default_timezone_set('UTC');
      $tim = time()+$timer;
      while(true):
        echo "\r                          \r";$wsl=$wrn[$i];
        $tm = $tim-time();
        $date=date("H:i:s",$tm);
        if($tm<1){
          break;
        }
        echo col("p","rand").col("l","rand").col("e","rand").col("a","rand").col("s","rand").col("e","rand").col(" w","rand").col("a","rand").col("i","rand").col("t","rand").col(" $date ","rand").col("•","rand").col("•","rand").col("•","rand").col("•","rand").col("•","rand");
         sleep(1);
         endwhile;
     }
    function Slow($msg){
      $slow = str_split($msg);
      foreach( $slow as $slowmo ){ 
        echo $slowmo; 
        usleep(888);
      }
    }
    function Sav($namadata){
     if(file_exists($namadata)){
       $data = file_get_contents($namadata);
      }else{
        $data = readline("\033[1;32m Input ".$namadata." :  ");
        file_put_contents($namadata,$data);
      }
      return $data;
    }
function recaptchav2($apikey, $sitekey, $pageurl){
 $ua = ["host: goodxevilpay.pp.ua","content-type: application/json/x-www-form-urlencoded"];
 while(true){
  $r1 = get("http://goodxevilpay.pp.ua/in.php?key=$apikey&method=userrecaptcha&googlekey=$sitekey&pageurl=$pageurl",$ua);
  $id = explode('OK|',$r1)[1];
  if(!$id){sleep(20);continue;}
  sleep(0);
  while(true){
   print ($m."prosess...");
   $r2 = get("http://goodxevilpay.pp.ua/res.php?key=$apikey&action=get&id=$id",$ua);
   if($r2 == "ERROR_CAPTCHA_UNSOLVABLE"){
    print "\r                 \r";
    print ($m."prosess......");
    sleep(5);
    print "\r                    \r";
    continue;
   }
   print "\r                 \r";
   return explode('|', $r2)[1];
  }
 }
}
$r =  str_repeat("\033[1;95m~", 50)."\n";
$l =  str_repeat("\033[1;95m_", 50)."\n";
$t =  str_repeat("\033[1;91m◼", 50)."\n";
function ban(){
  $u =  "\033[1;91mTime : ".date("H:i:s");
  $v=0.1;
  $c="Creator";
  $B="Beron Manchunian";
  echo $ban=Slow("             
   \033[1;91m                      __         
         /'\_/`\        /\ \        
        /\      \    ___\ \ \___    
        \ \ \__\ \  /'___\ \  _ `\  
   \033[1;97m      \ \ \_/\ \/\ \__/\ \ \ \ \ 
          \ \_\\ \_\ \____\\ \_\ \_\
           \/_/ \/_/\/____/ \/_/\/_/
     $u             version: \033[1;91m$v 
\033[1;92m     \033[1;93m$c :                     \033[1;93m$B
\033[1;92m  ___________________________________________
\033[1;91m              please don't edit
                  \033[1;93mWARNING!!!
       \033[1;91millegal program all at own risk 
              dont't for sell
\033[1;92m  ___________________________________________\n");
echo Slow( str_repeat("\033[1;91m◼",50)."\n");
print Slow("       \033[1;96m       Balkanofaucet.net\n");
echo Slow( str_repeat("\033[1;91m◼",50)."\n");
}
function head(){
    $ua=array();
    $ua[]="Host: balkanofaucet.net";
    $ua[]="accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7";
    $ua[]="content-type: application/x-www-form-urlencoded";
    $ua[]="user-agent: Mozilla/5.0 (Linux; Android 11) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36";
    return $ua;
 }
 system('clear');
$email=Sav("Emaiill");
$pass=sav("Password");
$coin=sav("Jumlah Coin Auto WD");
$apikey=Sav("Apikey_Xevil");
system("clear");
ban();
goto a;
  b:
  $res=get("https://balkanofaucet.net/login",head());
  $token=explode('"',explode('name="csrf_token_name" value="',$res)[1])[0];
  $data="email=$email&password=$pass&captcha=recaptchav2&g-recaptcha-response=&csrf_token_name=$token";
  $res=post("https://balkanofaucet.net/auth/login",$data,head());
  a:
    $res=get("https://balkanofaucet.net/dashboard",head());
    $usr=explode('</p>',explode('class="fas fa-coins"></i> ',$res)[1])[0];
    if($usr==null){
      goto b;
    }
    $res=get("https://balkanofaucet.net/faucet",head());
    $cl=explode('</h4>',explode('class="lh-1 mb-1">',$res)[4])[0];
      if($cl=="0/100"){
        echo slow($m."Claim Left Habis...\n");
      }
        $pil["pilih"]=readline("Tekan Enter Untuk Lanjut Ke Akun Ke-2");
    print slow("$l");
    if($pil["pilih"]==null){
      goto faucet;
    }elseif($pil["pilih"]==0){
      exit;
    }
    echo slow($h."Faucetpay : ".$p."$email\n");
    echo slow($h."Balance   : ".$p."$usr\n");
    echo slow("$l");
    faucet:
      for($i=0;$i<7;$i++){if($i==6){ print "\033[1;92m Invalid           \r"; goto faucet;}
      $res=get("https://balkanofaucet.net/faucet",head());
      $cl=explode('</h4>',explode('class="lh-1 mb-1">',$res)[4])[0];
      if($cl=="0/100"){
        echo slow($m."Claim Left Habis...\n");
        system("rm cookienoko.txt");
  $pil["pilih"]=readline("Tekan Enter Untuk Lanjut Ke Akun Ke-2");
    print slow("$l");
    if($pil["pilih"]==null){
      goto bb;
    }
    bb:
        $email=Sav("Emailbalkano");
        goto b;
      }
      $wak=explode(" - 1;",explode("let wait = ",$res)[1])[0];
      if($wak){
        timer($wak);
      }
      
      $tk=explode('"',explode('name="csrf_token_name" id="token" value="',$res)[1])[0];
      $token=explode('"',explode('name="token" value="',$res)[1])[0];
      $bot=bot(antb($res,1),antb($res,2),antb($res,3))[$i];
      $data="antibotlinks=$bot&csrf_token_name=$tk&token=$token&captcha=recaptchav2&g-recaptcha-response=";
      $res=post("https://balkanofaucet.net/faucet/verify",$data,head());
      
      
      $cl=explode('</h4>',explode('class="lh-1 mb-1">',$res)[4])[0];
      if($cl=="0/100"){
        echo slow($m."Claim Left Habis...\n");
        exit;
        }
      $suk=explode("',",explode("type: '",$res)[1])[0];
      $suc=explode("',",explode("title: '",$res)[1])[0];
      $sus=explode("'",explode("text: '",$res)[1])[0];
      $res=get("https://balkanofaucet.net/dashboard",head());
    $usr=explode('</p>',explode('class="fas fa-coins"></i> ',$res)[1])[0];
    date_default_timezone_set("Asia/Jakarta");
      $uku =  date("H:i:s");
      if($suk=="success"){
        echo slow($m."√".$h."$suc ".$h."$sus\n");
        echo slow($m."*".$h."Balance :".$p." $usr ".$k."| ".$h."Claim Left : ".$p."$cl ".$m."$uku\n");
        echo slow("$l");
        if($usr>"1,300.00"){goto wd;
          wd:
        $res=get("https://balkanofaucet.net/dashboard",head());
        $tk=explode('"',explode('name="csrf_token_name" value="',$res)[1])[0];
        $data="method=1&amount=$coin&wallet=$email&csrf_token_name=$tk";
        $res=post("https://balkanofaucet.net/dashboard/withdraw",$data,head());
       $ban=explode('</div>',explode('class="fas fa-exclamation-circle"></i> You are banned, please contact admin for more detail',$res)[1])[0];
       $baned=explode('</div>',explode('class="fas fa-exclamation-circle"></i>',$res)[1])[0];
       if($ban=="."){
         echo slow($k."$baned\n");
         exit;
       }
        $suk=explode("',",explode("type: '",$res)[1])[0];
      $suc=explode("',",explode("title: '",$res)[1])[0];
      $sus=explode("'",explode("text: '",$res)[1])[0];
      if($suk=="success"){
        echo slow($m."√".$k."$suc ".$k."$sus\n");
        echo slow("$l");
      }
        }
       goto faucet;
      }
      print "\033[1;91mLoading".str_repeat('.',$i)."          \r";
    
      }
 