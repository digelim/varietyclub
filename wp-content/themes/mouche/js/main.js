jQuery(document).ready(function($) {
  // mobile menu
  $('.open-mobile-menu').on('click', function(e) {
    e.preventDefault();
    $('.mobile-menu').fadeIn();
  });

  $('.mobile-menu a').on('click', function() {
    $('.mobile-menu').fadeOut();
  });

  $('.close-mobile-menu').on('click', function(e) {
    e.preventDefault();
    $('.mobile-menu').fadeOut();
  });

  $('footer .menu-item-has-children, .mobile-menu .menu-item-has-children').on('click', function(e) {
    if ($(window).width() < 991) {
      e.preventDefault();
      $(this).find('.sub-menu').slideToggle().parent().toggleClass('active');
    }
  });

  // tabs
  $('.tab').on('click', function(event) {
    event.preventDefault();

    var $currentTab = $(this);
    var id = $currentTab.attr('data-id');
    // var $select = $('select[name="home-page-tabs"]');
    // $select.val(id).trigger('change');

    $('.tab').removeClass('active');
    $currentTab.addClass('active');

    $currentTab.parent().parent().parent().find('.tab-content').hide();
    $('#' + id).fadeIn(500);

  });

  // sub menu
  $('.main-menu .menu-item-has-children a[href^="#"]').on('click', function(event) {
    event.preventDefault();
  });

  $('#menu-footer .menu-item-has-children a[href^="#"]').on('click', function(event) {
    event.preventDefault();
  });

  // Dropdown inputs
  $('select').select2({
    minimumResultsForSearch: -1
  });

  // Accordions
  $accordions = $('.accordion-item');
  $accordions.on('click', function() {
	$('.accordion-item').removeClass('active');
    $(this).toggleClass('active');
  });

});

jQuery(window).load(function() {
  // Loader
  jQuery('#loader').hide();

  // Animations
  AOS.init({
    duration: 800,
  });
});
