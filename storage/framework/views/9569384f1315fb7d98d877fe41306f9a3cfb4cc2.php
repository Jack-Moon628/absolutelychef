    
<?php $__env->startSection('content'); ?>

    <?php if(auth()->user()->is_admin()): ?>
        <div class="row">
            <div class="col-md-3">
                <div class="p-3 mb-3 bg-success  text-white shadow-sm rounded-lg">
                    <h4>Users</h4>
                    <h5><?php echo e($usersCount); ?></h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 bg-warning  text-black shadow-sm rounded-lg">
                    <h4>Payments</h4>
                    <h5><?php echo get_amount($totalPayments); ?></h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 bg-light   shadow-sm rounded-lg">
                    <h4>Active Jobs</h4>
                    <h5><?php echo e($activeJobs); ?></h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3  bg-danger  text-white shadow-sm rounded-lg">
                    <h4>Total Jobs</h4>
                    <h5><?php echo e($totalJobs); ?></h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3  bg-dark  text-white shadow-sm rounded-lg">
                    <h4>Employer</h4>
                    <h5><?php echo e($employerCount); ?></h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3  bg-info  text-white shadow-sm rounded-lg">
                    <h4>Agent</h4>
                    <h5><?php echo e($agentCount); ?></h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 bg-primary  text-white shadow-sm rounded-lg">
                    <h4>Applied</h4>
                    <h5><?php echo e($totalApplicants); ?></h5>
                </div>
            </div>
        </div>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>