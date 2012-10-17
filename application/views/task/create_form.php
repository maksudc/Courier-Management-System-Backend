<?php $this->load->view('admin/toolbar'); ?>

<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC80hmE9i07_ASLLtv9XthF6NG_BaNZnY4&sensor=false">
</script>

<script type="text/javascript">
    var geocoder;
    var map;
    var longitude;
    var latitude;
    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var mapOptions = {
            zoom: 8,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    }

    function codeAddress() {
        var address = document.getElementById("address").value;
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
                
                var longitude_input = document.getElementById("longitude");
                longitude_input.value = results[0].geometry.location.lng().toString();
            
                var latitude_input = document.getElementById("latitude");
                latitude_input.value = results[0].geometry.location.lat().toString();
                
                longitude = longitude_input.value;
                latitude = latitude_input.value;
                
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }
    
    function show_map(){
        var frame = document.getElementById("frame");
        var address = document.getElementById("address").value;
        frame.src = "<?php echo base_url() . "index.php/task/show_map/" ?>"+ latitude +"/"+longitude;
        frame.style.display = "block";
    }
</script>
</head>
<div class="span4" id="main-content">
    <?php echo form_open('task/create'); ?>
    <div class="well">
        <div class="clearfix">
            <label class="btn-mini" for="x1Input3">Name</label>
            <input type="text" class="xx-large" size="30" name="name" onmouseover="" required/>
        </div>
        <div class="clearfix">
            <label class="btn-mini" for="x1Input3">Description</label>
            <input type="text" class="xx-large" size="30" name="description" required/>
        </div>
        <div class="clearfix">
            <label class="btn-mini" for="x1Input3">Address</label>
            <input type="text" class="xx-large" size="30" name="address" id="address" onchange="initialize();codeAddress();show_map();" required/>
        </div>
        <div class="clearfix">
            <label class="btn-mini" for="x1Input3">contact no</label>
            <input type="text" class="xx-large" size="30" name="contactno" required/>
        </div>      
        <div class="clearfix">
            <label class="btn-mini" for="x1Input3">Due Date</label>
            <input type="text" id="duedate" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>" class="xx-large" size="30" name="duedate" required/>
        </div>
        <div class="clearfix">
            <label class="btn-mini" for="x1Input3">Due Time</label>
            <input type="text"  class="xx-large" size="30" name="duetime" value="12:00 am" required/>
        </div>
        <div class="clearfix">
            <label class="btn-mini" for="x1Input3">Longitude</label>
            <input type="text" id="longitude" class="xx-large" size="30" name="longitude" onchange="" />
        </div>

        <div class="clearfix">
            <label class="btn-mini" for="x1Input3">Latitude</label>
            <input type="text" id="latitude" class="xx-large" size="30" name="latitude" />
        </div>
        <div class="clearfix">
            <button type="submit" class="btn"> Submit </button>
        </div>

    </div>
    <?php echo form_close(); ?>  
    <script type="text/javascript">
        $("#duedate").datepicker();
    </script>
</div>
<div id="map_canvas"></div>
<div class="span6" style="height: 50%">
    <iframe id="frame"  style="width: 100%;height:100%;display: none;"><iframe>
</div>
