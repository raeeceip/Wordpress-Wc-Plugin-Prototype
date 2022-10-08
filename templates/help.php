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

<div class="custom-help">
    <style>

        *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: inherit;
        }
        .custom-help {
            background-image: url("<?php echo $this->plugin_url . 'assets/images/faq.svg'; ?>");
            background-repeat: no-repeat;
            background-position: 100% 0%;
            background-size: 35%;
            padding: 10px;
            margin-bottom: 20px;
        }


    </style>
    <div class="faq-header">
            <img src="<?php echo $this->plugin_url . 'assets/images/icons8-faq.svg'; ?>" alt="custom" width="15%"/>

    </div>
    <div class="faq-intro">
        <h1>Welcome to our FAQ page</h1>


        <p>
            <?php echo __("Here you can find answers to the most common questions we get asked about our products."); ?>
        </p>
        <p>
            <?php echo __("If you have any other questions, please feel free to contact us at <a href='mailto:@custom.com'>@custom.com</a>."); ?>
        </p>
    </div>
    <hr>
    <section class="faq-body">

        <div class="faq-body-content">
            <div class="faq-accordion-item">
                <a class="faq-question">
                    What is custom?
                </a>
                <div class="faq-answer">
                    <p>
                        <?php echo __("custom is a plugin that allows you to create a store for your online products, and advertise them on the custom platform. You can use it to advertise goods and services on a platform dedicated to doing so."); ?>
                    </p>
                </div>
            </div>
            <div class="faq-accordion-item">
                <a class="faq-question">
                    How do I use custom?

                </a>
                <div class="faq-answer">
                    <p>
                        <?php echo __(" In order to use custom, you will have to sign up through the plugin, after which you can access all of custom's features."); ?>
                    </p>
                </div>
            </div>
            <div class="faq-accordion-item">
                <a class="faq-question">
                    How do I create a store?
                </a>
                <div class="faq-answer">
                    <p>
                        <?php echo __("By signing up through the Plugin, a store will automatically be generated for you on the custom platform, all that's left is for  you to export your data to custom and Advertize "); ?>
                    </p>
                </div>
            </div>
            <div class="faq-accordion-item">
                <a class="faq-question">
                    How do I export my data to custom?
                </a>
                <div class="faq-answer">
                    <p>
                        <?php echo __("After you have created a store, you can export your data to custom by clicking on the 'Export' button in the '<a href='admin.php?page=custom_products'>custom Products</a>' section of the plugin."); ?>

                    </p>

                    <p>
                        <?php echo __("If you want to export your products in bulk, you can do so by clicking the 'Import' button on the <a href='admin.php?page=custom_products'>custom Products</a> page."); ?>
                    </p>
                </div>
            </div>
            <div class="faq-accordion-item">
                <a class="faq-question">
                    What happens when I sign up on the custom Plugin?
                </a>
                <div class="faq-answer">

                    <p>
                        <?php echo __("You will be given a Store ID, which allows you to access your custom Store on the custom platform."); ?>
                    </p>
                    <p>
                        <?php echo __("Our Store ID's are generated and secured via a JWT authentication system which ensures security for each of our client's stores. "); ?>

                    </p>

                    <p>
                        <?php echo __("You will also be given a Store Password, which allows you to access your custom Store on the custom platform."); ?>
                    </p>
                </div>
            </div>
            <div class="faq-accordion-item">
                <a class="faq-question">
                    So what happens to the credentials I entered on the custom Platform?
                </a>
                <div class="faq-answer">

                    <p>
                        <?php echo __("They still exist on the custom platform, and will be used to sign in to your custom account, which contains your custom store"); ?>
                    </p>
                </div>
            </div>
            <div class="faq-accordion-item">
                <a class="faq-question">
                    So can I have more than one custom Store?
                </a>
                <div class="faq-answer">
                    <p>
                        <?php echo __("Yes, but the contents within this store on wordpress will only be sent to one of those stores."); ?>
                    </p>
                </div>
            </div>
            <div class="faq-accordion-item">
                <a class="faq-question">
                    Why Persi?
                </a>
                <div class="faq-answer">
                    <p>
                        <?php echo __("custom is an advertisement  platform that allows you to sell your products on the internet. We are a company dedicated to helping you advertise and sell your  products on the internet."); ?>
                    </p>
                </div>
            </div>

        </div>

    </section>
</div>

    </body>




