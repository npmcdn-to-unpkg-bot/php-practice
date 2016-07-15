<div id="comment-area">
<?php if( have_comments() ): // コメントがあったら ?>
<h3 id="comments">Comment</h3>
<ol class="commets-list">
<?php wp_list_comments( 'avatar_size=55' ); ?>
</ol>
<?php endif; ?>

<div class="comment-page-link">
<?php paginate_comments_links(); ?>
</div>

<?php $args = array(
'title_reply' => 'Leave a Reply',
'label_submit' => 'Submit Comment',
);
comment_form( $args ); ?>

</div>