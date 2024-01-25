
<!-- Terms and Conditions -->
<div class="modal fade" id="termsAndConditionsModal" tabindex="-1" role="dialog" aria-labelledby="termsAndConditionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                </span>
            </button>
            <div class="modal-header text-center d-block">
                <h6 class="mini-slogan text-aquagreen mb-3">Read This</h6>
                <h2 class="modal-title text-danger" data-text-bg="Terms and Conditions">Terms and Conditions</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php echo get_post_field('post_content', get_page_by_path( 'terms-and-conditions' )->ID); ?>
                </div>
            </div>
        </div>
    </div>
</div>