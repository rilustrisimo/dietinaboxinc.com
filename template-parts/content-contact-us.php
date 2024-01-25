
<button type="button" class="d-none" data-toggle="modal" data-target="#contactUsModal">
  Contact Us
</button>

<!-- Contact us -->
<div class="modal fade" id="contactUsModal" tabindex="-1" role="dialog" aria-labelledby="contactUsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                </span>
            </button>
            <div class="modal-header text-center d-block">
                <h6 class="mini-slogan text-aquagreen mb-4">Talk About a Healthy Lifestyle</h6>
                <h1 class="modal-title" data-text-bg="Contact Us">Contact Us</h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <img class="img-fluid width-100p mt-4" src="<?php echo get_template_directory_uri() ?>/dist/images/contact-us.jpg">
                    </div>
                    <div class="col-md-6">
                        <?php echo do_shortcode('[contact-form-7 id="36" title="Contact Form"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>