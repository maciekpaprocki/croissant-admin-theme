<script type="text/javascript">
function LightenDarkenColor(col, amt) {

    var usePound = false;

    if (col[0] == "#") {
        col = col.slice(1);
        usePound = true;
    }

    var num = parseInt(col,16);

    var r = (num >> 16) + amt;

    if (r > 255) r = 255;
    else if  (r < 0) r = 0;

    var b = ((num >> 8) & 0x00FF) + amt;

    if (b > 255) b = 255;
    else if  (b < 0) b = 0;

    var g = (num & 0x0000FF) + amt;

    if (g > 255) g = 255;
    else if (g < 0) g = 0;

    return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);

}
</script>

<?php
if (!empty(get_option('croissant_color_1'))) {
    $color_1 = get_option('croissant_color_1');
} else {
    if (get_option('croissant_theme') === 'default') {
        $color_1 = '{$color_1}';
    } elseif (get_option('croissant_theme') === 'light') {
        $color_1 = '{$color_1}';
    } elseif (get_option('croissant_theme') === 'clean') {
        $color_1 = '{$color_1}';
    }
}

if (!empty(get_option('croissant_color_2'))) {
    $color_2 = get_option('croissant_color_2');
} else {
    if (get_option('croissant_theme') === 'default') {
        $color_2 = '{$color_2}';
    } elseif (get_option('croissant_theme') === 'light') {
        $color_2 = '{$color_2}';
    } elseif (get_option('croissant_theme') === 'clean') {
        $color_2 = '{$color_2}';
    }
}

if (!empty(get_option('croissant_color_3'))) {
    $color_3 = get_option('croissant_color_3');
} else {
    if (get_option('croissant_theme') === 'default') {
        $color_3 = '{$color_3}';
    } elseif (get_option('croissant_theme') === 'light') {
        $color_3 = '{$color_3}';
    } elseif (get_option('croissant_theme') === 'clean') {
        $color_3 = '{$color_3}';
    }
}

if (!empty(get_option('croissant_color_4'))) {
    $color_4 = get_option('croissant_color_4');
} else {
    if (get_option('croissant_theme') === 'default') {
        $color_4 = '{$color_4}';
    } elseif (get_option('croissant_theme') === 'light') {
        $color_4 = '{$color_4}';
    } elseif (get_option('croissant_theme') === 'clean') {
        $color_4 = '{$color_4}';
    }
}

