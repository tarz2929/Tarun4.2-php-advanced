<?php
$GLOBALS['pageTitle'] = 'Cat Facts (External API Test)';
include './templates/header.php';

// Retrieve data from API endpoint.
// @link https://alexwohlbruck.github.io/cat-facts/docs/
$dailyCatFactResponse = file_get_contents( 
  'https://cat-fact.herokuapp.com/facts/random'
);
var_dump( $dailyCatFactResponse );

include './templates/footer.php';
