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
<body class="font-raleway">
<div class="wrap font-raleway" >
    <ul class="header">
        <style>
            .header{
                position: sticky;
                display: flex;
                border-radius: 3px 0 0 0;
                background-color: #e5b60f;
                margin-bottom: 0px;
            }
        </style>
        <li class="text-left">
            <img src="<?php echo $this->plugin_url . 'assets/images/logo.png'; ?>" alt="custom" width="50%" />
        </li>
        <li class="text-center" style="margin-left: 20%;">
            <h1 >My Products</h1>
        </li>
        <?php settings_errors(); ?>

    </ul>

	<div class=" tab-content font-raleway">
		<div id="tab-1" class="tab-pane <?php echo !isset($_POST["edit_post"]) ? 'active' : '' ?>">

			<h3 class="font-raleway">Manage and Export Products To custom</h3>
            <!-- add search bar -->
            <div class="">
                <div class="col-md-12" style="float:left;" >
                    <!-- add button for export here -->
                    <span class="input-group-btn">
                    <button class="custom-button" type="submit">Export to custom</button>
                </span>
                </div>
                <div class="col-md-12" style="float:right;">
                <!-- redirect to search page on button click -->
                    <form method="GET" action="search.php">
                        <div class="input-group">
                            <input type="text" id="search-input" class="form-control" name="search" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="custom-button"  id="search-input" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>


            <?php
            // get woocommerce product data and display in table
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
            );
            $products = get_posts($args);
            ?>
            <table class="cpt-table fixed striped posts">
                <thead>
                    <tr>
                        <th class="manage-column">Select</th>
                        <th class="manage-column">ID</th>
                        <th class="manage-column">Title</th>
                        <th class="manage-column">Price</th>
                        <th class="manage-column">Description</th>
                        <th class="manage-column">Category</th>
                        <th class="manage-column">Image</th>
                        <th class="manage-column">Quick Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php

			    foreach ($products as $product) : ?>
            <tr>
                <td><input type="checkbox" name="product_id[]" value="<?php echo $product->ID; ?>" /></td>
                <td><?php echo $product->ID; ?></td>
                <td><?php echo $product->post_title; ?></td>
                <td>$<?php echo get_post_meta($product->ID, '_price', true); ?></td>
                <!-- check if product is listed on custom -->
                <td><?php echo $product->post_content; ?></td>
                <td><?php echo get_the_term_list($product->ID, 'product_cat', '', ', '); ?></td>
                <td><img src="<?php echo get_the_post_thumbnail_url($product->ID); ?>" alt="<?php echo $product->post_title; ?>" width="80" height="50"></td>
                    <td>
                        <!-- show export button if product is not in  custom -->
                        <a href="<?php echo get_edit_post_link($product->ID); ?>" class="button button-primary custom-button" style="background-color: #e5b60f; color:#fff; border:1px solid white;" >Edit</a>
                    </td>

            </tr>
            <?php endforeach; ?>
                </tbody>

            </table>
		</div>

	</div>
</div>
</body>