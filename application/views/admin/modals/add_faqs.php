<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/summernote-bs4.css">
<?php  
 $page_types = $this->db->query("SELECT * FROM page_types WHERE status = 'Active' ")->result_array();
 $page_id  = $param1;
 $brand_id = $param2;

?>
<div class="card">
	<h4 class="card-header mt-0"><i class="fa fa-plus"></i> Add Faqs</h4>
	<div class="card-body">
	    
		<form action="<?php echo base_url().strtolower($this->session->userdata('directory')). '/manage_faqs/add'; ?>" method="post"  enctype ='multipart/form-data'>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Question</label>
				<div class="col-sm-9">
					<input type="text" name="question" class="form-control" placeholder="Please Enter Question" required>
					<input type="hidden" name="unique_id" value="<?php if($brand_id==""){ echo "0";}else{ echo $brand_id;}?>" class="form-control" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Answer</label>
				<div class="col-sm-9">
					<textarea class="summernote" id="editor" name="editor" data-height='300' data-name='body' ></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Question Type</label>
				<div class="col-sm-9">
					<select id="question_type" name="question_type" required="required" class="form-control">
						<option value="" disabled selected>Please select</option>
						<?php foreach($page_types as $fetch_data){ ?>
							<option <?php if($page_id==$fetch_data['page_types_id']){ echo "selected"; }?> value="<?php echo $fetch_data['page_types_id']; ?>"><?php echo $fetch_data['page_name']; ?></option>    
						<?php } ?>
					</select> 
				</div>
			</div>
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
			<button type="submit" class="btn btn-info pull-right">Add</button>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/dist/summernote-bs4.js"></script>
<script>
	$(document).ready(function() {
	
	var gArrayFonts = ['Amethysta','Poppins','Poppins-Bold','Poppins-Black','Poppins-Extrabold','Poppins-Extralight','Poppins-Light','Poppins-Medium','Poppins-Semibold','Poppins-Thin'];
  $('.summernote').summernote({
	 fontNames: gArrayFonts,
    fontNamesIgnoreCheck: gArrayFonts,
    fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22' , '24', '28', '32', '36', '40', '48'],
    followingToolbar: true,
    dialogsInBody: true,
	disableDragAndDrop: false,
	blockquoteBreakingLevel: 2,
	spellCheck: true,	
    toolbar: [
    // [groupName, [list of button]]
    ['style'],
    ['style', ['clear', 'bold', 'italic', 'underline']],
    ['fontname', ['fontname']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],       
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
	
	['insert', ['link', 'picture', 'video','hr']],
	['height', ['height']],
	['view', ['codeview', 'help','fullscreen']],
	// ['mybutton', ['myVideo']], 
    ],
	buttons: {
      myVideo: function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
          contents: '<i class="fa fa-video-camera"/>',
          tooltip: 'video',
          click: function() {
            var div = document.createElement('div');
            div.classList.add('embed-container');
            var iframe = document.createElement('iframe');
            iframe.src = prompt('Enter video url:');
            iframe.setAttribute('frameborder', 0);
            iframe.setAttribute('width', '100%');
            iframe.setAttribute('allowfullscreen', true);
            div.appendChild(iframe);
            context.invoke('editor.insertNode', div);
          }
        });

        return button.render();
      }
    },
	popover: {
		image: [
			['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
			['float', ['floatLeft', 'floatRight', 'floatNone']],
			['remove', ['removeMedia']]
		],
		link: [
			['link', ['linkDialogShow', 'unlink']]
		],
		table: [
			['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
			['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
		],
		air: [
			['color', ['color']],
			['font', ['bold', 'underline', 'clear']],
			['para', ['ul', 'paragraph']],
			['table', ['table']],
			['insert', ['link', 'picture']]
		]
		}
  });

});
</script>