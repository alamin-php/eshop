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
  <style type="text/css">
	.message{
		min-height: 400px;
		margin-top: 10px;
	}
	.icon{
		font-size: 72px;
		color: green;
		padding: 20px;
	}

	.message h2 {
		color: #444;
		font-weight: bold;
	}
	.message a{
		margin-top: 100px;
		display: inline-block;
		font-size: 18px;
	}
  </style>
</head>
<body>


		<div class="wrap">
			<!-- <span class="text-center"><i class="fa fa-rocket text-center"></i></span> -->
			<div class="message text-center">
				<i class="fa fa-check-circle icon"></i>
				<h2>Thank you!</h2>
				<h4>Your submission is received and we will contact you soon.</h4>
				<button class="btn btn-success text-uppercase">Buy This order now</button><br>
				<a href="{{ route('shop.cart.index') }}" class="text-uppercase">&#x2190; Back To Home</a>
			</div>
		</div>


</body>
</html>