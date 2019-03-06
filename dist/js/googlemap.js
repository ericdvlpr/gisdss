function loadMapScenario() {
    var map = new Microsoft.Maps.Map(document.getElementById('map'), {
        /* No need to set credentials if already passed in URL */
        center: new Microsoft.Maps.Location(13.024523, 123.451701),
        zoom: 15 });
    var contourLine1, contourLine2, contourLine3, contourLine4, contourLine5, contourLine6;
    var layer;
    Microsoft.Maps.loadModule('Microsoft.Maps.Contour', function () {
        brgy1contourLine = new Microsoft.Maps.ContourLine([
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



        brgy2contourLine = new Microsoft.Maps.ContourLine([
                          new Microsoft.Maps.Location(13.028408, 123.449856),
                          new Microsoft.Maps.Location(13.028161, 123.450353),
                          new Microsoft.Maps.Location(13.027637, 123.450625),
                          new Microsoft.Maps.Location(13.026963, 123.450662),
                          new Microsoft.Maps.Location(13.026617, 123.450953),
                          new Microsoft.Maps.Location(13.026571, 123.451672),
                          new Microsoft.Maps.Location(13.028216, 123.451672),
                          new Microsoft.Maps.Location(13.029714, 123.449565),
                          new Microsoft.Maps.Location(13.027252, 123.447757),
                          new Microsoft.Maps.Location(13.026824, 123.448532),
                          new Microsoft.Maps.Location(13.027629, 123.449210)], 2000);
        layer = new Microsoft.Maps.ContourLayer([brgy1contourLine,brgy2contourLine], { colorCallback: assignContourColor, polygonOptions: { strokeColor: 'rgba(255, 255, 255, 0)' } });
        map.layers.insert(layer);
    });
    function assignContourColor(value) {
        var color;
        if (value >= 4000) {
            color = 'rgba(0, 116, 184, 0.6)';
        }
        else if (value >= 3500) {
            color = 'rgba(140, 202, 32, 0.5)';
        }
        else if (value >= 3000) {
            color = 'rgba(255, 255, 0, 0.5)';
        }
        else if (value >= 2000) {
            color = 'rgba(0, 166, 90, 0.3)';
        }
        return color;
    }


}
