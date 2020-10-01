<?php
// Try to avoid use of globals unless they are absolutely necessary...
$GLOBALS['pageTitle'] = 'PHP Calculator';

// Show our header.
include './templates/header.php';
?>

<p>
  Welcome to our Calculator page!
</p>

<form method="GET">
  <label for="num1">
    Enter first operand:
    <input
      id="num1"
      name="value1"
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

<?php // Show our footer.
include './templates/footer.php';
