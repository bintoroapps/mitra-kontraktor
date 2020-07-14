<div class="col-lg-9 col-md-8">
    <div class="card">
        <div class="card-header" id="headingFaq<?= $faq->faq_id ?>">
            <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left font-weight-bolder text-dark faq-question" type="button" data-toggle="collapse" data-target="#collapseFaq<?= $faq->faq_id ?>" aria-expanded="true" aria-controls="collapseFaq<?= $faq->faq_id ?>">
                <?= $faq->faq_question ?>
            </button>
            </h2>
        </div>
        <div id="collapseFaq<?= $faq->faq_id ?>" class="collapse" aria-labelledby="headingFaq<?= $faq->faq_id ?>" data-parent="#accordionExample">
            <div class="card-body faq-anwer">
            <?= $faq->faq_answer ?>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-4 mb-2">
    <button class="btn btn-warning btn-edit-faq" faq-id="<?= $faq->faq_id ?>"><i class="fas fa-edit"></i></button>
    <button class="btn btn-danger btn-delete-faq" faq-id="<?= $faq->faq_id ?>"><i class="fas fa-trash"></i></button>
</div>