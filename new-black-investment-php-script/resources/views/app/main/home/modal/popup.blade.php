<div class="hide modal2" id="notificationModal">
    <div>
        <div style="background-image: url('{{ asset(themes('img/1.svg')) }}');" class="title">
            <p></p>
            <p>Announcement</p>
        </div>
        <div class="content">
            {!! $setting->popup_message !!}

            <p class="insist">
                Register Now and get a $3 new user bonus to learn how our sysytem works
            </p>

            <div>
                <button class="join" onclick="window.location.href = '{{ $setting->telegram }}'">
                    Join Our channel
                </button>

                <button target-id="notificationModal" role="close-modal2" class="ok">Ok</button>
            </div>
        </div>
    </div>
</div>

@push('script')
@endpush