$(document).ready(function(){
    $("#slider").cycle({
        speed:  1000, 
        timeout: 10000,   
        pager:  '.slider_nav',
        pause: true,
        pauseOnPagerHover: true    
    });
});