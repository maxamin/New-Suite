<div id="modalTelegram" class="modal">
    <div>
        <div class="telegram">
            <button onclick="closeModal('modalTelegram')" class="btn">
                <iconify-icon width="26" icon="uil:times"></iconify-icon>
            </button>

            <p class="title">Official Support Channel</p>
            <p>The more friends you invite, the more commission rewards you will receive</p>
            <div class="tl">
                <button onclick="window.location.href = '{{ $setting->telegram }}'">
                    <iconify-icon width="23" icon="logos:telegram"></iconify-icon>
                    <p>{{ $setting->w_one }}</p>
                </button>

                <button onclick="window.location.href = '{{ $setting->whatsapp }}'">
                    <iconify-icon width="23" icon="logos:whatsapp-icon"></iconify-icon>
                    <p>{{ $setting->w_two }}</p>
                </button>
            </div>
        </div>
    </div>
</div>

@push('script')
@endpush