<!DOCTYPE html>
<html lang="en">
<head>
  <title>Billing Details | E-Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://js.stripe.com/v3/"></script>
  <style type="text/css">
		 .StripeElement {
		  box-sizing: border-box;

		  height: 40px;

		  padding: 10px 12px;

		  border: 1px solid transparent;
		  border-radius: 4px;
		  background-color: white;

		  box-shadow: 0 1px 3px 0 #e6ebf1;
		  -webkit-transition: box-shadow 150ms ease;
		  transition: box-shadow 150ms ease;
		}

		.StripeElement--focus {
		  box-shadow: 0 1px 3px 0 #cfd7df;
		}

		.StripeElement--invalid {
		  border-color: #fa755a;
		}

		.StripeElement--webkit-autofill {
		  background-color: #fefde5 !important;
		}
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center mt-5">Billing Details</h2>
  <hr>
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="card card-primary">
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('shop.cart.index') }}">Home</a></li>
				<li class="breadcrumb-item active"><a href="{{ route('cart.read') }}">Shopping Cart</a></li>
				<li class="breadcrumb-item active">Checkout</li>
			</ul>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-12">
						<!-- ------------customar details------------ -->
						<form action="{{ route('checkout.store') }}" method="post" id="payment-form">
							@csrf
							
							<div class="form-group">
								<input type="text" name="name" id="" placeholder="Name" class="form-control">
							</div>							

							<div class="form-group">
								<input type="email" name="email" id="" placeholder="Email Address" class="form-control">
							</div>								
							<div class="form-group">
								<input type="text" name="phone" id="" placeholder="Phone" class="form-control">
							</div>				
							<div class="form-group">
								<input type="text" name="city" id="" placeholder="City" class="form-control">
							</div>							

							<div class="form-group">
								<input type="text" name="district" id="" placeholder="District Name" class="form-control">
							</div>							

							<div class="form-group">
								<input type="text" name="commune" id="" placeholder="Thana Name" class="form-control">
							</div>							

							<div class="form-group">
								<input type="text" name="postcode" id="" placeholder="Post code" class="form-control">
							</div>								

							<div class="form-group">
								<label for="card-element">
									Credit or debit card
								</label>
								<div id="card-element">
									<!-- A Stripe Element will be inserted here. -->
								</div>
								<!-- Used to display form errors. -->
								<div id="card-errors" role="alert"></div>
							</div>							
							<div class="form-group">
								<button class="btn btn-success"><i class="fa fa-paper-plane"></i> Complete Ordered</button>
							</div>
						</form>

						<!-- ------------customar details------------ -->
					</div>

					<div class="col-lg-3 col-md-3 col-sm-12">
						<div class="form-group">
							
						<ul class="list-group">
							<li class="list-group-item">
							Subtotal
							<span class="badge badge-primary pull-right">{{ Cart::subtotal() }}</span>
						</li>							
						<li class="list-group-item">
							Tax
							<span class="badge badge-primary pull-right">{{ Cart::tax() }}</span>
						</li>							
						<li class="list-group-item">
							Total
							<span class="badge badge-primary pull-right">{{ Cart::total() }}</span>
						</li>
						</ul>

						</div>
						<div class="form-group">
							{{-- <button class="btn btn-info btn-sm"><i class="fa fa-shopping-bag"></i> Checkout</button> --}}
							<a href="{{ route('checkout.index') }}" class="btn btn-info btn-sm"><i class="fa fa-shopping-bag"></i> Checkout</a>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<script>
	// Create a Stripe client.
var stripe = Stripe('pk_test_wRClNM0jFJ0WXkXMrJQeWY1l00T8tPySYY');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

</body>
</html>