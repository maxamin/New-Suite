<?php $__env->startSection('content'); ?>
    <style>
        input:not([type="radio"]),
        .form-control {
            padding: 5px 10px;
        }

        .input-group-text {
            background: #00D093;
        }

        label {
            color: #ffffff;
            margin-bottom: 1px;
            font-size: 13px;
        }
    </style>
    <?php echo $__env->make('templates.basic.layouts.mobile.top_nav_mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="appCapsule">
        <?php
            $bank_card = json_decode($user->bank_card, true);

            $myMethod = null;
            if (@$bank_card['bank_id']) {
                $myMethod = App\Models\WithdrawMethod::where('id', $bank_card['bank_id'])->first();
            }

        ?>

        <style>
            .rmvBtn{
                font-size: 30px;
                opacity: 40%;
            }
            .rmvBtn:hover, .rmvBtn:focus {
                font-size: 30px;
                opacity: 100%;
            }
        </style>

        <?php if(!$user->bank_card): ?>
            <div class="container mt-3 mb-3">
                <form action="<?php echo e(route('user.bank.card.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="bank_name">
                    <div class="mb-3">
                        <label class="form-label">Select USDT Network</label>
                        <select class="form-select" name="bank_id">
                            <option selected value="<?php echo e(null); ?>">Select Network</option>
                            <?php $__currentLoopData = $withdrawMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option data-name="<?php echo e($item->name); ?>" value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3" hidden>
                        <label class="form-label">Actual Name</label>
                        <input type="text" class="form-control" name="real_name" placeholder="Plese enter your real name" value="aaa">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">USDT Wallet Adress</label>
                        <input type="text" class="form-control" name="account_number" placeholder="Your USDT wallet Adress">
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill w-100">Submit</button>
                </form>
            </div>
        <?php else: ?>
            <div class="container mt-3 mb-3">
                <div class="card glass-bg">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="text-secondary small-font-sm">
                                    USDT Network:
                                </h5>
                                <h6 class="text-primary small-font-lg">
                                    <?php echo e($myMethod ? $myMethod->name : 'N/A'); ?>

                                </h6>
                                <h6 class="text-secondary small-font-sm mt-2">
                                    USDT Wallet Adress:
                                </h6>
                                <h6 class="text-primary small-font-lg"><?php echo e($bank_card['account_number']); ?></h6>
                            </div>
                            <div class="col-auto btn">
                                <i class="fas fa-times-circle text-red rmvBtn "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>




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
    <style type="text/css">
        .copytextDiv {
            border: 1px solid #00000021;
            cursor: pointer;
        }

        #referralURL {
            border-right: 1px solid #00000021;
        }

        .bg-success-custom {
            background-color: #28a7456e !important;
        }

        .brd-success-custom {
            border: 1px dashed #28a745;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script>

        $(document).on('change', '[name=bank_id]', function () {
            let bankName = $('option:selected', this).data('name');
            $('[name=bank_name]').val(bankName);
        });

        // remove
        $(document).on('click', '.rmvBtn', function () {
            iziToast.question({
                timeout: 200000,
                close: false,
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                message: 'Are you sure to remove?',
                position: 'center',
                progressBar: false,
                color: 'orange',
                buttons: [
                    ['<button><b>YES</b></button>', function () {
                        location.href = "<?php echo e(route('user.bank.card.remove')); ?>"
                    }],
                    ['<button>NO</button>', function (instance, toast) {
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    }],
                ]
            });
        });



    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zekisoft/earnlite.tezdayukla.uz/core/resources/views/templates/basic/user/bank_card.blade.php ENDPATH**/ ?>