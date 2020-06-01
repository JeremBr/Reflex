<?php

// setcookie('langue', "en", time() + 365*24*3600, null, null, false, true);

function trad($fr, $en){
	if (isset($_COOKIE['langue']) && $_COOKIE['langue']=="en") {
		return $en;
	}
	else{
		return $fr;
	}
}

function getFlag(){
	if (isset($_COOKIE['langue']) && $_COOKIE['langue']=="en"){
		return './img/FR.png';
	}
	else{
		return './img/UK.png';
	}
}



?>

<script type="text/javascript">

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function afficher() {
	var langue = getCookie('langue');
	if (langue=="en"){
		document.cookie = "langue=fr; expires=Sun, 28 Feb 2021 00:00:00 UTC; path=/"
	}
	else{
		document.cookie = 'langue=en; expires=Sun, 28 Feb 2021 00:00:00 UTC; path=/'
	}
	document.location.reload();
}

</script>



