<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(!empty($title) ? $title : __('app.dashboard')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/admin.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('page-css'); ?>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <script type='text/javascript'>
        /* <![CDATA[ */
        var page_data = <?php echo pageJsonData(); ?>;
        /* ]]> */
    </script>

</head>
<body>
<?php
$pendingJobCount = \App\Job::pending()->count();
$approvedJobCount = \App\Job::approved()->count();
$blockedJobCount = \App\Job::blocked()->count();
$user = Auth::user();
?>

    <div id="app">


        <div id="main-container" class="main-container">
            <div class="row">
                <div class="col-md-3 p-0">

                    <div class="sidebar shadow scrollbar-ripe-malink">
                        <div class=" text-center" >
                            <a class="navbar-brand m-0" href="<?php echo e(route('dashboard')); ?>">
                                <img  src="<?php echo e(asset('assets/images/logo-absolutly.png')); ?>" />
                            </a>
                        </div>
                        <hr class="bg-white mt-0">
                        <ul class="sidebar-menu list-group">
                            <?php if($user->user_type == 'employer' || $user->user_type == 'agent'): ?>
                            <li class="<?php echo e(request()->is('dashboard/employer/profile*')? 'active' : ''); ?>">
                                <a href="<?php echo e(route('employer_profile')); ?>" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-user"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.profile'); ?></span>
                                </a>
                            </li>
                            <?php elseif($user->user_type == 'user'): ?>
                            <li class="<?php echo e(request()->is('dashboard/u/profile*')? 'active' : ''); ?>">
                                <a href="<?php echo e(route('profile')); ?>" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-user"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.profile'); ?></span>
                                </a>
                            </li>
                            <?php else: ?>
                            <li class="<?php echo e(request()->is('dashboard')? 'active' : ''); ?>">
                                <a href="<?php echo e(route('dashboard')); ?>" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-home"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.dashboard'); ?></span>
                                </a>
                            </li>
                            
                            <?php endif; ?>
                            <?php if($user->user_type == 'user'): ?>
                            <li class="<?php echo e(request()->is('dashboard/u/applied-jobs*')? 'active' : ''); ?>">
                                <a href="<?php echo e(route('applied_jobs')); ?>" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-list-alt"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.applied_jobs'); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if($user->is_admin()): ?>

                            <li class="<?php echo e(request()->is('dashboard/categories*')? 'active' : ''); ?>">
                                <a href="<?php echo e(route('dashboard_categories')); ?>" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-th-large"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.categories'); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if( ! $user->is_user()): ?>


                            <li class="<?php echo e(request()->is('dashboard/employer*') &&  !request()->is('dashboard/employer/profile') ? 'active' : ''); ?>">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-black-tie"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.employer'); ?></span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link" href="<?php echo e(route('employer_orders')); ?>"><?php echo app('translator')->get('app.post_new_job'); ?></a></li>
                                    <li><a class="sidebar-link" href="<?php echo e(route('posted_jobs')); ?>"><?php echo app('translator')->get('app.posted_jobs'); ?></a></li>
                                    <li><a class="sidebar-link" href="<?php echo e(route('employer_applicant')); ?>"><?php echo app('translator')->get('app.applicants'); ?></a></li>
                                    <li><a class="sidebar-link" href="<?php echo e(route('shortlisted_applicant')); ?>"><?php echo app('translator')->get('app.shortlist'); ?></a></li>
                                </ul>
                            </li>

                            <?php endif; ?>

                            <?php if($user->is_admin()): ?>


                            <li class="<?php echo e(request()->is('dashboard/jobs*')? 'active' : ''); ?>">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-briefcase"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.jobs'); ?></span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link <?php echo e(request()->is('dashboard/jobs/pending')? 'child-active' : ''); ?>" href="<?php echo e(route('pending_jobs')); ?>"><?php echo app('translator')->get('app.pending'); ?> <span class="badge badge-primary float-right"><?php echo e($pendingJobCount); ?></span></a> </li>
                                    <li><a class="sidebar-link <?php echo e(request()->is('dashboard/jobs/approved')? 'child-active' : ''); ?>" href="<?php echo e(route('approved_jobs')); ?>"><?php echo app('translator')->get('app.approved'); ?>  <span class="badge badge-primary float-right"><?php echo e($approvedJobCount); ?></span> </a></li>
                                    <li><a class="sidebar-link <?php echo e(request()->is('dashboard/jobs/blocked')? 'child-active' : ''); ?>" href="<?php echo e(route('blocked_jobs')); ?>"><?php echo app('translator')->get('app.blocked'); ?>  <span class="badge badge-primary float-right"><?php echo e($blockedJobCount); ?></span> </a></li>
                                </ul>
                            </li>

                            <li class="<?php echo e(request()->is('dashboard/flagged*')? 'active' : ''); ?>">
                                <a href="<?php echo e(route('flagged_jobs')); ?>" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-flag-o"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.flagged_jobs'); ?></span>
                                </a>
                            </li>


                            <li class="<?php echo e(request()->is('dashboard/cms*')? 'active' : ''); ?>">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-file-text-o"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.cms'); ?></span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link" href="<?php echo e(route('pages')); ?>"><?php echo app('translator')->get('app.pages'); ?></a></li>
                                    
                                </ul>
                            </li>


                            <li class="<?php echo e(request()->is('dashboard/settings*')? 'active' : ''); ?>">
                                <a href="#" class="list-group-item-action">
                                    <span class="sidebar-icon"><i class="la la-cogs"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.settings'); ?></span>
                                    <span class="arrow"><i class="la la-arrow-right"></i> </span>
                                </a>

                                <ul class="dropdown-menu" style="display: none;">
                                    <li><a class="sidebar-link" href="<?php echo e(route('general_settings')); ?>"><?php echo app('translator')->get('app.general_settings'); ?></a></li>
                                </ul>
                            </li>

                            <?php endif; ?>
                            <?php if($user->user_type != 'user'): ?>
                            <li class="<?php echo e(request()->is('dashboard/payments*')? 'active' : ''); ?>">
                                <a href="<?php echo e(route('payments')); ?>" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-money"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.payments'); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if($user->is_admin()): ?>

                            
                            <li class="<?php echo e(request()->is('dashboard/u/users*')? 'active' : ''); ?>">
                                <a href="<?php echo e(route('users')); ?>" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-users"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.users'); ?></span>
                                </a>
                            </li>

                            <?php endif; ?>
                            <?php if($user->user_type == 'admin'): ?>
                                <li class="<?php echo e(request()->is('dashboard/employer/profile') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('employer_profile')); ?>" class="list-group-item-action active">
                                        <span class="sidebar-icon"><i class="la la-user"></i> </span>
                                        <span class="title"><?php echo app('translator')->get('app.profile'); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>


                            <li class="<?php echo e(request()->is('dashboard/account*')? 'active' : ''); ?>">
                                <a href="<?php echo e(route('change_password')); ?>" class="list-group-item-action active">
                                    <span class="sidebar-icon"><i class="la la-lock"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.change_password'); ?></span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo e(route('logout')); ?>" class="list-group-item-action active"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="sidebar-icon"><i class="la la-sign-out"></i> </span>
                                    <span class="title"><?php echo app('translator')->get('app.logout'); ?></span>
                                </a>
                            </li>


                        </ul>
                    </div>

                </div>
                <div class="col-md-9 p-0">
                    <nav class="navbar navbar-expand-md navbar-laravel shadow-sm  scrollbar-dusty-grass thin square">
                        <div class="container-fluid">
                            
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                              
                                <span class="navbar-toggler-icon"></span>
                            </button>
            
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item"><a class="nav-link text-danger" href="<?php echo e(route('home')); ?>"><i class="la la-home"></i> <?php echo app('translator')->get('app.view_site'); ?></a> </li>
                                </ul>
            
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <?php if($user->user_type != 'user'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-danger text-white" href="<?php echo e(route('employer_orders')); ?>"><i class="la la-save"></i><?php echo e(__('app.post_new_job')); ?> </a>
                                    </li>
                                    <?php endif; ?>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <?php echo e(Auth::user()->name); ?>

                                            <span class="caret"></span>
                                        </a>
            
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="main-page pl-4 pr-4">
                        <div class="col-md-12 mt-4">
                            <?php echo $__env->yieldContent('top-content'); ?>
                        </div>
                        <div class="main-page-title mt-3 mb-3 d-flex">
                            <h3 class="flex-grow-1"><?php echo ! empty($title) ? $title : __('app.dashboard'); ?></h3>

                            <div class="action-btn-group"><?php echo $__env->yieldContent('title_action_btn_gorup'); ?></div>
                        </div>

                        <?php echo $__env->make('admin.flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="main-page-content p-4 mb-4 shadow rounded-lg">
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- Scripts -->
    <?php echo $__env->yieldContent('page-js'); ?>
    <script src="<?php echo e(asset('assets/js/admin.js')); ?>" defer></script>
    

</body>
</html>
<?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>