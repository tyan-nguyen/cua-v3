document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY > 60) {
        document.getElementById('header-nav').classList.add('fixed-top');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        document.getElementById('header-nav').classList.remove('fixed-top');
         // remove padding top from body
        document.body.style.paddingTop = '0';
      } 
  });
}); 
// DOMContentLoaded  end


/*function setColor(color){
	$('.thumb-image-color').attr('src', '/products/' + $('.thumb-image-color').attr('data-name') + '-' + color + '.png');
	$('.image-color').attr('src', '/products/' + $('.image-color').attr('data-name') + '-' + color + '.png');
	$('.img-color').removeClass('img-color-active');
	$('.img-color-'+color).addClass('img-color-active');
}*/