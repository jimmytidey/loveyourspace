<? 
    $title='Love your space';
    include('index_header.php');
?>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    function initialize() {
        
        var myOptions = {
         zoom: 13,
         center: new google.maps.LatLng(51.48624683086787, -0.08934974670410156),
         mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
        <?
        $query = "SELECT * FROM projects";
        $result = mysql_query($query);
        $projects = array();
        
        while($row=mysql_fetch_assoc($result)) {array_push($projects, $row);} 
        
        foreach($projects as $project) {
            ?>
            
                var myLatlng = new google.maps.LatLng(<? echo $project['lat'] ?>, <? echo $project['lng'] ?>);
                 var marker = new google.maps.Marker({
                     position: myLatlng, 
                     map: map,
                     title:"<? echo $project['title'] ?>"
                 });    
            
            
            <?
        }
        
        
        ?>

    }
    
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="map_canvas"></div>






<? include('footer.php'); ?>
