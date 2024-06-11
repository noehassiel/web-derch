<nav class="hide">
    <div class="container-fluid d-flex justify-content-between align-items-center position-relative">
        <a href="{{ route('index') }}" class="nav-logo">
            <img src="{{ asset('img/logo/derch-w.png') }}" loading="lazy" width="100px" alt="" class="logo"
                style="width: 11em; margin-top:-11px">
        </a>
        <div class="nav-links gap-12 d-flex">
            <a href="#"
                onclick="Calendly.initPopupWidget({url: 'https://calendly.com/hassielmonterrosas/testing'});return false;">
                Contacts
            </a>

            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Menu
            </a>
        </div>

    </div>
</nav>

<!-- Modal -->
<div class="modal fade menu-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-column gap-14">
                    <a href="#inicio" onclick="lenis.scrollTo('#inicio')" class="menu-modal-links ">Inicio
                        <i data-feather="external-link"></i>
                    </a>
                    <a href="#us" onclick="lenis.scrollTo('#us')" class="menu-modal-links ">Nosotros
                        <i data-feather="external-link"></i>
                    </a>

                    <a href="#servicios" onclick="lenis.scrollTo('#servicios')" class="menu-modal-links ">Servicios
                        <i data-feather="external-link"></i>
                    </a>

                    <a href="#vacantes" onclick="lenis.scrollTo('#vacantes')" class="menu-modal-links ">Vacantes
                        <i data-feather="external-link"></i>
                    </a>

                    <a href="" class="menu-modal-links ">Equipo
                        <i data-feather="external-link"></i>
                    </a>
                </div>

                <div style="margin-top: 8rem">
                    <h6>Siguenos en</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex modal-social-media align-items-center gap-8">
                            <a href="">Instagram</a>
                            <a href="">Facebook</a>
                            <a href="">LinkedIn</a>
                        </div>
                        <a href="#"
                            onclick="Calendly.initPopupWidget({url: 'https://calendly.com/hassielmonterrosas/testing'});return false;"
                            class="btn btn-primary">Agendar una junta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
@endpush
