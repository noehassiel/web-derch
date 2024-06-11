@php

    $jobs = App\Models\Job::where('status', true)->orderBy('created_at', 'asc')->get()->take(6);

@endphp


<div class="text-dark">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-5 text-center">
            <h2 class="vertical__heading">Vacantes</h2>
        </div>
        <div class="col-md-12 position-relative">
            <div class="swiper jobsS position-relative h-100">
                <div class="swiper-wrapper h-100">
                    @foreach ($jobs as $job)
                        <div class="swiper-slide">
                            <div class="card h-100">
                                <h3>{{ $job->name }}</h3>
                                <p>{{ $job->preview }}</p>
                                <a href="javascript:void(0)" id="job_{{ $job->slug }}"
                                    class="button card-detail-b is--ghost left-align w-button">
                                    Leer <ion-icon name="arrow-forward-outline"></ion-icon>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="jobsBtns">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".jobsS", {
            slidesPerView: 1,
            loop: true,
            spaceBetween: 30,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
    </script>
@endpush
