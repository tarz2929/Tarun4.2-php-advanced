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

// Animal Fact Request Form.
?>
<h2>Request Animal Facts</h2>
<form action="#" method="POST">
  <label for="amount">Enter the Amount of Facts:
  <input type="number" id="amount" name="amount"></label>
  <label for="animal-type">Enter the Type of Animal:
  <input type="text" id="animal-type" name="type">
  </label>
  <input type="submit" value="Get Animal Facts!">
</form>
<?php
// Let's modify our request to include a QUERY PARAMETER STRING.
$factsListResponse = file_get_contents(
  'https://cat-fact.herokuapp.com/facts/random?amount=10&animal_type=dog'
); // Test the response via var_dump()
var_dump( $factsListResponse );

include './templates/footer.php';
