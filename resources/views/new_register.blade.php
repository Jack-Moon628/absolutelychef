@extends('layouts.theme')

@section('content')
    <div class="new-registration-page py-5 bg-light">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="register-account-box rounded shadow p-3 bg-white">
                        <h2>@lang('app.job_seeker')</h2>
                        <p class="icon"><i class="la la-user"></i> </p>
                        <p>@lang('app.job_seeker_new_desc')</p>
                        <a href="{{route('register_job_seeker')}}" class="btn btn-danger"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="register-account-box rounded shadow  p-3 bg-white">
                        <h2>@lang('app.employer')</h2>
                        <p class="icon"><i class="la la-black-tie"></i> </p>
                        <p>@lang('app.employer_new_desc')</p>
                        <a href="{{route('register_employer')}}" class="btn btn-danger"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="register-account-box rounded shadow  p-3 bg-white">
                        <h2>@lang('app.agency')</h2>
                        <p class="icon">
                            <i class="la la-users"></i>
                         </p>
                        <p>@lang('app.agency_new_desc')</p>
                        <a href="{{route('register_agent')}}" class="btn btn-danger"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
