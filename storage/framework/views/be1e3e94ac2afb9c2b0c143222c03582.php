<?php $__env->startSection('title', 'Adoption events · Animal Shelter'); ?>
<?php $__env->startSection('heading', 'Adoption events'); ?>
<?php $__env->startSection('lead', 'Plan events and choose which pets attend.'); ?>

<?php $__env->startSection('content'); ?>
<div class="split">
    <div>
        <section class="panel">
            <h2>New event</h2>
            <form method="POST" action="<?php echo e(route('events.store')); ?>" novalidate>
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
                <div class="field <?php $__errorArgs = ['event_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <label for="event_name">Event name</label>
                    <input id="event_name" name="event_name" value="<?php echo e(old('event_name')); ?>" required>
                    <?php $__errorArgs = ['event_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="field <?php $__errorArgs = ['event_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <label for="event_date">Date</label>
                    <input id="event_date" type="date" name="event_date" value="<?php echo e(old('event_date')); ?>" required>
                    <?php $__errorArgs = ['event_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="field <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <label for="location">Location</label>
                    <input id="location" name="location" value="<?php echo e(old('location')); ?>" required>
                    <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit" class="btn btn-block" data-busy="Saving…">Save event</button>
            </form>
        </section>

        <section class="panel">
            <h2>Add a pet to an event</h2>
            <?php if($events->isEmpty() || $pets->isEmpty()): ?>
                <p class="empty">You need at least one event and one pet that is not yet adopted.</p>
            <?php else: ?>
            <form method="POST" action="<?php echo e(route('events.attach')); ?>" novalidate>
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
                <div class="field <?php $__errorArgs = ['adoption_event_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <label for="adoption_event_id">Event</label>
                    <select id="adoption_event_id" name="adoption_event_id" required>
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($event->id); ?>"><?php echo e($event->event_name); ?> (<?php echo e($event->event_date->format('M j')); ?>)</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['adoption_event_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="field <?php $__errorArgs = ['pet_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <label for="pet_id">Pet</label>
                    <select id="pet_id" name="pet_id" required>
                        <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($pet->id); ?>"><?php echo e($pet->name); ?> (<?php echo e($pet->species); ?>)</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['pet_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit" class="btn btn-block btn-ghost" data-busy="Adding…">Add pet</button>
            </form>
            <?php endif; ?>
        </section>
    </div>

    <section class="panel">
        <h2>All events</h2>
        <?php if($events->isEmpty()): ?>
            <p class="empty">No events yet. Create one using the form.</p>
        <?php else: ?>
            <div class="table-scroll"><table>
                <thead><tr><th>Event</th><th>Date</th><th>Location</th><th>Pets attending</th></tr></thead>
                <tbody>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($event->event_name); ?></td>
                        <td><?php echo e($event->event_date->format('M j, Y')); ?></td>
                        <td><?php echo e($event->location); ?></td>
                        <td><?php echo e($event->pets->isEmpty() ? 'None yet' : $event->pets->pluck('name')->join(', ')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table></div>
        <?php endif; ?>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LaravelProjects\Pet-Shelter-Management\resources\views/events/index.blade.php ENDPATH**/ ?>