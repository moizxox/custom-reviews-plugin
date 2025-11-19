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
        
        <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); margin: 20px 0;">
            <h2 style="margin-top: 0;">Elementor Form Setup</h2>
            <p>Follow these steps to integrate the Custom Reviews plugin with your Elementor form:</p>
            
            <h3 style="margin-top: 25px;">Step 1: Add Required CSS Class to Form</h3>
            <p>In your Elementor form settings, add the following CSS class to the form widget:</p>
            <pre style="background: #f5f5f5; padding: 15px; border: 1px solid #ddd; overflow-x: auto; border-left: 4px solid #2271b1;"><code>cr-form</code></pre>
            <p><strong>How to add:</strong> Go to Elementor form widget → Advanced tab → CSS Classes → Add "cr-form"</p>
            
            <h3 style="margin-top: 25px;">Step 2: Required Form Field IDs</h3>
            <p>Your Elementor form must include the following fields with these exact field names:</p>
            <table class="wp-list-table widefat fixed striped" style="margin: 15px 0;">
                <thead>
                    <tr>
                        <th style="width: 200px;">Field Type</th>
                        <th style="width: 300px;">Field Name (ID)</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Hidden Field</strong></td>
                        <td><code>form_fields[cr_rating]</code></td>
                        <td>Stores the star rating value (0-5). This will be automatically updated by the star rating system.</td>
                    </tr>
                    <tr>
                        <td><strong>Text Field</strong></td>
                        <td><code>form_fields[cr_author]</code></td>
                        <td>Name of the reviewer (required).</td>
                    </tr>
                    <tr>
                        <td><strong>Textarea Field</strong></td>
                        <td><code>form_fields[cr_review]</code></td>
                        <td>Review text content (required).</td>
                    </tr>
                </tbody>
            </table>
            
            <h3 style="margin-top: 25px;">Step 3: Add Star Rating HTML</h3>
            <p>Add the star rating HTML to your form using an HTML widget or by adding it to your form template:</p>
            
            <label style="display: block; margin: 20px 0;">
                <input type="checkbox" id="enable_star_checkbox" style="margin-right: 8px;">
                <strong>Show Star Rating HTML Code</strong>
            </label>
            
            <div id="star_html_message" style="display: none; background: #f0f0f1; padding: 15px; border-left: 4px solid #2271b1; margin: 15px 0;">
                <h4 style="margin-top: 0;">Copy and paste this HTML into your Elementor form:</h4>
                <pre style="background: #fff; padding: 15px; border: 1px solid #ddd; overflow-x: auto;"><code>&lt;div class="stars"&gt;
  &lt;span class="star" data-value="1"&gt;★&lt;/span&gt;
  &lt;span class="star" data-value="2"&gt;★&lt;/span&gt;
  &lt;span class="star" data-value="3"&gt;★&lt;/span&gt;
  &lt;span class="star" data-value="4"&gt;★&lt;/span&gt;
  &lt;span class="star" data-value="5"&gt;★&lt;/span&gt;
&lt;/div&gt;

&lt;input type="hidden" id="cr_rating" name="form_fields[cr_rating]" value="0"&gt;</code></pre>
                <p><strong>Note:</strong> The hidden input field above is already included in the required fields list. Make sure it matches exactly.</p>
            </div>
            
            <h3 style="margin-top: 25px;">Step 4: Form Structure Summary</h3>
            <div style="background: #f9f9f9; padding: 15px; border-left: 4px solid #46b450; margin: 15px 0;">
                <p><strong>Your Elementor form should have this structure:</strong></p>
                <ol>
                    <li>Form widget with CSS class: <code>cr-form</code></li>
                    <li>Star rating HTML (from Step 3)</li>
                    <li>Hidden field: <code>form_fields[cr_rating]</code></li>
                    <li>Text field: <code>form_fields[cr_author]</code> (for reviewer name)</li>
                    <li>Textarea field: <code>form_fields[cr_review]</code> (for review text)</li>
                </ol>
            </div>
            
            <h3 style="margin-top: 25px;">Displaying Reviews</h3>
            <p>To display the review statistics on your page, use the following shortcode:</p>
            <pre style="background: #f5f5f5; padding: 15px; border: 1px solid #ddd; overflow-x: auto; border-left: 4px solid #2271b1;"><code>[cr_reviews]</code></pre>
            <p>This will show the average rating, star breakdown, and review count.</p>
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