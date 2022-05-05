
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php
if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
    <aside class="widget-area">
        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
    </aside>
<?php endif; ?>

<?php gt_set_post_view(); ?>
<?php endwhile; ?>
<?php endif; ?>