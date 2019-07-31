<?php 
get_header();
// wordpress functions: 
// have_posts: https://developer.wordpress.org/reference/functions/have_posts/
// the_post: https://developer.wordpress.org/reference/functions/the_post/
// the_permalink: https://developer.wordpress.org/reference/functions/the_permalink/
    while(have_posts()){
        the_post(); ?>
        <h2><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>
        <?php the_content();?>
        <hr/>
    <?php }
get_footer();

?>