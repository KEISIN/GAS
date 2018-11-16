<?php
$url="";
if(!empty($_POST)){
     foreach($_POST as $key=>$value){
         $k=mb_convert_encoding(htmlspecialchars($key),"UTF-8","SJIS");
         $v=mb_convert_encoding($value,"UTF-8","SJIS");
        $data[$k]=$v;
     }

echo print_r($data,false);
echo "<br>";
echo print_r($_POST,false);
	$headers = array(
    	'Content-Type: application/x-www-form-urlencoded',
		'Charset: UTF-8'
    );
	$data = http_build_query($data, "", "&");
	$options = array('http' => array(
		'header' => implode("\r\n", $headers),
    	'method' => 'POST',
    	'content' => $data
	));
$options = stream_context_create($options);
$contents = file_get_contents($url, false, $options);
	if($contents==false){
		header("Content-Type: text/html; charset=Shift_JIS");
		echo "<h3>¸”s‚µ‚Ü‚µ‚½</h3>";
	}else{
		header("Content-Type: text/html; charset=Shift_JIS");
		echo "<h3>".$_POST["ans"]."‚Åó•t‚¯‚Ü‚µ‚½B‰ñ“š‚ ‚è‚ª‚Æ‚¤</h3>";
	}
}else{
	echo "–¼‘O‚ğ“ü—Í‚µ‚Ä‚­‚¾‚³‚¢";
}
?>
