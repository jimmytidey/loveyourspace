
<? 
    $project_id = intval($_GET['project_id']);
    $title = "Love your space";
    include('header.php');

?>

<h1 id='tite'><? echo $project_data['title'] ?></h1>
<p id='description'><? echo $project_data['description'] ?></p>
<input type='hidden' id='project_id' name='project_id' value='<?=$project_id ?>' />


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    function initialize() {
        
        var myOptions = {
         zoom: 16,
         center: new google.maps.LatLng(<? echo $project_data['lat'] ?>, <? echo $project_data['lng'] ?>),
         mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
        var myLatlng = new google.maps.LatLng(<? echo $project_data['lat'] ?>, <? echo $project_data['lng'] ?>);
        var marker = new google.maps.Marker({
            position: myLatlng, 
            map: map,
            title:"<? echo $project_data['title'] ?>"
        });    
    }
    
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="map_canvas"></div>

<?  
    echo "<div id='messages'>";
    foreach($message_data as $message) { 
        echo "<p class='message'>";
        echo "<span class='message_date'>" . date("F j", $message['time']) . "</span>";
        echo($message['text']); 
        echo "</p>";
    }
    echo"</div>";

?>

<form id='message_form'>
    <textarea id='message_text' name='message_text'></textarea>

    <input type='button' value='add a message' id='save_message' / >
</form>

<p>Why not join in - enter your email below...</p>
<form id='volunteer_form'>
    <input id='email_address' value='Your email' name='email_address' />
    <input type='button' value='Join in!' id='join_in' / >
</form>

<a href="https://twitter.com/share" class="twitter-share-button" data-url="" data-via="your_screen_name" data-lang="en" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<iframe src="//www.facebook.com/plugins/like.php?href=<? echo urlencode(curPageURL()); ?>&amp;send=false&amp;layout=box_count&amp;width=43&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90&amp;appId=188513601267454" scrolling="no" id='fb_like' frameborder="0" style="border:none; overflow:hidden; width:50px; height:90px;" allowTransparency="true"></iframe>



<script>

$(document).ready(function(){ 
   $('#save_message').click(function(){ 
       
       var message      = $('#message_text').val(); 
       var project_id   = $('#project_id').val();
       
       if(!message_text) { 
           alert('You must enter some text');
       }
       else { //save message 
           $.post('save_message.php', {message: message , project_id: project_id},   function(data) {
             var html = "<p class='message'><span class='message_date'>YOU:</span>"+message+"</p>";
             $('#messages').append(html);
           });   
       }
    });
})


</script>





<? include('volunteer.php'); ?>

<? include('footer.php'); ?>

<?
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


?>