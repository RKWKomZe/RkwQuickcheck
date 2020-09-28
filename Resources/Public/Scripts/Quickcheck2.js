jQuery(document).ready(function() {


	// Initial: Hide further topics and back button
	jQuery('.tx-rkwquickcheck-slide:not(:first)').hide();
	jQuery('.tx-rkwquickcheck-prev:first').hide();


    // set functionality for radiogroups
    jQuery('.tx-rkwquickcheck-radiogroup .radio-class').click(function(){
        jQuery(this).parent().find('input[type=radio]').prop('checked', false);
        jQuery(this).find('input[type=radio]').prop('checked',true);
        jQuery(this).parent().find('.radio-class').removeClass('selected');
        jQuery(this).addClass('selected');
    });


	// previous button
	jQuery('.tx-rkwquickcheck-prev').click(function(event) {

        event.preventDefault();

        // scroll to top
        jQuery('html,body').animate(
            {
                scrollTop: jQuery('#tx-rkw-quickcheck').offset().top
            },
            'slow'
        );

        // hide error message
        jQuery('.typo3-messages').hide();

        var currentSlide = jQuery('.tx-rkwquickcheck-slide:visible');
        if (jQuery(currentSlide).prev().length) {
            jQuery(currentSlide).prev().show();
            jQuery(currentSlide).hide();
        }
    });


	// next button
	jQuery('.tx-rkwquickcheck-next').click(function(event) {

		event.preventDefault();

		// hide error message
		jQuery('.typo3-messages').hide();

		var slideContainer = jQuery('.tx-rkwquickcheck-slide-container');
		var form = jQuery(slideContainer).closest('form');
		var currentSlide = jQuery('.tx-rkwquickcheck-slide:visible');
        var radioGroups = jQuery(currentSlide).find('.tx-rkwquickcheck-radiogroup');

        // check if at least one answer is checked
        var checked = true;
        jQuery(radioGroups).each(function(key, radioGroup) {
            if (! jQuery(radioGroup).find('input:checked').length) {
                checked = false;
            }
        });

        // if questions are checked go to next slide or submit if it was the last one
        if (checked) {
            if (jQuery(currentSlide).next().length) {
                jQuery(currentSlide).next().show();
                jQuery(currentSlide).hide();
            } else {
                form.submit();
            }
        } else {
            alert(jQuery('.tx-rkwquickcheck-hint').text())
        }

        // scroll to top
        if (jQuery(currentSlide).next().length) {
            jQuery('html,body').animate(
                {
                    scrollTop: jQuery('#tx-rkw-quickcheck').offset().top
                },
                'slow'
            );
        }


	});

    // scroll to result. Optional: Is defined via TS and is set as value in html
    if (
        jQuery("#tx-rkw-quickcheck .value-box").length
        && jQuery("#quickcheckScrollToResultJs").val() == "1"
    ) {
        jQuery('html,body').animate(
            {
                scrollTop: jQuery('#tx-rkw-quickcheck').offset().top
            },
            'slow'
        );
    }

});
