<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function current_url()
{
    $CI =& get_instance();
    $url = $CI->config->site_url($CI->uri->uri_string());
    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
}

// function for sms
/*function sendsms($number, $message)
{
	$user = "cthealth"; 
	$pass = "CT@ihUHCC11"; 
	$sid = "DLP"; 
	$url="http://sms.sslwireless.com/pushapi/dynamic/server.php";
	$param="user=$user&pass=$pass&sms[0][0]=$number&sms[0][1]=".urlencode($message)."&sid=$sid";
	$crl = curl_init();
	curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE);
	curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2);
	curl_setopt($crl,CURLOPT_URL,$url); 
	curl_setopt($crl,CURLOPT_HEADER,0);
	curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($crl,CURLOPT_POST,1);
	curl_setopt($crl,CURLOPT_POSTFIELDS,$param); 
	$response = curl_exec($crl);
	curl_close($crl);
}*/

function sendsms($number, $message) {
    $url = "http://sms.iccteleservices.com/smsapi";
  $data = [
    "api_key" => "C20070275f66f94e214d64.69540581",
    "type" => "text",
    "contacts" => $number,
    "senderid" => "8809601000127",
    "msg" => json_encode($message),
  ];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}
