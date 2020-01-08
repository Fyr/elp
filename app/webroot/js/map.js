function admin_getGeoObjectData() {
	var data = JSON.parse($.cookie('geo_object'));
	console.log('admin getGetObjectData', data);
	return data || { location: "" };
}

function admin_setGetObjectData(data) {
	if (typeof(data.location) =='string') {
		data.location = (data.location) ? JSON.parse(data.location) : "";
	}
	console.log('admin setGetObjectData', data);
	$.cookie('geo_object', JSON.stringify(data), {path: '/'});
}

function getQueryParams(obj) {
	var aParams = [];
	for (key in obj) {
		aParams.push(key + '=' + obj[key]);
	}
	return aParams.join('&');
}

function reloadMap(obj) {
	console.log('reloadMap');
	$('#div-map').html('');
	if (!obj.h) {
		obj.h = $(window).height() - 318 - 101 - 4;
	}
	$('#div-map').height(obj.h + 4).html(Format.tag('iframe', {
		id: 'i-map',
		src: '/map_poly.html?' + getQueryParams(obj),
		width: '100%',
		height: obj.h + 4
	}));
}