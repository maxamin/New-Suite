 <?php $__env->startSection('title'); ?> <?php echo e(__('Home')); ?> <?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/dashboard4.css')); ?>" />
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
<div class="fixed-header">
	<div class="image-container1"> <img class="image1" src="<?= $row['logohome'] ?>"> <img onclick="window.location.href='<?= $row['app'] ?>'" class="image2" src="/assets/frontend/images/googlePlay.png"> <img class="image3" id="openPopup" src="/assets/frontend/images/message.png"> </div>
</div>

<div class="custom-popup" id="customPopup">
	<div style="background-image: url('/assets/global/images/blue2.jpg');background-size: 100% 100%;border-radius: 10px; width: 90%; height: 300px;"> <span id="customClosePopup">&times;</span>
		<div style="width: 100%; display: flex; justify-content: center;">
			<div style="margin-top: -10px;">
				<?= $row['form1'] ?>
		     </div>
		</div>
	</div>
</div>
<script>
// Sayfa yüklendiğinde ve her 30 saniyede bir çalışacak JavaScript kodu
document.addEventListener('DOMContentLoaded', function() {
	const customPopup = document.getElementById('customPopup');
	const customClosePopup = document.getElementById('customClosePopup');
	const storageKey = 'popupLastShown';

	function showPopup() {
		customPopup.style.display = 'flex';
		localStorage.setItem(storageKey, Date.now().toString());
		setTimeout(function() {
			customPopup.style.display = 'none';
		}, 100000); // Popup'ın 5 saniye boyunca görünür kalması (istediğiniz süreyi değiştirebilirsiniz)
	}

	function shouldShowPopup() {
		const lastShown = localStorage.getItem(storageKey);
		if(!lastShown) {
			return true;
		}
		const currentTime = Date.now();
		const elapsedTime = currentTime - parseInt(lastShown);
		return elapsedTime > 240000; // 240 saniye geçtiyse true, aksi takdirde false
	}
	if(shouldShowPopup()) {
		showPopup();
	}
	customClosePopup.addEventListener('click', function() {
		customPopup.style.display = 'none';
	});
	// Sayfa dışına tıklanınca popup'ı kapat
	window.addEventListener('click', function(event) {
		if(event.target === customPopup) {
			customPopup.style.display = 'none';
		}
	});
	// img etiketine tıklandığında popup'ı göster
	const openPopup = document.getElementById('openPopup');
	openPopup.addEventListener('click', function() {
		showPopup();
	});
});
</script>
<div class="slider-container" style="box-shadow: 0 0 30px rgba(44, 46, 48, 0.5);">
	<div class="slider">
	    <img class="mkm" src="<?= $row['slider1'] ?>">
	    <img class="mkm" src="<?= $row['slider2'] ?>">
	    <img class="mkm" src="<?= $row['slider3'] ?>">
	    <img class="mkm" src="<?= $row['slider4'] ?>">
	    <img class="mkm" src="<?= $row['slider5'] ?>">
	</div>
	<button class="prev"></button>
	<button class="next"></button>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
	const slider = document.querySelector(".slider");
	const prevButton = document.querySelector(".prev");
	const nextButton = document.querySelector(".next");
	let startX;
	let currentX;
	let isDragging = false;
	let slideIndex = 0;
	let autoScrollInterval;
	nextButton.addEventListener("click", function() {
		slideIndex++;
		if(slideIndex >= slider.children.length) {
			slideIndex = slider.children.length - 1;
		}
		updateSlider();
	});
	prevButton.addEventListener("click", function() {
		slideIndex--;
		if(slideIndex < 0) {
			slideIndex = 0;
		}
		updateSlider();
	});
	slider.addEventListener("touchstart", function(e) {
		isDragging = true;
		clearInterval(autoScrollInterval);
		startX = e.touches[0].clientX;
	});
	slider.addEventListener("touchmove", function(e) {
		if(!isDragging) return;
		currentX = e.touches[0].clientX;
		const diff = currentX - startX;
		const translateX = -slideIndex * 100 + (diff / slider.clientWidth) * 100;
		slider.style.transform = `translateX(${translateX}%)`;
	});
	slider.addEventListener("touchend", function() {
		if(!isDragging) return;
		if(currentX > startX) {
			slideIndex--;
			if(slideIndex < 0) {
				slideIndex = 0;
			}
		} else {
			slideIndex++;
			if(slideIndex >= slider.children.length) {
				slideIndex = slider.children.length - 1;
			}
		}
		updateSlider();
		isDragging = false;
		startAutoScroll();
	});

	function updateSlider() {
		const translateX = -slideIndex * 100;
		slider.style.transform = `translateX(${translateX}%)`;
	}

	function startAutoScroll() {
		autoScrollInterval = setInterval(function() {
			if(!isDragging) {
				slideIndex++;
				if(slideIndex >= slider.children.length) {
					slideIndex = 0;
				}
				updateSlider();
			}
		}, 5000);
	}
	startAutoScroll();
});
</script>
<!-- mesaj -->
<div class="marquee" style="background-image: url('/assets/global/images/blue2.jpg');background-size: 100% 100%; box-shadow: 0 0 30px rgba(44, 46, 48, 0.5);">
	<div> <img src="/assets/global/images/announcement1.png" width="50" height="50">
		<p><?= $row['form2'] ?></p>
	</div>
