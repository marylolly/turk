
var images = document.querySelectorAll('.photo img');
var tab = document.querySelectorAll('.rec');

function galleryspin(n){
  if (n==1) {
    images[1].className = "";
    images[2].className = "";
    images[0].className = "shown";
    tab[0].className = "rec active";
    tab[1].className = "rec";
    tab[2].className = "rec";

  }
  else {
    if (n==2) {
    images[0].className = "";
    images[2].className = "";
    images[1].className = "shown";
    tab[1].className = "rec active";
    tab[0].className = "rec";
    tab[2].className = "rec";
  }

  else {
    images[0].className = "";
    images[1].className = "";
    images[2].className = "shown";
    tab[2].className = "rec active";
    tab[0].className = "rec";
    tab[1].className = "rec";
  }
}
}
var ii = 1;
  setInterval(function(){
  galleryspin(ii)
  ii++;
  if(ii == 5)
  {
   ii = 1;
  }
},6000)