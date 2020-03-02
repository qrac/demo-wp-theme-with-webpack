<?php
//----------------------------------------------------
// Remove
//----------------------------------------------------

// Disable pinback
add_filter('xmlrpc_enabled', '__return_false');

// Remove comment feed
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

// Remove emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove oEmbed
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('template_redirect', 'rest_output_link_header', 11);

// Remove post system
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// Remove short url
remove_action('wp_head', 'wp_shortlink_wp_head');

// Remove version of WordPress
remove_action('wp_head', 'wp_generator');

// Remove admin bar of site
add_filter( 'show_admin_bar', '__return_false' );

// Remove dns prefetch
function remove_dns_prefetch($hints, $relation_type) {
  if ('dns-prefetch' === $relation_type) {
    return array_diff(wp_dependencies_unique_hosts(), $hints);
  }
  return $hints;
}
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);

// Remove more id
function remove_more_jump_link($link) {
  $offset = strpos($link, '#more-');
  if ($offset) {
    $end = strpos($link, '"', $offset);
  }
  if ($end) {
    $link = substr_replace($link, '', $offset, $end - $offset);
  }
  return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');