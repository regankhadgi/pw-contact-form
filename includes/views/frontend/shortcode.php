<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!!' );
$pwcf_settings = get_option( 'pwcf_settings' );
?>
<form class="pwcf-form" method="post" action="">
    <?php wp_nonce_field( 'pwcf_form_nonce', 'pwcf_form_nonce_field' ); ?>
    <?php
    if ( !empty( $_SESSION['pwcf_message'] ) ) {
        ?>
        <div class="pwcf-message-wrap"><?php
            echo esc_html( $_SESSION['pwcf_message'] );
            unset( $_SESSION['pwcf_message'] );
            ?></div>
        <?php
    }
    ?>
    <div class="pwcf-field-wrap">
        <label><?php echo (!empty( $pwcf_settings['name_field_label'] )) ? esc_html( $pwcf_settings['name_field_label'] ) : 'Your Name'; ?></label>
        <div class="pwcf-field">
            <input type="text" name="name_field" class="pwcf-name-field"/>
        </div>
    </div>
    <div class="pwcf-field-wrap">
        <label><?php echo (!empty( $pwcf_settings['email_field_label'] )) ? esc_html( $pwcf_settings['email_field_label'] ) : 'Your email'; ?></label>
        <div class="pwcf-field">
            <input type="text" name="email_field" class="pwcf-email-field"/>
        </div>
    </div>
    <div class="pwcf-field-wrap">
        <label><?php echo (!empty( $pwcf_settings['message_field_label'] )) ? esc_html( $pwcf_settings['message_field_label'] ) : 'Your message'; ?></label>
        <div class="pwcf-field">
            <textarea name="message" class="pwcf-message-field"></textarea>
        </div>
    </div>
    <div class="pwcf-field-wrap">
        <label></label>
        <div class="pwcf-field">
            <input type="submit" value="<?php echo (!empty( $pwcf_settings['submit_button_label'] )) ? esc_html( $pwcf_settings['submit_button_label'] ) : 'Save Settings'; ?>"/>
            <img src="<?php echo PWCF_URL . 'assets/images/ajax-loader.gif'; ?>" class="pwcf-ajax-loader" style="display:none;"/>
        </div>
    </div>
    <div class="pwcf-message-wrap" style="display: none;"></div>
</form>
