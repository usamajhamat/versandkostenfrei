<?php

$details = $this->db->get_where('voucherr_alert_subscriber', array('voucherr_alert_subscriber_id'=>$param1))->row_array();

/* $image_path = base_url().'image.php?image=uploads/category_images/'.$details['image'].'&height=100px&width=100px&zc=1&ct=0'; */
?>
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-eye"></i> Unsubscribe Reason</h4>
			<div class="card-body">
			
				
					<div class="form-group row">
					<!-- 	<label class="col-sm-4 col-form-label">R</label> -->
						<div class="col-sm-12">
						<?php 
						 echo  $details['un_sub_reason'];					
						?>
						</div>
			
            </div>
        </div>
    </div>
</div>
