<style>
.hb-area-<?php echo $bID?> {
	background: url('<?php echo $link ?>') no-repeat <?php echo $position?> center;
	height: 500px;
	width: 100%;
	position: relative;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
.hb-area-<?php echo $bID?> h1 {
	display: none;
}
@media only screen and (min-width: 768px) {
	.hb-area-<?php echo $bID?> {
		height: 300px;
	}
}
@media only screen and (min-width: 992px) {
	.hb-area-<?php echo $bID?> h1 {
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
		.hb-area-<?php echo $bID?> h1 {
			font-size: 60px;
		}
	}
}
</style>
<script>
	var scrollFor<?php echo $bID?>=false;
	console.log("scrollFor<?php echo $bID?> = " + scrollFor<?php echo $bID?> )
	function parallax<?php echo $bID?>() {
		scrollFor<?php echo $bID?>=true;
		console.log("scrollFor<?php echo $bID?> = " + scrollFor<?php echo $bID?> )
		console.log("parallax started");
		var w = window.innerWidth
		|| document.documentElement.clientWidth
		|| document.body.clientWidth;
		if (w > 1200) {
			console.log("parallax enabled on <?php echo $bID?>");
			$(".hb-area-<?php echo $bID?>").css('background-position', "center " + (-($(this).scrollTop() / 4) <?php echo $offset ?>) + "px" );
		} else {
			console.log("parallax off on <?php echo $bID?>");
			$(".hb-area-<?php echo $bID?>").css('background-position', '<?php echo $position?> center');
		}
	}
</script>
<div class="hb-area-<?php echo $bID?>">
	<h1>
	<?php
		if($titlestate) {
			echo $title;
		}
	?>
	</h1>
</div>
<?php
	if($parallaxstate) {
		echo('<script>parallax'.$bID.'();</script>');
	}
?>
<script>
	$( document ).ready(function() {
		if(scrollFor<?php echo $bID?>==true) {
			parallax<?php echo $bID?>();
		}
	});
	$(window).scroll(function() {
		if(scrollFor<?php echo $bID?>==true) {
			parallax<?php echo $bID?>();
		}
	});
</script>