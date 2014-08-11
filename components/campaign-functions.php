<?php

function under_500_cal_setup( $atts ) {

	// cba to enqueue, this is a one use thing

	$url = 'https://spreadsheets.google.com/feeds/list/10qJ32NvXnVGsTUzKj-ZbUKlVUSKAIO377psORigEvjY/od6/public/values?alt=json';
	$file= file_get_contents($url);
 
	$json = json_decode($file);
	$rows = $json->{'feed'}->{'entry'};

	/*
name
	unit
contact
twitter
dish
mainingredient
calories
salt
brand
foodpic
chefpic
*/
	$count = 1;

	$output .= "<ul id='under500cal'>";
	foreach($rows as $row) {
		
		
		$details = array();

		foreach ($row as $key => $field) 
		{
			if (substr($key,0,4) == "gsx\$")
			{
				$details[substr($key,4)] = $field->{'$t'};
			}
		}
		//$output .= "<pre>" . print_r($details,1) . "</pre>";


		if ($details["chefpic"]) {
			$chefpic = wp_get_attachment_image_src( $details["chefpic"], 'medium');
			if ($chefpic) {
				//$output .= "<img src='" . current($chefpic) . "' />";
			}
		}

		if ($details["foodpic"]) {
			$foodpic_m = wp_get_attachment_image_src( $details["foodpic"], 'medium');
			$foodpic_l = wp_get_attachment_image_src( $details["foodpic"], 'large');
			
		}

		// build the thumbnail link grid thing

		// make a nice id-able name, we're not using this for any real id or key stuff so it sould be okay
		
		
		// link
		$output .= "<li><a href='#food' class='500cal-popups' data-mfp-src='#chef-" . $count . "' >";


		$output .= "<img src='" . current($foodpic_m) . "' /><h3>" . $details["dish"] . "</h3>";
		
		// close the link
		$output .= "</a>";



		// build the popup
		// open the modal window
		$output .= "<div id='chef-" . $count . "' class='mfp-hide white-popup under500cal_modal'>";


		$separator = ' <i class="fa fa-circle red"></i> ';
		// this is your content
		$output .= "<img src='" . current($foodpic_l) . "' class='mainpic' />";

		$output .= "<div class='chef'><img src='" . current($chefpic) . "' /></div>";
		$output .= "<div class='details'>";
		$output .= "<h2>" . $details["dish"] . " <em>" . $details["calories"] . " cals </em></h2>";
		$output .= "<h3>" . $details["name"] . "<Br />" . $details["brand"] . $separator . $details["unit"] . "</h3>";
		/*
		$output .= "<ul> 
					<li>" . $details["brand"] . "</li>
					<li>" . $details["unit"] . "</li>
					<li>" . $details["name"] . "</li>
					<li>" . $details["calories"] . " calories</li>
					<li>" . $details["salt"] . "g salt</li>
					<li>Main Ingredient: " . $details["mainingredient"] . "</li>
					</ul>";
		*/
		$output .= "</div>"; // div.details

		// close the modal window
		$output .= "</div></li>";

		$count++;


	}
	$output .= "</ul>";		


	return $output;
}

add_shortcode('500calorieschart', 'under_500_cal_setup');