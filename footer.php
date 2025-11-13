<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Diet
 */

?>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 md-order-1">
                <p>2022 Diet In A Box. All rights reserved</p>
            </div>
            <div class="col-lg-2 col-md-12 md-order-0">
                <div class="social-link-wrapper">
                    <a href="https://www.facebook.com/dietinaboxcebu" class="social-link" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="tel:09224781282" class="social-link">
                        <i class="fas fa-phone"></i>
                    </a>
                    <a href="https://www.instagram.com/dietinabox/" class="social-link" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 md-order-2">
                <p class="text-address">Sanchez Building, J. Panes St., Cebu City, 6000 Cebu</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<input type="hidden" id="base-url" value="<?php echo home_url(); ?>">
<input type="hidden" id="ajax-url" value="<?php echo admin_url('admin-ajax.php'); ?>">

<script>
document.addEventListener('DOMContentLoaded', function() {
  const buttons = document.querySelectorAll('a.btn.proceed-btn');

  buttons.forEach(button => {
    button.addEventListener('click', function(e) {
      // Optional browser-side event (Meta Pixel)
      if (typeof fbq !== 'undefined') {
        fbq('track', 'InitiateCheckout', {
          value: 0,
          currency: 'PHP',
          content_name: 'Checkout Triggered'
        });
      }

      // Send to backend for server-side CAPI tracking
      fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          action: 'send_initiate_checkout_event',
          value: 0,
          currency: 'PHP',
          content_name: 'Checkout Triggered'
        })
      })
      .then(res => res.json())
      .then(data => console.log('CAPI Response:', data))
      .catch(err => console.error('CAPI Error:', err));
    });
  });
});
</script>

</body>
</html>
