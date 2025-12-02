<?php 
    $details = $this->db->get_where('brands_pages', array('brands_pages_id'=>$param1))->row_array();
    $brands_details = $this->db->get_where('brands_pages_brands', array('brands_pages_id'=>$param1))->result_array();
    $brands             = $this->db->query("SELECT * FROM brands WHERE status = 'Active' ")->result_array();

?>
<style>
    .tag{
	background: #ededed;
    padding: 6px;
    border-radius: 10px;
    font-size: 11px;
}
.tags{
	background: #ededed;
    padding: 6px;
    border-radius: 10px;
    font-size: 11px;
}
.cross{
	cursor: pointer;
    font-size: 10px;
}
.chip{
    display: inline-flex;
    flex-direction: row;
    background-color: #e5e5e5;
    border: none;
    cursor: default;
    height: 36px;
    outline: none;
    padding: 0;
    font-size: 14px;
    font-color: #333333;
    font-family:"Open Sans", sans-serif;
    white-space: nowrap;
    align-items: center;
    border-radius: 16px;
    vertical-align: middle;
    text-decoration: none;
    justify-content: center;
    margin:4px;
}
.chip-head{
    object-fit: contain;
    display: flex;
    position: relative;
    overflow: hidden;
    background-color: #32C5D2;
    font-size: 1.25rem;
    flex-shrink: 0;
    align-items: center;
    user-select: none;
    border-radius: 50%;
    justify-content: center;
    width: 36px;
    color: #fff;
    height: 36px;
    font-size: 20px;
    margin-right: -4px;
}
.chip-content{
    cursor: inherit;
    display: flex;
    align-items: center;
    user-select: none;
    white-space: nowrap;
    padding-left: 12px;
    padding-right: 12px;
}
.chip-svg{
        color: #999999;
    cursor: pointer;
    height: auto;
    margin: 4px 4px 0 -8px;
  fill: currentColor;
    width: 1em;
    height: 1em;
    display: inline-block;
    font-size: 24px;
    transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    user-select: none;
    flex-shrink: 0;
}
.chip-svg:hover{
    color: #666666;
}
    .select2-container {
  box-sizing: border-box;
  display: inline-block;
  margin: 0;
  position: relative;
  vertical-align: middle;
  z-index: 99999999999;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 34px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 27px;
    position: absolute;
    top: 5px;
    right: 1px;
    width: 20px;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 0px;
    height: 35px;
}
.field_set {
    border-color: #afa6a6;
    border-style: dashed;
}
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<div class="row">
	<div class="col-md-12">
		<div class="card m-b-30">
			<h4 class="card-header mt-0"><i class="fa fa-pencil"></i> Edit Brand page</h4>
			<div class="card-body">
				<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_brands_page/edit/'.$param1; ?>" method="post"  enctype ='multipart/form-data'>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" readonly name="name" class="form-control" value="<?php echo $details['name']; ?>" placeholder="Please Enter Brand page Name" >
						</div>
                    </div>
                    <div class="form-group row">
				<label class="col-sm-3 col-form-label">Brands</label>
				<div class="col-sm-9">
					<select id="brands_id"  name="brands_id"  class="form-control search_select"  placeholder="Please select" data-search="true">
						<option value=""  selected >Please select</option>
						
						<?php foreach($brands as $fetch_data){ ?>
							<option data-url="<?php echo $fetch_data['website_url'];?>" data-img="<?php echo base_url().'uploads/brands/'.$fetch_data['brand_image'];?>" data-name="<?php echo $fetch_data['name'];?>" data-id="<?php echo $fetch_data['brands_id'];?>"  value="<?php echo $fetch_data['brands_id']; ?>" 
								
							>
								<?php echo $fetch_data['name']; ?>
									
								</option>
						<?php } ?>
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-3 col-form-label"> Selected brands</label>
				<div class="col-sm-9 ">
                    <div style="" class="all_tags" id="tags_box">
                    <?php 
                        foreach($brands_details as $bra_details){
                           $brands_ddetails = $this->db->get_where("brands",array('brands_id'=>$bra_details['brands_id']))->row_array();
                        
                        ?>
                        <div class="chip" id="div_inp_<?php echo $brands_ddetails['brands_id']?>">  
                            <img class="chip-head" src="<?php echo base_url()?>/uploads/brands/<?php echo $brands_ddetails['brand_image']?>">   <div class="chip-content"><?php echo $brands_ddetails['name']?></div>  
                            <div class="chip-close">     
                                <svg class="chip-svg" focusable="false" id="inp_<?php echo $brands_ddetails['brands_id']?>" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"></path>
                                    </svg>   
                                    <input type="hidden" name="brands[]" value="<?php echo $brands_ddetails['brands_id']?>">   
                            </div> 
                        </div>
                        <?php
                        
                        }
                        ?>
                    </div>
				</div>
			</div>
                    
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Status</label>
						<div class="col-sm-9">
							<select  name="status" required="required" class="form-control">
								<option value="active" <?php if($details['status'] == 'active') echo 'selected'; ?>>Active</option>
								<option value="inactive" <?php if($details['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
							</select>
						</div>
                    </div>
					<div class=" ">
						<b>Seo Settings</b>
						<hr>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Seo Title</label>
						<div class="col-sm-9">
							<input type="text" name="seo_title" required="required" placeholder="Enter SEO Title" value="<?php echo $details['seo_title']; ?>" placeholder="Please Enter Telephone" class="form-control" >
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Seo Description</label>
						<div class="col-sm-9">
						<textarea name="seo_desc" required="required" placeholder="Enter SEO Description"  value="" class="form-control"  rows="3"><?php echo $details['seo_description']; ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Seo Keywords</label>
						<div class="col-sm-9">
						<textarea name="seo_keys" required="required" class="form-control" placeholder="Enter meta keys words"  rows="3"><?php echo $details['seo_key_words']; ?></textarea>
						<small style="color:red">keyword should comma separated*</small>
						</div>
					
					</div>
					<button type="submit" class="btn btn-info pull-right">Save</button>
				</form>
            </div>
        </div>
    </div>
</div> 
<script type="text/javascript" src="https://dev.eigix.com/voucherr/assets/admin/dist/summernote-bs4.js"></script>
<script>
 $('.summernote').summernote({
	height: 300,
	tabsize: 3
  });
</script>
<script>
	$(document).ready(function() {
        $(".search_select").select2();
		$('#brands_id').change(function(){

        var name = $('#brands_id option:selected').attr('data-name');
        var id = $('#brands_id option:selected').attr('data-id');
        var img = $('#brands_id option:selected').attr('data-img');


        var section ="";
            section += ' <div class="chip" id="div_inp_'+id+'">';
            section += '  <img class="chip-head" src="'+img+'">';
            section += '   <div class="chip-content">'+name+'</div>';
            section += '   <div class="chip-close">';
            section += '     <svg class="chip-svg" focusable="false" id="inp_'+id+'"  viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"></path></svg>';
            section += '   <input type="hidden" name="brands[]" value="'+id+'">';
            section += '   </div>';
            section += ' </div>';

            $("#tags_box").append(section);  
        })

        $('.all_tags').on("click",".chip-svg", function(){
        var id = $(this).attr('id');
        $("#div_"+id).remove();
        });
	});
</script>