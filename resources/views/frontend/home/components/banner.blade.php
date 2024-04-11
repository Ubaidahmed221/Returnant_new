<section class="fp__banner" style="background: url({{ asset('frontend/images/banner_bg.jpg') }});">
    <div class="fp__banner_overlay">
        <div class="row banner_slider">
            @foreach ($slider as $sliders)
                <div class="col-12">
                    <div class="fp__banner_slider">
                        <div class=" container">
                            <div class="row">
                                <div class="col-xl-5 col-md-5 col-lg-5">
                                    <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{ asset($sliders->image) }}" alt="food item"
                                                class="img-fluid w-100">
                                            @if ($sliders->offer)
                                                <span> {{ $sliders->offer }} </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-7 col-lg-6">
                                    <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                        <h1>{!! $sliders->title !!}</h1>
                                        <h3>{!! $sliders->sub_title !!}</h3>
                                        <p>{!! $sliders->short_description !!}</p>
                                        <ul class="d-flex flex-wrap">
                                            @if ($sliders->button_link)
                                                <li><a class="common_btn" href="{{ $sliders->button_link }}" target="_blank" >shop now</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
