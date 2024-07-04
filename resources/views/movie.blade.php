<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

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
                              <form id="addUserForm" method="POST" action="{{ route('insert.movie', $mid->id) }}">
                                  @csrf
                                  <div class="form-group row">
                                    <label for="userID" class="col-sm-2 col-form-label">User ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly name="user_id" class="form-control" id="userID" value="{{ $userId }}">
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <label for="movieID" class="col-sm-2 col-form-label">Movie ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly name="movie_id" class="form-control" id="movieID" value="{{ $mid->id }}">
                                    </div>
                                </div>
                                  <div class="form-group row">
                                      <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                                      <div class="col-sm-10">
                                          <input type="text" readonly class="form-control" id="staticEmail" value="{{ $mid->title }}">
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
                              window.location.href = "{{ route('movies.index') }}";
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
</x-app-layout>
