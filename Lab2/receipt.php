<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/modification.css"/>
    <!-- Title in Tab  -->
    <title>
      Thank You
    </title>
  </head>

  <body>

    <!-- Page Header -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3" align="center">
            <strong>Thank You</strong>
        </h1>
      </div>
    </div>

    <br />

    <!-- Start of Receipt -->
    <div class="container">
      <!-- Title & Customer Name -->
      <div class="row">
        <div class="col" style="font-size: 150%">
          <u><strong>Receipt</strong></u>
        </div>
        <div class="col" style="font-size: 150%" align="right">
          Name: <i><strong><?php echo $_GET["name"]; ?></strong></i>
        </div>
      </div>

      <br />

      <!-- Ordered Fruits List -->
      <div class="row">
        <table class="table table-bordered table-striped table-sm" id="orderList">

          <!-- Headings of Ordered List -->
          <thead class="thead-dark" align="center">
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Unit Cost</th>
                <th>Subtotal</th>
            </tr>
          </thead>

          <!-- Entries of Ordered List  -->
          <tbody>
            <tr>
              <td>Apples</td>
              <td><?php echo $_GET["apple"] ?></td>
              <td>$0.69</td>
              <td><?php echo number_format(($_GET["apple"] * 0.69), 2) ?></td>
            </tr>
            <tr>
                <td>Bananas</td>
                <td><?php echo $_GET["banana"] ?></td>
                <td>$0.39</td>
                <td><?php echo number_format(($_GET["banana"] * 0.39), 2) ?></td>
            </tr>
            <tr>
                <td>Oranges</td>
                <td><?php echo $_GET["orange"] ?></td>
                <td>$0.59</td>
                <td><?php echo number_format(($_GET["orange"] * 0.59), 2) ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <br />

      <!-- Payment Mode & Overall Total -->
      <div class="row">
        <div class="col" style="font-size: 150%">
          Payment Mode: <strong><?php echo $_GET["payment"] ?></strong>
        </div>
        <div class="col" style="font-size: 150%" align="right">
          Overall Total: <strong>$<?php echo $_GET["total"] ?></strong>
        </div>
      </div>

      <br />

      <!-- Create New Order Button (i.e. to place new orders)  without the
      need to press 'Back' -->
      <div class="container">
        <div class="row">
          <form action="index.html">
            <button class="btn btn-success" type="submit" id="newOrder">
              Make New Order
            </button>
          </form>
        </div>
      </div>

    </div>
  </body>
</html>
