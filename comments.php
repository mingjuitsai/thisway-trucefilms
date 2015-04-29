<!-- BEGIN: comments -->
<div id="comments">

<?php
	/* Customise Comment Form */
	$truce_fields =  array(

		'author' =>
			'<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
			( $req ? '<span class="required">*</span>' : '' ) .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30"' . $aria_req . ' /></p>',

		'email' =>
			'<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
			( $req ? '<span class="required">*</span>' : '' ) .
			'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' /></p>',

	    'is_human' =>
		    '<p class="comment-form-ishuman"><label for="ishuman">' . __( 'Are you human?', 'domainreference' ) . '</label> ' .
		    ( $req ? '<span class="required">*</span>' : '' ) .
		    '<input id="ishuman" name="ishuman" type="text" value="' . esc_attr(  $commenter['comment_author_ishuman'] ) .
		    '" size="30"' . $aria_req . ' /></p>',
	);

	$truce_args = array(
		'fields' => apply_filters( 'comment_form_default_fields', $truce_fields )
	);
?>


<?php if(have_comments()): ?>

	<h4 id="comments-title">
		<?php echo get_comments_number().__(' Comments to ','ThisWay').get_the_title(); ?>
	</h4>
	
	<?php get_comment_nav();?>
	
	<ol class="commentslist">
		<?php wp_list_comments(array('callback' => 'comment_callback')); ?>
    </ol>
	
	<?php get_comment_nav();?>
	
	<?php if(comments_open()): ?>

		<?php comment_form($truce_args); ?>

	
	<?php elseif(!comments_open()): ?>
		<!-- nothing -->
	<?php endif; ?>

	<?php else: ?>
	<?php 
		comment_form($truce_args); 
	?>
<?php endif; ?>

</div>
<!-- END: comments -->


<?php

function get_comment_nav()
{
?>

	<?php if(get_comment_pages_count()> 1){?>
	<div class="comments-nav">
		<div class="prev">
			<?php previous_comments_link(__('Prev Comments','ThisWay')); ?>
		</div>
		<div class="next">
			<?php next_comments_link(__('Next Comments','ThisWay')); ?>
		</div>
	</div>
	<?php } ?>

<?php
}
?>
<div class="divider"></div>