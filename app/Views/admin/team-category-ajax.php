<div class="row">
    <div class="col-md-8 col-sm-12"></div>
    <div class="col-md-4 col-sm-12">
    <div class="card">
        <div class="card-body">
        <button class="btn btn-danger d-block float-right btn-2-delete" team-category-id="<?= $team_category->team_category_id ?>"><i class="fas fa-trash"></i></button>
        <button class="btn btn-warning d-block float-right btn-2-edit mr-2" team-category-id="<?= $team_category->team_category_id ?>"><i class="fas fa-edit"></i></button>
        <button class="btn btn-success d-block float-right btn-2-add mr-2" team-category-id="<?= $team_category->team_category_id ?>"><i class="fas fa-user-plus"></i></button><br>
        <span class="2-name d-block mb-3"><?= $team_category->team_category_name ?></span>
        </div>
    </div>
    </div>
    <div class="col-12">
        <div class="row row-team-member team-category-id="<?= $team_category->team_category_id ?>">
        <?php 
            $teams = \App\Controllers\TeamPageController::getTeamByTeamCategoryId($team_category->team_category_id);
            foreach($teams as $te):
        ?>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                <img src="<?= $te->team_image ? base_url('media/' . $te->team_image) : base_url('images/background/4.jpg') ?>" class="card-img-top">
                <h3 class="text-center"><?= $te->team_name ?></h3>
                <button class="d-block mx-auto btn-delete-team btn btn-danger btn-sm" id-team="<?= $te->team_id ?>">Remove</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>