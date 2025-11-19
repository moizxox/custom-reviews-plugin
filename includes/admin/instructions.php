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
        <h4>Put this HTML if you wanna go with stars</h4>
        <div>
        <div class="stars">
  <span class="star" data-value="1">★</span>
  <span class="star" data-value="2">★</span>
  <span class="star" data-value="3">★</span>
  <span class="star" data-value="4">★</span>
  <span class="star" data-value="5">★</span>
</div>

<input type="hidden" id="cr_rating" name="form_fields[cr_rating]" value="0">
        </div>
    </div>
    <?php
}
?>