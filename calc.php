<?php
// We need to use SESSION_START to declare to PHP
// that we want to use the $_SESSION global var!
// It sets up a unique identifier with the browser
// so that the array of values is associated with
// only the one user.
session_start();

// Make sure to set a default value, if this
// key/value pair does not yet exist in the
// associative SESSION array!
// *** We can't array_push() to a NULL
//     (undefined) value!
if ( !isset( $_SESSION['calcHistory'] ) )
{
  $_SESSION['calcHistory'] = array();
}

// Try to avoid use of globals unless they are absolutely necessary...
$GLOBALS['pageTitle'] = 'PHP Calculator';

// Show our header.
include './templates/header.php';

// If we want to read values from a GET method submission...
// we use the $_GET superglobal! It is an associative array.
echo '<pre>';
var_dump( $_GET );
var_dump( $_POST ); // POST is handled the same way!
echo '</pre>';

// Set result to false so we can check later if it should be output.
$result = FALSE;
if ( !empty( $_GET ) ) // Check if there are any values in our array!
{ // We need to do a different math operation depending on submission...
  switch ( $_GET['op'] )
  { // A case for each possible <option> in our form...
    case 'addition':
      $opSymbol = '+';
      $result = $_GET['value1'] + $_GET['value2'];
      break;
    case 'subtraction':
      $opSymbol = '-';
      $result = $_GET['value1'] - $_GET['value2'];
      break;
    case 'multiplication':
      $opSymbol = '&times;';
      $result = $_GET['value1'] * $_GET['value2'];
      break;
    case 'division':
      $opSymbol = '&divide;';
      $result = $_GET['value1'] / $_GET['value2'];
      break;
  }
  // Add this result to the calculator history array!
  array_push(
    $_SESSION['calcHistory'],
    "{$_GET['value1']} {$opSymbol} {$_GET['value2']} = {$result}"
  );
}
echo '<pre>';
var_dump( $_SESSION );
// Use var_dump, much like we did in JS with console.log.
// It outputs the data-type and value of what you pass in!
var_dump( $result ); // What is our result, right now!?
echo '</pre>';
?>

<p>
  Welcome to our Calculator page!
</p>

<form method="GET" action="calc.php">
  <label for="num1">
    Enter first operand:
    <input
      id="num1"
      name="value1" <?php // NAME is used as the "key" in our query parameter string key-value pairs! ?>
      type="number"
      value="">
  </label>
  <label for="operator">
    Select an operator:
    <select id="operator" name="op">
      <option value="addition">
        +
      </option>
      <option value="subtraction">
        -
      </option>
      <option value="multiplication">
        &times;
      </option>
      <option value="division">
        &divide;
      </option>
    </select>
  </label>
  <label for="num2">
    Enter second operand:
    <input
      id="num2"
      name="value2"
      type="number"
      value="">
  </label>
  <input type="submit" value="Calculate!">
</form>

<?php if ( $result != FALSE ) : // Only output if there is a valid result. ?>
  <p>
    Your result for your calculation is:
    <?php echo $result; ?>
  </p>
<?php endif; ?>

<?php // Show our footer.
include './templates/footer.php';
