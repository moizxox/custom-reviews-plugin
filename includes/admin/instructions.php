<?php
function cr_add_cpt_submenu() {
    add_submenu_page(
        'edit.php?post_type=cr_review', // Parent: CPT menu
        'Review Plugin Instructions',   // Page title
        'Instructions',                 // Submenu label
        'manage_options',               // Permission
        'cr-review-guide',              // Slug
        'cr_instructions_page_html',    // Callback
    );
}
add_action('admin_menu', 'cr_add_cpt_submenu');

function cr_instructions_page_html() {
    ?>
    <div class="wrap">
        <h1>Review Plugin Instructions</h1>
        <p>Add your plugin usage instructions here.</p>
    </div>
    <?php
}
?>