</div>
<!-- mesaj end -->
<div style="display: flex; justify-content: center;">
	<div class="containert">
		<a href="#" onclick="openPopup()">
			<div class="boxt1"> <img src="/assets/frontend/images/5740394.webp" class="rotating-image"> <img src="/assets/frontend/images/gctext.png" style="width: 92px;"> </div>
		</a>
		<div style="width:10px;"></div>
		<a href="/check-in">
			<div class="boxt2"> <img src="/assets/frontend/images/6166440.webp" class="rotating-image2"> <img src="/assets/frontend/images/check-in-text.png" style="width: 82px;"> </div>
		</a>
	</div>
</div>
<!-- spin -->
<div class="popup-container" id="popupContainer"> <span class="close-btn" onclick="closePopup()">&#10006;</span>
	<div class="popup-content">
		<!-- İçeriğinizi buraya ekleyin -->
		<div style="display: flex; justify-content: center; widt: 100%;">
			<h1 style="color: gold; margin: 0 auto; margin-top: 30px; display:none;">GIFT CODE</h1> </div>
		<div style="display: flex; justify-content: center; widt: 100%;">
			<div style="margin-top: 111px; width: 95%;">
				<div style="display: flex; justify-content: center; widt: 100%;">
					<div style="margin-top: 50px; padding: 10px;"> <?php if(isset($successMessage)): ?>
						<p id="myParagraph" class="success-message"><?php echo e($successMessage); ?></p> <?php elseif(isset($alreadyUsedMessage)): ?>
						<p id="myParagraph" class="error-message"><?php echo e($alreadyUsedMessage); ?></p> <?php elseif(isset($invalidCodeMessage)): ?>
						<p id="myParagraph" class="error-message"><?php echo e($invalidCodeMessage); ?></p> <?php endif; ?> </div>
				</div>
				<form class="custom-form" method="POST" action="/h5/index.php/home" style="margin-bottom: 30px;"> <?php echo csrf_field(); ?>
					<label class="form-label" for="message">Gift Code:</label>
					<input class="form-input" type="text" name="message" id="message" required placeholder="Please Enter Gift Code" oninput="convertToLowerCase(this)">
					<button class="form-button" type="submit">Get Bonus</button>
				</form>
				<div class="custom-form" style="background-color: rgba(0, 0, 0, 0.8);">
					 <?= $row['form3'] ?>
				</div>
				<script>
				function convertToLowerCase(element) {
					element.value = element.value.toLowerCase();
				}
				</script>
				<script>
				setTimeout(function() {
					var myParagraph = document.getElementById('myParagraph');
					myParagraph.style.opacity = 0;
				}, 4000);
				</script>
			</div>
		</div>
	</div>
</div>
<script>
function openPopup() {
	document.getElementById('popupContainer').style.display = 'flex';
}

function closePopup() {
	document.getElementById('popupContainer').style.display = 'none';
}
</script>
<!-- spin end -->
<!-- spin view -->
<a href="/lucky-spin" onclick="openPopupk()">
	<div style="display: flex; justify-content: center; margin-top: 20px;">
		<div class="container959">
			<div class="content959"> <img class="rotatiner" src="/assets/frontend/images/spinicon.png"> </div>
			<div class="content959"> <img class="rotatiner2" src="/assets/frontend/images/luckyspin.png"> </div>
			<div class="content959"> </div>
		</div>
	</div>
