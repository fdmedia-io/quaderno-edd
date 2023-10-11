<?php
/**
* EDD Purchase Receipt email tags
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Register the Quaderno invoice URL email tag.
 *
 * @return void
 */
function edd_quaderno_add_email_tags( $post_id ) {
    edd_add_email_tag( 'quaderno_invoice_url', __( 'The Quaderno invoice URL for this purchase.', 'edd-quaderno' ), 'edd_quaderno_invoice_url_tag' );
}
add_action( 'edd_add_email_tags', 'edd_quaderno_add_email_tags', 100 );

/**
 * Output Quaderno invoice URL email tag
 *
 * @param   int $payment_id
 * @return  string
 */
function edd_quaderno_invoice_url_tag( $payment_id = 0 ) {
    if ( empty( edd_get_order_meta( $payment_id, '_quaderno_invoice_id', true ) ) ) {
        return '';
    }
    $url = esc_url( edd_get_order_meta( $payment_id, '_quaderno_url', true ) );
    return '<a href="' . $url . '">' . $url . '</a>';
}
