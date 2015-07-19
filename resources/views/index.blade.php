<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Araytek ERP</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style>
		.function-block {
			min-height: 100px;
			text-align: right;
		}
		.function-block h2 {
			line-height: 100px;
			vertical-align: middle;
			display: inline-block;
		}
		.function-block h2 a {
			text-decoration: none;
			color: #FFFFFF;
		}
		.function-block:hover .block-wrapper {
			transform: rotateY(360deg);
		}

		.function-block .block-wrapper {
			transition: 1s;
			transform-style: preserve-3d;
			position: relative;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Araytek ERP</h1>
			<p>&nbsp;</p>
			<h3>選擇入口</h3>
			<a href="{{url('./models')}}" class="function-block">
				<div class="col-md-3 bg-primary front-block">
					<h2>
						Models
					</h2>
				</div>
			</a>
			<a href="{{url('./components')}}" class="function-block">
				<div class="block-wrapper">
					<div class="col-md-3 col-md-offset-1 bg-primary front-block">
						<h2>Components</h2>
					</div>
					<div class="back-block">
						
					</div>
				</div>
			</a>
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>