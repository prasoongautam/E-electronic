<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');







if ( ! function_exists('send_mail'))



{



    function send_mail($to='',$msg='',$sub='')



    {



    	 $ci =& get_instance();



        $config = Array(
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
            );



      $ci->email->initialize($config);

      $ci->email->set_newline("\r\n");

      $ci->email->from("info@kumarelectric.com"); // change it to yours

      $ci->email->to($to);// change it to yours

      $ci->email->subject($sub);

      $ci->email->message($msg);



      if(!$ci->email->send())

      {

       // echo $ci->email->print_debugger();

       // exit;

      }



    }   



}