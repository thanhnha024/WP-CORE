<?php


// Option links
function flatsome_admin_bar_helper(){


global $wp_admin_bar;

$panel_url = get_admin_url().'admin.php?page=flatsome-panel';
$advanced_url = get_admin_url().'admin.php?page=optionsframework&tab=';
$permalink = get_permalink();
if(is_admin()) $permalink = get_home_url();

if(function_exists('is_shop') && is_shop()) {
  $permalink = get_permalink( wc_get_page_id( 'shop' ) );
}

$optionUrl_panel = get_admin_url().'customize.php?url='.$permalink.'&autofocus%5Bpanel%5D=';
$optionUrl_section = get_admin_url().'customize.php?url='.$permalink.'&autofocus%5Bsection%5D=';
$icon_style = 'font: normal 20px/1 \'dashicons\';-webkit-font-smoothing: antialiased;padding-right: 4px;margin-top:3px;';
$flatsome_icon = '
	<svg style="width:16px; margin-top:-3px; opacity:.9; height:16px;vertical-align:middle;" width="438" height="438" viewBox="0 0 438 438" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M218.505 437.013V375.737L169.875 327.108L218.505 278.476V217.2L139.236 296.471L61.2764 218.51L218.505 61.2804V0.00683594L0 218.51L218.505 437.013Z" fill="currentColor"/>
		<path opacity="0.5" d="M218.507 61.2759L375.735 218.505L297.776 296.464L218.507 217.198V278.472L267.139 327.103L218.507 375.732V437.006L328.413 327.103L437.012 218.505L218.507 0V61.2759Z" fill="currentColor"/>
	</svg>
';

$wp_admin_bar->add_menu( array(
 'id' => 'flatsome_panel',
 'title' => $flatsome_icon.' Zippy',
 'href' => $panel_url
));

$wp_admin_bar->add_menu( array(
 'id' => 'theme_options',
 'parent' => 'flatsome_panel',
 'title' => '<span class="dashicons dashicons-admin-generic" style="'.$icon_style.'"></span>Theme Options',
 'href' => $optionUrl_panel
));

$wp_admin_bar->add_menu( array(
 'parent' => 'flatsome_panel',
 'id' => 'options_advanced',
 'title' => '<span class="dashicons dashicons-admin-tools" style="'.$icon_style.'"></span>Advanced',
 'href' =>  $advanced_url.''
));

$wp_admin_bar->add_menu( array(
 'parent' => 'flatsome_panel',
 'id' => 'flatsome_panel_license',
 'title' => 'Theme Registration',
 'href' => $panel_url
));

$wp_admin_bar->add_menu( array(
 'parent' => 'flatsome_panel',
 'id' => 'flatsome_panel_support',
 'title' => 'Help & Guides',
 'href' => $panel_url.'-support'
));

	$wp_admin_bar->add_menu( array(
		'parent' => 'flatsome_panel',
		'id'     => 'flatsome_panel_status',
		'title'  => 'Status',
		'href'   => $panel_url . '-status',
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => 'flatsome_panel',
		'id'     => 'flatsome_panel_features',
		'title'  => 'Features',
		'href'   => $panel_url . '-features',
	) );

$wp_admin_bar->add_menu( array(
 'parent' => 'flatsome_panel',
 'id' => 'flatsome_panel_changelog',
 'title' => 'Change log',
 'href' => $panel_url.'-changelog'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'flatsome_panel',
 'id' => 'flatsome_panel_setup_wizard',
 'title' => 'Setup Wizard',
 'href' => admin_url().'admin.php?page=flatsome-setup'
));

	if ( ! flatsome_is_theme_enabled() ) {
		$wp_admin_bar->add_menu( array(
			'id'    => 'flatsome-activate',
			'title' => '<span class="ab-icon" aria-hidden="true"></span><span class="ab-label">' . esc_html__( 'Activate Theme', 'flatsome' ) . '</span>
			   <style>
				#wpadminbar #wp-admin-bar-flatsome-activate .ab-icon:before {
			        content: "\f528";
				}
				#wp-admin-bar-flatsome-activate .ab-icon {
    				margin: 2px 4px 0 0;
				}
				</style>',
			'href'  => admin_url() . 'admin.php?page=flatsome-panel',
		) );
	}

