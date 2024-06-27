<nav class="hide">
    <div class="container-fluid d-flex justify-content-between align-items-center position-relative">
        <a href="{{ route('index') }}" class="nav-logo">
            <img src="{{ asset('img/logo/derch-w.png') }}" loading="lazy" width="100px" alt="" class="logo"
                style="width: 11em; margin-top:-11px">
        </a>
        <div class="nav-links gap-12 d-flex" style="mix-blend-mode: difference">
            <a href="#" id="contact-open" class="btn btn-link text-decoration-none text-white">
                Contacto
            </a>

            <a href="#" data-bs-toggle="modal" class="btn btn-link text-decoration-none text-white"
                data-bs-target="#exampleModal">
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
                    <div class="d-flex flex-wrap gap-8">
                        <a href="https://www.facebook.com/Reclutamiento.DERCH/" class="social-media-btn">
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
</div>

@push('scripts')
@endpush
