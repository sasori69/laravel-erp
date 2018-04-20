@extends('master')
@section('content')
<link href="{{ asset('fiture-style/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<div class="container-fluid">
	<div class="animate fadeIn">
		<div class="row">
			<div class="col-sm-6">
				<p>
				<button type="button" class="btn btn-primary" onclick="refresh()">
					<i class="fa fa-refresh"></i>
				</button>
				<a href="{{ route('product.create') }}" class="btn btn-primary ladda-button" data-style="zoom-in">
					<span class="ladda-label">
						<i class="fa fa-plus">
						</i>
							New Products
					</span>
				</a>
                <a href="{{ route('product.index') }}/import" class="btn btn-success ladda-button" data-style="zoom-in">
					<span class="ladda-label">
						<i class="fa fa-cloud-download">
						</i>
							Import Products
					</span>
				</a>
                <a href="{{ route('product.index') }}/export" class="btn btn-success ladda-button" data-style="zoom-in">
					<span class="ladda-label">
						<i class="fa fa-file-excel-o">
						</i>
							Export Products
					</span>
				</a>
			</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<i class="fa fa-align-justify"></i> Products Table
                        <div class="card-actions">
                            <a href="#" target="_blank">
                            <small class="text-muted">docs</small>
                            </a>
                        </div>
					</div>
					<div class="card-body">
						<table class="table table-responsive-sm table-bordered table-striped table-sm datatable">
							<thead>
								<tr>
									<th rowspan="2">Code</th>
									<th rowspan="2">Name</th>
									<th rowspan="2">Type</th>
									<th rowspan="2">Stock</th>
									<th colspan="6">Value</th>
									<th rowspan="2">Currency</th>
									<th rowspan="2">Date registered</th>
									<th rowspan="2"></th>
								</tr>
								<tr>
									<th>250 Gr</th>
									<th>500 Gr</th>
									<th>1 Kg</th>
									<th>5 Kg</th>
									<th>25 Kg</th>
									<th>30 Kg</th>
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
	        ajax: "{{ route('product.index') }}/list-data",
	        columns: [
	            {data: 'code', name: 'code'},
	            {data: 'name', name: 'name'},
	            {data: 'type', name: 'type'},
	            {data: 'stock', name: 'stock'},
	            {data: 'price.[0].price', name: 'prices'},
	            {data: 'price.[1].price', name: 'price'},
	            {data: 'price.[2].price', name: 'price'},
	            {data: 'price.[3].price', name: 'price'},
	            {data: 'price.[4].price', name: 'price'},
	            {data: 'price.[5].price', name: 'price'},
	            {data: 'currency', name: 'currency'},
	            {data: 'created_at', name: 'created_at'},
	            {data: 'action', name: 'action', orderable: false, searchable: false, width:'20%'}
	        ],
			
			"order":[[11, 'desc']]
		});
		$('.datatable').attr('style','border-collapse: collapse !important');
		
</script>

@endsection