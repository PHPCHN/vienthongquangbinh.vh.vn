$(document).ready(function(){
  news_height($('#news'), $(window));
  scroll_position($('#news'), $('#main-content'), $(window));

  $(window).scroll(function() {
    var content = $('#main-content');
    var news = $('#news');
    scroll_position(news, content, $(this));
  });

  $('.carousel[data-type="multi"]').each(function(){
    var limit = $(this).attr('data-limit');
    $(this).find('.item').each(function(){
  		var next = $(this);
  		for (var i=1;i<limit;i++) {
  			next=next.next();
  			if (!next.length) {
  				next = $(this).siblings(':first');
  			}
  			next.children(':first-child').clone().appendTo($(this));
  		}
  	});
  });

  $('#to-top').on('click', function() {
    var top = $(document).scrollTop();
    var to_top = setInterval(function(){
      top = top - 200;
      if(top <= 0) {
        clearInterval(to_top);
        top = 0;
      }
      $(document).scrollTop(top);
    }, 1);
  });

  $('.carousel.vertical').on('slide.bs.carousel', function(){
    var active = $(this).find('.active').first().children(':first-child');
    var htop = active.next().offset().top - active.offset().top;
    var data_class = $(this).attr('data-class');
    var style = $('#vrc-style-'+data_class);
    style.html(bs_carousel(data_class, htop));
  });

  /*$('#verCarousel').on('slide.bs.carousel', function(){
    var active = $(this).find('.active p').first();
    var htop = active.height() + 10;
    var style = $('#vrc-style');
    style.html(bs_carousel('v0', htop));
  });

  $('#verCarousel-1').on('slide.bs.carousel', function(){
    var active = $(this).find('.active a').first();
    var htop = active.height();
    var style = $('#vrc-style-1');
    style.html(bs_carousel('v1', htop));
  });*/

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86814912-1', 'auto');
  ga('send', 'pageview');

});

function bs_carousel(clas, htop) {
  var style_list = ".carousel."+ clas +" .next {";
  style_list += "top: "+ htop +"px;}";
  style_list += ".carousel."+ clas +" .active.left {";
  style_list += "top: -"+ htop +"px;}";
  return style_list;
}

function news_height(news, windo) {
  if(news.height() < windo.height())
    news.height(windo.height());
}

function scroll_position(news, content, windo) {
  var top = content.offset().top + news.height() - windo.height();
  var bottom = content.offset().top + content.height() - windo.height();
  var scrollTop = $(document).scrollTop();
  if(windo.width() >= 768 && top < bottom) {
    if (scrollTop > bottom) {
      news.removeClass("news-fixed");
      news.addClass("news-absolute");
    } else if (scrollTop >= top && scrollTop <= bottom) {
      news.removeClass("news-absolute");
      news.addClass("news-fixed");
    } else {
      news.removeClass("news-fixed");
      news.removeClass("news-absolute");
    }
  }
}
