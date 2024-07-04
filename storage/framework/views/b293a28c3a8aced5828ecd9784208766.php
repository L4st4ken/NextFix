
<?php $__env->startSection('title', 'Delete Booking'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Delete Booking Form</h6>
            </div>
            
            <div class="card-body">
                <form id="addUserForm" method="POST" action="<?php echo e(route('booking.destroy', $booking->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <div class="form-group row">
                      <label for="userID" class="col-sm-2 col-form-label">User ID</label>
                      <div class="col-sm-10">
                          <input type="text"  readonly name="user_id" class="form-control" id="userID" value="<?php echo e($booking->user_id); ?>">
                      </div>
                  </div>
                    <div class="form-group row">
                      <label for="movieID" class="col-sm-2 col-form-label">Movie ID</label>
                      <div class="col-sm-10">
                          <input type="text"  readonly name="movie_id" class="form-control" id="movieID" value="<?php echo e($booking->movie_id); ?>">
                      </div>
                  </div>
                    
                    <div class="form-group row">
                        <label for="inputQty" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" readonly name="quantity" class="form-control" id="inputQty" value="<?php echo e($booking->quantity); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" readonly name="price" class="form-control" id="price" value="<?php echo e($booking->price); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="booking_date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" readonly name="booking_date" class="form-control datepicker" id="booking_date" value="<?php echo e($booking->booking_date); ?>" min="2024-01-01" max="2044-01-01">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-save"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('inputQty').addEventListener('input', function() {
        var qty = document.getElementById('inputQty').value;
        var price = (qty * 35).toFixed(3);
        document.getElementById('price').value = price;
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        'There was a problem updating the booking table.',
                        'error'
                    );
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evan\fake3-app\resources\views/admin/booking/delete.blade.php ENDPATH**/ ?>