
	function preloader() {
  if (sessionStorage.getItem('preloader-uuid-here')) {
  	document.getElementById("preloader_malc").style.display = "none";
  	document.getElementById("preloader").style.display = "none";
    
    return;
  } else {
    document.getElementById("preloader_malc").style.display = "block";
    document.getElementById("preloader").style.display = "block";
    sessionStorage.setItem('preloader-uuid-here', '1');

    setTimeout(function() {

			document.getElementById("preloader_malc").style.display = "none";

		}, 2700);

  }
}

preloader();
