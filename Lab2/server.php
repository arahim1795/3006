<?php
  $name = $_POST['name'];

  if($_POST['payment'] == "visa") {
    $payment = "Visa";
  } else if($_POST['payment'] == "mc") {
    $payment = "MasterCard";
  } else if($_POST['payment'] == "discover") {
    $payment = "Discover";
  }

  if( (isSet($_POST['apple'])) && (isSet($_POST['banana'])) && (isSet($_POST['orange']))) {
      $apple = $_POST['apple'];
      $banana = $_POST['banana'];
      $orange = $_POST['orange'];
      $total = number_format((($apple * 0.69) + ($banana * 0.39) + ($orange * 0.59)), 2 );
      updateQty($apple, $banana, $orange);
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

  // Update Tracking Text
  function updateQty($apple, $banana, $orange) {
      $temp = readTxt();
      $temp["apple"] += $apple;
      $temp["banana"] += $banana;
      $temp["orange"] += $orange;
      writeTxt($temp);
  }

  function readTxt() {
      $file = fopen("order.txt", "r+") or exit("'order.txt' file cannot be opened");
      $fruit_array = array("apple" => 0, "banana" => 0, "orange" => 0);
      foreach ($fruit_array as $fruit => $qty) {
          $line = fgets($file);
          $qty = explode(":", $line);
          $fruit_array[$fruit] = (int) $qty[1];
      }
      fclose($file);
      return $fruit_array;
  }

  function writeTxt($fruit_array) {
      $file = fopen("order.txt", "w+");
      foreach ($fruit_array as $fruit => $qty) {
        fwrite($file, "Total number of " .$fruit. " : " .$qty. "\r\n");
      }
      fclose($file);
  }
?>
