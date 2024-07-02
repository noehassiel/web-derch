<div class="pre-cta">
    <div class="container-fluid">
        <div class="card">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <h3 class="mb-4">Seremos tu guía dedicada</h3>
                        <p>Atendemos a diversas industrias y empresas de todos los tamaños, nuestro equipo y nuestros
                            servicios se adaptan de manera eficiente a las necesidades de nuestros clientes. Aplicamos
                            análisis previos y registros en curso para ofrecer las soluciones más eficientes en términos
                            de tiempo y recursos.</p>
                        <a href="">Agenda una cita</a>
                    </div>
                </div>
            </div>
            <div class="img-container d-none d-md-block">
                <img src="{{ asset('img/5.png') }}" alt="logo">
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="position-relative first-footer">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-logo mb-5"><img src="{{ asset('img/logo/derch-w.png') }}" loading="lazy"
                            width="300" alt="" class="logo is--footer"></div>

                    <div class="d-flex flex-wrap gap-14">
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

                <div class="col-md-6">
                    <div class="ms-0 ms-md-5 mt-4 mt-md-0">
                        <div class="text-center text-md-start">
                            <h6>Teléfono:</h6>
                            <a href="" class="btn btn-link text-white">477 9801552</a>
                        </div>
                        <div class="text-center text-md-start">
                            <h6>Correo:</h6>
                            <a href="mailto:contacto@derch.com.mx"
                                class="btn btn-link text-white">contacto@derch.com.mx</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="last-footer">

        <div class="container-fluid">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-14">
                <div class="text-block">©Copyright <span id="year"></span> Todos los derechos reservados. </div>

                <small>developed by <a href="https://www.linkedin.com/in/noehassiel/"
                        style="color: var(--dark-blue)">NoeHassiel</a></small>

            </div>
        </div>


</footer>
@push('scripts')
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
@endpush
