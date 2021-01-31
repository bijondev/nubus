<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
   
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		
		 $this->load->model('booking_model');
		 
 	}

 	 //  promo code Management created by Anju MS on 08-12-2016
 	// start 
 	public function check_promo()
	{
		
	    $data =  $_POST;
	    $query = $this->booking_model->get_promo($data);
	    if(count($query)>0){
	      $this->booking_model->update_promo($data);
	      echo $amt=$query->amount;

	    }
	    else{
	    	echo 0;
	    }
     
     
	}
	// end
	
	public function index()
	{


		$template['page'] = "Payment/payment";
		$template['page_title'] = "Book Ticket - Customer Information";
		$template['logo'] = get_settings_details(1);
		$this->load->view('template', $template);
	}
	
	public function userDetails() {
		$data = $_POST;
		
		$data1 = array(								 
							 'dateJ' => $data ['booking_date'],
							 '0seats'  => $data ['0seat_no'],							 
							 '0bus_id'  => $data ['obus_id']							 						 						 
                                           );
										   
		$result1 = $this->booking_model->get_checkvalues($data1);
		
		$count1 = count($result1);
		
		$count2 = 0;
		if(!empty($data['Rbooking_date']) || !empty($data['Rbus_id']) || !empty($data['Rseat_no']) ){
			
			$data2 = array(								 
							 'dateJ' => $data ['Rbooking_date'],
							 '0seats'  => $data ['Rseat_no'],							 
							 '0bus_id'  => $data ['Rbus_id']							 						 						 
                                           );
										   
			$result2 = $this->booking_model->get_checkvalues($data2);
		
			$count2 = count($result2);
			
		}

		
		
		 if($count1 > 0 || $count2 > 0){
		    
			
			   $result['status'] = 'exist';
				$result['url'] = 'payment/index?from='.$data['board_point'].
                                    '&to='.$data['drop_point'].
									'&dateJ='.$data['booking_date'].
									'&dateR='.$data['Rbooking_date'].
									'&0ckc='.$data['orout_id'].
									'&0bpnt='.$data['oboarding_point_id'].
									'&0seats='.$data['0seat_no'].
									'&0bus_id='.$data['obus_id'].
									'&Rckc='.$data['Rrout_id'].
                                    '&Rbpnt='.$data['Rboarding_point_id'].
									'&Rseats='.$data['Rseat_no'].
									'&Rbus_id='.$data['Rbus_id'];
									print json_encode($result);
									
									
		 }
		 else {	

		 
		
		$result = $this->booking_model->booking($data);
		
		print json_encode($result);
		 }
		
	}
	public function result()
	{

		//$_POST['payment_status'] = 'completed';
		$template['page'] = "Payment/result_paypal";
		$template['page_title'] = "Book Ticket - Customer Information";
		$template['logo'] = get_settings_details(1);
		$this->load->view('template', $template);
	}
	public function result_cash($data)
	{ 

		//print_r($data);

		$booked_customer = $this->booking_model->pull_customer_details($data);
		$result=$this->booking_model->insert_data_cash($data);
		$data_new=$this->booking_model->email_details($data);
		if($result){
			foreach ($data_new as $rs) {
				$data_rs = array('booking_id'=>$rs['booking_id'].'-'.$rs['bid']);
				$this->db->where('id',$rs['bid'])->update('booking_details',$data_rs);
				$this->db->where('order_id',$rs['bid'])->update('customer_details',$data_rs);
				$rs['booking_id'] = $rs['booking_id'].'-'.$rs['bid'];
				$new_rs[] = $rs;	
			}
		
			/*************return email*******************/
			           $settings = get_settings_details(1);       
						$smtp_username= $settings->smtp_username;
						$web_title=$settings->title;			
						$subject="Booking_details";
						$email=$booked_customer->email;			
						$template['data']=$new_rs;	
						$msg=$this->load->view('Email/booking_detail', $template, true);
						$send = send_mail($smtp_username,$web_title,$email,$subject,$msg);

                      /*************ongoing  email*******************/
						$settings = get_settings_details(1);        
						$smtp_username= $settings->smtp_username;
						$web_title=$settings->title;			
						$subject="Booking_details";
						$email=$booked_customer->email;			
						$template['data']=$new_rs;	
						$msg=$this->load->view('Email/booking_detail_return', $template, true);						 
						$send = send_mail($smtp_username,$web_title,$email,$subject,$msg);
			

			

			
			
			
		}

		$template['page'] = "Payment/result_cash";
	    $template['data']=$this->booking_model->get_cash_result($new_rs);
		$template['page_title'] = "Book Ticket - Customer Information";
		$template['logo'] = get_settings_details(1);
		$this->load->view('template', $template);
	}
	public function new_window()
	{
		$id =$this->uri->segment(3);
		
		$onewayDetails=$this->booking_model->mail_details_bookingID($id);

		//print_r($onewayDetails);
			$template['result']=$onewayDetails;
		
		    $this->load->view('Pdf/pdfreport', $template);
		
		
		
	}
	
