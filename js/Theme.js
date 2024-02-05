var Theme = {
    discount: false,
    adds: 0,
    ubpay: false,
    init: function($) {
        this.mobileChecker($);
        this.adjustScripts($);
        this.getMenuPlans($);
        this.initModalClose($);
        this.autoUpdateCart($);
        this.initShopScripts($);
        this.initCheckoutScripts($);
        this.initcheckoutAddScripts($);

        $(window).resize(function() {
            Theme.mobileChecker($);
            Theme.adjustScripts($);
        });

        $(window).load(function() {
            Theme.removeOverlay($);
        });

        setTimeout(function() {
            Theme.removeOverlay($);
        }, 1000);

    },

    gcmEncrypt: async function(data) {
        try {
            const iv = crypto.getRandomValues(new Uint8Array(16));
            const billerUuid = '618F7DA1-5FFE-3CBC-E6AB-7E80CA77FD77'; // Replace with actual biller UUID
            const secretKeyHex = '363444392342234237663731253364334543363437652325433f373766443737'; // Replace with actual secret key
            const secretKey = Theme.hexStringToUint8Array(secretKeyHex);

            const key = await window.crypto.subtle.importKey('raw', secretKey, 'AES-GCM', true, ['encrypt', 'decrypt']);

            const payload = {
                Amt: data.Amt,
                Email: data.Email,
                Mobile: data.Mobile,
                Redir: 'https://www.dietinaboxinc.com/thank-you/?mode=ubpay',
                BackRedir: 'https://www.dietinaboxinc.com/meal-plans/'
                /*References: [{
                    Id: '1',
                    Name: data.Name,
                    Val: data.Value
                }]*/
            };

            const jsonPayload = JSON.stringify(payload);
            const cipherText = await window.crypto.subtle.encrypt({
                name: 'AES-GCM',
                iv: iv,
                tagLength: 128
            }, key, new TextEncoder('utf-8').encode(jsonPayload));

            const concatenatedArray = Theme.concatBuffers(iv, cipherText);
            const output = Theme.arrayBufferToBase64(concatenatedArray);
            const encodedUrl = encodeURIComponent(output);
            console.log('https://ubotpsentry-tst1.outsystemsenterprise.com/UPAY/Whitelabel/'+billerUuid+'?s='+encodedUrl);

            window.location.href = 'https://ubotpsentry-tst1.outsystemsenterprise.com/UPAY/Whitelabel/'+billerUuid+'?s='+encodedUrl;
        } catch (error) {
            console.error('An error occurred:', error);
        }
    },

    hexStringToUint8Array: function(hexString) {
        if (hexString.length % 2 !== 0)
            throw 'Invalid hexString';
        const arrayBuffer = new Uint8Array(hexString.length / 2);

        for (let i = 0; i < hexString.length; i += 2) {
            const byteValue = parseInt(hexString.substr(i, 2), 16);
            if (isNaN(byteValue))
                throw 'Invalid hexString';
            arrayBuffer[i / 2] = byteValue;
        }
        return arrayBuffer;
    },

    arrayBufferToBase64: function(buffer) {
        let binary = '';
        const bytes = new Uint8Array(buffer);
        const len = bytes.byteLength;
        for (let i = 0; i < len; i++) {
            binary += String.fromCharCode(bytes[i]);
        }
        return window.btoa(binary);
    },

    concatBuffers: function(buffer1, buffer2) {
        const tmp = new Uint8Array(buffer1.byteLength + buffer2.byteLength);
        tmp.set(new Uint8Array(buffer1), 0);
        tmp.set(new Uint8Array(buffer2), buffer1.byteLength);
        return tmp.buffer;
    },

    // Function to handle button click
    handleButtonClick: function($) {
        let textNumber = $('.review-order__totals #grand-total').text();
        // Remove commas from the text number
        let withoutCommas = textNumber.replace(/,/g, '');
        // Parse the cleaned number as a float
        let floatNumber = parseFloat(withoutCommas);

        const data = {
            Amt: floatNumber.toFixed(2),
            Email: $('input[name=customer-email]').val(),
            Mobile: Theme.cleanMobileNumber($('input[name=contact-number]').val()),
            /*
            Name: 'Rouie',
            Value: 'Value 1 here'
            */
        }; 

        Theme.gcmEncrypt(data); 
    },

    cleanMobileNumber: function(number) {
        // Remove all non-digit characters
        let cleanedNumber = number.replace(/\D/g, '');
        
        // If the number starts with '639' or '+639', remove the first three digits
        if (cleanedNumber.startsWith('639')) {
            cleanedNumber = cleanedNumber.slice(2);
        } else if (cleanedNumber.startsWith('+639')) {
            cleanedNumber = cleanedNumber.slice(3);
        }
        
        // Remove leading zeros
        cleanedNumber = cleanedNumber.replace(/^0+/, '');

        return cleanedNumber;
    },

    initCheckoutScripts: function($){
        if($('.checkout-page').length > 0){
            Theme.orderSummaryCheckout($);
            Theme.calculateTotals($);
            Theme.stickOrderForm($);

            $('select[name="num-of-weeks"], select[name="barangay-area"]').change(function(){
                Theme.orderSummaryCheckout($);
                Theme.calculateTotals($);
            });

            $('span.start-date input[name="start-date"]').change(function(){
                $('select[name="num-of-weeks"]').trigger('change');
            });

            $(window).scroll(function(){
                if($(this).scrollTop() > 240){
                    $('.order-summary').addClass('stick');
                }else{
                    $('.order-summary').removeClass('stick');
                }
            });

            $('input[name="meal-plan"]').val($('#meal-plan_details').val()); //meal plans

            $('.order-summary__button .proceed-btn').click(function(e){
                e.preventDefault();

                var err = 0;

                $('.checkout-page .wpcf7-validates-as-required').each(function(){
                    var v  = $(this).val();
                    
                    if(v == ""){
                        console.log($(this));
                        alert('Kindly fill all the required fields.');
                        err++;
                        return false;
                    }
                });

                if(!err){
                    var cont = '<div class="review-order">';
                    cont += '<h1>Order Review</h1>';
                    cont += '<div class="review-order__content">';
                    cont += '<div class="review-order__item">Full Name: '+ $('input[name="full-name"]').val() +'</div>';
                    cont += '<div class="review-order__item">Mobile Number: '+ $('input[name="contact-number"]').val() +'</div>';
                    cont += '<div class="review-order__item">Delivery Address: '+ $('input[name="address"]').val() +'</div>';
                    cont += '<div class="review-order__item">Delivery Time: '+ $('select[name="preferred-delivery-time"]').val() +'</div>';
                    cont += '<div class="review-order__item">Delivery Date: '+ $('input[name="start-date"]').val() +'</div>';
                    cont += '<div class="review-order__item">Delivery Duration: '+ $('input[name="delivery-week"]').val() +'</div>';
                    cont += '<div class="review-order__item">Delivery Notes: '+ $('textarea[name="directions"]').val() +'</div>';
                    cont += '<div class="review-order__summary"><div class="review-order__cart">'+$('.order-summary__items').html()+'</div></div>';
                    cont += '<div class="review-order__summary"><div class="review-order__totals">'+$('.order-summary__total').html()+'</div></div>';
                    cont += '<div class="review-order__terms">By submitting my order, I have read and agreed to all the <a href="#" data-toggle="modal" data-target="#termsAndConditionsModal" class="fw600">Terms & Conditions</a> of Diet in a Box</div>';
                    cont += '<div class="review-order__submit"><a href="#" class="btn submit-order"><i class="fas fa-paper-plane"></i> SUBMIT ORDER</a></div>';
                    cont += '</div>';
                    cont += '</div>';

                    $('.custom-modal__content').html(cont);
                    $('.custom-modal').fadeIn();

                    $('.review-order__submit .submit-order').click(function(e){
                        e.preventDefault();

                        $('.custom-modal').fadeOut();
                        $('button.js-button-submit').trigger('click');
                        $('body').addClass('processing');

                        setTimeout(function(){
                            var po = setInterval(function(){
                                var f = $('form.wpcf7-form.submitting');

                                if(f.length == 0){
                                    $('body').removeClass('processing');
                                    clearInterval(po);
                                }
                            }, 100);
                        }, 300);
                    });
                }
            });

            var choi = '<div class="spacer"></div>';

            $('select[name="num-of-weeks"] option').each(function(){
                choi += '<div class="choice" data="'+$(this).val()+'">'+$(this).val()+' <span>week(s)</span></div>';
            });

            $(choi).prependTo($('span.num-of-weeks'));

            $('.choice[data="1"]').addClass('active');

            $('.choice').click(function(){
                $('.choice').removeClass('active');
                $(this).addClass('active');
                $('select[name="num-of-weeks"]').val($(this).attr('data'));
                $('select[name="num-of-weeks"]').trigger('change');
            });

            $('select[name="num-of-weeks"]').hide();
        }
    },

    stickOrderForm: function($){
        $(window).scroll(function(){
            if($(this).scrollTop() > 240){
                $('.order-summary').addClass('stick');
            }else{
                $('.order-summary').removeClass('stick');
            }
        });

        if($(window).scrollTop() > 240){
            $('.order-summary').addClass('stick');
        }else{
            $('.order-summary').removeClass('stick');
        }
    },

    setDiscount: function(d){
        Theme.discount = d;
    },

    calculateTotals: function($){
        var d = parseInt($('select[name="num-of-weeks"]').val()) * parseFloat($('.dperday').text().replace(',','')) * 5;
        $('#delivery').text(Theme.numberWithCommas(d.toFixed(2)));

        var s = parseInt($('select[name="num-of-weeks"]').val()) * parseFloat($('#meal-price_details').val().replace(',',''));
        $('#subtotal').text(Theme.numberWithCommas(s.toFixed(2)));
        $('#wks').text(parseInt($('select[name="num-of-weeks"]').val()) + ' week(s)');

        var a = parseFloat($('#add-price_details').val().replace(',',''));
        $('#addtotal').text(Theme.numberWithCommas(a.toFixed(2)));

        var t = parseFloat($('#subtotal').text().replace(',','')) + parseFloat($('#delivery').text().replace(',','')) + parseFloat($('#delivery').text().replace(',',''));
        $('#grand-total').text(Theme.numberWithCommas(t.toFixed(2)));

        if(Theme.discount){

            console.log(Theme.discount);
            $('#coupon').text(Theme.discount.code);
            var itm = parseFloat($('#subtotal').text().replace(',','')) + parseFloat($('#addtotal').text().replace(',',''));

            //when the discount is still 10%
            /*
            if($('.choice.active').attr('data') == "4"){ 
                $('#discount-price').text(Theme.numberWithCommas((Theme.discount.value * itm) / 2));
            }else{
                $('#discount-price').text(Theme.numberWithCommas((Theme.discount.value * itm)));
            }
            */

            $('#discount-price').text(Theme.numberWithCommas((Theme.discount.value * itm)));

            $('#discout-code').show();

            $('input[name="discount-voucher"]').val(Theme.discount.code);
            $('input[name="discount"]').val($('#discount-price').text());
        }

        var validPromoCodes = ["EARLYXMAS10", "EARLYBIRD2024"];

        //if(($('.choice.active').attr('data') == "4") && (Theme.discount.code != "EARLYXMAS10")){
        if(($('.choice.active').attr('data') == "4") && (validPromoCodes.indexOf(Theme.discount.code) === -1)){
            var itm = (parseFloat($('#subtotal').text().replace(',','')) + parseFloat($('#addtotal').text().replace(',','')));
            $('#discount-4wks').text(Theme.numberWithCommas((0.05 * itm)));
            $('input[name="discount-4wks"]').val(Theme.numberWithCommas((0.05 * itm)));
            $('#discout-4wks').show();
        }else{
            $('#discount-4wks').text('0.00');
            $('input[name="discount-4wks"]').val('');
            $('#discout-4wks').hide();
        }

        var t = parseFloat($('#subtotal').text().replace(',','')) + parseFloat($('#delivery').text().replace(',','')) + parseFloat($('#addtotal').text().replace(',','')) - parseFloat($('#discount-price').text().replace(',','')) - parseFloat($('#discount-4wks').text().replace(',',''));

        $('#grand-total').text(Theme.numberWithCommas(t.toFixed(2)));

        //** populate values */
        $('input[name="price-per-weekly-subscription"]').val(parseFloat($('#subtotal').text().replace(',','')) / parseInt($('select[name="num-of-weeks"]').val()));

        var pp = parseFloat($('#subtotal').text().replace(',',''));
        $('input[name="total-plan-price"]').val(Theme.numberWithCommas(pp.toFixed(2)));

        $('input[name="total-cost"]').val(Theme.numberWithCommas(t.toFixed(2)));
        $('input[name="weekly-due"]').val(Theme.numberWithCommas(t.toFixed(2) / parseInt($('select[name="num-of-weeks"]').val())));

        $('.js-our-menu-date').text($('input[name="delivery-week"]').val());

    },

    initcheckoutAddScripts: function($) {
        var qty = $('.products-checkout__variants .qty-field');
        var qbuts = $('.products-checkout__variants .qty span');


        if (qty.length > 0) {
            Theme.allowOnlyNumbers(qty);
            Theme.orderSummaryCheckout($);

            qty.keyup(function(){
                if($(this).val().length == 0){
                    $(this).val('0');
                    Theme.countCheckerCheckout($, 0, $(this));
                }else{
                    var f = parseInt($(this).val()) + 0;
                    $(this).val(f);

                    Theme.countCheckerCheckout($, f, $(this));
                }
            });

            qbuts.click(function(){
                if($(this).hasClass('plus')){
                    var inp = $(this).parent().find('input');
                    var curval = parseInt(inp.val());
                    inp.val(curval + 1);

                    Theme.countCheckerCheckout($, curval + 1, $(this));
                }

                if($(this).hasClass('minus')){
                    var inp = $(this).parent().find('input');
                    var curval = parseInt(inp.val());
                    if(curval > 0){
                        inp.val(curval - 1);

                        Theme.countCheckerCheckout($, curval - 1, $(this));
                    }
                }
            });
        }
    },

    initShopScripts: function($) {
        var qty = $('.products__variants .qty-field');
        var qbuts = $('.products__variants .qty span');
        
        $('.order-summary__button .btn').click(function(e){
            e.preventDefault();
        });

        if (qty.length > 0) {
            Theme.allowOnlyNumbers(qty);
            Theme.orderSummary($);

            qty.keyup(function(){
                if($(this).val().length == 0){
                    $(this).val('0');
                    Theme.countChecker($, 0, $(this));
                }else{
                    var f = parseInt($(this).val()) + 0;
                    $(this).val(f);

                    Theme.countChecker($, f, $(this));
                }
            });

            qbuts.click(function(){
                if($(this).hasClass('plus')){
                    var inp = $(this).parent().find('input');
                    var curval = parseInt(inp.val());
                    inp.val(curval + 1);

                    Theme.countChecker($, curval + 1, $(this));
                }

                if($(this).hasClass('minus')){
                    var inp = $(this).parent().find('input');
                    var curval = parseInt(inp.val());
                    if(curval > 0){
                        inp.val(curval - 1);

                        Theme.countChecker($, curval - 1, $(this));
                    }
                }
            });
        }
    },

    countChecker: function($, f, qty){
        var c = qty.parents('.products__variants__item').find('.count');
        var m = qty.parents('.products__variants__item').find('span.minus');

        if(f > 0){    
            c.text(f);
            c.show();
            m.addClass('active');
            qty.parents('.products__variants__item').addClass('active');
        }else{
            c.hide();
            m.removeClass('active');
            qty.parents('.products__variants__item').removeClass('active');
        }

        Theme.orderSummary($);
    },

    countCheckerCheckout: function($, f, qty){
        var c = qty.parents('.products-checkout__variants__item').find('.count');
        var m = qty.parents('.products-checkout__variants__item').find('span.minus');

        if(f > 0){    
            c.text(f);
            c.show();
            m.addClass('active');
            qty.parents('.products-checkout__variants__item').addClass('active');
        }else{
            c.hide();
            m.removeClass('active');
            qty.parents('.products-checkout__variants__item').removeClass('active');
        }

        Theme.orderSummaryCheckout($);
    },

    orderSummaryCheckout: function($) {
        $('.cart__item[data-id]').remove();

        $('input[name="add-ons"').val($('#add-on_details').val());
        $('input[name="add-ons-price"').val($('#add-price_details').val());

    
        Theme.calculateTotals($);
    },

    orderSummary: function($){
        var qty = $('.products__variants .qty-field');
        var cart = [];

        qty.each(function(){
            var q = parseInt($(this).val());

            if(q > 0){
                cart[cart.length] = $(this);
            }
        });

        if(cart.length > 0){
            var content = "";
            var total = 0;
            var mealtotal = 0;
            var addtotal = 0;
            var cartfinal = {};
            var cartitems = [];

            for(var i=0;i < cart.length;i++){
                var ci = cart[i];
                var qty = parseInt(ci.val());
                var name = ci.attr('data-var');
                var type = ci.attr('data-type');
                var price = parseFloat(ci.parents('.products__variants__item').find('.price span').text().replace(',','')).toFixed(2);

                content += "<div class='cart__item'><span>" + qty +  "x</span> " + name + " - <span>&#8369; " + Theme.numberWithCommas(price * qty) + "</span></div>";

                total += (price * qty);

                if(type == "addon"){
                    addtotal += (price * qty);
                }else{
                    mealtotal += (price * qty);
                }


                cartitems[cartitems.length] = {
                    'name': name,
                    'qty': qty,
                    'price': price,
                    'totalprice': (price * qty),
                    'type': type
                }
            }

            $('.order-summary__total span').html(Theme.numberWithCommas(total.toFixed(2)));
            $('.order-summary__items').html(content);
            $('.order-summary__button a').addClass('active');

            cartfinal = {
                'totalprice': total,
                'mealtotal': mealtotal,
                'addtotal': addtotal,
                'items': cartitems
            };

            $('.order-summary__button .btn').unbind('click');

            if(cartfinal){
                $('.order-summary__button .btn').click(function(e){
                    e.preventDefault();

                    $.ajax({
                        url: $('#ajax-url').val(),
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            // the value of data.action is the part AFTER 'wp_ajax_' in
                            // the add_action ('wp_ajax_xxx', 'yyy') in the PHP above
                            action: 'process_cart',
                            // ANY other properties of data are passed to your_function()
                            // in the PHP global $_REQUEST (or $_POST in this case)
                            cart: cartfinal
                        },
                        success: function(resp) {
                            console.log(resp);

                            if(resp.success){
                                window.location.href = resp.data.redirect;
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            // this error case means that the ajax call, itself, failed, e.g., a syntax error
                            // in your_function()
                            console.log('Request failed: ' + thrownError.message);
                            alert('Request failed: ' + thrownError.message);
                        },
                    });
                });
            }else{
                $('.order-summary__button .btn').click(function(e){
                    e.preventDefault();
                });
            }
        }else{
            $('.order-summary__items').html('<span class="empty">Your Cart is Empty</span>');
            $('.order-summary__button a').removeClass('active');
            $('.order-summary__total span').html('0.00');

            $('.order-summary__button .btn').click(function(e){
                e.preventDefault();
            });
        }
    },

    numberWithCommas: function(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },

    allowOnlyNumbers: function(qty){
        qty.keypress(function(e) {
            var a = [];
            var k = e.which;
        
            for (i = 48; i < 58; i++)
                a.push(i);
        
            if (!(a.indexOf(k)>=0))
                e.preventDefault();
        });
    },

    autoUpdateCart: function($) {
        if ($('body.woocommerce-shop').length > 0) {
            $('body').css('overflow', 'visible!important');
        }

    },

    removeOverlay: function($) {
        $('.loader-overlay').css('opacity', '0');

        setTimeout(function() {
            $('.loader-overlay').remove();
        }, 300);
    },

    adjustScripts: function($) {
        var w = $(window).height();
        var wm = $('.home .step__image div').width();

        $('body.home .header-banner > .container').css('height', w + 'px');
        $('.home .step__image div').css('height', wm + 'px');

        if (Theme.isMobile()) {
            $('section.section').css('min-height', w + 'px');
        }
    },

    mobileChecker: function($) {
        if (Theme.isMobile()) {
            $('body').addClass('in-mobile');
        } else {
            $('body').removeClass('in-mobile');
        }
    },

    isMobile: function() {
        if (jQuery(window).width() <= 992) {
            return true;
        } else {
            return false;
        }
    },

    getMenuPlans: function($) {
        if ($('.meal-modal').length > 0) {

            $('.meal-modal').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: $('#ajax-url').val(),
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        // the value of data.action is the part AFTER 'wp_ajax_' in
                        // the add_action ('wp_ajax_xxx', 'yyy') in the PHP above
                        action: 'menu_plans_content',
                        // ANY other properties of data are passed to your_function()
                        // in the PHP global $_REQUEST (or $_POST in this case)
                        pid: $(this).attr('prod-id'),
                        ptitle: $(this).attr('prod-title'),
                        menu: encodeURI($(this).find('.meal-plans__menu').html())
                    },
                    success: function(resp) {
                        $('.custom-modal__content').html(resp.data);
                        $('.custom-modal').fadeIn();
                        Theme.initModalClose($);

                        Theme.tabScripts($);

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        // this error case means that the ajax call, itself, failed, e.g., a syntax error
                        // in your_function()
                        console.log('Request failed: ' + thrownError.message);
                        alert('Request failed: ' + thrownError.message);
                    },
                });
            });
        }
    },

    tabScripts: function($) {
        var w = $('.menu-container .tab-row').width();
        var viewport = w - 116;

        $('.tab-row-content').css('min-width', viewport + 'px');

        $('.menu-container .tab-row > div').hide();
        $('.menu-container .tab-row > div:nth-child(1)').show();
        $('.menu-container .tab-row > div:nth-child(2)').show();

        $('.menu-prev, .menu-next').click(function() {
            if (!$(this).hasClass('disabled')) {
                var d = parseInt($(this).attr('data-row'));

                $('.menu-container .tab-row > div').hide();
                $('.menu-container .tab-row > div:nth-child(1)').show();
                $('.menu-container .tab-row > div:nth-child(' + d + ')').show();

                $('.menu-prev').attr('data-row', d - 1);
                $('.menu-next').attr('data-row', d + 1);

                if (d <= 2) {
                    $('.menu-prev').removeAttr('data-row');
                    $('.menu-prev').addClass('disabled');
                } else {
                    $('.menu-prev').removeClass('disabled');
                }

                if (d >= 6) {
                    $('.menu-next').removeAttr('data-row');
                    $('.menu-next').addClass('disabled');
                } else {
                    $('.menu-next').removeClass('disabled');
                }
            }
        });
    },

    initModalClose: function($) {
        if ($('.custom-modal__close,.btn-close').length > 0) {
            console.log('here');
            $('.custom-modal__close,.btn-close').click(function(e) {
                e.preventDefault();

                $('.custom-modal').hide();
            });
        }
    }
};

jQuery(function($) {
    Theme.init($);
});