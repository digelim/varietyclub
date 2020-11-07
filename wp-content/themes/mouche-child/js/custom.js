$ = jQuery;

var $_GET = {};

if(document.location.toString().indexOf('?') !== -1) {
    var query = document.location
                   .toString()
                   // get the query string
                   .replace(/^.*?\?/, '')
                   // and remove any existing hash string (thanks, @vrijdenker)
                   .replace(/#.*$/, '')
                   .split('&');

    for(var i=0, l=query.length; i<l; i++) {
       var aux = decodeURIComponent(query[i]).split('=');
       $_GET[aux[0]] = aux[1];
    }
}

function search(isSearching, paged) {
    $('#search-mobile').removeClass('active');

    var existingString = $('input.search').val();

    if (isSearching === false) {
      return;
    }

    isSearching = false;

    var data = {
      action: 'custom_search',
      search_query: existingString || $_GET['s'],
      post_id: $_GET['id'] || null,
      paged: paged
    };

    $.post(MyAjax.ajaxurl, data, function(res) {
      $('#results').append(res);
    });
}

$(document).ready(function(){
  window.paged = 2;
  search(true, 1);

  $('input.search').on('keyup', function(e) {
    $('input.search').val($(this).val());

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
    $('.flipper-container').removeClass('hover');
    $(this).parent().addClass('hover');
  });

  $('.search-trigger').on('click', function() {
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

  $('#mobile-open-search').on('click', function(e) {
    e.preventDefault();

    $('#search-mobile').addClass('active');
  });

  $('#close-mobile-search').on('click', function(e) {
      e.preventDefault();

      $('#search-mobile').removeClass('active');
  })
});
