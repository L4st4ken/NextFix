
<?php $__env->startSection('title', 'Delete User'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="h3 mb-2 text-gray-800">Delete User</h1>

<?php if(session('message')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo e(session('message')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Delete User Form</h6>
            </div>
            <div class="card-body">
                <form id="deleteUserForm" action="<?php echo e(route('user.destroy', $user->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo e($user->email); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" value="<?php echo e($user->password); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" class="form-control" value="<?php echo e($user->age); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="<?php echo e($user->address); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" value="<?php echo e($user->country); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" value="<?php echo e($user->phone_number); ?>" disabled>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm" id="deleteButton"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#deleteButton').on('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteUserForm').submit();
                }
            });
        });

        $('#deleteUserForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        'User has been deleted.',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?php echo e(route('user')); ?>";
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire(
                        'Error!',
                        'There was a problem deleting the user.',
                        'error'
                    );
                    console.log('Error status: ' + xhr.status);
                    console.log('Error response text: ' + xhr.responseText);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evan\fake3-app\resources\views/admin/user/delete.blade.php ENDPATH**/ ?>