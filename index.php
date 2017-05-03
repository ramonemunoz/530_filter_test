<?php require_once 'functions.php'; ?>
<?php $products = getProductCollection(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Filter Test</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="header">
      <h1>Product Filter</h1>
    </div>
    <div class="container">
      <div class="col-1">
        <div class="filter">
          <h3>Color</h3>
          <form>
            <input type="radio" name="color" id="white">White<br>
            <input type="radio" name="color" id="black">Black<br>
            <input type="radio" name="color" id="blue">Blue<br>
            <input type="radio" name="color" id="yellow">Yellow<br>
            <input type="radio" name="color" id="green">Green<br>
            <input type="radio" name="color" id="gray">Gray<br>
            <input type="radio" name="color" id="productContainer" checked="checked">View All<br>
          </form>
        </div>
        <div class="filter">
          <h3>Category</h3>
          <form>
            <input type="radio" name="category" id="shirts">Shirt<br>
            <input type="radio" name="category" id="pants">Pants<br>
            <input type="radio" name="category" id="headwear">Headwear<br>
            <input type="radio" name="category" id="productContainer" checked="checked">View All<br>
          </form>
        </div>
      </div>
      <div id="proCont" class="col-2">

      </div>
    </div>
  </div>


  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>

  var allProducts = <?php echo json_encode($products); ?>;

  function productLoop(){
    for (var i = 0; i < allProducts.length; i++ ){
      // var product = allProducts[i];
      var $proCont = $('<div class="container productContainer '+(allProducts[i].color)+' '+(allProducts[i].category)+'"></div>');
      var $imgSrc = $('<div class="col-1"></div)')
      $imgSrc.append($('<img class="productImg" src="'+allProducts[i].image+'" />'));

      var $proInfo = $('<div class="col-2"></div>');
      $proInfo.append($('<h2>'+(allProducts[i].name)+'</h2>'));
      $proInfo.append($('<p>Price '+(allProducts[i].price)+'.00</p>'));

      $proCont.append($imgSrc);
      $proCont.append($proInfo);

      $('#proCont').append($proCont);
    }
  };

  productLoop();

  $("input[type='radio']").change(function() {
    var list = "";

    $("input[type='radio']").each(function() {
      if (this.checked) {
        list = list + '.' + $(this).attr('id');
      }
    });

    if (list !== '') {
      $("div.productContainer").hide();
      $(list).show();

    } else {
      $("div.productContainer").show();
    }
  });
</script>
