<div class="table-responsive animated fadeInRight">
	<table class="table m-0 table-striped">
		<tr>
			<th><?php echo get_msg('no'); ?></th>
			<th><?php echo get_msg('shipping_package_name'); ?></th>
			<th><?php echo get_msg('zone_name'); ?></th>
			
			
			
			<?php if ( $this->ps_auth->has_access( EDIT )): ?>
				
				<th><span class="th-title"><?php echo get_msg('btn_edit')?></span></th>
			
			<?php endif; ?>
			
			<?php if ( $this->ps_auth->has_access( DEL )): ?>
				
				<th><span class="th-title"><?php echo get_msg('btn_delete')?></span></th>
			
			<?php endif; ?>
			
			<?php if ( $this->ps_auth->has_access( PUBLISH )): ?>
				
				<th><span class="th-title"><?php echo get_msg('btn_publish')?></span></th>
			
			<?php endif; ?>

	</tr>

	<?php $count = $this->uri->segment(4) or $count = 0; ?>

	<?php if ( !empty( $shipping_zones ) && count( $shipping_zones->result()) > 0 ): ?>

		<?php foreach($shipping_zones->result() as $shipping_zone): ?>
			
			<tr>
				<td><?php echo ++$count;?></td>

				<td><?php echo $shipping_zone->name; ?></td>
				<td><?php echo $this->Zone->get_one($shipping_zone->zone_id)->name; ?></td>
				
				<?php if ( $this->ps_auth->has_access( EDIT )): ?>
			
					<td>
						<a href='<?php echo $module_site_url .'/edit/'. $shipping_zone->id; ?>'>
							<i class='fa fa-pencil-square-o'></i>
						</a>
					</td>
				
				<?php endif; ?>
				
				<?php if ( $this->ps_auth->has_access( DEL )): ?>
					
					<td>
						<a herf='#' class='btn-delete' data-toggle="modal" data-target="#myModal" id="<?php echo $shipping_zone->id;?>">
							<i class='fa fa-trash-o'></i>
						</a>
					</td>
				
				<?php endif; ?>
				
				<?php if ( $this->ps_auth->has_access( PUBLISH )): ?>
					
					<td>
						<?php 
						if ( $shipping_zone->status == 1): ?>
							<button class="btn btn-sm btn-success unpublish" id='<?php echo $shipping_zone->id;?>'>
							<?php echo get_msg('btn_yes'); ?></button>
						<?php else:?>
							<button class="btn btn-sm btn-danger publish" id='<?php echo $shipping_zone->id;?>'>
							<?php echo get_msg('btn_no'); ?> </button> 
						<?php endif; ?>
					</td>
				
				<?php endif; ?>

			</tr>

		<?php endforeach; ?>

	<?php else: ?>
			
		<?php $this->load->view( $template_path .'/partials/no_data' ); ?>

	<?php endif; ?>

</table>
