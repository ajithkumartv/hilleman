<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' );?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' );?>/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' );?>/css/slick-theme.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' );?>/css/style.css">

    <title><?php echo wp_title(); ?></title>

    <?php if(has_site_icon()): ?>
        <link rel="icon" href="<?php echo get_site_icon_url(); ?>" sizes="16x16">
    <?php endif; ?>
    <?php wp_head(); ?>

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5F77HGW');</script>
<!-- End Google Tag Manager -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5F77HGW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- Header Start -->
    <header class="hl-header">
        <div class="content-wrapper">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <?php 
                    $logo_url = '';
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo_image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    if(!empty($logo_image)):
                        $logo_url   =   $logo_image[0];
                    else:
                        $logo_url   =   get_bloginfo( 'template_directory' ).'/images/hilleman-logo.svg';
                    endif;
                    ?>
                    <img src="<?php echo $logo_url; ?>" alt="<?php echo (!empty(get_option('blogdescription')))?get_option('blogdescription'):'Hilleman Laboratories'; ?>" class="hl-header__logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg class="hl-header__humberger" viewBox="0 0 25 25" fill="none" xmlns="https://www.w3.org/2000/svg">
                        <path d="M23.8948 6L1.00004 6" stroke="white" stroke-width="2" />
                        <path d="M23.8948 13L1.00004 13" stroke="white" stroke-width="2" />
                        <path d="M23.8948 20H1.00004" stroke="white" stroke-width="2" />
                    </svg>
                    <svg class="hl-header__humberger-close" viewBox="0 0 25 25" fill="none" xmlns="https://www.w3.org/2000/svg">
                        <path d="M4.18896 4L20.378 20.189" stroke="white" stroke-width="2" />
                        <path d="M20.189 4L3.99994 20.189" stroke="white" stroke-width="2" />
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <?php 
                    if ( has_nav_menu( 'main-menu' ) ) : 
						wp_nav_menu(
							array(
								'menu'          => 'Main Menu',
								'container'     => '',
								'menu_class'     => 'navbar-nav',
								'theme_location' => 'main-menu',
								'add_li_class'  => 'nav-item',
								'walker'         => new Custom_Walker_Nav_Menu,
							)
						);
						 endif; 
                    ?>
                <li class="nav-item">
				<a href="" title="search" class="nav-link hl-header__search">
					<span class="hl-header__search-txt">Search</span>
					<svg viewBox="0 0 23 23" fill="none" xmlns="https://www.w3.org/2000/svg">
					<path
						d="M8.26522 16.0637C11.7355 16.8944 15.2249 14.7575 16.0591 11.2906C16.8933 7.8238 14.7564 4.3399 11.2861 3.50913C7.81588 2.67836 4.32643 4.81531 3.49223 8.28215C2.65802 11.749 4.79496 15.2329 8.26522 16.0637Z"
						stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" />
					<path d="M14.4773 14.4561L18.9995 19.3278" stroke="white" stroke-width="2"
						stroke-miterlimit="10" stroke-linecap="round" />
				</svg>
				</a>
			</li>

                </div>
            </nav>
        </div>
    </header>
    <!-- Header End -->
