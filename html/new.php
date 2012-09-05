
<? 
    $project_id = intval($_GET['project_id']);
    $title = "Love your space";
    $page_name = 'new_project';
    include('index_header.php');

//save that form ! 

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date_of_event = strtotime($_POST['date_of_event']);

    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $date_created = time();
    
    $query  = "INSERT INTO projects (title, description, lat, lng, date_created, date_of_event) VALUES ('$title', '$description', '$lat', '$lng', '$date_created', '$date_of_event')";
    mysql_query($query); 
    
    ?>
     
    <h1>Thanks for registering an event</h1>
    <p>Would you like receive some laminated signs to draw attention to this event?</p>
    <p>Give us your email address or phone number below and we'll be in contact to arrange this</p>
    <input type='text' value='email / phone in here..'>
    <br/>
    <input type='button' value='Send!' id='send_email_address'>
    
      <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>
    <p><a href='/'>Check out your event on the map</a></p>
    
    <?
}


else { 
?>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    function initialize() {
        
        var center = new google.maps.LatLng(51.48624683086787, -0.08934974670410156)
        var myOptions = {
         zoom: 13,
         center: center,
         mapTypeId: google.maps.MapTypeId.ROADMAP
        };



        var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions); 
        var marker = new google.maps.Marker({
            position: center,
            map: map,
            draggable: true
        });        
        
        
        window.marker = marker;
        google.maps.event.addListener(marker, 'dragend', function() {
            $('#lat_val').val(marker.position.lat());
            $('#lng_val').val(marker.position.lng());
        });
          
    }     
    
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<a href='/'><img src='resources/purple_logo.png' id='logo' /></a>
<h1>Let's get you started...</h1>
<p>Fill in the details below about a public space that you want to improve.</p>

<p>We'll help you find other volunteers, and assist when the big day comes.</p>

<form id='new_event_form' method='post'  action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p><label for='title'>Title</label> <input type='text' name='title' /></p>
    <br/>
    <p><label for='description'>Description</label><textarea type='text' name='description' ></textarea>  </p> 
    <p><label for='date_of_event'>What date do you want to have your event?</label> <input type='text' name='date_of_event' /></p>        
    
    <br/><br/>
        
    <p>Where is the public space you'd want to work on?</p>
    <div id='map_container'>
        <div id="map_canvas"></div>
    </div>
    <input type='hidden' id='lat_val' name='lat' value='' >
    <input type='hidden' id='lng_val' name='lng' value='' >
    <input type='submit' id='save_project' value='Save your project' name='submit' >
    
</form>

<?

}
?>


<? include('footer.php'); ?>