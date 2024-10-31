<?php
/*
Plugin Name: RanNum Shortcode
Plugin URI: http://www.austinthemes.com
Description: RanNum shortcode plugin. A simple plugin for adding random numbers to the content, initially created to add values for random margins. Use the shortcode [RanNum] or [RN] to generate a number from 1 to 100, or [RanNum min="5" max="200"] or [RN min="5" max="200"] for a random number in the range of 5 to 200 (for example).
Version: 1.0
Author: Ryan Bishop, Austin Themes
Author URI: http://www.austinthemes.com
*/

/*
Created by Ryan Bishop for free distribution. Based on the plugin creation tutorial by 
Paul McKnight (http://www.reallyeffective.co.uk/archives/2009/06/22/how-to-code-your-own-wordpress-shortcode-plugin-tutorial-part-1/)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

//define plugin defaults
DEFINE("RANNUM_MIN", "0");
DEFINE("RANNUM_MAX", "100");

//tell wordpress to register the demolistposts shortcode
add_shortcode("RanNum", "RanNum_handler");
add_shortcode("RN", "RanNum_handler");

function RanNum_handler($incomingfrompost) {
  //process incoming attributes assigning defaults if required
  $incomingfrompost=shortcode_atts(array(
    "min" => RANNUM_MIN,
    "max" => RANNUM_MAX        
  ), $incomingfrompost);
  //run function that actually does the work of the plugin
  $RanNum_output = RanNum_function($incomingfrompost);
  //send back text to replace shortcode in post
  return $RanNum_output;
}


function RanNum_function($incomingfromhandler) {

  // Generate the random number

	$RanNum_output .= rand($incomingfromhandler["min"] , $incomingfromhandler["max"]);
 
  // send back text to calling function

  return $RanNum_output;
}
?>