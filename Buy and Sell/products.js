// Select the element where the products will be displayed
const productsContainer = document.querySelector('#products-container');

// Insert the products HTML code into the page
productsContainer.innerHTML = '<?php echo $products_html; ?>';
