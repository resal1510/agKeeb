<main class="page catalog-page">
  <section class="clean-block clean-catalog dark">
    <div class="container">
      <div class="block-heading">
        <h2 class="text-info"><?php echo $categoryListNumbers[$whatCategory]; ?></h2>
      </div>

      <div class="content">
        <div class="row">
          <div class="col-md-3" style="padding-right: 25px;">
            <div class="d-none d-md-block">
              <div class="filters">
                <div class="filter-item">
                  <h4 style="font-size: 20px" class="mb-3">Filtrer par:</h4><select class="custom-select">
                    <option value="1" selected>Ordre alphabétique</option>
                    <option value="2">Prix ascendant</option>
                    <option value="3">Prix descendant</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="d-md-none filter-collapse border-0">
              <div class="collapse show" id="filters">
                <div class="filters p-2">
                  <div class="filter-item">
                    <h4 style="font-size: 20px" class="mb-3">Filtrer par:</h4><select class="custom-select">
                      <option value="1" selected>Ordre alphabétique</option>
                      <option value="2">Prix ascendant</option>
                      <option value="3">Prix descendant</option>
                    </select>
                  </div>
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
