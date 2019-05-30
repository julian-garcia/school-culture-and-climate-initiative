# Website Construction (WordPress theme) - SCCI
New website developed for non profit organisation "The School Culture and Climate Initiative" SCCI. This implementation is a custom WordPress theme with all page copy/image content defined within the WordPress CMS. HTML is located in the standard WordPress php templates and all styling has been written in SCSS using the BEM approach. Minimal JavaScript to implement a slider and mobile menu. 

## Languages/Technology
- HTML, SCSS, JS
- PHP 7.3.1
- WordPress 5.2.1
- MAMP 5.3
- Figma
  
## File Structure
As this is a wordpress theme which forms part of the suite of WordPress files, these files are structured in the same way: `/wp-content/themes/scci` (custom theme php, styling and scripts). This should facilitate integrating the theme in to your local instance of WordPress.

## Developers
To view the site locally: download wordpress, set up a database and db user using myphpadmin via MAMP/XAMP/WAMP, use MAMP/XAMP/WAMP to start a local server with your local wordpress folder set as the document root, activate wordpress http://localhost:8888/wp-activate, delete wp-content/themes folder, clone this repository locally inside the wordpress folder. You should then be able to see the site using address http://localhost:8888 and log in to wordpress at http://localhost:8888/wp-admin.