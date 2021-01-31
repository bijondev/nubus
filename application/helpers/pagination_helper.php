<?php
$ci =& get_instance();

$ci->load->model('model_common');

 function get_settings_details($id){
			$ci =& get_instance();
			
			$s =$ci->model_common->get_settings_details($id);
			
        return $s;
    }

	 function send_mail($from,$name,$mail,$sub, $msg)
{
	$ci =& get_instance();
       $finresult    = get_settings_details(1);
       
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = $finresult->smtp_host;
        $config['smtp_user'] = $finresult->smtp_username;
        $config['smtp_pass'] = $finresult->smtp_password;
        $config['smtp_port'] = 587;
        $config['mailtype'] = 'html';

        $ci->email->initialize($config);
        $ci->email->from($from, $name);
        $ci->email->to($mail);

        $ci->email->subject($sub);
        $ci->email->message($msg);
       
       $ci->email->send();
       
       //echo     $this->email->print_debugger();
   }

?>