ymaps.ready(init);
        var myMap, 
            myPlacemark;

        function init(){ 
            myMap = new ymaps.Map("mapsgkh", {
                center: [56.834925,60.614686],
                zoom:16,
				controls: ['smallMapDefaultSet']
            }); 
			myMap.behaviors.disable('scrollZoom');
            
		var myPlacemark1 = new ymaps.Placemark([56.836101,60.614578], {balloonContent: '<center><img src="img/tmp/99a3828s-960.jpg" style="width:200px;height:140px;"/></center>\
			<br><div class="b-news-list-user_item_user">\
									<a href="17.html"><div class="b-news-list-user_item_user_pic">\
										<img src="img/tmp/u003.png" alt="" />\
									</div>\
									<div class="b-news-list-user_item_user_name">\
										Петров Александр\
									</div></a>\
									<div class="b-news-list-user_item_user_vote">\
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>12</a>\
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>\
									</div>\
								</div>\
								<div class="b-news-list-user_item_title">\
									<a href="05.html">Наконец-то снег убрали</a>\
								</div>\
									</div>',
         hintContent: 'Тут хорошо'}, {
        iconLayout: 'default#image',
        iconImageClipRect: [[0,30], [30, 30]],
        iconImageHref: 'img/butt_kart.png',
        iconImageSize: [30, 30],
        iconImageOffset: [-15, -27]
    	});	
		var myPlacemark2 = new ymaps.Placemark([56.835769,60.616664], {balloonContent: '<center><img src="img/tmp/lB-0SneSjh8.jpg" style="width:140px;height:140px;"/></center>\
			</br><div class="b-news-list-user_item_user" style="width:200px">\
									<a href="17.html"><div class="b-news-list-user_item_user_pic">\
										<img src="img/tmp/u003.png" alt="" />\
									</div>\
									<div class="b-news-list-user_item_user_name">\
										Петров Александр\
									</div></a>\
									<div class="b-news-list-user_item_user_vote" >\
										<a class="b-vote-up" href="#"><span class="g-ico b-ico-2"></span>12</a>\
										<a class="b-vote-down" href="#"><span class="g-ico b-ico-3"></span>5</a>\
									</div>\
								</div>\
								<div class="b-news-list-user_item_title">\
									<a href="05.html">Люк открыт, осторожно !!!</a>\
								</div>\
									</div>',
         hintContent: 'Тут плохо'}, {
        iconLayout: 'default#image',
        iconImageClipRect: [[30,0], [60, 30]],
        iconImageHref: 'img/butt_kart.png',
        iconImageSize: [30, 30],
        iconImageOffset: [-15, -27]
    	});	
        myMap.geoObjects.add(myPlacemark1);
		myMap.geoObjects.add(myPlacemark2);
		}
	function s_f(elem)
		{
		if($('.b-mod-news_item').css('display')=="none")
			{
			$('#filtr_b').removeClass('g-ico b-ico-10').addClass('g-ico b-ico-1');
			$('.b-mod-news_item').show();
			$('.b-mod-news_border').hide();
			$('.b-mod-filter').hide();
			}
		else
			{
			$('#filtr_b').removeClass('g-ico b-ico-1').addClass('g-ico b-ico-10');
			$('.b-mod-news_item').hide();
			$('.b-mod-news_border').show();
			$('.b-mod-filter').show();
			}
		}