<?php
/**
 *
 * @package Atu
 */
?>

    <?php

        extract(atu_check_footer_sidebar_columns(), EXTR_OVERWRITE);

    ?>

    <div class="footer-widget">
        <div class="container">
            <div class="row">

                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <div class="<?php echo $footer_widget_class_name; ?>">
                        <div class="footer-widget__item-1">
                            <?php dynamic_sidebar( 'footer-1'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-2' ) && $footer_widget_columns >= 2 ) : ?>
                    <div class="<?php echo $footer_widget_class_name; ?>">
                        <div class="footer-widget__item-2">
                            <?php dynamic_sidebar( 'footer-2'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-3' ) && $footer_widget_columns >= 3 ) : ?>
                    <div class="<?php echo $footer_widget_class_name; ?>">
                        <div class="footer-widget__item-3">
                            <?php dynamic_sidebar( 'footer-3'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-4' ) && $footer_widget_columns === 4 ) : ?>
                    <div class="<?php echo $footer_widget_class_name; ?>">
                        <div class="footer-widget__item-4">
                            <?php dynamic_sidebar( 'footer-4'); ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>