<?php
/**
 * Template Name: Meet Your Tech
 *
 */

//* Enqueue json scripts
add_action( 'wp_enqueue_scripts', 'get_json_data' );
function get_json_data() {
	wp_enqueue_script( 'json-ajax', '/wp-content/themes/genesis-sample/assets/js/get-json-plunkett.js', array(), CHILD_THEME_VERSION );
}

add_action('genesis_entry_content','custom_json');
function custom_json() {
	$response = file_get_contents('http://nextgen.plunketts.net/users.json?role=technician');
	$objs = json_decode($response);?>

	<div class="first one-third">
		<h1>A</h1>
		<?php add_tech_to_list($objs, 'A');?>
		<h1>D</h1>
		<?php add_tech_to_list($objs, 'D');?>
		<h1>G</h1>
		<?php add_tech_to_list($objs, 'G');?>
		<h1>J</h1>
		<?php add_tech_to_list($objs, 'J');?>
		<h1>M</h1>
		<?php add_tech_to_list($objs, 'M');?>
		<h1>P</h1>
		<?php add_tech_to_list($objs, 'P');?>
		<h1>S</h1>
		<?php add_tech_to_list($objs, 'S');?>
		<h1>V</h1>
		<?php add_tech_to_list($objs, 'V');?>
		<h1>Y</h1>
		<?php add_tech_to_list($objs, 'Y');?>
	</div>
			
	<div class="one-third">
		<h1>B</h1>
		<?php add_tech_to_list($objs, 'B');?>
		<h1>E</h1>
		<?php add_tech_to_list($objs, 'E');?>
		<h1>H</h1>
		<?php add_tech_to_list($objs, 'H');?>
		<h1>K</h1>
		<?php add_tech_to_list($objs, 'K');?>
		<h1>N</h1>
		<?php add_tech_to_list($objs, 'N');?>
		<h1>Q</h1>
		<?php add_tech_to_list($objs, 'Q');?>
		<h1>T</h1>
		<?php add_tech_to_list($objs, 'T');?>
		<h1>W</h1>
		<?php add_tech_to_list($objs, 'W');?>
		<h1>Z</h1>
		<?php add_tech_to_list($objs, 'Z');?>
	</div>
	
	<div class="one-third">
		<h1>C</h1>
		<?php add_tech_to_list($objs, 'C');?>
		<h1>F</h1>
		<?php add_tech_to_list($objs, 'F');?>
		<h1>I</h1>
		<?php add_tech_to_list($objs, 'I');?>
		<h1>L</h1>
		<?php add_tech_to_list($objs, 'L');?>
		<h1>O</h1>
		<?php add_tech_to_list($objs, 'O');?>
		<h1>R</h1>
		<?php add_tech_to_list($objs, 'R');?>
		<h1>U</h1>
		<?php add_tech_to_list($objs, 'Y');?>
		<h1>X</h1>
		<?php add_tech_to_list($objs, 'X');?>
	</div>
	<?php
	
}
   /* 
   	* function takes a 'reference' (notice the & preceding in the parameter) to 
   	* and $objs[], when the func finds a match it will unset() which removes an 
   	* element from an array. Because we are passing the $objs as a 'reference'
   	* it will shrink $objs[] every call, speeding up the overall time it takes
   	* to run through all 250+ items in the array and ultimately load the page faster.
	*
	* E.g. by time add_tech_to_list() is called for 'X', $objs will only have people
	* with 'X' as the first letter of their last name, cutting the search time way down.
    */
function add_tech_to_list(&$objs, $firstCharInName) {
	foreach ($objs as $obj) {
		$lastName = $obj->last_name;
		$firstChar = $lastName[0];
		$firstName = $obj->first_name;
		$i = 0;
		if ($firstCharInName == $firstChar) { ?>
			<p class="tech-list" style="margin-bottom:7px; margin-left: 14px;"><?php echo $lastName . ', ' . $firstName; ?></p><?php
		}
		
		unset($objs[$i]);
		$i++;
	}
}
genesis();