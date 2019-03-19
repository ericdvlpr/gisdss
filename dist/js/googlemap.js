function loadMapScenario() {
    var map = new Microsoft.Maps.Map(document.getElementById('map'), {
        /* No need to set credentials if already passed in URL */
        center: new Microsoft.Maps.Location(13.024523, 123.451701),
        zoom: 14 });
    var center = map.getCenter();
    var contourLine1, contourLine2, contourLine3, contourLine4, contourLine5, contourLine6;
    var layer;
    Microsoft.Maps.loadModule('Microsoft.Maps.Contour', function () {

      stormsurge = new Microsoft.Maps.ContourLine([
                        new Microsoft.Maps.Location( 13.029371, 123.437190),
                        new Microsoft.Maps.Location( 13.029699, 123.439700),
                        new Microsoft.Maps.Location( 13.028436, 123.443702),
                        new Microsoft.Maps.Location( 13.026906, 123.448393),
                        new Microsoft.Maps.Location( 13.024056, 123.452179),
                        new Microsoft.Maps.Location( 13.021646, 123.454018),
                        new Microsoft.Maps.Location( 13.022306, 123.454781),
                        new Microsoft.Maps.Location( 13.026011, 123.451328),
                        new Microsoft.Maps.Location( 13.027851, 123.448412),
                        new Microsoft.Maps.Location( 13.029142, 123.445746),
                        new Microsoft.Maps.Location( 13.029730, 123.443306),
                        new Microsoft.Maps.Location( 13.030112, 123.441823),
                        new Microsoft.Maps.Location( 13.030500, 123.439428)], 3500);
    flood0 = new Microsoft.Maps.ContourLine([
                        new Microsoft.Maps.Location(  13.029378, 123.444127),
                        new Microsoft.Maps.Location(  13.031679, 123.445619),
                        new Microsoft.Maps.Location(  13.029502, 123.446056),
                        new Microsoft.Maps.Location(  13.028899, 123.447267),
                        new Microsoft.Maps.Location(  13.028266, 123.448509),
                        new Microsoft.Maps.Location(  13.029164, 123.450175),
                        new Microsoft.Maps.Location(  13.031679, 123.445619)], 3000);
    flood1 = new Microsoft.Maps.ContourLine([
                        new Microsoft.Maps.Location( 13.037369, 123.441434),
                        new Microsoft.Maps.Location( 13.038620, 123.442646),
                        new Microsoft.Maps.Location( 13.038176, 123.443716),
                        new Microsoft.Maps.Location( 13.039218, 123.445067),
                        new Microsoft.Maps.Location( 13.038357, 123.445876),
                        new Microsoft.Maps.Location( 13.036941, 123.443665),
                        new Microsoft.Maps.Location( 13.035858, 123.442145),
                        new Microsoft.Maps.Location( 13.034664, 123.440205),
                        new Microsoft.Maps.Location( 13.035819, 123.440476)], 3000);
    flood2 = new Microsoft.Maps.ContourLine([
                      new Microsoft.Maps.Location( 13.032335, 123.445197),
                      new Microsoft.Maps.Location( 13.034495, 123.446839),
                      new Microsoft.Maps.Location( 13.036953, 123.448351),
                      new Microsoft.Maps.Location( 13.040924, 123.451024),
                      new Microsoft.Maps.Location( 13.047618, 123.455478),
                      new Microsoft.Maps.Location( 13.046713, 123.457121),
                      new Microsoft.Maps.Location( 13.045249, 123.456715),
                      new Microsoft.Maps.Location( 13.043914, 123.456559),
                      new Microsoft.Maps.Location( 13.042686, 123.456781),
                      new Microsoft.Maps.Location( 13.042095, 123.455625),
                      new Microsoft.Maps.Location( 13.043049, 123.453619),
                      new Microsoft.Maps.Location( 13.041027, 123.452319),
                      new Microsoft.Maps.Location( 13.037959, 123.450471),
                      new Microsoft.Maps.Location( 13.034728, 123.448356),
                      new Microsoft.Maps.Location( 13.031810, 123.446289)], 3000);
  flood3 = new Microsoft.Maps.ContourLine([
                    new Microsoft.Maps.Location( 13.043653, 123.444722),
                    new Microsoft.Maps.Location( 13.044440, 123.445539),
                    new Microsoft.Maps.Location( 13.045373, 123.446162),
                    new Microsoft.Maps.Location( 13.046807, 123.446445),
                    new Microsoft.Maps.Location( 13.046819, 123.445011),
                    new Microsoft.Maps.Location( 13.045908, 123.444618),
                    new Microsoft.Maps.Location( 13.045126, 123.444084),
                    new Microsoft.Maps.Location( 13.046188, 123.443183),
                    new Microsoft.Maps.Location( 13.047385, 123.443895),
                    new Microsoft.Maps.Location( 13.047835, 123.445241),
                    new Microsoft.Maps.Location( 13.049527, 123.446614),
                    new Microsoft.Maps.Location( 13.047680, 123.447555),
                    new Microsoft.Maps.Location( 13.046869, 123.447569),
                    new Microsoft.Maps.Location( 13.046673, 123.446919),
                    new Microsoft.Maps.Location( 13.045783, 123.446802),
                    new Microsoft.Maps.Location( 13.044354, 123.446178),
                    new Microsoft.Maps.Location( 13.043222, 123.445102)], 3000);

        layer = new Microsoft.Maps.ContourLayer([stormsurge,flood0,flood1,flood2,flood3], { colorCallback: assignContourColor, polygonOptions: { strokeColor: 'rgba(255, 255, 255, 0)' } });
        map.layers.insert(layer);
    });

    function assignContourColor(value) {
        var color;
        if (value >= 4000) {
            color = 'rgba(0, 116, 184, 0.6)';
        }
        else if (value >= 3500) {
            color = 'rgba(0, 166, 90, 0.5)';
        }
        else if (value >= 3000) {
            color = 'rgba(221, 75, 57, 0.5)';
        }
        else if (value >= 2000) {
            color = 'rgba(0, 166, 90, 0.3)';
        }
        return color;
    }
}
