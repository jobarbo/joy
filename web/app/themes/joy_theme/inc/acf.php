<?php
/*------------------------------------*\
    ACF - CUSTOM FIELDS
\*------------------------------------*/

//
//
// ADD OPTION PAGE
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}


if( function_exists('acf_add_local_field_group') ):
// FLEXIBLE CONTENT

acf_add_local_field_group(array (
  'key' => 'group_5730e2f84050e',
  'title' => 'Flexible content',
  'fields' => array (
    array (
      'key' => 'field_5730e36e18cdf',
      'label' => 'Flexible content',
      'name' => 'flexible_content',
      'type' => 'flexible_content',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'button_label' => 'Add a block',
      'min' => '',
      'max' => '',
      'layouts' => array (
        array (
          'key' => '5730e3821d32b',
          'name' => 'wysiwyg',
          'label' => 'Wysiwyg',
          'display' => 'block',
          'sub_fields' => array (
            array (
              'key' => 'field_5730e39218ce0',
              'label' => 'Wysiwyg',
              'name' => 'text',
              'type' => 'wysiwyg',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'tabs' => 'all',
              'toolbar' => 'full',
              'media_upload' => 1,
            ),
          ),
          'min' => '',
          'max' => '',
        ),
        array (
          'key' => '5730e65818ce2',
          'name' => 'image',
          'label' => 'Image',
          'display' => 'block',
          'sub_fields' => array (
            array (
              'key' => 'field_5730e65818ce3',
              'label' => 'Image',
              'name' => 'image',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'array',
              'preview_size' => 'thumbnail',
              'library' => 'all',
              'min_width' => '',
              'min_height' => '',
              'min_size' => '',
              'max_width' => '',
              'max_height' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
          ),
          'min' => '',
          'max' => '',
        ),
        array (
          'key' => '5730e68e18ce4',
          'name' => 'quote',
          'label' => 'Quote',
          'display' => 'block',
          'sub_fields' => array (
            array (
              'key' => 'field_5730e68e18ce5',
              'label' => 'Quote',
              'name' => 'quote',
              'type' => 'textarea',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'maxlength' => '',
              'rows' => '',
              'new_lines' => 'wpautop',
              'readonly' => 0,
              'disabled' => 0,
            ),
          ),
          'min' => '',
          'max' => '',
        ),
        array (
          'key' => '5730e6a518ce6',
          'name' => 'slider',
          'label' => 'Slider',
          'display' => 'block',
          'sub_fields' => array (
            array (
              'key' => 'field_5730e6a518ce7',
              'label' => 'Caroussel',
              'name' => 'slider',
              'type' => 'repeater',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'min' => 1,
              'max' => '',
              'layout' => 'block',
              'button_label' => 'Add a slide',
              'sub_fields' => array (
                array (
                  'key' => 'field_5730e6cf18ce8',
                  'label' => 'Image',
                  'name' => 'image',
                  'type' => 'image',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'return_format' => 'array',
                  'preview_size' => 'thumbnail',
                  'library' => 'all',
                  'min_width' => '',
                  'min_height' => '',
                  'min_size' => '',
                  'max_width' => '',
                  'max_height' => '',
                  'max_size' => '',
                  'mime_types' => '',
                ),
                array (
                  'key' => 'field_5730e6da18ce9',
                  'label' => 'Legend',
                  'name' => 'legend',
                  'type' => 'text',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'default_value' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => '',
                  'maxlength' => '',
                  'readonly' => 0,
                  'disabled' => 0,
                ),
                array (
                  'key' => 'field_573377522e582',
                  'label' => 'Add a link',
                  'name' => 'add_link',
                  'type' => 'true_false',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'message' => '',
                  'default_value' => 0,
                ),
                array (
                  'key' => 'field_573376ceedb56',
                  'label' => 'External link',
                  'name' => 'link',
                  'type' => 'url',
                  'instructions' => '',
                  'required' => 1,
                  'conditional_logic' => array (
                    array (
                      array (
                        'field' => 'field_573377522e582',
                        'operator' => '==',
                        'value' => '1',
                      ),
                    ),
                  ),
                  'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'default_value' => '',
                  'placeholder' => '',
                ),
                array (
                  'key' => 'field_573376e7edb57',
                  'label' => 'Label',
                  'name' => 'label',
                  'type' => 'text',
                  'instructions' => '',
                  'required' => 1,
                  'conditional_logic' => array (
                    array (
                      array (
                        'field' => 'field_573377522e582',
                        'operator' => '==',
                        'value' => '1',
                      ),
                    ),
                  ),
                  'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'default_value' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => '',
                  'maxlength' => '',
                  'readonly' => 0,
                  'disabled' => 0,
                ),
              ),
            ),
          ),
          'min' => '',
          'max' => '',
        ),
      ),
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'page',
      ),
    ),
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'post',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'acf_after_title',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

endif;
?>