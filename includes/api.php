<?php

function cr_register_api_routes() {
    register_rest_route('cr/v1', '/add-review', [
        'methods'  => 'POST',
        'callback' => 'cr_create_review',
        'permission_callback' => '__return_true'
    ]);
}

function cr_create_review($req) {
    $rating = sanitize_text_field($req['rating']);
    $author = sanitize_text_field($req['author']);
    $review = sanitize_textarea_field($req['review']);

    $post_id = wp_insert_post([
        'post_type'   => 'cr_review',
        'post_status' => 'publish',
        'post_title'  => $author,
        'post_content'=> $review
    ]);

    update_post_meta($post_id, 'review_count', $rating);

    return ['success' => true];
}
