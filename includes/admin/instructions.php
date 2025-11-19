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
        
        <label style="display: block; margin: 20px 0;">
            <input type="checkbox" id="enable_star_checkbox" style="margin-right: 8px;">
            <strong>Enable Star</strong>
        </label>
        
        <div id="star_html_message" style="display: none; background: #f0f0f1; padding: 15px; border-left: 4px solid #2271b1; margin: 15px 0;">
            <h4 style="margin-top: 0;">Use this HTML if you want to go with stars:</h4>
            <pre style="background: #fff; padding: 15px; border: 1px solid #ddd; overflow-x: auto;"><code>&lt;div class="stars"&gt;
  &lt;span class="star" data-value="1"&gt;★&lt;/span&gt;
  &lt;span class="star" data-value="2"&gt;★&lt;/span&gt;
  &lt;span class="star" data-value="3"&gt;★&lt;/span&gt;
  &lt;span class="star" data-value="4"&gt;★&lt;/span&gt;
  &lt;span class="star" data-value="5"&gt;★&lt;/span&gt;
&lt;/div&gt;

&lt;input type="hidden" id="cr_rating" name="form_fields[cr_rating]" value="0"&gt;</code></pre>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('enable_star_checkbox');
        const messageDiv = document.getElementById('star_html_message');
        
        if (checkbox && messageDiv) {
            checkbox.addEventListener('change', function() {
                messageDiv.style.display = this.checked ? 'block' : 'none';
            });
        }
    });
    </script>
    <?php
}
?>