public function cancel()
	{
		$template['page'] = "Payment/cancel_paypal";
		$template['page_title'] = "Book Ticket - Customer Information";
		$template['logo'] = get_settings_details(1);
		$this->load->view('template', $template);
	}
	public function email_notification() {
		
		$data = $_POST;
		$onewayDetails=$this->booking_model->mail_details_bookingID($data['id']);
		
		if($onewayDetails[0]['username']==NULL){
			$finresult = array( 'status'  => 'failed','message' => 'error','code'    => 'error');
         print json_encode( $finresult );
			
		}else{
			if($data['type']=='email'){
				
				$s = $this->booking_details($onewayDetails);
				/*print_r($s);*/
				
			}
			$result = array( 'status'  => 'success','message' => 'Successfully Mail Send','code'    => 'email');
		          print json_encode( $result );
			
		}
	}
		public function payment_sucess() {
		$data = $_POST;
		
		$result = $this->booking_model->payment_sucess($data);
		 
            if($result==true){
				if($data['RBookid']!=''){
					$twowayDetails=$this->booking_model->mail_details($data['RBookid']);
				
				$s = $this->booking_details($twowayDetails);
				}
				$onewayDetails=$this->booking_model->mail_details($data['OBookid']);
				
				$s = $this->booking_details($onewayDetails);
			}
		print json_encode( $result);
	}


 
	
	public function booking_details($data)
	{
		$finresult    = get_settings_details(1);   
         $from= $finresult->smtp_username;
         $name=$finresult->title;
         $s =base_url();
         $sub="Booking_details";
         $email=$data[0]['email'];
		 $template['data']=$data;
         $msg=$this->load->view('Email/booking_detail', $template, true);
         $send = send_mail($from,$name,$email,$sub,$msg);
        
         /*$this->email->print_debugger();
       */
         if( $send ){ // check if user exist or not
           
                return true;
            }
	}
	public function checkout()
	{
	
		try {	
			
			require_once(APPPATH.'libraries/Stripe/lib/Stripe.php');//or you
			Stripe::setApiKey("sk_test_OOBAAYHcf1dTbYjfFiOH5QTF"); //Replace with your Secret Key
 
			$charge = Stripe_Charge::create(array(
				"amount" => $this->uri->segment(3)*100 ,
				"currency" => "usd",
				"card" => $_POST['stripeToken'],
				"description" => "Demo Transaction"
			));
			var_dump($charge);
			echo "<h1>Your payment has been completed.</h1>";	
		}
 
		catch(Stripe_CardError $e) {
 
		}
		catch (Stripe_InvalidRequestError $e) {
 
		} catch (Stripe_AuthenticationError $e) {
		} catch (Stripe_ApiConnectionError $e) {
		} catch (Stripe_Error $e) {
		} catch (Exception $e) {
		}
	}
 
	function paytmpost()
{
 header("Pragma: no-cache");
 header("Cache-Control: no-cache");
 header("Expires: 0");

 // following files need to be included
 require_once(APPPATH . "/third_party/paytmlib/config_paytm.php");
 require_once(APPPATH . "/third_party/paytmlib/encdec_paytm.php");

 $checkSum = "";
 $paramList = array();

 $ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

// Create an array having all required parameters for creating checksum.
 $paramList["MID"] = 'Omegan10335807669307';
 $paramList["ORDER_ID"] = $ORDER_ID;
 $paramList["CUST_ID"] = $CUST_ID;
 $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
 $paramList["CHANNEL_ID"] = $CHANNEL_ID;
 $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
 $paramList["WEBSITE"] = "Omweb";

 /*
 $paramList["MSISDN"] = $MSISDN; //Mobile number of customer
 $paramList["EMAIL"] = $EMAIL; //Email ID of customer
 $paramList["VERIFIED_BY"] = "EMAIL"; //
 $paramList["IS_USER_VERIFIED"] = "YES"; //

 */

//Here checksum string will return by getChecksumFromArray() function.
 $checkSum = getChecksumFromArray($paramList,'Gg3ntMLD!YRHqm_6');
 
 ?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
	
			document.f1.submit();
		
		

		</script>
	</form>
</body>
</html>
<?php 
 } 
}