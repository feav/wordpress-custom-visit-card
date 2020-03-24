<?php get_header(); ?>  
<link rel="stylesheet" href="<?php echo WPCVC_URL; ?>/assets/css/style.css">
<script src="<?php echo WPCVC_URL; ?>/assets/libs/jquery.js"></script>
<script src="<?php echo WPCVC_URL; ?>/assets/dist/clayfy.min.js"></script>
<link rel="stylesheet" href="<?php echo WPCVC_URL; ?>/assets/dist/clayfy.min.css" type="text/css">
<main id="skip_content" role="main">
    <div class="container">
        <div class="main-wrapper">
            <link rel="stylesheet" href="<?php echo WPCVC_URL; ?>/assets/css/style.css">
            <main>
                <div class="header">
                    <ul>
                        <li>
                            <select class="fonts-list">
                                <option>Police</option>
                                <option>Arial</option>
                                <option>Sans Serif</option>
                                <option>Serif</option>
                            </select>
                        </li>

                        <li>
                            <img id="color-wheel" src="<?php echo WPCVC_URL; ?>/assets/images/color_wheel.png" />
                        </li>

                        <li><i class="fas fa-font"></i></li>
                        <li><i class="fas fa-bold"></i></li>
                        <li><i class="fas fa-italic"></i></li>

                        <li><i class="fas fa-align-left"></i></li>
                        <li><i class="fas fa-align-right"></i></li>
                        <li><i class="fas fa-align-justify"></i></li>
                    </ul>
                </div>
                <div class="main-content">
                    <div class="side">
                        <div class="zoom">
                            <div class="less"><span>-</span></div>
                            <span class="text">ZOOM</span>
                            <div class="more"><span>+</span></div>
                        </div>
                        <div class="options">
                            <span class="item">RECTO</span>
                            <span class="item">VERSO</span>
                            <span class="item">VARTON REPAS</span>
                            <span class="item">ETIQUETTE</span>
                        </div>
                        <div>
                            <button class="btn">ENREGISTRER <i class="fas fa-save"></i></button>
                            <button class="btn">APERCU PDF <i class="fas fa-eye"></i></button>
                            <button class="btn btn-add">AJOUTER AU PANIER</button>
                        </div>
                        <div class="card-border">
                            <hr class="solid" /><span>FORMAT FINI</span>
                        </div>
                        <div class="card-border">
                            <hr class="dashed" /><span>ZONE TRANQUILLE</span>
                        </div>
                    </div>
                    <div class="rendering">
                        <div class="container" id="container-6" 
                                style="height: 100%;border: 4px solid #f2f8f4;width: 100%;">
                            <div id="demo-6" class="rect">Bonjour</div>
                            <div id="demo-7" class="rect" >
                                <img style="width: 100%; height: 100%" src="https://pbs.twimg.com/profile_images/823569976342773760/c2RLAG7h_400x400.jpg" />
                            </div>
                        </div>
                    </div> 

                    <div class="side">
                        <div class="zoom" style="text-align: center;">
                            <!-- <div class="less"><span>-</span></div> -->
                            <span class="text" style="width: 100%;">OBJETS</span>
                            <!-- <div class="more"><span>+</span></div> -->
                        </div>
                        <div class="options">
                            <span class="item">Image</span>
                            <span class="item">Texte</span>
                            <span class="item">Cercle</span>
                            <span class="item">Carre</span>
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
                </div>
            </main>
            <!-- <script
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
            </script> -->
            <script type="text/javascript" src="<?php echo WPCVC_URL; ?>/assets/js/script.js"></script>
        </div>
    </div>
</main>

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
                $("#container-6").append("<div class='rect' id='"+id+"' ><img style='width: 100%; height: 100%'  src='"+src+"' ></div>");
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

<?php get_footer(); ?>  
