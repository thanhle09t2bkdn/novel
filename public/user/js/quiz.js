(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        $('#submit-quiz').click(function () {
            let score = 0;
            $( 'input:radio:checked' ).each(function( index ) {
                if($( this ).attr('data-answer') == 1) {
                    $(this).parent().addClass('text-success');
                    score++;
                } else {
                    $(this).parent().addClass('text-danger');
                }

            });
            $('#score-id').text(score);
            $('#score-title').removeClass('d-none');

        });

        $('#reset-quiz').click(function () {
            $(this).prop( 'checked', true );
            $( 'input:radio' ).prop( 'checked', false );
            $( 'input:radio' ).each(function( index ) {
                $(this).parent().removeClass('text-danger');
                $(this).parent().removeClass('text-success');

            });
            $('#score-title').addClass('d-none');

        });
    });
})(jQuery);

