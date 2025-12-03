<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->



    <title>Confirm Email</title>
</head>

<body>
    <?php
    $system_name = $this->db->get_where('system_settings',array('type' => 'system_name'))->row()->description;
    $customer_support_email = $this->db->get_where('system_settings',array('type' => 'customer_support_email'))->row()->description;
    $system_image = $this->db->get_where('system_settings',array('type' => 'system_image'))->row()->description;
    ?>
    <div class="center" style="text-align: center;">
        <a href="<?php echo base_url().'home/confirmation_mail/'.$subscribr_id?>">if the newsletter not displayed correctly,click here.</a>
        
    </div>
       <div class="img" style="margin: 50px;text-align: center;">
           <a href="{site_url}" ><img src="<?php echo base_url()?>uploads/admin/<?php echo $system_image; ?>" style="width: 340px;"></a>
           </div>
    <div class="center" style="text-align: center;">
        <h5 style="text-align: center;font-weight: bolder; color: #494f50;font-size: 20px;">Thank you for signing up at our saving portal!</h5>
        <p style="color: #494f50">On the confirmation of this email for free newsletter registration, you are ready to secure the best vouchers, promotions and discounts.</p>
        <a href="<?php echo $confirmation;?>"><button type="button"  class="btn btn-size" style="cursor: pointer;width: 570px; height: 60px;color: white;font-weight: 900; font-size: 18px;background-color:#ffaa00;border: 0px;border-radius: 7px;">Anmeldung bestätigen</button></a>
		<div style="display: grid;justify-content: center;"> 
        <span class="size" style="font-size: 13px;margin-right: auto;margin-top: 10px;">Wenn Sie sich nicht für den kostenlosen  <a href="<?php echo base_url();?>"><?php echo $system_name; ?></a> Newsletter registriert haben, ignorieren Sie diese E-Mail.</span>
		<div style="display: grid;">
		 <span class="size" style="font-size: 13px;margin-right: auto; margin-top: 3px;;"> Gutscheinmarken Ihr Gutscheinmarken.de-Team.</span>
		</div>
		</div>
    </div>
	
    <div class="center" style="text-align: center;border: 1px solid lightgray ;background-color: #d7d7d7; width: 50%;margin: 0 auto;line-height: 1.5;">
        <h5 style="margin: 20px;font-size: 20px; color: #494f50">Imprints</h5>
        <p class="f-s" style=" font-size: 12px;">Copyright &#169; <?php echo date('Y');?> <a href="<?php echo base_url();?>"><?php echo $system_name; ?></a> - All rights reserved.  
        <p class="f-s" style="font-size: 12px;">E-Mail : <a href="mailto:<?php echo $customer_support_email; ?>"> <?php echo $customer_support_email; ?> </a></p>
            <br><a href="<?php echo base_url()."home?unsub=".$subscribr_id?>" class="c" style="color:#31322f;">Unsubscibe</a> | <a href="<?php echo base_url()?>datenschutz" class="c" style="color:  #31322f;">data protection</a>
        </p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->




</body>
</html>