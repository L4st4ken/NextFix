
<?php $__env->startSection('title', 'Insert Bookings'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="h3 mb-2 text-gray-800">Add Booking</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Add Booking Form</h6>
            </div>
            
            <div class="card-body">
                <form id="addUserForm" action="<?php echo e(route('booking.add.insert')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>User ID</label>
                        <input type="text" name="user_id" class="form-control">
                        <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>                                
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label>Movie ID</label>
                        <input type="text" name="movie_id" class="form-control">
                        <?php $__errorArgs = ['movie_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>                                
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="inputQty">
                        <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>                                
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label>Booking Date</label>
                        <input type="date" name="booking_date" class="form-control">
                        <?php $__errorArgs = ['booking_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>                                
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" id="price" readonly>
                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php echo e($message); ?>                                
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" onclick="contoh()"><i class="fas fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('inputQty').addEventListener('input', function(){
        var qty = document.getElementById('inputQty').value;
        var price = (qty * 35).toFixed(3);
        document.getElementById('price').value = price;
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#addUserForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Data successfully added',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?php echo e(route('booking')); ?>";
                        }
                    });
                },
                error: function(xhr) {
                Swal.fire(
                    'Error!',
                    'There was a problem deleting the user.',
                    'error'
                );
                console.log(xhr.responseText);
            }
            });
        });
    });
</script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evan\fake3-app\resources\views/admin/booking/insert.blade.php ENDPATH**/ ?>