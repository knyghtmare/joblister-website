<?php

// redirect to page

function redirect($page = FALSE, $message = NULL, $message_type = NULL)
{
    if ( is_string($page) ) {
      // code...
      $location = $page;
    }
    else {
      // code...
      $location = $_SERVER['SCRIPT_NAME'];
    }

    // check for messages

    if ($message != NULL) {
      // code...
      // set message
      $_SESSION['message'] = $message_type;
    }

    // redirect
    header('Location: '.$location);
    exit;
}

// display messages

function displayMessage()
{
  if ( !empty( $_SESSION['message'] ) ) {
    // code...
    // assign message var

    $message = $_SESSION['message'];

    if ( !empty( $_SESSION['message_type'] ) ) {
      // code...
      // assign the message type var
      $message_type = $_SESSION['message_type'];

      // create an output
      if ( $message_type == 'error' ) {
        //code here

        echo "<div class=alert alert-danger>".$message."</div>";
      }
      else {
        // code...
        echo "<div class=alert alert-success>".$message."</div>";

      }
    }

    // unset messages
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);

  } else {
    // code...
    echo "";
  }
}

 ?>
