<?php
// create query for search page
$search_query = new WP_Query( array(
    'post_type' => 'product',
    's' => $search_term,
    'posts_per_page' => 10,
    'paged' => $paged,
    'orderby' => 'title',
    'order' => 'ASC',
) );
// check if search query has results
if ( $search_query->have_posts() ) {
    // if search query has results, display them
    while ( $search_query->have_posts() ) {
        $search_query->the_post();
        ?>
        <tr>
            <td class="product-data"><input type="checkbox" name="product_id[]" value="<?php echo $product->ID; ?>" /></td>
            <td class="product-data" ><?php echo $product->ID; ?></td>
            <td class="product-data" ><?php echo $product->post_title; ?></td>
            <td class="product-data" ><?php echo $product->post_content; ?></td>
            <td class="product-data" >$<?php echo get_post_meta($product->ID, '_price', true); ?></td>
            <!-- check if product is in custom -->
            <td class="product-data" ><?php echo get_post_meta($product->ID, '_custom_product_listed', true) ?></td>
            <td class="product-data" ><?php echo get_the_term_list($product->ID, 'product_cat', '', ', '); ?></td>
            <td class="product-data" ><?php echo get_the_post_thumbnail($product->ID, 'thumbnail'); ?></td>
        </tr>
        <?php
    }
    // display pagination
    echo '<div class="pagination">';
    echo paginate_links( array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%',
        'current' => $paged,
        'total' => $search_query->max_num_pages
    ) );
    echo '</div>';
} else {
    // if search query has no results, display message
    echo '<p>No products found</p>';
}
// reset post data
wp_reset_postdata();


?>
