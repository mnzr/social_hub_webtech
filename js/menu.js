function menu(validity) {
    //alert(validity);
    html = ""
    if(validity == 1) {
        html = '<li><a href="logout.php">Logout</a></li>';
    } else {
        html = '<li><a href="login.php">Login</a></li><li><a href="signup.php">Sign Up</a></li>';
    }
    return html;
}
