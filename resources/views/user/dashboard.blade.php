@extends('layouts.front')

@section("content")
<div class="row">
    <div class="col-lg-6 col-12">
        @include('layouts.msg')
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Book An Appointment</h4>
          </div>
          <!-- /.box-header -->
          <form class="form" method="POST">
            @csrf
              <div class="box-body">
                  <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Personal Info</h4>
                  <hr class="my-15">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="firstname"required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="lastname"required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >E-mail</label>
                        <input type="text" class="form-control" placeholder="E-mail" name="email"required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Contact Number</label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone"required>
                      </div>
                    </div>
                  </div>
                  <h4 class="box-title text-info"><i class="ti-save mr-15"></i> Requirements</h4>
                  <hr class="my-15">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" placeholder="address" name="address"required>
                  </div>
                
                    <div class="form-group">
                        <label>illness Type</label>
                        <select class="form-control" name="disease" required>
                            <option>malaria</option>
                            <option>Typhord</option>
                            <option>Covid 19</option>
                            <option>Lupus</option>
                            <option>yellow</option>
                            <option>others</option>
                        </select>
                    </div>
                  <div class="form-group">
                    <label>Say More About The Symptoms (optional)</label>
                    <textarea rows="5" class="form-control" placeholder="About Project" name="description"></textarea>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                    <i class="ti-trash"></i> Cancel
                  </button>
                  @if ($block->status != 0 ?? '')
                  <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="book">
                    <i class="ti-save-alt"></i> Save
                  </button>
                  @else
                  <button type="submit" class="btn btn-rounded btn-primary btn-outline" disabled>
                    <i class="ti-save-alt"></i> Save
                  </button>
                  @endif
                  
              </div>  
          </form>
        </div>
        <!-- /.box -->			
  </div> 
	<!-- ./col -->
</div>

@endsection