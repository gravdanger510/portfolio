<?php
//this is for errors
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$projectname = "";
$textcounter = 0;
$bigcounter = 1;
$lilcounter = 1;
$prototypecounter = 1;
$gifcounter = 1;
$jsondata = file_get_contents("content.json");
$all_content = json_decode($jsondata, true);
	
function makeIntro() {
	// globals();
	global $jsondata, $all_content, $projectname;
	foreach ($all_content['text'] as $content) {
		if (strcmp($projectname, $content['id'])==0) {
			$json_proj = $content;
		}
	}

	echo('<div class="row intro">');
		echo('<div class="columns small-1 medium-3"><p></p></div>');
		echo('<div class ="columns small-10 medium-6 block">');
			echo('<h2 class="title">');
				echo($json_proj["name"]);
			echo('</h2>');
			echo('<h3 class="description">');
				echo($json_proj["category"]);
			echo('</h3>');
			echo('<p>');
				echo($json_proj["intro"]);
			echo('</p>');
		echo('</div>');
		echo('<div class="columns small-1 medium-3"><p></p></div>');
	echo('</div>');
	//BEGIN CONTENT ROW
	echo('<div class="row full content">');
	
}
function makeText(){
	global $jsondata, $all_content, $projectname, $textcounter;
	foreach ($all_content['text'] as $content) {
		if (strcmp($projectname, $content['id'])==0) {
			$json_proj = $content;
		}
	}
	echo('<div class="row text">');
		echo('<div class="columns hide-for-small-only medium-1"><p></p></div>');
		echo('<div class="columns small-12 medium-5">');
			echo('<h4>');
			echo($json_proj["headlines"][$textcounter]);
			echo('</h4>');
			echo('<p>');
			echo($json_proj["copy"][$textcounter]);
			echo('</p>');
			echo('</div>');
		echo('<div class="columns hide-for-small-only medium-6"><p></p></div>');
	echo('</div>');
	$textcounter++;
}
function makeFullImg(){
	global $jsondata, $all_content, $projectname, $bigcounter;
	foreach ($all_content['text'] as $content) {
		if (strcmp($projectname, $content['id'])==0) {
			$json_proj = $content;
		}
	}
	$filepath = "projects/" . $projectname . "/f/" . strval($bigcounter) . ".jpg"; 
	echo('<div class="row full-img">');
		echo('<div class="columns hide-for-small-only large-1"><p></p></div>');
		echo('<div class="columns small-12 large-10"><img src="');
		echo($filepath);
		echo('"></div>');
		echo('<div class="columns hide-for-small-only large-1"><p></p></div>');
	echo('</div>');
	$bigcounter++;
}
function makeHalfImg(){
	global $jsondata, $all_content, $projectname, $lilcounter;
	foreach ($all_content['text'] as $content) {
		if (strcmp($projectname, $content['id'])==0) {
			$json_proj = $content;
		}
	}
	$filepath1 = "projects/" . $projectname . "/h/" . strval($lilcounter) . ".jpg"; 
	$filepath2 = "projects/" . $projectname . "/h/" . strval($lilcounter+1) . ".jpg";
	echo('<div class="row half-img">');
		echo('<div class="columns hide-for-small-only medium-1"><p></p></div>');
		echo('<div class="columns hide-for-small-only medium-5"><img src="');
			echo($filepath1);
		echo('"></div>');
		echo('<div class="columns hide-for-small-only medium-5"><img src="');
			echo($filepath2);
		echo('"></div>');
		echo('<div class="columns hide-for-small-only medium-1"><p></p></div>');
	echo('</div>');
	$lilcounter+=2;
}
function makePrototype(){
	global $jsondata, $all_content, $projectname, $prototypecounter;
	foreach ($all_content['text'] as $content) {
		if (strcmp($projectname, $content['id'])==0) {
			$json_proj = $content;
		}
	}
	$filepath = "http://tylerlmitchell.com/prototypes/" . $projectname . $prototypecounter;
	echo ('<div class ="row hide-for-large-up">');
		echo('<div class="columns hide-for-small-only medium-1"><p></p></div>');
		echo('<div class="columns small-12 medium-5">');
			echo('<p>');
				echo ("Unfortunately, this prototype isn't going to work on this screen size. Sorry about that. It's pretty cool though, and I'd highly reccommend checking out the site on a bigger screen!");
			echo('</p>');
			echo('</div>');
		echo('<div class="columns hide-for-small-only medium-6"><p></p></div>');
	echo ('</div>');
	echo ('<div class="row prototype show-for-large-up">');
		echo('<div class="columns hide-for-small-only medium-1"><p></p></div>');
		echo('<div class="columns small-12 medium-10"><iframe src="');
			echo($filepath);
		echo('"></iframe>');
		//icons
			echo ('<div class="row icons show-for-large-up">');
				echo('<div class="columns hide-for-small-only large-4"><p></p></div>');
				echo('<div class="columns hide-for-small-only large-4">');
					echo ('<div class="icon reload" data-source="');
					echo ($filepath);
					echo('">');
						echo('<img src="reload.svg" alt="Reload Prototype">');
					echo ('</div>');
					echo ('<div class="icon info">');
						echo('<img src="info.svg">');
					echo ('</div>');
					echo ('<a class="icon newTab" target="_blank" href="');
					echo ($filepath);
					echo ('">');
						echo('<img src="newTab.svg" alt="Open in New Tab">');
					echo ('</a>');
				echo ('</div>');
				echo('<div class="columns hide-for-small-only large-4"><p></p></div>');
			echo ('</div>');//end icons row
		echo('</div>');
		// echo ('<div class="row prototype show-for-large-up">');
		// echo('<div class="columns hide-for-small-only medium-1"><p></p></div>');
		// echo('<div class="columns small-12 medium-10">');
		// 	echo ('<iframe src="');
		// 	echo($filepath);
		// echo('"></iframe>');
		// echo ('<a class="iframeLink" target="_blank" href="');
		// echo ($filepath );
		// echo ('">Launch in new tab</a></div>');
		echo('<div class="columns hide-for-small-only medium-1"><p></p></div>');
		

	echo ('</div>');//end prototype row
	

	$prototypecounter++;
}
function makeGif(){
	global $jsondata, $all_content, $projectname, $gifcounter;
	foreach ($all_content['text'] as $content) {
		if (strcmp($projectname, $content['id'])==0) {
			$json_proj = $content;
		}
	}
	$filepath = "projects/" . $projectname . "/g/" . strval($gifcounter) . ".gif"; 
	echo('<div class="row full-img">');
		echo('<div class="columns hide-for-small-only large-1"><p></p></div>');
		echo('<div class="columns small-12 large-10"><img src="');
		echo($filepath);
		echo('"></div>');
		echo('<div class="columns hide-for-small-only large-1"><p></p></div>');
	echo('</div>');
	$gifcounter++;
}

function makeEnd(){
	// END CONTENT ROW
	echo('<div class="row">');
		echo('<div class="columns small-4 large-5"><p></p></div>');
		echo('<div class="columns small-4 large-2 back close-bottom">');
			echo('<div class="x close-bottom">');
				echo('<div class="lefthalf"></div>');
				echo('<div class="righthalf"></div>');
				echo ('<div class="line"></div>');
			echo('</div>');
		echo('</div>');
		echo('<div class="columns small-4 large-5"><p></p></div>');
	echo('</div>');
	echo ('</div>');
}













?>