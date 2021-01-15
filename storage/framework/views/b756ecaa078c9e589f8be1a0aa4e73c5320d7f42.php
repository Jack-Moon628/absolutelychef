<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-10">


            <form method="post" action="">
                <?php echo csrf_field(); ?>

                <div class="form-group row <?php echo e($errors->has('category_name')? 'has-error':''); ?>">
                    <label for="category_name" class="col-sm-4 control-label"><?php echo app('translator')->get('app.category_name'); ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?php echo e(e_form_invalid_class('category_name', $errors)); ?>" id="category_name" value="<?php echo e(old('category_name')); ?>" name="category_name" placeholder="<?php echo app('translator')->get('app.category_name'); ?>">

                        <?php echo e_form_error('category_name', $errors); ?>

                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.save_new_category'); ?></button>
                    </div>
                </div>

            </form>

        </div>

    </div>


    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <tr>
                    <th><?php echo app('translator')->get('app.category_name'); ?></th>
                    <th>#</th>
                </tr>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($category->category_name); ?>

                        </td>
                        <td>
                            <a href="<?php echo e(route('edit_categories', $category->id)); ?>" class="btn btn-info"><i class="la la-pencil"></i> </a>
                            <a href="javascript:;" class="btn btn-danger category_delete" data-id="<?php echo e($category->id); ?>"><i class="la la-trash"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/admin/categories.blade.php ENDPATH**/ ?>