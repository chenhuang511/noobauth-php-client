<?php
session_start();
echo '<html lang="en">
<head>
    <title>NoobAuth - PHP client</title>
</head>
<body>';

if (isset($_SESSION['loginUser'])) {
    echo "Hello " . $_SESSION['loginUser'];
    echo "<br>";
    echo "<a href='logout.php'>Logout</a>";
    echo "<br>";
    echo "<a href='logout-idp.php'>Logout all devices</a>";
} else {
    echo '<div>
        <a href="/login.php">Login</a>
    </div>';
}

echo '</body></html>';
exit();