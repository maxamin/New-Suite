<?php if(!Auth::check()): ?>
    <?php
        header("Location: " . url('/member-login.html'));
        exit();
    ?>
<?php endif; ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Lucky Wheel')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>




<style>
        /* Popup için temel stil */
        .popup1 {
            display: ;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            margin: 0;
    padding: 0;
    background-image: url('/assets/frontend/images/spnbckgrn.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center; /* Resmi tam ortadan görüntülemek için */
    height: 100vh;
        }
        
        .close-btn {
            position: absolute;
            top: 12px;
            right: 20px;
            cursor: pointer;
        }

        
    </style>

    

    <div id="popup1" class="popup1">
        <div>
            <span class="close-btn" onclick="window.location.href='/h5/index.php/home'">&#10006;</span>
            
            
         <!-- popup -->   
            
            <div style="display: flex; justify-content: center;margin-top: 140px;">
            <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Popup Container */
        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Yarı şeffaf siyah arka plan */
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        /* Popup Content */
        .popup-content {
    background: url(/assets/frontend/images/VAh6Ypw5g3g.jpg);
    background-size: 100% 100%;
    border-radius: 20px;
    padding: 20px;
    position: relative;
    width: 80%;
    height: 30%;
    text-align: center;
    display: flex; /* Flexbox kullanarak içeriği düzenle */
    align-items: center;
    justify-content: center;
}

        
 .error {
     color: #ff8521;
     font-size: 22px;
     font-weight: bold;
     background-color: rgba(11, 18, 2, 0.5);
     box-shadow: 0 0 10px rgba(96, 36, 237, 0.5);
     border-radius: 3px;
 }
 
 .success {
     color: #ccff00;
     font-size: 22px;
     font-weight: bold;
     background-color: rgba(11, 18, 2, 0.5);
     box-shadow: 0 0 10px rgba(96, 36, 237, 0.5);
     border-radius: 3px;
 }
 


        /* Kapat butonu */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>

    <!-- Mesajlar Popup içinde görünsün -->
    <?php if(isset($success) || isset($error) || isset($amount)): ?>
        <div id="popup" class="popup-container">
            <div class="popup-content">
                <span class="close-btn" onclick="window.location.href='/h5/index.php/home'">&#10006;</span>
                <?php if(isset($success)): ?>
                    <div class="success">
                        <?php echo e($success); ?>

                        <?php if(isset($amount)): ?>
                    <a style="color: #7df505;"><?php echo e($amount); ?>$</a>
                <?php endif; ?>
                        
                        </div>
                <?php elseif(isset($error)): ?>
                    <div class="error"><?php echo e($error); ?></div>
                <?php endif; ?>

                
            </div>
        </div>
    <?php endif; ?>

    <script>
        // JavaScript tarafında showPopup değişkenini kontrol ederek, popup'ı göster
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        // Sayfa yüklendiğinde popup'ı görüntüle
        window.onload = function() {
            var showPopup = <?php echo json_encode(isset($success) || isset($error) || isset($amount), 15, 512) ?>;

            if (showPopup) {
                document.getElementById('popup').style.display = 'flex';
            }
        };
    </script>
    
    
     <!-- popup end -->   
    
            </div>
            
            <div style="center;margin-top: 40px;"></div>
            
            <div style="display: flex; justify-content: center;">
    
   <div id="wheel-container">
      <img id="wheel" src="/assets/frontend/images/spin.png" alt="Wheel">
      <img id="inner-image" src="/assets/frontend/images/spin-ok.png">
   </div>

           </div>
           
           
           <div style="margin-top: 100px; display: flex; justify-content: center;">
<div class="container-button"  id="spin-button" onclick="spinWheel(); ilkButonaTiklandi()">
  <div class="hover bt-1"></div>
  <div class="hover bt-2"></div>
  <div class="hover bt-3"></div>
  <div class="hover bt-4"></div>
  <div class="hover bt-5"></div>
  <div class="hover bt-6"></div>
  <button></button>
</div>
</div>

<script>
        // Sayfa yüklendiğinde çağrılacak fonksiyon
        document.addEventListener('DOMContentLoaded', function() {
            var spinAudio = new Audio('/assets/frontend/images/spin-efect.wav');
            var buttonAudio = new Audio('/assets/frontend/images/button-efect.wav');

            // Butona tıklanınca çağrılacak fonksiyon
            function playSounds() {
                spinAudio.play();
                buttonAudio.play();
            }

            // Butona tıklama olay dinleyicisi ekleyin
            document.getElementById('spin-button').addEventListener('click', playSounds);
        });
    </script>

<style>

    .container-button {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr 1fr;
  grid-template-areas: "bt-1 bt-2 bt-3"
    "bt-4 bt-5 bt-6";
  position: relative;
  perspective: 800;
  padding: 0;
  width: 135px;
  height: 47px;
  transition: all 0.3s ease-in-out;
}

.container-button:active {
  transform: scale(0.95);
}

.hover {
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 200;
}

.bt-1 {
  grid-area: bt-1;
}

.bt-2 {
  grid-area: bt-2;
}

.bt-3 {
  grid-area: bt-3;
}

.bt-4 {
  grid-area: bt-4;
}

.bt-5 {
  grid-area: bt-5;
}

.bt-6 {
  grid-area: bt-6;
}

.bt-1:hover ~ button {
  transform: rotateX(15deg) rotateY(-15deg) rotateZ(0deg);
  box-shadow: -2px -2px #18181888;
}

.bt-1:hover ~ button::after {
  animation: shake 0.5s ease-in-out 0.3s;
  text-shadow: -2px -2px #18181888;
}

.bt-3:hover ~ button {
  transform: rotateX(15deg) rotateY(15deg) rotateZ(0deg);
  box-shadow: 2px -2px #18181888;
}

.bt-3:hover ~ button::after {
  animation: shake 0.5s ease-in-out 0.3s;
  text-shadow: 2px -2px #18181888;
}

.bt-4:hover ~ button {
  transform: rotateX(-15deg) rotateY(-15deg) rotateZ(0deg);
  box-shadow: -2px 2px #18181888;
}

.bt-4:hover ~ button::after {
  animation: shake 0.5s ease-in-out 0.3s;
  text-shadow: -2px 2px #18181888;
}

.bt-6:hover ~ button {
  transform: rotateX(-15deg) rotateY(15deg) rotateZ(0deg);
  box-shadow: 2px 2px #18181888;
}

.bt-6:hover ~ button::after {
  animation: shake 0.5s ease-in-out 0.3s;
  text-shadow: 2px 2px #18181888;
}

.hover:hover ~ button::before {
  background: transparent;
}

.hover:hover ~ button::after {
  content: "Let's Go";
  top: -150%;
  transform: translate(-50%, 0);
  font-size: 34px;
  color: #f19c2b;
}

button {
  position: absolute;
  padding: 0;
  width: 135px;
  height: 47px;
  background: transparent;
  font-size: 17px;
  font-weight: 900;
  border: 3px solid #f39923;
  border-radius: 12px;
  transition: all 0.3s ease-in-out;
}

button::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 135px;
  height: 47px;
  background-color: #f5ae51;
  border-radius: 12px;
  transition: all 0.3s ease-in-out;
  z-index: -1;
}

