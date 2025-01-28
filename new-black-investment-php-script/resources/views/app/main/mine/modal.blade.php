@php
    $sharelink = url('register').'?ref_by='.auth()->user()->ref_id;
@endphp

<div id="modalBonus" class="modal">
    <div>
        <div class="bonus">
            <button onclick="closeModal('modalBonus')" class="btn">
                <iconify-icon width="26" icon="uil:times"></iconify-icon>
            </button>

            <p class="title">Gift Bonus</p>
            <input type="text" name="secret" id="gift_code" placeholder="Enter bonus code">
            <button class="submit gift-submit" onclick="checkin_bonus_submit()">Confirm</button>
        </div>
    </div>
</div>

<div id="modalInvite" class="modal">
    <div>
        <div class="invite">
            <button onclick="closeModal('modalInvite')" class="btn">
                <iconify-icon width="26" icon="uil:times"></iconify-icon>
            </button>

            <p class="title">Invite Friends</p>
            <p>The more friends you invite, the more commission rewards you will receive</p>
            <div class="link">
                <p>{{ $sharelink }}</p>
                <button class="role-copy"  onclick="copy('{{$sharelink}}')">
                    <iconify-icon width="24" icon="ph:copy-light"></iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>

<div id="modalLanguage" class="modal language">
    <div>
        <div>
            <p>Select Language</p>

            <a class="language active">
                <div>
                    <img class="flag" src="{{ asset(themes('img/icon/lang/en.png')) }}" alt="">
                    <p>English</p>
                </div>
                <div>
                </div>
            </a>

            <a class="language">
                <div>
                    <img class="flag" src="{{ asset(themes('img/icon/lang/ar.png')) }}" alt="">
                    <p>Arabic (Soon)</p>
                </div>
                <div>
                </div>
            </a>

            <a class="language">
                <div>
                    <img class="flag" src="{{ asset(themes('img/icon/lang/sp.png')) }}" alt="">
                    <p>Spain (Soon)</p>
                </div>
                <div>
                </div>
            </a>

            <a class="language">
                <div>
                    <img class="flag" src="{{ asset(themes('img/icon/lang/fr.png')) }}" alt="">
                    <p>French (Soon)</p>
                </div>
                <div>
                </div>
            </a>

        </div>
    </div>
</div>

@push('script')
<script>
    function checkin_bonus_submit()
    {
        // Get CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var secret = document.querySelector('input[name="secret"]').value;

        $('.gift-submit').html('Please wait...');

        // Make AJAX POST request
        $.ajax({
            type: 'POST',
            url: "{{route('user.submit-bonus')}}",
            contentType: 'application/json',
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": csrfToken
            },
            data:JSON.stringify({bonus_code:secret}),
            dataType: 'json',
            success: function(res) {
                if (res.status == true) {
                    //
                    $('#gift_code').val('');
                }

                $('.gift-submit').html('Confirm');
                message(res.message);
            },
            error: function(jqXHR, textStatus, res) {
                var res = jqXHR.responseText;
                $('.gift-submit').html('Confirm');
                message(res.message);
            }
        });
    }
</script>

<script>
    function copy(text){
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
        message('Copy success');
    }
</script>
@endpush