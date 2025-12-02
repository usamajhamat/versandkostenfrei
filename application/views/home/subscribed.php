<link href="<?php echo base_url(); ?>assets/home/css/newsletters.css" rel="stylesheet" media="screen">
<style>
.controls.controls-row label {
    font-size: 0.70rem;
    line-height: 1.2rem;
}
.cs-text {
    padding: 19px 20px;
    background: #FFF;
}
</style>
<!-- Content Main -->
<main id="cs-main" class="cs-main-default">
	<!--Breadcrumps --> 
	<div class="container">
		<div class="cs-main-content" style="padding-top:10px;">
			<section class="cs-content-block cs-profil-all cs-text">
				<div class="row cs-optin-done">
					<div id="js-nl-subscribed-msg" class="cs-content-h1 cs-optin-h cs-form-success  cs-flex" >
						<!--<i class="fa fa-check-square-o cs-profil-hint-icon" aria-hidden="true"></i>-->
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;"> Vielen Dank! </font>
						</font><br>
						<span class="cs-optin-h-2">
							<font style="vertical-align: inherit;">
							Ihre kostenlose Anmeldung zum <?php echo $system_name ?>-Newsletter ist erfolgreich.
							</font>
							<span class="cs-c4u-style">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;"> </font>
								</font>
								<span class="cs-c4u-c4u-style">
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;"></font>
									</font>
								</span>
							</span>
							<font style="vertical-align: inherit;">
								
							</font>
						</span>
					</div>
				</div>
				<?php if(!empty($subs_details)){?>
				<div >
				    <div id="form">
					<form id="subscription_form" class="cs-form-profil" method="post" accept-charset="utf-8">
						<input name="subs_id" value="<?php if(!empty($subs_details)) echo $subs_details['newsletter_subscription_id'] ?>" type="hidden">
						<input id="subs_email" name="email" value="<?php if(!empty($subs_details)) echo $subs_details['email'] ?>" type="hidden">
						<h2 class="cs-content-h2">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Passen Sie Ihre Newsletter-Profildaten an </font>
							</font>
						</h2>
						<p>
							<font style="vertical-align: inherit;">
							Hier können Sie Ihre Newsletter-Profildaten jederzeit für personalisiertere E-Mails anpassen.
							</font>
						</p>
						<div class="controls controls-row">
							<!-- Salutation, First name, Last Name -->
							<div class="cs-profil-row cs-flex">
								<div class="cs-profil-block">
									<h2><font style="vertical-align: inherit;     color: #5c8374;"><font style="vertical-align: inherit;color: black;">Individuelle Daten    </font></font></h2>
								  <div class="row">
									 <div class="col-sm-12 col-xs-12 cs-form-block cs-form-include-labels">
										<!-- Salutation -->
										<div class="cs-form-salutation cs-form-input-container col-sm-12 col-xs-12 formfield" style="width: 21%;margin-right: 1%;">
										   <label class="cs-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Anrede</font></font></label>
										   <select id="nlpref-salutation" name="gender" size="1" class="cs-select">
											  <option value="" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Anrede</font></font></option>
											  <option value="Mr" <?php if(!empty($subs_details) && $subs_details['gender'] == 'Mr') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mr</font></font></option>
											  <option value="Mrs" <?php if(!empty($subs_details) && $subs_details['gender'] == 'Mrs') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mrs</font></font></option>
										   </select>
										</div>
										<!-- First name -->
										<div class="cs-form-name cs-form-input-container col-sm-12 col-xs-12  formfield" style="width: 25%;">
										   <label class="cs-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ihr Vorname</font></font></label>
										   <input id="nlpref-first-name" name="first_name" type="text" value="<?php if(!empty($subs_details)) echo $subs_details['first_name'] ?>" placeholder="Vorname" class="cs-input">
										</div>
										<!-- Last Name -->
										<div class="cs-form-lname cs-form-input-container col-sm-12 col-xs-12 formfield" style="width: 25%;">
										   <label class="cs-form-label">
										   	<font style="vertical-align: inherit;">
										   	<font style="vertical-align: inherit;">Dein  &nbsp; Familienname</font>
										   </font>
										</label>
										   <input id="nlpref-last-name" name="last_name" type="text" value="<?php if(!empty($subs_details)) echo $subs_details['last_name'] ?>" placeholder="Nachname" class="cs-input">
										</div> 
										<div class="cs-form-lname cs-form-input-container col-sm-12 col-xs-12 formfield" style="width: 25%;margin-left: 10px;">
										   <label class="cs-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Postleitzahl</font></font></label>
										   <input id="nlpref-zip" name="post_code" type="text" value="<?php if(!empty($subs_details)) echo $subs_details['address'] ?>" placeholder="Postal code" class="cs-input">
										</div>
									 </div>
									
								  </div>
							   </div>
							   <!-- <div class="row">
										
										<div class="cs-form-zip cs-form-input-container col-xs-12">
										   <label class="cs-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Post Code</font></font></label>
										   <input id="nlpref-zip" name="post_code" type="text" value="<?php if(!empty($subs_details)) echo $subs_details['address'] ?>" placeholder="Postcode" class="cs-input">
										</div>
								
										<div class="cs-form-town cs-form-input-container col-xs-12">
										   <label class="cs-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">City</font></font></label>
										   <input id="nlpref-town" name="city" type="text" value="<?php if(!empty($subs_details)) echo $subs_details['address'] ?>" placeholder="City" class="cs-input">
										</div>
									 </div>-->
							</div>
						 </div>
				
						 
						 <!-- Date of birth -->
						 <div class="cs-profil-row cs-flex">
							
							<div class="cs-profil-block">
								<h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;    color: black;">Geburtsdatum</font></font></h2>
								<div class="row">
									<div class="col-sm-12 cs-form-block cs-form-include-labels">
										 <!-- Tag -->
										<div class="cs-form-day cs-form-input-container col-xs-12">
											<label class="cs-form-label">
												<font style="vertical-align: inherit;">
													<font style="vertical-align: inherit;">Tag</font>
												</font>
											</label>
											<select id="nlpref-birthday-day" name="birth_date" size="1" class="cs-select">
												<option value="" selected="">
													<font style="vertical-align: inherit;">
														<font style="vertical-align: inherit;">Tag</font>
													</font>
												</option>
											   <?php for($i=1; $i<=31; $i++){ ?>
													<option value="<?php echo $i; ?>" <?php if(!empty($subs_details) && $subs_details['birth_date'] == $i) echo 'selected' ?> >
														<font style="vertical-align: inherit;">
															<font style="vertical-align: inherit;"><?php echo $i; ?></font>
														</font>
													</option>
											   <?php } ?>
											</select>
										</div>
										<!-- month -->
										<div class="cs-form-month cs-form-input-container col-xs-12">
											<label class="cs-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Monat</font></font></label>
											<select id="nlpref-birthday-month" name="birth_month" size="1" class="cs-select">
												<option value="" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Monat</font></font></option>
												<option value="1" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '1') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">January</font></font></option>
												<option value="2" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '2') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">February</font></font></option>
												<option value="3" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '3') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">March</font></font></option>
												<option value="4" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '4') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">April</font></font></option>
												<option value="5" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '5') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">May</font></font></option>
												<option value="6" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '6') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">June</font></font></option>
												<option value="7" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '7') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">July</font></font></option>
												<option value="8" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '8') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">August</font></font></option>
												<option value="9" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '9') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">September</font></font></option>
												<option value="10" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '10') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">October</font></font></option>
												<option value="11" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '11') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">November</font></font></option>
												<option value="12" <?php if(!empty($subs_details) && $subs_details['birth_month'] == '12') echo 'selected' ?> ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">December</font></font></option>
											</select>
										</div>
										<!-- year -->
										<div class="cs-form-year cs-form-input-container col-xs-12">
											<label class="cs-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Jahr</font></font></label>
											<select id="nlpref-birthday-year" name="birth_year" size="1" class="cs-select">
												<option value="" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Jahr</font></font></option>
												<?php 
												$year_val = date('Y') - 18;
												for($j=63; $j>=1; $j--){ 
													if($j<63){
														$year_val = $year_val - 1;
													}
												?>
													<option value="<?php echo $year_val ?>" <?php if(!empty($subs_details) && $subs_details['birth_year'] == $year_val) echo 'selected' ?> >
														<font style="vertical-align: inherit;">
															<font style="vertical-align: inherit;"><?php echo $year_val ?></font>
														</font>
													</option>
											   <?php } ?>
											</select>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						 <!-- Profiling -->
						 <!--<div class="cs-profil-row cs-flex">
							<div class="cs-profil-icon cs-profil-icon-bullseye">
								<i class="fa fa-bullseye"></i>
							</div>
							<div class="cs-profil-block">
								<h2>
									<font style="vertical-align: inherit;">
										<font style="vertical-align: inherit;">4. Interest-based content</font>
									</font>
								</h2>
								<div class="row">
									<div class="col-sm-7 cs-form-block">
										<label class="cs-form-checkbox-label">
											<input id="nlpref-profiling" type="checkbox" name="promotions" value="1" <?php if(!empty($subs_details) && $subs_details['agreed_to_promotions'] == 'Yes') echo 'checked' ?> >
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;">Yes, I would like to receive an individual newsletter tailored to my interests. </font>
												<font style="vertical-align: inherit;">For this I allow <?php echo $system_name ?> to analyze my email opening and clicking behavior and to create a personal usage profile. </font>
												<font style="vertical-align: inherit;">I can </font>
												<font style="vertical-align: inherit;">revoke </font>
												<font style="vertical-align: inherit;">this consent at any time in accordance with the </font>
											</font>
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;"> declaration.</font>
											</font>
										</label>
									</div>
									<div class="col-sm-5">
										<div class="cs-profil-hint cs-profil-hint-last cs-flex">
											<span class="cs-profil-hint-arrow"></span>
											<i class="cs-profil-hint-icon fa fa-check-square-o" aria-hidden="true"></i>
											<p>
												<font style="vertical-align: inherit;">
													<font style="vertical-align: inherit;">Agree here to find more interesting content in your newsletter. </font>
													<font style="vertical-align: inherit;">This will give you coupons, promotions and free samples that better match your interests.</font>
												</font>
											</p>
										 </div>
									</div>
								</div>
							</div> 
						</div>-->
						<h2 class="cs-content-h2">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Newsletter-Interessen ändern</font>
							</font>
						</h2>
						<p>
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Hier können Sie Interessen und Themen definieren, um einen individuellen, auf Ihre Interessen zugeschnittenen Newsletter zu erhalten.Mit diesen Kategorieeinstellungen finden Sie Rabatte und Gutscheincodes für diese Geschäfte sowie Rabattcodes für andere:</font>
							</font>
						</p>
						<?php
						 $intrest =  $this->db->get_where('subscribers_intrest',array('newsletter_subscription_id'=>$enc_subs_id))->result_array();
						 $cates_ids = array();
						 foreach($intrest as $intrst){
							array_push($cates_ids, $intrst['categories_id']);  
						 }
					   						 
						?>
						<div class="cs-form-interests row">
							<?php
							    $checked = "";
                                $this->db->limit('23');                
								$get_categories = $this->db->get_where('categories', array('status'=>'Active'))->result_array();
								foreach($get_categories as $key => $fetch_data){  
									$cat_id = $fetch_data['categories_id'];
									$cat_name = $fetch_data['name'];
									$cat_icon = $fetch_data['font_icon'];
                                    $this->db->group_by('brands_id');
                                    $cat_data = $this->db->get_where('newsletter_interests',array('categories_id	'=>$cat_id))->result_array();
									// echo "<pre>"; print_r($cat_data); echo "</pre>";
									if(in_array($cat_id, $cates_ids)){
										$checked = 'checked';									
									}else{
										$checked = '';
									}
                                    $sub_array = array();
                                    $this->db->limit('5');
                                    $sub_cat_data = $this->db->get_where('sub_categories',array('categories_id'=>$cat_id))->result_array();
                                    
                                    foreach($sub_cat_data as $sub_cat){
                                        
                                        array_push($sub_array, $sub_cat['name']);
                                        
                                    }
                                     $sub_cat_string = implode(',',$sub_array);
                                    
                                 if($key<5){
							?>      
                                 <div class="cs-form-interests row" style=" grid-gap: 32px; padding:10px 0px;">
									<div class="col-md-6 col-sm-6 " style="border-bottom: 1px solid grey">
										<label class="cs-form-checkbox-label js-label-interest">
										  <img style="" class="cate_image" src="<?php echo base_url()."/uploads/categories/cate_icon".$cat_icon; ?>">
								          <input class="cs-form-checkbox-label" <?php echo $checked;?> type="checkbox" name="cat_id[<?php echo $cat_id; ?>]" value="<?php echo $cat_name; ?>">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;"> <?php echo $cat_name; ?></font>
											</font>
										</label>
										
                                        
                                        <p class="b_sub_heading" ><?php echo $sub_cat_string; ?></p>
										
									</div>
									<div class="col-md-6 col-sm-6" style="">
									<div class="row" style="display: flex;grid-gap: 18px;margin-left: 10px;">
									 <?php 
                                   
                                       foreach($cat_data as $cat){
                                           $brand_id = $cat['brands_id'];
                                        
                                           $brand_image = $this->db->get_where('brands',array('brands_id'=>$brand_id))->row()->brand_image;
                                           
                                        ?>
                                        <div class="col-md-2 col-sm-1" style="display: grid; height: 41px;">
										  <img class="imgsize" src="<?php echo base_url().'uploads/brands/'.$brand_image; ?>" >
                                        </div>
                                        <?php   
                                       } 
                                    ?>
									 
			
								  </div>
								</div>
                            </div>
							<?php
                                  }
                                 } 
                            ?>
                            
                            <div id="rem_cat" >
                                <?php
							    $checked = "";
                                $this->db->limit('23');                
								$get_categories = $this->db->get_where('categories', array('status'=>'Active'))->result_array();
								foreach($get_categories as $key => $fetch_data){  
									$cat_id = $fetch_data['categories_id'];
									$cat_name = $fetch_data['name'];
									$cat_icon = $fetch_data['font_icon'];
                                    $this->db->group_by('brands_id');
									$cat_data = $this->db->get_where('newsletter_interests',array('categories_id	'=>$cat_id))->result_array();
                                      /* echo $this->db->last_query();*/
                                           
									if(in_array($cat_id, $cates_ids)){
										$checked = 'checked';									
									}
                                    $sub_array = array();
                                    $this->db->limit('5');
                                    $sub_cat_data = $this->db->get_where('sub_categories',array('categories_id'=>$cat_id))->result_array();
//                                    print_r($sub_cat_data);
                                    
                                    foreach($sub_cat_data as $sub_cat){
                                        
                                        array_push($sub_array, $sub_cat['name']);
                                        
                                    }
                                     $sub_cat_string = implode(',',$sub_array);
                                    
                                 if($key>4){
							?>      
                                 <div class="cs-form-interests row" style=" grid-gap: 32px; padding:10px 0px;">
									<div class="col-md-6 col-sm-12 col-xs-12 " style="border-bottom: 1px solid grey">
										<label class="cs-form-checkbox-label js-label-interest">
										  <img style="" class="cate_image" src="<?php echo base_url()."/uploads/categories/cate_icon".$cat_icon; ?>">
								          <input class="cs-form-checkbox-label" <?php echo $checked;?> type="checkbox" name="cat_id[<?php echo $cat_id; ?>]" value="<?php echo $cat_name; ?>">
											<font style="vertical-align: inherit;">
												<font style="vertical-align: inherit;"> <?php echo $cat_name; ?></font>
											</font>
										</label>
										
                                    
                                        <p class="b_sub_heading" style="color:grey;"><?php echo $sub_cat_string; ?></p>
										
									</div>
									<div class="col-md-6 col-sm-12  col-xs-12" style="">
									<div class="row" style="display: flex;grid-gap: 18px;margin-left: 10px;">
									 <?php 
                                //    echo "<pre>"; print_r($cat_data); echo "</pre>";
                                       foreach($cat_data as $cat){
                                           $brand_id = $cat['brands_id'];
                                           echo $brand_id;
                                           $brand_image = $this->db->get_where('brands',array('brands_id'=>$brand_id))->row()->brand_image;
                                           
                                        ?>
                                        <div class="col-md-2 col-sm-2 ">
										  <img class="imgsize" src="<?php echo base_url().'uploads/brands/'.$brand_image; ?>">
                                        </div>
                                        <?php   
                                       } 
                                    ?>
									
								  </div>
								</div>
                            </div>
							<?php
                                  }
                                 } 
                            ?>
                            </div>
						  <!--  <div class="cs-profil-btn-container row">
							   <button id="show_more" type="button" class="cs-profil-btn btn cs-flat-btn-grey col-xs-12" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Show more</font></font></button>
							   
							   <button id="show_less" style="display:none" type="button" class="cs-profil-btn btn cs-flat-btn-grey col-xs-12" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Show Fewer</font></font></button>
							</div> -->
						 <!-- Submit -->
						 <div class="row cs-profil-btn-container">
							<div class="cs-profil-btn-container row">
							   <button id="save_btn" type="button" class="cs-profil-btn btn cs-flat-btn-grey col-xs-12" onclick="submit_settings();"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Newsletter-Einstellungen speichern</font></font></button>
							</div>
							<div class="cs-profil-btn-container row">
								<div id="nlpref-save-loader" class="cs-form-loader">
									<img class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://www.coupons.de/images/loader-snake-bg-white-16.gif" style="margin:0;">
								</div>
								<div id="nlpref-save-success" class="cs-form-success"> 
									<i class="fa fa-check-square-o" aria-hidden="true" style="margin-right: 4px;"></i> 
									Your newsletter settings have been saved successfully.
								</div>
								<div id="nlpref-save-error" class="cs-form-error">When saving an error has occurred. Try again later.</div>
							</div>
						 </div>
					</form>
					</div>
				</div>
				<div id="save-result" style="display:none">
					<div class="row">
						<div style="text-align: center;">
							<div class="cs-form-success cs-profil-table-success">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								YoIhre Newsletter-Einstellungen wurden gespeichert!
							</div>
						</div>
						<table class="cs-profil-table">
							<tbody>
								<tr>
									<td class="cs-profil-table-spec"><strong>Geschlecht:</strong></td>
									<td class="cs-profil-table-data"><span id="result_gender"></span></td>
								</tr>
								<tr>
									<td class="cs-profil-table-spec"><strong>Vorname:</strong></td>
									<td class="cs-profil-table-data"><span id="result_first_name"></span></td>
								</tr>
								<tr>
									<td class="cs-profil-table-spec"><strong>Nachname:</strong></td>
									<td class="cs-profil-table-data"><span id="result_last_name"></span></td>
								</tr>								
								<tr>
									<td class="cs-profil-table-spec"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Postleitzahl:</font></font></strong></td>
									<td class="cs-profil-table-data"><span id="result_post_code"></span></td>
								</tr>
								<tr>
									<td class="cs-profil-table-spec"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Interessen:</font></font></strong></td>
									<td class="cs-profil-table-data"><span id="result_intrest"></span></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row cs-profil-btn-container" style="padding-top: 10px;">
						<button type="button" class="cs-profil-btn btn cs-flat-btn-grey" onclick="showNLPrefForm();"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Newsletter-Einstellungen ändern</font></font></button>
					</div>
				</div>
				<?php }?>
			</section>
		</div>
	</div>
</main>
