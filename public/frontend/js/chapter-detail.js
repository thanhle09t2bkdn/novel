$(document).keydown(function (e) {
    if (e.which == 37) {
        window.location.href = $('#previous-btn').attr('href');
        return false;
    } else if (e.which == 39) {
        window.location.href = $('#next-btn').attr('href');
        return false;
    }
});
