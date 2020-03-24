<!DOCTYPE html>
<?php
define('WPCVC_URL', '../..');

?>
<html>
    <head>
        <title>Clayfy: Demos resizable</title>
        <meta name="description" content="Clayfy JQuery plugin. Make elements resizable with less effort.">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/style.css">
        <script src="../../assets/libs/jquery.js"></script>
        <script src="../../assets/dist/clayfy.min.js"></script>
        <link rel="stylesheet" href="../../assets/dist/clayfy.min.css" type="text/css">
        <style>
            h3{
                margin: 30px 0 0 0;
            }
            p{
                margin: 0
            }
            pre{
                margin: 0;
                color : #555;
            }
            .rect {
                height: 100px;
                width : 150px;
                background : #ccc;
                position: absolute;
                top: 10px;
                left: 10px;

            }
            .container{
                margin-bottom: 20px;
                height: 110px;
                max-width: 500px;
                position: relative;
            }
            
            .custom-handlers.clayfy-top:after,
            .custom-handlers.clayfy-bottom:after,
            .custom-handlers.clayfy-left:after,
            .custom-handlers.clayfy-right:after
            {
                content: '';
                position: absolute;
                height: 2px;
                top:0;left:0;
                width:100%;
                background: red;
            }
            .custom-handlers.clayfy-bottom:after{
                top:auto; bottom: 0;
            }
            .custom-handlers.clayfy-left:after{
                width:2px; height:100%;
            }
            .custom-handlers.clayfy-right:after{
                width:2px; height:100%;
                right: 0; left:auto;
            }
            .custom-handlers.right:after,
            .custom-handlers.left:after
            {
                height: 100%;
            }

            
            #demo-5{
                border: 4px solid #38c429;
                overflow:scroll
            }
            #demo-6{
                padding: 10px;
            }
  
            
        </style>
            
    </head>
    <body>
        <!--Demo start-->





        <div class="demo">
        
        <div class="container" id="container-6" style="height: 500px; border: 2px solid #444">
            <div id="demo-6" class="rect"></div>
            <img id="demo-7" class="rect" src="https://pbs.twimg.com/profile_images/823569976342773760/c2RLAG7h_400x400.jpg" />
        </div>
        <div>
            <label>Ajouter un text</label>
            <input type="text" name="input-text" id="input-text"  placeholder="Text a ajouter">
            <button id="button-text" onclick="addText()">Ajouter un Text</button>
        </div>
        <div>
            <label>Ajouter un image</label>
            <input type="text" name="input-img" id="input-img" placeholder="Url de l image">
            <button id="button-img" onclick="addImage()">Ajouter une Image</button>
        </div>
        </div>
        <!--Demo ends-->

        <script>
            function addText(){
                var id = "text-"+( Math.floor(Math.random() * 100) );
                var text = $("#input-text").val();
                $("#container-6").append("<div class='rect' id='"+id+"'>"+text+"</div>");
                var input = $("#"+id);
                initDragDrop(input,[50,10],[200,300]);
            }
            function addImage(){
                var id = "img-"+( Math.floor(Math.random() * 100) );
                var src = $("#input-img").val();
                $("#container-6").append("<img class='rect' id='"+id+"'  src='"+src+"' >");
                var input = $("#"+id);
                initDragDrop(input);
            }
            function initDragDrop($item, $minSize=[50,50],$maxSize=[500,400]){
                $item.clayfy({
                    type : 'resizable',
                    container : '#container-6',
                    minSize :  $minSize,
                    maxSize : $maxSize,
                    className : 'custom-handlers',
                    callbacks : {
                        resize : function(){
                            // $item.html( 'inner: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                        }
                    }
                });
                $item.on('clayfy-cancel', function(){
                    // $item.html( 'inner: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                })
            }
            var $demo = ['#demo-6','#demo-7'];
            for(var i = 0; i<$demo.length; i++){
                var $item = $($demo[i]);
                initDragDrop($item);
                
            }
            
        </script>


















        <main id="skip_content" role="main">
		    <div class="container">
		        <div class="main-wrapper">
					<link rel="stylesheet" href="<?php echo WPCVC_URL; ?>/assets/css/style.css">
					<main>
						<div class="main-content">



							
						</div>
					</main>
					<script
						src="https://code.jquery.com/jquery-3.4.1.min.js"
						integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
						crossorigin="anonymous">
					</script>
					<script type="text/javascript" src="<?php echo WPCVC_URL; ?>/assets/js/script.js"></script>
				</div>
			</div>
		</main>
    </body>
</html>
