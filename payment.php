<?php
// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'first'
];

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'email' => $_POST['payer_email'],
    'return_url' => 'http://localhost/first2/payment-successful.php',
    'cancel_url' => 'http://localhost/first2/payment-cancelled.php',
    'notify_url' => 'payment.php'
];

$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

// Product being purchased.
$itemName = $_POST['item_name'];
$itemAmount =  $_POST["payment_amount"];

// Include Functions
require 'functions.php';
//echo $_POST["txn_id"];exit();
// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

    // Grab the post data so that we can set up the query string for PayPal.
    // Ideally we'd use a whitelist here to check nothing is being injected into
    // our post data.
    $data = [];
    foreach ($_POST as $key => $value) {
        $data[$key] = stripslashes($value);
    }

    // Set the PayPal account.
    $data['business'] = $paypalConfig['email'];

    // Set the PayPal return addresses.
    $data['return'] = stripslashes($paypalConfig['return_url']);
    $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
    $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

    // Set the details about the product being purchased, including the amount
    // and currency so that these aren't overridden by the form data.
    $data['item_name'] = $itemName;
    $data['amount'] = $itemAmount;
    $data['currency_code'] = 'GBP';
    //echo "<pre>";
  // Add any custom fields for the query string.
    //$data['custom'] = USERID;
    //print_r($data);exit();
    // Build the query string from the data.
    $queryString = http_build_query($data);

    // Redirect to paypal IPN
    header('location:' . $paypalUrl . '?' . $queryString);
    //exit();


   
    // Handle the PayPal response.

// Create a connection to the database.
$db = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);

// Assign posted variables to local data array.
$data = [
    'item_name' => $_POST['item_number'],
    'payment_amount' => $_POST['payment_amount'],
    'add' => $_POST['add']
];
//echo "<pre>";print_r($data);
// We need to verify the transaction comes from PayPal and check we've not
// already processed the transaction before adding the payment to our
// database.

    if (addPayment($data) !== false) {
        // Payment successfully added.
        //echo "hi";exit();
        //header("location:payment-successful.html");
    }

}
?>