$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_header',
 'title' => '<span class="dashicons dashicons-arrow-up-alt dashicons-header" style="'.$icon_style.'"></span> Header',
 'href' =>  $optionUrl_panel.'header'
));


$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_layout',
 'title' => '<span class="dashicons dashicons-editor-table" style="'.$icon_style.'"></span> Layout',
 'href' =>  $optionUrl_section.'layout'
));


$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_static_front_page',
 'title' => '<span class="dashicons dashicons-admin-home" style="'.$icon_style.'"></span> Homepage',
 'href' =>  $optionUrl_section.'static_front_page'
));


$wp_admin_bar->add_menu( array(
 'parent' => 'options_header',
 'id' => 'options_header_presets',
 'title' => 'Presets',
 'href' =>  $optionUrl_section.'header-presets'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_header',
 'id' => 'options_header_logo',
 'title' => 'Logo & Site Identity',
 'href' =>  $optionUrl_section.'title_tagline'
));


$wp_admin_bar->add_menu( array(
 'parent' => 'options_header',
 'id' => 'options_header_top',
 'title' => 'Top Bar',
 'href' =>  $optionUrl_section.'top_bar'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_header',
 'id' => 'options_header_main',
 'title' => 'Header Main',
 'href' =>  $optionUrl_section.'main_bar'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_header',
 'id' => 'options_header_bottom',
 'title' => ' Header Bottom',
 'href' =>  $optionUrl_section.'bottom_bar'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_header',
 'id' => 'options_header_mobile',
 'title' => ' Header Mobile',
 'href' =>  $optionUrl_section.'header_mobile'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_header',
 'id' => 'options_header_sticky',
 'title' => ' Sticky Header',
 'href' =>  $optionUrl_section.'header_sticky'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_header',
 'id' => 'options_header_dropdown',
 'title' => 'Dropdown Style',
 'href' =>  $optionUrl_section.'header_dropdown'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_style',
 'title' => '<span class="dashicons dashicons-admin-appearance" style="'.$icon_style.'"></span> Style',
 'href' =>  $optionUrl_panel.'style'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_style',
 'id' => 'options_style_colors',
 'title' => 'Colors',
 'href' =>  $optionUrl_section.'colors'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_style',
 'id' => 'options_style_global',
 'title' => 'Global Styles',
 'href' =>  $optionUrl_section.'global-styles'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_style',
 'id' => 'options_style_type',
 'title' => 'Typography',
 'href' =>  $optionUrl_section.'type'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_style',
 'id' => 'options_style_css',
 'title' => 'Custom CSS',
 'href' =>  $optionUrl_section.'custom-css'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_style',
 'id' => 'options_style_lightbox',
 'title' => 'Drawer & Lightbox',
 'href' =>  $optionUrl_section.'lightbox'
));

