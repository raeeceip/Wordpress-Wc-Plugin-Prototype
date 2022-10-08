<!DOCTYPE HTML>
<html>
<head>
    <title>
        custom
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Raleway&display=swap"
            rel="stylesheet"
    />
</head>
<body>

<div class="wrap font-raleway">
    <img src="<?php echo $this->plugin_url . 'assets/images/logo.png'; ?>" alt="custom" width="10%" style="vertical-align:center;"/>
	<?php settings_errors(); ?>
	<ul class="nav nav-tabs">
		<li class="active">
            <a href="#tab-1">Your Dashboard
            </a>

        </li>
        <li><a href="#tab-2">Manage Settings</a></li>
	</ul>
	<div class="tab-content">
        <style>
            #tab-1{
                padding: 10px;
                background-repeat: no-repeat;
                background-size: contain;
                width: 100%
            }
        </style>
		<div id="tab-1" class="tab-pane active">
            <!-- show this popup if user is not logged in -->
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">You are not logged in!</h4>
                    <p>Please login to your custom account to manage your products.</p>
                    <hr>
                    <p class="mb-0">If you don't have an account, please <a href="admin.php?page=custom_signup">register</a> first.</p>
                </div>
            <div class="container">
                <h1 class="font-raleway color-white">Account Details</h1>
                <hr class="color-white">
             <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="color-white font-raleway">
                            Business Account 30203334
                        </h2>
                    </div>
                </div> 
                <table class="cpt-table fixed striped posts">
                    <thead>
                        <tr>
                            <th class="manage-column">Store  ID</th>
                            <th class="manage-column">Store Name</th>
                            <th class="manage-column">Integrated Category</th>
                            <th class="manage-column">Subscription Plan</th>
                            <th class="manage-column">Category Access</th>
                            <th  class="manage-column">Store Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                            <a href="admin.php?page=custom_create_store" class="custom-button">Create Store</a>
                        <p>
                            <a href="logout.php" class="custom-button">Logout</a>
                        </p>
                    </div>
                </div>
            </div>

		</div>

        <div id="tab-2" class="tab-pane">

			<form method="post" action="options.php" style="color:#fff;">
				<?php
					settings_fields( 'custom_plugin_settings' );
					do_settings_sections( 'custom_plugin' );
					submit_button();
				?>
			</form>

		</div>

	</div>
            </body>