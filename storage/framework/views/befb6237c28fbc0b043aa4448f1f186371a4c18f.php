<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-hover">

                <tr>
                    <th><?php echo app('translator')->get('app.name'); ?></th>
                    <th><?php echo app('translator')->get('app.employer'); ?></th>
                </tr>

                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <i class="la la-user"></i> <?php echo e($application->name); ?>

                            <p class="text-muted"><i class="la la-clock-o"></i> <?php echo e($application->created_at->format(get_option('date_format'))); ?> <?php echo e($application->created_at->format(get_option('time_format'))); ?></p>
                            <p class="text-muted"><i class="la la-envelope-o"></i> <?php echo e($application->email); ?></p>
                            <p class="text-muted"><i class="la la-phone-square"></i> <?php echo e($application->phone_number); ?></p>
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

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>


            <?php echo $applications->links(); ?>


        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/admin/applied_jobs.blade.php ENDPATH**/ ?>