if(is_woocommerce_activated()) {

  $wp_admin_bar->add_menu( array(
   'parent' => 'theme_options',
   'id' => 'options_shop',
   'title' => '<span class="dashicons dashicons-cart" style="'.$icon_style.'"></span>&nbsp;WooCommerce',
   'href' =>  $optionUrl_panel.'woocommerce'
  ));

    $wp_admin_bar->add_menu( array(
     'parent' => 'options_shop',
     'id' => 'options_shop_store_notice',
     'title' => __( 'Store Notice', 'woocommerce' ),
     'href' =>  $optionUrl_section.'woocommerce_store_notice'
    ));

  $wp_admin_bar->add_menu( array(
   'parent' => 'options_shop',
   'id' => 'options_shop_category_page',
   'title' => __( 'Product Catalog', 'woocommerce' ),
   'href' =>  $optionUrl_section.'woocommerce_product_catalog'
  ));

  $wp_admin_bar->add_menu( array(
   'parent' => 'options_shop',
   'id' => 'options_shop_product_page',
   'title' => 'Product Page',
   'href' =>  $optionUrl_section.'product-page'
  ));

  $wp_admin_bar->add_menu( array(
   'parent' => 'options_shop',
   'id' => 'options_shop_my_account',
   'title' => 'My Account',
   'href' =>  $optionUrl_section.'fl-my-account'
  ));

  $wp_admin_bar->add_menu( array(
   'parent' => 'options_shop',
   'id' => 'options_shop_payment_icons',
   'title' => 'Payment Icons',
   'href' =>  $optionUrl_section.'payment-icons'
  ));

    $wp_admin_bar->add_menu( array(
       'parent' => 'options_shop',
       'id' => 'options_shop_product_images',
       'title' => __( 'Product Images', 'woocommerce' ),
       'href' =>  $optionUrl_section.'woocommerce_product_images'
      ));

  $wp_admin_bar->add_menu( array(
   'parent' => 'options_shop',
   'id' => 'options_shop_checkout',
   'title' => 'Checkout',
   'href' =>  $optionUrl_section.'woocommerce_checkout'
  ));

  $wp_admin_bar->add_menu( array(
   'parent' => 'options_shop',
   'id' => 'options_shop_cart',
   'title' => 'Cart',
   'href' =>  $optionUrl_section.'cart-checkout'
  ));

  $wp_admin_bar->add_menu( array(
   'parent' => 'options_shop',
   'id' => 'options_advanced_woocommerce_2',
   'title' => 'Advanced',
   'href' =>  $advanced_url.'of-option-woocommerce'
  ));

}


$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_layout',
 'title' => '<span class="dashicons dashicons-editor-table" style="'.$icon_style.'"></span> Layout',
 'href' =>  $optionUrl_section.'layout'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_pages',
 'title' => '<span class="dashicons dashicons-admin-page" style="'.$icon_style.'"></span> Pages',
 'href' =>  $optionUrl_section.'pages'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_blog',
 'title' => '<span class="dashicons dashicons-edit" style="'.$icon_style.'"></span> Blog',
 'href' =>  $optionUrl_panel.'blog'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_portfolio',
 'title' => '<span class="dashicons dashicons-portfolio" style="'.$icon_style.'"></span> Portfolio',
 'href' =>  $optionUrl_section.'fl-portfolio'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_footer',
 'title' => '<span class="dashicons dashicons-arrow-down-alt" style="'.$icon_style.'"></span> Footer',
 'href' =>  $optionUrl_section.'footer'
));


$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_menus',
 'title' => '<span class="dashicons dashicons-menu " style="'.$icon_style.'"></span> Menus',
 'href' =>  $optionUrl_panel.'nav_menus'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_menus',
 'id' => 'options_menus_backend',
 'title' => 'Back-end editor',
 'href' =>  admin_url().'nav-menus.php'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_widgets',
 'title' => '<span class="dashicons dashicons-welcome-widgets-menus" style="'.$icon_style.'"></span> Widgets',
 'href' =>  $optionUrl_panel.'widgets'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_widgets',
 'id' => 'options_widgets_backend',
 'title' => 'Back-end editor',
 'href' =>  admin_url().'widgets.php'
));


$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_share',
 'title' => '<span class="dashicons dashicons-share" style="'.$icon_style.'"></span> Share',
 'href' =>  $optionUrl_section.'share'
));

	$wp_admin_bar->add_menu( array(
		'parent' => 'theme_options',
		'id'     => 'options_notifications',
		'title'  => '<span class="dashicons dashicons-testimonial" style="' . $icon_style . '"></span> Notifications',
		'href'   => $optionUrl_section . 'notifications',
	) );


$wp_admin_bar->add_menu( array(
 'parent' => 'theme_options',
 'id' => 'options_reset',
 'title' => '<span class="dashicons dashicons-admin-generic" style="'.$icon_style.'"></span> Reset',
 'href' =>  $optionUrl_section.'advanced'
));


$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_custom_scripts',
 'title' => 'Global Settings',
 'href' =>  $advanced_url.'of-option-globalsettings'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_custom_css',
 'title' => 'Custom CSS',
 'href' =>  $advanced_url.'of-option-customcss'
));