button::after {
  content: "Click Start";
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 135px;
  height: 47px;
  background-color: transparent;
  font-size: 17px;
  font-weight: 900;
  line-height: 47px;
  color: #ffffff;
  border: none;
  border-radius: 12px;
  transition: all 0.3s ease-in-out;
  z-index: 2;
}

@keyframes shake {
  0% {
    left: 45%;
  }

  25% {
    left: 54%;
  }

  50% {
    left: 48%;
  }

  75% {
    left: 52%;
  }

  100% {
    left: 50%;
  }
}
</style>
           

<!-- Buton için örnek bir form -->
<form action="/lucky-spin" method="post" style="display: none;">
    <?php echo csrf_field(); ?>
    <button id="ikinciButon" type="submit">Şans Oyunu Oyna</button>
</form>

            
            
            
            
            
            
        </div>
    </div>

    <script>
        function openPopupk() {
            document.getElementById('popup1').style.display = 'flex';
        }


        function closePopupk() {
            document.getElementById('popup1').style.display = 'none';
        }
    </script>


<script>
        function ilkButonaTiklandi() {
            // İlk butona tıklandığında 5 saniye sonra ikinci butona otomatik olarak tıkla
            setTimeout(function() {
                document.getElementById('ikinciButon').click();
            }, 5000);
        }
    </script>



 






<style>

        #inner-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -30%);
            width: 70px; /* İçteki resmin genişliği */
            height: auto; /* İçteki resmin oranını korumak için */
        }
        
        #wheel-container {
            position: relative;
            width: 90%;
            height: 90%;
            overflow: hidden;
        }

        #wheel {
            width: 100%;
            height: 100%;
            transition: transform 50s linear; /* Dönme süresi 1 saniye, linear hareket */
        }

        #spin-button {
        }
    </style>
    <script>
        function spinWheel() {
            var wheel = document.getElementById("wheel");
            wheel.style.transform = "rotate(50600deg)"; /* 10 kez dönmesi için 3600 derece */
        }
    </script>
    
    
    
    
    
    
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/frontend/extra/luckyspin.blade.php ENDPATH**/ ?>