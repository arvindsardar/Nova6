<?php
	class Nova_Menu_Walker extends Walker_Nav_Menu {
		// Displays start of a level. E.g '<ul>'
		// @see Walker::start_lvl()
		function start_lvl( &$output, $depth = 0, $args = null ) {
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			$display_depth = ( $depth + 2); // because it counts the first submenu as 0
			$classes = array(
				'sub-menu',
				'level-' . $display_depth
			);
			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			// Build HTML for output.
			$output .= "\n" . $indent . '<nav' . $class_names . '>';
		}

		// Displays end of a level. E.g '</ul>'
		// @see Walker::end_lvl()
		function end_lvl( &$output, $depth = 0, $args = null ) {
			// Build HTML for output.
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			$output .= "\n" . $indent . '</nav>';
		}

		// Displays start of an element. E.g '<li> Item Name'
		// @see Walker::start_el()
		function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
            $output .= "<span class='" .  implode(" ", $item->classes) . "'>";
			$output .= '<a target="' . $item->target . '" href="' . $item->url . '">';
            $output .= $item->title;
			if ($args->walker->has_children) {
				$output .= '<i class="icon--ui ri-arrow-right-s-line"></i>';
			}
			$output .= '</a>';
        }

		// Displays end of an element. E.g '</li>'
		// @see Walker::end_el()
		function end_el(&$output, $item, $depth=0, $args=array()) {
			$output .= "</span>\n";
		}
	}
