<div class="contact-view">
    <img src="{{ asset('img/contact.jpg') }}" alt="">

    <div class="close-btn-contact" id="close-contact">
        <i data-feather="x"></i>
    </div>

    <div class="contact">
        <div class="container-fluid">
            <div class="row align-items-end">
                <div class="col-md-8 text-white">
                    <h2 class="d-none d-md-block">Convertimos tus ideas en realidad</h2>
                </div>
                <div class="col-md-4">
                    <div class="card">

                        <h5>Hablemos 👋</h5>

                        <div class="grey-pill d-none d-md-block">
                            <div class="d-flex">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col">
                                        <strong>Correo:</strong>
                                        <a href="mailto:contacto@derch.mx">contacto@derch.mx</a>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-wrap gap-8">
                                            <a href="https://www.facebook.com/Reclutamiento.DERCH/"
                                                class="social-media-btn">
                                                <i data-feather="facebook"></i>
                                            </a>
                                            <a href="https://instagram.com/derch_reclutamientoch?igshid=YmMyMTA2M2Y="
                                                class="social-media-btn">
                                                <i data-feather="instagram"></i>
                                            </a>
                                            <a href="https://www.linkedin.com/company/derch-reclutamiento-y-capital-humano/"
                                                class="social-media-btn">
                                                <i data-feather="linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('company.contact') }}" method="POST">

                            {{ csrf_field() }}



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nombre*</label>
                                        <input type="text" required name="name" class="form-control text-dark">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Correo Electrónico*</label>
                                        <input type="email" required name="email" class="form-control text-dark">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Mensaje</label>
                                        <textarea name="message" class="form-control text-dark" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-end">
                                    {!! htmlFormSnippet() !!}
                                </div>

                            </div>


                            <div class="modal-footer mt-2">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script></script>
@endpush
