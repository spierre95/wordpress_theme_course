<!-- wordpress looks for file named page.php to display a single PAGE, it will use index.php as a defualt fall back when single.php is not present-->
<?php 
get_header();
    while(have_posts()){
        the_post(); ?>
        <h1>THIS IS A PAGE</h1>
        <h2><?php the_title();?></h2>
        <?php the_content();?>
    <?php }
get_footer();
?>