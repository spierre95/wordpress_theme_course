<!-- wordpress looks for file named page.php to display a single PAGE, it will use index.php as a defualt fall back when single.php is not present-->
<?php
get_header();
while (have_posts()) {
    the_post(); ?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/ocean.jpg)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>DON'T FORGET TO REPLACE ME LATER</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <?php
        $postParentId = wp_get_post_parent_id(get_the_ID());
        if ($postParentId) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($postParentId) ?>"><i class="fa fa-home" aria-hidden="true"></i><?php echo get_the_title($postParentId) ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
            </div>
        <?php } ?>

        <?php if ($postParentId || get_pages(array('child_of' => get_the_ID()))) { ?>
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?php echo get_permalink($postParentId) ?>"><?php echo get_the_title($postParentId) ?></a></h2>
                <ul class="min-list">
                    <?php
                    if ($postParentId) {
                        wp_list_pages(array(
                            'title_li' => null,
                            'child_of' => $postParentId
                        ));
                    } else {
                        wp_list_pages(array(
                            'title_li' => null,
                            'child_of' => get_the_ID()
                        ));
                    }
                    ?>
                </ul>
            </div>
        <?php } ?>

        <div class="generic-content">
            <?php the_content(); ?>
        </div>

    </div>

<?php }
get_footer();
?>