<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Under Maintenance - Florenoria</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    
    <!-- Inline minimal styling to ensure it looks good even without external assets -->
    <style>
        :root {
            --bg-color: #fdfbf7;
            --text-main: #5e4033;
            --text-muted: #8b5e3c;
            --accent: #dfa878;
        }
        
        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        
        .container {
            max-width: 600px;
            padding: 2rem;
        }
        
        h1 {
            font-family: 'Lora', serif;
            font-size: 3rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        p {
            font-size: 1.125rem;
            line-height: 1.6;
            color: var(--text-muted);
            margin-bottom: 2rem;
        }
        
        .icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
        }
        
        .cookie-spin {
            animation: spin 10s linear infinite;
            display: inline-block;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <span class="cookie-spin">🍪</span>
        </div>
        <h1>We'll be right back!</h1>
        <p>
            We're currently baking something special (updating the site).<br>
            Please check back in a few minutes.
        </p>
        <p style="font-size: 0.9rem; opacity: 0.8;">
            &mdash; The Florenoria Team
        </p>
    </div>
</body>
</html>
