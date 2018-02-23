<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_gAsU19RjxnE2cbjGaNDPwQa3",
  "publishable_key" => "pk_test_LJSQGTm0ICA5lE653htLSXfu"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>