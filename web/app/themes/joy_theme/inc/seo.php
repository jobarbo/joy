<?php
/*------------------------------------*\
    SEO
\*------------------------------------*/

if( function_exists('register_field_group') ):

  // register field for TAG MANAGER
  register_field_group(array (
    'key' => 'group_5480be7ea041e',
    'title' => 'Google Tag Manager',
    'fields' => array (
      array (
        'key' => 'field_5480be88d3eb8',
        'label' => 'Code Google Tag Manager',
        'name' => 'gtm_code',
        'prefix' => '',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => 'GTM-XXXXXX',
        'placeholder' => 'GTM-XXXXXX',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options',
        ),
      ),
    ),
    'menu_order' => 10,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
  ));

endif;

?>