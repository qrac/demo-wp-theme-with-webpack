<?php
//----------------------------------------------------
// iframe
//----------------------------------------------------

// Use iframe tag of all user
function allow_save_pre($content) {
  global $allowedposttags;

  $allowedposttags['iframe'] = array(
    'class' => array(),
    'src' => array(),
    'width' => array(),
    'height' => array(),
    'frameborder' => array(),
    'scrolling' => array(),
    'marginheight' => array(),
    'marginwidth' => array(),
    'allowfullscreen' => array()
  );

  return $content;
}
add_filter('content_save_pre', 'allow_save_pre');