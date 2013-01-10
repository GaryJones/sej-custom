<?php
// Repositions the nav and subnav bars
remove_action( 'genesis_before', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_after_header', 'genesis_do_subnav' );

// Moves the comment form above the comments
remove_action('genesis_comment_form', 'genesis_do_comment_form');
add_action('genesis_before_comments', 'genesis_do_comment_form');
