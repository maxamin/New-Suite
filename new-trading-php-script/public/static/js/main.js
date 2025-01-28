function go(url) {
	localStorage.setItem('redirect_uri', location.href);
	location.href = url;
}

function goBack() {
	history.go(-1)
}

function alert(msg){
  return info(msg,function (){})
}

function info(msg, end) {
  layer.msg(msg, {
    time: 2000,
    end: end
  });
}

function error(msg) {
  layer.msg(msg, function() { return false; });
}

var LoadingIndex = null

function loading(msg = '') {
	LoadingIndex = layer.load(2, {
	  shade: [0.3,'#000']
	})
}

function loadingHide() {
	if (LoadingIndex) {
		layer.close(LoadingIndex)
	}
}

var ModalIndex = null
function showModal(opt) {
	if (!opt.content) return
	ModalIndex = layer.open({
	  type: 1,
		closeBtn: opt.closeBtn || 0,
		content: opt.content,
	  shade: [0.6,'#000'],
		shadeClose: true,
	  title: false, 
		resize: false
	});
}

function hideModal() {
	if (ModalIndex) {
		layer.close(ModalIndex)
	}
}

// update Query and return Url
function updateQueryStringParameter(key, value, uri = '') {
	uri === '' ? uri = window.location.href : uri;
	if (!value) {
		return uri;
	}
	var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
	var separator = uri.indexOf('?') !== -1 ? "&" : "?";
	if (uri.match(re)) {
		return uri.replace(re, '$1' + key + "=" + value + '$2');
	} else {
		return uri + separator + key + "=" + value;
	}
}

// h5 Copy text
function copyContentH5(content) {
	var copyDom = document.createElement('div');
	copyDom.innerText = content;
	copyDom.style.position = 'absolute';
	copyDom.style.top = '0px';
	copyDom.style.right = '-9999px';
	document.body.appendChild(copyDom);
	// created select Range
	var range = document.createRange();
	range.selectNode(copyDom);
	// Remove content from the clipboard
	window.getSelection().removeAllRanges();
	// Add new content to the clipboard
	window.getSelection().addRange(range);
	// copy
	var successful = document.execCommand('copy');
	copyDom.parentNode.removeChild(copyDom);
	
	try {
		var msg = successful ? "successful" : "failed";
		return msg
		console.log('Copy command was : ' + msg);
	} catch (err) {
		console.log('Oops , unable to copy!');
	}
}

function set_lang(lang = 'en') {
	setCookie('lang', lang);
	location.reload();
}

function setCookie(name, value){
	document.cookie = name + '=' + encodeURIComponent(value) + '; max-age=' + 365 * 24 * 3600 + '; path=/';
}

function getCookie(name) {
	var pairs = document.cookie.split(';');

	for(var i = 0; i < pairs.length; i++) {
		var pair = pairs[i].split('=');

		if (pair[0].trim() == name)
			return decodeURIComponent(pair[1]);
	}

	return null;
}

function showPopup(selector) {
	popupMask.show();
	popup = $(selector);
	popup.show();	
}   

function hidePopup(jThis = '') {
	if (!popup.hasClass('popup-modal')) {
		popupMask.hide();

		if(jThis){
		    jThis.hide();
		}else{
		   popup.hide();
		}
		
	}
}

var popupMask;
var popup;

$(function() {
	$('body').append('<div class="popup-mask"></div>');

	popupMask = $('.popup-mask');
	popupMask.click(()=>{
		hidePopup();
	});

	$('.header-lang,.other-lang').click(function() {
		showPopup('.lang-popup');
	});
});
