<?php
/*
Template Name: diary
*/
?>

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
                 <?php the_content('続きを読む &raquo;'); ?>
             </div>
        <?php endwhile; ?>
        
        <?php else: ?>
            <div class="post">
            <h2>記事はありません</h2>
            <p>お探しの記事は見つかりませんでした。</p>
            </div>
		<?php endif; ?>


		<?php if ( $wp_query -> max_num_pages > 1 ) : ?>
            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('« PREV'); ?></div>
                <div class="alignright"><?php previous_posts_link('NEXT »'); ?></div>
            </div>
        <?php endif; ?>

    </div>
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
