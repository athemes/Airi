jQuery(document).ready(function ($) {
  // Change the font-size of body
  wp.customize("font_size_body", function (control) {
    control.bind(function (controlValue) {
      $("body").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of site title
  wp.customize("font_size_site_title", function (control) {
    control.bind(function (controlValue) {
      $(".site-title").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of site description
  wp.customize("font_size_site_desc", function (control) {
    control.bind(function (controlValue) {
      $(".site-description").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of Top level menu items
  wp.customize("font_size_menu_top_items", function (control) {
    control.bind(function (controlValue) {
      $(".main-navigation li").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of Submenu items
  wp.customize("font_size_menu_sub_items", function (control) {
    control.bind(function (controlValue) {
      $(".main-navigation ul ul li").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of Post titles (archives)
  wp.customize("font_size_index_title", function (control) {
    control.bind(function (controlValue) {
      $(".blog-loop .entry-title").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of Post titles (singles)
  wp.customize("font_size_single_title", function (control) {
    control.bind(function (controlValue) {
      $(".single-post .entry-title").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of Widget titles
  wp.customize("font_size_widget_title", function (control) {
    control.bind(function (controlValue) {
      $(".widget-area .widget-title").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of Widget text
  wp.customize("font_size_widgets", function (control) {
    control.bind(function (controlValue) {
      $(".widget-area .widget").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of Footer widget titles
  wp.customize("font_size_footer_widget_titles", function (control) {
    control.bind(function (controlValue) {
      $(".sidebar-column .widget-title").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of Footer widget text
  wp.customize("font_size_footer_widgets", function (control) {
    control.bind(function (controlValue) {
      $(".sidebar-column .widget").css("font-size", controlValue + "px");
    });
  });

  // Change the font-size of Footer credits
  wp.customize("font_size_footer_credits", function (control) {
    control.bind(function (controlValue) {
      $(".site-info").css("font-size", controlValue + "px");
    });
  });

  // Change the headings font-family
  wp.customize("headings_font", function (control) {
    control.bind(function (controlValue) {
      const font_object = JSON.parse(controlValue);
      WebFont.load({
        google: {
          families: [font_object.font + ":" + font_object.variant],
        },
      });
      $("h1, h2, h3, h4, h5, h6, .site-title").css(
        "font-family",
        font_object.font
      );
    });
  });

  // Change the body font-family
  wp.customize("body_font", function (control) {
    control.bind(function (controlValue) {
      const font_object = JSON.parse(controlValue);
      WebFont.load({
        google: {
          families: [font_object.font + ":" + font_object.variant],
        },
      });
      $("body, button, input, select, textarea").css(
        "font-family",
        font_object.font
      );
    });
  });

  // Change General Colors
  // Primary
  wp.customize("test_color_primary", function (control) {
    control.bind(function (controlValue) {
      $(
        ".woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.product div.entry-summary p.price, .product div.entry-summary span.price,.athemes-blog:not(.airi_athemes_blog_skin) .posted-on a,.athemes-blog:not(.airi_athemes_blog_skin) .byline a:hover,.testimonials-section.style1:before,.single-post .read-more-link .gt,.blog-loop .read-more-link .gt,.single-post .posted-on a,.blog-loop .posted-on a,.entry-title a:hover,.airi_recent_entries .post-date,.menuStyle3 .top-bar .contact-item .fa,.menuStyle4 .contact-area .contact-block .contact-icon,.widget_categories li:hover::before,.widget_categories li:hover a"
      ).css("color", controlValue);
      $(
        '.product .single_add_to_cart_button.button.alt,.menuStyle4 .contact-area .contact-block .contact-icon,button,.button,input[type="button"],input[type="reset"],input[type="submit"]'
      ).css("border-color", controlValue);
      $(
        '.woocommerce-checkout button.button.alt,.woocommerce-checkout button.button.alt:hover,.woocommerce-cart .cart-collaterals .cart_totals .button:hover,.woocommerce-cart .cart-collaterals .cart_totals .button,.product .single_add_to_cart_button.button.alt:hover,.product .single_add_to_cart_button.button.alt,.woocommerce ul.products li.product .button,.menuStyle2 .main-navigation a:hover:after, .menuStyle2 .main-navigation .current-menu-item:after,.comments-area .comment-reply-link:hover,.menuStyle4 .main-navigation .header-cta:before,.menuStyle4 .main-navigation .header-cta,button,.button,input[type="button"],input[type="reset"],input[type="submit"],.menuStyle3 .main-navigation a:hover:after,.menuStyle3 .main-navigation .current-menu-item:after'
      ).css("background-color", controlValue);
    });
  });

  // Change Header Colors
  // Menu 1
  wp.customize("test_color_mt1_site_title", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle1 .site-title a").css("color", controlValue);
    });
  });

  wp.customize("test_color_mt1_site_title_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle1 .sticky-wrapper.is-sticky .site-title a").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_mt1_site_desc_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle1 .sticky-wrapper.is-sticky .site-description").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_mt1_top_menu_items", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle1 .main-navigation a, .menuStyle1 .fa-search").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_mt1_top_menu_items_sticky", function (control) {
    control.bind(function (controlValue) {
      $(
        ".menuStyle1 .sticky-wrapper.is-sticky .main-navigation a, .menuStyle1 .sticky-wrapper.is-sticky .fa-search"
      ).css("color", controlValue);
    });
  });

  wp.customize("test_color_mt1_bg_color", function (control) {
    control.bind(function (controlValue) {
      $(
        ".menuStyle1 .site-header, .menuStyle1.page-template-template_page-builder .site-header"
      ).css("background-color", controlValue);
    });
  });

  wp.customize("test_color_mt1_bg_color_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle1 .is-sticky .site-header").css(
        "background-color",
        controlValue
      );
    });
  });

  // Menu 2
  wp.customize("test_color_mt2_site_title", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle2 .site-title a").css("color", controlValue);
    });
  });

  wp.customize("test_color_mt2_site_title_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle2 .sticky-wrapper.is-sticky .site-title a").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_mt2_site_desc", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle2 .site-description").css("color", controlValue);
    });
  });

  wp.customize("test_color_mt2_site_desc_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle2 .sticky-wrapper.is-sticky .site-description").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_mt2_top_menu_items", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle2 .main-navigation a").css("color", controlValue);
    });
  });

  wp.customize("test_color_mt2_top_menu_items_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle2 .sticky-wrapper.is-sticky .main-navigation a").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_mt2_bg_color", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle2 .site-header").css("background-color", controlValue);
    });
  });

  wp.customize("test_color_mt2_bg_color_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle2 .is-sticky .site-header").css(
        "background-color",
        controlValue
      );
    });
  });

  // Menu 3
  wp.customize("test_color_mt3_top_bar", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle3 .top-bar").css("background-color", controlValue);
    });
  });

  wp.customize("test_color_mt3_top_bar_color", function (control) {
    control.bind(function (controlValue) {
      $(
        ".menuStyle3 .top-bar a, .menuStyle3 .top-bar .contact-item.header-social .fa, .menuStyle3 .top-bar .contact-item.header-social a"
      ).css("color", controlValue);
    });
  });

  wp.customize("test_color_mt3_site_title", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle3 .site-title a").css("color", controlValue);
    });
  });

  wp.customize("test_color_mt3_site_title_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle3 .sticky-wrapper.is-sticky .site-title a").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_mt3_site_desc", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle3 .site-description").css("color", controlValue);
    });
  });

  wp.customize("test_color_mt3_site_desc_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle3 .sticky-wrapper.is-sticky .site-description").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_mt3_top_menu_items", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle3 .main-navigation a").css("color", controlValue);
    });
  });

  wp.customize("test_color_mt3_top_menu_items_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle3 .sticky-wrapper.is-sticky .main-navigation a").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_mt3_bg_color", function (control) {
    control.bind(function (controlValue) {
      $(
        ".menuStyle3 .bottom-bar, .menuStyle3.page-template-template_page-builder .bottom-bar"
      ).css("background-color", controlValue);
    });
  });

  wp.customize("test_color_mt3_bg_color_sticky", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle3 .is-sticky .bottom-bar").css(
        "background-color",
        controlValue
      );
    });
  });

  // Menu 4
  wp.customize("test_color_mt4_site_title", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle4 .site-title a").css("color", controlValue);
    });
  });

  wp.customize("test_color_mt4_site_desc", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle4 .site-description").css("color", controlValue);
    });
  });

  wp.customize("test_color_mt4_menu_bg_color", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle4 .main-navigation").css("background-color", controlValue);
    });
  });

  wp.customize("test_color_mt4_top_menu_items", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle4 .main-navigation li a").css("color", controlValue);
    });
  });

  wp.customize("test_color_mt4_bg_color", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle4 .site-header").css("background-color", controlValue);
    });
  });

  wp.customize("test_color_mt4_top_line", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle4 .contact-area .contact-block span:first-of-type").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_mt4_bottom_line", function (control) {
    control.bind(function (controlValue) {
      $(".menuStyle4 .contact-area .contact-block span:last-of-type").css(
        "color",
        controlValue
      );
    });
  });

  // Submenu

  wp.customize("test_color_submenu_items", function (control) {
    control.bind(function (controlValue) {
      $("#site-navigation ul ul li a").css("color", controlValue);
    });
  });

  wp.customize("test_color_submenu_bg", function (control) {
    control.bind(function (controlValue) {
      $("#site-navigation ul ul li").css("background-color", controlValue);
    });
  });

  wp.customize("test_mobile_toggle_color", function (control) {
    control.bind(function (controlValue) {
      $(
        ".menuStyle1 .mobile-menu-toggle_lines, .menuStyle1 .mobile-menu-toggle_lines:before, .menuStyle1 .mobile-menu-toggle_lines:after,.menuStyle1 .mobile-menu-toggle_lines,.mobile-menu-toggle_lines:before, .mobile-menu-toggle_lines:after,.mobile-menu-toggle_lines,.menuStyle3 .mobile-menu-toggle_lines,.menuStyle3 .mobile-menu-toggle_lines:before, .menuStyle3 .mobile-menu-toggle_lines:after"
      ).css("background-color", controlValue);
    });
  });

  wp.customize("test_color_index_post_title", function (control) {
    control.bind(function (controlValue) {
      $(".entry-title a").css("color", controlValue);
    });
  });

  wp.customize("test_color_single_post_title", function (control) {
    control.bind(function (controlValue) {
      $(".single-post .entry-title").css("color", controlValue);
    });
  });

  wp.customize("test_color_meta_cat_bg", function (control) {
    control.bind(function (controlValue) {
      $(".single-post .post-cat, .blog-loop .post-cat").css(
        "background-color",
        controlValue
      );
    });
  });

  wp.customize("test_color_meta_text", function (control) {
    control.bind(function (controlValue) {
      $(".single-post .entry-meta, .blog-loop .entry-meta").css(
        "color",
        controlValue
      );
    });
  });

  wp.customize("test_color_meta_links", function (control) {
    control.bind(function (controlValue) {
      $(
        ".single-post .entry-meta .byline a, .blog-loop .entry-meta .byline a"
      ).css("color", controlValue);
    });
  });

  wp.customize("test_color_post_text", function (control) {
    control.bind(function (controlValue) {
      $(".single-post .entry-content, .blog-loop .entry-content").css(
        "color",
        controlValue
      );
      $(
        ".editor-block-list__layout, .editor-block-list__layout .editor-block-list__block"
      ).css("color", controlValue);
    });
  });

  wp.customize("test_color_widgets_title", function (control) {
    control.bind(function (controlValue) {
      $(".widget .widget-title").css("color", controlValue);
    });
  });

  wp.customize("test_color_widgets_text", function (control) {
    control.bind(function (controlValue) {
      $(".widget").css("color", controlValue);
    });
  });

  wp.customize("test_color_widgets_links", function (control) {
    control.bind(function (controlValue) {
      $(".widget a").css("color", controlValue);
    });
  });
});
