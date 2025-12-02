
<?php

  $coupons_data = $this->db->get_where('coupons',array('coupons_id'=>$coupon_id))->row();
  $coupns_count = $this->db->get_where('coupons',array('brands_id'=>$coupons_data->brands_id))->num_rows();
  $brands_data  = $this->db->get_where('brands',array('brands_id'=>$coupons_data->brands_id))->row();
  $brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
  $system_email =  $this->db->get_where('system_settings',array('type'=>'email'))->row()->description;

?>	
<div style="height:100%!important;margin:0;padding:0;width:100%!important;background-color:#ffffff;line-height:140%">
   <center>
      <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="m_-6251244752406257844bodyTable" style="height:100%!important;margin:0;padding:0;width:100%!important;border-collapse:collapse;background-color:#ffffff;line-height:140%">
         <tbody>
            <tr>
               <td align="center" valign="top" id="m_-6251244752406257844bodyCell" style="height:100%!important;margin:0;padding:0;width:100%!important;padding-top:20px;padding-bottom:10px">
                  <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_-6251244752406257844emailBody" style="border-collapse:collapse;background-color:#ffffff">
                     <tbody>
					    <tr>
                           <td align="left" valign="top"><img src="<?php echo base_url();?>uploads/vochr_alert.png" alt="Voucher alarm clock" style="border:0;outline:none;text-decoration:none"></td>
                        </tr>
                        <tr>
                           <td align="left" valign="top" class="m_-6251244752406257844headline" style="background-color:#d80001;color:#ffffff;padding-left:20px;padding-top:10px;padding-bottom:10px;font-family:Helvetica,Verdana,Arial,sans-serif;font-size:18px;font-weight:500">Gutschein-Wecker aktivieren </td>
                        </tr>
                        <tr>
                           <td align="left" valign="top" class="m_-6251244752406257844content" style="background-color:#ebebeb;color:#333333;padding-left:20px;padding-top:20px;padding-bottom:5px;padding-right:20px;font-family:Verdana,Arial,sans-serif;font-size:16px;line-height:140%">
                           <div>
						    On gutscheine alarm clock subscription at <a href="<?php echo base_url();?>">VOUCHERR.DE</a> , a new  <?php  echo $brands_data->name;  ?> gutschein from your subscribed provider is here for you 
						   </div>  
						  <div>  
                           <!-- -->
							
							</div>
							
                              <!--At <a href="<?php echo base_url();?>">VOUCHERR.DE</a>, to activate voucher alarm clock, you entered E-mail address  a few minutes ago. Make sure to click on the available activation link  in this email, otherwise the voucher alarm clock will not be activated. Your voucher alarm team from saving portal.</span> -->
                           </td>
                        </tr>
						<tr>
						   <td style="background: #ebebeb;padding: 2px 20px;">
						   <div style="border-top: 1px dashed #28222252;border-bottom: 1px dashed #28222252;margin: 7px 4px;">
						      <div style="display: flex;">
							   <div style="width: 28%;">
								<div style="height: 100%;background: white;">
								   <a href="<?php /* echo base_url().'home/brands/'.$cpn['brands_id'].'?show_brand='.base64_encode($cpn['coupons_id']).''; */ ?>" target="_blank"> 
									<img style="width:100%;height:100%" class="cop_image" src="<?php echo base_url().$brand_img_url.$brands_data->brand_image;  ?>">
								  </a>
							     </div>
							   </div>
							   <div style="width: 80%;background: white;">
							      <div>
								   
								    <h2 style="color: gray;padding-left: 26px;font-size: 13px;">
									 <?php  echo $brands_data->name;  ?> 
									</h2>
								   
								
								    <p style="font-size:12px;padding-left: 26px;color: red;font-family: Verdana,sans-serif;"><?php echo $coupons_data->short_tagline;  ?> </p>
								   
								  </div>
								  <div style="padding: 0px 26px;">
								   <a href="<?php  echo base_url().'home/brands/'.$coupons_data->brands_id."?coupon_id=".$coupons_data->coupons_id; ?>" style="background-color: #5c8374;color: white;padding: 6px 23px;letter-spacing: 1px;font-size: 13px;text-decoration:none"  target="_blank">Anzeigen gutscheine<i class="fa fa-angle-right"></i></a>
								  </div>
								  <div style="padding: 0px 26px;">
								   <span>
								    <p style="color: gray;font-size: 12px;">Expires : <?php  echo date('m/d/Y',strtotime($coupons_data->end_date));  ?></p>
								   </span>
								  </div>
							   </div>
							  </div> 
							 <div style="background: white;padding-left: 8px;">
								<span style="font-size: 13px;"><img src="<?php echo base_url()."assets/home/imgs/info-xxl.png"?>" style="width: 12px;"> Show alle Anderen <a href="<?php echo base_url()."home/brands/".$coupons_data->brands_id;?>" target="_blank"><?php echo $coupns_count." ".$brands_data->name; ?> gutscheine</a> erhältlich im Sparportal.</span>
							  </div>   
						   </div>
						 
						   </td>
						</tr>
                        <tr style="background-color:#c2c0bc;color:#0d0b0b;">
                           <td align="left" valign="top" class="m_-6251244752406257844footer" style="padding-top:15px;padding-right:20px;padding-left:20px;font-family:Verdana,Arial,sans-serif;font-size:12px;line-height: 1.7;text-align:center">Wenn Sie keine aktuellen Gutscheine mehr erhalten möchten, <?php echo $brands_data->name; ?>  <a href="<?php echo base_url()."home?unsub_alert=".$subs_id."&brands_id=".$coupons_data->brands_id;?>" target="_blank">klicken Sie hier,</a> to um den Newsletter abzubestellen <?php echo $brands_data->name; ?>  voucher alert.
						   <br>
						   
						  <p style="float:right">Ihr Gutschein Alarm Team </p>
						   </td>
                        </tr>
						<tr style="background-color:#c2c0bc;color:#0d0b0b;">
                           <td align="left" valign="top" class="m_-6251244752406257844footer" style="padding-top:15px;padding-right:20px;padding-bottom:20px;padding-left:20px;font-family:Verdana,Arial,sans-serif;font-size:12px;line-height: 1.7;border-top: 1px solid #5c8374;text-align:center"> 
						   
						   Copyright&#169;<?php echo date('Y')?> <a href="<?php echo base_url();?>" target="_blank">VOUCHERR.DE</a><br>E-Mail: <a href="mailto:voucherr@gmail.com"><?php echo $system_email; ?></a> <u></u><u></u> </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
   </center>
</div>