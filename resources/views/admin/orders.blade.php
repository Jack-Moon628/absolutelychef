@extends('layouts.dashboard')

@section('top-content')
<div class="row">
    <div class="col-md-3">
        <div class="p-3 mb-3 text-white bg-primary shadow-sm rounded-lg">
            <h4>Total Jobs</h4>
            <h5>{{ auth()->user()->totalJobs() }}</h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-3 mb-3 bg-success text-white shadow-sm rounded-lg">
            <h4>Active Jobs</h4>
            <h5>{{ auth()->user()->activeJobs()  }}</h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-3 mb-3 bg-danger text-white shadow-sm rounded-lg">
            <h4>Expired Jobs</h4>
            <h5>{{ auth()->user()->expiredJobs()  }}</h5>
        </div>
    </div>
</div>

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
           @if(session()->has('message'))
            <div class="alert alert-warning" role="alert">
                    {{ session()->get('message')  }}
                </div>                
           @endif
            
        </div>
        <div class="col-md-12">
            @if($orders->count())
                <table class="table table-hover text-center">

                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Payment Status</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Job Quantity</th>  
                        <th>Job Posted</th>
                        <th>Promotion Code</th>
                        <th>Date</th>
                        <th>Actions</th>
                        
                    </tr>

                    @foreach($orders as $pack)
                        <tr class="{{ !$pack->hasJobToPost() ? 'bg-danger text-light' : '' }}">
                            <td>{{ $pack->id }}</td>
                            <td>{{ $pack->hasJobToPost() ? "open" : "closed" }}</td>
                            <td>{{ $pack->payment->transactionDetail()->status }}</td>
                            <td>{!!  get_amount($pack->amount) !!}</td>
                            <td>{{ $pack->package_type == 0 ? 'Enterprise' : 'Professional' }}</td>
                            <td>{{ $pack->job_qty }}</td>
                            <td>{{ $pack->job_posted ? $pack->job_posted : 0 }}</td> 
                            <td>{{ $pack->promotion_code }}</td>
                            <td>{{ $pack->created_at }}</td>
                        <td> 
                                @if($pack->hasJobToPost())
                                <a href="{{ route('post_new_job', ['type' => $pack->package_type,'order' => $pack->id ]) }}" class="btn btn-primary btn-sm" title="Post a jobpost a job using with this package">
                                    Post a Job
                                </a>
                                @else
                                full capacity
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                @if(!$job_remained)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="no data-wrap py-5 my-5 text-center">
                                <h1>Account balance used, please purchase more listings</h1>
                                <a href="{{ route('advertise') }}" class="btn btn-outline-primary">Purchase a Package</a>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="no data-wrap py-5 my-5 text-center">
                            <h1>You don’t have any packages</h1>
                            <a href="{{ route('advertise') }}" class="btn btn-outline-primary">Purchase a Package</a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>



@endsection