<?php $__env->startSection('content'); ?>
    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('app.company_register')); ?></div>

                    <div class="card-body">
                        <form method="POST" action="">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?> <span class="mendatory-mark">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company" class="col-md-4 col-form-label text-md-right"><?php echo e(__('app.company')); ?> <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
                                    <input id="company" type="text" class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>" name="company" value="<?php echo e(old('company')); ?>" required autofocus>

                                    <?php if($errors->has('company')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('company')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?> <span class="mendatory-mark">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?> <span class="mendatory-mark">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?> <span class="mendatory-mark">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>



                            <legend>Contact Information</legend>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right"><?php echo e(__('app.phone')); ?> <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" name="phone" value="<?php echo e(old('phone')); ?>" required autofocus>

                                    <?php if($errors->has('phone')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right"><?php echo e(__('app.address')); ?> <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" name="address" value="<?php echo e(old('address')); ?>" required autofocus>

                                    <?php if($errors->has('address')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="address_2" class="col-md-4 col-form-label text-md-right"><?php echo e(__('app.address_2')); ?></label>
                                <div class="col-md-6">
                                    <input id="address_2" type="text" class="form-control<?php echo e($errors->has('address_2') ? ' is-invalid' : ''); ?>" name="address_2" value="<?php echo e(old('address_2')); ?>">

                                    <?php if($errors->has('address_2')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('address_2')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right"><?php echo e(__('app.country')); ?> <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
                                    <select name="country" class="form-control country_to_state" required autofocus>
                                        <option value=""><?php echo app('translator')->get('app.select_a_country'); ?></option>
                                       
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($country->country_code == 'US' || $country->country_code == 'GB' ): ?>
                                                <option value="<?php echo $country->id; ?>" <?php if(old('country') && $country->id == old('country')): ?> selected="selected" <?php endif; ?>  ><?php echo $country->country_name; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($country->country_code != 'US' || $country->country_code != 'GB' ): ?>
                                                <option value="<?php echo $country->id; ?>" <?php if(old('country') && $country->id == old('country')): ?> selected="selected" <?php endif; ?>  ><?php echo $country->country_name; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php if($errors->has('country')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('country')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right"><?php echo e(__('app.state')); ?> <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
                                    <select name="state" class="form-control state_options"  required autofocus>
                                        <option value="">Select a state</option>

                                        <?php if($old_country): ?>
                                            <?php $__currentLoopData = $old_country->states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($state->id); ?>" <?php if(old('state') && $state->id == old('state')): ?> selected="selected" <?php endif; ?> ><?php echo $state->state_name; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </select>

                                    <?php if($errors->has('state')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('state')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right"><?php echo e(__('app.city')); ?></label>
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>" name="city" value="<?php echo e(old('city')); ?>" required autofocus>

                                    <?php if($errors->has('city')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('city')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="la la-save"></i> <?php echo e(__('Register')); ?>

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

<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/employer-register.blade.php ENDPATH**/ ?>