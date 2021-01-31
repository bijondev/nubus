 <!--HEADER-BAR-->
         
         <!--HEADER-BAR-END-->
         <!-- Modal -->
   
     
         <!--SEARCH-BAR-->
         <div class="container" ng-controller="rating" ng-init="bookDetails()">
            <div class="row" style="margin-top:120px;">
				<div class="col-md-12" style="padding:29px;padding-top:0px;">
				
				
				
   <div class="MB">
        	<!--Ticket Detail Block Begins-->
          <div class="W100 Padder10 YBBorder XCN OH Small">
          	<div class="LB XXXXBMargin">{{detailsbook.board_point}} → {{detailsbook.drop_point}}, {{detailsbook.booking_date}} </div>
            <div class="LB">,{{detailsbook.bus_name}} , {{detailsbook.bus_type}} 
                 </div>
               
                 <div class="RB ">ticketNo: {{detailsbook.booking_id}}</div>

          </div>
				
            </div>
				<br>
				
			 <div class="TextLeft XXCN">
            <span ng-hide="detailsbook.name ==''">Hey {{detailsbook.name}},</span> 
			<span ng-show="detailsbook.name ==''">Hey {{detailsbook.username}},</span> 
             <p>How was your trip? Share your valuable feedback with us. This would help your friends who are planning to travel by the same service.</p>
            </div>	
				
			  <p class="highst">Rate the bus provided on a scale of 1 to 5 (5 - being the highest)</p>	
				<br>
				
				
			
		    <div class="P20 OH CN">
          
          	<div class="LB RMargin RContainer">
            	<p class="TextCenter TextBold">Bus quality</p>
                <p class="TextCenter XCN ratingText">Please enter your rating</p>
              <div class="XCN OH RC">
              	<ul class="Rating RC OH multiSelect" id="quality">
                  <li class="LRC FBorder WGrad" data-value="1-RATING-5" data-title="Very Bad" data-id ="1">1</li>
<li class="TriBorder WGrad" data-value="1-RATING-4" data-title="Bad"  data-id ="2">2</li>
<li class="TriBorder WGrad" data-value="1-RATING-3" data-title="Average"  data-id ="3">3</li>
<li class="TriBorder WGrad" data-value="1-RATING-2" data-title="Good"  data-id ="4">4</li>
<li class="RRC TriBorder WGrad" data-value="1-RATING-1" data-title="Excellent"  data-id ="5">5</li>
              	</ul>
              </div>
              <div class="CL"></div>
              <p class="TextCenter RatText"></p>
              <p class="TextCenter Red Small errormsg quality">Please rate this bus on bus quality</p>
            </div>
          
            <div class="LB RMargin RContainer">
            	<p class="TextCenter TextBold">Punctuality</p>
                <p class="TextCenter XCN ratingText">Please enter your rating</p>              
              <div class="XCN OH RC">
              	<ul class="Rating RC OH multiSelect" id="punctuality">
                	<li class="LRC FBorder WGrad" data-value="3-RATING-15" title="Very Bad"  data-id ="1">1</li>
<li class="TriBorder WGrad" data-value="3-RATING-14" title="Bad"  data-id ="2">2</li>
<li class="TriBorder WGrad" data-value="3-RATING-13" title="Average"  data-id ="3">3</li>
<li class="TriBorder WGrad" data-value="3-RATING-12" title="Good"  data-id ="4">4</li>
<li class="RRC TriBorder WGrad" data-value="3-RATING-11" title="Excellent"  data-id ="5">5</li>
              	</ul>
              </div>
               <p class="TextCenter RatText"></p>
              <p class="TextCenter Red Small errormsg punctuality">Please rate this bus on punctuality</p>
            </div>
          	
            <div class="LB RContainer">
            	<p class="TextCenter TextBold">Staff behaviour</p>
                <p class="TextCenter XCN ratingText" >Please enter your rating</p>
              <div class="XCN OH RC">
              	<ul class="Rating RC OH multiSelect" id="behaviour">
                <li class="LRC FBorder WGrad" data-value="2-RATING-10" title="Very Bad"  data-id ="1">1</li>
<li class="TriBorder WGrad" data-value="2-RATING-9" title="Bad"  data-id ="2">2</li>
<li class="TriBorder WGrad" data-value="2-RATING-8" title="Average"  data-id ="3">3</li>
<li class="TriBorder WGrad" data-value="2-RATING-7" title="Good"  data-id ="4">4</li>
<li class="RRC TriBorder WGrad" data-value="2-RATING-6" title="Excellent"  data-id ="5">5</li>
              	</ul>
              </div>
			  <p class="TextCenter RatText"></p>
			  <p class="TextCenter Red Small errormsg behaviour" >Please rate this bus on staff behaviour</p>
          </div>
			
				</div>
        
 
          <!--We are Sorry Block Ends-->
                
          <!--Add More Tips Block Begins-->
          <div class="W100 OH Padder20 BBorder XCN">
          	<div class="W50 LB">
            	<p class="CN">Write Your Review</p>
                <p class="CN"><span class="Grey Small">(Please write a review about your journey. An ideal review would include all the positives and negatives concerning your journey. This would help other travellers' as well as the bus operator in improving their service.)</span>
              <p class="W70 Small Grey XCN">
              </p>
            </div><form id="ratings">
            <!--Textarea For Adding More Tip Block Begins-->
         <textarea rows="3" cols="50" name="comments">

</textarea> 
<input type="hidden" name ="quality" id="qualityb">
<input type="hidden" name ="punctuality"  id="punctualityb">
<input type="hidden" name ="behaviour"id="behaviourb">
<input type="hidden" name ="user" value="{{user_id}}">
<input type="hidden" name ="bus_id" value="{{bus_id}}">
            <!--Textarea For Adding More Tip Block Ends-->
          </div>
				
				
			  <div class="W100 TextCenter">
          <input type="submit" name="SubmitBtn" value="Submit" onClick="ratings()"/>
          	
          </div>
		  <div class="rating-res"></div>
		  </form>
				</div>
				
					</div>
	   </div>
	   
	   
	
 <div class="loader" style="text-align:center"></div>












