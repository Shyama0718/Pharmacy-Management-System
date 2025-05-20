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
    body {
      background-color: #f0f2f5;
    }

    .card {
      background: #ffffff;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1.25rem rgba(0, 0, 0, 0.1);
      padding: 2rem;
    }

    .form-label {
      font-weight: 600;
      color: #333;
    }

    .form-control,
    .form-select {
      border-radius: 0.5rem;
      transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .btn-primary {
      padding: 0.5rem 2rem;
      font-weight: 600;
      border-radius: 0.5rem;
    }

    .btn-secondary {
      padding: 0.5rem 2rem;
      border-radius: 0.5rem;
      margin-left: 0.5rem;
    }

    .card h2 {
      font-size: 1.75rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #0d6efd;
    }

    .img-thumbnail {
      border-radius: 0.5rem;
      max-height: 140px;
    }

    .text-end {
      margin-top: 2rem;
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
        <div class="container mt-4 mb-5">
          <div class="card">
            <h2><i class="fas fa-edit me-2"></i>Edit Medicine</h2>

            <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
              enctype="multipart/form-data">
              @csrf

              <div class="row g-4">
                <div class="col-md-6">
                  <label for="product_name" class="form-label">Product Name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name"
                    value="{{ old('product_name', $product->name) }}" required>
                </div>

                <div class="col-md-6">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" step="0.01" class="form-control" id="price" name="price"
                    value="{{ old('price', $product->price) }}" required>
                </div>

                {{-- <div class="col-md-6">
                  <label for="category" class="form-label">Category</label>
                  <select class="form-select" id="category" name="category" required>
                    <option value="" disabled>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category', $product->category_id) == $category->id ?
                      'selected' : '' }}>
                      {{ $category->name }}
                    </option>
                    @endforeach
                  </select>
                </div> --}}
                <div class="col-md-6">
                  <label for="category_id" class="form-label">Category</label>
                  <select class="form-select" id="category_id" name="category_id" required>
                    <option value="" disabled>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ?
                      'selected' : '' }}>
                      {{ $category->name }}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="mfg_date" class="form-label">Manufacturing Date</label>
                  <input type="date" class="form-control" id="mfg_date" name="mfg_date"
                    value="{{ old('mfg_date', $product->mfg_date) }}" required>
                </div>

                <div class="col-md-6">
                  <label for="expiry_date" class="form-label">Expiry Date</label>
                  <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                    value="{{ old('expiry_date', $product->expiry_date) }}" required>
                </div>

                <div class="col-md-6">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" id="city" name="city"
                    value="{{ old('city', $product->city) }}" required>
                </div>

                <div class="col-md-6">
                  <label for="pincode" class="form-label">Pincode</label>
                  <input type="text" class="form-control" id="pincode" name="pincode"
                    value="{{ old('pincode', $product->pincode) }}" required>
                </div>

                <div class="col-md-12">
                  <label for="image" class="form-label">Product Image</label>
                  <input type="file" class="form-control" id="image" name="image">
                  @if ($product->image)
                  <div class="mt-3">
                    <img src="{{ $product->image }}" alt="Product Image" class="img-thumbnail">
                  </div>
                  @endif
                </div>
              </div>

              <div class="text-end">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save me-2"></i>Update
                </button>
                <a href="{{ route('admin.product') }}" class="btn btn-secondary">
                  <i class="fas fa-arrow-left me-2"></i>Back
                </a>
              </div>
            </form>
          </div>
        </div>
      </main>
      @include('components.footer')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="{{ asset('admin/js/scripts.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
  <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
</body>

</html>