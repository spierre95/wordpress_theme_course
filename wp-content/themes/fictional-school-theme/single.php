<!-- wordpress looks for file named single.php to display a single BLOG post, it will use index.php as a defualt fall back when single.php is not present 
-->
<?php 
get_header();
    while(have_posts()){
        the_post(); ?>
        <h2><?php the_title();?></h2>
        <?php the_content();?>
    <?php }
get_footer();
?>