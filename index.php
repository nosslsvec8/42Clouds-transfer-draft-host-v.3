<!DOCTYPE html>
<html>
<head>
	<title>Ver.2 Перенос верстки с хостa на черновик</title>
	<link rel="shortcut icon" href="website.png" type="image/png">
</head>
<body>
	<main>
		<h1>Ver.2 Перенос верстки с хостa на черновик</h1>
		<div class="main-title">
			<h2>Код</h2>
		</div>
		<div class="main-panel">
			<div class="main-textarea">
				<textarea class="cod" name="text" placeholder="Вставте ваш код"></textarea>
				
			</div>
			<div class="main-control">
				<input type="submit" class="dev" name="select" value="Без добавления ссылок" />
				<input type="submit" class="prod" name="select" value="Код с prod" />
			</div>
		</div>
	</main>
	<section class="result">
		<h3>Результат</h3>
		<textarea class="html" id="html" name="text" placeholder="html + js"></textarea>
		<textarea class="css" name="text" placeholder="css"></textarea>
	</section>
</body>
</html>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script type="text/javascript">
	$('.dev').click(function(){        
        var cod = $(".cod").val();

        var ajaxurl = 'css.php',
        data =  {'action': cod};
        $.post(ajaxurl, data, function (response) {
            $('.css').val('');
            $('.css').val($.trim(response));

            var ajaxurl2 = 'html.php',
        	data =  {'action': cod};
        	$.post(ajaxurl2, data, function (response2) {
	            $('.html').val('');
	            $('.html').val($.trim(response2));

	            var css = $('.css').val();
	            var ajaxurl3 = 'dev-link.php',
	        	data =  {'action': css};
	        	$.post(ajaxurl3, data, function (response3) {
		            $('.css').val('');
		            $('.css').val($.trim(response3));

		            var html = $('.html').val();
			        var ajaxurl4 = 'dev-link.php',
			        data =  {'action': html};
			        $.post(ajaxurl4, data, function (response4) {
				        $('.html').val('');
				        $('.html').val($.trim(response4));
			        });
	        	});
        	});
        });
	});


	$('.prod').click(function(){        
        var cod = $(".cod").val();

        var ajaxurl = 'css.php',
        data =  {'action': cod};
        $.post(ajaxurl, data, function (response) {
            $('.css').val('');
            $('.css').val($.trim(response));

            var ajaxurl2 = 'html.php',
        	data =  {'action': cod};
        	$.post(ajaxurl2, data, function (response2) {
	            $('.html').val('');
	            $('.html').val($.trim(response2));

	            var css = $('.css').val();
	            var ajaxurl3 = 'prod-link.php',
	        	data =  {'action': css};
	        	$.post(ajaxurl3, data, function (response3) {
		            $('.css').val('');
		            $('.css').val($.trim(response3));

		            var html = $('.html').val();
			        var ajaxurl4 = 'prod-link.php',
			        data =  {'action': html};
			        $.post(ajaxurl4, data, function (response4) {
				        $('.html').val('');
				        $('.html').val($.trim(response4));
			        });
	        	});
        	});
        });
	});
</script>

<style type="text/css">
	main{
		text-align: center;
		padding-top: 0;
	}

	h2, h3{
		margin: 0.5em 0;
	}

	.main-panel{
		display: flex;
		justify-content: space-evenly;
		align-items: center;
		flex-direction: column;
	}

	.main-control{
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.main-textarea{
		display: flex;
	}

	.main-title{
		display: flex;
		justify-content: space-evenly;
	}

	textarea{
		width: 34vw;
    	height: 150px;
    	margin: 0 4% 30px;
	}

	input{
		margin: 0 3%;
		border: 0;
		border-radius: 20px;
		padding: 6px 18px;
		font-size: 15px;
	}

	input:hover{
		cursor: pointer;
	}

	.result{
		padding-top: 18px;
		text-align: center;
	}

	.dev{
		background-color: #01fafa;
	}

	.prod{
		background-color: yellow;
	}
</style>