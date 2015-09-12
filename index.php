<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<body>
		<div name="console" id="console" class="console">
		</div>
		
		<iframe src="console.php" width=0px height=0px></iframe>
		
		<div name="command" id="command" class="command">
			<form id="sendcommand" action="includes/send.php" method="post">
				<input type="text" id="cmd" name="cmd" size=100 />
				<input type="submit" id="send" value="Send" />
			</form>
		</div>
	</body>
</html>
