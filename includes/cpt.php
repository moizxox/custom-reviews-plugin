
<?php

function cr_register_cpt() {
    register_post_type('cr_review', [
        'label' => 'Reviews',
        'public' => true,
        'supports' => ['title', 'editor'],
        'menu_icon' => 'dashicons-star-filled'
    ]);
}
