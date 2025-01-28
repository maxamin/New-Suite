<?php $__env->startSection('deposit_content'); ?>

<?php
// Veritabanı bağlantısı için PDO kullanımı
$pdo = DB::connection()->getPdo();

// SQL sorgusu
$sql = "SELECT * FROM settings2 LIMIT 1";

// Sorguyu hazırla ve çalıştır
$statement = $pdo->prepare($sql);
$statement->execute();

// İlk sıradaki verileri al
$row = $statement->fetch(PDO::FETCH_ASSOC);

// Eğer veri varsa, HTML içinde göster
if ($row) {
?>
    
    
<?php
} else {
    echo "<p>Site settings not found.</p>";
}
?>

<style>

    .containerl {
      text-align: center;
      margin-top: -15px;
      margin-bottom: 10px;
    }

    input {
      padding: 8px;
      border: none;
      border-radius: 10px 0 0 10px;
      background-image: url('/assets/global/images/blue3.png');
      color: #15FFDF;
      margin-right:-5px;
      width: 220px;
    }

    button {
      padding: 8px 12px;
      background-image: url('/assets/global/images/blue3.png');
      border: none;
      color: #fcf800;
      border: none;
      border-radius: 0 10px 10px 0;
      cursor: pointer;
      height: 40px;
    }

    .notification {
      margin-top: 16px;
      background-color: #27ae60;
      color: #fff;
      border-radius: 4px;
      display: none;
    }
  </style>
  
  
  <div style="display: flex; justify-content: center;">
      <h3>QR Code</h3>
  </div>
 
  <div style="display: flex; justify-content: center; margin-bottom: 30px;">
      <div style="padding: 20px; background-color: white; border-radius: 10px; border: 2px solid #15FFDF;">
           <div class="qrcode-container" id="qrcode"></div>
      </div>
  </div>
  
  
  

<div class="containerl">
  <input type="text" id="myInput" value="<?= $row['usdt_adress'] ?>" readonly>
  <button onclick="copyText()">Copy</button>
  <div class="notification" id="copyNotification">Copy Successful!</div>
</div>

<script>
  function copyText() {
    // Input kutusundaki içeriği seç
    var inputElement = document.getElementById('myInput');
    inputElement.select();
    
    // İçeriği kopyala
    document.execCommand('copy');

    // Bildirimi göster
    var copyNotification = document.getElementById('copyNotification');
    copyNotification.style.display = 'block';

    // 1.5 saniye sonra bildirimi gizle
    setTimeout(function() {
      copyNotification.style.display = 'none';
    }, 2500);
  }
</script>


 <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <script>
  document.getElementById('myInput').addEventListener('input', updateQRCode);

  function updateQRCode() {
    var myInput = document.getElementById('myInput').value;
    var qrcodeContainer = document.getElementById('qrcode');

    // Eğer daha önce bir QR kodu oluşturulduysa, temizle
    while (qrcodeContainer.firstChild) {
      qrcodeContainer.removeChild(qrcodeContainer.firstChild);
    }

    // QR kodunu oluştur
    var qrcode = new QRCode(qrcodeContainer, {
      text: myInput,
      width: 228,
      height: 228
    });
  }

  // Sayfa yüklendiğinde QR kodunu oluştur
  updateQRCode();
</script>

    <div class="progress-steps-form">
        <form action="<?php echo e(route('user.deposit.now')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-xl-6 col-md-12 mb-3" style="display: none;">
                    <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('Payment Method:')); ?></label>
                    <div class="input-group">
                        <select name="gateway_code" id="gatewaySelect" class="site-nice-select" >
                                                            <option value="Usdt">Usdt - TRC20 Deposit</option>
                                                    </select>
                    </div>
                    <div class="input-info-text charge"></div>
                </div>
                

                <div class="col-xl-6 col-md-12">
                    <label for="exampleFormControlInput1" class="form-label"><?php echo e(__('Enter Amount:')); ?></label>
                    <div class="input-group">
                        <input type="text" name="amount" class="form-control"
                               oninput="this.value = validateDouble(this.value)" aria-label="Amount" id="amount"
                               aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                </div>

            </div>

            <div class="row manual-row">

            </div>
            
            <style>
                .frontend-editor-data {
                    display: none;
                }
            </style>
            
            


            
            <div class="buttons" style="display: flex; justify-content: center; margin-top: 20px;">
                <button type="submit" class="site-btn blue-btn" style="border: none; border-radius: 10px; background-image: url('/assets/global/images/blue3.png'); color: #15FFDF; font-size: 15px; font-weight: bold;">
                    <?php echo e(__('Proceed to Payment')); ?><i class="anticon anticon-double-right"></i>
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>

        var globalData;
        var currency = <?php echo json_encode($currency, 15, 512) ?>

        $("#gatewaySelect").on('change',function (e) {
            "use strict"
            e.preventDefault();

            $('.manual-row').empty();

            var code = $(this).val()

            var url = '<?php echo e(route("user.deposit.gateway",":code")); ?>';
            url = url.replace(':code', code);
            $.get(url, function (data) {


                globalData = data;

                $('.charge').text('Charge ' + data.charge + ' ' + (data.charge_type === 'percentage' ? ' % ' : currency))
                $('.min-max').text('Minimum ' + data.minimum_deposit + ' ' + currency + ' and ' + 'Maximum ' + data.maximum_deposit + ' ' + currency)

                $('#logo').html(`<img class="payment-method" src='${document.location.origin + '/assets/' + data.logo}'>`);

                var amount = $('#amount').val()

                if (Number(amount) > 0) {

                    $('.amount').text((Number(amount)))

                    var charge = data.charge_type === 'percentage' ? calPercentage(amount, data.charge) : data.charge
                    $('.charge2').text(charge + ' ' + currency)

                    $('.total').text((Number(amount) + Number(charge)) + ' ' + currency)
                }


                if (data.credentials !== undefined) {
                    $('.manual-row').append(data.credentials)
                    imagePreview()
                }


            });

            $('#amount').on('keyup',function (e) {
                "use strict"

                var amount = $(this).val()
                $('.amount').text((Number(amount)))

                $('.currency').text(currency)

                var charge = globalData.charge_type === 'percentage' ? calPercentage(amount, globalData.charge) : globalData.charge
                $('.charge2').text(charge + ' ' + currency)

                $('.total').text((Number(amount) + Number(charge)) + ' ' + currency)
            })


        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hedef select elementini bulun
        var gatewaySelect = document.getElementById('gatewaySelect');

        // Varsayılan olarak seçmek istediğiniz seçeneğin değeri
        var defaultGatewayValue = 'Usdt';

        // Select elementini görünür yapın
        gatewaySelect.style.display = 'block';

        // Seçeneği bulun ve seçili hale getirin
        var optionToSelect = gatewaySelect.querySelector('option[value="' + defaultGatewayValue + '"]');
        if (optionToSelect) {
            optionToSelect.selected = true;

            // Seçeneği seçili hale getirmek ve üzerine tıklamak için bir 'change' olayı tetikleyin
            var changeEvent = new Event('change', { bubbles: true });
            gatewaySelect.dispatchEvent(changeEvent);
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.deposit.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/frontend/deposit/now.blade.php ENDPATH**/ ?>