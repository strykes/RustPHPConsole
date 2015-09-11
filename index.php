<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body bgcolor="#000000" style="color:#FFF;">
<script type="text/javascript">
<!--
function addstuff(id,text) {
    var objDiv = document.getElementById(id);
    var doScroll=objDiv.scrollTop>=(objDiv.scrollHeight-objDiv.clientHeight);                 
    $('#' + id ).append(text+"<br>"); // this is jquery!
    if( doScroll) objDiv.scrollTop = objDiv.scrollHeight;  
}
//-->

$(document).ready(function() {
    // Lorsque je soumets le formulaire
    $('#sendcommand').submit(function(e) {
        e.preventDefault();
        var $this = $(this);
        var text = $('#text').val();

        if(text === '') {
            alert('You cant send nothing');
        } else {
            $.ajax({
                url: $this.attr('action'),
                type: $this.attr('method'),
                data: $this.serialize(),
                success: function(html) {
                }
            });
        }
    });
});
</script>
<style type="text/css">
.console {
    width:800px;
    height:300px;
    overflow:scroll;
    font-family: "Courier New", Courier, monospace;
    background-color:black;
}
.command {
    width:800px;
    height:20px;
    overflow:hidden;
    font-family: "Courier New", Courier, monospace;
    background-color:black;
}

</style>
<div name="console" id="console" class="console">
</div>

<iframe src="console.php" width=0px height=0px>
</iframe>

<div name="command" id="command" class="command">
<form id="sendcommand" action="send.php" method="post">
	<input type="text" id="cmd" name="cmd" size=100 />
	<input type="submit" id="send" value="Send" />
</form>
</div>
</body>
