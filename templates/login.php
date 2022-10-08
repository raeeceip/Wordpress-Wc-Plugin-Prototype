<!DOCTYPE HTML>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>
        custom
    </title>

    <link href="<?php echo $this->plugin_url . 'assets/mystyle.css'; ?>" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Raleway&display=swap"
            rel="stylesheet"
    />
</head>
<body>
<div class="grid-view">
    <div class="side-text grid-item">
        <div class="Contact-Header">
            <div class=" Contact-Header-Text">
                <style>
                    .Contact-Header {
                        text-align: center;
                        background-image: url("<?php echo $this->plugin_url . 'assets/images/mellow-electric-station.svg'; ?>");
                        background-repeat: no-repeat;
                        background-size: contain;
                        background-position: center;
                        width: 100%;
                        height: 100%;
                        padding-top: 20%;
                        color: #fff;
                    }

                </style>
            </div>
        </div>
    </div>
    <div class=" grid-item ">
        <img src="<?php echo $this->plugin_url . 'assets/images/logo.png'; ?>" width="35%" alt="custom"/>
        <div style="text-align: center; font-size: 1rem">
            <h4 class="wrap" >Welcome Back!</h4>
            <h4 class="wrap">
                Login with your Email/Business Account details to continue.
            </h4>
        </div>
    </br>
        <form class="login-form" method="GET" action="<?php echo esc_url( rest_url( 'custom/v1/login' ) ); ?>"style="margin-left: 5%; align-items: center">
            <label class="width-100" for="email">
            <input class="form-group" type="email" name="email" placeholder="Email/Business Account ID" required=""/>
            </label>
            <label class="width-100" for="password">
            <input class="form-group"
                    type="password"
                    name="pswd"
                    placeholder="Password"
                    required=""
            />
            </label>
            <button type="submit">Login</button>
        </form>
    </div>
</div>
</body>
</html>

<?php
// on submit compare the password and email with the database
if (isset($_POST['email']) && isset($_POST['pswd'])) {
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];
    $sql = "SELECT * FROM wp_users WHERE user_email = '$email' AND user_pass = '$pswd'";
    $result = $wpdb->get_results($sql);
    if ($result) {
        echo "Login Successful";
        wp_redirect(admin_url('admin.php?page=custom_plugin'));
    } else {
        echo "Login Failed";
    }
}


?>
