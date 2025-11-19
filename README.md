# Custom Reviews Plugin

A lightweight WordPress plugin for managing and displaying customer reviews with star ratings. Perfect for integrating with Elementor forms and displaying review statistics on your website.

## Features

- ⭐ **Star Rating System** - Interactive 5-star rating interface
- 📊 **Review Statistics** - Display average ratings and breakdown by star count
- 🎨 **Elementor Integration** - Seamlessly works with Elementor forms
- 📝 **Custom Post Type** - Dedicated review management in WordPress admin
- 🔌 **REST API** - Submit reviews via REST API endpoints
- 🎯 **Shortcode Support** - Easy display of review statistics anywhere

## Installation

1. Download or clone this repository
2. Upload the `custom-reviews` folder to `/wp-content/plugins/`
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Navigate to **Reviews > Instructions** for setup guide

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Elementor (optional, for form integration)

## Usage

### Display Review Statistics

Use the shortcode to display review statistics anywhere on your site:

```
[cr_reviews]
```

This will show:
- Average rating (out of 5.0)
- Visual star representation
- Breakdown by star rating (5★ to 1★)
- Review count for each rating

### Elementor Form Integration

#### Step 1: Add CSS Class
Add the class `cr-form` to your Elementor form widget:
- Go to Elementor form widget → **Advanced** tab → **CSS Classes** → Add `cr-form`

#### Step 2: Required Form Fields
Your Elementor form must include these fields with exact field names:

| Field Type | Field Name (ID) | Description |
|------------|----------------|-------------|
| Hidden Field | `form_fields[cr_rating]` | Stores the star rating value (0-5) |
| Text Field | `form_fields[cr_author]` | Name of the reviewer |
| Textarea Field | `form_fields[cr_review]` | Review text content |

#### Step 3: Add Star Rating HTML
Add this HTML to your form (using HTML widget or form template):

```html
<div class="stars">
  <span class="star" data-value="1">★</span>
  <span class="star" data-value="2">★</span>
  <span class="star" data-value="3">★</span>
  <span class="star" data-value="4">★</span>
  <span class="star" data-value="5">★</span>
</div>

<input type="hidden" id="cr_rating" name="form_fields[cr_rating]" value="0">
```

### REST API

Submit reviews programmatically via REST API:

**Endpoint:** `POST /wp-json/cr/v1/add-review`

**Parameters:**
- `rating` (string) - Rating value (1-5)
- `author` (string) - Reviewer name
- `review` (string) - Review text

**Example:**
```javascript
fetch('/wp-json/cr/v1/add-review', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({
        rating: '5',
        author: 'John Doe',
        review: 'Great product!'
    })
})
```

### Custom Meta Fields

The plugin stores review ratings in post meta with the key:
- **Meta Key:** `review_count`
- **Value:** Integer (1-5)

You can access this in Elementor dynamic tags using the **Post Meta** dynamic tag with meta key `review_count`.

## File Structure

```
custom-reviews/
├── assets/
│   ├── css/
│   │   └── style.css          # Plugin styles
│   └── js/
│       └── form-handler.js    # Form submission handler
├── includes/
│   ├── admin/
│   │   └── instructions.php   # Admin instructions page
│   ├── api.php                # REST API endpoints
│   ├── cpt.php                # Custom post type registration
│   ├── helpers.php            # Helper functions
│   └── shortcode.php          # Shortcode implementation
├── custom-reviews.php         # Main plugin file
└── README.md                  # This file
```

## Customization

### Styling
All plugin styles are in `assets/css/style.css`. You can override styles by targeting the plugin classes:

- `.cr-box` - Main review statistics container
- `.cr-avg` - Average rating display
- `.cr-star-full` - Filled stars
- `.cr-star-empty` - Empty stars
- `.cr-form` - Form wrapper for styling

### JavaScript
Form handling logic is in `assets/js/form-handler.js`. The script:
- Handles star rating clicks
- Updates hidden rating field
- Intercepts form submission for custom processing

## Admin Features

- **Custom Post Type:** Manage reviews in WordPress admin under "Reviews"
- **Review Count Meta Box:** Edit rating directly from post editor
- **Instructions Page:** Detailed setup guide under Reviews > Instructions

## Changelog

### 1.0.0
- Initial release
- Star rating system
- Elementor form integration
- Review statistics shortcode
- REST API support

## Support

For detailed setup instructions, visit **Reviews > Instructions** in your WordPress admin panel.

## Author

**Moiz**
- Website: [moiz.codeletdigital.com](https://moiz.codeletdigital.com)
- GitHub: [@moizxox](https://github.com/moizxox)

## License

This plugin is open source. Feel free to use and modify as needed.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.
