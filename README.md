# hellion
 Hellion theme and plugins for WP made on the basis of the https://html5up.net/zerofour responsive HTML template

 Made as a project for Softuni Wordpress For Developers course that started in October 2024

## Theme:
The theme fucntions enable post thumbnails, enqueue styles and scripts, register menus and widget areas, create a custom post type for testimonials with meta boxes for additional details, and customize the query for date and author archives.

## Plugins
The Hellion Reviews plugin provides a comprehensive solution for managing and displaying reviews on a WordPress site. Here is a summary of its functionalities:

### Custom Post Type:

Registers a custom post type called "Reviews" with support for title, editor, thumbnail, and custom fields.

Reviews are publicly accessible and included in the REST API for compatibility with the Gutenberg editor.

### Genres Taxonomy:

Registers a hierarchical taxonomy called "Genres" to categorize reviews.

This taxonomy is also included in the REST API for ease of use.

### Scripts and Styles:

Enqueues a custom JavaScript file (hellion-reviews.js) for handling AJAX requests.

Localizes the AJAX URL for use in the frontend scripts.

### AJAX Filtering:

Implements AJAX functionality to filter reviews by genre.

Handles AJAX requests to return reviews based on the selected genre.

### Like and Dislike Buttons:

Adds "Like" and "Dislike" buttons to each review post, allowing users to express their opinions.

Displays the current count of likes and dislikes.

Uses AJAX to handle like and dislike actions, updating the counts dynamically.

### Shortcode:

Registers a [hellion_reviews] shortcode to display reviews on any page or post.

The shortcode accepts attributes to filter reviews by genre, order them by date, and limit the number of reviews displayed.

---	

This Hellion Snow Posts plugin adds festive effects to WordPress posts tagged with "christmas." Here is a summary of its functionalities:

### Snow Effect:

Enqueues a snow effect script (snowstorm.js) for single posts with the "christmas" tag, making the posts appear with falling snowflakes.

The snow effect is only added if the plugin is enabled via an options setting.

### Snow Effect Configuration:

Includes a script in the footer to configure the snow effect with auto-start, maximum active flakes, and twinkling effect.

Christmas Tree Icon:

Adds a Christmas tree icon to the titles of posts tagged with "christmas."

### Elves in Content:

Adds small bearded elves randomly into the paragraphs of the post content for posts tagged with "christmas."

### Plugin Options Page:

Registers an options page in the WordPress admin dashboard titled "Christmas Effects."

Provides a checkbox to enable or disable all plugin effects.

Saves the settings and retrieves the current settings to determine if the plugin is enabled.