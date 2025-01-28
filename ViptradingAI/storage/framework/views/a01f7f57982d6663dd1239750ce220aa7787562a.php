<?php
    $calculateInterest = ($interest*$invest_amount)/100;
    $interest = $interest_type != 'percentage' ? $interest : $calculateInterest;
?>

<strong><?php echo e($already_return_profit .' x '.$interest .' = '. ($already_return_profit*$interest).' '. $currency); ?></strong>
<?php /**PATH /home/u718774278/domains/h5.tradervipai.com/public_html/resources/views/backend/investment/include/__invest_profit.blade.php ENDPATH**/ ?>