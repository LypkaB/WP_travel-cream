jQuery(document).ready(function($) {
    /*<----- Scroll for an anchor links ----->*/
    let $page = $('html, body');
    $('a[href*="#"]').click(function() {
        $page.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 600);
        return false;
    });

    /*<----- Datepicker for section «Search form» ----->*/
    $('#date').datepicker();

    /*<----- Wrap class for posts in section «Attractions» ----->*/
    $('.attractions__post:nth-child(2), .attractions__post:nth-child(4)').wrapAll('<div class="attractions__post_wrap">');
});