<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landmark Medicines</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f9f9f9;
        }

        .navbar {
            background-color: #222;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin-left: 15px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .btn-container a button {
            margin-left: 10px;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
            transition: background-color 0.3s;
        }

        .login-btn {
            background-color: #007bff;
            color: white;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .register-btn {
            background-color: #28a745;
            color: white;
        }

        .register-btn:hover {
            background-color: #218838;
        }

        section {
            padding: 40px 20px;
            text-align: center;
        }

        h2 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #333;
        }

        .medicine-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
        }

        a.medicine-link {
            text-decoration: none;
            color: inherit;
        }

        .medicine-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            width: 250px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .medicine-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        .medicine-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
            border: 2px solid #e0e0e0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .medicine-name {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
        }

        .medicine-price {
            font-size: 18px;
            color: #28a745;
            margin-bottom: 8px;
        }

        .medicine-expiry {
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <a href="#">MyMedicine</a>
        </div>
        <div class="btn-container">
            <a href="{{ route('login') }}"><button class="btn login-btn">Login</button></a>
            <a href="{{ route('register') }}"><button class="btn register-btn">Register</button></a>
        </div>
    </nav>

    <section>
        <h2>Landmark Medicines</h2>
        <div class="medicine-gallery">
            @forelse ($medicines as $medicine)
                <a href="{{ route('medicine.show', $medicine->id) }}" class="medicine-link">
                    <div class="medicine-card">
                        <img src="{{ $medicine->image }}" alt="{{ $medicine->name }}">
                        <div class="medicine-name">{{ $medicine->name }}</div>
                        <div class="medicine-price">₹{{ number_format($medicine->price, 2) }}</div>
                        <div class="medicine-expiry">Expires on: {{ \Carbon\Carbon::parse($medicine->expiry_date)->format('d M Y') }}</div>
                    </div>
                </a>
            @empty
                <p>No medicines available.</p>
            @endforelse
        </div>
    </section>

</body>

</html>
