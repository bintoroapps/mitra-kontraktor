<div class="col-md-4 col-sm-12">
    <div class="card">
        <div class="card-body">
        <img src="<?= $team->team_image ? base_url('media/' . $team->team_image) : base_url('images/background/4.jpg') ?>" class="card-img-top">
        <h3 class="text-center"><?= $team->team_name ?></h3>
        <button class="d-block mx-auto btn-delete-team btn btn-danger btn-sm" id-team="<?= $team->team_id ?>">Remove</button>
        </div>
    </div>
</div>