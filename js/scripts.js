// Test that this file is loaded properly!
// alert( 'I\'m here!' );

/**
 * Retrieve the form, input, and ul.
 */
const snackSearchForm = document.getElementById( 'search-form' );
const snackSearchInput = document.getElementById( 'search-input' );
const searchResultsList = document.getElementById( 'search-results' );

/**
 * Listen for a submit.
 */
snackSearchForm.addEventListener( 'submit', event => {
  // Stop the form from submitting the traditional way.
  event.preventDefault();
  // Attempt a fetch for results.
  fetch ( `http://localhost:80/api/snacks.php` )
    .then( response => response.json() )
    .then( data => {
      console.log( data );
    } )
} );
