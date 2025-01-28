  <?php use App\Enums\InvestStatus; ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('Bonus Manager')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 
   
<div style="display: flex; justify-content: center; margin-top:60px;">
    <div style="padding: 50px 200px 200px 200px;">
       <div style=""></div>
   
   <h1 style="color: white;">Bonus Manager</h1>
   <div style="margin-top:30px;"></div>
   
   <?php if(session('success')): ?>
    <div class="alert alert-success" id="notification">
        <?php echo e(session('success')); ?>

    </div>
    <script>
        // 3 saniye sonra bildirimi gizle
        setTimeout(function(){
            document.getElementById('notification').style.display = 'none';
        }, 3000);
    </script>
<?php endif; ?>

    
    <!-- Gift bonus -->
    
    <div class="dvk">
        
        <?php if(isset($bonusData)): ?>
        <form action="<?php echo e(url('/admin/bonus')); ?>" method="POST">

            <?php echo csrf_field(); ?>
            <table>
                <tbody>
                    <?php $__currentLoopData = $bonusData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="input-field">
                   <input type="number" name="gift_bonus_amount[]" value="<?php echo e($data->gift_bonus_amount); ?>" required spellcheck="false" min="0.01" step="0.01">
                   <label>Gift bonus Earn Balance</label>
                                </div>
                            </td>
                            
                            
                            
                            <td style="display:none;"><input type="text" name="gift_bonus_code[]" value="<?php echo e($data->gift_bonus_code); ?>"></td>
                            <td style="display:none;"><input type="text" name="login_bonus_amount[]" value="<?php echo e($data->login_bonus_amount); ?>"></td>
                            <td style="display:none;"><input type="text" name="login_bonus_code[]" value="<?php echo e($data->login_bonus_code); ?>"></td>
                            <td style="display:none;"><input type="text" name="spin_bonus_amount[]" value="<?php echo e($data->spin_bonus_amount); ?>"></td>
                            <!-- Diğer sütunlar buraya eklenmeli -->
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <button type="submit" class="full-width-button">Gift Bonus Earn Update</button>
        </form>
    <?php endif; ?>
    
    
    
    <?php if(isset($bonusData)): ?>
        <form action="<?php echo e(url('/admin/bonus')); ?>" method="POST" style=" margin-top: 40px;">

            <?php echo csrf_field(); ?>
            <table>
                <tbody>
                    <?php $__currentLoopData = $bonusData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="display:none;"><input type="text" name="gift_bonus_amount[]" value="<?php echo e($data->gift_bonus_amount); ?>"></td>
                            
                            
                            
                            
                            <td>
                                <div class="input-field">
                   <input type="text" name="gift_bonus_code[]" id="giftBonusCode" value="<?php echo e($data->gift_bonus_code); ?>" required spellcheck="false">

<script>
    document.getElementById('giftBonusCode').addEventListener('input', function() {
        // Input değiştiğinde küçük harfe dönüştür
        this.value = this.value.toLowerCase();
    });
