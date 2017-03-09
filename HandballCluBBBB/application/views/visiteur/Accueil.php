<!-- Item slider-->
<br>
<div class="col-md-8 col-md-offset-2">
    <div class="carousel slide" id="myCarousel">
        <div class="carousel-inner">
                <?php
                $i=0;
                foreach ($lesProduits as $unProduit)
                {
                    if ($i == 0)
                    {
                        echo "<div class='item active'>";
                        $i = 1;
                    }
                    else
                    {
                        echo "<div class='item'>";
                    }
                ?>
                    <div class="col-md-4">
                        <a href="voirUnProduit/<?php echo $unProduit['NOPRODUIT']?>"><h4 class="text-center"><?php echo $unProduit['LIBELLE']?></h4>
                        <a href="voirUnProduit/<?php echo $unProduit['NOPRODUIT']?>"><img src="<?php echo img_url($unProduit['NOMIMAGE'])?>" class="img-responsive"></a>
                    </div>
                </div>
                <?php } ?>
            </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>
</div>










<script type="text/javascript">
$('#myCarousel').carousel({
  interval: 3000
})

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  }
  else {
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
</script>