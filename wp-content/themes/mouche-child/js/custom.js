$ = jQuery;

function search(isSearching, paged) {
    var existingString = $('input[name="search"]').val();

    if (isSearching === false) {
      return;
    }

    isSearching = false;

    var data = {
      action: 'custom_search',
      search_query: existingString,
      paged: paged
    };

    $.post(MyAjax.ajaxurl, data, function(res) {
      $('#results').append(res);
    });
}

$(document).ready(function(){
  window.paged = 2;
  search(true, 1);

  $('input[name="search"]').on('keypress', function(e) {
    if (e.keyCode == 13) {
      window.scrollTo(0,0);
      $('#results').html('');
      search(true, 1);
      window.paged = 2;
    }
  });

  $(window).on('scroll', function() {
    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
      search(true, window.paged);
      window.paged = window.paged + 1;
    }
  });

  $('body').on('click', '.ornament-image-wrapper',function() {
    $(this).parent().toggleClass('hover');
  });

  $('#search-trigger').on('click', function() {
    $('#results').html('');
    window.scrollTo(0,0);
    search(true, 1);
    window.paged = 2;
  });

  $(window).on('scroll', function() {
    if ($(window).width() > 480) {
      var $searchBar = $('.input-icon-right');
      var $searchBarWrapper = $('.search-bar-wrapper');

      if ($searchBarWrapper.offset().top <= $(window).scrollTop() + 32) {
        $searchBar.addClass('sticky');
      } else {
        $searchBar.removeClass('sticky');
      }
    }
  });
});
