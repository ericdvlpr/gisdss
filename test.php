
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <script type='text/javascript'>
    function GetMap() {
        var map = new Microsoft.Maps.Map('#myMap', {});
        //Load the Spatial Math module.
        Microsoft.Maps.loadModule('Microsoft.Maps.SpatialMath', function () {
            var center = map.getCenter();
            var circle1 = createCircle(center, 1, 'rgba(0,0,150,0.5)');
            map.entities.push(circle1);

            var circle2 = createCircle(center, 2, 'rgba(0,0,150,0.4)');
            map.entities.push(circle2);
            var circle3 = createCircle(center, 3, 'rgba(0,0,150,0.3)');
            map.entities.push(circle3);
            var circle4 = createCircle(center, 4, 'rgba(0,0,150,0.2)');
            map.entities.push(circle4);
            var circle5 = createCircle(center, 5, 'rgba(0,0,150,0.1)');
            map.entities.push(circle5);
        });
    }
    function createCircle(center, radius, color) {
        //Calculate the locations for a regular polygon that has 36 locations which will rssult in an approximate circle.
        var locs = Microsoft.Maps.SpatialMath.getRegularPolygon(center, radius, 36, Microsoft.Maps.SpatialMath.DistanceUnits.Miles);
        return new Microsoft.Maps.Polygon(locs, { fillColor: color, strokeThickness: 0 });
    }
    </script>
    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AvvShdvTcK3TECnv9ZnXCPhwmkQ19RJaMXxZbSqNC1VdFAlXStBT2YmL9lrq077H' async defer></script>
</head>
<body>
    <div id="myMap" style="position:relative;width:800px;height:600px;"></div><br />
    <div id="outputPanel"></div>
</body>
</html>
