<?php
/**
 * Displays the footer widget area.
 */

if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

        <aside class="widget-area">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
        </aside><!-- .widget-area -->

<?php endif; ?>
