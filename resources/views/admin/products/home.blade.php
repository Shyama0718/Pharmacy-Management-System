<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

  <style>
    @media (max-width: 768px) {
      .table-responsive {
        font-size: 0.9rem;
      }
    }

    .product-img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 8px;
    }

    .action-buttons .btn {
      margin: 2px;
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
          <div class="py-4">
            <h2 class="mb-4">Medicine Table</h2>
            <div class="table-responsive">
              <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Mfg Date</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $index => $product)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($product->mfg_date)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($product->expiry_date)->format('d M Y') }}</td>
                    <td class="text-center">
                      <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-img" />
                    </td>
                    <td class="text-center action-buttons">
                      <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <a href="{{ route('admin.product.delete', $product->id) }}" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this product?')">
                        <i class="fas fa-trash-alt"></i> Delete
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
      @include('components.footer')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="{{ asset('admin/js/scripts.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
  <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
</body>

</html>
