<?php

echo "sending dud payload <br> "; 
$user = "";
$pass = ""; 

$mux = file_get_contents("php//input"); 
$demux = json_decode($json_data, true); 
if (isset($demux['username'])) 
   $user = $data['username']; 
if (isset($demux['password'])) 
   $pass = $data['password']; 

$payload = array("ucid" => $user, "pass" => $pass); 
$url = "https://aevitepr2.njit.edu/myhousing/login.cfm"; 
$fac = curl_init(); 
curl_setopt($fac, CURLOPT_URL, $url);
curl_setopt($fac, CURLOPT_POST, 1); 
curl_setopt($fac, CURLOPT_POSTFIELDS, http_build_query($payload)); 
curl_setopt($fac, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($fac, CURLOPT_FOLLOWLOCATION, true); 
if (curl_exec($fac) ===  false) 
      echo "curl_error:" . curl_error($fac) . "<br>";
$result = curl_exec($fac); 
curl_close($fac); 
// if (strpos($result, "The UCID or password you entered was incorrect") == false) 
if (strpos($result, "Please login using your UCID") != true) 
           echo "NJIT accept"; 
else
	   echo "NJIT reject"; 
?>
