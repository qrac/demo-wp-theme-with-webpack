<?php
//----------------------------------------------------
// Import
//----------------------------------------------------

function add_files() {
  define("TEMPLATE_DIRE", get_template_directory_uri());
  define("TEMPLATE_PATH", get_template_directory());

  function wp_css($css_name, $file_path) {
    wp_enqueue_style(
      $css_name, TEMPLATE_DIRE . $file_path, array(),
      date('YmdGis', filemtime(TEMPLATE_PATH . $file_path))
    );
  }

  function wp_script($script_name, $file_path, $bool = true) {
    wp_enqueue_script(
      $script_name, TEMPLATE_DIRE . $file_path, array('jquery'),
      date('YmdGis', filemtime(TEMPLATE_PATH . $file_path)), $bool
    );
  }

  if (!is_admin()) {
    wp_script('project-js', '/assets/build/project-bundle.js');
    wp_css('project-css', '/assets/build/project-bundle.css');
    wp_css('style', '/style.css');
  }
}
add_action('wp_enqueue_scripts', 'add_files');