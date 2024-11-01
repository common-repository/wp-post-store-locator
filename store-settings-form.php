<?php
if ( !defined( 'ABSPATH' ) ) exit;

$aka_store_setting = get_option('slwp_store_options');

?>

<div class="wrap">
    <h1><?php _e( 'Store Locator Settings', 'slwp-stores' ); ?></h1>
    <?php settings_errors(); ?>

    <div id="store-setting">

        <form method="POST" action="options.php" id="aka-store-setting-form">

            <div id="tabs-wrap">

                <ul class="nav-tab-wrapper">
                    <li class="nav-tab"><a href="#map-api-container" ><?php _e( 'Map Api', 'slwp-stores' ); ?></a></li>
                    <li class="nav-tab"><a href="#map-setting-container" ><?php _e( 'General', 'slwp-stores' ); ?></a></li>
                    <li class="nav-tab"><a href="#map-action-container" ><?php _e( 'Map Options', 'slwp-stores' ); ?></a></li>
                    <li class="nav-tab"><a href="#role-manager-container" ><?php _e( 'Roles', 'slwp-stores' ); ?></a></li>
                </ul>

                <?php if ( function_exists('wp_nonce_field') ) wp_nonce_field('aka_nonce_stores', 'validate_submit' ); ?>

                <div class="postbox-container" id="map-api-container">

                    <div class="metabox-container">

                        <h3 class="hndle">
                            <span><?php _e( 'Google Map Api', 'slwp-stores' ); ?></span>
                        </h3>
                        <div class="aka-inside-wrap">
                            <div class="elm-wrap">
                                <label for="aka-server-key">
                                    <?php _e('Server Key:', 'slwp-stores'); ?>
                                    <span class="aka-info">
                                        <span class="aka-info-text aka-hide"><?php echo sprintf( __( 'Get your server key %shere%s.', 'slwp-stores' ), '<a href="https://developers.google.com/maps/documentation/geocoding/get-api-key#get-an-api-key" target="_blank">', '</a>' ); ?>
                                        </span>
                                    </span>
                                </label>
                                <input type="text" name="aka_store_setting[server_key]" id="aka-server-key" value="<?php echo ( !empty( $aka_store_setting['server_key']) ) ? esc_attr( $aka_store_setting['server_key'] ) : ''; ?>" />
                            </div>
                            <div class="elm-wrap">
                                <label for="aka-browser-key">
                                    <?php _e( 'Browser Key:', 'slwp-stores' ); ?>
                                    <span class="aka-info">
                                        <span class="aka-info-text aka-hide"><?php echo sprintf( __( 'Get your browser key %shere%s', 'slwp-stores' ), '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key" target="_blank">', '</a>' ); ?>
                                        </span>
                                    </span>
                                </label>
                                <input type="text" name="aka_store_setting[browser_key]" id="aka-browser-key" value="<?php echo ( !empty( $aka_store_setting['browser_key']) ) ? esc_attr( $aka_store_setting['browser_key'] ) : ''; ?>" />
                            </div>
                            <div class="elm-wrap">
                                <label for="aka-api-language">
                                    <?php _e( 'Map Language:', 'slwp-stores' ); ?>
                                </label>
                                <select id="aka-api-language" name="aka_store_setting[language]">
                                    <?php echo slwp_stores_api_option_lists('language', esc_attr( $aka_store_setting['language'] ) ); ?>
                                </select>
                            </div>
                            <div class="elm-wrap">
                                <label for="aka-api-region">
                                    <?php _e( 'Map Region:', 'slwp-stores' ); ?>
                                </label>
                                <select id="aka-api-region" name="aka_store_setting[region]">
                                    <?php echo slwp_stores_api_option_lists('region', esc_attr( $aka_store_setting['region'] ) ); ?>
                                </select>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="postbox-container" id="map-setting-container">

                    <div class="metabox-container">

                        <h3 class="hndle">
                            <span><?php _e( 'General Map Setting', 'slwp-stores' ); ?></span>
                        </h3>
                        <div class="aka-inside-wrap">

                            <div class="elm-wrap">
                                <label for="map-start-point">
                                    <?php _e( 'Start Point:', 'slwp-stores' ); ?>
                                    <span class="aka-info">
                                        <span class="aka-info-text aka-hide">
                                            <?php _e( 'Required Field', 'slwp-stores' ); ?>
                                        </span>
                                    </span>
                                </label>
                                <input type="text" name="aka_store_setting[start_point]" id="map-start-point" value="<?php echo ( !empty( $aka_store_setting['start_point']) ) ? esc_attr( $aka_store_setting['start_point'] ) : ''; ?>" />
                                <input value="<?php echo ( !empty( $aka_store_setting['start_latlng']) ) ? esc_attr( $aka_store_setting['start_latlng'] ) : ''; ?>" name="aka_store_setting[start_latlng]" id="aka-latlng" type="hidden">
                            </div>
                            <div class="elm-wrap">
                                <label for="zoom-level">
                                    <?php _e( 'Initial zoom level:', 'slwp-stores' ); ?>
                                </label>
                                <?php echo slwp_stores_map_zoom_levels( intval( $aka_store_setting['zoom_level'] ) ); ?>
                            </div>
                            <div class="elm-wrap">
                                <label for="max-zoom-level">
                                    <?php _e( 'Max auto zoom level:', 'slwp-stores' ); ?>
                                </label>
                                <?php echo slwp_stores_max_map_zoom_levels( intval( $aka_store_setting['max_zoom_level'] ) ); ?>
                            </div>
                            <div class="elm-wrap">
                                <label for="direction-view-control">
                                    <?php _e( 'Get direction view control?', 'slwp-stores' ) ; ?>
                                </label>
                                <input type="checkbox" name="aka_store_setting[direction_view_control]" id="direction-view-control" value="" <?php checked( $aka_store_setting['direction_view_control'], true ); ?> />
                            </div>
                            <div class="elm-wrap">
                                <label for="map-type-control">
                                    <?php _e( 'Show the map type control?', 'slwp-stores' ) ; ?>
                                </label>
                                <input type="checkbox" name="aka_store_setting[map_type_control]" id="map-type-control" value="" <?php checked( $aka_store_setting['map_type_control'], true ); ?> />
                            </div>
                            <div class="elm-wrap">
                                <label for="scrollwheel-zoom">
                                    <?php _e( 'Enable scroll wheel zooming?', 'slwp-stores' ) ; ?>
                                </label>
                                <input type="checkbox" name="aka_store_setting[scrollwheel_zoom]" id="scrollwheel-zoom" value="" <?php checked( $aka_store_setting['scrollwheel_zoom'], true ); ?> />
                            </div>
                            <div class="elm-wrap">
                                <label for="map-type">
                                    <?php _e( 'Map Type', 'slwp-stores' ); ?>
                                </label>
                                <?php echo slwp_stores_map_type_options( esc_attr( $aka_store_setting['map_type'] ) ); ?>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="postbox-container" id="map-action-container">

                    <div class="metabox-container">

                        <h3 class="hndle">
                            <span><?php _e( 'Map Options', 'slwp-stores' ); ?></span>
                        </h3>
                        <div class="aka-inside-wrap">
                            <div class="elm-wrap">
                                <label for="enable-autocomplete">
                                    <?php _e( 'Enable autocomplete?', 'slwp-stores' ); ?>
                                </label>
                                <input type="checkbox" name="aka_store_setting[autocomplete]" id="enable-autocomplete" value="" <?php checked( $aka_store_setting['autocomplete'], true ); ?> />
                            </div>

                            <div class="elm-wrap">
                                <label for="distance-unit">
                                    <?php _e( 'Distance Unit:', 'slwp-stores' ); ?>
                                </label>
                                <span class="distance-boxes">
                                    <input type="radio" name="aka_store_setting[distance_unit]" id="unit-km" value="km" <?php checked( 'km', $aka_store_setting['distance_unit'] ); ?> />
                                    <label for="unit-km">Km</label>
                                    <input type="radio" name="aka_store_setting[distance_unit]" id="unit-mi" value="mi" <?php checked( 'mi', $aka_store_setting['distance_unit'] ); ?> />
                                    <label for="unit-mi">Mi</label>
                                </span>
                            </div>
                            <div class="elm-wrap">
                                <label for="max-search-results">
                                    <?php _e( 'Max search results:', 'slwp-stores' ); ?>
                                    <span class="aka-info">
                                        <span class="aka-info-text aka-hide">
                                            <?php _e( 'The default value is set between the [].', 'slwp-stores'); ?>
                                        </span>
                                    </span>
                                </label>
                                <input type="text" name="aka_store_setting[max_results]" id="max-search-results" value="<?php echo ( !empty( $aka_store_setting['max_results'] ) ) ? esc_attr( $aka_store_setting['max_results'] ) : ''; ?>">
                            </div>
                            <div class="elm-wrap">
                                <label for="search-radius-options">
                                    <?php _e( 'Search radius options:', 'slwp-stores' ); ?>
                                    <span class="aka-info">
                                        <span class="aka-info-text aka-hide">
                                            <?php _e( 'The default value is set between the [].', 'slwp-stores'); ?>
                                        </span>
                                    </span>
                                </label>
                                <input type="text" name="aka_store_setting[radius_options]" id="search-radius-options" value="<?php echo ( !empty( $aka_store_setting['radius_options'] ) ) ? esc_attr( $aka_store_setting['radius_options'] ) : ''; ?>">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="postbox-container" id="role-manager-container">

                    <div class="metabox-container">

                        <h3 class="hndle">
                            <span><?php _e('Role Manager', 'slwp-stores' ); ?></span>
                        </h3>
                        <div class="aka-inside-wrap">
                            <div class="elm-wrap">
                                <label for="post-type-select">
                                   <?php _e(' Select Post Type', 'slwp-stores' ); ?>
                               </label>
                               <span class="post-types-boxes">
                                <?php
                                $post_types = get_post_types(array(
                                    'public'    => true,
                                    'show_ui' => true,
                                    'show_in_menu' => true,
                                    ), 'objects');

                                foreach ($post_types as $post_type) {
                                    if ( 'attachment' == $post_type->name )
                                        continue;
                                    ?>
                                    <input type="checkbox" name="aka_store_setting[post_type][]" value="<?php echo $post_type->name; ?>" id="select-<?php echo $post_type->name; ?>" <?php if (isset($aka_store_setting['post_type']) && is_array($aka_store_setting['post_type'])) {
                                        if (in_array($post_type->name, $aka_store_setting['post_type'])) {
                                            echo 'checked="checked"';
                                        }
                                    }
                                    ?>>
                                    <label for="select-<?php echo $post_type->name; ?>">
                                        <?php echo esc_attr( $post_type->label ); ?>
                                    </label>

                                    <?php
                                }
                                ?>
                            </span>
                        </div>

                        <div class="elm-wrap">
                            <label for="show-description-field">
                                <?php _e( 'Show description field?', 'slwp-stores' ); ?>
                            </label>
                            <input type="checkbox" name="aka_store_setting[show_description_field]" id="show-description-field" value="1" <?php checked( $aka_store_setting['show_description_field'], true ); ?> />
                        </div>
                        <div class="elm-wrap">
                            <label for="show-phone-field">
                                <?php _e( 'Show phone field?', 'slwp-stores' ); ?>
                            </label>
                            <input type="checkbox" name="aka_store_setting[show_phone_field]" id="show-phone-field" value="1" <?php checked( $aka_store_setting['show_phone_field'], true ); ?> />
                        </div>
                        <div class="elm-wrap">
                            <label for="show-url-field">
                                <?php _e( 'Show url field?', 'slwp-stores' ); ?>
                            </label>
                            <input type="checkbox" name="aka_store_setting[show_url_field]" id="show-url-field" value="1" <?php checked( $aka_store_setting['show_url_field'], true ); ?> />
                        </div>

                    </div>
                </div>
            </div>
            <?php settings_fields( 'slwp_store_options' ); ?>
        </div>
        <p class="submit">
            <?php submit_button( __( 'Save Changes', 'slwp-stores' ), 'primary', 'submit_store', false ); ?>
        </p>
    </form>
</div>
</div>
<div class="clear"></div>