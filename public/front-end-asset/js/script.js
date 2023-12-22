var button1 = document.querySelector('.c_click1');
var button2 = document.querySelector('.c_click2');
var demo1 = document.querySelectorAll('.single_price')[0];
var demo2 = document.querySelectorAll('.single_price')[1];
button1.addEventListener('click', function() {
	button1.classList.add('active1');
	button2.classList.remove('active1');
	demo1.classList.add('scale');
	demo2.classList.remove('scale');
});
button2.addEventListener('click', function() {
	button2.classList.add('active1');
	button1.classList.remove('active1');
	demo1.classList.remove('scale');
	demo2.classList.add('scale');
});