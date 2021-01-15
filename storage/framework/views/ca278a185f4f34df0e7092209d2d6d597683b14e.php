<?php $__env->startSection('content'); ?>

    <?php
        $employer = $job->employer;
    ?>
    <div class="bg-light">
        <div class="job-view-lead-head bg-dark py-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="la la-home"></i> <?php echo app('translator')->get('app.home'); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $job->job_title; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 text-white-50">
                        <h1 class="text-danger"><?php echo $job->job_title; ?></h1>
                        <p >
                            <i class="la la-briefcase"></i> <?php echo app('translator')->get('app.'.$job->job_type); ?>

                            <i class="la la-map-marker"></i>
                            <?php if($job->city_name): ?>
                                <?php echo $job->city_name; ?>,
                            <?php endif; ?>
                            <?php if($job->state_name): ?>
                                <?php echo $job->state_name; ?>,
                            <?php endif; ?>
                            <?php if($job->country_name): ?>
                                <?php echo $job->country_name; ?>

                            <?php endif; ?>

                            <i class="la la-clock-o"></i> <?php echo app('translator')->get('app.posted'); ?> <?php echo e($job->created_at->diffForHumans()); ?>

                        </p>

                        <p>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#applyJobModal" ><i class="la la-calendar-plus-o"></i> <?php echo app('translator')->get('app.apply_online'); ?> </button>

                            <?php if($job->employer->followable): ?>
                                <?php if(auth()->check() && auth()->user()->isEmployerFollowed($job->employer->id)): ?>
                                    <button type="button" class="btn btn-danger employer-follow-button" data-employer-id="<?php echo e($job->employer->id); ?>"><i class="la la-minus-circle"></i> <?php echo app('translator')->get('app.unfollow'); ?> <?php echo e($employer->company); ?> </button>
                                <?php else: ?>
                                    <button type="button" class="btn btn-outline-primary employer-follow-button" data-employer-id="<?php echo e($job->employer->id); ?>"><i class="la la-plus-circle"></i> <?php echo app('translator')->get('app.follow'); ?> <?php echo e($employer->company); ?> </button>
                                <?php endif; ?>
                            <?php endif; ?>

                        </p>

                    </div>


                    <div class="col-md-4">
                        <div class="job-view-lead-position-box">
                            <p class="text-white-50"><strong><?php echo app('translator')->get('app.about_position'); ?></strong></p>
                            <h5><?php echo e($job->position); ?> <span class="text-white-50 text-small">(<?php echo app('translator')->get('app.'.$job->job_type); ?>)</span></h5>
                            <p class="m-0">
                                <i class="la la-money"></i> <?php echo get_amount($job->salary, $job->salary_currency); ?> <?php if($job->salary_upto): ?> - <?php echo get_amount($job->salary_upto, $job->salary_currency); ?> <?php endif; ?> / <?php echo app('translator')->get('app.'.$job->salary_cycle); ?>
                            </p>
                            <p class="m-0">
                                <i class="la la-map-marker"></i>
                                <?php if($job->city_name): ?>
                                    <?php echo $job->city_name; ?>,
                                <?php endif; ?>
                                <?php if($job->state_name): ?>
                                    <?php echo $job->state_name; ?>,
                                <?php endif; ?>
                                <?php if($job->country_name): ?>
                                    <?php echo $job->country_name; ?>

                                <?php endif; ?>

                                <?php if($job->is_any_where): ?>
                                    (<?php echo app('translator')->get('app.anywhere'); ?>)
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <?php echo $__env->make('admin.flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <?php if(! $job->is_active() && $job->can_edit()): ?>
                        <div class="alert alert-warning">
                            <i class="la la-warning"></i> You are currently viewing this job in private mode. Public will not be able to see this until publish.
                        </div>
                    <?php endif; ?>


                    <div class="job-view-container shadow rounded bg-white p-4 mb-4 ">

                        <h4 class="text-danger"><?php echo $job->job_title; ?></h4>
                        <hr class="m-0">
                        <p class="text-muted">
                            <i class="la la-briefcase"></i> <?php echo app('translator')->get('app.'.$job->job_type); ?>

                            <i class="la la-map-marker"></i>
                            <?php if($job->city_name): ?>
                                <?php echo $job->city_name; ?>,
                            <?php endif; ?>
                            <?php if($job->state_name): ?>
                                <?php echo $job->state_name; ?>,
                            <?php endif; ?>
                            <?php if($job->country_name): ?>
                                <?php echo $job->country_name; ?>

                            <?php endif; ?>

                            <i class="la la-clock-o"></i> <?php echo app('translator')->get('app.posted'); ?> <?php echo e($job->created_at->diffForHumans()); ?>

                        </p>

                        <?php if($job->skills): ?>
                            <div class="job-view-single-section my-4">
                                <h5 class="mb-4"><?php echo app('translator')->get('app.skills'); ?></h5>
                                <?php
                                    $skills = explode(',', $job->skills);
                                ?>

                                <?php if(is_array($skills) && count($skills)): ?>
                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="single-skill"><i class="la la-lightbulb-o"></i> <?php echo e($skill); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if($job->description): ?>
                            <div class="job-view-single-section my-4">
                                <h5 class="mb-4"><?php echo app('translator')->get('app.description'); ?></h5>
                                <p>
                                    <?php echo nl2br($job->description); ?>

                                </p>
                            </div>
                        <?php endif; ?>

                        <?php if($job->responsibilities): ?>
                            <div class="job-view-single-section my-4">
                                <h5 class="mb-4"><?php echo app('translator')->get('app.responsibilities'); ?></h5>
                                <?php echo $job->nl2ulformat($job->responsibilities); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($job->educational_requirements): ?>
                            <div class="job-view-single-section my-4">
                                <h5 class="mb-4"><?php echo app('translator')->get('app.educational_requirements'); ?></h5>
                                <?php echo $job->nl2ulformat($job->educational_requirements); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($job->experience_requirements): ?>
                            <div class="job-view-single-section my-4">
                                <h5 class="mb-4"><?php echo app('translator')->get('app.experience_requirements'); ?></h5>
                                <?php echo $job->nl2ulformat($job->experience_requirements); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($job->additional_requirements): ?>
                            <div class="job-view-single-section my-4">
                                <h5 class="mb-4"><?php echo app('translator')->get('app.additional_requirements'); ?></h5>
                                <?php echo $job->nl2ulformat($job->additional_requirements); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($job->benefits): ?>
                            <div class="job-view-single-section my-4">
                                <h5 class="mb-4"><?php echo app('translator')->get('app.benefits'); ?></h5>
                                <?php echo $job->nl2ulformat($job->benefits); ?>

                            </div>
                        <?php endif; ?>


                        <?php if($job->apply_instruction): ?>

                            <div class="alert bg-light mt-4 mb-4">
                                <h5><?php echo app('translator')->get('app.apply_instruction'); ?></h5>
                                <?php echo nl2br($job->apply_instruction); ?>


                            </div>


                        <?php endif; ?>



                        <div class="terms-msg mt-5 mb-3">
                            <p class="text-small text-muted font-italic">By applying to a job using <?php echo e(get_option('site_name')); ?> you are agreeing to comply with and be subject to the <?php echo e(get_option('site_name')); ?>  <a href="">Terms and Conditions</a> for use of our website. To use our website, you must agree with the <a href="">Terms and Conditions</a> and both meet and comply with their provisions.
                            </p>
                        </div>


                    </div>

                </div>

                <div class="col-md-4">

                    <?php if($job->is_premium): ?>
                        <div class="widget-box bg-white p-3 mb-3 shadow rounded">
                            <div class="premium-badge-wrap float-left">
                                <img src="<?php echo e(asset('assets/images/premium.png')); ?>" />
                            </div>

                            <h5 class="text-primary"><?php echo app('translator')->get('app.premium_job'); ?></h5>
                            <p class="m-0 text-white-50">From <?php echo e($employer->company); ?></p>

                            <div class="clearfix"></div>
                        </div>
                    <?php endif; ?>

                    <div class="widget-box bg-white p-3 mb-3 shadow rounded">
                        <h5><?php echo app('translator')->get('app.job_summery'); ?></h5>

                        <?php if($job->vacancy): ?>
                            <p> <i class="la la-user"></i> <?php echo app('translator')->get('app.vacancy'); ?> : <?php echo e($job->vacancy); ?> </p>
                        <?php endif; ?>

                        <p>
                            <i class="la la-money"></i> <?php echo get_amount($job->salary, $job->salary_currency); ?> <?php if($job->salary_upto): ?> - <?php echo get_amount($job->salary_upto, $job->salary_currency); ?> <?php endif; ?> / <?php echo app('translator')->get('app.'.$job->salary_cycle); ?>
                        </p>

                        <p>
                            <i class="la la-briefcase"></i> <?php echo app('translator')->get('app.'.$job->job_type); ?>
                        </p>

                        <p>
                            <i class="la la-map-marker"></i>
                            <?php if($job->city_name): ?>
                                <?php echo $job->city_name; ?>,
                            <?php endif; ?>
                            <?php if($job->state_name): ?>
                                <?php echo $job->state_name; ?>,
                            <?php endif; ?>
                            <?php if($job->country_name): ?>
                                <?php echo $job->country_name; ?>

                            <?php endif; ?>

                            <?php if($job->is_any_where): ?>
                                (<?php echo app('translator')->get('app.anywhere'); ?>)
                            <?php endif; ?>
                        </p>

                        <p> <i class="la la-th-list"></i> <?php echo app('translator')->get('app.exp_level'); ?> : <?php echo app('translator')->get('app.'.$job->exp_level); ?></p>

                        <?php if($job->experience_required_years): ?>
                            <p>
                                <i class="la la-circle-thin"></i> <?php echo app('translator')->get('app.experience_required'); ?> : <?php echo e($job->experience_required_years); ?><?php if($job->experience_plus): ?>+<?php endif; ?> <?php echo app('translator')->get('app.years'); ?>
                            </p>
                        <?php endif; ?>

                        <p>
                            <?php if($job->gender == 'any'): ?>
                                <i class="la la-arrow-circle-o-right"></i>

                                <?php echo app('translator')->get('app.gender'); ?> :

                                <i class="la la-male"></i>
                                <i class="la la-female"></i>
                                <i class="la la-transgender"></i>
                                <span class="text-white-50">(<?php echo app('translator')->get('app.'.$job->gender); ?>)</span>
                            <?php else: ?>
                                <i class="la la-<?php echo e($job->gender); ?>"></i> <?php echo app('translator')->get('app.only'); ?> <?php echo app('translator')->get('app.'.$job->gender); ?>
                            <?php endif; ?>
                        </p>


                        <p>
                            <i class="la la-clock-o"></i> <?php echo app('translator')->get('app.posted'); ?> : <?php echo e($job->created_at->diffForHumans()); ?>

                        </p>

                        <p>
                            <i class="la la-calendar-times-o"></i> <?php echo app('translator')->get('app.deadline'); ?> : <?php echo e($job->deadline->format(get_option('date_format'))); ?> <span class="text-small text-white-50"><?php echo e($job->deadline->diffForHumans()); ?></span>
                        </p>

                        <p><i class="la la-tag"></i> <?php echo app('translator')->get('app.job_id'); ?> : <?php echo e($job->job_id); ?></p>

                        <p>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#applyJobModal"><i class="la la-calendar-plus-o"></i> <?php echo app('translator')->get('app.apply_online'); ?> </button>
                        </p>

                    </div>


                    <div class="widget-box bg-white p-3 mb-3 shadow rounded">

                        <div class="job-view-company-logo mb-3">
                            <img src="<?php echo e($employer->logo_url); ?>" class="img-fluid" />
                        </div>

                        <h5><?php echo e($employer->company); ?></h5>

                        <p class="text-white-50">
                            <i class="la la-map-marker"></i>

                            <?php if($employer->address): ?>
                                <?php echo $employer->address; ?>

                                <?php if($employer->address_2): ?>
                                    , <?php echo $employer->address_2; ?>

                                <?php endif; ?>
                            <?php else: ?>
                                <?php if($employer->city): ?>
                                    <?php echo $employer->city; ?>,
                                <?php endif; ?>
                                <?php if($employer->state_name): ?>
                                    <?php echo $employer->state_name; ?>,
                                <?php endif; ?>
                                <?php if($employer->state_name): ?>
                                    <?php echo $employer->country_name; ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        </p>

                        <?php if($employer->company_size): ?>
                            <p><i class="la la-building"></i> <?php echo e(company_size($employer->company_size)); ?> <?php echo app('translator')->get('app.employees'); ?> </p>
                        <?php endif; ?>

                        <?php if($employer->phone): ?>
                            <p><i class="la la-phone"></i> <?php echo e($employer->phone); ?> </p>
                        <?php endif; ?>

                        <?php if($employer->about_company): ?>
                            <p><?php echo e($employer->about_company); ?></p>
                        <?php endif; ?>

                        <?php if($employer->website): ?>
                            <p><a href="<?php echo e($employer->website); ?>"><i class="la la-globe"></i> <?php echo e($employer->website); ?></a></p>
                        <?php endif; ?>

                        <p>
                            <?php if($job->employer->followable): ?>
                                <?php if(auth()->check() && auth()->user()->isEmployerFollowed($job->employer->id)): ?>
                                    <button type="button" class="btn btn-danger employer-follow-button" data-employer-id="<?php echo e($job->employer->id); ?>"><i class="la la-minus-circle"></i> <?php echo app('translator')->get('app.unfollow'); ?> <?php echo e($employer->company); ?> </button>
                                <?php else: ?>
                                    <button type="button" class="btn btn-danger employer-follow-button" data-employer-id="<?php echo e($job->employer->id); ?>"><i class="la la-plus-circle"></i> <?php echo app('translator')->get('app.follow'); ?> <?php echo e($employer->company); ?> </button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </p>

                    </div>


                    <div class="widget-box bg-white p-3 shadow rounded">

                        <div class="additional-job-action-box">

                            <p><a href="javascript:;" data-toggle="modal" data-target="#shareByEMail"><i class="la la-envelope"></i> <?php echo app('translator')->get('app.share_by_email'); ?> </a> </p>
                            <?php if($job->employer && $job->employer->company_slug): ?>
                            <p><a href="<?php echo e(route('jobs_by_employer', $job->employer->company_slug)); ?>"><i class="la la-list-ul"></i> <?php echo app('translator')->get('app.check_all_job_employer'); ?> </a> </p>
                            <?php endif; ?>
                            <p><a href="javascript:;" data-toggle="modal" data-target="#jobFlagModal"><i class="la la-flag" ></i> <?php echo app('translator')->get('app.flag_this_job'); ?> </a> </p>

                        </div>
                    </div>

                    <div class="widget-box bg-white p-3 mb-3 shadow rounded">
                        <div class="modern-social-share-wrap">
                            <a href="#" class="btn btn-primary share s_facebook"><i class="la la-facebook"></i> </a>
                            <a href="#" class="btn btn-danger share s_plus"><i class="la la-google-plus"></i> </a>
                            <a href="#" class="btn btn-info share s_twitter"><i class="la la-twitter"></i> </a>
                            <a href="#" class="btn btn-primary share s_linkedin"><i class="la la-linkedin"></i> </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <!-- apply job modala -->
        <div class="modal fade" id="applyJobModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <form action="<?php echo e(route('apply_job')); ?>" method="post" id="applyJob" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>


                        <div class="modal-header">
                            <h5 class="modal-title" ><?php echo app('translator')->get('app.online_job_application_form'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <?php if(session('error')): ?>
                                <div class="alert alert-warning"><?php echo e(session('error')); ?></div>
                            <?php endif; ?>

                            <div class="form-group <?php echo e($errors->has('name')? 'has-error':''); ?>">
                                <label for="name" class="control-label"><?php echo app('translator')->get('app.name'); ?>:</label>
                                <input type="text" class="form-control <?php echo e(e_form_invalid_class('name', $errors)); ?>" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo app('translator')->get('app.your_name'); ?>">
                                <?php echo e_form_error('name', $errors); ?>

                            </div>

                            <div class="form-group <?php echo e($errors->has('email')? 'has-error':''); ?>">
                                <label for="email" class="control-label"><?php echo app('translator')->get('app.email'); ?>:</label>
                                <input type="text" class="form-control <?php echo e(e_form_invalid_class('email', $errors)); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('app.email_ie'); ?>">
                                <?php echo e_form_error('email', $errors); ?>

                            </div>

                            <div class="form-group <?php echo e($errors->has('phone_number')? 'has-error':''); ?>">
                                <label for="phone_number" class="control-label"><?php echo app('translator')->get('app.phone_number'); ?>:</label>
                                <input type="text" class="form-control <?php echo e(e_form_invalid_class('phone_number', $errors)); ?>" id="phone_number" name="phone_number" value="<?php echo e(old('phone_number')); ?>" placeholder="<?php echo app('translator')->get('app.phone_number'); ?>">
                                <?php echo e_form_error('phone_number', $errors); ?>

                            </div>

                            <div class="form-group <?php echo e($errors->has('message')? 'has-error':''); ?>">
                                <label for="message-text" class="control-label"><?php echo app('translator')->get('app.message'); ?>:</label>
                                <textarea class="form-control <?php echo e(e_form_invalid_class('message', $errors)); ?>" id="message" name="message" placeholder="<?php echo app('translator')->get('app.your_message'); ?>"><?php echo e(old('message')); ?></textarea>
                                <?php echo e_form_error('message', $errors); ?>

                            </div>

                            <div class="form-group <?php echo e($errors->has('resume')? 'has-error':''); ?>">
                                <label for="resume" class="control-label"><?php echo app('translator')->get('app.cv'); ?>:</label>
                                <input type="file" class="form-control <?php echo e(e_form_invalid_class('resume', $errors)); ?>" id="resume" name="resume">
                                <p class="text-white-50"><?php echo app('translator')->get('app.resume_file_types'); ?></p>
                                <?php echo e_form_error('resume', $errors); ?>

                            </div>

                            <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>" />

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('app.close'); ?></button>
                            <button type="submit" class="btn btn-primary" id="report_ad"><?php echo app('translator')->get('app.apply_online'); ?></button>
                        </div>


                    </form>
                </div>

            </div>
        </div>



        <div class="modal fade" id="jobFlagModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo e(route('flag_job_post', $job->id)); ?>" method="post">

                        <div class="modal-header">
                            <h5 class="modal-title" ><?php echo app('translator')->get('app.flag_this_job'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.reason'); ?>:</label>
                                <select class="form-control  <?php echo e(e_form_invalid_class('reason', $errors)); ?>" name="reason">
                                    <option value=""><?php echo app('translator')->get('app.select_a_reason'); ?></option>
                                    <option value="applying_problem"><?php echo app('translator')->get('app.applying_problem'); ?></option>
                                    <option value="fraud"><?php echo app('translator')->get('app.fraud'); ?></option>
                                    <option value="duplicate"><?php echo app('translator')->get('app.duplicate'); ?></option>
                                    <option value="spam"><?php echo app('translator')->get('app.spam'); ?></option>
                                    <option value="wrong_category"><?php echo app('translator')->get('app.wrong_category'); ?></option>
                                    <option value="offensive"><?php echo app('translator')->get('app.offensive'); ?></option>
                                    <option value="other"><?php echo app('translator')->get('app.other'); ?></option>
                                </select>
                                <?php echo e_form_error('reason', $errors); ?>

                            </div>

                            <div class="form-group">
                                <label for="email" class="control-label"><?php echo app('translator')->get('app.email'); ?>:</label>
                                <input type="text" class="form-control  <?php echo e(e_form_invalid_class('email', $errors)); ?>" name="email">
                                <?php echo e_form_error('email', $errors); ?>

                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label"><?php echo app('translator')->get('app.message'); ?>:</label>
                                <textarea class="form-control  <?php echo e(e_form_invalid_class('message', $errors)); ?>" name="message"></textarea>
                                <?php echo e_form_error('message', $errors); ?>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('app.close'); ?></button>
                            <button type="submit" class="btn btn-danger"><i class="la la-flag-o"></i> <?php echo app('translator')->get('app.flag_this_job'); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="modal fade" id="shareByEMail" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" ><?php echo app('translator')->get('app.share_by_email'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="<?php echo e(route('share_by_email')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.receiver_name'); ?>:</label>
                                <input type="text" class="form-control <?php echo e(e_form_invalid_class('receiver_name', $errors)); ?>" name="receiver_name">
                                <?php echo e_form_error('receiver_name', $errors); ?>

                            </div>

                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.receiver_email'); ?>:</label>
                                <input type="text" class="form-control <?php echo e(e_form_invalid_class('receiver_email', $errors)); ?>" name="receiver_email">
                                <?php echo e_form_error('receiver_email', $errors); ?>

                            </div>

                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.your_name'); ?>:</label>
                                <input type="text" class="form-control <?php echo e(e_form_invalid_class('your_name', $errors)); ?>" name="your_name">
                                <?php echo e_form_error('your_name', $errors); ?>

                            </div>

                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.your_email'); ?>:</label>
                                <input type="text" class="form-control <?php echo e(e_form_invalid_class('your_email', $errors)); ?>" name="your_email">
                                <?php echo e_form_error('your_email', $errors); ?>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>" />
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('app.close'); ?></button>
                            <button type="submit" class="btn btn-primary" id="reply_by_email_btn"><?php echo app('translator')->get('app.send_email'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>




<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js'); ?>
    <script src="<?php echo e(asset('assets/plugins/SocialShare/SocialShare.js')); ?>" defer></script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            (function($) {
                $('.share').ShareLink({
                    title: '<?php echo e($job->job_title); ?>', // title for share message
                    text: '<?php echo e(substr(trim(preg_replace('/\s\s+/', ' ',strip_tags($job->description) )),0,160)); ?>', // text for share message
                    url: '<?php echo e(route('job_view', $job->job_slug)); ?>', // link on shared page
                    class_prefix: 's_', // optional class prefix for share elements (buttons or links or everything), default: 's_'
                    width: 640, // optional popup initial width
                    height: 480 // optional popup initial height
                })

            })(jQuery);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/job-view.blade.php ENDPATH**/ ?>