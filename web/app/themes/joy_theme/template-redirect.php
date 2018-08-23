<?php
/*
Template Name: First child redirect
*/
$children = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if ($children) {
$firstchild = $children[0];
wp_redirect(get_permalink($firstchild->ID));
} else {
// Do whatever templating you want as a fall-back.
}
?>