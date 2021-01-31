<div ng-controller="search" ng-init="getUrlparameterPayment()">
    <div class="out_gal">

        <div class="container">
            <div class="row" style="min-height:25px;margin-top:120px;" ng-hide="Twowaypaymentdetails.length !='0'">
                <div class="col-md-4">
                    <div class="rb_directionn2">
                        <div class="rb_directionn">&nbsp;</div>
                        <div class="rb_directionn1" style="border-right:3px solid #eeeeee;">
                            <div class="tb_align">
                                <span class="tb_from">{{board_points}}</span>
                                <span class="tb_arrow"><img src="<?php echo base_url();?>assets/images/arrow-right.png"></span>
                                <span class="tb_to">{{drop_points}}</span>
                            </div>
                            <div class="tb_align">
                                <span class="tb_from2"></span>
                                <span class="tb_arrow2">{{dates | date:'dd-MMM-yyyy '}}</span>
                                <span class="tb_to2"></span>
                            </div>
                        </div>
                        &nbsp;
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rb_directionn2">
                        <div class="rb_directionn">&nbsp;</div>
                        <div class="rb_directionn1">
                            <div class="tb_align_lft">
                                <div class="tb_Corporation">
                                    {{Onewaypaymentdetails[0].pickup_point}},{{Onewaypaymentdetails[0].board_time}}
                                    <br> Seat no(s):{{oseat_no}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rb_directionn2">
                        <div class="rb_directionn">&nbsp;</div>
                        <div class="rb_directionn1" style="border-left:3px solid #eeeeee;">
                            <img src="<?php echo base_url();?>assets/images/pearl.png">
                            <div class="tb_Corporation">
                                {{Onewaypaymentdetails[0].bus_name}}
                            </div>
                        </div>
                    </div>
                </div>




            </div>

        </div>
    </div>





    <div class="row topmar" ng-show="Twowaypaymentdetails.length !='0'">
        <div class="col-md-6" style="border-right:3px solid #eeeeee;">

            <div class="tb_margin">
                <div class="rb_directionn2 ">
                    <div class="rb_directionn">&nbsp;</div>
                    <div class="rb_directionn1 ">
                        <div class="tb_align">
                            <span class="tb_from">{{board_points}}</span>
                            <span class="tb_arrow"><img src="<?php echo base_url();?>assets/images/arrow-right.png"</span>
                            <span class="tb_to">{{drop_points}}</span>
                        </div>
                        <div class="tb_align">
                            <span class="tb_from2"></span>
                            <span class="tb_arrow2">{{dates | date:'EEE,dd-MMM-yyyy '}}</span>
                            <span class="tb_to2"></span>
                        </div>
                    </div>
                    &nbsp;
                </div>

                <div class="rb_directionn1 topbot">
                    <img src="<?php echo base_url();?>assets/images/pearl.png">
                    <div class="tb_Corporation">
                        {{Onewaypaymentdetails[0].bus_name}}
                    </div>
                </div>

                <div class="rb_directionn1">
                    <div class="tb_align_lft">
                        <div class="tb_Corporation lefft">
                            {{Onewaypaymentdetails[0].pickup_point}},{{Onewaypaymentdetails[0].pickup_time}}
                            <br> Seat no(s):{{oseat_no}}
                            <br> {{dates | date:'EEE,dd-MMM-yyyy '}}
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-md-6">
            <div class="tb_margin">
                <div class="rb_directionn2 lefft">
                    <div class="rb_directionn">&nbsp;</div>
                    <div class="rb_directionn1 ">
                        <div class="tb_align">
                            <span class="tb_from">{{drop_points}}</span>
                            <span class="tb_arrow"><img src="<?php echo base_url();?>assets/images/arrow-right.png"</span>
                            <span class="tb_to">{{board_points}}</span>
                        </div>
                        <div class="tb_align">
                            <span class="tb_from2"></span>
                            <span class="tb_arrow2">{{Returndates | date:'EEE,dd-MMM-yyyy '}}</span>
                            <span class="tb_to2"></span>
                        </div>
                    </div>
                    &nbsp;
                </div>

                <div class="rb_directionn1 topbot">
                    <img src="<?php echo base_url();?>assets/images/pearl.png">
                    <div class="tb_Corporation">
                        {{Twowaypaymentdetails[0].bus_name}}
                    </div>
                </div>

                <div class="rb_directionn1">
                    <div class="tb_align_lft">
                        <div class="tb_Corporation lefft">
                            {{Twowaypaymentdetails[0].pickup_point}},{{Twowaypaymentdetails[0].pickup_time}}
                            <br> Seat no(s):{{Rseat_no}}
                            <br> {{Returndates | date:'EEE,dd-MMM-yyyy '}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bag_gal">
        <div class="container">
            <div class="row" style="margin-top:30px;">
                <div class="col-md-9">
                    <div class="pay_inner">
                        <form id="userForm" data-parsley-validate="">
                            <div class="pay_inner1">

                                <div class="rb_nam" ng-repeat="i in counter(numberss) track by $index">
                                    <div class="rb_name1">
                                        <span class="name_tbb">Name</span><span class="star_tb">*</span>
                                        <input type="text" name="name[]" class="passenger left" placeholder="Enter Passenger Name" data-parsley-pattern="^[a-zA-Z\  \/]+$" required>
                                    </div>

                                    <div class="rb_name2"> <span class="name_tbb">Age</span> <span class="star_tb">*</span>
                                        <span style="margin-left: 10px;"><input type="text" min="18" max="60" name="age[]" class="rb_age" placeholder="Age" data-parsley-type="digits" required></span>
                                    </div>

                                    <div class="rb_name3">

                                        <span class="name_tbb">Gender</span><span class="star_tb">*</span>

                                        <input type="radio" class="tb_dender" value="male" name="gemder[{{$index}}]" required>
                                        <label class="tb_gender">M</label> &nbsp;
                                        <input type="radio" name="gemder[{{$index}}]" value="female">
                                        <label class="tb_gender">F</label>
                                    </div>
                                    <br>
                                    <br>

                                </div>



                                <div class="rb_nam rb_names">
                                    <div class="rb_name1">
                                        <span class="name_tbb">Mobile</span><span class="star_tb">*</span>
                                        <input type="text" name="mobile" class="passenger" placeholder="Enter Mobile No" data-parsley-type="digits" required>
                                    </div>
                                    <div class="rb_name2_lft"> <span class="name_tbb">
                                        Email</span><span class="star_tb">*</span>
                                        <input type="email" name="email" class="rb_age1" placeholder="Ticket will be sent to this mail ID" required>




                                        <input type="hidden" name="oamount" value="{{Onewaypaymentdetails[0].fare*numberss}}">
                                        <input type="hidden" name="obus_id" value="{{Onewaypaymentdetails[0].bus_id}}">
                                        <input type="hidden" name="orout_id" value="{{oroute_id}}">
                                        <input type="hidden" name="oboarding_point_id" value="{{oboard_id}}">
                                        <input type="hidden" name="Ramount" value="{{Twowaypaymentdetails[0].fare*numberss}}">
                                        <input type="hidden" name="Rbus_id" value="{{Twowaypaymentdetails[0].bus_id}}">
                                        <input type="hidden" name="Rrout_id" value="{{Rroute_id}}">
                                        <input type="hidden" name="Rboarding_point_id" value="{{Rboard_id}}">
                                        <input type="hidden" name="booking_date" value="{{dates | date:'dd-MM-yyyy '}}">

                                        <input type="hidden" name="Rbooking_date" value="{{Returndates | date:'dd-MM-yyyy '}}">
                                        <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('logged_in')['id'];?>">
                                        <input type="hidden" name="0seat_no" value="{{oseat_no}}">
                                        <input type="hidden" name="Rseat_no" value="{{Rseat_no}}">
                                        <input type="hidden" name="totals" value="{{totals}}">
                                        <!--  <input type="hidden" name="board_point" value=" {{Onewaypaymentdetails[0].board_point}}">
              <input type="hidden" name="drop_point" value=" {{Onewaypaymentdetails[0].drop_point}}"> -->
                                    </div>
                                    <div class="pay_inner new_payinner">
                    <div class="pay_details">Payment Details</div>
                    <div class="amount_pay2 amt_pay amount_check_left">
                        <div class="amount_pay2_tb_new">
                            <span class="tb_pay">Amount Payable:</span> <span class="tb_pay1">TK.{{totals}}.00</span>
                        </div>

                        <div>
                            <label>Enter the Promo Code</label>
                            <input id="code" type="text" name="promo_code" placeholder="promo code">
                            <button id="promo_check" class="promo_butto">Check</button>
                            <span id="promo_status" style="color:red">
                        </div>
                    </div>
                 <!--  <ul class="tabs" style="margin-top:25px;"> -->
                     <!-- <li class="tab-link current" data-tab="tab-4" data-id="paypal">Paypal</li> -->
                     <!--li class="tab-link" data-tab="tab-5" data-id="paytm">Paytm</li-->
                     <!--li class="tab-link" data-tab="tab-6" data-id="paytm">Debit card</li>
                     <li class="tab-link" data-tab="tab-7" data-id="paytm">Net Banking</li-->
                 <!--  </ul> -->
                   
                     
                      
                          
                          <div class="radio_new_payement">
                            <div ng-show="cash_new" >
                          <input type="radio" name="paypal" value="cash" id="paypal_new1"  data-parsley-required="true" required > &nbsp;Cash on Delivery<br></div>
                         <div ng-show="pay"> <input type="radio" name="paypal" value="paypal"  id="paypal_new"  data-parsley-required="true"  > &nbsp;Paypal<br></div>
   
                        </div>
                      </div>
          

                                </div>
                                <input type="button" value="save" id="Customerdetails" onClick="userDetails()" style="display:none;">
                                <br>
                                <br>

                            </div>

                    </div>




                </div>
                <div class="col-md-3">
                    <div class="pay_outer">
                        <div class="payment">Payment Summary</div>

                        <hr class="top">
                        </hr>
                        <div class="payment_all">
                            <div class="payment_sum">
                                Onward Fare
                            </div>
                            <div class="payment_sum2">
                                TK.{{Onewaypaymentdetails[0].fare}} * {{numberss}}
                            </div>
                        </div>
                    </div>
                    <div class="pay_outer">
                        <div class="payment_all" style="border-top:1px dotted #bbb;" ng-hide="dateR=='undefined'">
                            <div class="payment_sum">
                                <div class="offer"> Return Fare</div>
                            </div>
                            <div class="offer">
                                TK.{{Twowaypaymentdetails[0].fare}} * {{numberss}}
                            </div>
                        </div>
                    </div>
                    <div class="pay_outer">
                        <div class="payment_all" style="border-top:1px dotted #bbb;">
                            <div class="payment_sum">
                                <div class="payment_sum" style="font-weight:600;">Total</div>
                            </div>
                            <div class="payment_sum2" style="font-weight:600;">
                                TK.{{totals}}
                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="container" style="display:none;">

        <div class="row">
            <div class="account_outer">
                <input type="checkbox">
                <label class="account_offer">I have an account offer code</label>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
               <!--  <div class="pay_inner">
                    <div class="pay_details">Payment Details</div>
                    <div class="amount_pay2 amt_pay">
                        <div class="amount_pay2_tb_new">
                            <span class="tb_pay">Amount Payable:</span> <span class="tb_pay1">TK.{{totals}}.00</span>
                        </div>

                        <div>
                            <label>Enter the Promo Code</label>
                            <input id="code" type="text" name="promo_code" placeholder="promo code">
                            <button id="promo_check" class="promo_butto">Check</button>
                            <span id="promo_status" style="color:red">
                        </div>
                    </div> -->
                 <!--  <ul class="tabs" style="margin-top:25px;"> -->
                     <!-- <li class="tab-link current" data-tab="tab-4" data-id="paypal">Paypal</li> -->
                     <!--li class="tab-link" data-tab="tab-5" data-id="paytm">Paytm</li-->
                     <!--li class="tab-link" data-tab="tab-6" data-id="paytm">Debit card</li>
                     <li class="tab-link" data-tab="tab-7" data-id="paytm">Net Banking</li-->
                 <!--  </ul> -->
                   
                     
                      
                        <!--  
                          <div class="radio_new_payement">
                          <input type="radio" name="paypal"  value="cash" id="paypal_new1"  data-parsley-required="true" required> &nbsp;Csah on Delivery<br>
                          <input type="radio" name="paypal" value="paypal"  id="paypal_new"  data-parsley-required="true"> &nbsp;Paypal<br>
   
                        </div> -->
          
                  <div class="tab-content current" style="display:none" id="tab-4" >
                     <div class="rupee_lft">&nbsp;</div>
                     <div class="tb_route_inner_txt low ">
                        <div class="tb_route_inner">
                           <div class="amount_pay">
                              <div class="amount_pay1">
                                 &nbsp;
                              </div>
                           <!--    <div class="amount_pay2 amt_pay">
                                 <div class="amount_pay2_tb">
                                    <span class="tb_pay">Amount Payable:</span> <span class="tb_pay1">TK.{{totals}}.00</span>
                        </div> -->
                        <br>
                        <br>
                        <br>
                        <!-- promo code Management script created by Anju MS on 08-12-2016-->
                        <!-- start -->
                        <!-- <div>
                                  <label>Enter the Promo Code</label>
                                  <input id="code" type="text" name="promo_code" placeholder="promo code">
                                  <button id="promo_check"  class="promo_butto">Check</button>
                                  <span id="promo_status" style="color:red"></div>
                                 </div> -->
                        <!-- end -->
                        <br>
                        <div class="rupees"> <img src="<?php echo base_url();?>assets/images/inner2.png"><span class="get_off">  GET 20% OFF.<span class="upto">  (Upto Rs.50) <br>
                                    <span class=" PayUMoney" >100% Secure Payments through Paypal</span>
                            </span>
                            <br>
                            </span>
                        </div>
                        </form>
                        <form ng-submit="SubmitFunction($event)" name='frmPayPal1' id="paypals" style="display: none;" method="POST">
                            <input type='hidden' name='business' value='{{paypaldetails.paypalid}}'>
                            <input type='hidden' name='cmd' value='_xclick'>

                            <input type='hidden' name='item_name' class="item_name_s">
                            <input type='hidden' name='item_number' class="item_names">

                            <input type='hidden' name='amount' id="amount" value='{{totals}}'>
                            <input type='hidden' name='no_shipping' value='1'>
                            <input type='hidden' name='currency_code' value='USD'>
                            <input type='hidden' name='handling' value='0'>
                            <input type='hidden' name='cancel_return' value='<?php echo base_url();?>payment/cancel'>
                            <input type='hidden' name='return' class="sucess_url">

                            <input type="hidden" name="notify_url" class="sucess_url">
                            <input type='hidden' name='rm' value='2'>
                            <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">





                            <br>
                    </div>
                    <div class="amount_pay3">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="book_now">
            <button class="tb_nowbook" onClick="paypal()">Book now </button>
        </div>
        </form>
        <br>
    </div>
    <div class="tab-content " id="tab-5" data-id="paytm">


        <div class="rupee_lft">&nbsp;</div>
        <div class="tb_route_inner_txt low">
            <div class="tb_route_inner">
                <div class="amount_pay">
                    <div class="amount_pay1">
                        &nbsp;
                    </div>
                    <div class="amount_pay2">
                        <div class="amount_pay2_tb">
                            <span class="tb_pay">Amount Payable:</span> <span class="tb_pay1">TK.{{totals}}.00</span>
                        </div>
                        <br>
                        <br>
                        <div class="rupees"> <img src="<?php echo base_url();?>assets/images/inner2.png"><span class="get_off">  GET 20% OFF.<span class="upto">  (Upto TK.50) <br>
                                    <span class=" PayUMoney" >100% Secure Payments through Paytm</span>
                            </span>
                            <br>
                            </span>
                        </div>
                        <br>
                    </div>
                    <div class="amount_pay3">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>

        <form method="post" action="<?php echo base_url();?>payment/paytmpost" style="display:none;" id="paytmm">
            <table border="1">
                <tbody>
                    <tr>
                        <th>S.No</th>
                        <th>Label</th>
                        <th>Value</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <label>ORDER_ID::*</label>
                        </td>
                        <td>
                            <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" class="item_name item_names">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <label>CUSTID ::*</label>
                        </td>
                        <td>
                            <input class="item_name" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <label>INDUSTRY_TYPE_ID ::*</label>
                        </td>
                        <td>
                            <input class="item_name" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <label>Channel ::*</label>
                        </td>
                        <td>
                            <input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                            <label>txnAmount*</label>
                        </td>
                        <td>
                            <input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="{{totals}}">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input value="CheckOut" type="submit">
                        </td>
                    </tr>
                </tbody>
            </table>
            * - Mandatory Fields
        </form>
        <div class="book_now">
            <button class="tb_nowbook">Book now >></button>
        </div>

        <br>

    </div>
    <div class="tab-content " id="tab-6">
        <div class="rupee_lft">&nbsp;</div>
        <div class="tb_route_inner_txt low ">
            <div class="tb_route_inner">
                <div class="amount_pay">
                    <div class="card_type">
                        select card type: &nbsp;
                        <input type="radio"> <img src="<?php echo base_url();?>assets/images/visaa.png">
                    </div>
                    <input type="radio"> <img src="<?php echo base_url();?>assets/images/amercan.png">
                    <br>
                    <div class="nm_cd_typ"> Name on the card </div>
                    <input class="card_nm" type="text" placeholder="Name">
                    <br>
                    <br>
                    <div class="nm_cd_typ"> Card no. </div>
                    <input class="card_num" type="text">

                    <input class="card_num" type="text">
                    <input class="card_num" type="text">
                    <input class="card_num" type="text">
                    <br>
                    <br>
                    <div class="nm_cd_typ"> Expiry Date </div>
                    <select class="year_month">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                    </select>


                    <select class="year_month_lft">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                    </select>
                    <br>
                    <br>
                    <div class="nm_cd_typ">CVV </div>
                    <input class="card_nm" type="text" placeholder="XXX">
                    <br>
                    <br>
                    <div class="nm_cd_typ"> &nbsp; </div>
                    <input type="checkbox"> save your card

                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="book_now">
            <button class="tb_nowbook">Book now >></button>
        </div>


        <br>
    </div>


    <div class="tab-content " id="tab-7">
        <div class="rupee_lft">&nbsp;</div>
        <div class="tb_route_inner_txt low ">
            <div class="tb_route_inner">
                <div class="amount_pay">

                    <div class="nm_cd_typ">Select your Bank</div>
                    <select class="year_months_lft">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                    </select>
                    <br>

                    <ul class="nbselector">
                        <li class="icon-logosbi nb active" id="SBI_N"></li>
                        <li class="icon-logoaxis nb" id="UTI_N"></li>
                        <li class="icon-logoicici nb" id="ICPRF_N"></li>
                        <li class="icon-logohdfc nb" id="HDEB_N"></li>
                        <li class="icon-logociti nb" id="CBIBAN_N"></li>
                        <li class="icon-logoib nb" id="INB"></li>
                    </ul>
                    <br>



                </div>
            </div>
        </div>
        <br>

        <form method="post" action="https://world.ccavenue.com/servlet/ccw.CCAvenueController">
            <input type="hidden" name="Merchant_Id" value="
M_demos_17
">
            <input type="hidden" name="Amount" value="
1000
">
            <input type="hidden" name="Currency" value="USD">
            <input type="hidden" name="Order_Id" value="
ORD_ID1234
">
            <input type="hidden" name="TxnType" value="A">
            <input type="hidden" name="actionID" value="TXN">
            <input type="hidden" name="billing_cust_name" value="
John
">
            <input type="hidden" name="billing_middle_name" value="
Edgar
">
            <input type="hidden" name="billing_last_name" value="
Doe
">
            <input type="hidden" name="billing_cust_address" value="
123  Green  Acres,  
West Eden
">
            <input type="hidden" name="billing_cust_city" value="
Estberry
">
            <input type="hidden" name="billing_cust_state" value="
Wales
">
            <input type="hidden" name="billing_cust_zip" value="
12345
">
            <input type="hidden" name="billing_cust_country" value="
UK
">
            <input type="hidden" name="billing_cust_tel_Ctry" value="
41
">
            <input type="hidden" name="billing_cust_tel_Area" value="
345
">
            <input type="hidden" name="billing_cust_tel_No" value="
345678
">
            <input type="hidden" name="billing_cust_email" value="
johndoe@hotmail.com
">
            <input type="hidden" name="billing_cust_notes" value="
Send right away!
">
            <input type="hidden" name="delivery_cust_name" value="
John
">
            <input type="hidden" name="delivery_middle_name" value="
Edgar
">
            <input type="hidden" name="delivery_last_name" value="
Doe
">
            <input type="hidden" name="
delivery_cust_address" value="
123  Green  Acres,  
West Eden
 ">
            <input type="hidden" name="delivery_cust_city" value="
Estberry
">
            <input type="hidden" name=" delivery_cust_state" value="
Wales
">
            <input type="hidden" name=" delivery_cust_zip" value="
12345
">
            <input type="hidden" name="
 delivery_cust_country" value="
UK
">
            <input type="hidden" name="delivery_cust_tel_Ctry" value="
41
">
            <input type="hidden" name="delivery_cust_tel_Area" value="
345
">
            <input type="hidden" name="delivery_cust_tel_No" value="
345678
">
            <input type="submit" value="
 Buy Now
"> </form>
        <br>





        <form action="<?php echo base_url();?>payment/checkout/234" method="POST">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_XztRdK0Lc8WHu7gOc7ycunBU" data-image="your site image" data-name="w3code.in" data-description="Demo Transaction ($100.00)" data-amount="23000 " />
            </script>
        </form>





        <div class="book_now">
            <button class="tb_nowbook">Book now >></button>
        </div>

        <br>

    </div>

    <div class="rupee_lft">&nbsp;</div>





    <div id="tab-5" class="tab-content current"></div>
    <input type="hidden" id="pament_option" value="paypal">
</div>
</div>
</div>
</div>
</div>
<div class="loader" style="text-align:center"></div>
<button type="button" id="myModalpp" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalp" style="display:none;">Open Modal</button>
<div id="myModalp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body bookfloat">
                <div class="booking_inf">
                    <div class="col-md-10">

                        <p>Your booking is already exist </p>

                        <div class="book_now">
                            <a href="<?php echo base_url();?>">
                                <button class="tb_nowbook">Book Again</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"><img class="informt" src="<?php echo base_url();?>assets/images/infor2.png">
                </div>
            </div>

        </div>

    </div>
</div>
<!-- promo code Management script created by Anju MS on 08-12-2016-->

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#promo_check").click(function(e) {
            // var $d = $('#code').val();
            // alert($d);
            e.preventDefault();
            $.ajax({
                type: "POST",

                // url: "check_promo",
                url: "<?php echo base_url();?>Payment/check_promo",
                data: {
                    id: $("#code").val()
                },
                success: function(result) {
                    /*  console.log(result);*/
                    if (result <= 0) {
                        $("#code").val('');
                    }
                    if (result > 0) {
                        var off = result;

                        var amt = $('#amount').val();


                        var actual = parseInt(amt) - parseInt(off);

                        $('#amount').val(actual);
                        $('.tb_pay1').html('TK.' + actual);
                        $("#promo_status").html('You have got TK.' + off + ' OFF');
                    } else {
                        $("#promo_status").html('Invalid promo code');
                    }
                }
            });
        });
    });
</script>