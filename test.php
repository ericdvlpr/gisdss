<!DOCTYPE html>
<html>
    <head>
        <title>basiccontourlayerHTML</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <style type='text/css'>body{margin:0;padding:0;overflow:hidden;font-family:'Segoe UI',Helvetica,Arial,Sans-Serif}</style>
    </head>
    <body>
        <div id='printoutPanel'></div>

        <div id='myMap' style='width: 100vw; height: 100vh;'></div>
        <script type='text/javascript'>
            function loadMapScenario() {
                var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                    /* No need to set credentials if already passed in URL */
                    center: new Microsoft.Maps.Location(13.024523, 123.451701),
                    zoom: 11 });
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
                    layer = new Microsoft.Maps.ContourLayer([contourLine1], { colorCallback: assignContourColor, polygonOptions: { strokeColor: 'rgba(255, 255, 255, 0)' } });
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
                document.getElementById('printoutPanel').innerHTML = '<div style="background-color: rgba(25, 150, 65, 0.5)">4000m</div><div style="background-color: rgba(140, 202, 32, 0.5)">3500m</div><div style="background-color: rgba(255, 255, 0, 0.5)">3000m</div><div style="background-color: rgba(235, 140, 14, 0.5)">2000m</div>';

            }
        </script>
        <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=AvvShdvTcK3TECnv9ZnXCPhwmkQ19RJaMXxZbSqNC1VdFAlXStBT2YmL9lrq077H&callback=loadMapScenario' async defer></script>
    </body>
</html>
