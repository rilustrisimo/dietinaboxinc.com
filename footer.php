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

  function getCookie(name) {
    let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
    return match ? match[2] : null;
  }

  buttons.forEach(button => {
    button.addEventListener('click', function() {

      const email = document.querySelector('input[name="customer-email"]')?.value || "";
      const phone = document.querySelector('input[name="contact-number"]')?.value || "";
      const fbp   = getCookie('_fbp') || "";

      // Generate a shared event_id
      const event_id = 'evt_' + Date.now() + '_' + Math.random().toString(36).substring(2,12);

      // 🔵 FIRE BROWSER EVENT
      if (typeof fbq !== "undefined") {
        fbq('track', 'InitiateCheckout', {
          email: email,
          phone: phone,
          value: 0,
          currency: "PHP",
          content_name: "Checkout Triggered"
        }, { eventID: event_id });
      }

      // 🔵 FIRE SERVER-SIDE CAPI EVENT
      fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          action: 'send_initiate_checkout_event',
          value: 0,
          currency: 'PHP',
          content_name: 'Checkout Triggered',
          email: email,
          phone: phone,
          fbp: fbp,
          event_id: event_id
        })
      })
      .then(res => res.json())
      .catch(err => console.error('CAPI Error:', err));
    });
  });
});
</script>




</body>
</html>
