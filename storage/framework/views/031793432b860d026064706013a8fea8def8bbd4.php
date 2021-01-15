<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">

            <?php if($jobs->count()): ?>
                <table class="table table-hover">

                    <tr>
                        <th><?php echo app('translator')->get('app.job_title'); ?></th>
                        <th><?php echo app('translator')->get('app.status'); ?></th>
                        <th><?php echo app('translator')->get('app.employer'); ?></th>
                        <th>#</th>
                    </tr>

                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($job->job_title); ?>

                                <p class="text-muted"><?php echo app('translator')->get('app.deadline'); ?> <?php echo e($job->deadline->format(get_option('date_format'))); ?> </p>
                                <p class="text-muted"> <a href="<?php echo e(route('job_applicants', $job->id)); ?>"><?php echo app('translator')->get('app.applicant'); ?> (<?php echo e($job->application->count()); ?>) </a>  </p>

                            </td>
                            <td>
                                <?php echo $job->status_context(); ?>

                                <?php if($job->is_premium): ?>
                                    <p class="alert alert-success" data-toggle="tooltip" title="<?php echo app('translator')->get('app.premium'); ?>"><i class="la la-bookmark-o"></i><?php echo app('translator')->get('app.premium'); ?></p>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($job->employer->company); ?></td>
                            <td>
                                <a href="<?php echo e(route('job_view', $job->job_slug)); ?>" class="btn btn-primary btn-sm" target="_blank" data-toggle="tooltip" title="<?php echo app('translator')->get('app.view'); ?>"><i class="la la-eye"></i> </a>
                                <a href="<?php echo e(route('edit_job', $job->id)); ?>" class="btn btn-secondary btn-sm"><i class="la la-edit" data-toggle="tooltip" title="<?php echo app('translator')->get('app.edit'); ?>"></i> </a>

                                <?php if(!$job->is_premium): ?>
                                    <a href="<?php echo e(route('job_status_change', [$job->id, 'premium'])); ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="<?php echo app('translator')->get('app.mark_premium'); ?>"><i class="la la-bookmark-o"></i> </a>
                                <?php endif; ?>

                                <?php if(auth()->user()->is_admin()): ?>
                                    <?php if($job->status != 1): ?>
                                        <a href="<?php echo e(route('job_status_change', [$job->id, 'approve'])); ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="<?php echo app('translator')->get('app.approve'); ?>"><i class="la la-check-circle-o"></i> </a>
                                    <?php endif; ?>

                                    <?php if($job->status != 2): ?>
                                        <a href="<?php echo e(route('job_status_change', [$job->id, 'block'])); ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="<?php echo app('translator')->get('app.block'); ?>"><i class="la la-ban"></i> </a>
                                    <?php endif; ?>

                                    <a href="<?php echo e(route('job_status_change', [$job->id, 'delete'])); ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" title="<?php echo app('translator')->get('app.delete'); ?>"><i class="la la-trash-o"></i> </a>
                                <?php endif; ?>


                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <?php echo $jobs->links(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="no data-wrap py-5 my-5 text-center">
                            <h1 class="display-1"><i class="la la-frown-o"></i> </h1>
                            <h1>No Data available here</h1>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/admin/jobs.blade.php ENDPATH**/ ?>