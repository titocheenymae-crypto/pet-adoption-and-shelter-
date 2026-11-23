<?php $__env->startSection('title', 'Overview · Animal Shelter'); ?>
<?php $__env->startSection('heading', 'Hello, '.Str::before(auth()->user()->name, ' ')); ?>
<?php $__env->startSection('lead', 'Here is what is happening across your shelters.'); ?>

<?php $__env->startSection('content'); ?>
    <div class="stats">
        <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><strong><?php echo e($value); ?></strong><span><?php echo e($label); ?></span></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="cols">
        <section class="panel">
            <h2>Recently added pets</h2>
            <?php $__empty_1 = true; $__currentLoopData = $recentPets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($loop->first): ?>
                <div class="table-scroll"><table>
                    <thead><tr><th>Name</th><th>Species</th><th>Shelter</th><th>Status</th></tr></thead><tbody>
                <?php endif; ?>
                <tr>
                    <td><?php echo e($pet->name); ?></td>
                    <td><?php echo e($pet->species); ?></td>
                    <td><?php echo e($pet->shelter->shelter_name); ?></td>
                    <td><span class="status <?php echo e($pet->status); ?>"><?php echo e(ucfirst($pet->status)); ?></span></td>
                </tr>
                <?php if($loop->last): ?></tbody></table></div><?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="empty">No pets yet. <a href="<?php echo e(route('pets.index')); ?>">Add the first one</a>.</p>
            <?php endif; ?>
        </section>

        <section class="panel">
            <h2>Upcoming events</h2>
            <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <p style="margin:0 0 14px">
                    <strong><?php echo e($event->event_name); ?></strong><br>
                    <span class="muted"><?php echo e($event->event_date->format('M j, Y')); ?> · <?php echo e($event->location); ?> · <?php echo e($event->pets_count); ?> <?php echo e(Str::plural('pet', $event->pets_count)); ?></span>
                </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="empty">Nothing scheduled. <a href="<?php echo e(route('events.index')); ?>">Plan an event</a>.</p>
            <?php endif; ?>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LaravelProjects\Pet-Shelter-Management\resources\views/dashboard.blade.php ENDPATH**/ ?>