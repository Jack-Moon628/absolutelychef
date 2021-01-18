<?php $__env->startSection('content'); ?>

    <div class="row mb-4">
        <div class="col-md-5">
            <?php echo app('translator')->get('app.total'); ?> : <?php echo e($payments->total()); ?>

        </div>

        <div class="col-md-7">
            <form class="form-inline" method="get" action="">
                <div class="form-group">
                    <input type="text" name="q" value="<?php echo e(request('q')); ?>" class="form-control" placeholder="<?php echo app('translator')->get('app.payer_email'); ?>">
                </div>
                <button type="submit" class="btn btn-secondary"><?php echo app('translator')->get('app.search'); ?></button>
            </form>

        </div>
    </div>


    <div class="row">
        <div class="col-md-12">

            <?php if($payments->count() > 0): ?>
                <table class="table table-hover">

                    <tr>
                        <th><?php echo app('translator')->get('app.name'); ?></th>
                        <th><?php echo app('translator')->get('app.amount'); ?></th>
                        <th><?php echo app('translator')->get('app.method'); ?></th>
                        <th><?php echo app('translator')->get('app.time'); ?></th>
                        <th>#</th>
                    </tr>

                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('payment_view', $payment->id)); ?>">
                                    <i class="la la-user"></i> <?php echo e($payment->user->name); ?> <br />
                                    <i class="la la-building-o"></i> <?php echo e($payment->user->company); ?>

                                </a>
                            </td>
                            <td><?php echo get_amount($payment->amount); ?></td>
                            <td><?php echo e($payment->transactionDetail()->payment_service_type); ?></td>
                            <td><span data-toggle="tooltip" title="<?php echo e($payment->created_at->format('F d, Y h:i a')); ?>"><?php echo e($payment->created_at->format('F d, Y')); ?></span></td>

                            <td>
                                <?php if($payment->transactionDetail()->status  == 'PAID'): ?>
                                    <span class="text-success" data-toggle="tooltip" title="<?php echo e($payment->status); ?>"><i class="la la-check-circle-o"></i> </span>
                                <?php else: ?>
                                    <span class="text-danger" data-toggle="tooltip" title="<?php echo e($payment->status); ?>"><i class="la la-exclamation-circle"></i> </span>
                                <?php endif; ?>

                                <a href="<?php echo e(route('payment_view', $payment->id)); ?>" class="btn btn-primary ml-2"><i class="la la-eye"></i> </a>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>

                <?php echo $payments->links(); ?>


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
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef_1.14.3\absolutelychef\resources\views/admin/payments.blade.php ENDPATH**/ ?>