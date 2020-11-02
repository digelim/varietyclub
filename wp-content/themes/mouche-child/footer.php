<?php wp_footer(); ?>

<?php

$footer_theme = get_field('footer_theme', 'options');

if ( $footer_theme == 'dark' ) {
  $logo = get_field('white_logo', 'options');
} else {
  $logo = get_field('black_logo', 'options');
}

?>

<footer class="footer_7">
  <div class="container-fluid margin-auto align-center p-t-15 p-b-15 font-16 l-h-24 mob-md-font-14 <?php echo $footer_theme === 'dark' ? 'text-white' : ''; ?>">
    © <?php echo Date('Y'); ?> Copyright. All Rights Reserved.
  </div>
</footer>
</body>
</html>
