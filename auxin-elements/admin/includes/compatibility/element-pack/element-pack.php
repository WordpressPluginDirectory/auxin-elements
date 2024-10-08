<?php
/**
 * Remove license notices for elementor pack
 *
 * @return void
 */
function auxin_compatibility_element_pack_remove_license_notice(){
    update_user_meta( get_current_user_id(), 'element-pack-notice-id-license-issue', true );
    set_transient( 'element-pack-notice-id-license-issue', true, YEAR_IN_SECONDS );
}

add_action( 'auxin_plugin_updated', 'auxin_compatibility_element_pack_remove_license_notice');

/**
 * bypass element pack license activation process for our clients
 *
 * @return true|void
 */
function auxin_activate_element_pack_license() {
    if ( ! function_exists( 'element_pack_pro_activated' ) ) {
       function element_pack_pro_activated() {
           return true;
       }
    }
}
add_action( 'plugins_loaded', 'auxin_activate_element_pack_license', 8);