</a>
<!-- spin view end -->
<div style="margin-bottom: 20px;"></div>
<div style="text-align: center; background-image: url('/assets/global/images/blue2.jpg');background-size: 100% 100%; padding: 20px 20px 0 20px; border-radius: 10px; box-shadow: 0 0 30px rgba(44, 46, 48, 0.5);">
	<div style="display: flex; justify-content: center; align-items: center;">
		<div style="text-align: center;">
			<p class="rtf">Total Deposit</p>
			<p class="rtt"><?php echo e($currencySymbol); ?><?php echo e($dataCount['total_deposit']); ?></p>
		</div>
		<div class="uzun-cizgi"></div>
		<div style="text-align: center;">
			<p class="rtf">Total Investment</p>
			<p class="rtt"><?php echo e($currencySymbol); ?><?php echo e($dataCount['total_investment']); ?></p>
		</div>
		<div class="uzun-cizgi"></div>
		<div style="text-align: center;">
			<p class="rtf">total profit</p>
			<p class="rtt"><?php echo e($currencySymbol); ?><?php echo e($dataCount['total_profit']); ?></p>
		</div>
		<div class="uzun-cizgi"></div>
		<div style="text-align: center;">
			<p class="rtf">Total Withdrawal</p>
			<p class="rtt"><?php echo e($currencySymbol); ?><?php echo e($dataCount['total_withdraw']); ?></p>
		</div>
	</div>
	<div style="display: flex; justify-content: center; align-items: center;">
		<div style="text-align: center;">
			<p class="rtf">Total Reference</p>
			<p class="rtt"><?php echo e($dataCount['total_referral']); ?></p>
		</div>
		<div class="uzun-cizgi"></div>
		<div style="text-align: center;">
			<p class="rtf">Total Team Wins</p>
			<p class="rtt"><?php echo e($currencySymbol); ?><?php echo e($dataCount['total_referral_profit']); ?></p>
		</div>
		<div class="uzun-cizgi"></div>
		<div style="text-align: center;">
			<p class="rtf">Deposit Bonus</p>
			<p class="rtt"><?php echo e($currencySymbol); ?><?php echo e($dataCount['deposit_bonus']); ?></p>
		</div>
		<div class="uzun-cizgi"></div>
		<div style="text-align: center;">
			<p class="rtf">Investment Bonus</p>
			<p class="rtt"><?php echo e($currencySymbol); ?><?php echo e($dataCount['investment_bonus']); ?></p>
		</div>
	</div>
</div>
<div style="margin-bottom: 10px;"></div>

<div style="width: 100%; display: flex; justify-content: center;">
    
    <div style="width: 100%; background-image: url('/assets/global/images/blue2.jpg'); border-radius: 10px; display: flex; justify-content: center; padding: 8px 0 0 0;">
        <h5>Some Units Current Exchange Rate</h5>
    </div>
    
</div>

<div style="margin-bottom: 10px;"></div>

<!-- trading template -->


    
    
    <style>
#outer-grid {
display: grid;
grid-gap: 10px;
}
#outer-grid > div {
background-image: url('/assets/global/images/blue2.jpg');
color: white;
border-radius: 10px;
font-size: 4vw;
padding: 10px;
}
#inner-grid {
display: grid;
grid-template-columns: 1fr 1fr;
grid-gap: 5px;
}
#inner-grid > div {
background: salmon;
padding: 10px;
}
</style>
<div id="outer-grid">

<div><!-- TradingView Widget BEGIN -->
<div>
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
{
"symbol": "BINANCE:BTCUSDT",
"width": 350,
"locale": "en",
"dateRange": "12M",
"colorTheme": "dark",
"trendLineColor": "rgba(41, 98, 255, 1)",
"underLineColor": "rgba(41, 98, 255, 0.3)",
"underLineBottomColor": "rgba(41, 98, 255, 0)",
"isTransparent": false,
"autosize": false,
"largeChartUrl": ""
}
</script>
</div>


<div style="margin-top: 10px;">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
{
"symbol": "BINANCE:ETHUSDT",
"width": 350,
"locale": "en",
"dateRange": "12M",
"colorTheme": "dark",
"trendLineColor": "rgba(41, 98, 255, 1)",
"underLineColor": "rgba(41, 98, 255, 0.3)",
"underLineBottomColor": "rgba(41, 98, 255, 0)",
"isTransparent": false,
"autosize": false,
"largeChartUrl": ""
}
</script>
</div>


<div style="margin-top: 10px;">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
{
"symbol": "BINANCE:BNBUSDT",
"width": 350,
"locale": "en",
"dateRange": "12M",
"colorTheme": "dark",
"trendLineColor": "rgba(41, 98, 255, 1)",
"underLineColor": "rgba(41, 98, 255, 0.3)",
"underLineBottomColor": "rgba(41, 98, 255, 0)",
"isTransparent": false,
"autosize": false,
"largeChartUrl": ""
}
</script>
</div>


