<?php

  // Get Customer Name
  $name = $_POST['name'];

  // Get Selected Payment Mode
  if($_POST['payment'] == "visa") {
    $payment = "Visa";
  } else if($_POST['payment'] == "mc") {
    $payment = "MasterCard";
  } else if($_POST['payment'] == "discover") {
    $payment = "Discover";
  }

  // Check if qty of Apple, Banana and Orange are set (of which it should be)
  // Get respective quantities, calculate total Price
  // Update respective current qty sold to file (order.txt)
  // Pass it to receipt.php
  if((isSet($_POST['apple'])) && (isSet($_POST['banana'])) && (isSet($_POST['orange']))) {
      $apple = $_POST['apple'];
      $banana = $_POST['banana'];
      $orange = $_POST['orange'];
      $total = number_format((($apple * 0.69) + ($banana * 0.39) + ($orange * 0.59)), 2 );
      updateQty($apple, $orange, $banana);
      header("Location: receipt.php?" .
              "name=$name&" .
              "apple=$apple&" .
              "banana=$banana&" .
              "orange=$orange&" .
              "payment=$payment&" .
              "total=$total");
  } else {
    exit;
  }

  // Update Tracking Text File
  function updateQty($apple, $orange, $banana) {
      $temp = readTxt();
      $temp["apple"] += $apple;
      $temp["orange"] += $orange;
      $temp["banana"] += $banana;
      writeTxt($temp);
  }

  // Read from Tracking Text File
  function readTxt() {
      $file = fopen("order.txt", "r+") or exit("'order.txt' file cannot be opened");
      $fruit_array = array("apple" => 0, "orange" => 0, "banana" => 0);
      foreach ($fruit_array as $fruit => $qty) {
          $line = fgets($file);
          $qty = explode(":", $line);
          $fruit_array[$fruit] = (int) $qty[1];
      }
      fclose($file);
      return $fruit_array;
  }

  // Save to Tracking Text File
  function writeTxt($fruit_array) {
      $file = fopen("order.txt", "w+");
      foreach ($fruit_array as $fruit => $qty) {
        fwrite($file, "Total number of " .$fruit. "s : " .$qty. "\r\n");
      }
      fclose($file);
  }
?>
