<!DOCTYPE HTML>
<html>
<head>
    <title>Slide Navbar</title>
    <link href="<?php echo $this->plugin_url . 'assets/mystyle.css'; ?>" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Raleway&display=swap"
            rel="stylesheet"
    />
</head>
<body>

<div class=" grid-view">

    <div class="side-text grid-item">
        <div class="Contact-Header">
            <div class=" Contact-Header-Text">
                <h1 style="color: #fff;">CONTACT US</h1>
                <p>
                    We are here to help you.
                </p>
                <style>
                    .Contact-Header {
                        text-align: center;
                        background-image: url("<?php echo $this->plugin_url . 'assets/images/Contact-us.svg'; ?>");
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position: center;
                        width: 100%;
                        padding: 30px;
                        color: #fff;
                    }

                </style>
            </div>
        </div>
        <hr>

        <p>
            How can we help you?
            If you're having trouble or need assistance accessing any custom services, please reach out to us on any of the contact information shared below.
        </p>
        <p>
            You can also send us a message directly. One of our service agents will reach out to you as soon as possible to attend to your needs. Thanks for using custom.com Privacy, security, and online safety is part of our policy. If you know of a safety or abuse issue affecting our product, services, and platform.
        </p>
        <p
            We'd like to hear about it right away. Please use the below options to reach out to us.
        </p>


    </div>
    <div class=" grid-item contact-form">
        <img  src="<?php echo $this->plugin_url . 'assets/images/contact-us.gif'; ?>" alt="Contact Us" width="60%"height="50%" />
        <div class="contact-form">
            <h1 class="color-white">Or send us a Plugin-Related Message:</h1>
            <form class="contact-form" action="<?php echo $this->plugin_url.'templates/admin-post.php' ; ?>" method="post">
                <input class="form-group" type="hidden" name="action" value="contact_form">
                <input class="form-group" type="text" name="name" placeholder="Name" required="" />
                <input class="form-group" type="email" name="email" placeholder="Email" required="" />
                <input class="form-group" type="text" name="subject" placeholder="Subject" required="" />
                <textarea class="form-group" name="message" placeholder="Message" required=""></textarea>
                <button type="submit"  value="Send">Send</button>
            </form>
        </div>
    </div>

</div>
</body>
</html>