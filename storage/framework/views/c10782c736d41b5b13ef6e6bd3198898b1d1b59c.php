<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">

            <?php if($users->count() > 0): ?>
                <p><?php echo e($users->total()); ?> <?php echo app('translator')->get('app.total_users_found'); ?></p>
                <table class="table table-hover">
                    <tr>
                        <td><b><?php echo app('translator')->get('app.name'); ?></b></td>
                        <td><b><?php echo app('translator')->get('app.email'); ?></b></td>
                        <td><b><?php echo app('translator')->get('app.actions'); ?></b></td>
                    </tr>

                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($user->name); ?>

                            </td>
                            <td><?php echo e($user->email); ?></td>

                            <td>
                                <a href="<?php echo e(route('users_view', $user->id)); ?>" class="btn btn-secondary btn-sm"><i class="la la-eye"></i> </a>

                            <?php if($user->active_status == 0): ?>
                                    <a href="<?php echo e(route('user_status', [$user->id, 'approve'])); ?>" class="btn btn-default btn-sm" data-toggle="tooltip" title="<?php echo app('translator')->get('app.approve'); ?>"><i class="la la-ban"></i> </a>

                                    <a href="<?php echo e(route('user_status', [$user->id, 'block'])); ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" title="<?php echo app('translator')->get('app.block'); ?>"><i class="la la-ban"></i> </a>

                                <?php elseif($user->active_status == '1'): ?>
                                    <a href="<?php echo e(route('user_status', [$user->id, 'block'])); ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" title="<?php echo app('translator')->get('app.block'); ?>"><i class="la la-ban"></i> </a>

                                <?php elseif($user->active_status == 2): ?>
                                    <a href="<?php echo e(route('user_status', [$user->id, 'approve'])); ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="<?php echo app('translator')->get('app.approve'); ?>"><i class="la la-check-circle-o"></i> </a>
                                <?php endif; ?>

                                <a href="<?php echo e(route('users_edit', $user->id)); ?>" class="btn btn-info btn-sm"><i class="la la-pencil"></i> </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>

                <?php echo $users->links(); ?>


            <?php else: ?>
                <h3><?php echo app('translator')->get('app.there_is_no_user'); ?></h3>
            <?php endif; ?>



        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/admin/users.blade.php ENDPATH**/ ?>