<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Luxor Fabric</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style-mobi.css">
    <link href="css/blog.css" rel="stylesheet" type="text/css">
  	<link rel="stylesheet" type="text/css" href="css/media.css">
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>
<body>
    <?php 
      include 'Codephp/connectdb.php'; 
      include "header.php";
    ?>

<div id="blog">
    <section id="blog-section" >
     <div class="container">
        <h3>ข่าวสารและโปรโมชั่น</h3>
       <div class="row">
         <div class="col-lg-8">
           <div class="row">

              <?php 
                $sqlBlog = "SELECT * FROM `blog` order by id_blog desc";
                $queryBlog = mysqli_query($connect,$sqlBlog);
                while($blog = mysqli_fetch_array($queryBlog)){
                ?>
                  <div class="col-lg-6 col-md-6">
                    <aside>
                      <img class="img-responsive center-block" src="./<?php echo $blog['img_blog']; ?>" class="img-responsive">
                      <div class="content-title">
                        <div class="text-center">
                          <h3><a href="detailBlog.php?idblog=<?php echo $blog['id_blog']; ?>"><?php echo mb_substr($blog['titleBlog'],0,25,'UTF-8')."..."; ?></a></h3>
                        </div>
                      </div>
                    </aside>
                  </div> 
                <?php
                }
              ?>    
               
                

           </div>
          </div>
           
<!--           // RECENT POST===========-->
         <div class="col-lg-4">           
               <div class="widget-sidebar">
                 <h2 class="title-widget-sidebar">// RECENT POST</h2>
                   <div class="content-widget-sidebar">
                    <ul>
                     <li class="recent-post">
                        <div class="post-img">
                         <img class="img-responsive center-block" src="./images/recent1.png" class="img-responsive">
                         </div>
                         <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                         <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni 2014</small></p>
                        </li>
                        <hr>
                        
                        <li class="recent-post">
                        <div class="post-img">
                         <img class="img-responsive center-block" src="./images/recent2.png" class="img-responsive">
                         </div>
                         <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                         <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni 2014</small></p>
                        </li>
                        <hr>
                        
                        <li class="recent-post">
                        <div class="post-img">
                         <img class="img-responsive center-block" src="./images/recent3.png" class="img-responsive">
                         </div>
                         <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                         <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni 2014</small></p>
                        </li>
                        <hr>
                        
                        <li class="recent-post">
                        <div class="post-img">
                         <img class="img-responsive center-block" src="./images/recent4.png" class="img-responsive">
                         </div>
                         <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                         <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni 2014</small></p>
                        </li>
                        
                        
                    </ul>
                   </div>
                 </div>
             </div>
           </div>
         </div>
    </section>
</div>
<?php require 'footer.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
     <script>
         $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip(); 
         });
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
              acc[i].onclick = function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight){
                  panel.style.maxHeight = null;
                } else {
                  panel.style.maxHeight = panel.scrollHeight + "px";
                } 
              }
            }
</script>

       

</body>
</html>