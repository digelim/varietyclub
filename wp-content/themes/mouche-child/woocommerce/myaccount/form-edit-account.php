<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

session_start();

do_action( 'woocommerce_before_edit_account_form' ); ?>


<?php

global $current_user;

get_currentuserinfo();

if ( $current_user ) {
  $user_meta = get_user_meta( $current_user->ID );
}

?>


<?php if ( $_SESSION['update_account'] ) {
  wc_print_notice( $_SESSION['update_account'], $notice_type = 'success');
  unset( $_SESSION['update_account'] );
} ?>
<section class="block-bottom-padding-large">
  <div class="container-fluid p-l-25 p-r-25">
    <h2 class="medium p-b-15 border-bottom m-b-25 color-tertiary">Profile</h2>
    <div class="row justify-content-between width-800 gutter-15 align-items-center">
      <div class="col-auto">
        <div class="row gutter-15 align-items-center">
          <div class="col-auto">
            <img class="square-80 image-circle" src="<?php echo get_avatar_url( $user->ID ); ?>" alt="Profile picture">
          </div>
          <div class="col">
            <div class="p-l-5">
              <p class="caps color-primary m-b-10 type-bold font-12">NAME</p>
              <p class="color-tertiary"><?php echo esc_attr( $user->first_name ) . ' ' . esc_attr( $user->last_name ); ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-22">
        <p class="caps color-primary m-b-10 type-bold font-12">Company</p>
        <p class="color-tertiary"><?php echo $user_meta['afreg_additional_120'][0]; ?></p>
      </div>
      <div class="col-auto align-right">
        <a href="#" id="profile" class="btn small primary aling-items-center open-account-edit-popup">change <i class="icon-arrow_right_alt m-l-5"></i></a>
      </div>
    </div>
  </div>
</section>

<section class="block-bottom-padding-large">
  <div class="container-fluid p-l-25 p-r-25">
    <h2 class="medium p-b-15 border-bottom m-b-35 color-tertiary">Account Information</h2>
    <div class="row justify-content-between width-800 gutter-15 align-items-center m-b-20">
      <div class="col color-tertiary">
        Job Title
      </div>
      <div class="col color-tertiary">
        <?php echo $user_meta['afreg_additional_119'][0]; ?>
      </div>
      <div class="col align-right row align-items-center justify-content-end">
        <p class="font-12 caps p-r-30 type-bold" style="visibility: hidden;">REMOVE</p>
        <a href="#" id="job-title" class="btn small primary aling-items-center open-account-edit-popup">change <i class="icon-arrow_right_alt m-l-5"></i></a>
      </div>
    </div>
    <div class="row justify-content-between width-800 gutter-15 align-items-center m-b-20">
      <div class="col color-tertiary">
        Email
      </div>
      <div class="col color-tertiary">
        <?php echo esc_attr( $user->user_email ); ?>
      </div>
      <div class="col align-right row align-items-center justify-content-end">
        <p class="font-12 caps p-r-30 type-bold" style="visibility: hidden;">REMOVE</p>
        <a href="#" id="email" class="btn small primary aling-items-center open-account-edit-popup">change <i class="icon-arrow_right_alt m-l-5"></i></a>
      </div>
    </div>
    <div class="row justify-content-between width-800 gutter-15 align-items-center m-b-20">
      <div class="col color-tertiary">
        No. of Employees
      </div>
      <div class="col color-tertiary">
        <?php echo $user_meta['afreg_additional_122'][0]; ?>
      </div>
      <div class="col align-right row align-items-center justify-content-end">
        <a href="#" data-clear="employees" class="font-12 caps p-r-30 type-bold block color-tertiary">REMOVE</a>
        <a href="#" id="employees" class="btn small primary aling-items-center open-account-edit-popup">change <i class="icon-arrow_right_alt m-l-5"></i></a>
      </div>
    </div>
    <div class="row justify-content-between width-800 gutter-15 align-items-center m-b-20">
      <div class="col color-tertiary">
        Company Headquarters
      </div>
      <div class="col color-tertiary">
        <?php echo $user_meta['afreg_additional_125'][0]; ?>
      </div>
      <div class="col align-right row align-items-center justify-content-end">
        <a href="#" data-clear="company-headquarters" class="font-12 caps p-r-30 type-bold block color-tertiary">REMOVE</a>
        <a href="#" id="company-headquarters" class="btn small primary aling-items-center open-account-edit-popup">change <i class="icon-arrow_right_alt m-l-5"></i></a>
      </div>
    </div>
    <div class="row justify-content-between width-800 gutter-15 align-items-center m-b-20">
      <div class="col color-tertiary">
        Job Type
      </div>
      <div class="col color-tertiary">
        <?php echo $user_meta['afreg_additional_123'][0]; ?>
      </div>
      <div class="col align-right row align-items-center justify-content-end">
        <p class="font-12 caps p-r-30 type-bold" style="visibility: hidden;">REMOVE</p>
        <a href="#" id="job-type" class="btn small primary aling-items-center open-account-edit-popup">change <i class="icon-arrow_right_alt m-l-5"></i></a>
      </div>
    </div>
    <div class="row justify-content-between width-800 gutter-15 align-items-center">
      <div class="col color-tertiary">
        Interests
      </div>
      <div class="col color-tertiary">
        <?php echo str_replace( ',', '<br>', $user_meta['afreg_additional_126'][0] ); ?>
      </div>
      <div class="col align-right row align-items-center justify-content-end">
        <a href="#" data-clear="interests" class="font-12 caps p-r-30 type-bold block color-tertiary">REMOVE</a>
        <a href="#" id="interests" class="btn small primary aling-items-center open-account-edit-popup">change <i class="icon-arrow_right_alt m-l-5"></i></a>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container-fluid p-l-25 p-r-0">
    <h2 class="medium p-b-15 border-bottom m-b-30 color-tertiary">Password</h2>
    <div class="row justify-content-between gutter-30">
      <div class="col color-tertiary">
        To change your password, you’ll need to verify the current one first. Then create your new password.
      </div>
      <div class="col-auto">
        <a href="#" id="password" class="btn small primary aling-items-center open-account-edit-popup">change <i class="icon-arrow_right_alt m-l-5"></i></a>
      </div>
    </div>
  </div>
