<?php get_header(); ?>

<div class="wrapper">
	<div class="diary-sub">
    	<h1><a href="<?php bloginfo('url'); ?>/diary">残り人生を行き急ぐ廃人の日記</a></h1>
        <p>その日のぼやきを云々…</p>
    </div>
    <div class="main">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="posts">
                    <span class="post-date"><?php the_date(); ?></span>
                    <span class="post-category">Category - <?php the_category(', '); ?></span>
                	<span class="post-comment-num"><?php comments_popup_link('Comment : 0', 'Comment : 1', 'Comments : %'); ?></span>
                </p>
                <?php the_content(); ?>
                <p class="footer-post-meta">
                    <?php the_tags('Tag : ',', '); ?>
                </p>
 			</div>
             
            <div class="navigation">
				<?php if( get_previous_post() ): ?>
        	    	<div class="alignleft"><?php previous_post_link('%link', '« %title'); ?></div>
            	<?php endif;
            	if( get_next_post() ): ?>
            		<div class="alignright"><?php next_post_link('%link', '%title »'); ?></div>
            	<?php endif; ?>
            </div>
        
        <?php comments_template(); ?>

        <?php endwhile; ?>
        
        <?php else: ?>
            <div class="post">
            <h2>記事はありません</h2>
            <p>お探しの記事は見つかりませんでした。</p>
            </div>
		<?php endif; ?>

    </div>
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
