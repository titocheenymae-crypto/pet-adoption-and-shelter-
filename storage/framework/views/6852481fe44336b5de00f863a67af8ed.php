<?php $__env->startSection('title', 'Animal Shelter'); ?>

<?php $__env->startSection('body'); ?>
<div class="photo">
    <header class="topbar">
        <a href="<?php echo e(route('home')); ?>" class="logo">Animal Shelter</a>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-small">Donate Now</a>
    </header>

    <section class="hero">
        <h1>Making new best friends since 1994.</h1>
        <p>Bring home a new fully trained and vaccinated family member.</p>
        <a href="<?php echo e(route('login')); ?>" class="btn">Sign in</a>
        <div class="alt">New here? <a href="<?php echo e(route('register')); ?>">Create an account</a></div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LaravelProjects\Pet-Shelter-Management\resources\views/welcome.blade.php ENDPATH**/ ?>