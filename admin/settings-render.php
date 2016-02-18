<div class="wrap croissant-wrap">
  <h1>Croissant Admin Theme / settings</h1>
  <form method="post" action="options.php">
  <?php
    // This prints out all hidden setting fields
    settings_fields( 'croissant_options' );
    ?>
    <div class="croissant-box croissant-themes">
      <div class="croissant-box-header">
        <h2>Choose a layout</h2>
      </div>

      <div class="croissant-box-body">
        <div id="croissant_themes">
          <input type="radio" id="theme_default" name="croissant_theme" value="default" <?php checked('default', get_option('croissant_theme', 'default'), true); ?>>
          <label for="theme_default">
            <img src="<?php echo plugins_url( 'assets/images/theme-default.svg', dirname(__FILE__) ); ?>">
            <p>Default</p>
          </label>

          <input type="radio" id="theme_light" name="croissant_theme" value="light" <?php checked('light', get_option('croissant_theme', 'default'), true); ?>>
          <label for="theme_light">
            <img src="<?php echo plugins_url( 'assets/images/theme-light.svg', dirname(__FILE__) ); ?>">
            <p>Feathery Light</p>
          </label>

          <input type="radio" id="theme_clean" name="croissant_theme" value="clean" <?php checked('clean', get_option('croissant_theme', 'default'), true); ?>>
          <label for="theme_clean">
            <img src="<?php echo plugins_url( 'assets/images/theme-clean.svg', dirname(__FILE__) ); ?>">
            <p>Clean as a whistle</p>
          </label>
        </div>

        <div class="croissant-box-inside">
          <h3>Edit theme</h3>

          <?php
          $option_c1 = get_option('croissant_color_1');
          $option_c2 = get_option('croissant_color_2');
          $option_c3 = get_option('croissant_color_3');
          $option_c4 = get_option('croissant_color_4');

          $option_theme = get_option('croissant_theme', 'default');
          if( $option_theme === 'default' ){
            $default1 = '#f2f2f2';
            $default2 = '#364052';
            $default3 = '#242B37';
            $default4 = '#4BA0D9';
          } elseif( $option_theme === 'light' ){
            $default1 = '#FFFFFF';
            $default2 = '#E9EBEE';
            $default3 = '#575757';
            $default4 = '#4BD9AC';
          } elseif( $option_theme === 'clean' ){
            $default1 = '#F2F2F2';
            $default2 = '#364052';
            $default3 = '#e0e0e0';
            $default4 = '#FF8174';
          }

          if( !empty($option_c1) || !empty($option_c2) || !empty($option_c3) || !empty($option_c4) ){
            if( !empty($option_c1) ){
              echo '<input id="croissant_color_1" class="wp-color-picker custom-color" name="croissant_color_1" type="text" value="' . get_option('croissant_color_1') . '">';
            } else {
              echo '<input id="croissant_color_1" class="wp-color-picker custom-color" name="" type="text" value="' . $default1 . '">';
            }

            if( !empty($option_c2) ){
              echo '<input id="croissant_color_2" class="wp-color-picker custom-color" name="croissant_color_2" type="text" value="' . get_option('croissant_color_2') . '">';
            } else {
              echo '<input id="croissant_color_2" class="wp-color-picker custom-color" name="" type="text" value="' . $default2 . '">';
            }

            if( !empty($option_c3) ){
              echo '<input id="croissant_color_3" class="wp-color-picker custom-color" name="croissant_color_3" type="text" value="' . get_option('croissant_color_3') . '">';
            } else {
              echo '<input id="croissant_color_3" class="wp-color-picker custom-color" name="" type="text" value="' . $default3 . '">';
            }

            if( !empty($option_c4) ){
              echo '<input id="croissant_color_4" class="wp-color-picker custom-color" name="croissant_color_4" type="text" value="' . get_option('croissant_color_4') . '">';
            } else {
              echo '<input id="croissant_color_4" class="wp-color-picker custom-color" name="" type="text" value="' . $default4 . '">';
            }
          } else {
            ?>
            <input id="croissant_color_1" class="wp-color-picker custom-color" name="" type="text" value="<?php echo $default1; ?>">
            <input id="croissant_color_2" class="wp-color-picker custom-color" name="" type="text" value="<?php echo $default2; ?>">
            <input id="croissant_color_3" class="wp-color-picker custom-color" name="" type="text" value="<?php echo $default3; ?>">
            <input id="croissant_color_4" class="wp-color-picker custom-color" name="" type="text" value="<?php echo $default4; ?>">
            <?php
          }
          ?>

          <input id="remove_customColors_button" class="button" type="button" value="Reset all" />
        </div>
      </div>
    </div>

    <div class="croissant-box croissant-login">
      <div class="croissant-box-header">
        <h2>Custom login screen</h2>
      </div>

      <div id="croissant-custom-login" class="croissant-box-body">
        <p>Choose a logo for your login page. Recommended size is at least 150x150.</p>

        <div class="croissant-box-inside">
          <img id="croissant_logo_preview" src="<?php echo esc_url( get_option('croissant_logo') ); ?>" />

          <div>
            <input id="upload_image" type="text" size="36" name="croissant_logo" value="<?php echo esc_url( get_option('croissant_logo') ); ?>" />
            <input id="upload_image_button" class="button button-primary" type="button" value="Choose logo" />
            <input id="remove_image_button" class="button" type="button" value="Remove logo" data-image="<?php if( ! empty(get_option('croissant_logo')) ): echo 'present'; endif; ?>" />
          </div>
        </div>

        <p>Choose a color or image for the background of the login page.</p>
        <div class="croissant-box-inside">
          <div class="croissant-radio-option">
            <input type="radio" id="bg_color" name="croissant_bg" value="color" <?php checked('color', get_option('croissant_bg'), true); ?>>
            <label for="bg_color">
              <p>color</p>
            </label>

            <div class="croissant-radio-color">
              <input id="croissant_bg_color" class="wp-color-picker custom-color" name="croissant_bg_color" type="text" value="<?php echo get_option('croissant_bg_color'); ?>">
            </div>
          </div>

          <div class="croissant-radio-option">
            <input type="radio" id="bg_image" name="croissant_bg" value="image" <?php checked('image', get_option('croissant_bg'), true); ?>>
            <label for="bg_image">
              <p>image</p>
            </label>

            <div class="croissant-radio-image">
              <img id="croissant_bg_preview" src="<?php echo esc_url( get_option('croissant_bg_image') ); ?>" />

              <div>
                <input id="upload_bg_image" type="text" size="36" name="croissant_bg_image" value="<?php echo esc_url( get_option('croissant_bg_image') ); ?>" />
                <input id="upload_bg_image_button" class="button button-primary" type="button" value="Choose image" />
                <input id="remove_bg_image_button" class="button" type="button" value="Remove image" data-image="<?php if( ! empty(get_option('croissant_bg_image')) ): echo 'present'; endif; ?>" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    submit_button();
  ?>
  </form>
</div>
