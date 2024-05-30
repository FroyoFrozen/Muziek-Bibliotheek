<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - 404</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F3F4F6;
            color: #007bb5;
            text-align: center;
            padding: 50px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            padding: 80px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .vinyl {
            margin-bottom: 20px;
            position: relative;
        }
        .vinyl img {
            width: 200px;
            height: 200px;
            animation: spin 4s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        h1 {
            font-size: 3em;
            margin: 0.2em 0;
        }
        p {
            margin: 0.5em 0;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 5px;
            color: #fff;
            background-color: #007bb5;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #005f8a;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="vinyl">
        <img src="/images/Vinyl.png" alt="Vinyl Record">
    </div>
    <h1>404</h1>
    <h2>Page not found</h2>
    <p>This page is not in your collection</p>
    <div>
        <a href="{{ route('dashboard') }}" class="button">Go to Dashboard</a>
    </div>
</div>
</body>
</html>
