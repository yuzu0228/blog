$(function(){

    var $windowWidth = $(window).width();

    /*=================================
    imgを囲むfigureをimgのwidth,heightに合わせる
    ======================================*/
    /*
    $('.posts-container article img.wp-post-image').each(function(){
        $(this).wrap('<div class="excerpt-img-container"></div>');
        $(this).parent().css({
            height: $('.posts-container article .excerpt-img-container img').height()
        });
    });*/

    $('.recent-posts img').each(function(){
        $(this).parent().css({
            height: $('.recent-posts img').height()
        });
    });

    $('.single-main-container .same-cat-articles-container .post img').each(function(){
        $(this).parent().css({
            height: $(this).height(),
            width: $(this).width()
        });
    });

    /*=========================================
    comment-formのテキスト変更
    ==============================================*/
    $('.comment-form label[for="comment"]').each(function(){
        $(this).html('Comment *');
    });
    $('.comment-form label[for="author"]').each(function(){
        $(this).html('Name *');
    });
    $('.comment-form label[for="email"]').each(function(){
        $(this).html('E-mail *');
    });
    $('.comment-form label[for="url"]').each(function(){
        $(this).html('Your site');
    });
    $('.comment-form input[type="submit"]').each(function(){
        $(this).val('Send');
    });

    
/*==================================
smooth-scroll
=====================================*/
/*
$('.smooth-scroll-btn').each(function(){
	var el = scrollableElement('html', 'body'); 

	$(this).on('click', function(event){
		event.preventDefault();
		$(el).animate({scrollTop: 0}, 250); 
	});
});

function scrollableElement() {
	var i, len, el, $el, scrollable;
	for (i=0, len=arguments.length; i<len; i++) {
		el =arguments[i],
		$el =$(el);
		if($el.scrollTop() > 0) {
			return el;
		} else {
			$el.scrollTop(1);
			scrollable = $el.scrollTop() > 0;
			$el.scrollTop(0);
			if(scrollable) {
				return el;
			}
		}
	}
	return [];
}*/

$(".smooth-scroll-btn").hide();

$(window).on("scroll", function() {
    if ($(this).scrollTop() > 100) {
        $('.smooth-scroll-btn').fadeIn();
    }else{
        $('.smooth-scroll-btn').fadeOut();
    }
     
    scrollHeight = $(document).height(); 
    scrollPosition = $(window).height() + $(window).scrollTop(); 
    footHeight = $(".main-footer").innerHeight();
    if ( scrollHeight - scrollPosition <= footHeight ) {
        $(".smooth-scroll-btn").css({
            "position":"absolute",
            "bottom": "-115px",
            "right": "15px",
            "backgroundColor": "rgb(27,39,53)"
        });
    } else {
        $(".smooth-scroll-btn").css({
            "position":"fixed",
            "bottom": "20px",
            "right": "15px",
            "backgroundColor": "rgba(27,39,53,0.5)"
        });
    }
});

$('.smooth-scroll-btn').click(function () {
    $('body,html').animate({
    scrollTop: 0
    }, 500);
    return false;
});


/*=========================================
    stickey header
==========================================*/
$('body.home header, body.archive header, body.single header').each( function(){

    var $window = $(window), 
        $header = $(this), 
        $main = $(this).parent().find('main'),
        $allContentsWithoutHeader = $('.all-contents-without-header'),
        headerOffsetTop = $header.height();


    $window.on('scroll', function(){
        if($window.scrollTop() > headerOffsetTop) {
            $header.addClass('sticky');
            $allContentsWithoutHeader.css({transform: 'translateY(150px)'});
            if($windowWidth > 770 ) {
                $allContentsWithoutHeader.css({transform: 'translateY(200px)'});
            }

            $header.find('.blog-top-title-container').find('img').css({width: 40 + 'px',height: 40 + 'px'});
            $header.find('.blog-top-title-container').find('h1').css({fontSize: 18 + 'px',fontWeight: '600'});
            $header.find('.blog-top-title-container').css({marginLeft: 20 + 'px'});
            $header.find('.blog-top-title-container a').addClass('header-narrow');

            $header.find('.menu-menu1-container, .header-search').delay(500).addClass('sticky');
            $header.find('.header-search input[type="text"]').delay(500).css({backgroundColor: 'transparent'});
            $header.find('.responsive-search-btn i.search-btn').addClass('sticky')

            /*
            $('.smooth-scroll-btn').css({
                position: 'fixed',
                bottom: 80 + 'px',
                left: 25 + 'px'
            });*/

        }else {
            $header.removeClass('sticky');
            $allContentsWithoutHeader.css({transform: ''});

            $header.find('.blog-top-title-container').find('img').css({width: '',height: ''});
            $header.find('.blog-top-title-container').find('h1').css({fontSize: '',fontWeight: ''});
            $header.find('.blog-top-title-container').css({marginLeft: ''});
            $header.find('.blog-top-title-container a').removeClass('header-narrow');

            $header.find('.menu-menu1-container, .header-search').delay(500).removeClass('sticky');
            $header.find('.header-search input[type="text"]').delay(500).css({backgroundColor: ''});
            $header.find('.responsive-search-btn i.search-btn').removeClass('sticky')

            /*
            $('.smooth-scroll-btn').css({
                position: 'static'});*/
        }

        
    });

    $window.trigger('scroll');
});


/*=========================================================
headerの検索フォーム改造
============================================================*/
    if( $windowWidth < 840 ) {
        $('.responsive-search-btn i.search-btn').on('click', function(){
            $('.responsive-header-search').fadeToggle();
            $(this).toggleClass('fa-search');
            $(this).toggleClass('fa-times');

            if( $(this).hasClass('sticky')) {
            $('.responsive-header-search').css({
                position: 'absolute',
                bottom: -10 + 'px',
                left: 17 + 'px',
            });

            } else {
                $('.responsive-header-search').css({
                    position: 'absolute',
                    bottom: -15 + 'px',
                    left: 0,
                });
            } 
        });
    };

/*===========================================
540px以下でnavをプルダウン方式にする
================================================*/
    $('header').each(function(){
        //$(this).find('.main-nav-under-540px').hide();
        $('header .fa-bars').on('click', function(){
            $('header').find('.main-nav-under-540px').fadeToggle();
        });
    });

/*==============================================
ページ内リンク設定
===================================================*/
    var headerHight = 55; //ヘッダの高さ
    $('a[href^="#"]').click(function(){
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
            var position = target.offset().top-headerHight; //ヘッダの高さ分位置をずらす
        $("html, body").animate({scrollTop:position}, 300, "swing");
            return false;
    });

})