<?php
class Snack
{
  /**
   * We can set up properties like so...
   */
  public $name;
  public $type;
  public $price;
  public $calories;

  /**
   * Constructor method runs every time we
   * make a new instance of this class (a
   * new object following this blueprint.)
   */
  function __construct ( $snackName = '', $snackType = '', $snackPrice = 0.00, $snackCalories = 0 )
  {
    $this->name = $snackName;
    $this->type = $snackType;
    // For more verbose currency formatting, check out:
    // https://www.php.net/manual/en/numberformatter.formatcurrency.php
    // Thanks Fahad!
    $this->price = number_format(
      $snackPrice, // Number to format.
      2, // Number of decimal places.
      '.', // Decimal separator.
      ',' // Thousands separator. 1,000.00
    );
    $this->calories = $snackCalories;
  }
}

$mySnack = new Snack( 'Oh Henry', 'chocolate', 1.895555, 200 );
var_dump( $mySnack );
