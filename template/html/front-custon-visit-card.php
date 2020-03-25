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
                            <img id="color-wheel" title="Ajouter une forme carree"  onclick="addNewSquare()" src="<?php echo WPCVC_URL; ?>/assets/images/carre-add.png" />
                        </li>
                        <li>
                            <img id="color-wheel" title="Ajouter une forme arrondie" src="<?php echo WPCVC_URL; ?>/assets/images/rond-add.png" onclick="addNewCircle()" />
                        </li>
                        <li>
                            <img id="color-wheel" title="Ajouter une image"  onclick="addNewImage()" src="<?php echo WPCVC_URL; ?>/assets/images/img-add.png" />
                        </li>
                        <li>
                            <img id="color-wheel" title="Ajouter un text"  onclick="addNewText()" src="<?php echo WPCVC_URL; ?>/assets/images/text-add.png" />
                        </li>
                        <!-- <li>
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
                        <li><i class="fas fa-align-justify"></i></li> -->
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
                        </div>
                    </div> 

                    <div class="side">
                        <div class="options">
                            
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
    <div class="modal-visit-card">
        <div class="modal-title">
            Votre Gallery Personnelle
        </div>
        <div class="modal-content">
            <div class="media-gallery">
                <img src="https://i.ya-webdesign.com/images/loading-gif-png-5.gif" style="margin-left: 45%;width: 10%;margin-top: 30px;">
            </div>
            <div class="media-option">
                <span class="close" onclick="closeModalVC()">x</span>
                <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg">
                <button>Utiliser cette image</button>
                <hr>
                <button>Uploader une image</button>
            </div>
        </div>
    </div>
</main>

        <script>
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            var gallery = [];
            var elements = {
                id: 1,
                type : 'root',
                property:{
                    style:"background-color:white;"
                },
                inner:'',
                childs:[
                    {
                        id: 2,
                        type : 'image',
                        property:{
                            style:'background-color:white;width:100px;height:100px;top:200px;left:300px;border-radius:20px;',
                            src:'http://localhost:8888/test/wp-content/uploads/2018/03/beanie-2-330x413.jpg'
                        },
                        inner:'',
                    },
                    {
                        id: 3,
                        type : 'text',
                        property:{
                            style:"background-color:white;width:100px;height:100px;",
                        },
                        inner:'Bonjour',
                    },
                ]
            };
             function addText(text = 'Enter your Text',style=''){
                var id = "text-"+( Math.floor(Math.random() * 100) );
                $("#container-6").append("<div class='rect' id='"+id+"' style='"+style+"'>"+text+"</div>");
                var input = $("#"+id);
                initDragDrop(input,[50,10],[200,300]);
            }
            function addImage(src = null,style){
                var id = "img-"+( Math.floor(Math.random() * 100) );
                $("#container-6").append("<div class='rect' id='"+id+"'  style='"+style+"' ><img style='width: 100%; height: 100%'  src='"+src+"' ></div>");
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
                        drag : function(){
                            console.log( 'drag: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                        }
                        ,
                        drop : function(){
                            console.log( 'drop: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                        },
                    callbacks : {
                        resize : function(){
                            console.log( 'resize: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                        }
                    }
                });
                $item.on('clayfy-cancel', function(){
                    console.log( 'cancel: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                })
            }
            elements.childs.forEach(
                function(item , index){
                    var id = item.id;
                    switch(item.type){
                        case 'image':
                            addImage(item.property.src,item.property.style);
                        break;
                        case 'text':
                            addText(item.inner,item.property.style);
                        break;

                    }
                    // if(item.type  == 'image'){
                    //     addImage(item.property.src);
                    // }else if(item.type  == 'text'){
                    //     addText(item.inner.src);
                    // }
                    var item = $("#visit-card-element-"+id);
                    initDragDrop(item);
                }
            );
            function closeModalVC(){
                $(".modal-visit-card").hide(1000);
            }

            function openModalVC(){
                $(".modal-visit-card").show(1000);
            }
            function addNewImage(){
                updateMediaGallery();
                openModalVC();
            }
            function addNewText(){
                openModalVC();
            }
            function addNewCircle(){
                openModalVC();
            }
            function addNewSquare(){
                openModalVC();
            }
            function updateMediaGallery(){
                  var data = {
                    'action': 'visit_card_ajax_request',
                    'post_type': 'POST',
                    'function': 'getGallery'
                  };
                  jQuery.post(ajaxurl, data, function(response) {
                        var list = $(".media-gallery");
                        list.html('');
                        gallery = response;
                        response.forEach(function(item, index){
                            var image = '<img src="'+item.image_icon+'">'
                            list.append(image);
                        });
                  }, 'json');
            }
        </script>
<style type="text/css">
    .modal-visit-card {
        display: none;
        position: absolute;
        z-index: 40;
        top: 5%;
        left: 5%;
        width: 90%;
        padding: 15px;
        border-radius: 15px;
        background: white;
        border: 1px solid #9e9e9e;
        box-shadow: 1px 1px 10px 2px #868686;
    }
    .modal-visit-card .media-gallery img {
        margin: 15px;
        width: 20%;
        transition: .7s transform ease;
    }
    .modal-visit-card .media-gallery img:hover {
        transform: scale(1.2);
    }
    .modal-visit-card .modal-title {
        padding-left: 20px;
        width: 100%;
        font-weight: 800;
        text-align: center;
    }
    .modal-visit-card .modal-content {
        display: flex;
        justify-content: space-around;
    }
   .modal-visit-card .media-gallery {
        width: 75%;
        border-right: 1px solid black;
        background: #fdfbfb;
        height: 400px;
        overflow: scroll;
    }
    .modal-visit-card .media-option {
        width: 23%;
    }
    .modal-visit-card .media-option img {
        margin-bottom: 10px;
    }
    .modal-visit-card .media-option button{
        text-align: center;
        width: 100%;
    }
    .modal-visit-card span.close {
        position: absolute;
        right: 10px;
        top: 5px;
        background: black;
        border-radius: 100px;
        width: 30px;
        height: 30px;
        text-align: center;
        padding-top: 4px;
        color: white;
        font-weight: 800;
    }
</style>
<?php get_footer(); ?>  
