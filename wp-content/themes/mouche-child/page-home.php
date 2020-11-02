<?php
/**
* Template Name: Home
*/

get_header();

?>

<section id="header">
  <img class="block m-t-95 full-width mob-md-m-t-70" src="<?php echo bloginfo('stylesheet_directory'); ?>/images/header.png" alt="Image">
</section>

<section>
  <div class="container width-950 align-center p-t-70 p-b-80 mob-md-p-t-50 mob-md-p-b-50">
    <h1 class="font-32 l-h-48 m-b-50 regular mob-md-font-24 mob-md-l-h-36">Thank you for supporting Variety’s Tree of Hearts and for giving kids the gift of childhood this holiday season.</h1>
    <p style="font-family: 'Arial';" class="m-b-50 font-18 l-h-27 mob-md-font-14 mob-md-l-h-21">Please note that our team is working very hard to process donations and update our digital tree regularly. We are updating the digital tree daily at 5 pm. </p>
    <div class="search-bar-wrapper">
      <div class="input-icon-right width-350 margin-auto">
        <input class="full-width search" type="text" name="search" placeholder="Search ornaments by phone number">
        <svg class="search-trigger" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
          <path d="m14.928 16-4.4-4.4a6.437 6.437 0 0 1 -4.028 1.4 6.5 6.5 0 1 1 6.5-6.5 6.436 6.436 0 0 1 -1.4 4.029l4.4 4.4-1.071 1.071zm-8.413-14.484a5 5 0 1 0 5 5 5.005 5.005 0 0 0 -5-5z" fill="#707070"/>
        </svg>
      </div>
      <div class="input-icon-right margin-auto hide mob-md-show" id="search-mobile">
        <input class="full-width search" type="text" name="search" placeholder="Search ornaments by phone number">
        <svg class="search-trigger" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
          <path d="m14.928 16-4.4-4.4a6.437 6.437 0 0 1 -4.028 1.4 6.5 6.5 0 1 1 6.5-6.5 6.436 6.436 0 0 1 -1.4 4.029l4.4 4.4-1.071 1.071zm-8.413-14.484a5 5 0 1 0 5 5 5.005 5.005 0 0 0 -5-5z" fill="#707070"/>
        </svg>
        <svg id="close-mobile-search" height="15.494" viewBox="0 0 15.494 15.494" width="15.494" xmlns="http://www.w3.org/2000/svg"><g fill="none" stroke="#304659"><path d="m.354 15.141 14.787-14.787"/><path d="m15.141 15.141-14.787-14.787"/></g></svg>
      </div>
    </div>
  </div>
</section>

<section class="relative p-b-100 mob-md-p-b-50 ornaments-section">

  <div class="row justify-content-between" id="results"></div>

</section>

<?php get_footer(); ?>
