<?php

function sacms($url) {
    $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch, CURLOPT_URL,$url);

    return curl_exec($ch);

    curl_close($ch);
}


if (!empty($_GET['id'])) {

$id = $_GET['id'];
$uri = base64_decode('aHR0cHM6Ly9kbC5zaGFraWIuY3lvdS9zZXJ2ZXIvanNvbi5waHA/');
$con = file_get_contents($uri.'id='.$id); 
	

 $data = json_decode($con); 

$name = $data->title; // File title

$idt = base64_decode('ZGwuc2hha2liLmN5b3U=');

$link = str_replace($idt,$_SERVER['HTTP_HOST'],$data->link); 

$size = $data->size; // File size

$type = $data->type; // File type

$date = $data->date;

$dl_times = $data->download;


$owner = $data->owner;

 
include('header.php');

echo '<div class="container">		<br>											<div id="sendV">	
			</div>										<br><center><div><div class="box"><div class="box-body"> <div class="page-header"> <div class="row align-items-center"> <div class="col-auto"><img src="//dl.shakib.cyou/assets/img/mkv.png" alt="'.$name.'" width="60" height="60"></div> <div class="col"> <h2 class="page-title">'.$name.'</h2> <div class="page-subtitle"> <div class="row"> <div class="col-auto"> <span class="text-reset">File Format : <span class="do-cap">'.$type.'</span></span> </div> </div> </div> </div><div class="col-auto flb_download_button"> <span class="flb_download_buttons"> <a href="'.$link.'"><button class="flb_download_file download_btn w-100 btn">DOWNLOAD FILE ('.$size.')</button></a> </span></div> </div> </div> </div>
</div></div></center><br/>  <br> <br></div></div> ';
			
		}
        
    else {
        header("location: /");
    }
include('footer.php');
?>
