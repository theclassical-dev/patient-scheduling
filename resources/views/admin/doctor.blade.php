@extends('layouts.admin')

@section('content')
<script type="text/javascript">
	$(document).ready(function () {
        $('#dt').DataTable();
        $('#dp').DataTable();

        $(".delBtn").on("click", function(e){
            e.preventDefault();
            try{
                var d = $(this).data('all');

                $("#md-delete [name='id']").val(d.id);
                $("#md-delete").modal('show');
            }
            catch(err){
                alert(err);
            }
        });

		//verify
		$(".vrBtn").on("click", function(e){
            e.preventDefault();
            try{
                var d = $(this).data('all');

                $("#md-verify [name='id']").val(d.id);
                $("#md-verify").modal('show');
            }
            catch(err){
                alert(err);
            }
        });

		$(".edtBtn").on("click", function(e){
            e.preventDefault();
            try{
                var d = $(this).data('all');

                // $("#md-prop [name='id']").val(d.id);
                $("#md-edit [name='id']").val(d.id);
                $("#md-edit [name='name']").val(d.name);
                $("#md-edit [name='department']").val(d.department);
				$("#md-edit .modal-title").text("Update Record For : " + d.name);

                $("#md-edit").modal('show');
            }
            catch(err){
                alert(err);
            }
        });

    });
</script>
<div class="row">
	<div class="col-12">
		@include("layouts.msg")
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Doctors</h3>
				<button class="btn btn-primary" data-toggle="modal" data-target="#md-create" style="float:right;">Add Doctor</button>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="dp" class="table table-bordered table-striped">
						<thead>
							<th>S/N</th>
							<th>Actions</th>
							<th>FullName</th>
							<th>Department</th>
						</thead>
						<tbody>
							@php
                                $q = DB::select("SELECT * FROM doctors ORDER BY id");
                            @endphp
                            @forelse($q as $r)
	                            @php
	                                $x['id'] = $r->id;
	                            @endphp
                            	<tr>
									<td>{{ $loop->iteration }}</td>
									<td>
										<button class="btn btn-primary btn-sm edtBtn" data-all="{{ (json_encode($r)) }}"><i class="fa fa-edit"></i></button>
										<button class="btn btn-danger btn-sm delBtn" data-all="{{ (json_encode($x)) }}"><i class="fa fa-trash"></i></button>
									</td>
									<td>{{ $r->name}}</td>
									<td>{{ $r->department}}</td>
									
								</tr>
                            @empty

                            @endforelse
							
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.box -->

		</div>
	</div>
</div>
<!-- Modal -->

<div class="modal center-modal fade" id="md-create" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Doctor</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				
					{{ csrf_field() }}
						<div class="form-group">
							<label>Fullname *</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
						</div>
                        <div class="form-group">
							<label>Department *</label>
							<input type="text" name="department" class="form-control" value="{{ old('department') }}" required>
						</div>
			</div>
			<div class="modal-footer modal-footer-uniform">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-success" type="submit" name="create">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div class="modal center-modal fade" id="md-edit" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update </h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
				
					{{ csrf_field() }}
						<div class="form-group">
							<label>Fullname *</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            <input type="hidden" name="id" value="{{ old('id') }}">
						</div>
                        <div class="form-group">
							<label>Department *</label>
							<input type="text" name="department" class="form-control" value="{{ old('department') }}" required>
						</div>
			</div>
			<div class="modal-footer modal-footer-uniform">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-success" type="submit" name="update">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div class="modal center-modal fade" id="md-delete" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Delete Record</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST">
			<div class="modal-body">
				
					{{ csrf_field() }}
					<div class="form-group">
						<p>Are You Sure ?</p>
						<input type="hidden" name="id" value="">
					</div>
				
			</div>
			<div class="modal-footer modal-footer-uniform">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-danger" type="submit" name="delete">Delete</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->
@endsection