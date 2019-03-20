
function loadMap() {

    var lat = getParameterByName('lat');
    var long = getParameterByName("long");
    var barangayname = getParameterByName("bname");
    var population = getParameterByName("pop");
    var dst = getParameterByName("dst");
    var rgba;
    var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
        /* No need to set credentials if already passed in URL */
        center: new Microsoft.Maps.Location(lat, long),
        zoom: 18 });
        var center = map.getCenter();
var infobox = new Microsoft.Maps.Infobox(center, { title: barangayname,
    description: 'Population:'+population });
infobox.setMap(map);
// var polygon = new Microsoft.Maps.Polygon([new Microsoft.Maps.Location(center.latitude - 0.001, center.longitude - 0.001),
//     new Microsoft.Maps.Location(center.latitude + 0.002, center.longitude - 0.002),
//     new Microsoft.Maps.Location(center.latitude + 0.004, center.longitude + 0.003),  new Microsoft.Maps.Location(center.latitude - 0.005, center.longitude + 0.003)], null);
// map.entities.push(polygon);

    if(dst == 'ss'){
      rgba = 'rgba(0, 166, 90, 0.5)'; //StormSurge
    }else if(dst == 'f'){
      rgba = 'rgba(221, 75, 57, 0.5)';// flood
    }else if(dst == 'l'){
      rgba ='rgba(0, 166, 90, 0.3)'; // landslide
    }else if(dst == 't'){
      rgba = 'rgba(0, 116, 184, 0.6)'; //tsunami
    }

    Microsoft.Maps.loadModule('Microsoft.Maps.SpatialMath', function () {
        var center = map.getCenter();
        var circle1 = createCircle(center, 1, rgba);
        map.entities.push(circle1);
    });

}
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
function createCircle(center, radius, color) {
        //Calculate the locations for a regular polygon that has 36 locations which will rssult in an approximate circle.
        var locs = Microsoft.Maps.SpatialMath.getRegularPolygon(center, radius, 36, Microsoft.Maps.SpatialMath.DistanceUnits.Miles);
        return new Microsoft.Maps.Polygon(locs, { fillColor: color, strokeThickness: 0 });
    }
