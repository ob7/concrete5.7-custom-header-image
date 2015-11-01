<style>
.hb-area {
	background: url('<?php echo $link ?>') no-repeat center center;
	height: 500px;
	width: 100%;
	position: relative;
}
.hb-area h1 {
	display: none;
}
@media only screen and (min-width: 768px) {
	.hb-area {
		height: 300px;
	}
}
@media only screen and (min-width: 992px) {
	.hb-area h1 {
		color: #FFF;
		font-style: italic;
		-webkit-filter: drop-shadow( 2px 2px 5px #000 );
		filter: drop-shadow( 2px 2px 5px #000 );
		position: absolute;
		width: 100%;
		top: 50%;
		-webkit-transform: translateY(-50%);
		-moz-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		-o-transform: translateY(-50%);
		transform: translateY(-50%);	
		text-align: center;
		display: block;
		font-size: 48px;
	}
	@media only screen and (min-width: 1200px) {
		.hb-area h1 {
			font-size: 60px;
		}
	}
}
</style>
<div class="hb-area">
	<h1>
	<?php
		if($titlestate) {
			echo $title;
		}
	?>
	</h1>
</div>
<script>
	$( document ).ready(function() {
		parallax();
	});
	$(window).scroll(function() {
		parallax();
	});
	function parallax() {
		var w = window.innerWidth
		|| document.documentElement.clientWidth
		|| document.body.clientWidth;
		if (w > 1200) {
			console.log("parallax enabled");
			$(".hb-area").css('background-position', "center " + (-($(this).scrollTop() / 4) <?php echo $offset ?>) + "px" );
		} else {
			console.log("parallax off");
			$(".hb-area").css('background-position', '<?php echo $position?> center');
		}
	}
</script>
