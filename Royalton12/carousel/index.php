	
<!doctype html>
<html lang="es">
    <head>
        <meta lang="es" />
        <meta charset="utf-8" />
        <link href="carousel/slide.css" rel="stylesheet" type="text/css" />
        <script src="slide.js"></script> 
        <title>Slider con CSS y PHP</title>
    </head>
    <body>


    
        <!-- Slideshow container -->
 <div class="slideshow-container">


<!-- Full-width images with number and caption text -->


<?php 
                $ids = array(1,2,3,4,5); 
                $alt = array(
                    "Slide 1",
                    "Slide 2",
                    "Slide 3",
                    "Slide 4",
                    "Slide 5"
                );     
                $max = count($ids);  
                 	
                    for($s=0;$s<$max;$s++){ ?>
  
    <div class="mySlides fade">
        <div class="numbertext">Imagen<?php echo $ids[$s];?></div>
            <img src="img/<?= $ids[$s]; ?>.jpg" alt="<?= $alt[$s]; ?>" style="width:100%" />
    
    </div>                            	
                    <?php } ?>                       	                         



<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)"><img class="svg" width="100px" src = "img/left-arrow.svg" alt="Mi SVG feliz"/>
</a>
<a class="next" onclick="plusSlides(1)"><img class="svg" width="100px" src = "img/right-arrow.svg" alt="Mi SVG feliz"/>
</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div> 

    </body>
</html>
