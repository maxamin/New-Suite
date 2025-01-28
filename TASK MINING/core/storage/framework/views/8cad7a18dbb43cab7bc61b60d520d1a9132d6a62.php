<?php $__env->startSection('content'); ?>
<?php
    $banners = getContent('banner.element');
?>

<style>
    #appCapsule {
        padding-top: 0px;
    }
</style>


 <br> <br>
    <div id="appCapsule">
        <div class="swiper rounded">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <img width="100%" style="height: 200px;" src="<?php echo e(asset('assets/images/frontend/banner/' . $item->data_values->image)); ?>" alt="">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="container">
            <div class="bg-dark-alt rounded-pill p-1 mt-2">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-volume-up text-light"></i>
                    </div>
                    <br>
                    <div class="col ps-0">
                        <marquee class="small-font text-light" behavior="scroll" direction="left">Wind is fuel – and by nature it is a force of constant change and unpredictability. In this world of uncertainty, the laws of physics and data-driven mathematical modelling can give a measure of predictability that businesses and banks can trust.  This article explores how high capacity factor wind turbines can provide that much-needed reliability - making it easier for everyone, from wind experts, investors to asset owners, to understand and trust wind energy economics.</marquee>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card border  border-2 border-secondary bg-gr-orange">
             <div class="row py-3">
                <a href="<?php echo e(route('user.deposit.index')); ?>" class="col-3 px-0 text-center">
                    <img width="25px" src="https://img.icons8.com/?size=48&id=36950&format=png" alt="">
                    <p class="mb-0 small-font-sm text-light">Recharge</p>
                </a>
                <a href="<?php echo e(route('user.withdraw.new')); ?>" class="col-3 px-0 text-center">
                    <img width="25px" src="https://img.icons8.com/?size=48&id=39897&format=png" alt="">
                    <p class="mb-0 small-font-sm text-light">Withdraw</p>
                </a>
                <a href="<?php echo e(route('user.invite')); ?>" class="col-3 px-0 text-center">
                    <img width="25px" src="https://img.icons8.com/?size=48&id=RHFjhzu8Wq5b&format=png" alt="">
                    <p class="mb-0 small-font-sm text-light">Invite</p>
                </a>
                <a href="<?php echo e(route('online.service')); ?>" class="col-3 px-0 text-center">
                    <img width="30px" src="https://i.ibb.co/M2n8rBZ/image-removebg-preview-2.png" alt="">
                    <p class="mb-0 small-font-sm text-light">Online service</p>
                </a>
            </div>
            
        </div>

        <!-- Plans -->
        <div class="container">
            <?php echo $__env->make('templates.basic.sections.home.plan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <!-- Popup modal -->
        <?php echo $__env->make('templates.basic.modal.popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    
        <footer>
<style type="text/css">
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
.skiptranslate {display:none !important;}
#google_translate_element2 {display:none!important;}
</style>

<div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>

<script type="text/javascript">
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
</script>
<div class="clearfix fixed-bottom"></div>
</footer>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>

    <?php if(!session()->has('notify')): ?>
        <script>
            var popupModal = new bootstrap.Modal($('#popupModal'));
            setTimeout(() => {
                popupModal.show();
            }, 500);
        </script>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },


        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zekisoft/earnlite.tezdayukla.uz/core/resources/views/templates/basic/home.blade.php ENDPATH**/ ?>