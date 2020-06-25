<main class="page catalog-page">
  <section class="clean-block clean-catalog dark">
    <div class="container">
      <div class="block-heading">
        <h2 class="text-info"><?php
        if ($GLOBALS['$whatCategory'] == 8) {
          echo $categoryListNumbers[$GLOBALS['$whatCategory']].' '.$_GET['search'];
        } else {
          echo $categoryListNumbers[$GLOBALS['$whatCategory']];
        }
        ?></h2>
      </div>

      <div class="content">
        <div class="row">
          <div class="col-md-3" style="padding-right: 25px;">
            <div class="d-none d-md-block">
              <div class="filters">
                <div class="filter-item">
                  <h4 style="font-size: 20px" class="mb-3">Filtrer par:</h4>
                  <select id="catalogOrder" class="custom-select select-Tri">
                    <option value="1" selected>Par défaut</option>
                    <option value="2">Ordre alphabétique</option>
                    <option value="3">Prix ascendant</option>
                    <option value="4">Prix descendant</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="products">
              <div class="row no-gutters">
                <?php include "mvc/controller/catalogPageScriptListing.php" ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<script type="text/javascript">
$('.select-Tri').change(function(){
  var actualVal = $('.select-Tri').val();

  $.ajax({
    url: 'mvc/controller/catalogPageScriptListing.php',
    type: 'POST',
    dataType: 'json',
    data: {
      order: actualVal
    }
  })
});


/*

$('.select-Tri').change(function(){
    var tempurl = "https://sandbox.allanresin.ch/agkeeb/catalog.php";
    var url = window.location.href;

    if (url.endsWith("order=1") || url.endsWith("order=2") || url.endsWith("order=3") || url.endsWith("order=4")) {
      url = url.slice(0, -7);
      console.log("oui");
      console.log("slice : "+url);
    }

    if (window.location.href == tempurl) {
       url = tempurl+"?";
    } else {
       url = window.location.href+"&";
    }
    console.log(url);



    if($("#catalogOrder").val()!='Select')
      url+='order='+encodeURIComponent($("#catalogOrder").val());

    url = url.replace(/\&$/,'');
    window.location.href=url;
    });
    */
</script>
