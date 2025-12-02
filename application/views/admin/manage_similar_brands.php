<style>
.page_list div
   {
    border: 1px dotted #ccc;
    cursor: move;
    background: transparent;
    border-radius: 21px;
    padding: 10px;
   }
   .page_list div.ui-state-highlight
   {
    background-color: #fcecec;
    border: 3px dotted #ccc;
    cursor: move;
    margin-top: 12px;
    padding: 10px;
   }
.tag{
	background: #ededed;
    padding: 6px 14px;
    border-radius: 10px;
    font-size: 11px;
    display: flex;
    justify-content: space-between;
}
.tags{
	background: #ededed;
    padding: 6px;
    border-radius: 10px;
    font-size: 11px;
}
.cross_press{
	cursor: pointer;
    font-size: 10px;
}	.select2-container {
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
</style>
<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<!-- Page-header start -->
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4><?php echo $page_title; ?></h4>
									<span><?php echo $page_sub_title; ?></span>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href=""> <i class="fa fa-cogs"></i> </a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Admin</a>
									</li>
									<li class="breadcrumb-item"><a href=""><?php echo $page_title; ?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Page-header end -->
				<div class="page-body">
					<div class="row">
						<div class="card col-md-12">
							<div class="card-header">
								<h5><?php echo $page_title; ?> of <?php echo $brands_details->name;?></h5>
								<div class="card-header-right">
									<ul class="list-unstyled card-option">
										
										<li><i class="feather icon-maximize full-card"></i></li>
										<li><i class="feather icon-minus minimize-card"></i></li>
										<li><i class="feather icon-trash-2 close-card"></i></li>
									</ul>
								</div>
								<hr>
							</div>
							<div class="card-block">
                                <select name="" data-brands_id="<?php echo $brands_details->brands_id;?>" class="search_select form-control select_similar_brands" >
                                    <option value="">Select similar brands of <?php echo $brands_details->name;?></option>
                                    <?php
                                    
                                    foreach($brand_data as $brnd){
                                        $brand_id = $brnd['brands_id'];
                                        $all_brands = $this->db->get_where('brands',array('brands_id'=>$brand_id))->row();
                                        $brand_name = $all_brands->name;
                                        $brand_id   = $all_brands->brands_id;
                                        
                                        ?>
                                        <option value="<?php echo $brand_id;?>" id="<?php echo  $brand_name;?>"><?php echo $brand_name;?></option>
                                        
                                        <?php   
                                    } ?>
                                </select> 
                                <div style="background:white;padding: 12px;display: grid;grid-gap: 8px;grid-template-columns: 1fr 1fr 1fr 1fr 1fr;" class="all_tags page_list tags_drag" id="tags">
                                <?php
                                    if(!empty($similar_brands)){
                                    foreach($similar_brands as $similar_brnd){
                                    $similar_brand_id = $similar_brnd['similar_brand_id'];
                                    $all_brands = $this->db->get_where('brands',array('brands_id'=>$similar_brand_id))->row();

                                    if($all_brands)
                                    {
                                    $brand_name = $all_brands->name;
                                    
                                    
                                    ?>
                                   
                                        <div data-similar_id = "<?php echo $similar_brnd["similar_brands_id"]; ?>" class="tag" id="<?php echo $similar_brand_id;?>">
                                        <span>
                                            <?php echo $brand_name; ?>
                                        </span>
                                        <span class="cross_press" data-brands_id= "<?php echo $similar_brand_id;?>">&#x2715 </span>
                                        </div>
                                   
                                   
                                    
                                    <?php  } 
                                    }
                                    }
                                    else{
                                    ?>
                                    <div class="tags no_<?php echo $fetch_data['categories_id']?>">
                                    <span>
                                        No category interests 
                                    </span>
                                    </div>
                                    <?php
                                    }
                                    ?>
								</div>
							</div>

                            <div class="card-block">
                                <select name="" data-brands_id="<?php echo $brands_details->brands_id;?>" class="search_select form-control select_similar_hidden_brands" >
                                    <option value="">Select hidden similar brands of <?php echo $brands_details->name;?></option>
                                    <?php
                                    
                                    foreach($brand_data as $brnd){
                                        $brand_id = $brnd['brands_id'];
                                        $all_brands = $this->db->get_where('brands',array('brands_id'=>$brand_id))->row();
                                        $brand_name = $all_brands->name;
                                        $brand_id   = $all_brands->brands_id;
                                        
                                        ?>
                                        <option value="<?php echo $brand_id;?>" id="<?php echo  $brand_name;?>"><?php echo $brand_name;?></option>
                                        
                                        <?php   
                                    } ?>
                                </select> 
                                <div style="background:white;padding: 12px;display: grid;grid-gap: 8px;grid-template-columns: 1fr 1fr 1fr 1fr 1fr;" class="all_tags2 page_list tags2_drag" id="tags2">
                                <?php
                                    if(!empty($similar_hidden_brands)){
                                    foreach($similar_hidden_brands as $similar_brnd){
                                    $similar_brand_id = $similar_brnd['similar_brand_id'];
                                    $all_brands = $this->db->get_where('brands',array('brands_id'=>$similar_brand_id))->row();

                                    if($all_brands)
                                    {
                                    $brand_name = $all_brands->name;
                                    
                                    
                                    ?>
                                   
                                        <div data-similar_id = "<?php echo $similar_brnd["similar_brands_id"]; ?>" class="tag" id="<?php echo $similar_brand_id;?>">
                                        <span>
                                            <?php echo $brand_name; ?>
                                        </span>
                                        <span class="cross_press" data-brands_id= "<?php echo $similar_brand_id;?>">&#x2715 </span>
                                        </div>
                                   
                                   
                                    
                                    <?php  } 
                                    }
                                    }
                                    else{
                                    ?>
                                    <div class="tags no_<?php echo @$fetch_data['categories_id']?>">
                                    <span>
                                        No category interests 
                                    </span>
                                    </div>
                                    <?php
                                    }
                                    ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
