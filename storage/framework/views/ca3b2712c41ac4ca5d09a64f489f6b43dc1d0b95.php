<?php $__env->startSection('page-css'); ?>
    <link href="<?php echo e(asset('assets/plugins/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker3.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-10">
            <form method="post" action="">
                <?php echo csrf_field(); ?>
                <div class="form-group row <?php echo e($errors->has('job_title')? 'has-error':''); ?>">
                    <label for="job_title" class="col-sm-4 control-label"> <?php echo app('translator')->get('app.job_title'); ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?php echo e(e_form_invalid_class('job_title', $errors)); ?>" id="job_title" value="<?php echo e(old('job_title')); ?>" name="job_title" placeholder="<?php echo app('translator')->get('app.job_title'); ?>">

                        <?php echo e_form_error('job_title', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('position')? 'has-error':''); ?>">
                    <label for="position" class="col-sm-4 control-label"> <?php echo app('translator')->get('app.position'); ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?php echo e(e_form_invalid_class('position', $errors)); ?>" id="position" value="<?php echo e(old('position')); ?>" name="position" placeholder="<?php echo app('translator')->get('app.position'); ?>">

                        <?php echo e_form_error('position', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('category')? 'has-error':''); ?>">
                    <label for="category" class="col-sm-4 control-label"><?php echo app('translator')->get('app.category'); ?></label>
                    <div class="col-sm-8">
                        <select class="form-control <?php echo e(e_form_invalid_class('category', $errors)); ?>" name="category" id="category">
                            <option value=""><?php echo app('translator')->get('app.select_category'); ?></option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php echo e_form_error('category', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('salary_cycle')? 'has-error':''); ?>">
                    <label for="salary_cycle" class="col-sm-4 control-label"><?php echo app('translator')->get('app.salary_cycle'); ?></label>
                    <div class="col-sm-8">

                        <div class="price_input_group">

                            <select class="form-control <?php echo e(e_form_invalid_class('salary_cycle', $errors)); ?>" name="salary_cycle">
                                <option value="monthly" <?php echo e(old('salary_cycle') == 'monthly' ? 'selected':''); ?>><?php echo app('translator')->get('app.monthly'); ?></option>
                                <option value="yearly" <?php echo e(old('salary_cycle') == 'yearly' ? 'selected':''); ?>><?php echo app('translator')->get('app.yearly'); ?></option>
                                <option value="weekly" <?php echo e(old('salary_cycle') == 'weekly' ? 'selected':''); ?>><?php echo app('translator')->get('app.weekly'); ?></option>
                                <option value="daily" <?php echo e(old('salary_cycle') == 'daily' ? 'selected':''); ?>><?php echo app('translator')->get('app.daily'); ?></option>
                                <option value="hourly" <?php echo e(old('salary_cycle') == 'hourly' ? 'selected':''); ?>><?php echo app('translator')->get('app.hourly'); ?></option>

                            </select>

                            <?php echo e_form_error('salary_cycle', $errors); ?>

                        </div>
                    </div>
                </div>


                <div class="form-group row <?php echo e($errors->has('salary')? 'has-error':''); ?>">
                    <label for="salary" class="col-sm-4 control-label"> <?php echo app('translator')->get('app.salary'); ?></label>
                    <div class="col-sm-8">


                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="number" class="form-control <?php echo e(e_form_invalid_class('salary', $errors)); ?>" id="salary" value="<?php echo e(old('salary')); ?>" name="salary" placeholder="<?php echo app('translator')->get('app.salary'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label> <input type="checkbox" name="is_negotiable" value="1" <?php echo e(checked('1', old('is_negotiable'))); ?>> <?php echo app('translator')->get('app.is_negotiable'); ?></label>
                            </div>
                        </div>

                        <?php echo e_form_error('salary', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('salary_upto')? 'has-error':''); ?>">
                    <label for="salary_upto" class="col-sm-4 control-label"> <?php echo app('translator')->get('app.salary_upto'); ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?php echo e(e_form_invalid_class('salary_upto', $errors)); ?>" id="salary_upto" value="<?php echo e(old('salary_upto')); ?>" name="salary_upto" placeholder="<?php echo app('translator')->get('app.salary_upto'); ?>">

                        <p class="text-info"><?php echo app('translator')->get('app.salary_upto_desc'); ?></p>
                        <?php echo e_form_error('salary_upto', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('salary_currency')? 'has-error':''); ?>">
                    <label for="salary_currency" class="col-sm-4 control-label"><?php echo app('translator')->get('app.salary_currency'); ?></label>
                    <div class="col-sm-8">

                        <div class="price_input_group">

                            <select class="form-control <?php echo e(e_form_invalid_class('salary_currency', $errors)); ?>" name="salary_currency">

                                <?php $__currentLoopData = get_currencies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency => $currency_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($currency); ?>"><?php echo e($currency); ?> | <?php echo e($currency_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <?php echo e_form_error('salary_currency', $errors); ?>

                        </div>
                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('vacancy')? 'has-error':''); ?>">
                    <label for="vacancy" class="col-sm-4 control-label"> <?php echo app('translator')->get('app.vacancy'); ?></label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control <?php echo e(e_form_invalid_class('vacancy', $errors)); ?>" id="vacancy" value="<?php echo e(old('vacancy')); ?>" name="vacancy" placeholder="<?php echo app('translator')->get('app.vacancy'); ?>">

                        <?php echo e_form_error('vacancy', $errors); ?>

                    </div>
                </div>


                <!-- <div class="form-group row <?php echo e($errors->has('gender')? 'has-error':''); ?>">
                    <label for="gender" class="col-sm-4 control-label"><?php echo app('translator')->get('app.gender'); ?></label>
                    <div class="col-sm-8">
                        <select class="form-control <?php echo e(e_form_invalid_class('gender', $errors)); ?>" name="gender" id="gender">
                            <option value="any" <?php echo e(old('gender') == 'any' ? 'selected':''); ?>><?php echo app('translator')->get('app.any'); ?></option>
                            <option value="male" <?php echo e(old('gender') == 'male' ? 'selected':''); ?>><?php echo app('translator')->get('app.male'); ?></option>
                            <option value="female" <?php echo e(old('gender') == 'female' ? 'selected':''); ?>><?php echo app('translator')->get('app.female'); ?></option>
                            <option value="transgender" <?php echo e(old('gender') == 'transgender' ? 'selected':''); ?>><?php echo app('translator')->get('app.transgender'); ?></option>
                        </select>

                        <?php echo e_form_error('gender', $errors); ?>

                    </div>
                </div> -->


                <div class="form-group row <?php echo e($errors->has('exp_level')? 'has-error':''); ?>">
                    <label for="exp_level" class="col-sm-4 control-label"><?php echo app('translator')->get('app.exp_level'); ?></label>
                    <div class="col-sm-8">
                        <select class="form-control <?php echo e(e_form_invalid_class('exp_level', $errors)); ?>" name="exp_level" id="exp_level">
                            <option value="mid" <?php echo e(old('exp_level') == 'mid' ? 'selected':''); ?>><?php echo app('translator')->get('app.mid'); ?></option>
                            <option value="entry" <?php echo e(old('exp_level') == 'entry' ? 'selected':''); ?>><?php echo app('translator')->get('app.entry'); ?></option>
                            <option value="senior" <?php echo e(old('exp_level') == 'senior' ? 'selected':''); ?>><?php echo app('translator')->get('app.senior'); ?></option>
                        </select>

                        <?php echo e_form_error('exp_level', $errors); ?>

                    </div>
                </div>



                <div class="form-group row <?php echo e($errors->has('job_type')? 'has-error':''); ?>">
                    <label for="job_type" class="col-sm-4 control-label"><?php echo app('translator')->get('app.job_type'); ?></label>
                    <div class="col-sm-8">
                        <select class="form-control <?php echo e(e_form_invalid_class('job_type', $errors)); ?>" name="job_type" id="job_type">
                            <option value="full_time" <?php echo e(old('job_type') == 'full_time' ? 'selected':''); ?>><?php echo app('translator')->get('app.full_time'); ?></option>
                            <option value="internship" <?php echo e(old('job_type') == 'internship' ? 'selected':''); ?>><?php echo app('translator')->get('app.internship'); ?></option>
                            <option value="part_time" <?php echo e(old('job_type') == 'part_time' ? 'selected':''); ?>><?php echo app('translator')->get('app.part_time'); ?></option>
                            <option value="contract" <?php echo e(old('job_type') == 'contract' ? 'selected':''); ?>><?php echo app('translator')->get('app.contract'); ?></option>
                            <option value="temporary" <?php echo e(old('job_type') == 'temporary' ? 'selected':''); ?>><?php echo app('translator')->get('app.temporary'); ?></option>
                            <option value="commission" <?php echo e(old('job_type') == 'commission' ? 'selected':''); ?>><?php echo app('translator')->get('app.commission'); ?></option>
                            <option value="internship" <?php echo e(old('job_type') == 'internship' ? 'selected':''); ?>><?php echo app('translator')->get('app.internship'); ?></option>
                        </select>

                        <?php echo e_form_error('job_type', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('experience_required_years')? 'has-error':''); ?>">
                    <label for="experience_required_years" class="col-sm-4 control-label"> <?php echo app('translator')->get('app.experience_required_years'); ?></label>
                    <div class="col-sm-8">

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="number" class="form-control <?php echo e(e_form_invalid_class('experience_required_years', $errors)); ?>" id="experience_required_years" value="<?php echo e(old('experience_required_years')); ?>" name="experience_required_years" placeholder="<?php echo app('translator')->get('app.experience_required_years'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label> <input type="checkbox" name="experience_plus" value="1" <?php echo e(checked('1', old('experience_plus'))); ?> > <?php echo app('translator')->get('app.plus'); ?></label>
                            </div>
                        </div>

                        <?php echo e_form_error('experience_required_years', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('deadline')? 'has-error':''); ?>">
                    <label for="deadline" class="col-sm-4 control-label"> <?php echo app('translator')->get('app.deadline'); ?></label>
                    <div class="col-sm-8">
                        <input type="text" data-provide="datepicker" data-date-format="dd-mm-yyyy" class="form-control <?php echo e(e_form_invalid_class('deadline', $errors)); ?> date_picker" id="deadline" value="<?php echo e(old('deadline')); ?>" name="deadline" placeholder="dd-mm-yyyy">
                        <?php echo e_form_error('deadline', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('description')? 'has-error':''); ?>">
                    <label class="col-sm-4 control-label"> <?php echo app('translator')->get('app.description'); ?></label>
                    <div class="col-sm-8">
                        <textarea name="description" class="form-control <?php echo e(e_form_invalid_class('description', $errors)); ?>" rows="5"><?php echo e(old('description')); ?></textarea>
                        <?php echo $errors->has('description')? '<p class="help-block">'.$errors->first('description').'</p>':''; ?>

                        <p class="text-info"> <?php echo app('translator')->get('app.description_info_text'); ?></p>
                    </div>
                </div>


                <div class="form-group row <?php echo e($errors->has('skills')? 'has-error':''); ?>">
                    <label class="col-sm-4 control-label"> <?php echo app('translator')->get('app.skills'); ?></label>
                    <div class="col-sm-8">
                        <textarea name="skills" class="form-control <?php echo e(e_form_invalid_class('skills', $errors)); ?>" rows="2"><?php echo e(old('skills')); ?></textarea>
                        <?php echo $errors->has('skills')? '<p class="help-block">'.$errors->first('skills').'</p>':''; ?>

                        <p class="text-info"> <?php echo app('translator')->get('app.skills_info_text'); ?></p>
                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('responsibilities')? 'has-error':''); ?>">
                    <label class="col-sm-4 control-label"> <?php echo app('translator')->get('app.responsibilities'); ?></label>
                    <div class="col-sm-8">
                        <textarea name="responsibilities" class="form-control <?php echo e(e_form_invalid_class('responsibilities', $errors)); ?>" rows="3"><?php echo e(old('responsibilities')); ?></textarea>
                        <?php echo $errors->has('responsibilities')? '<p class="help-block">'.$errors->first('responsibilities').'</p>':''; ?>

                        <p class="text-info"> <?php echo app('translator')->get('app.responsibilities_info_text'); ?></p>
                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('educational_requirements')? 'has-error':''); ?>">
                    <label class="col-sm-4 control-label"> <?php echo app('translator')->get('app.educational_requirements'); ?></label>
                    <div class="col-sm-8">
                        <textarea name="educational_requirements" class="form-control <?php echo e(e_form_invalid_class('educational_requirements', $errors)); ?>" rows="3"><?php echo e(old('educational_requirements')); ?></textarea>
                        <?php echo $errors->has('educational_requirements')? '<p class="help-block">'.$errors->first('educational_requirements').'</p>':''; ?>

                        <p class="text-info"> <?php echo app('translator')->get('app.educational_requirements_info_text'); ?></p>
                    </div>
                </div>


                <div class="form-group row <?php echo e($errors->has('experience_requirements')? 'has-error':''); ?>">
                    <label class="col-sm-4 control-label"> <?php echo app('translator')->get('app.experience_requirements'); ?></label>
                    <div class="col-sm-8">
                        <textarea name="experience_requirements" class="form-control <?php echo e(e_form_invalid_class('experience_requirements', $errors)); ?>" rows="3"><?php echo e(old('experience_requirements')); ?></textarea>
                        <?php echo $errors->has('experience_requirements')? '<p class="help-block">'.$errors->first('experience_requirements').'</p>':''; ?>

                        <p class="text-info"> <?php echo app('translator')->get('app.experience_requirements_info_text'); ?></p>
                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('additional_requirements')? 'has-error':''); ?>">
                    <label class="col-sm-4 control-label"> <?php echo app('translator')->get('app.additional_requirements'); ?></label>
                    <div class="col-sm-8">
                        <textarea name="additional_requirements" class="form-control <?php echo e(e_form_invalid_class('additional_requirements', $errors)); ?>" rows="3"><?php echo e(old('additional_requirements')); ?></textarea>
                        <?php echo $errors->has('additional_requirements')? '<p class="help-block">'.$errors->first('additional_requirements').'</p>':''; ?>

                        <p class="text-info"> <?php echo app('translator')->get('app.additional_requirements_info_text'); ?></p>
                    </div>
                </div>


                <div class="form-group row <?php echo e($errors->has('benefits')? 'has-error':''); ?>">
                    <label class="col-sm-4 control-label"> <?php echo app('translator')->get('app.benefits'); ?></label>
                    <div class="col-sm-8">
                        <textarea name="benefits" class="form-control <?php echo e(e_form_invalid_class('benefits', $errors)); ?>" rows="3"><?php echo e(old('benefits')); ?></textarea>
                        <?php echo $errors->has('benefits')? '<p class="help-block">'.$errors->first('benefits').'</p>':''; ?>

                        <p class="text-info"> <?php echo app('translator')->get('app.benefits_info_text'); ?></p>
                    </div>
                </div>


                <div class="form-group row <?php echo e($errors->has('apply_instruction')? 'has-error':''); ?>">
                    <label class="col-sm-4 control-label"> <?php echo app('translator')->get('app.apply_instruction'); ?></label>
                    <div class="col-sm-8">
                        <textarea name="apply_instruction" class="form-control <?php echo e(e_form_invalid_class('apply_instruction', $errors)); ?>" rows="3"><?php echo e(old('apply_instruction')); ?></textarea>
                        <?php echo $errors->has('apply_instruction')? '<p class="help-block">'.$errors->first('apply_instruction').'</p>':''; ?>

                        <p class="text-info"> <?php echo app('translator')->get('app.apply_instruction_info_text'); ?></p>
                    </div>
                </div>

                <legend><?php echo app('translator')->get('app.job_location'); ?></legend>


                <div class="form-group row <?php echo e($errors->has('is_any_where')? 'has-error':''); ?>">
                    <label for="is_any_where" class="col-md-4 control-label"><?php echo e(__('app.is_any_where')); ?> </label>
                    <div class="col-md-8">
                        <label> <input type="checkbox" name="is_any_where" value="1" <?php echo e(checked('1', old('is_any_where'))); ?> > <?php echo app('translator')->get('app.location_anywhere'); ?> </label>
                        <?php echo e_form_error('is_any_where', $errors); ?>

                    </div>
                </div>


                <div class="form-group row <?php echo e($errors->has('country')? 'has-error':''); ?>">
                    <label for="country" class="col-md-4 control-label"><?php echo e(__('app.country')); ?> <span class="mendatory-mark">*</span></label>
                    <div class="col-md-8">
                        <select name="country" class="form-control <?php echo e(e_form_invalid_class('country', $errors)); ?> country_to_state">
                            <option value=""><?php echo app('translator')->get('app.select_a_country'); ?></option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo $country->id; ?>" <?php if(old('country') && $country->id == old('country')): ?> selected="selected" <?php endif; ?>  ><?php echo $country->country_name; ?></option>
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
                                    <option value="<?php echo e($state->id); ?>" <?php if(old('state') && $state->id == old('state')): ?> selected="selected" <?php endif; ?> ><?php echo $state->state_name; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </select>
                        <?php echo e_form_error('state', $errors); ?>

                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('city_name')? 'has-error':''); ?>">
                    <label for="city_name" class="col-sm-4 control-label"> <?php echo app('translator')->get('app.city_name'); ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?php echo e(e_form_invalid_class('city_name', $errors)); ?>" id="city_name" value="<?php echo e(old('city_name')); ?>" name="city_name" placeholder="<?php echo app('translator')->get('app.city_name'); ?>">

                        <?php echo e_form_error('city_name', $errors); ?>

                    </div>
                </div>



                <div class="form-group row text-center">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.post_new_job'); ?></button>
                    </div>
                </div>
            </form>

        </div>
    </div>



<?php $__env->stopSection(); ?>




<?php $__env->startSection('page-js'); ?>
    <script src="<?php echo e(asset('assets/plugins/bootstrap-datepicker-1.6.4/js/bootstrap-datepicker.min.js')); ?>" defer></script>
    <script>
        window.onload = function(){
            $('.date_picker').datepicker({
                format: 'dd-mm-yyyy'
            })
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/admin/post-new-job.blade.php ENDPATH**/ ?>