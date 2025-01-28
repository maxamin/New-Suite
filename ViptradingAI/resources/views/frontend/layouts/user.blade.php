<!DOCTYPE html>
<html lang="en">
@include('frontend.include.__head')
<body class="{{ session()->get('site-color-mode') ?? 'dark-theme' }}">
    
    
    
    
<x:notify-messages/>
<!--Full Layout-->
<div class="panel-layout">

    <div class="page-container">
        <div class="">
            <div class="section-gap">
                <div class="container-fluid">
                    <!--Page Content-->
                    @yield('content')
                    <!--Page Content-->
                </div>
            </div>
        </div>
    </div>
<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    // Sayfa yüklendiğinde bu kod çalışacak
    if (window.innerWidth >= 768) { // Masaüstü ekran boyutu kontrolü (örneğin 768 piksel)
      const panelLayout = document.querySelector('.panel-layout');
      if (panelLayout) {
        panelLayout.classList.add('nav-folded');
      }
    }
  });
</script>

    <!-- Automatic Popup -->
    

    <!-- /Automatic Popup End -->
</div>
<!--/Full Layout-->

@include('frontend.include.__script')

</body>
</html>

