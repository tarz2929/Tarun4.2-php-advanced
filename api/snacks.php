<?php
/**
 * Goal: Return a JSON representation of a Snack.
 * Parameter: Query parameter string "search" term.
 */

// Headers are sent "under-the-radar" to give additional info
// about the request / response. In this case, we are
// describing the "file-type" or how we intend the content body
// / string to be read / treated.
header( 'Content-type: app/JSON; charset=UTF-8' );

// First, let's make sure there is a search term present.
if ( isset( $_GET['search'] ) && !empty( $_GET['search'] ) )
{ // JSON object response w/the search term.
  echo "{\"response\":\"Search term: {$_GET['search']}\"}";
}
// If there is no search present, a default / fall-back response.
else
{ // JSON object response w/status info.
  echo "{\"response\":\"ERROR: No search term present.\"}";
}
