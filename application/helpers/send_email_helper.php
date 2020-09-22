<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sendMail'))
{
  function sendMail($subject, $mailContent, $mailTo, $mailFromId, $mailFromName,$data)
  {
      $CI =& get_instance();
      $CI->load->library('email');
      $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.gmail.com',
      'smtp_port' => 465,
      'smtp_user' => 'gshukufuku@gmail.com',
      'smtp_pass' => '1sampai10',
      'mailtype' => 'html', //plaintext 'text' mails or 'html'
      'charset' => 'iso-8859-1'
    );
    $message = $CI->load->view($mailContent,$data,TRUE);

      $CI->email->set_newline("\r\n");
      $CI->email->initialize($config);
      $CI->email->from($mailFromId, $mailFromName);
      $CI->email->to($mailTo);
      $CI->email->subject($subject);
      $CI->email->message($message);
      if($CI->email->send()==TRUE){
          // echo "email berhasil dikirim";
      }else{
          echo "email gagal dikirim";
          echo $CI->email->print_debugger();
      }

  }
}
