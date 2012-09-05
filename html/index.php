<? 
    $title='Love your space';
    $page_name='index';
    include('header.php');
    
?>


<!--- do map -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    function initialize() {
        
        var myOptions = {
         zoom: 12,
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
                $description = htmlentities($project['description'], ENT_QUOTES, 'ISO-8859-1');
                
            ?>
                
                var myLatlng = new google.maps.LatLng(<? echo $project['lat'] ?>, <? echo $project['lng'] ?>);
                var marker = new google.maps.Marker({
                     position: myLatlng, 
                     map: map,
                     title:"<? echo htmlspecialchars($project['title']) ?>"
                 });    
                 var content = '<a href="project.php?project_id=<? echo $project['id'] ?> " >   <? echo $description  ?> </a>';
                 var infowindow = new google.maps.InfoWindow({
                         content: content,
                         maxWidth: 200
                     });
                infowindow.open(map,marker);
                 
            
            
            <?
        }
        
        
        ?>

    }
    
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


<img src='resources/cycle.png'>

<h1>Join in with an existing project</h1>
<div id='map_container'>
    <div id="map_canvas"></div>
</div>

<h1>Start a new project</h1>
<p>We'll send you an action pack, help you promote the project and we might even be able to help with some money...</p>

<a href='new.php' id='new_project_btn'>CLICK HERE TO START</a>


<h1>Be Inspired</h1>
<p>Read our case studies of stuff that's already happened</p>


<? include('footer.php'); ?>
