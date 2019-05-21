<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Algemene Voorwaarden</title>
</head>

<?php include 'includes/header.php'; ?>
<body>

 
 <script language="JavaScript" type="text/javascript">
 var interval;
 var minutes = 10;
 var seconds = 10;

 function countdown(element) {
     interval = setInterval(function(timer) {
         var el = document.getElementById(element);
         if(seconds == 0) {
             if(minutes == 0) {
                 (el.innerHTML = "Veiling Gesloten!");     

                 clearInterval(interval);
                 return;
             } else {
                 minutes--;
                 seconds = 60;
             }
         }
         if(minutes > 0) {
             var minute_text = minutes + (minutes > 1 ? ' minutes' : ' minute');
         } else {
             var minute_text = '';
         }
         var second_text = seconds > 1 ? '' : '';
         el.innerHTML = minute_text + ' ' + seconds + ' seconds' + second_text + '';
         seconds--;
     }, 1000);
 }
var start = document.getElementById('start');

start.onclick = function(timer) {
 if (!interval) {
     countdown('countdown');
 }
}

</script>



<div id='countdown'></div>
<input type="button" onclick="countdown('countdown');this.disabled = true;" value="Start Veiling" />

</body>

<?php include 'includes/footer.php' ; ?>

</html>