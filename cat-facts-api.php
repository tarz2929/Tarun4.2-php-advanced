<?php
$GLOBALS['pageTitle'] = 'Cat Facts (External API Test)';
include './templates/header.php';

// Retrieve data from API endpoint.
// @link https://alexwohlbruck.github.io/cat-facts/docs/
$dailyCatFactResponse = file_get_contents( 
  'https://cat-fact.herokuapp.com/facts/random'
); // Testing output in var_dump...
//var_dump( $dailyCatFactResponse );
// If we got a response...
if ( $dailyCatFactResponse )
{ // Convert JSON string to PHP object.
  $dailyCatFact = json_decode( $dailyCatFactResponse );
  // Output daily cat fact as HTML for the browser...
  ?>
    <h2>Today's Cat Fact:</h2>
    <p><?php echo $dailyCatFact->text; // Output the text property! ?></p>
  <?php
}

include './templates/footer.php';
