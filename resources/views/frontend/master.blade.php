<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome | E-Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		.carousel-inner img {
			width: 100%;
			height: 100%;
		}

		.navbar{
			box-shadow: 0px 0px 5px #ccc;
			background: #f8f9fa;
		}
		body{
			background: #e9ecef;
		}
		#demo{
			margin-bottom: 5px;
		}
		.footeroption{
			background: #110D0D;
			color: #B8B8B8;
			margin-top: 20px;
			padding: 20px 0px;
		}
	</style>

</head>
<body>

<!-- ------------Slide Show------------- -->
	@include('frontend.slider')

<!-- ------------------Navigation-------------- -->
	@include('frontend.nav')
<!-- ---------------------------------- -->

<div class="container" style="margin-top: 5px">
	<div class="row">
		@yield('content')
	</div>
</div>
@include('frontend.footer')
</body>
</html>