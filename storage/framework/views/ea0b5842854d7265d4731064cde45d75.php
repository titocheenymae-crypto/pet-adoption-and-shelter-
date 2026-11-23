<?php $__env->startSection('title', 'Shelters · Animal Shelter'); ?>
<?php $__env->startSection('heading', 'Shelters'); ?>
<?php $__env->startSection('lead', 'Locations that look after the pets.'); ?>

<?php $__env->startSection('content'); ?>
<div class="split">
    <section class="panel">
        <h2>Add a shelter</h2>
        <form method="POST" action="<?php echo e(route('shelters.store')); ?>" novalidate>
            <?php echo csrf_field(); ?>
            <?php if (isset($component)) { $__componentOriginal0548ba43f53707216cc9dda1f064147a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0548ba43f53707216cc9dda1f064147a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.submit-token','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('submit-token'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0548ba43f53707216cc9dda1f064147a)): ?>
<?php $attributes = $__attributesOriginal0548ba43f53707216cc9dda1f064147a; ?>
<?php unset($__attributesOriginal0548ba43f53707216cc9dda1f064147a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0548ba43f53707216cc9dda1f064147a)): ?>
<?php $component = $__componentOriginal0548ba43f53707216cc9dda1f064147a; ?>
<?php unset($__componentOriginal0548ba43f53707216cc9dda1f064147a); ?>
<?php endif; ?>
            <div class="field <?php $__errorArgs = ['shelter_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <label for="shelter_name">Shelter name</label>
                <input id="shelter_name" name="shelter_name" value="<?php echo e(old('shelter_name')); ?>" required>
                <?php $__errorArgs = ['shelter_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="field <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <label for="address">Address</label>
                <input id="address" name="address" value="<?php echo e(old('address')); ?>" required>
                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button type="submit" class="btn btn-block" data-busy="Saving…">Save shelter</button>
        </form>
    </section>

    <section class="panel">
        <h2>All shelters</h2>
        <?php if($shelters->isEmpty()): ?>
            <p class="empty">No shelters yet. Add one using the form.</p>
        <?php else: ?>
            <div class="table-scroll"><table>
                <thead><tr><th>Name</th><th>Address</th><th>Pets</th></tr></thead>
                <tbody>
                <?php $__currentLoopData = $shelters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shelter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr><td><?php echo e($shelter->shelter_name); ?></td><td><?php echo e($shelter->address); ?></td><td><?php echo e($shelter->pets_count); ?></td></tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table></div>
        <?php endif; ?>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LaravelProjects\Pet-Shelter-Management\resources\views/shelters/index.blade.php ENDPATH**/ ?>