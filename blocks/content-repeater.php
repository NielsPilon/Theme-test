<?php
/**
 * Block Name: Repeater
 *
 * This is the template that displays the repeater block.
 */

// create id attribute for specific styling
$id = 'repeater-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<?php if( have_rows('repeater_block') ):?>

	<ul class="repeater">

	<?php while( have_rows('repeater_block') ): the_row(); 
		
$naam = get_sub_field('naam');
$email = get_sub_field('email');

		
		?>

		<li>

		<?php echo $naam;
			
				echo ' | ';
			
			 echo $email;?>
			
		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>