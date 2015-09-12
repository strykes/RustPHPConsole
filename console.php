<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<?php
header('Content-Type: text/html; charset=UTF-8');
include( "includes/functions.php");

for ( $i = 0; $i < 50; $i++ )
{
	print("<script type=\"text/javascript\">parent.addstuff(\"console\",\"<!-- abcdefghijklmnopqrstuvwxyz1234567890aabbccddeeffgghhiijjkkllmmnnooppqqrrssttuuvvwwxxyyzz11223344556677889900abacbcbdcdcededfefegfgfhghgihihjijikjkjlklkmlmlnmnmononpopoqpqprqrqsrsrtstsubcbcdcdedefefgfabcadefbghicjkldmnoepqrfstugvwxhyz1i234j567k890laabmbccnddeoeffpgghqhiirjjksklltmmnunoovppqwqrrxsstytuuzvvw0wxx1yyz2z113223434455666777889890091abc2def3ghi4jkl5mno6pqr7stu8vwx9yz11aab2bcc3dd4ee5ff6gg7hh8ii9j0jk1kl2lmm3nnoo4p5pq6qrr7ss8tt9uuvv0wwx1x2yyzz13aba4cbcb5dcdc6dedfef8egf9gfh0ghg1ihi2hji3jik4jkj5lkl6kml7mln8mnm9ono -->\");</script>");
	doflush();
}

$data = pack("VV",1,03).$config["server_rcon"].chr(0).''.chr(0);
$data = pack("V",strlen($data)).$data;
fwrite($conn, $data, strlen($data));
$started = false;
while ($conn > 0)  {
    /*while($size = @fread($conn, 4))
    {
    	if(strlen($size)>=4)
    	{
       		$size = unpack('V1Size',$size);
      		if ($size["Size"] > 4096) {
            	$packet = "\x00\x00\x00\x00\x00\x00\x00\x00".fread($conn,4096);
        	} 
        	else {
            	$packet = fread($conn,$size["Size"]);
        	}
        	print("<script type=\"text/javascript\">parent.addstuff(\"console\",\"".addslashes($packet)."\");</script>");
        	doflush();
        }
    }*/
	$size = @fread($conn, 4);
	
	
    if(strlen($size)>=4)
    	$size = unpack('V1Size',$size);
    if(isset($size) && isset($size["Size"]))
    {
    	if ($size["Size"] > 4096)
     		$packet = "\x00\x00\x00\x00\x00\x00\x00\x00".fread($conn, 4096);
      	elseif ($size["Size"]>0)
        	$packet = fread($conn, $size["Size"]);
    }

    print("<script type=\"text/javascript\">parent.addstuff(\"console\",\"".addslashes($packet)."\");</script>");
  	if(!$started)
  	{
  		sendcmd($conn, "status");
  		$started = true;
  	}
    $packet = false;
    doflush();
}
function doflush() {
    print str_pad('', intval(ini_get('output_buffering')))."\n";
    flush();
}
?> </div> 
