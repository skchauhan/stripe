<?php require_once('config.php'); ?>

<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="5000"
          data-locale="auto"></script>
</form>



OR


<!DOCTYPE html>
<html>
<head>
	<title>Stripe Tutorial</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript">
		  Stripe.setPublishableKey('pk_test_LJSQGTm0ICA5lE653htLSXfu');

		  $(function() {
			  var $form = $('#payment-form');
			  $form.submit(function(event) {
			    // Disable the submit button to prevent repeated clicks:
			    $form.find('.submit').prop('disabled', true);

			    // Request a token from Stripe:
			    Stripe.card.createToken($form, stripeResponseHandler);

			    // Prevent the form from being submitted:
			    return false;
			  });
			});


		  function stripeResponseHandler(status, response) {
			  // Grab the form:
			  var $form = $('#payment-form');

			  if (response.error) { // Problem!

			    // Show the errors on the form:
			    $form.find('.payment-errors').text(response.error.message);
			    $form.find('.submit').prop('disabled', false); // Re-enable submission

			  } else { // Token was created!

			    // Get the token ID:
			    var token = response.id;

			    // Insert the token ID into the form so it gets submitted to the server:
			    $form.append($('<input type="hidden" name="stripeToken">').val(token));

			    // Submit the form:
			    $form.get(0).submit();
			  }
			};

	</script>

</head>
<body>
	<form action="charge.php" method="POST" id="payment-form">
	  <span class="payment-errors"></span>

	  <div class="form-row">
	    <label>
	      <span>Card Number</span>
	      <input type="text" size="20" data-stripe="number">
	    </label>
	  </div>

	  <div class="form-row">
	    <label>
	      <span>Expiration (MM/YY)</span>
	      <input type="text" size="2" data-stripe="exp_month">
	    </label>
	    <span> / </span>
	    <input type="text" size="2" data-stripe="exp_year">
	  </div>

	  <div class="form-row">
	    <label>
	      <span>CVC</span>
	      <input type="text" size="4" data-stripe="cvc">
	    </label>
	  </div>

	  <div class="form-row">
	    <label>
	      <span>Billing Zip</span>
	      <input type="text" size="6" data-stripe="address_zip">
	    </label>
	  </div>

	  <input type="submit" class="submit" value="Submit Payment">
	</form>
</body>
</html>

