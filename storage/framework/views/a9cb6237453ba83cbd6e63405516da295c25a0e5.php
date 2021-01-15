<?php $__env->startSection('content'); ?>
    <div class="new-registration-page py-5 bg-light">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="register-account-box rounded shadow p-3 bg-white">
                        <h2><?php echo app('translator')->get('app.job_seeker'); ?></h2>
                        <p class="icon"><i class="la la-user"></i> </p>
                        <p><?php echo app('translator')->get('app.job_seeker_new_desc'); ?></p>
                        <a href="<?php echo e(route('register_job_seeker')); ?>" class="btn btn-danger"><i class="la la-user-plus"></i> <?php echo app('translator')->get('app.register_account'); ?> </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="register-account-box rounded shadow  p-3 bg-white">
                        <h2><?php echo app('translator')->get('app.employer'); ?></h2>
                        <p class="icon"><i class="la la-black-tie"></i> </p>
                        <p><?php echo app('translator')->get('app.employer_new_desc'); ?></p>
                        <a href="<?php echo e(route('register_employer')); ?>" class="btn btn-danger"><i class="la la-user-plus"></i> <?php echo app('translator')->get('app.register_account'); ?> </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="register-account-box rounded shadow  p-3 bg-white">
                        <h2><?php echo app('translator')->get('app.agency'); ?></h2>
                        <p class="icon">
                            <i class="la la-users"></i>
                         </p>
                        <p><?php echo app('translator')->get('app.agency_new_desc'); ?></p>
                        <a href="<?php echo e(route('register_agent')); ?>" class="btn btn-danger"><i class="la la-user-plus"></i> <?php echo app('translator')->get('app.register_account'); ?> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/new_register.blade.php ENDPATH**/ ?>