<?php
/**
 * Implements hook_preprocess_html().
 * Can be used to hold preprocessors for generating variables before they are merged with the markup inside .tpl.php files.
 */
function dave_preprocess_html(&$vars) {
  $vars['html_attributes_array'] = array();
  $vars['body_attributes_array'] = array();
  // HTML element attributes.
  $vars['html_attributes_array']['lang'] = $vars['language']->language;
  $vars['html_attributes_array']['dir']  = $vars['language']->dir;
  // BODY element attributes.
  $vars['body_attributes_array']['class'] = $vars['classes_array'];
  $vars['body_attributes_array'] += $vars['attributes_array'];
  $vars['attributes_array'] = '';
}
/**
 * Implements hook_process_html().
 */
function dave_process_html(&$vars) {
  // Flatten out html_attributes and body_attributes.
  $vars['html_attributes'] = drupal_attributes($vars['html_attributes_array']);
  $vars['body_attributes'] = drupal_attributes($vars['body_attributes_array']);
}
/**
 * Implements hook_html_head_alter().
 */
function dave_html_head_alter(&$head_elements) {
  // Simplify the meta charset declaration.
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8',
  );
}
