# INTRO

This is to serve as a sample guide when I build child themes.

REF:
- [https://codex.wordpress.org/Child_Themes](https://codex.wordpress.org/Child_Themes)


## STEPS:

1) make sure to append the directory of the child theme with a **'-child'**

2) Should contain at least the following two files:
        
        - style.css
        - functions.php

3) The Stylesheet must begin with the header:

        /*
          Theme Name: Parent Name Child
          Theme URI: []
          Description: A Child Theme of [Parent Name]
          Author: Wasseem Khayrattee
          Author URI: http://khayrattee.com
          Template: parent-folder-name # should corresponds to the directory name of the parent theme
          Version: a-number--optional
          
          General comments/License Statement if any.
          
        */

- The **style.css** of a child theme will always directly override its counterpart from the parent



4) The **functions.php** is necessary to enqueue styles correctly. Do not use **@import()** in style.css to import parent stylesheet. This is bad practice. So use enqueue.
        
        <?php
        function my_theme_enqueue_styles() {
        
            $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
        
            wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
            wp_enqueue_style( 'child-style',
                get_stylesheet_directory_uri() . '/style.css',
                array( $parent_style ),
                wp_get_theme()->get('Version')
            );
        }
        add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
        ?>


### Overriding things from the Parent functions.php

- The **functions.php** of a child theme does **NOT** override its counterpart from the parent
- it is loaded in addition to the parent’s functions.php
- it is loaded in addition to the parent’s functions.php

NOTE:
- We can capitalise on the above by including a function FIRST in the child-theme so that it overrides its counterpart in the parent-theme, **by declaring the function conditionally**

            if ( ! function_exists( 'theme_special_nav' ) ) {
                function theme_special_nav() {
                    //  Do something.
                }
            }

### get_stylesheet_directory()

Use this when we need to get the current directory path of the child theme. This is because Wordpress always give the path of the current active theme.

Example:

            require_once( get_stylesheet_directory() . '/my_included_file.php' );


### Others

For **RTL** support and **localisation**, see [https://codex.wordpress.org/Child_Themes](https://codex.wordpress.org/Child_Themes)