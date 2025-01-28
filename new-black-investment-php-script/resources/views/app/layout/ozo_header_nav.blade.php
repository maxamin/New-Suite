<div class="top-nav transparent @stack('top-nav')">
    <a href="javascript:void(0);" class="back-btn">
        <iconify-icon width="21" icon="eva:arrow-back-outline"></iconify-icon>
    </a>
    <p>@stack('page_title')</p>
    <a href="javascript:void(0);"></a>
</div>

@push('script')
<script>
$('.back-btn').on('click',function(){
    window.history.go(-1); return false
})
</script>
@endpush