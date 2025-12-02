
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>VOUCHERR.DE</title>
   <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        a.button1 {
            display: inline-block;
			padding: 7px 23.9px;
			margin-left: 2px;
			box-sizing: border-box;
			text-decoration: none;
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			text-align: center;
			background-color: #5c8374;
			color: white;
			width: 24%;
        }
        .btn a{
            text-decoration:none;background-color:#5c8374;color:white;padding: 8px 25px;letter-spacing:1px;
        }
        .image_{
			width: 23%;
		}
		.cop_image{
			width: 80%;
		}
        @media screen and (max-width:1029px) {
           
            .btn a{
               padding: 5px 0px;
                letter-spacing:0px;
                font-size: 10px;
            }


        }
    </style>
</head>
<?php 

    $coupon_limit  = $this->db->get_where('system_settings',array('type'=>'coupon_num_email'))->row()->description;
    $ex_coupon_limit  = $this->db->get_where('system_settings',array('type'=>'exclusive_num_coupon_email'))->row()->description;
    $brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
	if(empty($param2)){
		$this->db->limit($coupon_limit);
	}
	
    $this->db->from('subscribers_intrest');
	$this->db->join('coupons as cpn', 'subscribers_intrest.categories_id = cpn.categories_id ', 'inner');
	$this->db->where('subscribers_intrest.newsletter_subscription_id', $subscribr_id);
    $this->db->where_in('cpn.coupons_id',json_decode($coupons_list));
    $this->db->where('cpn.special=', ''); 
	$all_simple_cpn = $this->db->get()->result_array();

   /*  echo $this->db->last_query(); */
    /* echo "<pre>";
    print_r($all_simple_cpn); 
    echo "</pre>"; exit; */



 	if(empty($param2)){
		$this->db->limit($ex_coupon_limit);
	} 
	 $this->db->from('subscribers_intrest');
	$this->db->join('coupons as cpn', 'subscribers_intrest.categories_id = cpn.categories_id ', 'inner');
	$this->db->where('subscribers_intrest.newsletter_subscription_id', $subscribr_id);
	$this->db->where('cpn.special!=', '');
    $this->db->where_in('cpn.coupons_id',json_decode($coupons_list));
	$ex_simple_cpn = $this->db->get()->result_array(); 
	
	
	$slider_images  = $this->db->get_where('slider_images',array('for_email'=>'yes'))->result_array();
	$slider_url     = $this->db->get_where('system_settings',array('type'=>'brand_slider_imgs_url'))->row()->description;
	
	$slider_img_1       = $slider_images[0]['image_name'];
	$slider_web_url_1   = $slider_images[0]['website_url'];
	
	$slider_img_2       = $slider_images[1]['image_name'];
	$slider_web_url_2   = $slider_images[1]['website_url'];
 /*    echo $coupons_list; */
