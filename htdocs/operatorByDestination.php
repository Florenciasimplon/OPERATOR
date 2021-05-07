<?php
include 'config/db.php';
include 'config/autoload.php';
session_start();
include 'partiels/header.php'; ?>

<body>
  <?php
  include 'partiels/navBar.php';?>
  <div class="Operator">
    <iframe width="100%" height="315" src="https://www.youtube.com/embed/w32X24G0kLo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   <hr>
      <h4> Our Operator</h4>
  </div>

<?php
  $OperatorManager = new TourOperatorManager($pdo);
  $ReviewManager = new ReviewManager($pdo);

  if (isset($_POST['destination'])) : ?>
    <?php $allOperatorByDestination = $OperatorManager->getOperatorByDestination($_POST['destination']);
    foreach ($allOperatorByDestination as $operatorByDestination) : ?>
      <div class="row">
        <div class="col-4">
        <div class="wrapper">
  <input checked type=radio name="slider" id="slide1" />
  <input type=radio name="slider" id="slide2" />
  <input type=radio name="slider" id="slide3" />
  <input type=radio name="slider" id="slide4" />
  <input type=radio name="slider" id="slide5" />

  <div class="slider-wrapper">
    <div class=inner>
      <article>
        <div class="info top-left">
          <h3>Malacca</h3></div>
        <img src="https://farm9.staticflickr.com/8059/28286750501_dcc27b1332_h_d.jpg" />
      </article>

      <article>
        <div class="info bottom-right">
          <h3>Cameron Highland</h3></div>
        <img src="https://farm6.staticflickr.com/5812/23394215774_b76cd33a87_h_d.jpg" />
      </article>

      <article>
        <div class="info bottom-left">
          <h3>New Delhi</h3></div>
        <img src="https://farm8.staticflickr.com/7455/27879053992_ef3f41c4a0_h_d.jpg" />
      </article>

      <article>
        <div class="info top-right">
          <h3>Ladakh</h3></div>
        <img src="https://farm8.staticflickr.com/7367/27980898905_72d106e501_h_d.jpg" />
      </article>

      <article>
        <div class="info bottom-left">
          <h3>Nubra Valley</h3></div>
        <img src="img/Assurance assistance vacances en avion.jpg" />
      </article>
    </div>
    <!-- .inner -->
  </div>
  <!-- .slider-wrapper -->

  <div class="slider-prev-next-control">
    <label for=slide1></label>
    <label for=slide2></label>
    <label for=slide3></label>
    <label for=slide4></label>
    <label for=slide5></label>
  </div>
  <!-- .slider-prev-next-control -->

  <div class="slider-dot-control">
    <label for=slide1></label>
    <label for=slide2></label>
    <label for=slide3></label>
    <label for=slide4></label>
    <label for=slide5></label>
  </div>
  <!-- .slider-dot-control -->
</div>
          </div>

          <div class="col-1">
          </div>
          
            <div class="col-7">
              <div class="col-12 namecarousel">
                <h1><?= $operatorByDestination->getName();?></h1>
              </div>
              <div class="col-12 namecarousel2">
                <?php if ($operatorByDestination->getIs_premium() === false) {
                  echo '<img src="https://img.icons8.com/color/25/000000/close-window.png"/> not Premium';
                } else {
                  echo '<img src="https://img.icons8.com/fluent/25/000000/fairytale.png"/> is Premium';
                } ?>
              </div>
              <div class="col-12">
              <?= $operatorByDestination->getLink(); ?>
              </div>
              <div class="modal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          
        </div>
        <?= $operatorByDestination->getName(); ?>

        <?= $operatorByDestination->getLink(); ?>
        <?php if ($operatorByDestination->getIs_premium() === false) {
          echo '</br>This Operator is not Premium ';
        } else {
          echo '</br>This Operator is Premium ';
        } ?>

        <?php $allReviews = $ReviewManager->getReviewByOperator($operatorByDestination->getId());
        echo '<div class="commentaire-list' . $operatorByDestination->getId() . '">';
        echo '</br>' . $operatorByDestination->getGrade();
        foreach ($allReviews as $reviews) : ?>

          <?= $reviews->getAuthor(); ?>
          <?= $reviews->getMessage(); ?>
      </div>


    <?php echo '</div>';
        endforeach;
        include 'forms/form-review.php';
      endforeach;
    endif ?>

</body>
<?php include 'partiels/footer.php'; ?>