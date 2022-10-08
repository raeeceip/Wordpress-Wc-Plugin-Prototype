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
    <ul class="nav-product-items nav-tabs">
        <style>
            .nav-product-items{
                border-radius: 3px 0 0 0;
                background-color: #e5b60f;
            }
        </style>
        <li class="text-left">
            <img src="<?php echo $this->plugin_url . 'assets/images/logo.png'; ?>" alt="custom" width="50%" />
        </li>
        <li class="text-center" style="margin-left: 20%;">
            <h1>custom Dashboard</h1>
        </li>
        <?php settings_errors(); ?>

    </ul>


    <div class=" tab-content">
        <div id="tab-1" class="tab-pane <?php echo !isset($_POST["edit_post"]) ? 'active' : '' ?>">

            <h3>Manage Your custom Products</h3>
            <!-- add search bar -->
           <div class="">
                <div class="col-md-12" style="float:left;" >
                    <!-- add button for export here -->
                    <span class="input-group-btn">
                    <button class="custom-button" id="custom-button" type="submit">Delete Products</button>
                </span>
                </div>
                <div class="col-md-12" style="float:right;">
                <form method="GET" action="search.php"  role="search">
                        <div class="input-group">
                            <input type="text" id="search-input" class="form-control" name="search" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="custom-button"  id="search-input" type="submit" >Search</button>
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
                'in_custom'=>"false"
            );
            $products = get_posts($args);
            ?>
            <table class="cpt-table fixed striped posts" id="cpt-table">
                <thead>
                <tr>
    
                    <th class="manage-column">Select</th>
                    <th class="manage-column">custom ID</th>
                    <th class="manage-column">Title</th>
                    <th class="manage-column">Description</th>
                    <th class="manage-column">Price</th>
                    <th class="manage-column">Items Listed</th>
                    <th class="manage-column">Categories</th>
                    <th class="manage-column">Image</th>

                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($products as $product) : ?>
                    <tr>
                        <td class="product-data"><input type="checkbox" name="product_id[]" value="<?php echo $product->ID; ?>" /></td>
                        <td class="product-data" ><?php echo $product->ID; ?></td>
                        <td class="product-data" ><?php echo $product->post_title; ?></td>
                        <td class="product-data" ><?php echo $product->post_content; ?></td>
                        <td class="product-data" >$<?php echo get_post_meta($product->ID, '_price', true); ?></td>
                        <!-- check if product is in custom -->
                        <td class="product-data" ><?php echo get_post_meta($product->ID, '_custom_product_listed', true) ?></td>
                        <td class="product-data" ><?php echo get_the_term_list($product->ID, 'product_cat', '', ', '); ?></td>
                        <td class="product-data"><img src="<?php echo get_the_post_thumbnail_url($product->ID); ?>" alt="<?php echo $product->post_title; ?>" width="80" height="60" style="margin: 0 auto;"></td>


                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
            <br>
            <div class="col-md-12" style="float:left;" >
                <!-- add button for export here -->
                <span class="input-group-btn">
                    <button class="custom-button" id="custom-button" type="submit">Delete Products</button>
                </span>
            </div>
        </div>
    </div>
</div>

</body>