<?php $__env->startSection('content'); ?>


    <div class="advertise-section bg-white pb-5 pt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="advertise-section-heading mb-5 text-center">

                        <h1>Advertise</h1>
                        <h5 class="text-muted">Post Jobs and View Talent Solutions at a Glance</h5>
                        <h5 class="text-muted">Get Talent Faster and Easier through <b class="text-danger">Absolutely Chef</b></h5>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="container">
                    <div class="tabs advertise-tabs">
                        <div class="container">
                            <div class="row">
                                    <div class="col-xl-6">
                                        <ul class="nav nav-pills nav-stacked flex-column">
                                            <?php $__currentLoopData = $p_waitings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="#tab_<?php echo e($index); ?>" data-toggle="pill" class="item-option" onclick="CheckOption(this)">
                                                        <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="enterprise" id="m_singleJob_<?php echo e($index); ?>" value="<?php echo e($index); ?>" <?php echo e($index == 0 ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="m_singleJob_<?php echo e($index); ?>">
                                                                <?php echo $package->label; ?>

                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="#" data-toggle="pill" class="item-option" >
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="m_singleJob_<?php echo e($index); ?>">
                                                            <a href="<?php echo e(route('contact_us')); ?>" class="">Request info about packages with CV search</a>
                                                        </label>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="tab-content">
                                            <?php $__currentLoopData = $p_waitings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="tab-pane <?php echo e($index == 0 ? 'active' : ''); ?>" id="tab_<?php echo e($index); ?>">
                                                        <h3>
                                                            <?php echo $package->name .','; ?> <?php echo get_amount($package->price ); ?> <?php echo e($index == 0 ? 'each' : ''); ?>

                                                        </h3>
                                                        <ul>
                                                            <li>In a few short steps, you can create your job ad online. </li>
                                                            <li>The best value for all types of recruitment search. That is our guarantee to you.</li>
                                                            <li>Job ads live and editable for 30 days</li>
                                                        </ul>
                                                       
                                                        <a href="<?php echo e(route('addToCart', ['id' => $package->id])); ?>" class="btn btn-lg btn-primary">Add To Cart</a>
                                                    </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>   
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
            <div class="advertise-section-heading m-5 text-center">

                <h3 class="h1">Management, Professional and Skilled Worker Job Ad</h3>
            </div>
            <div class="row">
                <div class="container">
                    <div class="tabs advertise-tabs">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6">
                                    <ul class="nav nav-pills nav-stacked flex-column">
                                        <?php $__currentLoopData = $p_profational; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="#tab_b_<?php echo e($index); ?>" data-toggle="pill" class="item-option" onclick="CheckOption(this)">
                                                        <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="managment" id="m_singleJob_<?php echo e($index); ?>" value="<?php echo e($index); ?>" <?php echo e($index == 0 ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="m_singleJob_<?php echo e($index); ?>">
                                                                <?php echo $package->label; ?>

                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="#" data-toggle="pill" class="item-option" >
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="m_singleJob_<?php echo e($index); ?>">
                                                            <a href="<?php echo e(route('contact_us')); ?>" class="">Request info about packages with CV search</a>
                                                        </label>
                                                    </div>
                                                </a>
                                            </li>
                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    <div class="tab-content">
                                        <?php $__currentLoopData = $p_profational; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        
                                                <div class="tab-pane  <?php echo e($index == 0 ? 'active' : ''); ?>" id="tab_b_<?php echo e($index); ?>">
                                                    <h3>
                                                        <?php echo $package->name .','; ?> <?php echo get_amount($package->price ); ?> <?php echo e($index == 0 ? 'each' : ''); ?>                                                    </h3>
                                                    <ul>
                                                        <li>In a few short steps, you can create your job ad online. </li>
                                                        <li>The best value for all types of recruitment search. That is our guarantee to you.</li>
                                                        <li>Job ads live and editable for 30 days</li>
                                                    </ul>
                                                      
                                                    

                                                    <a href="<?php echo e(route('addToCart', ['id' => $package->id])); ?>" class="btn btn-lg btn-primary">Add To Cart</a>
                                                </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        
 
        </div>
    </div>


<?php $__env->stopSection(); ?>
<script>
//     $(function() {
// 	var $a = $(".tabs li");
// 	$a.click(function() {
// 		$a.removeClass("active");
// 		$(this).addClass("active");
// 	});
// });

function CheckOption(item){
    input = item.getElementsByTagName("input")[0];
    input.checked = true;
};

</script>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\absolutelychef_complete_errors\absolutelychef\resources\views/advertise.blade.php ENDPATH**/ ?>