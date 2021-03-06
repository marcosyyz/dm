<?php 
require '../..model/Item.php';

$item = New Item();
?>


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
	markersData = {<?php
        
            foreach($categorias as $cat){
		echo  "'".$cat."': [";
                foreach($items as $i){
                   echo '{';
                   echo ' name: '.$i['ITEM_NOME'].',';
                   echo ' location_latitude: '.$i['ITEM_LAT'].',';
                   echo ' location_longitude: '.$i['ITEM_LONG'].',';
                   echo ' map_image_url: '.$i['ITEM_IMAGEM'].',';
                   echo ' name_point: NAMEPOINT   ,';
                   echo ' description_point: '.$i['ITEM_DESCRICAO'].',';
                   echo ' url: '.$i['ITEM_URL'];
		}
                echo "]"; // fim categoria
                echo ",";
         ?>}; // fim markersData

function initialize () {
	var mapOptions = {
		zoom: 16,
		center: new google.maps.LatLng(-23.539, -46.2253),
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
		scrollwheel: false
	};
	var
		marker;
	mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
	for (var key in markersData)
		markersData[key].forEach(function (item) {
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
				map: mapObject,
				icon: 'img/icon/' + key + '.png',
			});

			if ('undefined' === typeof markers[key])
				markers[key] = [];
			markers[key].push(marker);
			google.maps.event.addListener(marker, 'mouseover', (function () {
				closeInfoBox();
				getInfoBox(item).open(mapObject, this);
				
			}));

			
		});
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
	return new InfoBox({
		content:
			'<div class="marker_visit" id="marker_info">' +
			'<div class="info" id="info">'+
			'<a href="'+ item.url + '" class="">'+ item.name_point +'</a>' +
			'<span></span>' +
			'</div>' +
			'</div>',
		disableAutoPan: true,
		maxWidth: 0,
		pixelOffset: new google.maps.Size(40, -50),
		closeBoxMargin: '50px 0px',
		closeBoxURL: '',
		isHidden: false,
		pane: 'floatPane',
		enableEventPropagation: true
	});


};




</script>