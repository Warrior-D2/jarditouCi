<?php
// Starts the session
session_start();

// Unset the auth fields
unset($_SESSION["email"]);
unset ($_SESSION['Login']);
unset($_SESSION["role"]);


// If the session uses cookies
if (ini_get("session.use_cookies")) {
    // Forces the cookie expiration date
    setcookie(session_name(), "", time() - 84600);
}

// Destroys what remains of the session
session_destroy();

// Redirects the user to the main page
header('location:jarditou3.php');


?>
