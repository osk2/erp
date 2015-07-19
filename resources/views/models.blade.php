<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Models - Araytek ERP</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
	<link rel="stylesheet" href="//cdn.datatables.net/responsive/1.0.6/css/dataTables.responsive.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<p>&nbsp;</p>
			<h1 class="page-header">
				機型資訊 
				<div class="dropdown" style="display: inline">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						選擇機型 
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li class="dropdown-header">機型列表</li>
						@foreach ($models as $model)
							<li><a href="{{url('./models')}}/{{$model -> model_codename}}" class="codename">{{$model -> model_codename}}</a></li>
						@endforeach
					</ul>
				</div>
			</h1>
			{!! $info or '' !!}
			<form action="#" class="form-inline form-calc" style="display: none">
				<div class="form-group">
					<label for="model-amount">計算機︰</label>
					<input type="text" class="form-control" id="model-amount" placeholder="賣多少？">
					<span></span>
				</div>
			</form>
			<p>&nbsp;</p>
			<div class="col-md-12 col-lg-12">
				<table class="table table-bordered display responsive no-wrap">
					<thead>
						<tr>
							<th>機型代號</th>
							<th>元件ID</th>
							<th>元件名稱</th>
							<th>使用數量</th>
							<th>元件分類</th>
							<th>元件製程</th>
							<th>元件規格</th>
							<th>剩餘數量</th>
							<th>價格</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($components as $component)
						<tr>
							<td>{{$component -> model_codename}}</td>
							<td>{{$component -> cid}}</td>
							<td>{{$component -> component_name}}</td>
							<td>{{$component -> amount}}</td>
							<td>{{$component -> component_category}}</td>
							<td>{{$component -> component_process_type}}</td>
							<td>{{$component -> component_specification}}</td>
							<td>{{$component -> balance}}</td>
							<td>{{$component -> currency}} {{$component -> unit_price}}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="//cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.js"></script>
	<script src="{{url('./js')}}/jquery.dataTables.editable.js"></script>
	<script src="{{url('./js')}}/jquery.jeditable.js"></script>
	<script>
		if (!Array.prototype.last) {
			Array.prototype.last = function() {
				return this[this.length - 1];
			}
		}

		$(function() {
			var dropdown_text = '',
				cost = {{$cost or 0}};

			if (window.location.pathname.split('/').last() === 'models') {
				dropdown_text = '所有機型 <span class="caret"></span>';
			} else {
				dropdown_text = window.location.pathname.split('/').last() + ' <span class="caret"></span>';
			}
			$('.dropdown-toggle').html(dropdown_text);

			$('table').dataTable({
				responsive:  true
			}).makeEditable();

			if (cost > 0) {
				$('.form-calc').show();
				$('#model-amount').on('keyup', function(e) {
					if ($(this).val() === '') {
						$(this).next().html('');
					}
					if (!isNaN(parseInt($(this).val()))) {
						$(this).next().html('成本約 $' + Math.round(parseInt($(this).val()) * cost));
					}
				});
			}
		});

	</script>
</body>
</html>