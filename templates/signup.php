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
            <h4 class="wrap" >Hi there!</h4>
            <h4 class="wrap">
                Create an account to access all of our features and
                services.
            </h4>
        </div>
    </br>
        <form class="login-form" method="POST" action="<?php echo esc_url( rest_url( 'custom/v1/signup' ) ); ?>" style="margin-left: 5%; align-items: center">
            <label class="width-100" for="username">
                <input class="form-group" type="text" name="username" placeholder="Username" required="" width=""/>
            </label>
            <label class="width-100" for="email">
            <input class="form-group" type="email" name="email" placeholder="Email" required=""/>
            </label>
            <label class="width-100" for="password">
            <input class="form-group"
                    type="password"
                    name="password"
                    placeholder="Password"
                    required=""
            />
            </label>
            <label class="width-100" for="password_2">
            <input class="form-group"
                    type="password"
                    name="password_2"
                    placeholder="Confirm Password"
                    required=""
            />
            </label>
            <!-- add checkbox for terms and conditions -->
            <label class="width-100" for="checkbox">
            <p>I agree to the Terms of Service and Privacy Policy</p>
            <input class="form-group"
                    type="checkbox"
                    name="terms"
                    placeholder="agree to terms and conditions"
                    required=""
            />
            </label>
            <button id="custom-button" type="submit">Sign up</button>
                <p>Already have an account? <a href="admin.php?page=custom_login">Login</a></p>
        </form>

    </div>
</div>
</body>
</html>
<?php
// on submit send to the controller and redirect to the dashboard
if (isset($_POST['txt'])) {
    $this->controller->signup($_POST['txt'], $_POST['email'], $_POST['pswd'], $_POST['pswd2'], $_POST['terms']);
    wp_redirect(admin_url('admin.php?page=custom_plugin'));
    exit;
}

?>
<!--if (isset($_POST['txt'])) {
    $username = $_POST['txt'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $password2 = $_POST['pswd2'];
    if ($password == $password2) {
        $user_id = wp_create_user($username, $password, $email);
        if (is_wp_error($user_id)) { 
            echo "Error creating new user: " . $user_id->get_error_message();
        } else {
            wp_redirect(admin_url('admin.php?page=custom_plugin'));
        }

    }
}
?>

-->
