
function loadMap() {

    var lat = getParameterByName('lat');
    var long = getParameterByName("long");
    var barangayname = getParameterByName("bname");
    var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
        /* No need to set credentials if already passed in URL */
        center: new Microsoft.Maps.Location(lat, long),
        zoom: 18 });
        var center = map.getCenter();
var infobox = new Microsoft.Maps.Infobox(center, { title: barangayname,
    description: 'Seattle' });
infobox.setMap(map);
    var contourLine1, contourLine2, contourLine3, contourLine4, contourLine5, contourLine6;
    var layer;
    Microsoft.Maps.loadModule('Microsoft.Maps.Contour', function () {
        contourLine1 = new Microsoft.Maps.ContourLine([
                          new Microsoft.Maps.Location(13.023739, 123.452538),
                          new Microsoft.Maps.Location(13.023546, 123.452775),
                          new Microsoft.Maps.Location(13.024076, 123.452981),
                          new Microsoft.Maps.Location(13.024345, 123.452900),
                          new Microsoft.Maps.Location(13.024862, 123.452909),
                          new Microsoft.Maps.Location(13.025031, 123.452502),
                          new Microsoft.Maps.Location(13.025465, 123.452002),
                          new Microsoft.Maps.Location(13.025996, 123.451413),
                          new Microsoft.Maps.Location(13.026175, 123.450726),
                          new Microsoft.Maps.Location(13.025338, 123.450752),
                          new Microsoft.Maps.Location(13.024523, 123.451701)], 4000);
      contourLine2 = new Microsoft.Maps.ContourLine([
                          new Microsoft.Maps.Location(13.023739, 123.452538),
                          new Microsoft.Maps.Location(13.023546, 123.452775),
                          new Microsoft.Maps.Location(13.024076, 123.452981),
                          new Microsoft.Maps.Location(13.024345, 123.452900),
                          new Microsoft.Maps.Location(13.024862, 123.452909),
                          new Microsoft.Maps.Location(13.025031, 123.452502),
                          new Microsoft.Maps.Location(13.025465, 123.452002),
                          new Microsoft.Maps.Location(13.025996, 123.451413),
                          new Microsoft.Maps.Location(13.026175, 123.450726),
                          new Microsoft.Maps.Location(13.025338, 123.450752),
                          new Microsoft.Maps.Location(13.024523, 123.451701)], 3000);
        layer = new Microsoft.Maps.ContourLayer([contourLine1,contourLine2], { colorCallback: assignContourColor, polygonOptions: { strokeColor: 'rgba(255, 255, 255, 0)' } });
        map.layers.insert(layer);
    });
    function assignContourColor(value) {
        var color;
        if (value >= 4000) {
            color = 'rgba(25, 150, 65, 0.5)';
        }
        else if (value >= 3500) {
            color = 'rgba(140, 202, 32, 0.5)';
        }
        else if (value >= 3000) {
            color = 'rgba(255, 255, 0, 0.5)';
        }
        else if (value >= 2000) {
            color = 'rgba(235, 140, 14, 0.5)';
        }
        return color;
    }

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
