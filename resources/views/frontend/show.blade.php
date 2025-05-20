<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $medicine->name }} | MyMedicine</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
        }

        .navbar {
            background-color: #222;
            color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 40px;
        }

        .left-column {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .right-column {
            flex: 2;
            display: flex;
            flex-direction: column;
        }

        .medicine-img {
            width: 100%;
            max-width: 300px;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #ccc;
        }

        .medicine-name {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .medicine-price {
            font-size: 24px;
            color: #28a745;
            margin-bottom: 15px;
        }

        .medicine-expiry, .medicine-category, .medicine-stock {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .medicine-description {
            font-size: 16px;
            line-height: 1.6;
            color: #444;
            margin-top: 20px;
        }

        .add-cart-btn {
            padding: 12px 25px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            width: fit-content;
        }

        .add-cart-btn:hover {
            background-color: #0056b3;
        }

        .out-of-stock {
            color: red;
            font-weight: bold;
        }

        .back-link {
            display: block;
            margin: 30px auto 0;
            text-align: center;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div><a href="{{ url('/') }}">MyMedicine</a></div>
    </nav>

    <div class="container">
        <div class="left-column">
            <img class="medicine-img" src="{{ $medicine->image }}" alt="{{ $medicine->name }}">
        </div>
        <div class="right-column">
            <div class="medicine-name">{{ $medicine->name }}</div>
            <div class="medicine-price">Price: ₹{{ number_format($medicine->price, 2) }}</div>
            <div class="medicine-expiry">Expires on: {{ \Carbon\Carbon::parse($medicine->expiry_date)->format('d M Y') }}</div>

            @if($medicine->category)
                <div class="medicine-category">Category: {{ $medicine->category->name }}</div>
            @endif

            @if($medicine->stock > 0)
                <div class="medicine-stock">In Stock: {{ $medicine->stock }} units</div>
                <form method="POST" action="{{ route('cart.add', $medicine->id) }}">
                    @csrf
                    <button type="submit" class="add-cart-btn">Add to Cart</button>
                </form>
            @else
                <div class="medicine-stock out-of-stock">Out of Stock</div>
            @endif

            <div class="medicine-description">
                <h3>Description</h3>
                <p>{{ $medicine->description ?? 'No description available.' }}</p>
            </div>
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="back-link">← Back to Medicines</a>

</body>
</html>
