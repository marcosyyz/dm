<?php 

?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>

(function(A) {

	if (!Array.prototype.forEach)
		A.forEach = A.forEach || function(action, that) {
			for (var i = 0, l = this.length; i < l; i++)
				if (i in this)
					action.call(that, this[i], i, this);
			};

})(Array.prototype);



		var
		mapObject,
		markers = [],
		markersData = {
                 <?php $map->gerar_markersdata($filtro_busca,$filtro_categoria,$filtro_categoria_url,$filtro_bairro,1,$itens_do_mapa); ?>
                }; // fim markersData
        
        
        

                function toggleBounce() {
                    if (marker.getAnimation() !== null) {
                        marker.setAnimation(null);
                    } else {
                        marker.setAnimation(google.maps.Animation.BOUNCE);
                    }
                }
               
                
                

		function initialize () {
			var mapOptions = {
				zoom: 16,
				center: new google.maps.LatLng(-23.539, -46.2283),
				mapTypeId: google.maps.MapTypeId.ROADMAP,

				mapTypeControl: false,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
					position: google.maps.ControlPosition.LEFT_CENTER
				},
				panControl: false,
				panControlOptions: {
					position: google.maps.ControlPosition.TOP_RIGHT
				},
				zoomControl: false,
				zoomControlOptions: {
					style: google.maps.ZoomControlStyle.LARGE,
					position: google.maps.ControlPosition.TOP_RIGHT
				},
				scaleControl: false,
				scaleControlOptions: {
					position: google.maps.ControlPosition.TOP_LEFT
				},
				streetViewControl: false,
				streetViewControlOptions: {
					position: google.maps.ControlPosition.LEFT_TOP
				},
				styles: [{/*	 
                                    "featureType":"poi",
                                        "stylers":[{"visibility":"off"}]},
                                        {"stylers":[{"saturation":-70},
                                                {"lightness":37},
                                                {"gamma":1.15}]},
                                        {"elementType":"labels",
                                            "stylers":[{"gamma":0.26},
                                                {"visibility":"off"}]},
                                        {"featureType":"road",
                                            "stylers":[{"lightness":0},
                                                {"saturation":0},
                                                {"hue":"#ffffff"},
                                                {"gamma":0}]},
                                        {"featureType":"road",
                                            "elementType":"labels.text.stroke",
                                            "stylers":[{"visibility":"off"}]},
                                        {"featureType":"road.arterial",
                                            "elementType":"geometry",
                                            "stylers":[{"lightness":20}]},
                                        {"featureType":"road.highway",
                                            "elementType":"geometry",
                                            "stylers":[{"lightness":50},
                                                {"saturation":0},
                                                {"hue":"#ffffff"}]},
                                        {"featureType":"administrative.province",
                                            "stylers":[{"visibility":"on"},
                                                {"lightness":-50}]},
                                        {"featureType":"administrative.province",
                                            "elementType":"labels.text.stroke",
                                            "stylers":[{"visibility":"off"}]},
                                        {"featureType":"administrative.province",
                                            "elementType":"labels.text",
                                            "stylers":[{"lightness":20}]*/
            }]
			};
			var marker;
			mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
                        cont = 1;
                        var bounds = new google.maps.LatLngBounds();
			for (var key in markersData)                                
				markersData[key].forEach(function (item) {
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
						map: mapObject,
                                                animation: google.maps.Animation.DROP,
						icon: item.map_icon_url,
					});
                                        
                                        bounds.extend(marker.position);
                                        mapObject.fitBounds(bounds);
                                        
					if ('undefined' === typeof markers[key])
						markers[key] = [];
					markers[key].push(marker);    
                                        
					google.maps.event.addListener(marker, 'click', (function () {                                            
                                            closeInfoBox();
                                            getInfoBox(item).open(mapObject, this);
                                            //mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));      
                                        }));
				
				});
                            
                  
                  
                      
                      var ad = '<ins class="adsbygoogle" \
                                             style="display:inline-block;width:320px;height:100px" \
                                             data-ad-client="ca-pub-7836244233199181"      \
                                             data-ad-slot="5090961152"></ins>  ';
 
    var adNode = document.createElement('div');
    adNode.innerHTML = ad;
 
    
    mapObject.controls[google.maps.ControlPosition.LEFT_CENTER ].push(adNode);
    
 
    google.maps.event.addListenerOnce(mapObject, 'tilesloaded', function() {
      (adsbygoogle = window.adsbygoogle || []).push({});
    });
                  
                  
              /*                        
                var contentString = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></scr'+'ipt> '+
                                    '<!-- Publicidade -->                                           '+ 
                                    '    <ins class="adsbygoogle"                                   '+
                                    '         style="display:inline-block;width:320px;height:100px" '+
                                    '         data-ad-client="ca-pub-7836244233199181"      '+
                                    '         data-ad-slot="5090961152"></ins>              '+    
                                    '    <script>                                           '+
                                    '    (adsbygoogle = window.adsbygoogle || []).push({}); '+
                                    '    </scr'+'ipt> ';

                var anuncioLatlng = new google.maps.LatLng(-23.550, -46.10083);

                infowindow = new google.maps.InfoWindow({
                    content: "<script>(adsbygoogle = window.adsbygoogle || []).push({}); </scr"+"ipt>  ",
                    pixelOffset: new google.maps.Size(100,100),
                    position:  anuncioLatlng 
            });
*/
            
            //infowindow.open(mapObject,null);
            
            };




		function hideAllMarkers () {
			for (var key in markers)
				markers[key].forEach(function (marker) {
					marker.setMap(null);
				});
		};

		function toggleMarkers (category) {
			hideAllMarkers();
			closeInfoBox();

			if ('undefined' === typeof markers[category])
				return false;
			markers[category].forEach(function (marker) {
				marker.setMap(mapObject);
				marker.setAnimation(google.maps.Animation.DROP);

			});
		};
		
		function closeInfoBox() {
			$('div.infoBox').remove();
		};


                function getInfoBox(item) {
                        var htmlt =   '<div class="marker_info none" id="marker_info">' +                                 
				'<div class="info" id="info">'+
                                '<span class="direita"> <a href="javascript:closeInfoBox();">&nbsp;X&nbsp;</a> </span>';
                        if((item.map_image_url).trim() != ''){
                            htmlt = htmlt + '<img src="' + item.map_image_url + '" class="logotype" alt="'+item.name_point+'"/>' ;
                            }
                                    
			htmlt = htmlt + '<h2>'+ item.name_point +'<span></span></h2>' +
				'<span>'+ item.description_point +'</span>' +				
                                '<a href="<?php echo ROOT_URL ?>lugares/'+item.url+'" class="green_btn">Mais Detalhes</a>' +
				'<span class="arrow"></span>' +
				'</div>' +
				'</div>';
                    
			return new InfoBox({
				content: htmlt,
				disableAutoPan: true,
				maxWidth: 0,
				pixelOffset: new google.maps.Size(40, -210),
				closeBoxMargin: '50px 2px',
				closeBoxURL: '',
				isHidden: false,
				pane: 'floatPane',
				enableEventPropagation: true
			});
                    }
                    













</script>