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


	if (isset($atts['id'])): // show a specific one
		$args = array( 'hide_empty'    => false,'slug' => $atts["id"] );
	else: // show all
		$args = array( 'hide_empty'    => false,);
	endif;

	$clients = get_terms( 'clients', $args );
	/*
	<figure class="gallery-item">
			<div class="gallery-icon landscape">
				<a href="http://localhost/wp-content/uploads/2014/05/Ruth092Before-the-Ceremony.jpg" data-fancybox-group="articlegallery" rel="lightbox[gallery]"><img width="293" height="180" src="http://localhost/wp-content/uploads/2014/05/Ruth092Before-the-Ceremony-293x180.jpg" class="attachment-thumbnail" alt="Ruth092{Before the Ceremony"></a>
			</div></figure>
	*/
	

	if (isset($atts["popup"])) $output =  "<ul class='clients-gallery popup'>";
	else $output =  "<ul class='clients-gallery'>";
     foreach ( $clients as $client ) {
			/*
				public 'term_id' => string '21' (length=2)
				public 'name' => string 'not visa' (length=8)
				public 'slug' => string 'something-else' (length=14)
				public 'term_group' => string '0' (length=1)
				public 'term_taxonomy_id' => string '33' (length=2)
				public 'taxonomy' => string 'clients' (length=7)
				public 'description' => string 'yea' (length=3)
				public 'parent' => string '0' (length=1)
				public 'count' => string '0' (length=1)
			*/
	 $client_img = get_field('client_logo', 'clients_' . $client->term_id);
       $output .= "<li data-mfp-src='#client-" . $client->slug . "'>";
       $output .= "<img src='" . $client_img['sizes']['thumbnail'] . "' />";
       if (isset($atts["popup"])) $output .= "<div class='inline-modal  mfp-hide' id='client-" . $client->slug . "'><img src='" . $client_img['sizes']['medium'] . "' /><br />" . $client->description . "</div>";
       $output .= "</li>";

        
     }
     $output .=  "</ul>";

     return $output;
}
add_shortcode("display_clients", "display_clients");


?>