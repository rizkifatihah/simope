<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('payment'))
{
  function payment($data,$buyerName,$buyerEmail,$buyerPhone,$id_transaction)
  {
      $CI =& get_instance();
      // SAMPLE HIT API iPaymu v2 PHP //
      $va           = '1179001361367024'; //get on iPaymu dashboard
      $secret       = 'E3937F8C-A441-495F-A0FD-FBD484F5070F'; //get on iPaymu dashboard

      $url          = 'https://my.ipaymu.com/api/v2/payment'; //url
      $method       = 'POST'; //method

      //Request Body//
      $body['product']    = $data['product'];
      $body['qty']        = $data['qty'];
      $body['price']      = $data['price'];
      $body['buyerName']      = $buyerName;
      $body['buyerEmail']      = $buyerEmail;
      $body['buyerPhone']      = $buyerPhone;
      $body['returnUrl']  = base_url('account/transHistory?id_transaction='.my_simple_crypt($id_transaction,'e'));
      $body['cancelUrl']  = base_url('cart/cancelOrder/');
      $body['notifyUrl']  = base_url('account/transNotif/'.my_simple_crypt($id_transaction,'e'));
      //End Request Body//

      //Generate Signature
      // *Don't change this
      $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
      $requestBody  = strtolower(hash('sha256', $jsonBody));
      $stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
      $signature    = hash_hmac('sha256', $stringToSign, $secret);
      $timestamp    = Date('YmdHis');
      //End Generate Signature


      $ch = curl_init($url);

      $headers = array(
          'Accept: application/json',
          'Content-Type: application/json',
          'va: ' . $va,
          'signature: ' . $signature,
          'timestamp: ' . $timestamp
      );

      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      curl_setopt($ch, CURLOPT_POST, count($body));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      $err = curl_error($ch);
      $ret = curl_exec($ch);
      curl_close($ch);
      if($err) {
          echo $err;
      } else {

          //Response
          $ret = json_decode($ret);
          if($ret->Status == 200) {
              $sessionId  = $ret->Data->SessionID;
              $url        =  $ret->Data->Url;
              header('Location:' . $url);
          } else {
              print_r($ret);
          }
          //End Response
      }

  }
}
