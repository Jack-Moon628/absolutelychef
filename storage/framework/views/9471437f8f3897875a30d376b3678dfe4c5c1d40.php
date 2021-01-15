<?php $__env->startSection('page-css'); ?>
    <link href="<?php echo e(asset('assets/plugins/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker3.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-10">

            <form method="post" action="" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group row <?php echo e($errors->has('company')? 'has-error':''); ?>">
                    <label for="company" class="col-sm-4 control-label"> <?php echo app('translator')->get('app.company'); ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?php echo e(e_form_invalid_class('company', $errors)); ?>" id="company" value="<?php echo e($user->company); ?>" name="company" placeholder="<?php echo app('translator')->get('app.company'); ?>" disabled="disabled">

                        <?php echo e_form_error('company', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('company_size')? 'has-error':''); ?>">
                    <label for="company_size" class="col-sm-4 control-label"><?php echo app('translator')->get('app.company_size'); ?> (<?php echo app('translator')->get('app.employees'); ?>)</label>
                    <div class="col-sm-8">
                        <select class="form-control <?php echo e(e_form_invalid_class('company_size', $errors)); ?>" name="company_size" id="company_size">
                            <?php $__currentLoopData = company_size(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $size_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($size); ?>" <?php echo e(selected($size, $user->company_size)); ?> ><?php echo e($size_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php echo e_form_error('company_size', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('country')? 'has-error':''); ?>">
                    <label for="country" class="col-md-4 control-label"><?php echo e(__('app.country')); ?> </label>
                    <div class="col-md-8">
                        <select name="country" class="form-control <?php echo e(e_form_invalid_class('country', $errors)); ?> country_to_state">
                            <option value=""><?php echo app('translator')->get('app.select_a_country'); ?></option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo $country->id; ?>" <?php echo e(selected($country->id, $user->country_id)); ?>  ><?php echo $country->country_name; ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php echo e_form_error('country', $errors); ?>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="state" class="col-md-4 control-label"><?php echo e(__('app.state')); ?> </label>
                    <div class="col-md-8">
                        <select name="state" class="form-control <?php echo e(e_form_invalid_class('state', $errors)); ?> state_options">
                            <option value="">Select a state</option>

                            <?php if($old_country): ?>
                                <?php $__currentLoopData = $old_country->states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->id); ?>" <?php echo e(selected($state->id, $user->state_id)); ?>><?php echo $state->state_name; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </select>
                        <?php echo e_form_error('state', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('city')? 'has-error':''); ?>">
                    <label for="city" class="col-sm-4 control-label"> <?php echo app('translator')->get('app.city'); ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?php echo e(e_form_invalid_class('city', $errors)); ?>" id="city" value="<?php echo e($user->city); ?>" name="city" placeholder="<?php echo app('translator')->get('app.city'); ?>">

                        <?php echo e_form_error('city', $errors); ?>

                    </div>
                </div>


                <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label"><?php echo e(__('app.address')); ?> </label>
                    <div class="col-sm-8">
                        <input id="address" type="text" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" name="address" value="<?php echo e($user->address); ?>" >

                        <?php echo e_form_error('address', $errors); ?>

                    </div>
                </div>


                <div class="form-group row">
                    <label for="address_2" class="col-sm-4 col-form-label"><?php echo e(__('app.address_2')); ?></label>
                    <div class="col-sm-8">
                        <input id="address_2" type="text" class="form-control<?php echo e($errors->has('address_2') ? ' is-invalid' : ''); ?>" name="address_2" value="<?php echo e($user->address_2); ?>">

                        <?php echo e_form_error('address_2', $errors); ?>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label"><?php echo e(__('app.phone')); ?> </label>
                    <div class="col-md-8">
                        <input id="phone" type="text" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" name="phone" value="<?php echo e($user->phone); ?>" >

                        <?php echo e_form_error('phone', $errors); ?>

                    </div>
                </div>


                <div class="form-group row">
                    <label for="about_company" class="col-md-4 col-form-label"><?php echo e(__('app.about_company')); ?> </label>
                    <div class="col-md-8">
                        <textarea name="about_company" class="form-control" rows="5"><?php echo $user->about_company; ?></textarea>
                        <?php echo e_form_error('about_company', $errors); ?>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="website" class="col-md-4 col-form-label"><?php echo e(__('app.website')); ?> </label>
                    <div class="col-md-8">
                        <input id="website" type="text" class="form-control<?php echo e($errors->has('website') ? ' is-invalid' : ''); ?>" name="website" value="<?php echo e($user->website); ?>" >
                        <?php echo e_form_error('website', $errors); ?>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="logo" class="col-md-4 col-form-label"><?php echo e(__('app.logo')); ?> </label>
                    <div class="col-md-8">

                        <div class="company-logo mb-3" style="max-width: 100px;">
                            <img src="<?php echo e($user->logo_url); ?>" class="img-fluid" />
                        </div>


                        <input type="file" name="logo" class="form-control">

                        <p class="text-muted">Logo will be resize at (256X256), make sure your logo image is square</p>
                        <?php echo e_form_error('logo', $errors); ?>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary"> <i class="la la-refresh"></i> <?php echo app('translator')->get('app.update_employer_profile'); ?></button>
                    </div>
                </div>
            </form>



        </div>
    </div>



<?php $__env->stopSection(); ?>




<?php $__env->startSection('page-js'); ?>
    <script src="<?php echo e(asset('assets/plugins/bootstrap-datepicker-1.6.4/js/bootstrap-datepicker.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/admin/employer-profile.blade.php ENDPATH**/ ?>