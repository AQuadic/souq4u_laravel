<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting...</title>
    <meta http-equiv="refresh" content="3;url={{config('app.url').'/admin' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f8fafc;
            color: #1a202c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            flex-direction: column;
            text-align: center;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1rem;
            color: #4a5568;
        }

        .spinner {
            margin-top: 2rem;
            border: 4px solid #e2e8f0;
            border-top: 4px solid #3182ce;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
<img alt="Logo" src="{{ asset('logo.png') }}" style="max-width: 20%"/>
<h1>Hello {{ request()->input('email', 'User') }}, welcome to {{ config('app.name') }} Redirection Page</h1>
<p>If you are not redirected automatically, <a href="{{config('app.url') }}">click here</a>.</p>
<p>Or if you want the Admin, <a href="{{config('app.url').'/admin'}}">click here</a>.</p>
<div class="spinner"></div>
</body>
</html>
