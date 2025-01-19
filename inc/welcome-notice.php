<?php
/**
 * Getting Started Help Notic
 **/
function tech_blogging_general_admin_notice(){
?>
<div data-dismissible="disable-done-notice-forever" class="notice notice-info tech-blogging-welcome-notice">
    <div class="tech-blogging-notice-wrapper">
        <div class="tech-blogging-notice-inner">
            <div class="notice-thumbnail-col">
              <img src="<?php echo esc_url(get_theme_file_uri('screenshot.png'));?>" alt="<?php esc_attr_e('Tech Blogging Pro', 'tech-blogging');?>">
            </div>
            <div class="notice-content-col">
              <h3>
               <?php esc_html_e('Thank you for installing the Tech Blogging WordPress Theme.', 'tech-blogging'); ?>
              </h3>
              <p class="notice-desc">
              <?php esc_html_e('Ready to create a stunning Blog website? Click the Install Starter Author Website Templates button, and you\'ll be redirected to our demo page to get started.', 'tech-blogging'); ?>
              </p>
              <p>
              <a class="tech-blogging-btn-get-started button button-primary tech-blogging-button-padding" href="#" data-name="" data-slug="">
              <?php esc_html_e( 'Install Starter Author Website Templates', 'tech-blogging' );?></a>
              <a target="_blank" href="<?php echo esc_url('https://rswpthemes.com/shofy/demo');?>" class="button button-highlight btn-doc button-primary" style="color:#fff;">
              <?php esc_html_e( ' View Demo', 'tech-blogging' );?></a>
              <a target="_blank" href="<?php echo esc_url(tech_blogging_utm_url('welcome_notice'));?>" class="button button-highlight upgrade-to-pro button-primary"><?php esc_html_e( 'Upgrade To Pro', 'tech-blogging' );?></a>
              <a href="?tech_blogging_notice_dismissed" style="text-decoration: none; float: right;">
              <?php esc_html_e( 'Dismiss Notice', 'tech-blogging' );?></a>
              </p>
            </div>
        </div>
    </div>
</div>
<?php
}

if ( isset( $_GET['tech_blogging_notice_dismissed'] ) ){
   update_option('tech_blogging_help_notice', 'notice_tech_blogging_dismissed');
   set_transient('tech_blogging_wn_dismissed_time', time(), 24 * 60 * 60);
}

add_action('admin_init', function(){
    $tech_blogging_help_notice = get_option('tech_blogging_help_notice', '');
    if('tech_blogging_notice_dismissed' === $tech_blogging_help_notice) {
        $dismissed_time = get_transient('tech_blogging_wn_dismissed_time');
        if (false === $dismissed_time && time() > $dismissed_time + ( 24 * 60 * 60 )) {
            delete_option('tech_blogging_notice_dismissed');
            delete_transient('tech_blogging_wn_dismissed_time');
            add_action('admin_notices', 'tech_blogging_general_admin_notice');
        }
    }
});

$tech_blogging_help_notice = get_option('tech_blogging_help_notice', '');
if (($tech_blogging_help_notice != 'notice_tech_blogging_dismissed' || $tech_blogging_help_notice === '') ){
   add_action('admin_notices', 'tech_blogging_general_admin_notice');
}