<?php
function encrypt_decrypt($string,$action='encrypt') 
{
  $output = false;
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'm1HkL!vD1!Y2A##Nn3Yk2GQQ4VDIw#Pbow%wwwd1cbgJxiYQ^I';
  $secret_iv = 'xciZA%r8VWQR9aWB6$8eF8QrmEh4P$^PgJPh0RWwoQURhd3aSF';
  // hash
  $key = hash('sha256', $secret_key);    
  // iv - encrypt method AES-256-CBC expects 16 bytes 
  $iv = substr(hash('sha256', $secret_iv), 0, 16);
  if ( $action == 'encrypt' ) {
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
  } else if( $action == 'decrypt' ) {
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  }
  return $output;
}
?>