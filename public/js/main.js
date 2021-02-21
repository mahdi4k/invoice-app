// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function () {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right': scrollWidth});
}).resize();


// ? input number


// blur unchecked input

// calculate price


/*    $(document).ready(function () {
        // Initialize Smart Cart
        $('#smartcart').smartCart({
            locales: 'fa-IR',
            currencyOptions: {
                style: 'currency',
                currency: 'IRR',
                currencyDisplay: 'IRR'
            } // extra settings for the cu
        });

    });*/







