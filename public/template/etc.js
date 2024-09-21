setTimeout(function () {
    var errorAlert = document.getElementById('error-alert');
    var successAlert = document.getElementById('success-alert');

    if (errorAlert) {
        fadeOutAndRemove(errorAlert);
    }

    if (successAlert) {
        fadeOutAndRemove(successAlert);
    }

    function fadeOutAndRemove(element) {
        var opacity = 1;
        var timer = setInterval(function () {
            if (opacity <= 0.1) {
                clearInterval(timer);
                element.style.display = 'none';
            }
            element.style.opacity = opacity;
            opacity -= opacity * 0.05;
        }, 50);
    }
}, 2500);

