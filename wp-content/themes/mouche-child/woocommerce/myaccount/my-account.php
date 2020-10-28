<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */

?>

<?php
$navigation = get_field('navigation', 'options') ?: null;
$footer = get_field('footer', 'options') ?: null;

get_header( $navigation );
?>

<section class="header-top-padding-normal header-bottom-padding-normal bg-secondary">
  <div class="container width-950 align-center p-t-60 p-b-50">
    <h1 class="large m-b-20">My Account</h1>
    <a href="#" onclick="history.back();">
      <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/arrow-primary.svg" alt="Go back">
    </a>
  </div>
</section>

<section class="block-top-padding-large block-bottom-padding-large">
  <div class="container">
    <div class="row gutter-30">
      <div class="col-auto">
        <div id="myaccount-navigation">
          <?php
          do_action( 'woocommerce_account_navigation' );
          ?>
        </div>
      </div>
      <div class="col">
        <?php
        	/**
        	 * My Account content.
        	 *
        	 * @since 2.6.0
        	 */
        	do_action( 'woocommerce_account_content' );
        ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer( $footer ); ?>
