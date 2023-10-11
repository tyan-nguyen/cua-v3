<div class="col-lg-3 col-md-6 col-sm-12 mb-5">
    <div class="card-item">
      <div class="card border-0 bg-transparent">
        <div class="card-image">
          <a href="<?= $blog->url ?>">
          	<img src="<?= $blog->cover ?>" alt="" class="post-image img-fluid">
          </a>
        </div>
      </div>
      <div class="card-body p-0 mt-4">
        <h3 class="card-title text-uppercase">
          <a href="<?= $blog->url ?>"><?= $blog->title ?></a>
        </h3>
        <p><?= $blog->summary150 ?></p>
        <!-- <a href="<?= $blog->url ?>" class="btn btn-normal text-uppercase p-0"><em>Xem tiếp</em></a>-->
      </div>
    </div>
</div>