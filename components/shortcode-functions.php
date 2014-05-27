<?php

function display_author_group($atts) {
            	
            	
	$role = $atts["role"];
	if (!$role) return false;


	// if we're here, then start outputting the data
	$output = "
		<section class='people-group'>
		
		
		<ul class='author-grid'>";

		
	// get the users in this group
	$args = array (
	'role' => $role
	);

	$users = get_users( $args );
	foreach ($users as $user):

	$user_info = get_userdata($user->ID); 

	if (get_cupp_meta($user->ID, 'thumbnail')) $url = get_cupp_meta($user->ID, 'thumbnail'); else $url = false;


	$output .= "

	<li>
		<a href='" . get_author_posts_url($user->ID) . "'>
			<div class='author-image'>";
	if ($url) { 
			$output .= "<img src='" . $url . "' alt='" . $user->display_name . "' />";
			}

$output .= '<div class="overlay"><span class="read-more">Read More</span></div>
</div>
<h3>' . $user->display_name . '</h3>';
$output .= get_the_author_meta( 'job-title', $user->ID );
$output .= "</a>
				</li>";



	endforeach;

	$output .= "</ul>
		</section>";
		return $output;
            		
}

add_shortcode("show_authors", "display_author_group");



function display_clients($atts) {

	// either show all of them or one.  Always in a UL no matter what, so it can be okay if it's just one thing.  
	// we can expand this to include more people.


	if ($atts['id']): // show a specific one
		$args = array( 'slug' => $atts["id"] );
	else: // show all
		$args = array();
	endif;

	$clients = get_terms( 'clients', $args );

	$output =  "<ul>";
     foreach ( $clients as $client ) {
       $output .= "<li>" . $client->name . "</li>";
        
     }
     $output .=  "</ul>";
}
add_shortcode("display_clients", "display_clients");


?>