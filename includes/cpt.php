<?php


function cr_register_cpt() {
    register_post_type('cr_review', [
        'label' => 'Reviews',
        'public' => true,
        'supports' => ['title', 'editor'],
        'menu_icon' => 'dashicons-media-text'
    ]);
}
add_action('init', 'cr_register_cpt');

function cr_add_review_metabox() {
    add_meta_box(
        'cr_review_count_box',      
        'Review Count',             
        'cr_review_metabox_html',   
        'cr_review',                
        'side',                     
        'default'                  
    );
}
add_action('add_meta_boxes', 'cr_add_review_metabox');

function cr_review_metabox_html($post) {
    $value = get_post_meta($post->ID, 'review_count', true);
    ?>
    <label for="review_count">Review Count:</label>
    <input type="number" id="review_count" name="review_count" value="<?php echo esc_attr($value); ?>" min="0" style="width: 100%;">
    <?php
}

function cr_save_review_meta($post_id) {
    if (isset($_POST['review_count'])) {
        update_post_meta($post_id, 'review_count', absint($_POST['review_count']));
    }
}
add_action('save_post', 'cr_save_review_meta');

