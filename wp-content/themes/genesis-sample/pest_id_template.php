<?php
/*
Template Name: Pest ID Template
*/
include_once('/wp-includes/bootstrap-3.3.5-dist/');

add_action('genesis_entry_content', 'do_pest_id_toggle');
function do_pest_id_toggle() {
	?>

	<script type="text/javascript">
	jQuery(document).ready(function($) {
		jQuery('.pest-top').click(function(){
    		jQuery(this).next('.pest-bottom').stop().slideToggle(400);
    		
    		var class1 = jQuery(this).children('i').stop().attr('class');
    		
    		if (class1 == 'fa fa-arrow-right') {
    			jQuery(this).children('i').stop().attr('class','fa fa-arrow-down');
    		} else {
    			jQuery(this).children('i').stop().attr('class','fa fa-arrow-right');
    		}
		});
	})
	</script>

	<?php 
	if(have_rows('pest_group')):
		while(have_rows('pest_group')) : the_row();
			$image = get_sub_field('pest_image');
			$type = get_sub_field('pest_type'); 
			?>

			<div class="pest-top">
				<img class="pest-img" src="<?php echo $image['url']; ?>"><h1><?php echo $type; ?></h1><i class="fa fa-arrow-right"></i>
			</div>

			<div class="pest-bottom">
				<?php 
				if(have_rows('the_pest_names')):
					$rows = get_field('the_pest_names');
					$pestPerCol = 0;
					while(have_rows('the_pest_names')) : the_row();
						$pestPerCol++;
					endwhile;
					$pestPerCol = $pestPerCol / 2;
					$i = 0; ?>

					<div class="first one-half"> <?php
						while(have_rows('the_pest_names') && $i <= $pestPerCol) : the_row();
							$name = get_sub_field('pest_name'); ?>
							<p class="pest-list"><?php echo $name; ?></p>
						<?php 
							$i++;
						endwhile; ?>
					</div>
					
					<div class="one-half"> <?php
						while(have_rows('the_pest_names') && $i > $pestPerCol) : the_row();
							$name = get_sub_field('pest_name'); ?>
						<p class="pest-list"><?php echo $name; ?></p>
					<?php 
							$i++;
						endwhile; ?>
					</div>
				  <?php else:
				  	// no rows found
				  endif; ?>	
			</div>
		<?php
		endwhile;
	else :
		// no rows found
	endif;

	echo do_shortcode('[cta]');
}

genesis();