<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">

            <?php if( ! empty($is_user_id_view)): ?>
                <a class="btn btn-primary mb-2" href="<?php echo e(route('users_edit', $user->id)); ?>"><i class="la la-pencil-square-o"></i> <?php echo app('translator')->get('app.edit'); ?> </a>
            <?php else: ?>
                <a class="btn btn-primary mb-2" href="<?php echo e(route('profile_edit')); ?>"><i class="la la-pencil-square-o"></i> <?php echo app('translator')->get('app.edit'); ?> </a>
            <?php endif; ?>

            <?php if($user->is_employer() || $user->is_agent()): ?>
                <div class="profile-company-logo mb-3">
                    <img src="<?php echo e($user->logo_url); ?>" class="img-fluid" style="max-width: 100px;" />
                </div>
            <?php endif; ?>

            <?php if($user->is_user()): ?>
            <table class="table table-hover  mb-4">

                <tr>
                    <th><?php echo app('translator')->get('app.title'); ?></th>
                    <td><?php echo e($user->title); ?></td>
                </tr>
                
                <tr>
                    <th><?php echo app('translator')->get('app.name'); ?></th>
                    <td><?php echo e($user->name); ?></td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.surename'); ?></th>
                    <td><?php echo e($user->surename); ?></td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.postalcode'); ?></th>
                    <td><?php echo e($user->postal_code); ?></td>
                </tr>


                <tr>
                    <th><?php echo app('translator')->get('app.cv'); ?></th>
                    <td>
                        <?php if($user->cv): ?>
                        <a  target="_blank" href="<?php echo e(route('download_cv', ['file' => basename($user->cv)])); ?>">download CV</a>
                        <?php else: ?>
                            
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.email'); ?></th>
                    <td><?php echo e($user->email); ?></td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('app.home_phone'); ?></th>
                    <td><?php echo e($info->home_phone); ?></td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('app.phone'); ?></th>
                    <td><?php echo e($user->phone); ?></td>
                </tr>


                <tr>
                    <?php 
                    $website1 = json_decode($info->website_link1); 
                    $website2 = json_decode($info->website_link2); 
                    
                    ?>
                    <th><?php echo app('translator')->get('app.website_link'); ?></th>
                    <td><a href="<?php echo e($website1->link); ?>"><?php echo e($website1->type); ?></a></td>
                </tr>


                <tr>
                    <th><?php echo app('translator')->get('app.website_link'); ?></th>
                    <td><a href="<?php echo e($website2->link); ?>"><?php echo e($website2->type); ?></a></td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.employer_type'); ?></th>
                    <td>
                        <?php $employer_type = json_decode($info->employer_type, 1);  ?>

                        <?php if(!empty($employer_type)): ?>    
                            <?php for($i = 0; $i < count($employer_type); $i++): ?>
                                <?php echo e(getEmployersTypes()[$employer_type[$i]]); ?>

                            <?php endfor; ?>
                        <?php endif; ?>

                    </td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('app.experiences'); ?></th>
                    <td>
                        <?php if(!empty($userExperiences)): ?>
                        <?php for($i = 0; $i < count($userExperiences); $i++): ?>
                           <span class="tags-panel"> <?php echo e($userExperiences[$i]->name); ?>  </span> 
                        <?php endfor; ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('app.experience_year'); ?></th>
                    <td>
                        <?php echo e($info->experience_year ? getExperiences()[$info->experience_year] : ''); ?>

                    </td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.current_job'); ?></th>
                    <td><?php echo e($info->current_job); ?></td>
                </tr>

                <tr>
                    <?php 
                    $currentSalary = json_decode($info->current_salary); 
                    ?>
                    <th><?php echo app('translator')->get('app.current_salary'); ?></th>
                    <td><?php echo e($currentSalary->type ? listSalary()[$currentSalary->type] : ''); ?> <?php echo e($currentSalary->price); ?></td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.profile_langs'); ?></th>
                    <td>
                        <?php $langs = json_decode($info->languages);  ?>
                        <?php if(!empty($langs)): ?>
                        <?php for($i = 0; $i < count($langs); $i++): ?>
                            <span class="tags-panel">
                                <?php echo e(get_languages()[$langs[$i]]); ?>  
                            </span>
                        <?php endfor; ?>
                        <?php endif; ?>
                    </td>
                </tr>


                <tr>
                    <th><?php echo app('translator')->get('app.desired_job'); ?></th>
                    <td><?php echo e($info->desired_job); ?></td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.desired_location'); ?></th>
                    <td><?php echo e($info->desired_location); ?></td>
                </tr>

                
                <tr>
                    <?php 
                    $desiredSalary = json_decode($info->deisred_salary); 
                    ?>
                    <th><?php echo app('translator')->get('app.desired_salary'); ?></th>
                    <td><?php echo e($desiredSalary->type ?  listSalary()[$desiredSalary->type]  : ''); ?>  <?php echo e($desiredSalary->price); ?></td>
                </tr>

                <tr>
                    <?php 
                    $jobType = json_decode($info->job_type); 
                    ?>
                    <th><?php echo app('translator')->get('app.job_type'); ?></th>
                    <td><?php echo e($jobType->type ? listJobType()[$jobType->type] : ''); ?>  <?php echo e($jobType->price); ?></td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.cover_letter'); ?></th>
                    <td><?php echo e($info->cover_letter); ?></td>
                </tr>

                <tr>
                    <th><?php echo app('translator')->get('app.summary'); ?></th>
                    <td><?php echo e($info->summary); ?></td>
                </tr>
                
                <tr>
                    <th><?php echo app('translator')->get('app.address'); ?></th>
                    <td><?php echo e($user->address); ?></td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('app.country'); ?></th>
                    <td>
                        <?php if($user->country): ?>
                            <?php echo e($user->country->name); ?>

                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <th>Registered at</th>
                    <td><?php echo e($user->signed_up_datetime()); ?></td>
                </tr>
                <tr>
                    <th><?php echo app('translator')->get('app.status'); ?></th>
                    <td><?php echo e($user->status_context()); ?></td>
                </tr>
            </table>
            <?php endif; ?>




            <?php if($user->is_employer() || $user->is_agent()): ?>
                    <h3 class="mb-4">About Company</h3>

                    <table class="table table-bordered table-striped">
                    <tr>
                        <th><?php echo app('translator')->get('app.state'); ?></th>
                        <td><?php echo e($user->state_name); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->get('app.city'); ?></th>
                        <td><?php echo e($user->city); ?></td>
                    </tr>

                    <tr>
                        <th><?php echo app('translator')->get('app.website'); ?></th>
                        <td><?php echo e($user->website); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->get('app.company'); ?></th>
                        <td><?php echo e($user->company); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->get('app.company_size'); ?></th>
                        <td><?php echo e(company_size($user->company_size)); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->get('app.about_company'); ?></th>
                        <td><?php echo e($user->about_company); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo app('translator')->get('app.premium_jobs_balance'); ?></th>
                        <td><?php echo e($user->premium_jobs_balance); ?></td>
                    </tr>
                </table>
            <?php endif; ?>


            <?php if( ! empty($is_user_id_view)): ?>
                <a href="<?php echo e(route('users_edit', $user->id)); ?>"><i class="la la-pencil-square-o"></i> <?php echo app('translator')->get('app.edit'); ?> </a>
            <?php else: ?>
                <a href="<?php echo e(route('profile_edit')); ?>"><i class="la la-pencil-square-o"></i> <?php echo app('translator')->get('app.edit'); ?> </a>
            <?php endif; ?>


        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/admin/profile.blade.php ENDPATH**/ ?>