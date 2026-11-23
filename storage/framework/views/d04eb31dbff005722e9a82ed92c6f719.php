<?php $__env->startSection('body'); ?>
<div class="photo">
    <header class="topbar">
        <a href="<?php echo e(route('home')); ?>" class="logo">Animal Shelter</a>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-small">Donate Now</a>
    </header>
    <main class="auth-wrap">
        <div class="auth-card">
            <?php echo $__env->yieldContent('card'); ?>
        </div>
    </main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LaravelProjects\Pet-Shelter-Management\resources\views/layouts/guest.blade.php ENDPATH**/ ?>