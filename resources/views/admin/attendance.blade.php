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
                $("#md-edit [name='date']").val(d.date);
                $("#md-edit [name='time']").val(d.time);
				// $("#md-edit .modal-title").text("Mark Attendance For: " + d.firstname+ " " + d.lastname);
				$("#md-edit .modal-title").text("Mark Attendance For: John Smith");

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
				<h3 class="box-title">Appointment Attendance Table</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="dp" class="table table-bordered table-striped">
						<thead>
							<th>S/N</th>
							<th>Fullname</th>
							<th>Email</th>
							<th>Phone No.</th>
							<th>Address</th>
							<th>illness Type</th>
							<th>illness Description</th>
							<th>App. Date</th>
							<th>Attendance Status</th>
							<th>Mark Attendance</th>
						</thead>
						<tbody>
							@php
                                $q = DB::select("SELECT * FROM appointments ORDER BY id DESC");
                            @endphp
                            @forelse($q as $r)
	                            @php
	                                $x['id'] = $r->id;
	                            @endphp
                            	<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $r->firstname. " ".$r->lastname}}</td>
									<td>{{ $r->email}}</td>
									<td>{{ $r->phone}}</td>
									<td>{{ $r->address}}</td>
									<td>{{ $r->disease}}</td>
									<td>{{ $r->description}}</td>
									<td>{{ date('d F Y',strtotime($r->date)). ' ' . $r->time}}</td>
									<td>{{ $r->attendance}}</td>
									<td>
										<button class="btn btn-primary btn-sm edtBtn" data-all="{{ (json_encode($r)) }}"><i class="fa fa-calendar-check-o"></i></button>
									</td>
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
						<select name="attendance" class="form-control">
							<option value="{{ old('attendance')}}">{{ old('attendance')}}</option>
							<option value="Missed">Missed</option>
							<option value="Attended">Attended</option>
						</select>
						<input type="hidden" name="id">
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


<!-- /.modal -->
@endsection