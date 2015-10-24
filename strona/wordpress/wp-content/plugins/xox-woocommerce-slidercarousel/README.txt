=== XoX Woocommerce Slider/Carousel ===
Contributors: dedong
Donate link: http://xoxslider.xolluteon.com/
Tags: woocommerce, sliders, carousel, products, product, category, premium
Requires at least: 4.0.1
Tested up to: 4.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

XoX Woocommerce Slider/Carousel is useful plugin for displaying sliders consists of Products and Product Category.

== Description ==

XoX stands for X-tra Ordinary Solution, so the plugin was built to become an out of the box solution for your Web Store that use WooCommerce as it's framework.

XoX Woocommerce Slider/Carousel comes with these features:

*   Fluid and Responsive Design, means that the images and texts inside the slider or carousel will follow the theme responsiveness style. 
*   10 Slider effects and 2 Carousel Scrolls.
*   Easy shortcode implementation (integrated with WordPress editor).
*   Additional Widget to add shortcode to dynamic widget.
*   Conflict free, the sliders or carousels created with the plugin are unique and can be implemented inside posts or pages without conflicting each other (note: except for implementing one slider/carousel multiple times in one page. EG: 1 slider used both inside the page and sidebar).
*   5 Starter slider and carousel template + the ability to create your own customized template.

Slider effects:
	
*   Normal/No Effect, changing images without any transition effect
*	Fade In
*	Fade Out
*	Scroll Horizontal
*	Scroll Vertical
*	Flip Horizontal
*	Flip Vertical
*	Shuffle
*	Tile Side
*	Tile Blind

Carousel Scrolls:

*   Normal: Horizontal Scrolling (From right to left).
*   Vertical: Scrolling up.
*   Vertical Down: Scrolling downward (next version feature)

== Installation ==

how to install the plugin and get it working.

1. Extract the .zip file downloaded from Envato
2. Upload the extracted `xox-woo-carousel` folder to your `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. You will find "XoX Slider & Carousel" in your wp-admin sidebar
5. Start creating your Slider or Carousel
6. Use it anywhere in your post, pages, or custom posts using the shortcode button in editor toolbar. Or,
7. Activate the "XoX WooCommerce Widget" through wp-admin->appearance->widgets, OR
8. Use anywhere in your .php template by using `<?php echo do_shortcode('[xoxslider name="slider-or-carousel-name"]'); ?>`

== Frequently Asked Questions ==

= How to create a custom theme for my slider or carousel =

Currently this is the steps:

*   On the plugin folder ("/wp-content/plugins/xox-woo-carousel") go to "../include/templates/[slider or carousel]",
*   Copy one of the template file (EG: default.php) rename it to anything you like but using "-" as space replacer (EG: my-theme.php),
*   Upload the "my-theme.php" file in to "/wp-content/plugins/xox-woo-carousel/include/templates/[slider or carousel]",
*   Open the slider/carousel you want to use this newly made theme,
*   On the "Slider/Carousel Theme" you will find your newly made theme listed in the radio button ("EG: My Theme").

Future plan would be to allow users to create a folder inside their theme folder 

= Basic Usage =

1. Create new slider or carousel by going to "XoX Slider & Carousel -> Add New Slider/Carousel"
2. Set the parameters for the slider or carousel
3. Go to your post/page where you want this slider to be shown, add it using the shortcode button found in the editor toolbar.
4. Alternatively you can go to "Appearence -> Widgets" and add "XoX WooCommerce Widget" to your widget box, or
5. Use anywhere in your .php template by adding this code: `<?php echo do_shortcode('[xoxslider name="slider-or-carousel-name"]'); ?>`

== Screenshots ==

1. Add new slider through wp-admin sidebar
2. Inside the slider/carousel page
3. Add shortcode using Editor toolbox
4. Chose the slider/carousel to be used in the shortcode
5. Add the slider/carousel from widget
6. Custom widget for adding slider/carousel to dynamic WordPress widget
7. All slider and carousel put in a page without problem

== Changelog ==

= 1.0 =
* Added 5 slider effects.
* Added 2 Additional Slider themes and 1 Carousel Theme

= 0.5 =
* Basic functionality made.
* Default Framework

== Upgrade Notice ==

= 1.0 =
Published version for market, compatibility with (Chrome, Firefox, Opera, Safari).

= 0.5 =
Beta Release.

== Arbitrary section ==



== A brief Markdown Example ==

Features list:

1. Fluid and Responsive Design, means that the images and texts inside the slider or carousel will follow the theme responsiveness style. 
2. 10 Slider effects and 2 Carousel Scrolls.
3. Easy shortcode implementation (integrated with WordPress editor).
4. Additional Widget to add shortcode to dynamic widget.
5. Conflict free, the sliders or carousels created with the plugin are unique and can be implemented inside posts or pages without conflicting each other (note: except for implementing one slider/carousel multiple times in one page. EG: 1 slider used both inside the page and sidebar).
6. 5 Starter slider and carousel template + the ability to create your own customized template.

Additional Features:

* Changeable Navigation Images
* Ability to use "numeric" or "bullet" pagination
* Commitment of support and help.

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`