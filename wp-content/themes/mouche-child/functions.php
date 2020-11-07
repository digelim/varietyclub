<?php
// enqueue scripts
function child_scripts() {
  global $wp_query;

  if ( ! is_admin() ) {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/less/style.less' );

    $sticky_kit  = date("ymd-Gis", filemtime( get_stylesheet_directory_uri() . '/js/sticky-kit.js' ));

    wp_enqueue_script( 'sticky-kit', get_stylesheet_directory_uri() . '/js/sticky-kit.js', array(), $sticky_kit );

    $custom  = date("ymd-Gis", filemtime( get_stylesheet_directory_uri() . '/js/custom.js' ));

    wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), $custom );

    wp_localize_script( 'custom', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
  }
}

add_action( 'wp_enqueue_scripts', 'child_scripts', 999 );


function custom_search() {
  $search_query = $_POST['search_query'];
  $paged = $_POST['paged'];
  $post_id = $_POST['post_id'];
  $output = '';

  $args = array(
      'post_type' => array( 'donation' ),
      'post_status' => array(
        'publish'
      ),
      'posts_per_page' => 4,
      'order' => 'DESC',
      'orderby' => 'date',
      's' => $search_query,
      'paged' => $paged,
      'p' => $post_id
  );

  $the_query = new WP_Query( $args );

  // if ($the_query->found_posts % 3 === 0) {
  //   $the_query->set( 'posts_per_page', 3 );
  // }

  $i = 1;
  $j = 1;

  if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {

        $the_query->the_post();

        $branch = rand( 1, 2 );
        $rotate = $i % 4 === 0 || ($j % 3 === 0 && $the_query->found_posts - ((($paged - 1) * 4 )+ $j) === 0) ? 'rotate(180deg)' : 'rotate(0)';

        $show_new_brench = $j % 2 === 0 || $the_query->found_posts - ((($paged - 1) * 4 )+ $j) === 0 ? true : false;

        $vertical_position = 'top:' . rand(10, 50) . 'px';

        $name = explode( ' ', get_the_title() );

        for ($k=1; $k < sizeof( $name ); $k++) {
          $name[$k] = $name[$k][0] . '.';
        }

        $name = implode( ' ', $name );

        $ornament_color = rand(1, 2);

        if ( $ornament_color === 1 ) {
          $id = 'green';
          $stop_1 = "#75c599";
          $stop_2 = "#30a188";
        } else {
          $id = 'red';
          $stop_1 = "#d9513c";
          $stop_2 = "#c8102e";
        }

        $ornaments .=  '<div class="flipper-container"><div class="relative ornament-image-wrapper" style="' . $vertical_position . '; width: 14.5vw; margin-top: -20px">' .
          '<svg class="full-width block ornament-image front" height="232.493" viewBox="0 0 208.813 232.493" width="208.813" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">' .
          '  <linearGradient id="'. $id .'" gradientUnits="objectBoundingBox" x2="1" y1=".5" y2=".5">'.
          '    <stop offset="0" stop-color="' . $stop_1 . '"/>'.
          '    <stop offset="1" stop-color="' . $stop_2 . '"/>'.
          '  </linearGradient>'.
          '  <path d="m205.863 3338.924-11.131-8.3c-4.3-3.209-9.529-6.9-15.576-11.174-17.236-12.182-38.687-27.34-57.2-44.229-23-20.985-35.727-39.568-38.9-56.807-2.105-11.4-2.229-21.884-.365-31.146a51.945 51.945 0 0 1 10.856-23.315c10.174-12.224 25.982-18.956 44.512-18.956a79.517 79.517 0 0 1 36.224 8.889 64.849 64.849 0 0 1 17.7 13.34 57.18 57.18 0 0 1 14.268-10.9 60.513 60.513 0 0 1 28.731-7.16 59.672 59.672 0 0 1 36.969 12.407 46.849 46.849 0 0 1 18.191 35.5c1.241 34.7-21.638 58.789-45.9 85.168-12.07 13.122-25.869 26.533-34.311 43.4z" fill="url(#' . $id . ')" transform="translate(-81.38 -3106.431)"/>'.
          '  <path d="m241.612 3119.708a23.379 23.379 0 0 0 2.4-10.545c0-10.746-6.573-19.163-14.965-19.163s-14.965 8.417-14.965 19.163a23.5 23.5 0 0 0 2.233 10.2 4.942 4.942 0 0 0 -3.693 4.764v25.551a4.917 4.917 0 0 0 8.578 3.293 4.892 4.892 0 0 0 7.3 0 4.892 4.892 0 0 0 7.3 0 4.917 4.917 0 0 0 8.578-3.293v-25.551a4.938 4.938 0 0 0 -2.766-4.419zm-12.562-20.219c2.585 0 5.475 4.137 5.475 9.673s-2.891 9.673-5.475 9.673-5.475-4.137-5.475-9.673 2.89-9.672 5.474-9.672z" fill="#cb9a2c" transform="translate(-120.589 -3090)"/>'.
          '<ellipse cx="108.5" cy="19" fill="#fff" rx="5.5" ry="10"/>' .
          '  <foreignObject width="100%" height="100%">'.
          '   <div class="foreign-object-wrapper">'.
          '     <p style="font-family: Arial Rounded; font-size: 23px; line-height:35px; text-align: center; color: white;" xmlns="http://www.w3.org/1999/xhtml">' . $name . '</p>'.
          '     <p style="font-family: Arial Rounded; font-size: 23px; line-height:35px; text-align: center; color: white;" xmlns="http://www.w3.org/1999/xhtml">'. get_field("city") . '</p>'.
          '   </div>' .
          '  </foreignObject>'.
          '</svg>'.
          '<svg class="full-width block ornament-image back" height="232.493" viewBox="0 0 208.813 232.493" width="208.813" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">' .
          '  <linearGradient id="'. $id .'" gradientUnits="objectBoundingBox" x2="1" y1=".5" y2=".5">'.
          '    <stop offset="0" stop-color="' . $stop_1 . '"/>'.
          '    <stop offset="1" stop-color="' . $stop_2 . '"/>'.
          '  </linearGradient>'.
          '  <path d="m205.863 3338.924-11.131-8.3c-4.3-3.209-9.529-6.9-15.576-11.174-17.236-12.182-38.687-27.34-57.2-44.229-23-20.985-35.727-39.568-38.9-56.807-2.105-11.4-2.229-21.884-.365-31.146a51.945 51.945 0 0 1 10.856-23.315c10.174-12.224 25.982-18.956 44.512-18.956a79.517 79.517 0 0 1 36.224 8.889 64.849 64.849 0 0 1 17.7 13.34 57.18 57.18 0 0 1 14.268-10.9 60.513 60.513 0 0 1 28.731-7.16 59.672 59.672 0 0 1 36.969 12.407 46.849 46.849 0 0 1 18.191 35.5c1.241 34.7-21.638 58.789-45.9 85.168-12.07 13.122-25.869 26.533-34.311 43.4z" fill="url(#' . $id . ')" transform="translate(-81.38 -3106.431)"/>'.
          '  <path d="m241.612 3119.708a23.379 23.379 0 0 0 2.4-10.545c0-10.746-6.573-19.163-14.965-19.163s-14.965 8.417-14.965 19.163a23.5 23.5 0 0 0 2.233 10.2 4.942 4.942 0 0 0 -3.693 4.764v25.551a4.917 4.917 0 0 0 8.578 3.293 4.892 4.892 0 0 0 7.3 0 4.892 4.892 0 0 0 7.3 0 4.917 4.917 0 0 0 8.578-3.293v-25.551a4.938 4.938 0 0 0 -2.766-4.419zm-12.562-20.219c2.585 0 5.475 4.137 5.475 9.673s-2.891 9.673-5.475 9.673-5.475-4.137-5.475-9.673 2.89-9.672 5.474-9.672z" fill="#cb9a2c" transform="translate(-120.589 -3090)"/>'.
          '<ellipse cx="108.5" cy="19" fill="#fff" rx="5.5" ry="10"/>' .
          '  <foreignObject width="100%" height="100%" y="5.5vw" x="1.25vw">'.
          '   <div class="foreign-object-wrapper-2">' .
          '     <p style="font-family: Arial Rounded; font-size: 10px; text-align: center; color: white;" xmlns="http://www.w3.org/1999/xhtml">' . get_field('message') . '</p>'.
          '   </div>' .
          '<div class="row no-gutters align-items-center" id="share-icons">'.
          '  <a href="https://www.facebook.com/sharer/sharer.php" onclick="javascript:window.open(this.href + \'?u=' . home_url() . '?id=' .  get_the_ID() . '\', \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600\');return false;" target="_blank" title="Share on Facebook" class="m-r-10 subtitle">' .
          '    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiBjbGFzcz0iIj48Zz48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xNS45OTcgMy45ODVoMi4xOTF2LTMuODE2Yy0uMzc4LS4wNTItMS42NzgtLjE2OS0zLjE5Mi0uMTY5LTMuMTU5IDAtNS4zMjMgMS45ODctNS4zMjMgNS42Mzl2My4zNjFoLTMuNDg2djQuMjY2aDMuNDg2djEwLjczNGg0LjI3NHYtMTAuNzMzaDMuMzQ1bC41MzEtNC4yNjZoLTMuODc3di0yLjkzOWMuMDAxLTEuMjMzLjMzMy0yLjA3NyAyLjA1MS0yLjA3N3oiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD48L2c+PC9zdmc+" />' .
          '  </a>' .
          '  <a href="https://twitter.com/intent/tweet?text=' . home_url() .'?id='. get_the_ID() .'" target="_blank" class="m-r-10 subtitle">'.
          '    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTUxMiw5Ny4yNDhjLTE5LjA0LDguMzUyLTM5LjMyOCwxMy44ODgtNjAuNDgsMTYuNTc2YzIxLjc2LTEyLjk5MiwzOC4zNjgtMzMuNDA4LDQ2LjE3Ni01OC4wMTYgICAgYy0yMC4yODgsMTIuMDk2LTQyLjY4OCwyMC42NC02Ni41NiwyNS40MDhDNDExLjg3Miw2MC43MDQsMzg0LjQxNiw0OCwzNTQuNDY0LDQ4Yy01OC4xMTIsMC0xMDQuODk2LDQ3LjE2OC0xMDQuODk2LDEwNC45OTIgICAgYzAsOC4zMiwwLjcwNCwxNi4zMiwyLjQzMiwyMy45MzZjLTg3LjI2NC00LjI1Ni0xNjQuNDgtNDYuMDgtMjE2LjM1Mi0xMDkuNzkyYy05LjA1NiwxNS43MTItMTQuMzY4LDMzLjY5Ni0xNC4zNjgsNTMuMDU2ICAgIGMwLDM2LjM1MiwxOC43Miw2OC41NzYsNDYuNjI0LDg3LjIzMmMtMTYuODY0LTAuMzItMzMuNDA4LTUuMjE2LTQ3LjQyNC0xMi45MjhjMCwwLjMyLDAsMC43MzYsMCwxLjE1MiAgICBjMCw1MS4wMDgsMzYuMzg0LDkzLjM3Niw4NC4wOTYsMTAzLjEzNmMtOC41NDQsMi4zMzYtMTcuODU2LDMuNDU2LTI3LjUyLDMuNDU2Yy02LjcyLDAtMTMuNTA0LTAuMzg0LTE5Ljg3Mi0xLjc5MiAgICBjMTMuNiw0MS41NjgsNTIuMTkyLDcyLjEyOCw5OC4wOCw3My4xMmMtMzUuNzEyLDI3LjkzNi04MS4wNTYsNDQuNzY4LTEzMC4xNDQsNDQuNzY4Yy04LjYwOCwwLTE2Ljg2NC0wLjM4NC0yNS4xMi0xLjQ0ICAgIEM0Ni40OTYsNDQ2Ljg4LDEwMS42LDQ2NCwxNjEuMDI0LDQ2NGMxOTMuMTUyLDAsMjk4Ljc1Mi0xNjAsMjk4Ljc1Mi0yOTguNjg4YzAtNC42NC0wLjE2LTkuMTItMC4zODQtMTMuNTY4ICAgIEM0ODAuMjI0LDEzNi45Niw0OTcuNzI4LDExOC40OTYsNTEyLDk3LjI0OHoiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+" />' .
          '  </a>' .
          '  <a href="https://www.linkedin.com/shareArticle?mini=true&url=' . home_url() . '?id=' . get_the_ID()  . '&title=A+Special+Ornament&summary=&source=" target="_blank" class="subtitle">' .
          '    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0yMy45OTQgMjR2LS4wMDFoLjAwNnYtOC44MDJjMC00LjMwNi0uOTI3LTcuNjIzLTUuOTYxLTcuNjIzLTIuNDIgMC00LjA0NCAxLjMyOC00LjcwNyAyLjU4N2gtLjA3di0yLjE4NWgtNC43NzN2MTYuMDIzaDQuOTd2LTcuOTM0YzAtMi4wODkuMzk2LTQuMTA5IDIuOTgzLTQuMTA5IDIuNTQ5IDAgMi41ODcgMi4zODQgMi41ODcgNC4yNDN2Ny44MDF6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtLjM5NiA3Ljk3N2g0Ljk3NnYxNi4wMjNoLTQuOTc2eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTIuODgyIDBjLTEuNTkxIDAtMi44ODIgMS4yOTEtMi44ODIgMi44ODJzMS4yOTEgMi45MDkgMi44ODIgMi45MDkgMi44ODItMS4zMTggMi44ODItMi45MDljLS4wMDEtMS41OTEtMS4yOTItMi44ODItMi44ODItMi44ODJ6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg==" />' .
          ' </a>'.
          '</div>'.
          '  </foreignObject>'.
          '</svg>'.
        '</div></div>';

        if ( $show_new_brench ) {

          $output .= '<div class="col-md-6 m-b-50 mob-md-m-b-80">' .
            '<img class="block full-width" style="position: relative; z-index: 3; transform: ' . $rotate . '" src="' . get_bloginfo('stylesheet_directory') . '/images/branches-'. $branch . '-desktop.png" alt="Image">' .
            '<div class="row justify-content-around" style="width: 90%">' . $ornaments .
            '</div>' .
          '</div>';

          $ornaments = '';
        }

        $j++;
        $i++;
    }
  }

  echo $output;


  wp_reset_postdata();

  die();
}

add_action( 'wp_ajax_custom_search', 'custom_search' );
add_action( 'wp_ajax_nopriv_custom_search', 'custom_search' );
