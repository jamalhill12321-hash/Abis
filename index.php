<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your IP Address</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
            color: #333;
        }
        .container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #007bff;
        }
        .ip-address {
            font-size: 1.8em;
            font-weight: bold;
            color: #d9534f;
            word-break: break-all;
        }
        .details {
            margin-top: 20px;
            font-size: 1em;
            color: #555;
            text-align: left;
            display: inline-block;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Your IP Address is:</h1>
        <p class="ip-address">
            <?php
                // This function checks for various headers to find the 'real' IP,
                // especially if the user is behind a proxy or a load balancer.
                if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
                } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    // This can contain a list of IPs. We take the first one.
                    $ip_address = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
                } else {
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                }
                echo htmlspecialchars($ip_address);
            ?>
        </p>
        <div class="details">
            <p><strong>Remote Addr:</strong> <?php echo htmlspecialchars($_SERVER['REMOTE_ADDR']); ?></p>
            <p><strong>Client IP:</strong> <?php echo htmlspecialchars($_SERVER['HTTP_CLIENT_IP'] ?? 'Not Set'); ?></p>
            <p><strong>Forwarded For:</strong> <?php echo htmlspecialchars($_SERVER['HTTP_X_FORWARDED_FOR'] ?? 'Not Set'); ?></p>
        </div>
    </div>

</body>
</html>
