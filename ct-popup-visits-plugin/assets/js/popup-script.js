jQuery(document).ready(function($) {

    var JsonCookies = Cookies.withConverter({
        write: JSON.stringify,
        read: JSON.parse
    });

    var cookieData = JsonCookies.get('pvp_cookie_data') || { visitCount: 0, popupShown: false };

    cookieData.visitCount++;
    JsonCookies.set('pvp_cookie_data', cookieData, { expires: Number(pvp_data.cookie_lifetime) });

    if (cookieData.visitCount >= pvp_data.trigger_count && !cookieData.popupShown) {
        var popupDelay = pvp_data.delay * 1000;

        setTimeout(function() {
            ctOpenPopup();
            // Update the popupShown flag after displaying the popup
            cookieData.popupShown = true;
            JsonCookies.set('pvp_cookie_data', cookieData, { expires: Number(pvp_data.cookie_lifetime) });
        }, popupDelay);
    }

    function ctOpenPopup() {
        $.magnificPopup.open({
            items: {
                src: '#pvp-popup',
                type: 'inline'
            },
            closeBtnInside: true,
        });
    }
});
