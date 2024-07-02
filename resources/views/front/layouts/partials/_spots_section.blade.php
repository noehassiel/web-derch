@php

    $jobs = App\Models\Job::where('status', true)->orderBy('created_at', 'asc')->get()->take(12);

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
                                <h4>{{ $job->name }} </h4>
                                <p>{{ $job->company }}</p>

                                <div>
                                    <div class="d-flex mb-3">
                                        <ion-icon class="pt-1 md hydrated" name="briefcase-outline" role="img"
                                            aria-label="briefcase outline"></ion-icon>
                                        <p class="mb-0 ms-2">Tipo: {{ $job->type }}</p>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <ion-icon class="pt-1 md hydrated" name="rocket-outline" role="img"
                                            aria-label="rocket outline"></ion-icon>
                                        <p class="mb-0 ms-2">Modalidad: {{ $job->modality }}</p>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <ion-icon class="pt-1 md hydrated" name="analytics-outline" role="img"
                                            aria-label="analytics outline"></ion-icon>
                                        <p class="mb-0 ms-2">Experiencia: {{ $job->experience }}</p>
                                    </div>
                                </div>

                                @php
                                    // Construir el mensaje para WhatsApp
                                    $message = 'Estoy interesado en el trabajo: ' . $job->name;
                                    // Codificar el mensaje para URL
                                    $encodedMessage = urlencode($message);
                                    // Construir el enlace completo de WhatsApp
                                    $whatsappLink = 'https://wa.me/?text=' . $encodedMessage;
                                @endphp

                                <a href="{{ $whatsappLink }}" target="_blank"
                                    class="button card-detail-b is--ghost left-align w-button">
                                    Más información

                                    <ion-icon name="arrow-forward-outline"></ion-icon>
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
