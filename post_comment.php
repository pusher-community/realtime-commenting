<?php
require('Persistence.php');

$ajax = ($_SERVER[ 'HTTP_X_REQUESTED_WITH' ] === 'XMLHttpRequest');

$db = new Persistence();
$added = $db->add_comment($_POST);

if($ajax) {
  sendAjaxResponse($added);
}
else {
  sendStandardResponse($added); 
}

function sendAjaxResponse($added) {
  header("Content-Type: application/json");
  if($added) {
    header( 'Status: 201' );
    echo( json_encode($added) );
  }
  else {
    header( 'Status: 400' );
  }
}

function sendStandardResponse($added) {
  if($added) {
    header( 'Location: index.php' );
  }
  else {
    header( 'Location: index.php?error=Your comment was not posted due to errors in your form submission' );
  }
}
?>