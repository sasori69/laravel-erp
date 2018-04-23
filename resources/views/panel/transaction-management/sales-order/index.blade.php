@extends('master')
@section('content')
<link href="{{ asset('fiture-style/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<ul class="breadcrumb">
  <li><a href="{{ url('/') }}">Dashboard&nbsp;&nbsp;</a>/</li>
  <li class="active">&nbsp;&nbsp;Data SO</li> 
</ul>
<div class="container-fluid">
	<div class="animate fadeIn">
		<div class="row">
			<div class="col-sm-6">
				<p>
				<button type="button" class="btn btn-primary" onclick="refresh()">
					<i class="fa fa-refresh"></i>
				</button>
				<a href="{{ route('sales-order.create') }}" class="btn btn-primary ladda-button" data-style="zoom-in">
					<span class="ladda-label">
						<i class="fa fa-plus">
						</i>
							New Order
					</span>
				</a>
                
			</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<i class="fa fa-align-justify"></i> Sales Order Table
                        <div class="card-actions">
                            <a href="#" target="_blank">
                            <small class="text-muted">docs</small>
                            </a>
                        </div>
					</div>
					<div class="card-body table-responsive-sm" style="width: 100%;">
						<table class="table table-responsive-sm table-bordered table-striped table-sm datatable" style="width: 100%;" >
							<thead>
								<tr>
									<th>SO No</th>
									<th>SO Date</th>
									<th>Client</th>
									<th>Product</th>
									<th>Total</th>
									<th>Packaging</th>
									<th>Amount</th>
									<th>Catatan</th>
									<th>Status</th>
									<th>Date registered</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>		
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection
<!-- /.container-fluid -->

@section('myscript')
<script src="{{ asset('fiture-style/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('fiture-style/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('fiture-style/validation/jquery.validate.min.js') }}"></script>

<script>
	//DATATABLES
		$('.datatable').DataTable({
			processing: true,
	        serverSide: true,
	        ajax: '{{ route('sales-order.index') }}/list-data',
	        columns: [
	            {data: 'sono', name: 'sono'},
	            {data: 'date', name: 'date'},
	            {data: 'client', name: 'client'},
	            {data: 'productattr.[<br>].name', name: 'name'},
	            {data: 'productattr.[<br>].total', name: 'total'},
	            {data: 'productattr.[<br>].packaging', name: 'packaging'},	            
	            {data: 'productattr.[<br>].amount', name: 'amount'},
	            {data: 'catatan', name: 'catatan'},
	            {data: 'status', name: 'status', orderable: false},
	            {data: 'created_at', name: 'created_at'},
	            {data: 'action', name: 'action', orderable: false, searchable: false, width:'20%'}
	        ],
			"columnDefs": [
				{"targets": 10,"className": "text-center"},
				{"targets": 8,"className": "text-center"}
			],
			"order":[[9, 'desc']]
		});
		$('.datatable').attr('style','border-collapse: collapse !important');
		
</script>

@endsection