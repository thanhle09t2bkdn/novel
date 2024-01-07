$(function () {
    $( 'input:radio[id^="options."]' ).click(function () {
        $( 'input:radio[id^="options."]' ).prop( 'checked', false );
        $(this).prop( 'checked', true );

    });
});
