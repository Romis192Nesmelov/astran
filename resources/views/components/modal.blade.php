<div {{ $attributes->class('modal fade') }} tabindex="-1" aria-labelledby="{{ $attributes->get('id') }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5 text-center w-100">{{ $head }}</h5>
                <img class="close" src="{{ asset('images/icon_cross.svg') }}" data-bs-dismiss="modal" data-dismiss="modal" />
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

