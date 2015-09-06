<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>元件總覽 - ArayTek ERP</title>
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
				<div class="alert alert-success alert-deleted" style="display: none">
					項目已刪除。&nbsp;<a href="#" class="btn-recovery" data-cid="0">按錯了，我要還原</a>
				</div>
				<table class="table table-bordered display responsive no-wrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>元件名稱</th>
							<th>元件分類</th>
							<th>元件製程</th>
							<th data-class-name="priority">元件規格</th>
							<th>製造商</th>
							<th data-class-name="priority">製造商料號</th>
							<th>供應商</th>
							<th>供應商聯絡人</th>
							<th>供應商聯絡人Email</th>
							<th>M.O.Q.</th>
							<th>交期</th>
							<th data-class-name="priority">剩餘數量</th>
							<th>價格</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($components as $component)
						<tr data-cid="{{$component -> cid}}">
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
							<td>
								<button class="btn btn-primary btn-edit-row" data-cid="{{$component -> cid}}"  data-toggle="modal" data-target="#editModal">編輯</button>
								<button class="btn btn-danger btn-delete-row" data-cid="{{$component -> cid}}">刪除</button>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="alert alert-success alert-deleted" style="display: none">
					項目已刪除。&nbsp;<a href="#" class="btn-recovery" data-cid="0">按錯了快還原</a>
				</div>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
	<div class="modal fade" id="editModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4>編輯元件</h4>
				</div>
				<div class="modal-body">
					<form action="#" name="update-form">
						<input type="hidden" class="editor-input" data-col="cid">
						<input type="hidden" class="editor-input" data-col="maid">
						<input type="hidden" class="editor-input" data-col="suid">
						<div class="form-group">
							<label for="">元件名稱</label>
							<input type="text" class="form-control editor-input" data-col="component_name">
						</div>
						<div class="form-group">
							<label for="">元件分類</label>
							<input type="text" class="form-control editor-input" data-col="component_category">
						</div>
						<div class="form-group">
							<label for="">元件製程</label>
							<input type="text" class="form-control editor-input" data-col="component_process_type">
						</div>
						<div class="form-group">
							<label for="">元件規格</label>
							<input type="text" class="form-control editor-input" data-col="component_specification">
						</div>
						<div class="form-group">
							<label for="">製造商</label>
							<input type="text" class="form-control editor-input" data-col="manufacturer_name">
						</div>
						<div class="form-group">
							<label for="">製造商料號</label>
							<input type="text" class="form-control editor-input" data-col="manufacturer_part_number">
						</div>
						<div class="form-group">
							<label for="">供應商</label>
							<input type="text" class="form-control editor-input" data-col="supplier_name">
						</div>
						<div class="form-group">
							<label for="">供應商聯絡人</label>
							<input type="text" class="form-control editor-input" data-col="supplier_contact">
						</div>
						<div class="form-group">
							<label for="">供應商聯絡人Email</label>
							<input type="text" class="form-control editor-input" data-col="supplier_contact_email">
						</div>
						<div class="form-group">
							<label for="">M.O.Q.</label>
							<input type="text" class="form-control editor-input" data-col="moq">
						</div>
						<div class="form-group">
							<label for="">交期（週）</label>
							<input type="text" class="form-control editor-input" data-col="delivery_time">
						</div>
						<div class="form-group">
							<label for="">剩餘數量</label>
							<input type="text" class="form-control editor-input" data-col="balance">
						</div>
						<div class="form-group">
							<label for="">價格</label>
							<input type="text" class="form-control editor-input" data-col="unit_price">
						</div>
						
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-update">更新</button>
					<button class="btn" data-dismiss="modal" aria-label="Close">取消</button>
				</div>
			</div>
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="//cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.js"></script>
	<script>

	$(function() {

		var table,
			alertTimer;

		table = $('table').DataTable({
			responsive:  true
		});

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(document).on('click', '.btn-delete-row', function(e) {
			var cid = $(this).data('cid');

			$.ajax({
				url: 'api/components/' + cid,
				type: 'DELETE',
				success: function(data) {
					$('.btn-recovery').attr('data-cid', cid);
					$('.alert-deleted').attr('data-cid', cid).show(100);
					alertTimer = setTimeout(function() {
						$('.alert-deleted').hide(100);
					}, 8000);

					table.row($('tr[data-cid="' + cid + '"]')).child.hide(200);
					$('tr[data-cid="' + cid + '"]').hide(200);
				},
				error: function() {
					console.log('Deleting failed');
				}
			});
			e.preventDefault();
		});

		$(document).on('click', '.btn-recovery', function(e) {
			var cid = $(this).attr('data-cid');

			if (parseInt(cid) > 0) {

				$.ajax({
					url: 'api/components/' + cid + '/recovery',
					type: 'PUT',
					success: function(data) {
						table.row($('tr[data-cid="' + cid + '"]')).child.show(200);
						$('tr[data-cid="' + cid + '"]').show(200);
						$('.btn-recovery').attr('data-cid', '0');

						clearTimeout(alertTimer);
						$('.alert-deleted').hide(100);
					},
					error: function() {
						console.log('Recovery failed');
					}
				});
				
			}
			e.preventDefault();
		});

		$('#editModal').on('show.bs.modal', function(e) {
			var button = $(e.relatedTarget),
				cid = button.data('cid');

			$.ajax({
				url: 'api/components/' + cid,
				type: 'GET',
				dataType: 'JSON',
				success: function(data) {
					for(var col in data[0]) {
						$('.editor-input[data-col="' + col + '"]').val(data[0][col]);
					}
					$('.btn-update').attr('data-cid', cid);
				}
			});
		});

		$('.btn-update').on('click', function(e) {
			var cid = $(this).attr('data-cid');
			$.ajax({
				url: 'api/components/' + cid,
				type: 'PUT',
				data: $('form[name="update-form"]').serialize(),
				dataType: 'JSON',
				success: function(data) {
					console.log(data);
				}
			});
		});

	});
	</script>
</body>
</html>