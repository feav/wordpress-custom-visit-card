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
                            <span class="text">ACTIONS</span>
                            <div class="more"><span>+</span></div>
                        </div>
                        <div class="options">
                            <span class="item">RECTO</span>
                            <span class="item">VERSO</span>
                        </div>
                        <div>
                            <button class="btn">ENREGISTRER <i class="fas fa-save"></i></button>
                            <button class="btn">APERCU PDF <i class="fas fa-eye"></i></button>
                            <button class="btn btn-add">AJOUTER AU PANIER</button>
                        </div>
                    </div>
                    <div class="rendering">
                        <div class="container" id="container-6" 
                                style="height: 100%;border: 4px solid #f2f8f4;width: 100%;">
                        </div>
                    </div> 

                    <div class="side" id="side-property" data-selected-id="0">
                        <div class="">
                            <table>
                                <tbody>
                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-arrows-alt-h"></i></td>
                                        <td> <input type="number" name="target-width" id="target-width"> </td>

                                        <td><i class="fas fa-arrows-alt-v"></i></td>
                                        <td> <input type="number" name="target-height" id="target-height"> </td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-arrow-right"></i></td>
                                        <td> <input type="number" name="target-left" id="target-left"> </td>

                                        <td><i class="fas fa-arrow-down"></i></td>
                                        <td> <input type="number" name="top" id="target-top"> </td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-bahai"></i></td>
                                        <td> <input type="number" name="width" id="target-top1"> </td>

                                        <td><img id="color-wheel" style="width: 20px;margin: 10px;" src="<?php echo WPCVC_URL; ?>/assets/images/color_wheel.png" /></td>
                                        <td> <input type="color"  name="target-background-color"  id="target-background-color" value="#ffffff"> </td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-eye-slash"></i></td>
                                        <td> <input type="number" name="target-opacity"  id="target-opacity"> </td>

                                        <td><i class="fab fa-confluence"></i></td>
                                        <td> <input type="number" name="target-border-radius"  id="target-border-radius"> </td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td style="width: 25%;"><i class="fas fa-align-right"></i></td>
                                        <td style="width: 25%;"><i class="fas fa-align-center"></i></td>
                                        <td style="width: 25%;"><i class="fas fa-align-justify"></i></td>
                                        <td style="width: 25%;"><i class="fas fa-align-left"></i></td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td style="width: 25%;"><i class="fas fa-italic"></i></td>
                                        <td style="width: 25%;"><i class="fas fa-bold"></i></td>
                                        <td style="width: 25%;"><i class="fas fa-underline"></i></td>
                                        <td style="width: 25%;"><i class="fas fa-strikethrough"></i></td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-text-height"></i></td>
                                        <td> <input type="number" name="target-line-height"  id="target-line-height"> </td>

                                        <td><i class="fas fa-underline"></i></td>
                                        <td> <input type="number" name="height"> </td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-font"></i></td>
                                        <td> <input type="number" name="target-font-size"  id="target-font-size"> </td>
                                        <td><img id="color-wheel" style="width: 20px;margin: 10px;" src="<?php echo WPCVC_URL; ?>/assets/images/color_wheel.png" /></td>
                                        <td> <input type="color"   name="width" name="target-color"  id="target-color">  </td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-font"></i></td>
                                        <td colspan="3"> 
                                            <select class="fonts-list">
                                                <option>Police</option>
                                                <option>Arial</option>
                                                <option>Sans Serif</option>
                                                <option>Serif</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-add" onclick="update_database(true)">Enregistrer</button>

                        </div>
                        <div class="" id="list-properties">
                            
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
                <img id="selected-image" width="100%" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg">
                <button id="addImageToFrame">Utiliser cette image</button>
                <hr>
                <form id="form_post_image">
                    <input style="display: none;" required="required" type="file" name="post_image" id="post_image">
                    <label for="post_image" class="btn" style="height: 40px;line-height: 29px;text-align: center;">Envoyer l'image</label>
                </form>
            </div>
        </div>
    </div>
