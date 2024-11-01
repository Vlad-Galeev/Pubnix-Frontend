<?php
// check cookies
if (!isset($_COOKIE['username'])) {
    // if not logged in
    // login logic
    echo "hehe";
//    header("Location: login.php");
} else {
    // if logged in
    // account exists
    ?>
        <hr>
    <p>Username is <code><?php echo $_COOKIE['username']; ?></code></p>
    <p id="conn_string">Connection command: <code>ssh <?php echo $_COOKIE['username']; ?>@pubnix.engsoc.net</code> <button onclick="myFunction()">Copy</button></p>
        <button>Reset Password</button>
    <?php
    // account doesnt exist
    ?>
        <hr>
        <p id="conn_string">Connection command: <code>ssh USERNAME@pubnix.engsoc.net</code></p>
        <button>Create Account</button>
    <?php
    // account banned
    ?>
        <hr>
    <h1 style="text-align: center;color: darkred">Account banned</h1>
    <?php
}


?>
