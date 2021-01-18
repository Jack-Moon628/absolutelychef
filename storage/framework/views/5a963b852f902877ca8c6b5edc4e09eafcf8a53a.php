<?php $__env->startSection('content'); ?>
    <div class="blog-single-page bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="blog-single-title mt-5">
                        <h1><?php echo app('translator')->get('app.contact_us'); ?></h1>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="blog-single-content pt-3 pb-5">


                        <?php echo $__env->make('admin.flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form method="POST" action="">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label"><?php echo app('translator')->get('app.name'); ?> <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control <?php echo e(e_form_invalid_class('name', $errors)); ?>" name="name" value="<?php echo e(old('name')); ?>">
                                    <?php echo e_form_error('name', $errors); ?>

                                </div>
                            </div>

                            <div class="form-group row<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-4 control-label"><?php echo app('translator')->get('app.email_address'); ?>  <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control <?php echo e(e_form_invalid_class('email', $errors)); ?>" name="email" value="<?php echo e(old('email')); ?>" >
                                    <?php echo e_form_error('email', $errors); ?>

                                </div>
                            </div>

                            <div class="form-group row<?php echo e($errors->has('subject') ? ' has-error' : ''); ?>">
                                <label for="subject" class="col-md-4 control-label"><?php echo app('translator')->get('app.subject'); ?>  <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="subject" type="text" class="form-control <?php echo e(e_form_invalid_class('subject', $errors)); ?>" name="subject" value="<?php echo e(old('subject')); ?>" >
                                    <?php echo e_form_error('subject', $errors); ?>

                                </div>
                            </div>

                            <div class="form-group row<?php echo e($errors->has('message') ? ' has-error' : ''); ?>">
                                <label for="message" class="col-md-4 control-label"><?php echo app('translator')->get('app.message'); ?></label>
                                <div class="col-md-6">
                                    <textarea name="message" class="form-control <?php echo e(e_form_invalid_class('message', $errors)); ?>" rows="7"><?php echo e(old('message')); ?></textarea>
                                    <?php echo e_form_error('message', $errors); ?>

                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-envelope-o"></i> <?php echo app('translator')->get('app.send_feedback'); ?>
                                    </button>
                                </div>
                            </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef_1.14.3\absolutelychef\resources\views/contact_us.blade.php ENDPATH**/ ?>