</section>

<div class="account-edit-overlay row justify-content-center align-items-center ">
  <form action="<?php echo home_url('/wp-admin/admin-post.php'); ?>" method="post" class="change-account-details" enctype="multipart/form-data">
    <input type="hidden" name="action" value="update_account">
    <div class="container-fluid">
      <div class="account-edit-popup relative p-t-30 p-b-30 p-l-35 p-r-35 bg-white width-400 margin-auto m-t-60 m-b-60">
        <div data-edit="profile" >
          <p class="font-20 type-bold m-b-30 color-tertiary">Edit profile</p>
          <div class="row justify-content-between align-items-center gutter-35 m-b-30">
            <div class="col-auto">
              <img id="profile-picture" class="image-circle square-90" src="<?php echo get_avatar_url( $user->ID ); ?>" alt="Profile picture">
            </div>
            <div class="col-auto">
              <label for="profile-picture-url" class="btn small primary justify-content-center">
                UPLOAD PICTURE
                <i class="m-l-5 icon-arrow_right_alt"></i>
              </label>
              <input type="file" id="profile-picture-url" name="profile_picture_file" class="btn small primary">
            </div>
          </div>
          <label class="block">
            <div class="caps type-bold font-14">First name</div>
            <input class="no-radius full-width" type="text" name="first_name" value="<?php echo esc_attr( $user->first_name ); ?>" placeholder="First Name">
          </label>
          <label class="m-t-15 block">
            <div class="caps type-bold font-14">Last name</div>
            <input class="no-radius full-width" type="text" name="last_name" value="<?php echo esc_attr( $user->last_name ); ?>" placeholder="Last Name">
          </label>
          <label class="m-t-15 block">
            <div class="caps type-bold font-14">Company</div>
            <input class="no-radius full-width" type="text" name="afreg_additional_120" value="<?php echo esc_attr( $user_meta['afreg_additional_120'][0] ); ?>" placeholder="Company">
          </label>
        </div>
        <div data-edit="job-title" >
          <p class="font-20 type-bold m-b-30 color-tertiary">Edit Job Title</p>
          <label class="block">
            <div class="caps type-bold font-14">Job Title</div>
            <input class="no-radius full-width" type="text" name="afreg_additional_119" value="<?php echo esc_attr( $user_meta['afreg_additional_119'][0] ); ?>" placeholder="Job Title">
          </label>
        </div>
        <div data-edit="email" >
          <p class="font-20 type-bold m-b-30 color-tertiary">Edit Email Address</p>
          <label class="block">
            <div class="caps type-bold font-14">Email</div>
            <input class="no-radius full-width" type="email" name="email" value="<?php echo esc_attr( $user->user_email ); ?>" placeholder="Email Address">
          </label>
        </div>
        <div data-edit="employees" >
          <p class="font-20 type-bold m-b-30 color-tertiary">Edit Number of Employees</p>
          <label class="block">
            <div class="caps type-bold font-14">Number of Employees</div>
            <input class="no-radius full-width" type="number" name="afreg_additional_122" value="<?php echo esc_attr( $user_meta['afreg_additional_122'][0] ); ?>" placeholder="No. of Employees">
          </label>
        </div>
        <div data-edit="company-headquarters">
          <p class="font-20 type-bold m-b-30 color-tertiary">Edit Company Headquarters</p>
          <label class="block">
            <div class="caps type-bold font-14">Company Headquarters</div>
            <input class="no-radius full-width" type="text" name="afreg_additional_125" value="<?php echo esc_attr( $user_meta['afreg_additional_125'][0] ); ?>" placeholder="Company Headquarters">
          </label>
        </div>
        <div data-edit="job-type" >
          <p class="font-20 type-bold m-b-30 color-tertiary">Edit Job Type</p>
          <label class="block">
            <div class="caps type-bold font-14">Job Type</div>
            <select class="full-width" name="afreg_additional_123">
              <option value="">Select an option...</option>
              <option <?php if (esc_attr( $user_meta['afreg_additional_123'][0] ) == 'HR or L&D') echo ' selected '; ?> value="HR or L&D">HR or L&D</option>
              <option <?php if (esc_attr( $user_meta['afreg_additional_123'][0] ) == 'Business') echo ' selected '; ?> value="Business">Business</option>
              <option <?php if (esc_attr( $user_meta['afreg_additional_123'][0] ) == 'Vendor') echo ' selected '; ?> value="Vendor">Vendor</option>
              <option <?php if (esc_attr( $user_meta['afreg_additional_123'][0] ) == 'Consultant') echo ' selected '; ?> value="Consultant">Consultant</option>
              <option <?php if (esc_attr( $user_meta['afreg_additional_123'][0] ) == 'Recruiting') echo ' selected '; ?> value="Recruiting">Recruiting</option>
              <option <?php if (esc_attr( $user_meta['afreg_additional_123'][0] ) == 'Other') echo ' selected '; ?> value="Other">Other</option>
            </select>
          </label>
        </div>
        <div data-edit="interests">
          <p class="font-20 type-bold m-b-30 color-tertiary">Edit Interests</p>
          <p class="form-row afreg_full_field form-row-wide newr" id="afreg_additionalshowhide_126">
            <label for="afreg_additional_126">
              Interests (Check all that apply):
              <span class="required"></span>
            </label>
            <input <?php echo is_interest_checked( 'Articles and Newsletter', $user_meta['afreg_additional_126'][0] ); ?> type="checkbox" class="input-checkbox" name="afreg_additional_126[]" value="Articles and Newsletter">
            <span class="afreg_radios">
            Articles and Newsletter</span>
            <input <?php echo is_interest_checked( 'Consulting, Phone Call', $user_meta['afreg_additional_126'][0] ); ?> type="checkbox" class="input-checkbox" name="afreg_additional_126[]" value="Consulting, Phone Call">
            <span class="afreg_radios">
            Consulting, Phone Call</span>
            <input <?php echo is_interest_checked( 'Invitation to Events', $user_meta['afreg_additional_126'][0] ); ?> type="checkbox" class="input-checkbox" name="afreg_additional_126[]" value="Invitation to Events">
            <span class="afreg_radios">
            Invitation to Events</span>
            <input <?php echo is_interest_checked( 'Josh Bersin Academy', $user_meta['afreg_additional_126'][0] ); ?> type="checkbox" class="input-checkbox" name="afreg_additional_126[]" value="Josh Bersin Academy">
            <span class="afreg_radios">Josh Bersin Academy</span>
    			</p>
        </div>
        <div data-edit="password">
          <p class="font-20 type-bold m-b-30 color-tertiary">Change Password</p>
          <label class="block m-b-20">
            <div class="caps type-bold font-14">Current password</div>
            <input class="no-radius full-width" type="password" name="current-password" placeholder="Current password">
          </label>
          <label class="block m-b-20">
            <div class="caps type-bold font-14">New password</div>
            <input class="no-radius full-width" type="password" name="password" placeholder="New password">
          </label>
          <label class="block">
            <div class="caps type-bold font-14">Confirm password</div>
            <input class="no-radius full-width" type="password" name="confirm-password" placeholder="Confirm password">
          </label>
        </div>
        <svg class="close-account-edit" id="close-account-edit-icon" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="m10 8.59823895 6.3079247-6.30792473c.3870857-.38708563 1.0146755-.38708563 1.4017611 0 .3870856.38708562.3870856 1.01467542 0 1.40176105l-6.3079247 6.30792473 6.3079247 6.3079247c.3870856.3870857.3870856 1.0146755 0 1.4017611s-1.0146754.3870856-1.4017611 0l-6.3079247-6.3079247-6.30792473 6.3079247c-.38708563.3870856-1.01467543.3870856-1.40176105 0-.38708563-.3870856-.38708563-1.0146754 0-1.4017611l6.30792473-6.3079247-6.30792473-6.30792473c-.38708563-.38708563-.38708563-1.01467543 0-1.40176105.38708562-.38708563 1.01467542-.38708563 1.40176105 0z" fill="#bcbfc2" fill-rule="evenodd" transform="translate(-2 -2)"/></svg>
        <div class="row justify-content-end align-items-center m-t-30">
          <a href="#" class="close-account-edit p-r-15 type-bold font-14 color-tertiary">CANCEL</a>
          <button type="submit" class="btn width-100 primary justify-content-center small" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save', 'woocommerce' ); ?> <i class="icon-arrow_right_alt m-l-5"></i></button>
        </div>
      </div>
    </div>
  </form>
</div>
