<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navigation.css">
    <script type="text/javascript" src="./app.js" defer></script>
</head>
<body>

    <nav id="sidebar">
        <ul>
            <li>
                <span class="logo">Vulindlela</span>
                <button onclick="toggleSidebar()" id="toggle-btn">
                    <!-- Add icon -->
                </button>
            </li>
            <li class="active">
                <a href="./dashboard.php">
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="./notifications.php">
                    <span>Notifications</span>
                </a>
            </li>

            <li>
                <button onclick="toggleSubMenu(this)" class="dropdown-btn" >
                    <!-- SVG icon here -->
                    <span>Apply for Loan</span>
                    <!-- Dropdown icon here -->
                </button>
                <ul class="sub-menu">
                    <div>
                        <li><a href="#">Short Term Loan</a></li>
                        <li><a href="#">Emergency Loan</a></li>
                        <li><a href="#">Long Term Loan</a></li>
                    </div>
       
                </ul>
            </li>

            <li>
                <a href="./settings.php">
                    <span>Settings</span>
                </a>
            </li>

            <li>
                <a href="./profile.php">
                    <span>Profile</span>
                </a>
            </li>
        </ul>
        <!-- simple icons.io  -->
    </nav>
    <main>
        <div class="container">
            <h2>Hello World</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, enim.</p>
        </div>
        <div class="container">
            <h2>Hello World</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, enim.</p>
        </div>
        <div class="container">
            <h2>Hello World</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, enim.</p>
        </div>

        <div class="container">
            <h2>Hello World</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, enim.</p>
        </div>

        <div class="container">
            <h2>Hello World</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, enim.</p>
        </div>

        <div class="container">
            <h2>Hello World</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, enim.</p>
        </div>

        <div class="container">
            <h2>Hello World</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, enim.</p>
        </div>
    </main>

    
</body>
</html>