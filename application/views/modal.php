    <script type="text/javascript">
	function showAjaxModal(url)
	{
		// SHOWING AJAX PRELOADER IMAGE
		jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>assets/preloader.gif" /></div>');
		
		// LOADING THE AJAX MODAL
		jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
		
		// SHOW AJAX RESPONSE ON REQUEST SUCCESS
		$.ajax({
			url: url,
			success: function(response)
			{
				jQuery('#modal_ajax .modal-body').html(response);
			}
		});
	}
	</script>
    <style>
		@media (min-width: 576px){
			.modal-dialog {
				max-width: 800px !important;
				margin: 30px auto;
			}
		}
	</style>
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax" style="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $this->db->get_where('system_settings', array('type'=>'system_name'))->row()->description; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" style="height:100%; overflow:auto;">
                    
                </div>
                <div class="modal-footer">
					<div class="container-fluid pull-right" style="text-align: right;">
						<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
					</div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
	function confirm_modal(delete_url)
	{
		jQuery('#modal-4').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
	</script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
					<div class="container-fluid pull-right" style="text-align: right;">
						<a href="#" class="btn btn-danger" id="delete_link"><?php echo 'Delete';?></a>
						<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancel';?></button>
					</div>
                </div>
            </div>
        </div>
    </div>
	
	  <script type="text/javascript">
	function confirm_modal_action(delete_url)
	{
		jQuery('#modal-5').modal('show', {backdrop: 'static'});
		document.getElementById('action_link').setAttribute('href' , delete_url);
	}
	</script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-5">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align:center;">Are you sure to take this action ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <div class="container-fluid pull-right" style="text-align: right;">
						<a href="#" class="btn btn-danger" id="action_link"><?php echo 'Yes';?></a>
						<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'No';?></button>
					</div>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript">
	function showAjaxModalCoupon(url)
	{
		// SHOWING AJAX PRELOADER IMAGE
		/* jQuery('#modal_ajax_coupon ').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>assets/preloader.gif" /></div>'); */
		
		// LOADING THE AJAX MODAL
		jQuery('#modal_ajax_coupon').modal('show', {backdrop: 'true'});
		
		// SHOW AJAX RESPONSE ON REQUEST SUCCESS
		$.ajax({
			url: url,
			success: function(response)
			{
				jQuery('#modal_ajax_coupon ').html(response);
			}
		});
	}
	</script>
    <style>
		@media (min-width: 576px){
			.modal-dialog {
				max-width: 800px !important;
				margin: 30px auto;
			}
		}
	</style>
    <!-- (Ajax Modal)-->
    <div class="modal " id="modal_ajax_coupon" style="">
    </div>
     <!-- aiman code-->
   