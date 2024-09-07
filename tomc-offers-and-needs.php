<?php
/* 
    Plugin Name: TOMC Offers and Needs
    Version: 1.0
    Author: Joanna
    Description: Allows community members to post and respond to offers and needs
*/

if( ! defined('ABSPATH') ) exit;
// require_once plugin_dir_path(__FILE__) . 'inc/tomc-offers-needs-route.php';

class TOMCOffersAndNeedsPlugin {
    function __construct() {
        global $wpdb;
        $this->charset = $wpdb->get_charset_collate();
        $this->offers_table = $wpdb->prefix . "tomc_offers";
        $this->needs_table = $wpdb->prefix . "tomc_needs";
        $this->users_table = $wpdb->prefix . "users";
        $this->offer_responses_table = $wpdb->prefix . "tomc_offer_responses";
        $this->need_responses_table = $wpdb->prefix . "tomc_need_responses";

        add_action('activate_tomc-offers-and-needs/tomc-offers-and-needs.php', array($this, 'onActivate'));
        // add_action('init', array($this, 'onActivate'));
        add_action('wp_enqueue_scripts', array($this, 'pluginFiles'));
        add_filter('template_include', array($this, 'loadTemplate'), 99);
    }

    function onActivate() {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        if (post_exists('Community Offers', '', '', 'page', 'publish') == 0){
            $this->addCommunityOffersPage();
        }

        if (post_exists('Community Needs', '', '', 'page', 'publish') == 0){
            $this->addCommunityNeedsPage();
        }

        if (post_exists('Offers and Needs', '', '', 'page', 'publish') == 0){
            $this->addOffersAndNeedsPage();
        }

        if (post_exists('My Offers', '', '', 'page', 'publish') == 0){
            $this->addMyOffersPage();
        }

        if (post_exists('My Needs', '', '', 'page', 'publish') == 0){
            $this->addMyNeedsPage();
        }

        dbDelta("CREATE TABLE IF NOT EXISTS $this->offers_table (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            offername varchar(60) NOT NULL,
            offerdescription varchar(1000) NOT NULL,
            offerrequirements varchar(500) NOT NULL,
            offerkeywords varchar(1000) NOT NULL,
            createdby bigint(20) unsigned NOT NULL,
            createddate datetime NOT NULL,
            offerstartdate datetime NOT NULL,
            offerenddate datetime NOT NULL,
            PRIMARY KEY  (id),
            FOREIGN KEY  (createdby) REFERENCES $this->users_table(id)
        ) $this->charset;");

        dbDelta("CREATE TABLE IF NOT EXISTS $this->needs_table (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            needname varchar(60) NOT NULL,
            needdescription varchar(1000) NOT NULL,
            needkeywords varchar(1000) NOT NULL,
            createdby bigint(20) unsigned NOT NULL,
            createddate datetime NOT NULL,
            needenddate datetime NOT NULL,
            PRIMARY KEY  (id),
            FOREIGN KEY  (createdby) REFERENCES $this->users_table(id)
        ) $this->charset;");

        dbDelta("CREATE TABLE IF NOT EXISTS $this->offer_responses_table (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            offerid varchar(60) NOT NULL,
            contactinfo varchar(200) NOT NULL,        
            submittedby bigint(20) unsigned NOT NULL,
            submitteddate datetime NOT NULL,
            responsetext varchar(1000) NOT NULL,
            responsestatus varchar(20) NOT NULL DEFAULT 'awaiting review',
            followupnote varchar(200) NULL,
            PRIMARY KEY  (id),
            FOREIGN KEY  (offerid) REFERENCES $this->offers_table(id),
            FOREIGN KEY  (submittedby) REFERENCES $this->users_table(id)
        ) $this->charset;");

        dbDelta("CREATE TABLE IF NOT EXISTS $this->need_responses_table (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            needid varchar(60) NOT NULL,
            contactinfo varchar(200),
            submittedby bigint(20) unsigned NOT NULL,
            submitteddate datetime NOT NULL,
            responsetext varchar(1000) NOT NULL,
            responsestatus varchar(20) NOT NULL DEFAULT 'awaiting review',
            followupnote varchar(200) NULL,
            PRIMARY KEY  (id),
            FOREIGN KEY  (needid) REFERENCES $this->needs_table(id),
            FOREIGN KEY  (submittedby) REFERENCES $this->users_table(id)
        ) $this->charset;");
    }

    function addCommunityOffersPage() {
        $communityoffers_page = array(
            'post_title' => 'Community Offers',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 0,
            'post_type' => 'page'
        );
        wp_insert_post($communityoffers_page);
    }

    function addCommunityNeedsPage() {
        $communityneeds_page = array(
            'post_title' => 'Community Needs',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 0,
            'post_type' => 'page'
        );
        wp_insert_post($communityneeds_page);
    }

    function addOffersAndNeedsPage() {
        $offersandneeds_page = array(
            'post_title' => 'Offers and Needs',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 0,
            'post_type' => 'page'
        );
        wp_insert_post($offersandneeds_page);
    }

    function addMyOffersPage() {
        $myoffers_page = array(
            'post_title' => 'My Offers',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 0,
            'post_type' => 'page'
        );
        wp_insert_post($myoffers_page);
    }

    function addMyNeedsPage() {
        $myneeds_page = array(
            'post_title' => 'My Needs',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 0,
            'post_type' => 'page'
        );
        wp_insert_post($myneeds_page);
    }

    function registerScripts(){
        wp_register_style('tomc_offers_and_needs_styles', plugins_url('css/tomc-offers-and-needs-styles.css', __FILE__), false, '1.0', 'all');
    }

    function pluginFiles(){
        wp_enqueue_script('tomc-offers-needs-js', plugin_dir_url(__FILE__) . '/build/index.js', array('jquery'), '1.0', true);
        wp_localize_script('tomc-offers-needs-js', 'tomcBookorgData', array(
            'root_url' => get_site_url()
        ));
    }

    function loadTemplate($template){
        if (is_page('community-offers')){
            return plugin_dir_path(__FILE__) . 'inc/template-community-offers.php';
        } elseif (is_page('community-needs')){
            return plugin_dir_path(__FILE__) . 'inc/template-community-needs.php';
        }elseif (is_page('my-offers')){
            return plugin_dir_path(__FILE__) . 'inc/template-my-offers.php';
        }elseif (is_page('my-needs')){
            return plugin_dir_path(__FILE__) . 'inc/template-my-needs.php';
        } elseif (is_page('offers-and-needs')){
            return plugin_dir_path(__FILE__) . 'inc/template-offers-and-needs.php';
        } else
        return $template;
    }
}

$tomcOffersAndNeeds = new TOMCOffersAndNeedsPlugin();