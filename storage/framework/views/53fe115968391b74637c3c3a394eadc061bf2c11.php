<?php $__env->startSection('top-content'); ?>
<div class="row">
    <div class="col-md-3">
        <div class="p-3 mb-3 text-white bg-primary shadow-sm rounded-lg">
            <h4>Total Jobs</h4>
            <h5><?php echo e(auth()->user()->totalJobs()); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-3 mb-3 bg-success text-white shadow-sm rounded-lg">
            <h4>Active Jobs</h4>
            <h5><?php echo e(auth()->user()->activeJobs()); ?></h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-3 mb-3 bg-danger text-white shadow-sm rounded-lg">
            <h4>Expired Jobs</h4>
            <h5><?php echo e(auth()->user()->expiredJobs()); ?></h5>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
           <?php if(session()->has('message')): ?>
            <div class="alert alert-warning" role="alert">
                    <?php echo e(session()->get('message')); ?>

                </div>                
           <?php endif; ?>
            
        </div>
        <div class="col-md-12">
            <?php if($orders->count()): ?>
                <table class="table table-hover text-center">

                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Payment Status</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Job Quantity</th>  
                        <th>Job Posted</th>
                        <th>Promotion Code</th>
                        <th>Date</th>
                        <th>Actions</th>
                        
                    </tr>

                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="<?php echo e(!$pack->hasJobToPost() ? 'bg-danger text-light' : ''); ?>">
                            <td><?php echo e($pack->id); ?></td>
                            <td><?php echo e($pack->hasJobToPost() ? "open" : "closed"); ?></td>
                            <td><?php echo e($pack->payment->transactionDetail()->status); ?></td>
                            <td><?php echo get_amount($pack->amount); ?></td>
                            <td><?php echo e($pack->package_type == 0 ? 'Enterprise' : 'Professional'); ?></td>
                            <td><?php echo e($pack->job_qty); ?></td>
                            <td><?php echo e($pack->job_posted ? $pack->job_posted : 0); ?></td> 
                            <td><?php echo e($pack->promotion_code); ?></td>
                            <td><?php echo e($pack->created_at); ?></td>
                        <td> 
                                <?php if($pack->hasJobToPost()): ?>
                                <a href="<?php echo e(route('post_new_job', ['type' => $pack->package_type,'order' => $pack->id ])); ?>" class="btn btn-primary btn-sm" title="Post a jobpost a job using with this package">
                                    Post a Job
                                </a>
                                <?php else: ?>
                                full capacity
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <?php if(!$job_remained): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="no data-wrap py-5 my-5 text-center">
                                <h1>Account balance used, please purchase more listings</h1>
                                <a href="<?php echo e(route('advertise')); ?>" class="btn btn-outline-primary">Purchase a Package</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="no data-wrap py-5 my-5 text-center">
                            <h1>You don’t have any packages</h1>
                            <a href="<?php echo e(route('advertise')); ?>" class="btn btn-outline-primary">Purchase a Package</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef_1.14.3\absolutelychef\resources\views/admin/orders.blade.php ENDPATH**/ ?>