if (!empty(get_option('croissant_theme'))) {
    function hex_color_mod($hex, $diff)
    {
        $rgb = str_split(trim($hex, '# '), 2);
        foreach ($rgb as &$hex) {
            $dec = hexdec($hex);
            if ($diff >= 0) {
                $dec += $diff;
            } else {
                $dec -= abs($diff);
            }
            $dec = max(0, min(255, $dec));
            $hex = str_pad(dechex($dec), 2, '0', STR_PAD_LEFT);
        }
        return '#'.implode($rgb);
    }

    $color_1_dark = hex_color_mod($color_1, -30);
    $color_2_dark = hex_color_mod($color_2, -30);
    $color_3_dark = hex_color_mod($color_3, -30);
    $color_4_dark = hex_color_mod($color_4, -30);

    $white = '{$color_1}';
    $black = '#000000';
    $grey = '{$color_3}';

    $option_theme = get_option('croissant_theme');

    if ($option_theme === 'default'):
    $custom_css = "
      /*
       * Body
       */
      #wpbody #wpbody-content .wrap {
        background-color: {$color_1};
      }
      #wpbody #wpbody-content .wrap .nav-tab-wrapper {
        background-color: white;
      }
      #wpbody #wpbody-content .wrap .nav-tab-wrapper .nav-tab.nav-tab-active, #wpbody #wpbody-content .wrap .nav-tab-wrapper .nav-tab:hover {
        border-bottom: 3px solid {$color_4};
      }

      #wpwrap {
        background: {$color_1};
      }

      /*
       * Navigation
       */
      #wpadminbar {
        background: {$color_3};
      }
      #wpadminbar * {
        color: white !important;
      }
      #wpadminbar li a.ab-item,
      #wpadminbar li .ab-sub-wrapper {
        color: white !important;
        background-color: {$color_3} !important;
      }
      #wpadminbar li a:focus span {
        color: {$color_4} !important;
      }
      #wpadminbar li:hover > a,
      #wpadminbar li:hover > a span {
        color: {$color_4} !important;
      }

      #adminmenuback,
      #adminmenuwrap,
      #adminmenu {
        background: {$color_2};
      }

      #adminmenuwrap ul#adminmenu li a .wp-menu-image:before {
        color: white;
      }
      #adminmenuwrap ul#adminmenu li a .wp-menu-name {
        color: white;
      }
      #adminmenuwrap ul#adminmenu li.current a, #adminmenuwrap ul#adminmenu li.wp-has-current-submenu a {
        background: {$color_4};
      }
      #adminmenuwrap ul#adminmenu li.current a .wp-menu-name, #adminmenuwrap ul#adminmenu li.wp-has-current-submenu a .wp-menu-name {
        color: white;
      }
      #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu {
        margin-top: 0 !important;
        background: {$color_3};
      }
      #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu li a.current {
        color: white;
      }
      #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu li a:hover {
        color: white;
      }
      #adminmenuwrap ul#adminmenu li:hover a, #adminmenuwrap ul#adminmenu li:focus a {
        color: white;
        background: {$color_4};
      }
      #adminmenuwrap ul#adminmenu li.menu-top:hover,
      #adminmenuwrap ul#adminmenu li.opensub > a.menu-top,
      #adminmenuwrap ul#adminmenu li > a.menu-top:focus {
        background-color: {$color_4} !important;
      }

      #postbox-container-1.postbox-container .hndle {
        border-bottom: 2px solid {$color_4};
      }

      #collapse-menu:hover,
      #collapse-menu:hover #collapse-button div:after {
        color: {$color_4};
      }

      /*
       * Buttons
       */
      .button-primary {
        background-color: {$color_4} !important;
      }
      .button-primary:hover {
        background-color: {$color_4_dark} !important;
      }

      button.button-primary, button.blue,
      .button.button-primary,
      .button.blue,
      .acf-button.button-primary,
      .acf-button.blue {
        background-color: {$color_4} !important;
      }
      button.button-primary:hover, button.blue:hover,
      .button.button-primary:hover,
      .button.blue:hover,
      .acf-button.button-primary:hover,
      .acf-button.blue:hover {
        background-color: {$color_4_dark} !important;
      }
      button:active, button:focus,
      .button:active,
      .button:focus,
      .acf-button:active,
      .acf-button:focus {
        outline: none !important;
      }

      /*
       * Messages
       */
      .updated,
      .error,
      .settings-error {
        background-color: white !important;
      }

      /*
       * Settings
       */
      .croissant-wrap input[type='radio']:checked + label {
        background-color: {$color_1};
      }
      .croissant-wrap #croissant-custom-login > div {
        border: none;
        background-color: {$color_1};
      }

      .croissant-wrap .croissant-box {
        background-color: white;
      }
      .croissant-wrap .croissant-box .croissant-box-header {
        border-bottom: thin solid {$color_1};
      }
      .croissant-wrap .croissant-box .croissant-box-body .croissant-box-inside {
        background-color: {$color_1};
      }

      /*
       * Editors
       */
      input[type=checkbox]:focus,
      input[type=color]:focus,
      input[type=date]:focus,
      input[type=datetime-local]:focus,
      input[type=datetime]:focus,
      input[type=email]:focus,
      input[type=month]:focus,
      input[type=number]:focus,
      input[type=password]:focus,
      input[type=radio]:focus,
      input[type=search]:focus,
      input[type=tel]:focus,
      input[type=text]:focus,
      input[type=time]:focus,
      input[type=url]:focus,
      input[type=week]:focus,
      select:focus,
      textarea:focus {
        border-color: {$color_4} !important;
      }

      input[type='checkbox']:before {
        color: {$color_4} !important;
      }

      input[type=radio]:checked:before {
        color: {$color_4};
      }

      .view-switch a.current:before {
        color: {$color_4} !important;
      }

      .wp-editor-tabs .switch-tmce:hover, .wp-editor-tabs .switch-tmce:active, .wp-editor-tabs .switch-tmce:focus,
      .wp-editor-tabs .switch-html:hover,
      .wp-editor-tabs .switch-html:active,
      .wp-editor-tabs .switch-html:focus {
        color: white !important;
        background-color: {$color_4} !important;
      }

      .tmce-active .wp-editor-tabs .switch-tmce {
        color: white !important;
        background-color: {$color_4} !important;
      }

      .html-active .wp-editor-tabs .switch-html {
        color: white !important;
        background-color: {$color_4} !important;
      }

      /*
       * Tables
       */
      .post-com-count:hover span {
        background-color: {$color_4} !important;
      }
      "; elseif ($option_theme === 'light'):
    $custom_css = "
      /*
       * Body
       */
      #wpcontent,
      #wpfooter {
        margin-left: 200px;
        padding-left: 20px;
        padding-right: 20px;
      }

      #wpbody #wpbody-content #screen-meta-links {
        margin: 0 40px 0 0;
      }
      #wpbody #wpbody-content .wrap {
        background-color: {$color_1};
      }
      #wpbody #wpbody-content .wrap .nav-tab-wrapper {
        background-color: white;
      }
      #wpbody #wpbody-content .wrap .nav-tab-wrapper .nav-tab.nav-tab-active, #wpbody #wpbody-content .wrap .nav-tab-wrapper .nav-tab:hover {
        border-bottom: 3px solid {$color_4};
      }

      #wpwrap {
        background: {$color_1};
      }

      /*
       * Navigation
       */
      #wpadminbar {
        z-index: 9998 !important;
        height: 45px;
        padding-right: 50px;
        box-sizing: border-box;
        background: {$color_1};
        border-bottom: thin solid {$color_2};
      }
      #wpadminbar * {
        color: {$color_3} !important;
      }
      #wpadminbar li a.ab-item,
      #wpadminbar li .ab-sub-wrapper {
        color: {$color_3} !important;
        background-color: transparent !important;
      }
      #wpadminbar li .ab-sub-wrapper {
        border: thin solid {$color_2};
        border-top: none;
        box-shadow: none !important;
        -webkit-box-shadow: none !important;
        background-color: {$color_1} !important;
      }
      #wpadminbar li a:focus span {
        color: {$color_4} !important;
      }
      #wpadminbar li span,
      #wpadminbar li a:before,
      #wpadminbar li a span.ab-icon,
      #wpadminbar li a span.ab-icon:before {
        color: {$color_3} !important;
      }
      #wpadminbar li:hover > a,
      #wpadminbar li:hover > a span {
        color: {$color_4} !important;
      }

      #adminmenuback,
      #adminmenuwrap,
      #adminmenu {
        width: 200px;
        background: {$color_1};
        border-right: thin solid {$color_2};
      }

      #adminmenuwrap ul#adminmenu li a .wp-menu-image:before {
        color: {$color_3};
      }
      #adminmenuwrap ul#adminmenu li a .wp-menu-name {
        color: {$color_3};
      }
      #adminmenuwrap ul#adminmenu li.current a, #adminmenuwrap ul#adminmenu li.wp-has-current-submenu a {
        background: {$color_2};
      }
      #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu {
        width: 200px;
        background: {$color_2};
      }
      #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu li a.current {
        font-weight: bold;
      }
      #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu li a:hover {
        font-weight: bold;
      }
      #adminmenuwrap ul#adminmenu li.wp-not-current-submenu ul.wp-submenu {
        left: 200px;
        margin-top: 1px;
      }
      #adminmenuwrap ul#adminmenu li:hover a, #adminmenuwrap ul#adminmenu li:focus a {
        color: {$color_3};
        background: {$color_2};
      }
      #adminmenuwrap ul#adminmenu li.menu-top:hover,
      #adminmenuwrap ul#adminmenu li.opensub > a.menu-top,
      #adminmenuwrap ul#adminmenu li > a.menu-top:focus {
        background-color: {$color_2} !important;
      }
      #postbox-container-1.postbox-container .hndle {
        border-bottom: {$color_4} 2px solid;
      }

      #collapse-menu:hover,
      #collapse-menu:hover #collapse-button div:after {
        color: {$color_2};
      }

      /*
       * Buttons
       */
      .button-primary {
        background-color: {$color_4} !important;
      }
      .button-primary:hover {
        background-color: {$color_4_dark} !important;
      }

      button.button-primary, button.blue,
      .button.button-primary,
      .button.blue,
      .acf-button.button-primary,
      .acf-button.blue {
        background-color: {$color_4} !important;
      }
      button.button-primary:hover, button.blue:hover,
      .button.button-primary:hover,
      .button.blue:hover,
      .acf-button.button-primary:hover,
      .acf-button.blue:hover {
        background-color: {$color_4_dark} !important;
      }
      button:active, button:focus,
      .button:active,
      .button:focus,
      .acf-button:active,
      .acf-button:focus {
        outline: none !important;
      }

      /*
       * Messages
       */
      .updated,
      .error,
      .settings-error {
        background-color: white !important;
        border: thin solid {$color_2};
      }

      /*
       * Settings
       */
      .croissant-wrap input[type='radio']:checked + label {
        box-shadow: 0 0 0 1px {$color_2};
      }
      .croissant-wrap #croissant-custom-login > div {
        border: none;
        box-shadow: 0 0 0 1px {$color_2};
      }

      .croissant-wrap .croissant-box {
        border: thin solid {$color_2};
      }
      .croissant-wrap .croissant-box .croissant-box-header {
        border-bottom: thin solid {$color_2};
      }
      .croissant-wrap .croissant-box .croissant-box-body .croissant-box-inside {
        border: thin solid {$color_2};
      }

      /*
       * Editors
       */
      input[type=checkbox]:focus,
      input[type=color]:focus,
      input[type=date]:focus,
      input[type=datetime-local]:focus,
      input[type=datetime]:focus,
      input[type=email]:focus,
      input[type=month]:focus,
      input[type=number]:focus,
      input[type=password]:focus,
      input[type=radio]:focus,
      input[type=search]:focus,
      input[type=tel]:focus,
      input[type=text]:focus,
      input[type=time]:focus,
      input[type=url]:focus,
      input[type=week]:focus,
      select:focus,
      textarea:focus {
        border-color: {$color_4} !important;
      }

      input[type='checkbox']:before {
        color: {$color_4} !important;
      }

      input[type=radio]:checked:before {
        color: {$color_4};
      }

      .view-switch a.current:before {
        color: {$color_4} !important;
      }

      .wp-editor-tabs .switch-tmce:hover, .wp-editor-tabs .switch-tmce:active, .wp-editor-tabs .switch-tmce:focus,
      .wp-editor-tabs .switch-html:hover,
      .wp-editor-tabs .switch-html:active,
      .wp-editor-tabs .switch-html:focus {
        color: white !important;
        background-color: {$color_4} !important;
      }

      .tmce-active .wp-editor-tabs .switch-tmce {
        color: white !important;
        background-color: {$color_4} !important;
      }

      .html-active .wp-editor-tabs .switch-html {
        color: white !important;
        background-color: {$color_4} !important;
      }

      #wp-content-editor-tools {
        background-color: {$color_1} !important;
      }

      /*
       * Tables
       */
      .post-com-count:hover span {
        background-color: {$color_4} !important;
      }
      "; elseif ($option_theme === 'clean'):
    $custom_css = "
      /*
       * Body
       */
      .postbox-container .acf-fc-layout-handle {
        background: {$color_2} !important;
      }
      #wpcontent,
      #wpfooter {
        margin-left: 250px;
        padding-left: 20px;
        padding-right: 20px;
      }
      #wpbody #wpbody-content #screen-meta {
        -webkit-box-shadow: none;
        box-shadow: none;
      }
      #wpbody #wpbody-content #screen-meta-links {
        margin: 0 40px 0 0;
      }
      #wpbody #wpbody-content #screen-meta-links .screen-meta-toggle {
        -webkit-box-shadow: none;
        box-shadow: none;
        background-color: {$color_1};
      }
      #wpbody #wpbody-content .wrap {
        background-color: {$color_1};
      }
      #wpbody #wpbody-content .wrap .nav-tab-wrapper {
        background-color: white;
      }
      #wpbody #wpbody-content .wrap .nav-tab-wrapper .nav-tab.nav-tab-active, #wpbody #wpbody-content .wrap .nav-tab-wrapper .nav-tab:hover {
        border-bottom: 3px solid {$color_4};
      }

      #wpwrap {
        background: {$color_1};
      }

      /*
       * Navigation
       */
      #wpadminbar {
        left: 250px;
        z-index: 9998 !important;
        width: calc(100% - 250px);
        height: 45px;
        padding-left: 50px;
        padding-right: 50px;
        box-sizing: border-box;
        background: {$color_1};
        border-bottom: thin solid {$color_3};
      }
      #wpadminbar * {
        color: {$color_2} !important;
      }
      #wpadminbar li a.ab-item,
      #wpadminbar li .ab-sub-wrapper {
        color: {$color_2} !important;
        background-color: {$color_1} !important;
      }
      #wpadminbar li a:focus span {
        color: {$color_4} !important;
      }
      #wpadminbar li span,
      #wpadminbar li a:before,
      #wpadminbar li a span.ab-icon,
      #wpadminbar li a span.ab-icon:before {
        color: {$color_2} !important;
      }
      #wpadminbar li:hover > a,
      #wpadminbar li:hover > a span {
        color: {$color_4} !important;
      }

      #adminmenuback,
      #adminmenuwrap,
      #adminmenu {
        width: 250px;
        background: {$color_2};
      }

      #adminmenuwrap ul#adminmenu {
        padding: 0 30px;
        box-sizing: border-box;
      }
      #adminmenuwrap ul#adminmenu li:first-child > a {
        padding-top: 30px;
      }
      #adminmenuwrap ul#adminmenu > li {
        opacity: 0.3;
      }
      #adminmenuwrap ul#adminmenu > li > a {
        padding: 0 2px !important;
        font-weight: bold;
        font-size: 0.95em;
        text-transform: uppercase;
        letter-spacing: 1.5px;
      }
      #adminmenuwrap ul#adminmenu > li.current, #adminmenuwrap ul#adminmenu > li.wp-has-current-submenu, #adminmenuwrap ul#adminmenu > li:hover, #adminmenuwrap ul#adminmenu > li:focus {
        opacity: 1;
      }
      #adminmenuwrap ul#adminmenu > li.current .wp-menu-image:before, #adminmenuwrap ul#adminmenu > li.wp-has-current-submenu .wp-menu-image:before, #adminmenuwrap ul#adminmenu > li:hover .wp-menu-image:before, #adminmenuwrap ul#adminmenu > li:focus .wp-menu-image:before {
        -webkit-transition: all 0s;
        transition: all 0s;
        color: {$color_4};
      }
      #adminmenuwrap ul#adminmenu li a .wp-menu-image:before {
        color: white;
      }
      #adminmenuwrap ul#adminmenu li a .wp-menu-name {
        color: white;
      }
      #adminmenuwrap ul#adminmenu li.current a, #adminmenuwrap ul#adminmenu li.wp-has-current-submenu a {
        background: transparent;
      }
      #adminmenuwrap ul#adminmenu li.current a .wp-menu-name, #adminmenuwrap ul#adminmenu li.wp-has-current-submenu a .wp-menu-name {
        color: white;
      }
      #adminmenuwrap ul#adminmenu li.current a .wp-menu-image:before, #adminmenuwrap ul#adminmenu li.wp-has-current-submenu a .wp-menu-image:before {
        color: {$color_4};
      }
      .wrap .add-new-h2:hover, .wrap .page-title-action:hover {
        background: {$color_4} !important;
      }
      #adminmenu div.separator {
        background: {$color_4};
      }
      #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu {
        width: 200px;
        padding-left: 25px;
        background: transparent;
      }
      #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu li a {
        color: {$color_3};
      }
      #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu li a.current {
        color: white;
      }
      #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu li a:hover, #adminmenuwrap ul#adminmenu li.wp-has-submenu ul.wp-submenu li a:focus {
        color: white;
      }
      #adminmenuwrap ul#adminmenu li.wp-not-current-submenu ul.wp-submenu {
        left: 200px;
        margin-top: 1px;
        background: {$color_2};
      }
      #adminmenuwrap ul#adminmenu li:hover a, #adminmenuwrap ul#adminmenu li:focus a {
        color: white;
        background: transparent;
      }
      #adminmenuwrap ul#adminmenu li:hover a .wp-menu-image:before, #adminmenuwrap ul#adminmenu li:focus a .wp-menu-image:before {
        color: {$color_4};
      }
      #adminmenuwrap ul#adminmenu li.menu-top:hover,
      #adminmenuwrap ul#adminmenu li.opensub > a.menu-top,
      #adminmenuwrap ul#adminmenu li > a.menu-top:focus {
        background-color: transparent !important;
      }

      #postbox-container-1.postbox-container .hndle {
        border-bottom: 5px solid {$color_4};
      }

      #collapse-menu:hover,
      #collapse-menu:hover #collapse-button div:after {
        color: {$color_4};
      }

      /*
       * Buttons
       */
      .button-primary {
        background-color: {$color_4} !important;
      }
      .button-primary:hover {
        background-color: {$color_4_dark} !important;
      }

      button.button-primary, button.blue,
      .button.button-primary,
      .button.blue,
      .acf-button.button-primary,
      .acf-button.blue {
        background-color: {$color_4} !important;
      }
      button.button-primary:hover, button.blue:hover,
      .button.button-primary:hover,
      .button.blue:hover,
      .acf-button.button-primary:hover,
      .acf-button.blue:hover {
        background-color: {$color_4_dark} !important;
      }
      button:active, button:focus,
      .button:active,
      .button:focus,
      .acf-button:active,
      .acf-button:focus {
        outline: none !important;
      }

      /*
       * Messages
       */
      .updated,
      .error,
      .settings-error {
        background-color: white !important;
      }

      .update-plugins {
        width: auto;
        height: auto;
        vertical-align: text-bottom !important;
        margin: 1px 0 0 2px !important;
        color: {$color_2} !important;
        border-radius: 5px !important;
        background-color: {$color_4} !important;
      }
      .update-plugins span {
        letter-spacing: normal;
        color: {$color_2} !important;
      }

      /*
       * Settings
       */
      .croissant-wrap input[type='radio']:checked + label {
        background-color: {$color_1};
      }
      .croissant-wrap #croissant-custom-login > div {
        border: none;
        background-color: {$color_1};
      }

      .croissant-wrap .croissant-box {
        background-color: white;
      }
      .croissant-wrap .croissant-box .croissant-box-header {
        border-bottom: thin solid {$color_1};
      }
      .croissant-wrap .croissant-box .croissant-box-body .croissant-box-inside {
        background-color: {$color_1};
      }

      /*
       * Editors
       */
      input[type=checkbox]:focus,
      input[type=color]:focus,
      input[type=date]:focus,
      input[type=datetime-local]:focus,
      input[type=datetime]:focus,
      input[type=email]:focus,
      input[type=month]:focus,
      input[type=number]:focus,
      input[type=password]:focus,
      input[type=radio]:focus,
      input[type=search]:focus,
      input[type=tel]:focus,
      input[type=text]:focus,
      input[type=time]:focus,
      input[type=url]:focus,
      input[type=week]:focus,
      select:focus,
      textarea:focus {
        border-color: {$color_4} !important;
      }

      input[type='checkbox']:before {
        color: {$color_4} !important;
      }

      input[type=radio]:checked:before {
        color: {$color_4};
      }

      .view-switch a.current:before {
        color: {$color_4} !important;
      }

      .wp-editor-tabs .switch-tmce:hover, .wp-editor-tabs .switch-tmce:active, .wp-editor-tabs .switch-tmce:focus,
      .wp-editor-tabs .switch-html:hover,
      .wp-editor-tabs .switch-html:active,
      .wp-editor-tabs .switch-html:focus {
        color: white !important;
        background-color: {$color_4} !important;
      }

      .tmce-active .wp-editor-tabs .switch-tmce {
        color: white !important;
        background-color: {$color_4} !important;
      }

      .html-active .wp-editor-tabs .switch-html {
        color: white !important;
        background-color: {$color_4} !important;
      }

      /*
       * Tables
       */
      .post-com-count:hover span {
        background-color: {$color_4} !important;
      }

      /*
       * Responsiveness
       */
      @media only screen and (max-width: 960px) {
        #adminmenuwrap ul#adminmenu {
          padding: 0;
        }

        #wpadminbar {
          left: 0;
          width: 100%;
          padding-left: 0;
        }
      }
      @media only screen and (max-width: 782px) {
        #wpadminbar {
          padding-right: 0;
        }

        .auto-fold #wpcontent {
          padding-right: 0;
        }

        #wpadminbar #wp-admin-bar-menu-toggle a {
          border: none !important;
        }

        #adminmenuwrap ul#adminmenu li.wp-not-current-submenu ul.wp-submenu {
          left: 0;
        }

        #adminmenu li.wp-not-current-submenu a.menu-top:focus + .wp-submenu,
        .js #adminmenu li.wp-not-current-submenu.opensub .wp-submenu,
        .js #adminmenu .sub-open,
        .no-js li.wp-has-submenu:hover .wp-submenu {
          top: 0;
        }

        #wpadminbar div.quicklinks ul#wp-admin-bar-root-default li a:before, #wpadminbar div.quicklinksiv.quicklinks ul#wp-admin-bar-root-default li a span.ab-icon, #wpadminbar div.quicklinks ul#wp-admin-bar-top-secondary li a:before, #wpadminbar div.quicklinks ul#wp-admin-bar-top-secondary li a span.ab-icon {
          font: 400 32px/1 dashicons !important;
        }
      }
      ";
    endif;
}

if (WP_ENV == 'development') {
    echo "<style>body.wp-admin #adminmenuback {border-right: 5px solid #4CD964;}</style>";
}

if (WP_ENV == 'staging') {
    echo "<style>body.wp-admin #adminmenuback {border-right: 5px solid #FF9500;}</style>";
}

if (isset($custom_css)) {
    wp_add_inline_style('custom-style', $custom_css);
}
?>
