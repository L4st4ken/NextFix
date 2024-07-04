
<?php $__env->startSection('title', 'Bookings'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="h3 mb-2 text-gray-800">Booking Tables</h1>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <a href="<?php echo e(route('booking.add')); ?>" class= "btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New User</a>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Movie ID</th>
                    <th>Quantity</th>
                    <th>Booking Date</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1?>
                <?php $__currentLoopData = $booking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($no++); ?></td>
                        <td><?php echo e($row->id); ?></td>
                        <td><?php echo e($row->user_id); ?></td>
                        <td><?php echo e($row->movie_id); ?></td>
                        <td><?php echo e($row->quantity); ?></td>
                        <td><?php echo e($row->booking_date); ?></td>
                        <td><?php echo e($row->price); ?></td>
                        <td>
                            <a href="<?php echo e(route('booking.edit', $row->id)); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?php echo e(route('booking.delete', $row->id)); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evan\fake3-app\resources\views/admin/booking/index.blade.php ENDPATH**/ ?>