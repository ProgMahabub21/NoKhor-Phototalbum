

<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
 body {
  margin: 10%;
   margin-left:20%;
}

#slider {
  position: relative;
  width: 800px;
  height: 400px;
 
  overflow: hidden;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
}
#slider ul {
  position: relative;
  list-style: none;
  height: 100%;
  width: 10000%;
  padding: 0;
  margin: 0;
  transition: all 750ms ease;
  left: 0;
}
#slider ul li {
  position: relative;
  height: 100%;
 
  float: left;
}
#slider ul li img{
  width: 800px;
  height: 400px;
}
 
#slider #prev, #slider #next {
  width: 50px;
  line-height: 50px;
  border-radius: 50%;
  font-size: 2rem;
  text-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
  text-align: center;
  color: white;
  text-decoration: none;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  transition: all 150ms ease;
}
#slider #prev:hover, #slider #next:hover {
  background-color: rgba(0, 0, 0, 0.5);
  text-shadow: 0;
}
#slider #prev {
  left: 10px;
}
#slider #next {
  right: 10px;
}
  </style>
</head>
<body>
  <div id="slider">
    
  <ul id="slideWrap"> 
    <?php 
          $dir = "../photo-slider-web/PhotosOriginal/*.jpg";
          //get the list of all files with .jpg extension in the directory and safe it in an array named $images
          $images = glob( $dir );
          
        
          //extract only the name of the file without the extension and save in an array named $find
          foreach( $images as $image ):
              echo "<li><img src='" . $image . "' /></li>";
          endforeach;
    
    ?>    
    </ul>
    <a id="prev" href="#">&#8810;</a>
    <a id="next" href="#">&#8811;</a>
  </div>


  <script>
    var responsiveSlider = function() {

    //select all image from directory and assign to a var


var slider = document.getElementById("slider");
var sliderWidth = slider.offsetWidth;
var slideList = document.getElementById("slideWrap");
var count = 1;
var items = slideList.querySelectorAll("li").length;
var prev = document.getElementById("prev");
var next = document.getElementById("next");

window.addEventListener('resize', function() {
  sliderWidth = slider.offsetWidth;
});

var prevSlide = function() {
  if(count > 1) {
    count = count - 2;
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
  else if(count = 1) {
    count = items - 1;
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
};

var nextSlide = function() {
  if(count < items) {
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
  else if(count = items) {
    slideList.style.left = "0px";
    count = 1;
  }
};

next.addEventListener("click", function() {
  nextSlide();
});

prev.addEventListener("click", function() {
  prevSlide();
});

setInterval(function() {
  nextSlide()
}, 5000);

};

window.onload = function() {
responsiveSlider();  
}


  </script>
</body>
</html>