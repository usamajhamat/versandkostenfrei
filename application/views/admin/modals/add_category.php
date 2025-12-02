<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Category</h4>
	<div class="card-body">
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_categories/add'; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">German Name</label>
				<div class="col-sm-9">
					<input type="text" name="name" class="form-control" placeholder="Please Enter Category Name" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">English Name</label>
				<div class="col-sm-9">
					<input type="text" name="en_name" class="form-control" placeholder="Please Enter Category English Name" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Category Image</label>
				<div class="col-sm-9">
					<input type="file" name="cat_image" class="form-control" required>
					<label style="color:red;">Image size must be (1365*765). width: 1365px & height: 765px</label>
				</div>
			</div>.
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Category Icon</label>
				<div class="col-sm-9">
					<input type="file" name="font_icon" class="form-control" required>
					<!--<label style="color:red;">Image  must be of svg extention-->
				</div>
			</div>
			<!--<div class="form-group row">
				<label class="col-sm-3 col-form-label">Font Icon</label>
				<div class="col-sm-9">
					<input type="text" name="font_icon" class="form-control" placeholder="Please Enter Font Icon" required>
					<br>
					<label>Should use <a style="color:red; text-decoration: underline;" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a> icons. e.g. fa fa-user</label>
				</div>
			</div>-->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Type</label>
				<div class="col-sm-9">
					<select id="type" name="type" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<option value="category">Category</option>
						<option value="deal">Deal</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Heading</label>
				<div class="col-sm-9">
					<input type="text" name="cat_heading" class="form-control" placeholder="Please Enter Category Heading" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Short Description</label>
				<div class="col-sm-9">
					<textarea name="description" class="form-control" placeholder="Please Enter Description" required rows="5"></textarea>
				</div>
			</div>
			<!--<div class="form-group row">
				<label class="col-sm-3 col-form-label">Long Description</label>
				<div class="col-sm-9">
					<textarea name="long_description" class="summernote" data-height='300' data-name='body' ></textarea>
				</div>
			</div>-->
			<!-- <div class="form-group row">
				<label class="col-sm-3 col-form-label">Menu Sort Order</label>
				<div class="col-sm-9">
					<input type="number" name="sort_order" class="form-control" placeholder="Please Enter sort order" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Section Sort Order</label>
				<div class="col-sm-9">
					<input type="number" name="section_sort_order" class="form-control" placeholder="Please Enter section sort order" required>
				</div>
			</div> -->
			<!--<div class="form-group row">
				<label class="col-sm-3 col-form-label">News Letter Heading</label>
				<div class="col-sm-9">
					<input type="text" name="ns_heading" class="form-control" placeholder="Please Enter Newsletter heading" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">News Letter Description</label>
				<div class="col-sm-9">
					<textarea name="ns_desc" class="form-control" rows="5"  data-height='300' data-name='body' ></textarea>
				</div>
			</div>-->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Status</label>
				<div class="col-sm-9">
					<select id="status" name="status" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<option value="Active">Active</option>
						<option value="Inactive">Inactive</option>
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
					<input type="text" name="seo_title" required="required" placeholder="Enter SEO Title" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Seo Description</label>
				<div class="col-sm-9">
				   <textarea name="seo_desc" required="required" placeholder="Enter SEO Description" class="form-control"  rows="3"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Seo Keywords</label>
				<div class="col-sm-9">
				   <textarea name="seo_keys" required="required" placeholder="Enter meta keys words" class="form-control"  rows="3"></textarea>
				   <small style="color:red">keyword should comma separated*</small>
				</div>
				
			</div>
			<button type="submit" class="btn btn-info pull-right">Add</button>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.js"></script>
<script>
 $('.summernote').summernote({
	height: 300,
	tabsize: 3
  });
</script>