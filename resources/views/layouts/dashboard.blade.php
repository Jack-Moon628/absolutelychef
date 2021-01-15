<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty($title) ? $title : __('app.dashboard') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/css/admin.css') }}" rel="stylesheet">

    @yield('page-css')

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <script type='text/javascript'>
        /* <![CDATA[ */
        var page_data = {!! pageJsonData() !!};
        /* ]]> */
    </script>

</head>
<body>
@php
$pendingJobCount = \App\Job::pending()->count();
$approvedJobCount = \App\Job::approved()->count();
$blockedJobCount = \App\Job::blocked()->count();
$user = Auth::user();
@endphp

    <div id="app">


        <div id="main-container" class="main-container">
            <div class="row">
                <div class="col-md-3 p-0">

                    <div class="sidebar shadow scrollbar-ripe-malink">
                        <div class=" text-center" >
                            <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
                                <img  src="{{secure_asset('assets/images/logo-absolutly.png')}}" />
                            </a>
                        </div>
                        <hr class="bg-white mt-0">
                        <ul class="sidebar-menu list-group">
                            @if($user->user_type == 'employer' || $user->user_type == 'agent')
                            <li class="{{request()->is('dashboard/employer/profile*')? 'active' : ''}}">
                                <a href="{{route('employer_profile')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-user"></i> </span>
                                    <span class="title">@lang('app.profile')</span>
                                </a>
                            </li>
                            @elseif($user->user_type == 'user')
                            <li class="{{request()->is('dashboard/u/profile*')? 'active' : ''}}">
                                <a href="{{route('profile')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-user"></i> </span>
                                    <span class="title">@lang('app.profile')</span>
                                </a>
                            </li>
                            @else
                            <li class="{{request()->is('dashboard')? 'active' : ''}}">
                                <a href="{{route('dashboard')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-home"></i> </span>
                                    <span class="title">@lang('app.dashboard')</span>
                                </a>
                            </li>
                            
                            @endif
                            @if($user->user_type == 'user')
                            <li class="{{request()->is('dashboard/u/applied-jobs*')? 'active' : ''}}">
                                <a href="{{route('applied_jobs')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-list-alt"></i> </span>
                                    <span class="title">@lang('app.applied_jobs')</span>
                                </a>
                            </li>
                            @endif

                            @if($user->is_admin())

                            <li class="{{request()->is('dashboard/categories*')? 'active' : ''}}">
                                <a href="{{route('dashboard_categories')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-th-large"></i> </span>
                                    <span class="title">@lang('app.categories')</span>
                                </a>
                            </li>
                            @endif

                            @if( ! $user->is_user())


                            <li class="{{request()->is('dashboard/employer*') &&  !request()->is('dashboard/employer/profile') ? 'active' : ''}}">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-black-tie"></i> </span>
                                    <span class="title">@lang('app.employer')</span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link" href="{{route('employer_orders') }}">@lang('app.post_new_job')</a></li>
                                    <li><a class="sidebar-link" href="{{route('posted_jobs')}}">@lang('app.posted_jobs')</a></li>
                                    <li><a class="sidebar-link" href="{{route('employer_applicant')}}">@lang('app.applicants')</a></li>
                                    <li><a class="sidebar-link" href="{{route('shortlisted_applicant')}}">@lang('app.shortlist')</a></li>
                                </ul>
                            </li>

                            @endif

                            @if($user->is_admin())


                            <li class="{{request()->is('dashboard/jobs*')? 'active' : ''}}">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-briefcase"></i> </span>
                                    <span class="title">@lang('app.jobs')</span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link {{request()->is('dashboard/jobs/pending')? 'child-active' : ''}}" href="{{route('pending_jobs')}}">@lang('app.pending') <span class="badge badge-primary float-right">{{$pendingJobCount}}</span></a> </li>
                                    <li><a class="sidebar-link {{request()->is('dashboard/jobs/approved')? 'child-active' : ''}}" href="{{route('approved_jobs')}}">@lang('app.approved')  <span class="badge badge-primary float-right">{{$approvedJobCount}}</span> </a></li>
                                    <li><a class="sidebar-link {{request()->is('dashboard/jobs/blocked')? 'child-active' : ''}}" href="{{route('blocked_jobs')}}">@lang('app.blocked')  <span class="badge badge-primary float-right">{{$blockedJobCount}}</span> </a></li>
                                </ul>
                            </li>

                            <li class="{{request()->is('dashboard/flagged*')? 'active' : ''}}">
                                <a href="{{route('flagged_jobs')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-flag-o"></i> </span>
                                    <span class="title">@lang('app.flagged_jobs')</span>
                                </a>
                            </li>


                            <li class="{{request()->is('dashboard/cms*')? 'active' : ''}}">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-file-text-o"></i> </span>
                                    <span class="title">@lang('app.cms')</span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link" href="{{route('pages')}}">@lang('app.pages')</a></li>
                                    {{-- <li><a class="sidebar-link" href="{{route('posts')}}">@lang('app.posts')</a></li> --}}
                                </ul>
                            </li>


                            <li class="{{request()->is('dashboard/settings*')? 'active' : ''}}">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-cogs"></i> </span>
                                    <span class="title">@lang('app.settings')</span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link" href="{{route('general_settings')}}">@lang('app.general_settings')</a></li>
                                </ul>
                            </li>

                            @endif
                            @if($user->user_type != 'user')
                            <li class="{{request()->is('dashboard/payments*')? 'active' : ''}}">
                                <a href="{{route('payments')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-money"></i> </span>
                                    <span class="title">@lang('app.payments')</span>
                                </a>
                            </li>
                            @endif
                            @if($user->is_admin())

                            {{--
                            <li>
                                <a href="{{route('dashboard')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-user-secret"></i> </span>
                                    <span class="title">@lang('app.administrator')</span>
                                </a>
                            </li>
                            --}}
                            <li class="{{request()->is('dashboard/u/users*')? 'active' : ''}}">
                                <a href="{{route('users')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-users"></i> </span>
                                    <span class="title">@lang('app.users')</span>
                                </a>
                            </li>

                            @endif
                            @if($user->user_type == 'admin')
                                <li class="{{request()->is('dashboard/employer/profile') ? 'active' : ''}}">
                                    <a href="{{route('employer_profile')}}" class="list-group-item-action active">
                                        <span class="sidebar-icon"><i class="la la-user"></i> </span>
                                        <span class="title">@lang('app.profile')</span>
                                    </a>
                                </li>
                            @endif


                            <li class="{{request()->is('dashboard/account*')? 'active' : ''}}">
                                <a href="{{route('change_password')}}" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-lock"></i> </span>
                                    <span class="title">@lang('app.change_password')</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}" class="list-group-item-action active"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="sidebar-icon"><i class="la la-sign-out"></i> </span>
                                    <span class="title">@lang('app.logout')</span>
                                </a>
                            </li>


                        </ul>
                    </div>

                </div>
                <div class="col-md-9 p-0">
                    <nav class="navbar navbar-expand-md navbar-laravel shadow-sm  scrollbar-dusty-grass thin square">
                        <div class="container-fluid">
                            
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                              
                                <span class="navbar-toggler-icon"></span>
                            </button>
            
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item"><a class="nav-link text-danger" href="{{route('home')}}"><i class="la la-home"></i> @lang('app.view_site')</a> </li>
                                </ul>
            
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    @if($user->user_type != 'user')
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-danger text-white" href="{{route('employer_orders') }}"><i class="la la-save"></i>{{__('app.post_new_job')}} </a>
                                    </li>
                                    @endif
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                            <span class="caret"></span>
                                        </a>
            
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
            
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="main-page pl-4 pr-4">
                        <div class="col-md-12 mt-4">
                            @yield('top-content')
                        </div>
                        <div class="main-page-title mt-3 mb-3 d-flex">
                            <h3 class="flex-grow-1">{!! ! empty($title) ? $title : __('app.dashboard') !!}</h3>

                            <div class="action-btn-group">@yield('title_action_btn_gorup')</div>
                        </div>

                        @include('admin.flash_msg')

                        <div class="main-page-content p-4 mb-4 shadow rounded-lg">
                            @yield('content')
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- Scripts -->
    @yield('page-js')
    <script src="{{ secure_asset('assets/js/admin.js') }}" defer></script>
    

</body>
</html>
