$(document).ready(function () {
    $('#header').scrollToFixed();
    $('.post').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated fadeIn',
        offset: 100
    });
});