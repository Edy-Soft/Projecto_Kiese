
// Code reference slide show images
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("mySlidesImage-dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active_image", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active_image";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
}

//*******************************************************************************************************************************************************
// Code about autocomplete text of form Cotacao
 $(document).ready(function() {
  $("#marca_modelo").keyup(function(){
    var query = $("#marca_modelo").val();
    if (query.length > 2) {
          /* Ajax code - Send reques to php page */
      $.ajax(
      {
        url:'autocomplete.php',
        method:'POST',
        data:{
          search: 1,
          q: query
          },
          success: function(data){
            $("#response").html(data);
          },
          dataType: 'text'
        }); /* end of ajax code */
    }

    if (query.length <= 0) {
      $("#response").html(""); 
    }
        
  });

  $(document).on('click', 'li', function(){
    var bens = $(this).text();
    $("#marca_modelo").val(bens);
    $("#response").html("");
  });

});
 
