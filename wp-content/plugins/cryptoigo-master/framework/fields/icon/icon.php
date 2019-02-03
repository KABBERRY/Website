<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Icon
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CRYPTOIGOFramework_Option_icon extends CRYPTOIGOFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();

    $value  = $this->element_value();
    $hidden = ( empty( $value ) ) ? ' hidden' : '';

    echo '<div class="cryptoigo-icon-select">';
    echo '<span class="cryptoigo-icon-preview'. $hidden .'"><i class="'. $value .'"></i></span>';
    echo '<a href="#" class="button button-primary cryptoigo-icon-add">'. esc_html__( 'Add Icon', 'cryptoigo-framework' ) .'</a>';
    echo '<a href="#" class="button cryptoigo-warning-primary cryptoigo-icon-remove'. $hidden .'">'. esc_html__( 'Remove Icon', 'cryptoigo-framework' ) .'</a>';
    echo '<input type="text" name="'. $this->element_name() .'" value="'. $value .'"'. $this->element_class( 'cryptoigo-icon-value' ) . $this->element_attributes() .' />';
    echo '</div>';

    echo $this->element_after();

  }

}
