<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serverfout - 500</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F3F4F6;
            color: #007bb5;
            text-align: center;
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
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
            margin: 10px 0;
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
        <img src="/images/broken-vinyl.png" alt="Broken Vinyl Record">
    </div>
    <h1>500</h1>
    <h2>Server Error</h2>
    <p>Oops! Something seems to have gone wrong on our server.</p>
    <div>
        <a href="javascript:history.back()" class="button">Go Back</a>
        <a href="{{ route('dashboard') }}" class="button">Dashboard</a>
    </div>
</div>
</body>
</html>