</script>
                   <label>Gift Bonus Code & Reset All User</label>
                                </div>
                          </td>
                            
                            
                            <td style="display:none;"><input type="text" name="login_bonus_amount[]" value="<?php echo e($data->login_bonus_amount); ?>"></td>
                            <td style="display:none;"><input type="text" name="login_bonus_code[]" value="<?php echo e($data->login_bonus_code); ?>"></td>
                            <td style="display:none;"><input type="text" name="spin_bonus_amount[]" value="<?php echo e($data->spin_bonus_amount); ?>"></td>
                            <!-- Diğer sütunlar buraya eklenmeli -->
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <button type="submit" class="full-width-button">Gift Code Update & Reset All User</button>
        </form>
    <?php endif; ?>
        
    </div>

    <!-- Gift bonus end -->
    
    
    
    <!-- Checkin bonus -->
    
    <div class="dvk">
        
        <?php if(isset($bonusData)): ?>
        <form action="<?php echo e(url('/admin/bonus')); ?>" method="POST">

            <?php echo csrf_field(); ?>
            <table>
                <tbody>
                    <?php $__currentLoopData = $bonusData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="display:none;"><input type="text" name="gift_bonus_amount[]" value="<?php echo e($data->gift_bonus_amount); ?>"></td>
                            <td style="display:none;"><input type="text" name="gift_bonus_code[]" value="<?php echo e($data->gift_bonus_code); ?>"></td>
                            
                            
                            
                            <td>
                                <div class="input-field">
                   <input type="number" name="login_bonus_amount[]" value="<?php echo e($data->login_bonus_amount); ?>" required spellcheck="false" spellcheck="false" min="0.01" step="0.01"> 
                   <label>Checkin Bonus Balance</label>
                                </div>
                          </td>
                            
                            
                            <td style="display:none;"><input type="text" name="login_bonus_code[]" value="<?php echo e($data->login_bonus_code); ?>"></td>
                            <td style="display:none;"><input type="text" name="spin_bonus_amount[]" value="<?php echo e($data->spin_bonus_amount); ?>"></td>
                            <!-- Diğer sütunlar buraya eklenmeli -->
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <button type="submit" class="full-width-button">Update Checkin Bonus Balance</button>
        </form>
    <?php endif; ?>
    
    
    <?php if(isset($bonusData)): ?>
        <form action="<?php echo e(url('/admin/bonus')); ?>" method="POST" style=" margin-top: 40px; display: none;">

            <?php echo csrf_field(); ?>
            <table>
                <thead>
                    <tr>
                        <th><p>Checkin Bonus Code</p></th>
                        <!-- Diğer sütunlar buraya eklenmeli -->
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $bonusData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="display:none;"><input type="text" name="gift_bonus_amount[]" value="<?php echo e($data->gift_bonus_amount); ?>"></td>
                            <td style="display:none;"><input type="text" name="gift_bonus_code[]" value="<?php echo e($data->gift_bonus_code); ?>"></td>
                            <td style="display:none;"><input type="text" name="login_bonus_amount[]" value="<?php echo e($data->login_bonus_amount); ?>"></td>
                            <td><input type="text" name="login_bonus_code[]" id="randomLettersInput" value="<?php echo e($data->login_bonus_code); ?>"></td>
                            <td style="display:none;"><input type="text" name="spin_bonus_amount[]" value="<?php echo e($data->spin_bonus_amount); ?>"></td>
                            <!-- Diğer sütunlar buraya eklenmeli -->
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <button type="submit" id="secondButton">Checkin bonus code Update</button>
        </form>
    <?php endif; ?>
    
    <script>
document.addEventListener("DOMContentLoaded", function() {
  // Rastgele harfleri oluşturmak için fonksiyon
  function generateRandomLetters() {
    const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let randomString = "";

    for (let i = 0; i < 10; i++) {
      const randomIndex = Math.floor(Math.random() * letters.length);
      randomString += letters.charAt(randomIndex);
    }

    return randomString;
  }

  // Input kutusuna rastgele harfleri yaz
  const inputElement = document.getElementById("randomLettersInput");
  inputElement.value = generateRandomLetters();
});
</script><script>
document.addEventListener("DOMContentLoaded", function() {
  // Rastgele harfleri oluşturmak için fonksiyon
  function generateRandomLetters() {
    const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let randomString = "";

    for (let i = 0; i < 10; i++) {
      const randomIndex = Math.floor(Math.random() * letters.length);
      randomString += letters.charAt(randomIndex);
    }

    return randomString;
  }

  // Input kutusuna rastgele harfleri yaz
  const inputElement = document.getElementById("randomLettersInput");
  inputElement.value = generateRandomLetters();
});
</script>
    
    
    <button onclick="openPopup('merhabaPopup')" class="full-width-button">Reset Checkin All User</button>


<div id="merhabaPopup" class="popup">
    <div class="popup-content">
        <div><span class="close" onclick="closePopup('merhabaPopup')">&times;</span></div>
        <div><h3>Reset Checkin All User!</h3></div>
        <div><p>Allows a new check-in for all members!</p></div>
        
        <div class="button-container">
    <button class="button1" onclick="closePopup('merhabaPopup')">Close</button>
    <button class="button2" id="firstButton">Reset</button>
</div>
    </div>
