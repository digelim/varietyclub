<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

<?php

$navigation = get_field('navigation', 'options') ?: null;

get_header( $navigation );

?>

<section class="header-top-padding-normal header-bottom-padding-normal bg-secondary">
  <div class="container width-950 align-center p-t-50 p-b-50">
    <h1 class="large m-b-25">My Account</h1>
    <a href="#" onclick="history.back();">
      <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/arrow-primary.svg" alt="Go back">
    </a>
  </div>
</section>

<section class="block-top-padding-large block-bottom-padding-large">
	<div class="container">
    <h2 class="medium align-center m-b-30">Reset your password</h2>
    <form method="post" class="woocommerce-ResetPassword lost_reset_password width-300 margin-auto">
      <p class="m-b-50 align-center"><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>
      <label for="user_login" class="block m-b-10">
        <input class="border-radius-small woocommerce-Input woocommerce-Input--text input-text m-t-10 full-width" type="text" name="user_login" id="user_login" autocomplete="username" placeholder="Username or email" />
      </label>

      <?php do_action( 'woocommerce_lostpassword_form' ); ?>

    	<input type="hidden" name="wc_reset_password" value="true" />
    	<button type="submit" class="justify-content-center woocommerce-Button button btn primary full-width large m-t-15" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>

    	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

    </form>
  </div>
</section>
<?php
do_action( 'woocommerce_after_lost_password_form' );

$footer = get_field('footer', 'options') ?: null;

get_footer( $footer );

?>
