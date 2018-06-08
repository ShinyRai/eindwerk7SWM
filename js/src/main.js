$('#video').modal()

$(".roze").on('mouseover', function() {
	$(".fles_hover").attr("src","images/flespink.png"); 
});

$(".geel").on('mouseover', function() {
	$(".fles_hover").attr("src","images/flesyello.png");
});

$(".groen").on('mouseover', function() {
	$(".fles_hover").attr("src","images/flesgreen.png");
});




var prodAmount = document.querySelectorAll('.productAmount');

for (var i = 0; i < prodAmount.length; i++) {
    prodAmount[i].addEventListener('change', function(event) {
        calculateTotal();
    });
}

function calculateTotal(){

	var som = 0;

	for(var i = 0; i < prodAmount.length; i++){
		som += (prodAmount[i].dataset.price * prodAmount[i].value);
	}

	document.querySelector('.totaal').innerHTML = "€ " + som.toFixed(2);
}