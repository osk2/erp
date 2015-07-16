<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ArayTek ERP</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
	<link rel="stylesheet" href="//cdn.datatables.net/responsive/1.0.6/css/dataTables.responsive.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<p>&nbsp;</p>
				<h1>元件總覽 <small>該有的都有了</small></h1>
				<p>&nbsp;</p>
				<table class="table table-bordered display responsive no-wrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>元件名稱</th>
							<th>元件分類</th>
							<th>元件製程</th>
							<th>元件規格</th>
							<th>製造商</th>
							<th>製造商料號</th>
							<th>供應商</th>
							<th>供應商聯絡人</th>
							<th>供應商聯絡人Email</th>
							<th>M.O.Q.</th>
							<th>交期</th>
							<th>剩餘數量</th>
							<th>價格</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($components as $component)
						<tr>
							<td>{{$component -> cid}}</td>
							<td>{{$component -> component_name}}</td>
							<td>{{$component -> component_category}}</td>
							<td>{{$component -> component_process_type}}</td>
							<td>{{$component -> component_specification}}</td>
							<td>{{$component -> manufacturer_name}}</td>
							<td>{{$component -> manufacturer_part_number}}</td>
							<td>{{$component -> supplier_name}}</td>
							<td>{{$component -> supplier_contact}}</td>
							<td>{{$component -> supplier_contact_email}}</td>
							<td>{{$component -> moq}}</td>
							<td>{{$component -> delivery_time}}</td>
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
	<script>
		$('table').DataTable({
			responsive:  true,
			'language': {
				'url': 'misc/zh_TW.json'
			}
		});
	</script>
</body>
</html>