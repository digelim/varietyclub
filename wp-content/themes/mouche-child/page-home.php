<?php
/**
* Template Name: Home
*/

get_header();

?>

<section id="header">
  <img class="block m-t-95 full-width mob-md-m-t-80" src="<?php echo bloginfo('stylesheet_directory'); ?>/images/header.png" alt="Image">
</section>

<section>
  <div class="container width-1150 align-center p-t-70 p-b-130 mob-md-p-t-50 mob-md-p-b-50">
    <h1 class="font-32 l-h-48 m-b-50 regular">Thank you for supporting Variety's Tree of Hearts campaign. <br>You make it possible for BC's special needs kids to fulfill their unique potential.</h1>
    <div class="search-bar-wrapper">
      <div class="input-icon-right width-350 margin-auto">
        <input class="full-width" type="text" name="search" placeholder="Search ornaments by phone number">
        <svg id="search-trigger" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
          <path d="m14.928 16-4.4-4.4a6.437 6.437 0 0 1 -4.028 1.4 6.5 6.5 0 1 1 6.5-6.5 6.436 6.436 0 0 1 -1.4 4.029l4.4 4.4-1.071 1.071zm-8.413-14.484a5 5 0 1 0 5 5 5.005 5.005 0 0 0 -5-5z" fill="#707070"/>
        </svg>
      </div>
    </div>
  </div>
</section>

<section class="relative p-b-100 ornaments-section">

  <div class="row justify-content-between" id="results"></div>

</section>

<?php get_footer(); ?>
