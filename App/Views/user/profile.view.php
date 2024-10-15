<section class="w-100 px-4 py-5" style="background-color: #9de2ff; border-radius: .5rem .5rem 0 0;">
  <div class="row d-flex justify-content-center">
    <div class="col col-md-9 col-lg-7 col-xl-6">
      <div class="card" style="border-radius: 15px;">
        <div class="card-body p-4">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <!-- <img src="<?= $params['user']['img_profile'] ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;"> -->
              <img src=" <?php echo '../../../Public/Assets/img/'.$params['user']['img_profile']; ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">

            </div>
            <div class="flex-grow-1 ms-3">
              <h5 class="mb-1"><?= $params['user']['name'] ?></h5>
              <p class="mb-2 pb-1">Mail: <?= $params['user']['mail'] ?> </p>
              <div class="d-flex justify-content-start rounded-3 p-2 mb-2 bg-body-tertiary">
                <div>
                  <p class="small text-muted mb-1">Verificat</p>
                  <p class="mb-0"><?= $params['user']['verificat']==true ? "Si" : "No"?></p>
                </div>
                <div class="px-3">
                  <p class="small text-muted mb-1">Username</p>
                  <p class="mb-0"><?= $params['user']['username'] ?></p>
                </div>
                <div>
                  <p class="small text-muted mb-1">Password</p>
                  <p class="mb-0"><?= $params['user']['password'] ?></p>
                </div>
              </div>
              <div class="d-flex pt-1">
                <!-- <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary flex-grow-1">Follow</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>