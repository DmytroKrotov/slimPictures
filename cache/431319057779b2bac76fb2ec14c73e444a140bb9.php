

<?php $__env->startSection('content'); ?>




    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-inner">

            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="carousel-item <?php echo e($loop->first?'active':''); ?> bg-light" data-bs-interval="10000">
                    <img src="<?php echo e($image->src); ?>" class="d-block w-25 m-auto" alt="...">
                    <div class="carousel-caption d-none d-md-block text-danger">
                        <h5 >FILENAME</h5>
                        <p><?php echo e($image->name); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dk\PhpstormProjects\slim-pictures\resources\views/index.blade.php ENDPATH**/ ?>