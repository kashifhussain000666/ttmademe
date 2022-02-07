<?php
try {


//'123ATXSfe'
$ttclid = '';
$event = '';
if(isset($_GET['ttclid']))
{
  $ttclid = $_GET['ttclid'];
 // A sample PHP Script to POST data using cURL
}
if(isset($_GET['event']))
{
  $event = $_GET['event'];
 // A sample PHP Script to POST data using cURL
}
die("sad");
$pixelcode = 'C7U51M5TSIPDF1VIFEF0';
$user_agent = 	$_SERVER['HTTP_USER_AGENT']??null;
$timestamp = date("Y-m-d"). "T".date("H:i:s") . "Z";
$event = $event;
$event_id = '1616318632825_357';
$IP = getUserIpAddr();
$AccessToken = 'ba804eec21ab0d2fa2215953bfd4f584c7f68fe3';
$callback = $ttclid;
$referrer = 'https://ttmademe.herokuapp.com/';
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  $data = array(
      'pixel_code' => $pixelcode,
      'event' => $event,
      'event_id' => $event_id,
      'timestamp' => $timestamp,
      'context' => array(
            "ad"         => array(
            'callback' => $callback
            )
      ),
      'page' => array(
      'url' => $url,
      'referrer' => $referrer
      ),
      'user' => array(
      'external_id' => 'f0e388f53921a51f0bb0fc8a2944109ec188b59172935d8f23020b1614cc44bc',
      'phone_number' => '2f9d2b4df907e5c9a7b3434351b55700167b998a83dc479b825096486ffcf4ea',
      'email' => 'dd6ff77f54e2106661089bae4d40cdb600979bf7edc9eb65c0942ba55c7c2d7f'
      
      ),
      'user_agent' => $user_agent,

      'ip' => $IP,
  );
   
  $post_data = json_encode($data);
   
  // Prepare new cURL resource
  $crl = curl_init('https://business-api.tiktok.com/open_api/v1.2/pixel/track/');
  curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($crl, CURLINFO_HEADER_OUT, true);
  curl_setopt($crl, CURLOPT_POST, true);
  curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
   
  // Set HTTP Header for POST request 
  curl_setopt($crl, CURLOPT_HTTPHEADER, array(
      'Access-Token: '.$AccessToken,
      'Content-Type: application/json')
  );
   
  // Submit the POST request
  $result = curl_exec($crl);
  //print_r($result);
  // handle curl error
  if ($result === false) {
      // throw new Exception('Curl error: ' . curl_error($crl));
      //print_r('Curl error: ' . curl_error($crl));
      $result_noti = 0; 
  } else {

      $result_noti = 1; 
  }
  // Close cURL session handle
  curl_close($crl);
}
//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}


function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>
echo "Success";


?>