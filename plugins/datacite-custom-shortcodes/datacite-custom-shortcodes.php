<?php
    /*
    Plugin Name:  DataCite Custom Shortcodes
    Version: 1.0
    Description: Custom shortcodes used to generate DataCite members list, service providers list and citation badge.
    Author: Liz Krznarich
    */

    add_action( 'wp_enqueue_scripts', 'datacite_custom_shortcodes_enqueue_scripts', 20);

    function datacite_custom_shortcodes_enqueue_scripts() {
        wp_enqueue_style( 'datacite-custom-shortcodes', plugins_url('css/datacite-custom-shortcodes.css', __FILE__ ));
        wp_enqueue_script( 'members', plugins_url('js/members.js', __FILE__ ), array(), date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . '/js/members.js')), true);
        wp_enqueue_script( 'service-providers', plugins_url('js/service-providers.js', __FILE__ ), array(), date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . '/js/service-providers.js')), true);
        wp_enqueue_script( 'citation-widget', plugins_url('js/citation-widget.js', __FILE__ ), array(), date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . '/js/citation-widget.js')), true);

    }

    /**
     * [member_list] display a list of DataCite members, derived from the REST API
    */
    add_shortcode('member_list', 'datacite_memberlist_shortcode');
    add_shortcode('service_provider_list', 'datacite_service_provider_list_shortcode');

    function datacite_custom_shortcodes_init(){
        function datacite_memberlist_shortcode() {
            $string .= '<div id="memberslist" class="panel-group search-wide" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <a role="button" data-bs-toggle="collapse" href="#direct_member" aria-expanded="false" aria-controls="direct_member">
                                        <h2 id="direct_member_header" class="panel-title toggle-text">Direct Members</h2>
                                    </a>
                                </div>
                                <div id="direct_member" class="member-list panel-collapse collapse"></div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <a role="button" data-bs-toggle="collapse" href="#consortium" aria-expanded="false" aria-controls="consortium">
                                        <h2 id="consortium_header" class="panel-title toggle-text">Consortia</h2>
                                    </a>
                                </div>
                                <div id="consortium" class="member-list panel-collapse collapse"></div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <a role="button" data-bs-toggle="collapse" href="#member_only" aria-expanded="false" aria-controls="member_only">
                                        <h2 id="member_only_header" class="panel-title toggle-text">Supporting Members</h2>
                                    </a>
                                </div>
                                <div id="member_only" class="member-list panel-collapse collapse"></div>
                            </div>
                         </div>';
            return $string;
        }
        function datacite_service_provider_list_shortcode() {
            # $string .= '<div class="panel-group search-wide member-list" role="tablist" aria-multiselectable="true" id="service_provider_container"></div>';
            $string .= '<div class="panel-group search-wide" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <a role="button" data-bs-toggle="collapse" href="#service_providers_list" aria-expanded="false" aria-controls="service_providers_list">
                                        <h2 id="service_providers_list_header" class="panel-title toggle-text">DataCite Service Providers</h2>
                                    </a>
                                </div>
                                <div id="service_providers_list" class="member-list panel-collapse collapse"></div>
                            </div>
                        </div>';
            return $string;
        }
    }
    add_action('init', 'datacite_custom_shortcodes_init');
?>