<nav>
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="{{ route('index') }}" class="nav-logo">
            <img src="{{ asset('img/logo/derch-w.png') }}" loading="lazy" width="100px" alt="" class="logo"
                style="width: 11em; margin-top:-11px">
        </a>
        <div class="nav-links">
            <a href="">
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
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
@endpush
