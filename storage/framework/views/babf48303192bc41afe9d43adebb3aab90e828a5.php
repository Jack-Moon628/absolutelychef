<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">


            <table class="table table-striped table-hover">

                <tr>
                    <th><?php echo app('translator')->get('app.payer_name'); ?></th>
                    <td><?php echo e($payment->user->name); ?></td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('app.payer_email'); ?></th>
                    <td><?php echo e($payment->user->email); ?></td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.amount'); ?></th>
                    <td><?php echo get_amount($payment->amount); ?></td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.method'); ?></th>
                    <td><?php echo e($payment->transactionDetail()->payment_service_type); ?></td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.currency'); ?></th>
                    <td><?php echo e($payment->transactionDetail()->currency); ?></td>
                </tr>

                <?php if($payment->payment_method == 'stripe'): ?>

                    <tr>
                        <th><?php echo app('translator')->get('app.card_last4'); ?></th>
                        <td><?php echo e($payment->card_last4); ?></td>
                    </tr>

                    <tr>
                        <th><?php echo app('translator')->get('app.card_id'); ?></th>
                        <td><?php echo e($payment->card_id); ?></td>
                    </tr>

                    <tr>
                        <th><?php echo app('translator')->get('app.card_brand'); ?></th>
                        <td><?php echo e($payment->card_brand); ?></td>
                    </tr>

                    <tr>
                        <th><?php echo app('translator')->get('app.card_expire'); ?></th>
                        <td><?php echo e($payment->card_exp_month); ?>,<?php echo e($payment->card_exp_year); ?></td>
                    </tr>

                <?php endif; ?>

                <tr>
                    <th><?php echo app('translator')->get('app.gateway_transaction_id'); ?></th>
                    <td><?php echo e($payment->transaction_id); ?></td>
                </tr>

                <?php if($payment->payment_method == 'bank_transfer'): ?>
                    <tr>
                        <th colspan="2"><h4><?php echo app('translator')->get('app.bank_transfer_information'); ?></h4></th>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->get('app.bank_swift_code'); ?></th>
                        <td><?php echo e($payment->bank_swift_code); ?></td>
                    </tr>

                    <tr>
                        <th><?php echo app('translator')->get('app.account_number'); ?></th>
                        <td><?php echo e($payment->account_number); ?></td>
                    </tr>

                    <tr>
                        <th><?php echo app('translator')->get('app.branch_name'); ?></th>
                        <td><?php echo e($payment->branch_name); ?></td>
                    </tr>

                    <tr>
                        <th><?php echo app('translator')->get('app.branch_address'); ?></th>
                        <td><?php echo e($payment->branch_address); ?></td>
                    </tr>

                    <tr>
                        <th><?php echo app('translator')->get('app.account_name'); ?></th>
                        <td><?php echo e($payment->account_name); ?></td>
                    </tr>

                    <tr>
                        <th><?php echo app('translator')->get('app.iban'); ?></th>
                        <td><?php echo e($payment->iban); ?></td>
                    </tr>
                <?php endif; ?>

                <tr>
                    <th><?php echo app('translator')->get('app.time'); ?></th>
                    <td><?php echo e($payment->created_at->format('F d, Y h:i a')); ?></td>
                </tr>
            </table>


            <?php if($payment->reward): ?>
                <h3><?php echo app('translator')->get('app.selected_reward'); ?></h3>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo app('translator')->get('app.amount'); ?></th>
                        <td><?php echo get_amount($payment->reward->amount); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->get('app.description'); ?></th>
                        <td><?php echo e($payment->reward->description); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->get('app.estimated_delivery'); ?></th>
                        <td><?php echo e($payment->reward->estimated_delivery); ?></td>
                    </tr>
                </table>
            <?php endif; ?>


            <?php if($payment->transactionDetail()->status != 'PAID'): ?>
                <a href="<?php echo e(route('status_change', [$payment->id, 'success'] )); ?>" class="btn btn-success"><i class="fa fa-check-circle-o"></i> <?php echo app('translator')->get('app.mark_as_success'); ?> </a>
            <?php endif; ?>


        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef_1.14.3\absolutelychef\resources\views/admin/payment_view.blade.php ENDPATH**/ ?>