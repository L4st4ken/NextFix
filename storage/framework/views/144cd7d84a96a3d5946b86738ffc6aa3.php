
<?php $__env->startSection('title', 'Tickets'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="h3 mb-2 text-gray-800">Ticket Tables</h1>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <a class="btn btn-primary" href="<?php echo e(route('ticket.add')); ?>"><i class="fa fa-plus"></i> Add Ticket</a>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Booking ID</th>
                    <th>Seat Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1?>
                <?php $__currentLoopData = $ticket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($no++); ?></td>
                        <td><?php echo e($ticket->booking_id); ?></td>
                        <td><?php echo e($ticket->seat_number); ?></td>
                        <td>
                            <a href="<?php echo e(route('ticket.edit', $ticket->id)); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?php echo e(route('ticket.delete', $ticket->id)); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evan\fake3-app\resources\views//admin/ticket/index.blade.php ENDPATH**/ ?>