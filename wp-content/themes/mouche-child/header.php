<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo bloginfo('stylesheet_directory'); ?>/images/favicon-variety.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php

	$navigation_theme = get_field('navigation_theme', 'options');

	if ( $navigation_theme == 'dark' ) {
		$logo = get_field('white_logo', 'options');
	} else {
		$logo = get_field('black_logo', 'options');
	}

	$sticky_logo = get_field('sticky_menu_logo', 'options');

	?>

	<nav class="navigation_4 full-width">
		<div class="container width-1200">
			<div class="main-menu row justify-content-between align-items-center">
				<div class="col-auto logo-column">
					<a class="logo" href="<?php echo home_url(); ?>">
						<?php if ( $logo ): ?>
							<img src="<?php echo $logo; ?>" alt="Logo" class="inline-block">
						<?php
							else:
								?>

								<h2 class="font-24 l-h-28 color-tertiary">LOGO</h2>

								<?php
							endif;
						?>
					</a>
				</div>
				<div class="col menu-wrapper row align-items-center justify-content-end">

					<?php
						wp_nav_menu(array(
							'theme_location' => 'Primary',
							'menu' => 'menu-1',
							'menu_class' => 'navigation-list',
						));
					?>

					<div class="col-auto navigation-extra-elements row justify-content-end">

					<?php
						if( have_rows('extra_navigation_elements', 'options') ):

						?>

						<div class="relative">

							<?php

							while ( have_rows('extra_navigation_elements', 'options') ) : the_row();
								$item = get_sub_field('item');

                switch ( $item ) {
                  case 'social_icons':
                    if ( have_rows( 'social_networks', 'options' ) ):
              				while ( have_rows( 'social_networks', 'options' ) ) {
              					the_row();

              					$name = get_sub_field('name');
              					$url = get_sub_field('url');
              					$icon = 'icon-' . $name;

              					?>

              					<div class="col-auto">
              						<a href="<?php echo $url; ?>">
            								<i class="<?php echo $icon; ?>"></i>
              						</a>
              					</div>

              					<?php
              				}
              			endif;
                  case 'button':
                    $url = get_sub_field('url') ?: '#';
                    $label = get_sub_field('label');
                    $target = get_sub_field('target');
                    $color = get_sub_field('color');
                    $round = get_field( 'round', 'options' );
                    $size = get_sub_field('size');
                    ?>

                    <a href="<?php echo $url; ?>" class="btn <?php echo $color; ?> <?php echo $size; ?> <?php echo $round; ?> " target="<?php echo $target; ?>">
                      <?php echo $label; ?>
                    </a>
                  <?php
                  case 'custom_icon':
                    $url = get_sub_field('icon_url');
                    $icon_class = get_sub_field('icon_class');
                    $item_class = get_sub_field('item_class');
                    ?>

                    <a href="<?php echo $url; ?>" class="<?php echo $item_class; ?>">
                      <i class="<?php echo $icon_class; ?>"></i>
                    </a>

                    <?php
                  default:
                    break;
                }
							endwhile;

							?>

						</div>

					<?php

					endif;

					?>

				  </div>
				</div>
				<a href="#" class="m-l-10" id="mobile-open-search">
					<svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m0 0h20v20h-20z" fill="none"/><circle cx="8.5" cy="8.5" fill="none" r="5.5"/><path d="m14.928 16-4.4-4.4a6.433 6.433 0 0 1 -4.028 1.4 6.5 6.5 0 1 1 6.5-6.5 6.432 6.432 0 0 1 -1.4 4.029l4.4 4.4-1.071 1.071zm-8.413-14.484a5 5 0 1 0 5 5 5.005 5.005 0 0 0 -5-5z" fill="#304659" transform="translate(2 2)"/></svg>
				</a>
			</div>
		</div>
	</nav>
	<div class="mobile-menu">
		<div id="mb-menu" class="container-fluid p-l-50 p-r-50 mob-md-p-l-15 mob-md-p-r-15 fixed bg-white">
			<div class="main-menu row no-gutters justify-content-center align-items-center">
				<div class="col logo-column">
					<a class="logo" href="<?php echo home_url(); ?>">
						<?php if ( $logo ): ?>
							<img src="<?php echo $logo; ?>" alt="Logo" class="inline-block">
						<?php
							else:
								?>

									<h2 class="font-24 l-h-28 color-tertiary">B2B Software Advisors</h2>

								<?php
							endif;
						?>
					</a>
				</div>
				<a href="#" class="close-mobile-menu">
					<svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m11.3846344 10 8.6153656 8.6153656-1.3846344 1.3846344-8.6153656-8.6153656-8.6153656 8.6153656-1.3846344-1.3846344 8.6153656-8.6153656-8.6153656-8.6153656 1.3846344-1.3846344 8.6153656 8.6153656 8.6153656-8.6153656 1.3846344 1.3846344z" fill="#222" fill-rule="evenodd"/></svg>
				</a>
			</div>
		</div>
		<div class="container-fluid">
			<div class="menu-wrapper">
				<?php
					wp_nav_menu(array(
						'theme_location' => 'Primary',
						'menu' => 'menu-1',
						'menu_class' => 'navigation-list',
					));
				?>
			</div>
			<?php
				if( have_rows('extra_navigation_elements', 'options') ):

				?>

				<div class="align-center">

					<?php

					while ( have_rows('extra_navigation_elements', 'options') ) : the_row();
						$item = get_sub_field('item');

						switch ( $item ) {
							case 'social_icons':
								if ( have_rows( 'social_networks', 'options' ) ):
									while ( have_rows( 'social_networks', 'options' ) ) {
										the_row();

										$name = get_sub_field('name');
										$url = get_sub_field('url');
										$icon = 'icon-' . $name;

										?>

										<div class="col-auto">
											<a href="<?php echo $url; ?>">
												<i class="<?php echo $icon; ?>"></i>
											</a>
										</div>

										<?php
									}
								endif;
							case 'button':
								$url = get_sub_field('url') ?: '#';
								$label = get_sub_field('label');
								$target = get_sub_field('target');
								$color = get_sub_field('color');
								$round = get_field( 'round', 'options' );
								$size = get_sub_field('size');
								?>

								<a href="<?php echo $url; ?>" class="btn <?php echo $color; ?> <?php echo $size; ?> <?php echo $round; ?> " target="<?php echo $target; ?>">
									<?php echo $label; ?>
								</a>
							<?php
							case 'custom_icon':
								$url = get_sub_field('icon_url');
								$icon_class = get_sub_field('icon_class');
								$item_class = get_sub_field('item_class');
								?>

								<a href="<?php echo $url; ?>" class="<?php echo $item_class; ?>">
									<i class="<?php echo $icon_class; ?>"></i>
								</a>

								<?php
							default:
								break;
						}
					endwhile;

					?>

				</div>

			<?php

			endif;

			?>
		</div>
	</div>
