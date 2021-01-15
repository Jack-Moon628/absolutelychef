<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo !empty($title) ? $title : 'Absolutly Chef'; ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" <?php echo e(! request()->is('payment*')? 'defer' : ''); ?>></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">

    <script type='text/javascript'>
        /* <![CDATA[ */
        var page_data = <?php echo pageJsonData(); ?>;
        /* ]]> */
    </script>
    <?php echo $__env->yieldContent('head'); ?>
</head>
<body class="<?php echo e(request()->routeIs('home') ? ' home ' : ''); ?> <?php echo e(request()->routeIs('job_view') ? ' job-view-page ' : ''); ?>">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel transparent-navbar p-0">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(secure_asset('assets/images/logo-absolutly.png')); ?>" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                menu
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home')); ?>"> <?php echo app('translator')->get('app.home'); ?></a> </li>

                    <?php
                    $header_menu_pages = config('header_menu_pages');
                    $footer_menu_pages = config('footer_menu_pages');
                    ?>
                    

                    <li class="nav-item"><a class="nav-link" href=" <?php echo e(route('jobs_listing')); ?>"> Careers</a> </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register_employer')); ?>"> Businesses Hiring </a> </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register_job_seeker')); ?>"> Register CV                    </a> </li>
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white" href="<?php echo e(route('advertise')); ?>">Are you hiring? Advertise Here.  </a>
                    </li>

                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"> <?php echo e(__('app.login')); ?></a>
                        </li>
                        <li class="nav-item">
                            <?php if(Route::has('new_register')): ?>
                                <a class="nav-link" href="<?php echo e(route('new_register')); ?>"> <?php echo e(__('app.register')); ?></a>
                            <?php endif; ?>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="la la-user"></i> <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('app.dashboard')); ?> </a>


                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div id="main-footer" class="main-footer transparent-navbar py-5">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img width="180px"  src="<?php echo e(secure_asset('assets/images/logo-absolutly.png')); ?>" />

                </div>


                <div class="col-md-4">
                    <!-- <h4 class="mb-3">Learn About Absolutely Chef</h4> -->
                    <div class="footer-menu-wrap mt-2">
                        <ul class="list-unstyled">
                            <?php if($footer_menu_pages->count() > 0): ?>
                                <?php $__currentLoopData = $footer_menu_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('single_page', $page->slug)); ?>"><?php echo e($page->title); ?> </a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?> 
                        </ul>
                    </div>

                </div>

                <div class="col-md-4">
                    <h4 class="mb-3">Absolutely Chef`s Services</h4>
                    <div class="footer-menu-wrap  mt-2">

                        <ul class="list-unstyled">
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('advertise')); ?>">Advertise a job </a> </li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/contact-us/?type=jobseekers')); ?>">Contact us - jobseekers</a> </li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/contact-us/?type=recruiters')); ?>">Contact us - recruiters                            </a> </li>
                        </ul>

                    </div>

                </div>


            </div>


        </div>

    </div>
    <div class="row bg-black">
        <div class="col-md-12">
            <div class="footer-copyright-text-wrap text-center mt-4 text-light">
                <p><?php echo get_text_tpl(get_option('copyright_text')); ?></p>
            </div>
        </div>
    </div>

</div>



<!-- Scripts -->
<?php echo $__env->yieldContent('page-js'); ?>
<script src="<?php echo e(asset('assets/js/main.js')); ?>" defer></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef_1.14.3\absolutelychef\resources\views/layouts/theme.blade.php ENDPATH**/ ?>