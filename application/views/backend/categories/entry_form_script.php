<script>

	<?php if ( $this->config->item( 'client_side_validation' ) == true ): ?>

	function jqvalidate() {
		
		$('#category-form').validate({
			rules:{
				name:{
					blankCheck : "",
					minlength: 1,
					remote: "<?php echo $module_site_url .'/ajx_exists/'.@$category->id; ?>"
					
				},
				
				image:{
					required : true
				},
				icon:{
					required : true
				}
			},
			messages:{
				name:{
					blankCheck : "<?php echo get_msg( 'err_cat_name' ) ;?>",
					minlength: "<?php echo get_msg( 'err_cat_len' ) ;?>",
					remote: "<?php echo get_msg( 'err_cat_exist' ) ;?>."
				},
				
				image:{
					required : "<?php echo get_msg( 'err_image_missing' ) ;?>."
				},
				icon:{
					required : "<?php echo get_msg( 'err_icon_missing' ) ;?>."
				}
			}

		});

		// custom validation
		jQuery.validator.addMethod("blankCheck",function( value, element ) {
			
			   if(value == "") {
			    	return false;
			   } else {
			    	return true;
			   }
		})
		

	}
	

	<?php endif; ?>

	

		$('.delete-img').click(function(e){
			e.preventDefault();

			// get id and image
			var id = $(this).attr('id');

			// do action
			var action = '<?php echo $module_site_url .'/delete_cover_photo/'; ?>' + id + '/<?php echo @$category->id; ?>';
			console.log( action );
			$('.btn-delete-image').attr('href', action);
			
		});

	
</script>

<?php 
	// replace cover photo modal
	$data = array(
		'title' => get_msg('upload_photo'),
		'img_type' => 'category',
		'img_parent_id' => @$category->id
	);
	
	$this->load->view( $template_path .'/components/photo_upload_modal', $data );
	// delete cover photo modal
	$this->load->view( $template_path .'/components/delete_cover_photo_modal' ); 
	
	// replace cover icon modal
	$data = array(
		'title' => get_msg('upload_icon'),
		'img_type' => 'category-icon',
		'img_parent_id' => @$category->id
	);
		$this->load->view( $template_path .'/components/icon_upload_modal', $data );
		// delete icon modal
		$this->load->view( $template_path .'/components/delete_icon_modal' ); 
?>