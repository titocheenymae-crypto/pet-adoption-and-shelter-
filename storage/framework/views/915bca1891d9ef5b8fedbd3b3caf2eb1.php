<?php $__env->startSection('body'); ?>
<div class="shell">
    <aside class="side">
        <a href="<?php echo e(route('dashboard')); ?>" class="logo">Animal Shelter</a>
        <nav>
            <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => request()->routeIs('dashboard')]); ?>">Overview</a>
            <a href="<?php echo e(route('pets.index')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => request()->routeIs('pets.*')]); ?>">Pets</a>
            <a href="<?php echo e(route('shelters.index')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => request()->routeIs('shelters.*')]); ?>">Shelters</a>
            <a href="<?php echo e(route('events.index')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => request()->routeIs('events.*')]); ?>">Adoption events</a>
            <a href="<?php echo e(route('owners.index')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => request()->routeIs('owners.*')]); ?>">Owners</a>
        </nav>
        <div class="me">
            <?php echo e(auth()->user()->name); ?>

            <span><?php echo e(auth()->user()->email); ?></span>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit">Log out</button>
            </form>
        </div>
    </aside>

    <main class="main">
        <div class="page-head">
            <h1><?php echo $__env->yieldContent('heading'); ?></h1>
            <?php if (! empty(trim($__env->yieldContent('lead')))): ?><p><?php echo $__env->yieldContent('lead'); ?></p><?php endif; ?>
        </div>

        <?php if(session('status')): ?><div class="notice ok" role="status"><?php echo e(session('status')); ?></div><?php endif; ?>
        <?php if(session('notice')): ?><div class="notice warn" role="status"><?php echo e(session('notice')); ?></div><?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LaravelProjects\Pet-Shelter-Management\resources\views/layouts/app.blade.php ENDPATH**/ ?>