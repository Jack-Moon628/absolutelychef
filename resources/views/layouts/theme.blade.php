<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! !empty($title) ? $title : 'Absolutly Chef' !!}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" {{ ! request()->is('payment*')? 'defer' : ''}}></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">

    <script type='text/javascript'>
        /* <![CDATA[ */
        var page_data = {!! pageJsonData() !!};
        /* ]]> */
    </script>
    @yield('head')
</head>
<body class="{{request()->routeIs('home') ? ' home ' : ''}} {{request()->routeIs('job_view') ? ' job-view-page ' : ''}}">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel transparent-navbar p-0">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{secure_asset('assets/images/logo-absolutly.png')}}" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                menu
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}"> @lang('app.home')</a> </li>

                    <?php
                    $header_menu_pages = config('header_menu_pages');
                    $footer_menu_pages = config('footer_menu_pages');
                    ?>
                    {{-- @if($header_menu_pages->count() > 0)
                        @foreach($header_menu_pages as $page)
                            <li class="nav-item"><a class="nav-link" href="{{ route('single_page', $page->slug) }}">{{ $page->title }} </a></li>
                        @endforeach
                    @endif --}}

                    <li class="nav-item"><a class="nav-link" href=" {{ route('jobs_listing')}}"> Careers</a> </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register_employer') }}"> Businesses Hiring </a> </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('register_job_seeker') }}"> Register CV                    </a> </li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{route('blog_index')}}">@lang('app.blog')</a> </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact_us')}}">@lang('app.contact_us')</a> </li> --}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white" href="{{route('advertise')}}">Are you hiring? Advertise Here.  </a>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"> {{ __('app.login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('new_register'))
                                <a class="nav-link" href="{{ route('new_register') }}"> {{ __('app.register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="la la-user"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('dashboard')}}">{{__('app.dashboard')}} </a>


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
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container">
        @yield('content')
    </div>

    <div id="main-footer" class="main-footer transparent-navbar py-5">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img width="180px"  src="{{secure_asset('assets/images/logo-absolutly.png')}}" />

                </div>


                <div class="col-md-4">
                    <!-- <h4 class="mb-3">Learn About Absolutely Chef</h4> -->
                    <div class="footer-menu-wrap mt-2">
                        <ul class="list-unstyled">
                            @if($footer_menu_pages->count() > 0)
                                @foreach($footer_menu_pages as $page)
                                    <li class="nav-item"><a class="nav-link" href="{{ route('single_page', $page->slug) }}">{{ $page->title }} </a></li>
                                @endforeach
                            @endif 
                        </ul>
                    </div>

                </div>

                <div class="col-md-4">
                    <h4 class="mb-3">Absolutely Chef`s Services</h4>
                    <div class="footer-menu-wrap  mt-2">

                        <ul class="list-unstyled">
                            <li class="nav-item"><a class="nav-link" href="{{route('advertise')}}">Advertise a job </a> </li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/contact-us/?type=jobseekers')}}">Contact us - jobseekers</a> </li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/contact-us/?type=recruiters')}}">Contact us - recruiters                            </a> </li>
                        </ul>

                    </div>

                </div>


            </div>


        </div>

    </div>
    <div class="row bg-black">
        <div class="col-md-12">
            <div class="footer-copyright-text-wrap text-center mt-4 text-light">
                <p>{!! get_text_tpl(get_option('copyright_text')) !!}</p>
            </div>
        </div>
    </div>

</div>



<!-- Scripts -->
@yield('page-js')
<script src="{{ secure_asset('assets/js/main.js') }}" defer></script>

</body>
</html>
