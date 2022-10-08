<!-- create a new page for store creation -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body class="font-raleway">
    <!-- submit form to create store -->
    <form id="create-store-form" action="<?php echo esc_url( rest_url( 'custom/v1/store' ) ); ?>" method="post">
    <h1>Submit Website</h1>
        <label for="store_name">Your E-Commerce store name</label>
        <input type="text" name="store_name" id="store_name">
        <label for="website_url">Your E-Commerce Website Url</label>
        <input type="text" name="store_url" id="website_url">
        <h1> Category 1</h1>
        <label for="store_cat">Select your E-Commerce Website Level Category to be Integrated</label>
        <select name="store_category" id="store_cat">
            <?php 
            foreach ($categories as $category) {
                echo '<option value="'.$category->id.'">'.$category->name.'</option>';
            }
            ?>
        </select>
        <label for="store_sub_category">Select your E-Commerce Website Level Sub Category to be Integrated</label>
        <div type="store_sub_category" id="store_sub_cat">
            <input type="checkbox" name="store_sub_category" value="1"/>Floor Care<br>
            <input type="checkbox" name="store_sub_category" value="2"/>Servive Equipment<br> 
            <input type="checkbox" name="store_sub_category" value="3"/>Small 
            <input type="checkbox" name="store_sub_category" value="4"/>Laundry 
            <input type="checkbox" name="store_sub_category" value="5"/>Major 
        </div>
        <input type="checkbox" name="store_sub_category" id="store_sub_cat">
        <label for="other_category">Type Options That are not listed above</label>
        <input type="text" name="other_category" id="other_category">
        <h1> Website Questionaire</h1>
        <h2> The below questions will help our platform serve your ecommerce store well and drive productivity</h2>
        <label for="store_question">Select the Platform that was used in building your ecommerce website</label>
        <select name="store_question_1" id="store_question">
            <option value="wordpress">Wordpress</option>
            <option value="shopify">Shopify</option>
            <option value="wix">Wix</option>
            <option value="bigcommerce">Bigcommerce</option>
            <option value="woocommerce">Woocommerce</option>
            <option value="magento">Magento</option>
            <option value="other">Other</option>
        </select>
        <label for="store_country">Select the Country your eCommerce store/website is located in</label>
        <!-- get country llst from woocommere -->
        <?php
        $countries_obj   = new WC_Countries();
        $countries   = $countries_obj->__get('countries');
        ?>
        <select name="store_country" id="store_question">
            <?php 
            foreach ($countries as $country) {
                echo '<option value="'.$country.'">'.$country.'</option>';
            }
            ?>
        </select>
        </select>
        <label for="store_question_2">Is your eCommerce page a/an</label>
        <input type="text" name="store_question_2" id="other_category">
        <input type="submit" name="submit" value="Create Store">
    </form>
</body>
</html>