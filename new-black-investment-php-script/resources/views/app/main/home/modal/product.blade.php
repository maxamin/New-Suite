<div id="modalProduct" class="modal">
    <div>
        <div class="telegram">
            <button onclick="closeModal('modalProduct')" class="btn">
                <iconify-icon width="26" icon="uil:times"></iconify-icon>
            </button>

            <p class="title product-name">Product Name</p>
            <p>Are you sure you need to buy this product?</p>
            <div class="tl">
                <a href="#" class="buy-link">
                    <iconify-icon width="23" icon="cib:samsung-pay"></iconify-icon>
                    <p>Available Balance: {{ price(auth()->user()->balance) }}</p>
                </a>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $('.openProduct').on('click', function() {
        var $dataName = $(this).data('name');
        var $dataAmount = $(this).data('amount');
        var $dataId = $(this).data('id');

        // Add Product Name
        $('.product-name').html('Buy '+ $dataName +' for '+ $dataAmount +'');

        // Add Link
        $('.buy-link').attr('href', "{{ route('purchase.confirmation') }}/"+ $dataId);
    });
</script>
@endpush