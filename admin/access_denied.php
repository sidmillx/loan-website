<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #cc0000;
            --background-color: #f0f5fa;
            --text-color: #333333;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: var(--text-color);
        }
        .container {
            background-color: white;
            padding: 3rem;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 51, 102, 0.1);
            text-align: center;
            max-width: 450px;
            width: 90%;
            border-top: 5px solid var(--primary-color);
        }
        .icon {
            font-size: 4rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }
        h1 {
            color: var(--primary-color);
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }
        p {
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        .btn {
            background-color: var(--primary-color);
            color: white;
            padding: 0.8rem 1.5rem;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }
        .btn:hover {
            background-color: #004080;
            transform: translateY(-2px);
        }
        .btn:active {
            transform: translateY(0);
        }
        .error-code {
            font-size: 1.2rem;
            color: var(--secondary-color);
            margin-top: 1rem;
            font-weight: bold;
        }
        @media (max-width: 480px) {
            .container {
                padding: 2rem;
            }
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">&#128274;</div>
        <h1>Access Denied</h1>
        <p>We're sorry, but you don't have permission to access this page. If you believe this is an error, please contact your system administrator.</p>
        <a href="./login.php" class="btn">Back to Login</a>
        <div class="error-code">Error 403</div>
    </div>
</body>
</html>