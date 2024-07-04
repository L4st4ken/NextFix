
<?php $__env->startSection('title', 'Delete Tickets'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="h3 mb-2 text-gray-800">Delete Ticket</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Delete Ticket Form</h6>
            </div>
            
            <div class="card-body">
                <form id="addUserForm" action="<?php echo e(route('ticket.destroy', $ticket->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
<?php echo method_field('DELETE'); ?>
                    <div class="form-group">
                        <label>Booking ID</label>
                        <input type="text" readonly name="booking_id" class="form-control" value="<?php echo e($ticket->booking_id); ?>">
                        <?php $__errorArgs = ['booking_id'];
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
                        <label>Seat Number</label>
                        <input type="text" readonly name="seat_number" class="form-control" value="<?php echo e($ticket->seat_number); ?>">
                        <?php $__errorArgs = ['seat_number'];
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
                    <button type="submit" class="btn btn-danger btn-sm" onclick="contoh()"><i class="fas fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
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
                        text: 'Data successfully deleted',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?php echo e(route('ticket')); ?>";
                        }
                    });
                },
                error: function(xhr) {
                Swal.fire(
                    'Error!',
                    'There was a problem updating the user.',
                    'error'
                );
                console.log(xhr.responseText);
            }
            });
        });
    });
</script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evan\fake3-app\resources\views//admin/ticket/delete.blade.php ENDPATH**/ ?>