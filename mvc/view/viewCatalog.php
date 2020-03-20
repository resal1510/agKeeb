<main class="page catalog-page">
  <section class="clean-block clean-catalog dark">
    <div class="container">
      <div class="block-heading">
        <h2 style="color: #71c3ff; text-shadow: 0px 5px 5px rgba(0,0,0,0.1),
                 10px 5px 5px rgba(0,0,0,0.05),
                 -10px 5px 5px rgba(0,0,0,0.05);"><?php echo $categoryListNumbers[$whatCategory]; ?></h2>
      </div>

      <div class="content">
        <div class="row">
          <div class="col-md-3" style="padding-right: 25px;">
            <div class="d-none d-md-block">
              <div class="filters">
                <div class="filter-item">
                  <h3>Filtrer par:</h3><select class="custom-select">
                    <option value="12" selected>This is item 1</option>
                    <option value="13">This is item 2</option>
                    <option value="14">This is item 3</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="d-md-none"><a class="btn border rounded d-md-none filter-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="filters" href="#filters" role="button">Filtres<i class="icon-arrow-down filter-caret"></i></a>
              <div class="collapse show" id="filters">
                <div class="filters">
                  <div class="filter-item">
                    <h3>Filtrer par:</h3><select class="custom-select">
                      <option value="12" selected>This is item 1</option>
                      <option value="13">This is item 2</option>
                      <option value="14">This is item 3</option>
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
</body>
