<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">

            <?php if($applications->count()): ?>
                <table class="table table-hover">

                    <tr>
                        <th><?php echo app('translator')->get('app.name'); ?></th>
                        <th><?php echo app('translator')->get('app.employer'); ?></th>
                        <th>#</th>
                    </tr>

                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <i class="la la-user"></i> <?php echo e($application->name); ?>

                                <p class="text-muted"><i class="la la-clock-o"></i> <?php echo e($application->created_at->format(get_option('date_format'))); ?> <?php echo e($application->created_at->format(get_option('time_format'))); ?></p>
                                <p class="text-muted"><i class="la la-envelope-o"></i> <?php echo e($application->email); ?></p>
                                <p class="text-muted"><i class="la la-phone-square"></i> <?php echo e($application->phone_number); ?></p>
                                <?php if($application->cv): ?>
                                    <p class="text-muted"><a href="<?php echo e(route('download_cv', ['file' => basename($application->cv)])); ?>">Download CV</a></p>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if( ! empty($application->job->job_title)): ?>
                                    <p>
                                        <a href="<?php echo e(route('job_view', $application->job->job_slug)); ?>" target="_blank"><?php echo e($application->job->job_title); ?></a>
                                    </p>
                                <?php endif; ?>

                                <?php if( ! empty($application->job->employer->company)): ?>
                                    <p><?php echo e($application->job->employer->company); ?></p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if( ! $application->is_shortlisted): ?>
                                    <a href="<?php echo e(route('make_short_list', $application->id)); ?>" class="btn btn-primary"><i class="la la-user-plus"></i> <?php echo app('translator')->get('app.shortlist'); ?> </a>
                                <?php else: ?>
                                    <?php echo app('translator')->get('app.shortlisted'); ?>
                                <?php endif; ?>
                            </td>

                        </tr>
                        <tr>
                            <?php if($application->message): ?>
                                <td colspan = "3"><?php echo e($application->message); ?></td>
                            <?php else: ?>
                                <?php echo app('translator')->get('app.no_message'); ?>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>


                <?php echo $applications->links(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="no data-wrap py-5 my-5 text-center">
                            <h1>
                                <?php echo e(request()->is('dashboard/employer/applicant') ? ' Awaiting applications' : ''); ?>

                                <?php echo e(request()->is('dashboard/employer/shortlisted') ? ' Awaiting Shortlist' : ''); ?>                               
                            </h1>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/admin/applicants.blade.php ENDPATH**/ ?>