<div class="col-md-3 col-sm-4">
    <div class="card">
        <img src="<?= $slider->service_slider_img ? base_url('media/' . $slider->service_slider_img) : base_url('images/resource/special-4.jpg') ?>" class="card-img-top">
        <div class="card-body">
        <span style="cursor: pointer;" class="d-block text-center remove-slider" slider-id="<?= $slider->service_slider_id ?>">Remove</span>
        </div>
    </div>
</div>