<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    .form-section {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      padding: 2.5rem;
      max-width: 900px;
      margin: 0 auto;
    }

    .form-section h2 {
      font-size: 1.875rem;
      font-weight: 600;
      margin-bottom: 2rem;
      color: #343a40;
    }

    .form-label {
      font-weight: 500;
      color: #495057;
    }

    .btn-primary {
      padding: 0.5rem 2rem;
      font-weight: 500;
      border-radius: 0.5rem;
    }

    .form-control {
      border-radius: 0.375rem;
    }

    body {
      background-color: #f1f3f5;
    }

    .text-end {
      text-align: right;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  @include('components.navbar')

  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      @include('components.sidebar')
    </div>

    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <div class="mt-4">
            <div class="form-section">
              <h2><i class="fas fa-pills me-2"></i>Add New Medicine</h2>
              <div class="progress mb-4">
                <div id="formProgressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuemin="0"
                  aria-valuemax="100">0%</div>
              </div>

              <form method="POST" action="{{ route('medicine.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" required />
                  </div>

                  <div class="col-md-6">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" required />
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="category_id" required>
                      <option value="">Select Category</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" required />
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label for="mfg_date" class="form-label">Mfg Date</label>
                    <input type="date" name="mfg_date" id="mfg_date" class="form-control" required />
                  </div>

                  <div class="col-md-6">
                    <label for="expiry_date" class="form-label">Expiry Date</label>
                    <input type="date" name="expiry_date" id="expiry_date" class="form-control" required />
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" id="city" class="form-control" required />
                  </div>

                  <div class="col-md-6">
                    <label for="pincode" class="form-label">Pincode</label>
                    <input type="text" name="pincode" id="pincode" class="form-control" pattern="\d{6}" required
                      title="Enter a 6-digit pincode" />
                  </div>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-1"></i> Add Medicine
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>

      @include('components.footer')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('admin/js/scripts.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  {{-- <script>
    function updateProgressBar() {
    const fields = [
      '#product_name',
      '#price',
      '#category',
      '#image',
      '#mfg_date',
      '#expiry_date',
      '#city',
      '#pincode'
    ];

    let filled = 0;

    fields.forEach(selector => {
      const el = $(selector);
      if (el.length > 0) {
        if ((el.is('input') || el.is('select')) && el.val().trim() !== '') {
          filled++;
        }
      }
    });

    const total = fields.length;
    const percent = Math.round((filled / total) * 100);

    $('#formProgressBar')
      .css('width', percent + '%')
      .attr('aria-valuenow', percent)
      .text(percent + '%');
  }
    $(document).ready(function () {
      $.ajax({
        url: "{{ route('get.categories') }}",
        type: "GET",
        dataType: "json",
        success: function (data) {
          let categoryDropdown = $('#category');
          categoryDropdown.empty().append('<option value="">Select Category</option>');
          $.each(data, function (key, value) {
            categoryDropdown.append('<option value="' + value.id + '">' + value.name + '</option>');
          });
        },
        error: function () {
          alert('Failed to fetch categories.');
        }
      });
    });
  </script> --}}
  <script>
    function updateProgressBar() {
      const fields = [
        '#product_name',
        '#price',
        '#category',
        '#image',
        '#mfg_date',
        '#expiry_date',
        '#city',
        '#pincode'
      ];
  
      let filled = 0;
  
      fields.forEach(selector => {
        const el = $(selector);
        if (el.length > 0) {
          if ((el.is('input') || el.is('select')) && el.val().trim() !== '') {
            filled++;
          }
        }
      });
  
      const total = fields.length;
      const percent = Math.round((filled / total) * 100);
  
      $('#formProgressBar')
        .css('width', percent + '%')
        .attr('aria-valuenow', percent)
        .text(percent + '%');
    }
  
    $(document).ready(function () {
      // Load categories and then attach event listeners
      $.ajax({
        url: "{{ route('get.categories') }}",
        type: "GET",
        dataType: "json",
        success: function (data) {
          let categoryDropdown = $('#category');
          categoryDropdown.empty().append('<option value="">Select Category</option>');
          $.each(data, function (key, value) {
            categoryDropdown.append('<option value="' + value.id + '">' + value.name + '</option>');
          });
        },
        error: function () {
          alert('Failed to fetch categories.');
        }
      });
  
      // Attach input listeners
      $('#product_name, #price, #category, #image, #mfg_date, #expiry_date, #city, #pincode').on('input change', updateProgressBar);
    });
  </script>
  

</body>

</html>
