<?php get_header(); ?>

<section>
    <?
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_title('<h1>', "</h1>");

            the_content();
        endwhile;
    endif; ?>
</section>

<? get_footer(); ?>