<div style="margin-top: 10px;">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
{
"symbol": "BINANCE:XRPUSDT",
"width": 350,
"locale": "en",
"dateRange": "12M",
"colorTheme": "dark",
"trendLineColor": "rgba(41, 98, 255, 1)",
"underLineColor": "rgba(41, 98, 255, 0.3)",
"underLineBottomColor": "rgba(41, 98, 255, 0)",
"isTransparent": false,
"autosize": false,
"largeChartUrl": ""
}
</script>
</div>


<div style="margin-top: 10px;">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
{
"symbol": "BINANCE:ADAUSDT",
"width": 350,
"locale": "en",
"dateRange": "12M",
"colorTheme": "dark",
"trendLineColor": "rgba(41, 98, 255, 1)",
"underLineColor": "rgba(41, 98, 255, 0.3)",
"underLineBottomColor": "rgba(41, 98, 255, 0)",
"isTransparent": false,
"autosize": false,
"largeChartUrl": ""
}
</script>
</div>


<div style="margin-top: 10px;">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
{
"symbol": "BINANCE:DOTUSDT",
"width": 350,
"locale": "en",
"dateRange": "12M",
"colorTheme": "dark",
"trendLineColor": "rgba(41, 98, 255, 1)",
"underLineColor": "rgba(41, 98, 255, 0.3)",
"underLineBottomColor": "rgba(41, 98, 255, 0)",
"isTransparent": false,
"autosize": false,
"largeChartUrl": ""
}
</script>
</div>


<div style="margin-top: 10px;">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
{
"symbol": "BINANCE:DOGEUSDT",
"width": 350,
"locale": "en",
"dateRange": "12M",
"colorTheme": "dark",
"trendLineColor": "rgba(41, 98, 255, 1)",
"underLineColor": "rgba(41, 98, 255, 0.3)",
"underLineBottomColor": "rgba(41, 98, 255, 0)",
"isTransparent": false,
"autosize": false,
"largeChartUrl": ""
}
</script>
</div>


<div style="margin-top: 10px;">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
{
"symbol": "BINANCE:TRXUSDT",
"width": 350,
"locale": "en",
"dateRange": "12M",
"colorTheme": "dark",
"trendLineColor": "rgba(41, 98, 255, 1)",
"underLineColor": "rgba(41, 98, 255, 0.3)",
"underLineBottomColor": "rgba(41, 98, 255, 0)",
"isTransparent": false,
"autosize": false,
"largeChartUrl": ""
}
</script>
</div>


<div style="margin-top: 10px;">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
{
"symbol": "BINANCE:XLMUSDT",
"width": 350,
"locale": "en",
"dateRange": "12M",
"colorTheme": "dark",
"trendLineColor": "rgba(41, 98, 255, 1)",
"underLineColor": "rgba(41, 98, 255, 0.3)",
"underLineBottomColor": "rgba(41, 98, 255, 0)",
"isTransparent": false,
"autosize": false,
"largeChartUrl": ""
}
</script>
</div>


<div style="margin-top: 10px;">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
{
"symbol": "BINANCE:LINKUSDT",
"width": 350,
"locale": "en",
"dateRange": "12M",
"colorTheme": "dark",
"trendLineColor": "rgba(41, 98, 255, 1)",
"underLineColor": "rgba(41, 98, 255, 0.3)",
"underLineBottomColor": "rgba(41, 98, 255, 0)",
"isTransparent": false,
"autosize": false,
"largeChartUrl": ""
}
</script>
</div>


</div>

</div>

<button class="invisible-button" style="width: 100%; margin-top: 10px;" onclick="window.location.href='/about'">More About Trader VIP AI</button>


<div style="margin-bottom: 40px;"></div> <?php $__env->startSection('script'); ?>
<script>
function copyRef() {
	/* Get the text field */
	var copyApi = document.getElementById("refLink");
	/* Select the text field */
	copyApi.select();
	copyApi.setSelectionRange(0, 999999999); /* For mobile devices */
	/* Copy the text inside the text field */
	document.execCommand('copy');
	$('#copy').text($('#copied').val())
}
</script> <?php $__env->stopSection(); ?> <?php echo $__env->make('frontend.footer.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u718774278/domains/fdsdfsadf.us.to/public_html/resources/views/frontend/user/dashboard.blade.php ENDPATH**/ ?>