</main>

        <script>
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            var parent_id = "<?php echo get_the_id(); ?>";
            var gallery = [];
            var prefix_object = "vc_object-";
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
            function addText(text = 'Enter your Text',style='',new_item,id){
                var id_num =  ( Math.floor(Math.random() * 100) );
                var id = prefix_object+id_num;
                var class_new = "";
                if(new_item)class_new = "new-item";
                $("#container-6").append("<div class='item-frame rect "+class_new+"'  id='"+id+"' style='"+style+"'>"+text+"</div>");
                var input = $("#"+id);
                initDragDrop(input,[50,10],[200,300]);
                return id_num;
            }
            function addImage(src = null,style,new_item,id){
                var id_num =  id;
                var id = prefix_object+id_num;
                var class_new = "";
                if(new_item)class_new = "new-item";
                $("#container-6").append("<div class='item-frame rect "+class_new+"' id='"+prefix_object+id_num+"'  style='"+style+"' ><img style='width: 100%; height: 100%'  src='"+src+"' ></div>");
                var input = $("#"+id);
                initDragDrop(input);
                return id_num;
            }
            function update_database(saved){
                var style= '';
                var val = '';

                // if(val = $("#target-background-color").val())
                    // style+= 'background-color:'+val+';';

                if(val = $("#target-width").val())
                    style+= 'width:'+val+'px;';

                if(val = $("#target-height").val())
                    style+= 'height:'+val+'px;';

                if(val = $("#target-top").val())
                    style+= 'top:'+val+'px;';

                if(val = $("#target-left").val())
                    style+= 'left:'+val+'px;';

                if(val = $("#target-border-radius").val())
                    style+= 'border-radius:'+val+'px;';

                if(val = $("#target-opacity").val())
                    style+= 'opacity:'+val+';';

                if(val = $("#target-font-size").val())
                    style+= 'font-size:'+val+'px;';

                if(val = $("#target-color").val())
                    style+= 'color:'+val+';';


                if(val = $("#target-font-family").val())
                    style+= 'font-family:'+val+';';

                if(val = $("#target-line-height").val())
                    style+= 'line-height:'+val+';';
                var id = $("#side-property").attr("data-selected-id").trim();
                var data = {
                    'action': 'visit_card_ajax_request',
                    'object_id': $("#side-property").attr("data-selected-id").trim(),
                    'style': style,
                    'function': 'update_style'
                  };
                  if(saved){
                      jQuery.post(ajaxurl, data, function(response) {
                      }, 'json');
                  }

                  $("#"+prefix_object+id).attr("style",style);
                  return style;

            }
            function get_specific_label(property){
                switch(property){
                    case 'width':
                        return 'Largeur';
                    case 'background-color':
                        return 'Couleur Arriere Plan';
                    case 'background-image':
                        return 'Image d\'arriere plan';
                    case 'height':
                        return 'Longueur';
                    case 'top':
                        return 'Marge Superieure';
                    case 'left':
                        return 'Marge Gauche';
                    case 'rigth':
                        return 'Marge Droite';
                    case 'bottom':
                        return 'Marge Imferieure';
                    case 'border-radius':
                        return 'Niveau d\'arrondi';
                    default:
                        return property;
                }
            }
            function get_specific_type(property){
                switch(property){
                    case 'width':
                        return 'text';
                    case 'background-color':
                        return 'color';
                    default:
                        return property;
                }
            }
            function update_status_item($item){
                $item = jQuery($item);
                var id = $item.attr('id');
                $("#side-property").attr("data-selected-id",id.replace(prefix_object,'').trim());
                var style = $item.attr('style');
                console.log($item.attr('style').split(";"));
                $item.attr('style').split(";").forEach(function(item,index){
                    var prop = item.trim().split(":");
                    if(prop[0]!=='' && prop[0]!==null){
                        var target = '#target-'+prop[0].trim();

                        value=0;
                        value = prop[1].trim().replace('px','');
                        if(prop[0].trim() == 'backgound-color')
                            console.log(prop[1].trim().replace('px',''));
                        jQuery(target).val(value);
                    }
                });
            }
            function initDragDrop($item, $minSize=[50,50],$maxSize=[500,400]){
                $item.clayfy({
                    type : 'resizable',
                    container : '#container-6',
                    minSize :  $minSize,
                    maxSize : $maxSize,
                    className : 'custom-handlers',
                        drag : function(){
                            // console.log( 'drag: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                            console.log("drag");
                            update_status_item($item);
                        }
                        ,
                        drop : function(){
                            // console.log( 'drop: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                            console.log("drop");
                            update_database(true);
                        },
                    callbacks : {
                        resize : function(){
                            // console.log( 'resize: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                            // update_status_item($item);
                            update_status_item($item);
                            // update_database(true);
                        }
                    }
                });
                $item.on('clayfy-cancel', function(){
                    console.log( 'cancel: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                })
                $item.click(function(){
                    update_status_item(this);
                });
            }
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
            var choice_image_to_insert = 0;
            function selectImage(id,href){
                // $("#selected-image").src(href);
            }
            function insertImage(id,href){
                var data = {
                    'action': 'visit_card_ajax_request',
                    'function': 'create_vc_element',
                    'image_id':id
                };
                closeModalVC();
                var tmp_id = addImage("https://i.ya-webdesign.com/images/loading-gif-png-5.gif",'left:10px;top:10px;width:100px;height:100px;backgound:white;border-radius:0px;opacity:1;font-size:10px;',true);
                jQuery.ajax({
                    type:'POST',
                    url: ajaxurl,
                        data:{
                        'action': 'visit_card_ajax_request',
                        'function': 'create_vc_element',
                        'image_id':id,
                        'parent_id':parent_id,
                        'style':'left:10px;top:10px;width:100px;height:100px;backgound:white;border-radius:0px;opacity:1;font-size:10px;'
                    },
                    success:function(data){
                            jQuery("#"+prefix_object+tmp_id+" img").attr("src",href);

                            var new_id = data;
                            jQuery("#"+prefix_object+tmp_id).attr("id",prefix_object+new_id);
                            elements.childs.push(buildItem(new_id,'image',{
                                style:'background-color:none;width:100px;height:100px;top:200px;left:300px;border-radius:20px;',
                                src:href
                            },null));
                    },
                    error: function(data){
                        jQuery("#"+prefix_object+tmp_id).remove();
                        alert("Erreur lors de la creation de cet element");
                    }
                });
            }

            /**
            ** Build item to push it in data structure of frame
            **/
            function buildItem(id,type,property,inner){
                return {
                        id: 3,
                        type : type,
                        property:property,
                        inner:inner,
                    }
            }

            /**
            ** Get image into gallery and push it to frame design
            **/
            function updateMediaGallery(){
                  var data = {
                    'action': 'visit_card_ajax_request',
                    'post_type': 'POST',
                    'function': 'get_gallery'
                  };
                  jQuery.post(ajaxurl, data, function(response) {
                        var list = $(".media-gallery");
                        list.html('');
                        gallery = response;
                        response.forEach(function(item, index){
                            var image = '<img class="gallery-selectable" data-id="'+item.id+'" id="image-inset-'+item.id+'" src="'+item.image_icon+'">'
                            list.append(image);
                        });
                        $(".gallery-selectable").click(
                            function($this){
                               var item = $($this.toElement);
                               var id = parseInt( item.attr("data-id") );

                               var item = gallery.find(function(item, index){if(item.id==id)return item })
                               $("#selected-image").attr("src",item.image);
                               $("#selected-image").attr("data-id",item.id);
                            }
                        );
                  }, 'json');
            }
            var c = 0;
            function updateElementRoot(){

                /**
                ** init element visit cart
                **/

                jQuery.get(
                    ajaxurl, 
                    {
                        'action': 'visit_card_ajax_request',
                        'function': 'get_visit_cart_object',
                        'post_id':parent_id
                    }, 
                    function(response) {
                        elements = response;
                        elements.childs.forEach(
                            function(item , index){
                                var id = item.id;
                                switch(item.type){
                                    case 'image':
                                        addImage(item.property.src,item.property.style,false,item.id);
                                    break;
                                    case 'text':
                                        addText(item.inner,item.property.style,false,item.id);
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
                    }, 
                    'json'
                );
                jQuery("#side-property input,#side-property select").change(function(){
                    update_database(false);
                });
                jQuery("#side-property input,#side-property select").change(function(){
                    update_database(false);
                });

            }

            function init(){
                updateElementRoot();
                /**
                ** Upload image on frame
                **/
                jQuery("#addImageToFrame").click(
                    function($this){
                       var item = jQuery("#selected-image");
                        var id = parseInt( item.attr("data-id") );
                        var src = item.attr("src") ;
                        insertImage(id,src);
                    }
                );
                jQuery("form#form_post_image").on('submit',(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    formData.append("action", 'visit_card_ajax_request');
                    formData.append("function", 'add_to_gallery');
                    jQuery.ajax({
                        type:'POST',
                        url: ajaxurl,
                        data:formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success:function(data){
                            updateMediaGallery();
                        },
                        error: function(data){
                            alert("Erreur lors du chargement de l'image");
                        }
                    });
                }));
                jQuery("input#post_image").on("change", function() {
                    jQuery("form#form_post_image").submit();
                });
            }
            init();
        </script>
<style type="text/css">

    div#list-properties .property {
        width: 100%;
    }
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
    div#list-properties {
        max-height: 400px;
        overflow: scroll;
    }

    .modal-visit-card .media-gallery img {
        margin: 15px;
        width: 20%;
        transition: .7s transform ease;
    }
    .modal-visit-card .media-gallery img:hover {
        transform: scale(1.1);
        border: 3px solid #3e403f;
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

    .side input[type="number"] {
        width: 50px;
        height: 35px;
    }
    .side table tr td, .side table tr th {
        padding: 10px 0px 0px 0px !important;
    }
    .side .fa, .side .fas {
        margin: 10px;
    }
    .side input[type="number"]{
        padding: 2px;
    }
</style>
<?php get_footer(); ?>  
