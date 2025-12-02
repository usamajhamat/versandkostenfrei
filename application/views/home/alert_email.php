
<?php
    $system_name = $this->db->get_where('system_settings',array('type' => 'system_name'))->row()->description;
    $system_email = $this->db->get_where('system_settings',array('type' => 'customer_support_email'))->row()->description;
    $system_image = $this->db->get_where('system_settings',array('type' => 'system_image'))->row()->description;
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
                           <td align="left" valign="top" class="m_-6251244752406257844headline" style="background-color:#d80001;color:#ffffff;padding-left:20px;padding-top:10px;padding-bottom:10px;font-family:Helvetica,Verdana,Arial,sans-serif;font-size:18px;font-weight:500">Gutschein-Wecker aktivieren</td>
                        </tr>
                        <tr>
                           <td align="left" valign="top" class="m_-6251244752406257844content" style="background-color:#ebebeb;color:#333333;padding-left:20px;padding-top:20px;padding-bottom:5px;padding-right:20px;font-family:Verdana,Arial,sans-serif;font-size:16px;line-height:140%">
                           Bei <a href="<?php echo base_url();?>"><?php echo $system_name; ?></a>, <?php echo $system_name; ?> erhalten Sie aufgrund Ihres Interesses an den Aktionen und Gutscheinen unseres Anbieters <?php echo $brand_name;?>, diese Gutschein-Wecker-Aktivierungs-E-Mail. Um E-Mails für kommende <?php echo $brand_name;?> Gutscheine zu erhalten, klicken Sie bitte hier, um den Gutschein-Wecker zu aktivieren: 
                              <table border="0" cellpadding="0" cellspacing="0"  class="m_-6251244752406257844btnActivate" style="border-collapse:collapse;background-color:#5c8374;border-collapse:separate;border-radius:4px;border:2px #5c8374 solid;margin: 11px 0px;">
                                 <tbody>
                                    <tr>
                                       <td align="center" valign="middle" class="m_-6251244752406257844btnActivateContent" style="color:#ffffff;font-family:Helvetica,Verdana,Arial,sans-serif;font-size:18px;font-weight:500;line-height:100%;text-align:center"> <a href="<?php echo base_url()."home/activate_alert/".$base_64_code;?>" style="color:#ffffff;display:block;text-decoration:none;padding-left:20px;padding-top:10px;padding-bottom:10px;padding-right:20px" target="_blank">Jetzt Gutschein-Wecker aktivieren</a></td>
                                    </tr>
                                 </tbody>
                              </table>
                              Um bei  <a href="<?php echo base_url();?>"><?php echo $system_name; ?></a>, den Gutscheinwecker zu aktivieren, haben Sie vor wenigen Minuten die E-Mail-Adresse  <a href="mailto:<?php echo $email; ?>"><?php echo $email;?></a> eingegeben.Klicken Sie in dieser E-Mail unbedingt auf den verfügbaren Aktivierungslink, sonst wird der Gutscheinwecker nicht aktiviert. Ihr Gutschein Alarm Team vom Sparportal.</span> 
                           </td>
                        </tr>
						<tr>
						</tr>
                        <tr>
                           <td align="left" valign="top" class="m_-6251244752406257844footer" style="background-color:#c2c0bc;color:#0d0b0b;padding-top:15px;padding-right:20px;padding-bottom:20px;padding-left:20px;font-family:Verdana,Arial,sans-serif;font-size:12px;line-height: 1.7;border-top: 1px solid #5c8374;text-align:center"> <b>Impressum:</b>
						   <br>
						   Copyright &#169; <?php echo date('Y')?> <a href="<?php echo base_url();?>" target="_blank"><?php echo $system_name; ?></a><br>E-Mail: <a href="mailto:<?php echo $system_email; ?>"><?php echo $system_email; ?></a> <br><a href="<?php echo base_url()."home?unsub_alert=".$subscribr_id."&brands_id=".$brands_id;?>" target="_blank" >Abmelden</a> <u></u><u></u> </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
   </center>
</div>