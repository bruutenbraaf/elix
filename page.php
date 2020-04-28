<?php
get_header(); ?>

<?php if (get_the_post_thumbnail_url($post, 'full_img')) { ?>
    <header class="p-header d-flex align-items-end justify-content-end<?php echo esc_attr($classes); ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url($post, 'large'); ?>);">
    </header>
<?php } ?>
<main class="p-main">
    <div class="container">
        <div class="d-flex row">
            <div class="t-block">
                <h1><?php the_title(); ?></h1>
                <span class="breadcrumbs">
                    <?php if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('');
                    } ?>
                </span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row flex-wrap">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile;
            else : ?>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>