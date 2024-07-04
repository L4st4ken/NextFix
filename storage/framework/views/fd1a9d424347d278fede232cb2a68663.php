
<?php $__env->startSection('title', 'NextFix Users'); ?>
<?php $__env->startSection('content'); ?>
    <h1 class="h3 mb-2 text-gray-800">User Tables</h1>

    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo e(route('user.add')); ?>" class= "btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New User</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1?>
                    <?php $__currentLoopData = $user_fake; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($row->id); ?></td>
                            <td><?php echo e($row->name); ?></td>
                            <td><?php echo e($row->email); ?></td>
                            <td><?php echo e($row->usertype); ?></td>
                            <td><?php echo e($row->age); ?></td>
                            <td><?php echo e($row->address); ?></td>
                            <td><?php echo e($row->country); ?></td>
                            <td><?php echo e($row->phone_number); ?></td>
                            <td>
                                <a href="<?php echo e(route('user.edit', $row->id)); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?php echo e(route('user.delete', $row->id)); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
                    
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evan\fake3-app\resources\views/admin/user/index.blade.php ENDPATH**/ ?>