?>
<body style="background-color:  #e6e8e9;">

    <table style="<?php if(empty($param2)){ echo "width:63%"; } else{ echo "width:50%"; } ?>   ;margin: 0 auto;background-color: white; padding: 10px;">
        <tr>
            <!--<td style="display: flex;justify-content: space-between;padding: 10px 0px;position: relative;">
                <div>
				  <img src="https://dev.eigix.com/voucherr/uploads/admin/email/lo.jpg" width="50%;">
				</div>
                <div style="position: absolute;right: 0px;top: 0px;font-size: 13px;">
				  <a href="<?php echo base_url().'home/voucherr_mail/'.$subscribr_id."/news";?>" style="color:#3c5154;">Zur Online-Version</a>
				</div>
            </td>-->
			<td style="padding: 10px 0px;">
			    <div style="font-size: 13px;    width: 100%;">
				  <a href="<?php echo base_url()."home/voucherr_mail/".$subscribr_id."/news?key=".urlencode($coupons_list);?>" style="color:#3c5154;float: right;">Zur Online-Version</a>
				</div>
                <div style="width:100%">
				  <img src="<?php echo base_url()."/uploads/admin/1619694807_system_image.jpg"; ?>" width="34%;">
				</div>
                
            </td>

        </tr>
        <tr>
            <td style="font-size: 11px;">
                <a href="<?php echo base_url()."home/coupons/popular";?>" class="button1">Weitere Beliebte Gutscheine</a>
                <a href="<?php echo base_url().'home/coupons/latest/';?>" class="button1">Aktuelle gutscheine</a>
                <a href="<?php echo base_url().'home/coupons/trending';?>" class="button1">Trendige gutscheine</a>
                <a href="<?php echo base_url()."home/categories"?>" class="button1">Kategorien</a>
            </td>
        </tr>

        <tr>
            <td>
                <a href="<?php echo $slider_web_url_1; ?>" target="_blank"><img src="<?php echo base_url().$slider_url.$slider_img_1;?>" width="100%;" height="100%;"></a>
            </td>
        </tr>
        <?php
			foreach($ex_simple_cpn as $cpn){
				
				$brands_data = $this->db->get_where('brands',array('brands_id'=>$cpn['brands_id']))->row();
				$brand_name  = $brands_data->name;
				$brand_image  = $brands_data->brand_image;

                $brand_name_new = '';
                $brand_name_array = explode(" ",$brand_name);
                if(count($brand_name_array) > 0){
                    $brand_name_new = str_replace(' ', '-', $brand_name);
                }
			?>
        <tr>
            <td style="width: 100%;border-top: 1px dotted gray; border-bottom: 1px dotted gray;">
                <table style="width: 100%;">

                    <tr>
                        <td class="image_" style="text-align: center;">
						    <?php echo $brand_name;?>
							<a href="<?php echo base_url().'marken/'.$brand_name_new.'?show_brand='.base64_encode($cpn['coupons_id']).'';?>" target="_blank"> 
                             <img  class="cop_image" src="<?php echo base_url().$brand_img_url.$brand_image;?>">
							</a>
                        </td>
                        <td style="border-left: 1px solid gray;">

                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <!--<h2 style="color: gray;padding-left: 40px;font-size: 13px;">
										<?php echo $brand_name;?>
										</h2> -->
                                    </td>
                                    <td>
                                        <div style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0 99%, 10% 48%);min-height: 22px;min-width: 140px;background: #5c8374;color: white;font-weight: 600;padding-left: 20px;font-size: 12px;letter-spacing: 1px;padding-top: 5px;">
                                            <p style="text-align: center;"><?php echo $cpn['special_text']; ?></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="font-size:12px;padding-left: 40px;color: #3c5154;font-family: Verdana,sans-serif;"><?php echo $cpn['short_tagline'];?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="btn" style="padding-left: 38px;padding-top: 10px;">
                                        <a href="<?php echo base_url().'marken/'.$brand_name_new.'?show_brand='.base64_encode($cpn['coupons_id']).'';?>" target="_blank">To the voucher <i class="fa fa-angle-right"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 38px;padding-top: 10px;">
                                        <p style="color: gray;font-size: 12;">Expires : <?php echo date('m/d/Y',strtotime($cpn['end_date']));?></p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
					
                </table>
				
				

            </td>
			
        </tr>
		
			<?php 
		
			} 
            ?>
	
        <tr>
            <td>
                   <a href="<?php echo $slider_web_url_2; ?>" target="_blank"><img src="<?php echo base_url().$slider_url.$slider_img_2;?>" width="100%;" height="100%;"></a> 
            </td>
        </tr>
        <?php
			foreach($all_simple_cpn as $cpn){
				
				$brands_data = $this->db->get_where('brands',array('brands_id'=>$cpn['brands_id']))->row();
				$brand_name  = $brands_data->name;
				$brand_image  = $brands_data->brand_image; 
                $brand_name_new = '';
                $brand_name_array = explode(" ",$brand_name);
                if(count($brand_name_array) > 0){
                    $brand_name_new = str_replace(' ', '-', $brand_name);
                }
			?>
        <tr>
            <td style="width: 100%;border-top: 1px dotted gray; border-bottom: 1px dotted gray;">
                <table style="width: 100%;">

                    <tr>
                        <td class="image_" style="text-align: center;">
						    <?php echo $brand_name;?>
                            <a href="<?php echo base_url().'marken/'.$brand_name_new.'?show_brand='.base64_encode($cpn['coupons_id']).'';?>" target="_blank"> 
							 <img class="cop_image" src="<?php echo base_url().$brand_img_url.$brand_image;?>">
							</a>
                        </td>
                        <td style="border-left: 1px solid gray;">

                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <!--<h2 style="color: gray;padding-left: 40px;font-size: 13px;">
										<?php echo $brand_name;?>
										</h2>-->
                                    </td>
                                    <td>
                                       <!-- <div style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0 99%, 10% 48%);min-height: 22px;min-width: 140px;background: #5c8374;color: white;font-weight: 600;padding-left: 20px;font-size: 12px;letter-spacing: 1px;padding-top: 5px;">
                                            <p style="text-align: center;">Exclusive</p>
                                        </div> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="font-size:12px;padding-left: 40px;color: #3c5154;font-family: Verdana,sans-serif;"><?php echo $cpn['short_tagline'];?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="btn" style="padding-left: 38px;padding-top: 10px;">
                                        <a href="<?php echo base_url().'marken/'.$brand_name_new.'?show_brand='.base64_encode($cpn['coupons_id']).'';?>" target="_blank">To the voucher <i class="fa fa-angle-right"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 38px;padding-top: 10px;">
                                        <p style="color: gray;font-size: 12;">Expires : <?php echo date('m/d/Y',strtotime($cpn['end_date']));?></p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
					
                </table>
				
				

            </td>
			
        </tr>
		
			<?php 
		
			} 
			
		
			$base64_subs  = base64_encode($subscribr_id.'_'.time());
			?>
        <tr style="background-color: lightgray;text-align: center;">
            <td style="padding: 10px;">
                <p >Wenn Sie eine Anpassung Ihrer Profildaten wünschen oder den individuelleren interessenbezogenen Newsletter erhalten möchten <a href="<?php echo base_url().'home/subscribed/'.$base64_subs; ?>" target="_blank">klicken Sie bitte hier</a>.</p>
            </td>
        </tr>
        <tr>
        <td>
           <div style="text-align: center;padding-top: 10px;letter-spacing: 1px;font-size: 16px;">
            <h4 style="font-size: 21px;padding: 15px;">Imprint</h4>
            <div style="padding:2px;line-height: 1.6;">
			  <p>Copyright&#169;<?php echo date('Y')?> <a href="<?php echo base_url();?>">VOUCHERR.DE</a> - Alle Rechte vorbehalten.</p>
              <p>E-Mail:<a href="mailto:voucherr@gmail.com">voucherr@gmail.com</a></p>
              <p>Vollständiges <a href="<?php echo base_url().'home/imprints';?>">Impressum </a> und Informationen zum  <a href="<?php echo base_url();?>home/privacy_policy">Datenschutz</a></p>
              <p>Wenn Sie keine aktuellen Gutscheine mehr erhalten möchten,<a href="<?php echo base_url().'home/?unsub='.$subscribr_id;?>" target="_blank">klicken Sie hier,</a> to um den Newsletter abzubestellen</p>
			</div>
           </div>
        </td>
    </tr>
    </table>
    
</body>

</html>