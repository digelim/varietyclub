
<?php
/**
 * Downloads
 *
 * Shows downloads on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/downloads.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $current_user;

get_currentuserinfo();

$resource_download_history = get_user_meta( $current_user->ID, 'resource_download_history', true) ?: array();
$has_downloads = sizeof( $resource_download_history ) > 0;

?>

<?php if ( $has_downloads ) : ?>

<div class="container widt-850">
		<?php foreach ( $resource_download_history as $resource_id => $value ): ?>
			
			<div class="row justify-content-between align-items-center myaccount-downloads-row gutter-40">
				<div class="col">
		      <h3 class="medium"><?php echo get_the_title( $resource_id ); ?></h3>
		    </div>
		    <div class="col-auto">
					<?php

					$resource = get_field('resource', $resource_id );

					if ( $resource ):
						$resource = get_permalink( $resource['ID'] ) . '?attachment_id=' . $resource['ID'] . '&resource_id=' . $resource_id . '&download_file=1';
					endif;
					?>
		      <a href="<?php echo $resource; ?>" class="btn medium primary">DOWNLOAD <i class="icon-download m-l-10"></i></a>
	    </div>
		</div>
	<?php endforeach; ?>
</div>

<?php else : ?>
	<div class="woocommerce-Message woocommerce-Message--info woocommerce-info">
		<?php esc_html_e( 'No downloads available yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>
