@extends('layouts.detail')

@section('content')


<div class="box no-shadow mb-0 bg-transparent">
    <div class="box-header no-border px-0">
        <h4 class="box-title">Active Current Appointment Status</h4>							
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-12">
        <a href="#" class="box pull-up">
            <div class="box-body">
                <div class="d-flex align-items-center">
                    <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">	
                        <h1 class="countnm font-size-38">{{ count($user) }}</h1>
                        {{-- <span class="font-size-30 icon-Bulb1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span> --}}
                    </div>
                    <div class="ml-15">											
                        <h5 class="mb-0">Total</h5>
                        <p class="text-fade font-size-12 mb-0">Patients</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-20">
                    <div class="w-p70">
                        <div class="progress progress-sm mb-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ count($user)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ count($user)}}%">
                            </div>
                        </div>
                    </div>
                    <div>
                        {{-- <div>80%</div> --}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-12">
        <a href="#" class="box pull-up">
            <div class="box-body">
                <div class="d-flex align-items-center">
                    <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">	
                        <h1 class="countnm font-size-38">{{ count($request)}}</h1>
                    </div>
                    <div class="ml-15">											
                        <h5 class="mb-0">Total</h5>
                        <p class="text-fade font-size-12 mb-0">Appointment Requested</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-20">
                    <div class="w-p70">
                        <div class="progress progress-sm mb-0">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ count($request)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ count($request) }}%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-12">
        <a href="#" class="box pull-up">
            <div class="box-body">
                <div class="d-flex align-items-center">
                    <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">	
                        <h1 class="countnm font-size-38">{{ count($booked)}}</h1>
                    </div>
                    <div class="ml-15">											
                        <h5 class="mb-0">Total</h5>
                        <p class="text-fade font-size-12 mb-0">Appointment Scheduled</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-20">
                    <div class="w-p70">
                        <div class="progress progress-sm mb-0">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ count($booked)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ count($booked)}}%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection