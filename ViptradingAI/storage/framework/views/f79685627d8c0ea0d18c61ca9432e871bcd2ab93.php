<?php if($status == 'ongoing'): ?>

    <div>
        <strong><span id="days<?php echo e($id); ?>"></span>D : <span id="hours<?php echo e($id); ?>"></span>H : <span
                id="minutes<?php echo e($id); ?>"></span>M : <span id="seconds<?php echo e($id); ?>"></span>S</strong>
        <span class="site-badge primary-bg ms-2" id="percentage<?php echo e($id); ?>"></span>
    </div>
    <div class="progress investment-timeline">
        <div class="progress-bar progress-bar-striped progress-bar-animated" id="time-progress<?php echo e($id); ?>"
             role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <script>

        (function ($) {
            "use strict";
            // Countdown
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            let timezone = <?php echo json_encode(setting('site_timezone', 'global'), 512) ?>;

            let countDown = new Date('<?php echo e($next_profit_time); ?>').getTime()
            var start = new Date('<?php echo e($last_profit_time ?? $created_at); ?>').getTime()
            setInterval(function () {

                let utc_datetime_str = new Date().toLocaleString("en-US", { timeZone: timezone });
                let now = new Date(utc_datetime_str).getTime();
                let  distance = countDown - now;


                var progress = (((now - start) / (countDown - start)) * 100).toFixed(2);


                $("#time-progress<?php echo e($id); ?>").css("width", progress + '%');

                $("#percentage<?php echo e($id); ?>").text(progress >= 100 ? 100 + '%' : progress + '%');

                document.getElementById('days<?php echo e($id); ?>').innerText = Math.floor(distance < 0 ? 0 : distance / (day)),
                    document.getElementById('hours<?php echo e($id); ?>').innerText = Math.floor(distance < 0 ? 0 : (distance % (day)) / (hour)),
                    document.getElementById('minutes<?php echo e($id); ?>').innerText = Math.floor(distance < 0 ? 0 : (distance % (hour)) / (minute)),
                    document.getElementById('seconds<?php echo e($id); ?>').innerText = Math.floor(distance < 0 ? 0 : (distance % (minute)) / second);

            }, second)

        })(jQuery)

    </script>
<?php elseif($status == 'completed'): ?>
    <div class="site-badge success"><?php echo e(__('Completed')); ?></div>
    <div class="progress investment-timeline">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
             aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
    </div>
<?php else: ?>
    <div class="site-badge pending"><?php echo e(__('Pending')); ?></div>
<?php endif; ?>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/investment/include/__invest_next_profit_time.blade.php ENDPATH**/ ?>