$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_performance',
 'title' => 'Performance',
 'href' =>  $advanced_url.'of-option-performance'
));

	$wp_admin_bar->add_menu( array(
		'parent' => 'options_advanced',
		'id'     => 'options_advanced_content_delivery',
		'title'  => 'Content Delivery',
		'href'   => $advanced_url . 'of-option-contentdelivery',
	) );

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_site_loader',
 'title' => 'Site Loader',
 'href' =>  $advanced_url.'of-option-siteloader'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_site_search',
 'title' => 'Site Search',
 'href' =>  $advanced_url.'of-option-sitesearch'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_instagram_api',
 'title' => 'Instagram',
 'href' =>  $advanced_url.'of-option-instagram'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_google_apis',
 'title' => 'Google APIs',
 'href' =>  $advanced_url.'of-option-googleapis'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_maintenance',
 'title' => 'Maintenance',
 'href' =>  $advanced_url.'of-option-maintenancemode'
));

$wp_admin_bar->add_menu( array(
	'parent' => 'options_advanced',
	'id'     => 'options_advanced_404',
	'title'  => '404 Page',
	'href'   => $advanced_url . 'of-option-404page',
) );

$wp_admin_bar->add_menu( array(
  'parent' => 'options_advanced',
  'id' => 'options_advanced_woocommerce',
  'title' => 'WooCommerce',
  'href' =>  $advanced_url.'of-option-woocommerce'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_catalog_mode',
 'title' => 'Catalog Mode',
 'href' =>  $advanced_url.'of-option-catalogmode'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_portfolio',
 'title' => 'Portfolio',
 'href' =>  $advanced_url.'of-option-portfolio'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_mobile',
 'title' => 'Mobile',
 'href' =>  $advanced_url.'of-option-mobile'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_integrations',
 'title' => 'Integrations',
 'href' =>  $advanced_url.'of-option-integrations'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_updates',
 'title' => 'Updates',
 'href' =>  $advanced_url.'of-option-updates'
));

$wp_admin_bar->add_menu( array(
 'parent' => 'options_advanced',
 'id' => 'options_advanced_backup',
 'title' => 'Backup / Import',
 'href' =>  $advanced_url.'of-option-backupandimport'
));

// HELPERS


if(is_category() || is_home()){
	$wp_admin_bar->add_menu( array(
	       'parent' => 'customize',
	       'id' => 'admin_bar_helper',
	       'title' => 'Blog Layout',
 		    'href' =>  $optionUrl_panel.'blog'
	));
}

if(is_woocommerce_activated()) {

  if(is_cart() ){
     $wp_admin_bar->add_menu( array(
         'parent' => 'customize',
         'id' => 'admin_bar_helper',
         'title' => 'Cart layout',
 		 'href' =>  $optionUrl_section.'cart-checkout'
     ));
  }

  if(is_checkout()){
     $wp_admin_bar->add_menu( array(
         'parent' => 'customize',
         'id' => 'admin_bar_helper',
         'title' => 'Checkout layout',
     'href' =>  $optionUrl_section.'woocommerce_checkout'
     ));
  }

  if(is_product()){
         $wp_admin_bar->add_menu( array(
             'parent' => 'customize',
             'id' => 'admin_bar_helper',
             'title' => __('Product Page','woocommerce'),
 			 'href' =>  $optionUrl_section.'product-page'
         ));
  }


    if(is_account_page()){
         $wp_admin_bar->add_menu( array(
             'parent' => 'customize',
             'id' => 'admin_bar_helper',
             'title' => 'My Account Page',
 			 'href' =>  $optionUrl_section.'fl-my-account'
         ));
     }

      if(is_shop() || is_product_category()){
          $wp_admin_bar->add_menu( array(
             'parent' => 'customize',
             'id' => 'admin_bar_helper_flatsome',
             'title' => __('Product Catalog','woocommerce'),
 			'href' =>  $optionUrl_section.'woocommerce_product_catalog'
         ));
  	}

}

}
add_action( 'admin_bar_menu', 'flatsome_admin_bar_helper' , 35);
