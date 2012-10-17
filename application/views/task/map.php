<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC80hmE9i07_ASLLtv9XthF6NG_BaNZnY4&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {

        var mapOptions = {
          center: new google.maps.LatLng(<?php echo $task['latitude']?>,<?php echo $task['longitude']?>) ,
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo $task['latitude']?>,<?php echo $task['longitude']?>),
            title: "<?php echo $task['name'];?>"
        });
        marker.setMap(map);
      }
    </script>
  </head>
  <body onload="initialize()">
    <div id="map_canvas" style="width:100%; height:100%"></div>
  </body>
</html>