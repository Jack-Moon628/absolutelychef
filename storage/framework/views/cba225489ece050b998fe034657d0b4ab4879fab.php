<?php $__env->startSection('content'); ?>

<div class="bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="jobs-filter-form-wrap bg-white p-4 mt-4 mb-4 shadow rounded">
                    <h4 class="mb-4"><?php echo app('translator')->get('app.filter_jobs'); ?></h4>

                    <form action="" method="get">

                        <div class="form-group">
                            <p class="text-muted mb-1"><?php echo app('translator')->get('app.keywords'); ?></p>
                            <input type="text" name="q" value="<?php echo e(request('q')); ?>" class="form-control" style="min-width: 300px;" placeholder="<?php echo app('translator')->get('app.job_title_placeholder'); ?>">
                        </div>

                        <div class="form-group">
                            <p class="text-muted mb-1"><?php echo app('translator')->get('app.exp_level'); ?></p>

                            <select class="form-control" name="exp_level" id="exp_level">
                                <option value="" ><?php echo app('translator')->get('app.select_exp_level'); ?></option>
                                <option value="mid" <?php echo e(request('exp_level') == 'mid' ? 'selected':''); ?>><?php echo app('translator')->get('app.mid'); ?></option>
                                <option value="entry" <?php echo e(request('exp_level') == 'entry' ? 'selected':''); ?>><?php echo app('translator')->get('app.entry'); ?></option>
                                <option value="senior" <?php echo e(request('exp_level') == 'senior' ? 'selected':''); ?>><?php echo app('translator')->get('app.senior'); ?></option>
                            </select>
                        </div>


                        <div class="form-group">
                            <p class="text-muted mb-1"><?php echo app('translator')->get('app.job_type'); ?></p>

                            <select class="form-control" name="job_type" id="job_type">
                                <option value=""><?php echo app('translator')->get('app.select_job_type'); ?></option>
                                <option value="full_time" <?php echo e(request('job_type') == 'full_time' ? 'selected':''); ?>><?php echo app('translator')->get('app.full_time'); ?></option>
                                <option value="internship" <?php echo e(request('job_type') == 'internship' ? 'selected':''); ?>><?php echo app('translator')->get('app.internship'); ?></option>
                                <option value="part_time" <?php echo e(request('job_type') == 'part_time' ? 'selected':''); ?>><?php echo app('translator')->get('app.part_time'); ?></option>
                                <option value="contract" <?php echo e(request('job_type') == 'contract' ? 'selected':''); ?>><?php echo app('translator')->get('app.contract'); ?></option>
                                <option value="temporary" <?php echo e(request('job_type') == 'temporary' ? 'selected':''); ?>><?php echo app('translator')->get('app.temporary'); ?></option>
                                <option value="commission" <?php echo e(request('job_type') == 'commission' ? 'selected':''); ?>><?php echo app('translator')->get('app.commission'); ?></option>
                                <option value="internship" <?php echo e(request('job_type') == 'internship' ? 'selected':''); ?>><?php echo app('translator')->get('app.internship'); ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <p class="text-muted mb-1"><?php echo app('translator')->get('app.category'); ?></p>

                            <select class="form-control" name="category" id="category">
                                <option value=""><?php echo app('translator')->get('app.select_category'); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(selected($category->id, request('category'))); ?> ><?php echo e($category->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <p class="text-muted mb-1"><?php echo app('translator')->get('app.country'); ?></p>

                            <select name="country" class="form-control <?php echo e(e_form_invalid_class('country', $errors)); ?> country_to_state">
                                <option value=""><?php echo app('translator')->get('app.select_a_country'); ?></option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo $country->id; ?>" <?php if(request('country') && $country->id == request('country')): ?> selected="selected" <?php endif; ?>  ><?php echo $country->country_name; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <p class="text-muted mb-1"><?php echo app('translator')->get('app.state'); ?></p>

                            <select name="state" class="form-control <?php echo e(e_form_invalid_class('state', $errors)); ?> state_options">
                                <option value="">Select a state</option>

                                <?php if($old_country): ?>
                                    <?php $__currentLoopData = $old_country->states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($state->id); ?>" <?php if(request('state') && $state->id == request('state')): ?> selected="selected" <?php endif; ?> ><?php echo $state->state_name; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <p class="text-muted mb-1"><?php echo app('translator')->get('app.location'); ?></p>
                            <input type="text" name="location" value="<?php echo e(request('location')); ?>" class="form-control" style="min-width: 300px;"  placeholder="<?php echo app('translator')->get('app.job_location_placeholder'); ?>">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="la la-search"></i> <?php echo app('translator')->get('app.filter_jobs'); ?></button>
                            <a href="<?php echo e(route('jobs_listing')); ?>" class="btn btn-info text-white"><i class="la la-eraser"></i> <?php echo app('translator')->get('app.clear_filter'); ?></a>
                        </div>
                    </form>

                </div>

            </div>

            <div class="col-md-8">

                <div class="employer-job-listing mt-4">

                    <?php if($jobs->count()): ?>

                        <div class="job-search-stats bg-white mb-3 p-4 shadow-sm rounded">
                            <?php echo sprintf(__('app.job_search_stats'), '<strong>', $jobs->total(), '</strong>'); ?>

                        </div>

                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="employer-job-listing-single <?php echo e($job->is_premium? ' premium-job ' : ''); ?>  bordered shadow-sm rounded-lg mb-3 ">

                                <?php if($job->is_premium): ?>
                                    <div class="job-listing-company-logo">
                                        <a  href="<?php echo e(route('job_view', $job->job_slug)); ?>">
                                            <img src="<?php echo e($job->employer->logo_url); ?>" class="img-fluid" />
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="listing-job-info">
                                    <div class="p-2">
                                        <h5 class="font-weight-bold h3">
                                            <a class="text-dark" href="<?php echo e(route('job_view', $job->job_slug)); ?>"><?php echo $job->job_title; ?></a>  
                                        </h5>
                                        <div class="h5 text-primary m-0">
                                            <p class="m-0">
                                                <?php echo e($job->employer->company); ?>

                                                <i class="la la-map-marker"></i>
                                                <?php echo e($job->city_name  .', '. $job->state_name . ', ' .   $job->country_name); ?>

                                            </p>       
                                        </div>
                                        <p class="m-0">
                                            <?php if($job->is_premium): ?>
                                            <i class="la la-money"></i> <?php echo get_amount($job->salary, $job->salary_currency); ?> <?php if($job->salary_upto): ?> - <?php echo get_amount($job->salary_upto, $job->salary_currency); ?> <?php endif; ?> / <?php echo app('translator')->get('app.'.$job->salary_cycle); ?>,
                                            <i class="la la-th-list"></i> <?php echo app('translator')->get('app.exp_level'); ?> : <?php echo app('translator')->get('app.'.$job->exp_level); ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>    
                                    <hr class="m-0">
                                    <div class="p-2">
                                        <p class="text-muted mb-1 mt-1">

                                            <i class="la la-clock-o"></i> <?php echo app('translator')->get('app.posted'); ?> <?php echo e($job->created_at->diffForHumans()); ?>

    
                                            <i class="la la-calendar-times-o"></i> <?php echo app('translator')->get('app.deadline'); ?> : <?php echo e($job->deadline->format(get_option('date_format'))); ?> 

                                        </p>
                                        
                                        <p class=" mb-1">
                                            <?php echo e(limit_words($job->description)); ?>

                                        </p>
                                    </div>
                                    
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    <?php else: ?>


                        <div class="no-search-results-wrap text-center">

                            <p class="p-4">
                                <img src="<?php echo e(asset('assets/images/no-search.png')); ?>" />
                            </p>

                            <h3>Whoops, no Matches</h3>
                            <h5 class="text-muted">We couldn't find any search results. </h5>
                            <h5 class="text-muted">Give it another try</h5>

                        </div>

                    <?php endif; ?>

                    <?php echo $jobs->links(); ?>


                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/jobs.blade.php ENDPATH**/ ?>