</div>


        
    </div>
    <!-- Checkin bonus end -->
    
    
    
    
    
    
    <!-- Spin Bonus -->
       
    <div class="dvk">
           
           <?php if(isset($bonusData)): ?>
        <form action="<?php echo e(url('/admin/bonus')); ?>" method="POST">

            <?php echo csrf_field(); ?>
            <table>
                <tbody>
                    <?php $__currentLoopData = $bonusData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="display:none;"><input type="text" name="gift_bonus_amount[]" value="<?php echo e($data->gift_bonus_amount); ?>"></td>
                            <td style="display:none;"><input type="text" name="gift_bonus_code[]" value="<?php echo e($data->gift_bonus_code); ?>"></td>
                            <td style="display:none;"><input type="text" name="login_bonus_amount[]" value="<?php echo e($data->login_bonus_amount); ?>"></td>
                            <td><input style="display:none;" type="text" name="login_bonus_code[]" value="<?php echo e($data->login_bonus_code); ?>"></td>
                            
                            
                            <td>
                                <div class="input-field">
                   <input type="text" name="spin_bonus_amount[]" value="<?php echo e($data->spin_bonus_amount); ?>" required spellcheck="false" spellcheck="false" min="0.01" step="0.01"> 
                   <label>Spin Bonus Amount</label>
                                </div>
                          </td>
                            <!-- Diğer sütunlar buraya eklenmeli -->
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <button class="full-width-button" type="submit">Update Spin Balance</button>
        </form>
    <?php endif; ?>
    
    
    
    <div id="naberPopup" class="popup">
    <div class="popup-content">
        <div><span class="close" onclick="closePopup('naberPopup')">&times;</span></div>
        <div><h3>Reset Spin All User!</h3></div>
        <div><p>Allows a new spin for all members!</p></div>
        
        <div class="button-container">
    <button class="button1" onclick="closePopup('naberPopup')">Close</button>
    <a href="<?php echo e(url('/admin/reset-spin-record')); ?>" class="btn button2">
        Reset
    </a>
</div>
    </div>
</div>


    
    <button onclick="openPopup('naberPopup')" class="full-width-button">Spin Bonus Reset All User</button>
           
       </div>
    
    <!-- Spin Bonus end -->

    
   </div>
</div>   



   
   <style>
   body {
       background: #201757;
   }
       p  {
           color: white;
       }
       
       .full-width-button {
    width: 100%;
    padding: 10px;
    background-color: #3b26bf;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 15px;
}
       /* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.input-field{
  position: relative;
}
.input-field input{
   width: 350px;
  height: 60px;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
  border: 2px solid #fff;
  background: transparent;
  color: #fff;
  outline: none;
}
.input-field label{
  position: absolute;
  top: 50%;
  left: 15px;
  transform: translateY(-50%);
  color: #fff;
  font-size: 19px;
  pointer-events: none;
  transition: 0.3s;
}
input:focus{
  border: 2px solid #18ffff;
}
input:focus ~ label,
input:valid ~ label{
  top: 0;
  left: 15px;
  font-size: 16px;
  padding: 0 2px;
  background: #201757;
}
    .popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8); /* Şeffaf siyah arka plan */
    z-index: 1;
    text-align: center;
}

.popup-content {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 330px;
    justify-content: center;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: #201757;
    box-shadow: 0 0 10px rgba(220, 218, 232, 0.5);
    border-radius: 10px;
    z-index: 2;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    color: white; /* Kapatma işareti rengi */
    cursor: pointer;
}

h3 {
    color: #eda705;
}

.button-container {
            display: flex;
            justify-content: center;
        }
        
        .button1 {
            margin-right: 15px; /* Butonlar arasında boşluk bırakmak için */
            background-color: #ff3903;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            width: 100px;
        }

        .button2 {
            margin-right: 15px; /* Butonlar arasında boşluk bırakmak için */
            background-color: #61d95f;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            width: 100px;
        }
        
        .dvk {
            padding: 20px;
            border: 2px solid #5319ff;
            border-radius: 5px;
            margin-top: 30px;
        }
</style>
    
    <script>
        function openPopup(popupId) {
    var popup = document.getElementById(popupId);
    popup.style.display = "block";
}

function closePopup(popupId) {
    var popup = document.getElementById(popupId);
    popup.style.display = "none";
}

    </script>
    
    <script>
    document.getElementById('firstButton').addEventListener('click', function() {
    // Birinci butona tıklandığında ikinci butona tıkla
    document.getElementById('secondButton').click();
});

</script>
    
    <!--  -->
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/backend/edit/edit.blade.php ENDPATH**/ ?>