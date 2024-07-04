<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
   <?php $__env->slot('header', null, []); ?> 
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <?php echo e(__('Dashboard')); ?>

      </h2>
   <?php $__env->endSlot(); ?>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                  <div class="min-w-full align-middle">
                      <div class="card text-center">
                          <div class="card-header">
                              <ul class="nav nav-tabs card-header-tabs">
                                  <li class="nav-item">
                                      <a class="nav-link active" href="#">Booking Forms</a>
                                  </li>
                              </ul>
                          </div>
                          <div class="card-body">
                              <form id="addUserForm" method="POST" action="<?php echo e(route('insert.movie', $mid->id)); ?>">
                                  <?php echo csrf_field(); ?>
                                  <div class="form-group row">
                                    <label for="userID" class="col-sm-2 col-form-label">User ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly name="user_id" class="form-control" id="userID" value="<?php echo e($userId); ?>">
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <label for="movieID" class="col-sm-2 col-form-label">Movie ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly name="movie_id" class="form-control" id="movieID" value="<?php echo e($mid->id); ?>">
                                    </div>
                                </div>
                                  <div class="form-group row">
                                      <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                                      <div class="col-sm-10">
                                          <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo e($mid->title); ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="inputQty" class="col-sm-2 col-form-label">Quantity</label>
                                      <div class="col-sm-10">
                                          <input type="number" name="quantity" class="form-control" id="inputQty" placeholder="Enter Amount of Tickets">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="price" class="col-sm-2 col-form-label">Price</label>
                                      <div class="col-sm-10">
                                          <input type="number" readonly name="price" class="form-control" id="price">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="booking_date" class="col-sm-2 col-form-label">Date</label>
                                      <div class="col-sm-10">
                                          <input type="date" name="booking_date" class="form-control datepicker" id="booking_date" value="2024-06-20" min="2024-01-01" max="2044-01-01">
                                      </div>
                                  </div>
                                  <button type="submit" class="btn btn-dark">Process My Order</button>
                              </form>
                          </div>
                      </div>
                  </div>
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
                              window.location.href = "<?php echo e(route('movies.index')); ?>";
                          }
                      });
                  },
                  error: function(xhr) {
                      Swal.fire(
                          'Error!',
                          'There was a problem inserting the user.',
                          'error'
                      );
                      console.log(xhr.responseText);
                  }
              });
          });
      });
  </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Evan\fake3-app\resources\views/movie.blade.php ENDPATH**/ ?>