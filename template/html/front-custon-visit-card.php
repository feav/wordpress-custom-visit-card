<?php get_header(); ?>  
<link rel="stylesheet" href="<?php echo WPCVC_URL; ?>/assets/css/style.css">
<script src="<?php echo WPCVC_URL; ?>/assets/libs/jquery.js"></script>
<script src="<?php echo WPCVC_URL; ?>/assets/dist/clayfy.min.js"></script>
<link rel="stylesheet" href="<?php echo WPCVC_URL; ?>/assets/dist/clayfy.min.css" type="text/css">
<script src="<?php echo WPCVC_URL; ?>/assets/dist/vanilla-picker.js?123456"></script>
<script src="https://unpkg.com/vanilla-picker@2.5"></script>

 
<main id="skip_content" role="main" style="position: relative;">
    <div class="">
        <div class="main-wrapper">
            <link rel="stylesheet" href="<?php echo WPCVC_URL; ?>/assets/css/style.css">
            <main>
                <div class="header">
                    <ul style="position: relative;">

                         <li style="width: auto;height: 40px;align-items: center;">
                           <select style="border: none;" id="target-font-family" name="target-font-family" class="updated">
                                <option>Police</option>
                                <option value="Dancing_Script">Dancing Script</option>
                                <option value="Lobster_Two">Lobster Two</option>
                                <option value="Jim_Nightshade">Jim Nightshade</option>
                                <option value="Comic_Sans_MS">Comic Sans MS</option>
                           </select>
                        </li>
                        <li style="">
                            <img style="height: 100%;width: auto;" id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/couleurs.png">
                        </li>
                        <li style="width: 60px;">
                            <img style="width: 31px !important;"id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/taille-texte.png">
                            <select style="border: none;width: 35px;text-align: left;padding-left: 5px;height: 25px !important;margin-left: 35px;line-height: 24px !important;line-height: 39px;overflow: visible;font-size: 15px;background-color: #ffffff7d;padding: 2px">
                                <option>12</option>
                           </select>
                        </li>


                        
                        <li style="margin-left: 40px;margin-right: 0;">
                            <img style="height: 100%;width: auto;" id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/bold.png">
                        </li>
                        <li style="margin-left: 0px;margin-right: 0;">
                            <img style="height: 100%;width: auto;" id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/italic.png">
                        </li>
                        <li style="margin-left: 0px;">
                            <img style="height: 100%;width: auto;" id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/underline.png">
                        </li>


                        
                        <li style="margin-left: 40px;margin-right: 0;">
                            <img style="height: 100%;width: auto;" id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/gauche.png">
                        </li>
                        <li style="margin-left: 0px;margin-right: 0;">
                            <img style="height: 100%;width: auto;" id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/droite.png">
                        </li>
                        <li style="margin-left: 0px;margin-right: 0;">
                            <img style="height: 100%;width: auto;" id="color-wheel" title="Centrer le texte" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/centrer.png">
                        </li>
                        <li style="margin-left: 0px;">
                            <img style="height: 100%;width: auto;" id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/justifier.png">
                        </li>



                        <li style="width: 60px;margin-left: 40px;">
                            <img style="width: auto;height: 100%;"id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/interlettrage.png">
                            <select style="border: none;width: 35px;text-align: left;padding-left: 5px;height: 25px !important;margin-left: 35px;line-height: 24px !important;line-height: 39px;overflow: visible;font-size: 15px;background-color: #ffffff7d;padding: 2px">
                                <option>12</option>
                           </select>
                        </li>



                        <li style="width: 60px;margin-left: 40px;">
                            <img style="width: auto;height: 100%;"id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/interlignage.png">
                            <select style="border: none;width: 35px;text-align: left;padding-left: 5px;height: 25px !important;margin-left: 35px;line-height: 24px !important;line-height: 39px;overflow: visible;font-size: 15px;background-color: #ffffff7d;padding: 2px">
                                <option>12</option>
                           </select>
                        </li>


                        <li style="margin-left: 40px;">
                            <img style="height: 100%;width: auto;" id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/ajout-texte.png">
                        </li>
                        <li style="margin-left: 10px;">
                            <img style="height: 100%;width: auto;" id="color-wheel" title="Ajouter un text" onclick="addNewText()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/rotation.png">
                        </li>
                        <li style="margin-left: 10px;">
                            <img id="color-wheel" title="Ajouter une image" onclick="addNewImage()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/ajout-image.png" style="height: 35px;top: -10px;width: auto;">
                        </li>
                        <li style="margin-left: 10px;">
                            <img id="color-wheel" title="Ajouter une image" onclick="addNewImage()" src="http://localhost:8888/test/wp-content/plugins/wordpress-custom-visit-card//assets/images/supprimer.png" style="height: 100%;width: auto;"  onclick="remove_object(true)">
                        </li>
                    </ul>
                </div>
                <div class="main-content">
                    <div class="side" style="height: max-content;">
                        <div class="zoom">
                            <div class="less"><span>-</span></div>
                            <span class="text">ACTIONS</span>
                            <div class="more"><span>+</span></div>
                        </div>
                        <?php 
                            $recto = wp_get_post_parent_id(get_the_id());
                            
                        ?>
                        <img id="loading-frame" src="https://i.ya-webdesign.com/images/loading-gif-png-5.gif" style="margin-left: 45%;width: 10%;margin-top: 30px;">

                        <div class="options">
                            <span  id="frame-recto" onclick="loadRecto()" class="item  vc-current frame-view">RECTO</span>
                            <span  id="frame-verso" onclick="loadVerso()"  class="item frame-view">VERSO</span>
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
                                        <td colspan="4">
                                            <input type="text" name="target-inner" id="target-inner">
                                        </td>
                                    </tr>
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
                                        <td><i class="fas fa-eye-slash"></i></td>
                                        <td> <input type="number" name="target-opacity" class="updated"   id="target-opacity"> </td>

                                        <td><img id="color-wheel" style="width: 20px;margin: 10px;" src="<?php echo WPCVC_URL; ?>/assets/images/color_wheel.png" /></td>
                                        <td> <input type="color"  name="target-background-color" class="updated"   id="target-background-color" value="#ffffff"> </td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-text-height"></i></td>
                                        <td> <input type="number" name="target-line-height"  class="updated"  id="target-line-height"> </td>
                                        <td><i class="fas fa-italic"></i></td>
                                        <td> 
                                            <select name="target-font-style" class="updated"  id="target-font-style">
                                                <option value="none">Aucun</option>
                                                <option value="italic">Oblique</option>
                                            </select> 
                                        </td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-bold"></i></td>
                                        <td>
                                             <select name="target-font-weight" class="updated"  id="target-font-weight">
                                                <option value="200">200</option>
                                                <option value="400">400</option>
                                                <option value="400">600</option>
                                                <option value="800">800</option>
                                            </select>
                                        </td>

                                        <td><i class="fas fa-align-center"></i></td>
                                        <td>
                                            <select name="target-text-align" class="updated"  id="target-text-align">
                                                <option value="none">Aucun</option>
                                                <option value="left">Gauche</option>
                                                <option value="right">Droite</option>
                                                <option value="center">Centrer</option>
                                                <option value="justify">Justifier</option>
                                            </select> 
                                        </td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-font"></i></td>
                                        <td> <input type="number" class="updated"  name="target-font-size"  id="target-font-size"> </td>

                                        <td><i class="fas fa-underline"></i></td>
                                        <td> 
                                            <select name="target-text-decoration" class="updated"  id="target-text-decoration">
                                                <option value="none">Aucun</option>
                                                <option value="underline">Souligner</option>
                                                <option value="line-through">Barrer</option>
                                                <option value="overline"> Surligner</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr class="hide-in-text hide-in-block">
                                        <td><i class="fas fa-font"></i></td>
                                        <td> 

                                            <!-- <select name="target-font-family" class="updated"  id="target-font-family">
                                                <option>Police</option>
                                                <option value="Dancing_Script">Dancing Script</option>
                                                <option value="Lobster_Two">Lobster Two</option>
                                                <option value="Jim_Nightshade">Jim Nightshade</option>
                                                <option value="Comic_Sans_MS">Comic Sans MS</option>
                                            </select> -->
                                        </td>
                                        <td><img id="color-wheel" style="width: 20px;margin: 10px;" src="<?php echo WPCVC_URL; ?>/assets/images/color_wheel.png" /></td>
                                        <td> <input type="color"   name="width" name="target-color"  id="target-color">  </td>
                                    </tr>

                                </tbody>
                            </table>
                            <button class="btn btn-add" onclick="update_database(true)">Enregistrer</button>
                            <button class="btn btn-add" style="background: #f36b43" onclick="remove_object(true)">Retirer</button>

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
    <div class="modal-visit-card imgage-modal">
        <div class="modal-title">
            Votre Gallery Personnelle
        </div>
        <div class="modal--content">
            <div class="media-gallery">
                <img src="https://i.ya-webdesign.com/images/loading-gif-png-5.gif" style="margin-left: 45%;width: 10%;margin-top: 30px;">
            </div>
            <div class="media-option">
                <span class="close" onclick="closeModalVC()">x</span>
                <img id="selected-image" width="100%" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg">
                <button id="addImageToFrame" class="btn">Utiliser cette image</button>
                <hr>
                <form id="form_post_image">
                    <input style="display: none;" required="required" type="file" name="post_image" id="post_image">
                    <label for="post_image" class="btn" style="height: 40px;line-height: 29px;text-align: center;">Envoyer l'image</label>
                </form>
            </div>
        </div>
    </div>

    <div class="modal-visit-card text-modal">
        <div class="modal-title">
            Votre Texte Personnelle
        </div>
        <div class="modal--content">
            <div class="media-text" id="block-add-text">
                                <span class="close" onclick="closeModalVC()">x</span>

                <textarea name="text-input" id="text-input" data-id="0"></textarea>
                <div class="font-style-menu"> 
                    <div>
                        <label>Taille</label>
                        <input type="number" name="target-update-text-font-size" class="updated"  id="target-update-text-font-size" value="15">
                    </div>
                    <div>
                        <label>Police</label>
                        <select name="target-update-text-font-family"  class="updated"  id="target-update-text-font-family">
                            <option>Police</option>
                            <option value="Dancing_Script">Dancing Script</option>
                            <option value="Lobster_Two">Lobster Two</option>
                            <option value="Jim_Nightshade">Jim Nightshade</option>
                            <option value="Comic_Sans_MS">Comic Sans MS</option>
                        </select>
                    </div>
                    <div>
                        <label>Hauteur</label>
                        <input type="number" name="target-update-text-line-height" class="updated"  id="target-update-text-line-height" value="15px">
                    </div>

                    <div>
                        <label>Allignement</label>
                        <select name="target-update-text-text-align" class="updated"  id="target-update-text-text-align">
                            <option value="left">Gauche</option>
                            <option value="right">Droite</option>
                            <option value="center">Centrer</option>
                            <option value="justify">Justifier</option>
                        </select>
                    </div>
                    <div>
                        <label>Gras</label>

                        <select name="target-update-text-font-weight" class="updated"  id="target-update-text-font-weight">
                            <option value="200">200</option>
                            <option value="400">400</option>
                            <option value="400">600</option>
                            <option value="800">800</option>
                        </select>
                    </div>
                    <div>
                        <label >Italic</label>

                        <select name="target-update-text-font-style" class="updated"  id="target-update-text-font-style">
                            <option value="none">Aucun</option>
                            <option value="italic">Oblique</option>
                        </select>
                    </div>
                    <div>
                        <label>Souligner</label>


                        <select name="target-update-text-text-decoration" class="updated" id="target-update-text-text-decoration">
                            <option value="none">Aucun</option>
                            <option value="underline">Souligner</option>
                            <option value="line-through">Barrer</option>
                            <option value="overline"> Surligner</option>
                        </select>
                    </div>
                </div>
                <button id="addTextToFrame" class="btn">Utiliser ce Text</button>

            </div>
        </div>
    </div>

</main>

        <script>
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            var parent_id = "<?php echo get_the_id(); ?>";
            var gallery = [];
            var part_url = [0,0];
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
                var id_num = id?id: ( Math.floor(Math.random() * 100) );
                var id = prefix_object+id_num;
                var class_new = "";
                if(new_item)class_new = "new-item";
                $("#container-6").append("<div class='item-frame rect "+class_new+"'  id='"+id+"' style='"+style+"'>"+text+"</div>");
                var input = $("#"+id);
                initDragDrop(input,[50,10],[1000,1000]);
                return id_num;
            }
            function addImage(src = null,style,new_item,id){
                var id_num =   id?id:( Math.floor(Math.random() * 100) );
                var id = prefix_object+id_num;
                var class_new = "";
                if(new_item)class_new = "new-item";
                $("#container-6").append("<div class='item-frame rect "+class_new+"' id='"+prefix_object+id_num+"'  style='"+style+"' ><img style='width: 100%; height: 100%'  src='"+src+"' ></div>");
                var input = $("#"+id);
                initDragDrop(input,[50,10],[1000,1000]);
                return id_num;
            }
            function remove_object(saved){
                var id = $("#side-property").attr("data-selected-id").trim();

                var data = {
                    'action': 'visit_card_ajax_request',
                    'object_id': id,
                    'function': 'remove_vc_element'
                  };
                      jQuery.post(ajaxurl, data, function(response) {
                      }, 'json');
                      
                        jQuery("#"+prefix_object+id).remove();
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

                if(val = $("#target-text-decoration").val())
                    style+= 'text-decoration:'+val+';';

                if(val = $("#target-font-weight").val())
                    style+= 'font-weight:'+val+';';

                if(val = $("#target-text-align").val())
                    style+= 'text-align:'+val+';';


                if(val = $("#target-font-style").val())
                    style+= 'font-style:'+val+';';

                if(val = $("#target-font-family").val()){
                    console.log("Style => style "+val);
                    style+= 'font-family:'+val.replace("_"," ")+';';
                }

                if(val = $("#target-line-height").val())
                    style+= 'line-height:'+val+'px;';
                var id = $("#side-property").attr("data-selected-id").trim();

                var data = {
                    'action': 'visit_card_ajax_request',
                    'object_id': id,
                    'style': style,
                    'function': 'update_style'
                  };
                  if(saved){
                      jQuery.post(ajaxurl, data, function(response) {
                      }, 'json');
                  }

                var node = elements.childs.find(function(item,index){if(item.id==parseInt(id))return update_status_item});

                if(node.type=='text' && (val = $("#target-inner").val() ) ){
                       jQuery("#loading-frame").show();
                      jQuery.post(ajaxurl, {
                            'action': 'visit_card_ajax_request',
                            'object_id': id,
                            'text': val,
                            'function': 'update_inner'
                          }, function(response) {
                            jQuery("#"+prefix_object+id).html(val);
                            jQuery("#loading-frame").hide();
                      }, 'json');
                }
                  $("#"+prefix_object+id).attr("style",style);
                  return style;

            }

            function update_text(){
                var style= '';
                var val = '';

                // if(val = $("#target-background-color").val())
                    // style+= 'background-color:'+val+';';

                if(val = $("#target-update-text-font-size").val())
                    style+= 'font-size:'+val+'px;';

                if(val = $("#target-update-text-font-weight").val())
                    style+= 'font-weight:'+val+';';

                if(val = $("#target-update-text-font-family").val())
                    style+= 'font-family:'+val.replace("_"," ")+';';

                if(val = $("#target-update-text-line-height").val())
                    style+= 'line-height:'+val+'px;';

                if(val = $("#target-update-text-font-style").val())
                    style+= 'font-style:'+val+';';

                if(val = $("#target-update-text-font-weight").val())
                    style+= 'font-weight:'+val+';';

                if(val = $("#target-update-text-text-align").val())
                    style+= 'text-align:'+val+';';

                if(val = $("#target-update-text-text-decoration").val())
                    style+= 'text-decoration:'+val+';';

                $("#text-input").attr("style",style);
                // $("#text-input").html($("#text-input").html());
                console.log(style);
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
            function update_status_item($item, action){
                $item = jQuery($item);
                var id = $item.attr('id');
                var int_id = parseInt(id.replace(prefix_object,'').trim());
                $("#side-property").attr("data-selected-id",id.replace(prefix_object,'').trim());
                
                var node = elements.childs.find(function(item,index){if(item.id==int_id)return update_status_item});
                if(node)
                    $("#target-inner").val(node.inner);
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
                        if(prop[0].trim() == 'font-family'){
                            console.log(prop[1].trim().replace(' ','_'));
                            value = prop[1].trim().replace(' ','_');
                        }
                        console.log(action+" - "+prop[0].trim());
                        if(action === 'resize' && prop[0].trim() == 'font-family'){

                        }else{
                            jQuery(target).val(value);
                        }
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
                            //update_status_item($item, 'resize');
                        }
                        ,
                        drop : function(){
                            // console.log( 'drop: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                            console.log("drop");
                            //update_database(true);
                        },
                    callbacks : {
                        resize : function(){
                            // console.log( 'resize: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                            // update_status_item($item);
                            //update_status_item($item, 'resize');
                            // update_database(true);
                        }
                    }
                });
                $item.on('clayfy-cancel', function(){
                    console.log( 'cancel: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                })
                $item.click(function(){
                    update_status_item($item);
                });
            }
            function closeModalVC(){
                $(".modal-visit-card").hide(1000);
            }

            function openModalVC(target){
                $(target).show(1000);
            }
            function addNewImage(){
                updateMediaGallery();
                openModalVC(".modal-visit-card.imgage-modal");
            }
            function addNewText(){
                openModalVC(".text-modal");
            }
            function addNewCircle(){
                openModalVC(".circle-modal");
            }
            function addNewSquare(){
                openModalVC(".square-modal");
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
                jQuery("#loading-frame").show();
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
                            jQuery("#loading-frame").hide();
                    },
                    error: function(data){
                        jQuery("#"+prefix_object+tmp_id).remove();
                        alert("Erreur lors de la creation de cet element");
                    }
                });
            }

            function insertText(id,text,style){
                closeModalVC();
                var tmp_id = addText("chargement...",'left:10px;top:10px;width:100px;height:100px;backgound:white;border-radius:0px;opacity:1;font-size:10px;'.style,true,0);
                jQuery("#loading-frame").show();
                jQuery.ajax({
                    type:'POST',
                    url: ajaxurl,
                        data:{
                            'action': 'visit_card_ajax_request',
                            'function': 'create_vc_element',
                            'text':text,
                            'parent_id':parent_id,
                            'style':'left:10px;top:10px;width:100px;height:100px;backgound:white;border-radius:0px;opacity:1;'+style
                        },
                    success:function(data){
                           /* jQuery("#"+prefix_object+tmp_id).html(text);
                            var new_id = parseInt(data);
                            jQuery("#"+prefix_object+tmp_id).attr("id",prefix_object+new_id);
                            jQuery("#"+prefix_object+tmp_id).attr("style",'left:10px;top:10px;width:100px;height:100px;backgound:white;border-radius:0px;opacity:1;'+style);
                            elements.childs.push(buildItem(new_id,'text',{style:style},text)); */
                            updateElementRoot();
                            jQuery("#loading-frame").hide();
                    },
                    error: function(data){
                        jQuery("#"+prefix_object+tmp_id).remove();
                        jQuery("#loading-frame").hide();
                        alert("Erreur lors de la creation de cet element");
                        updateElementRoot()
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
                jQuery("#loading-frame").show();
                jQuery("#container-6").html("");
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
                                var item = $("#visit-card-element-"+id);
                                initDragDrop(item);
                                jQuery("#loading-frame").hide();
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


                jQuery("#side-property input.updated,#side-property select.updated").change(function(){
                    update_database(true);
                });
                jQuery("#side-property input.updated,#side-property select.updated").change(function(){
                    update_database(true);
                });

            }
            function updateUrlParts(){
                /**
                ** init element visit cart
                **/

                jQuery.get(
                    ajaxurl, 
                    {
                        'action': 'visit_card_ajax_request',
                        'function': 'get_child_visit_cart_objet',
                        'post_id':parent_id
                    }, 
                    function(response) {
                        part_url = response;
                    }, 
                    'json'
                );
            }
            function loadRecto(){
                jQuery(".frame-view").removeClass("vc-current");
                jQuery("#frame-recto").addClass("vc-current");
                parent_id = part_url.recto;
                updateElementRoot();
            }
            function loadVerso(){
                jQuery(".frame-view").removeClass("vc-current");
                jQuery("#frame-verso").addClass("vc-current");
                parent_id = part_url.verso;
                updateElementRoot();
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
                jQuery("#addTextToFrame").click(
                    function($this){
                       var item = jQuery("#text-input");
                        var id = parseInt( item.attr("data-id") );
                        var style_text = item.attr("style") ;
                        var inner_text = item.val() ;
                        insertText(id,inner_text,style_text);
                    }
                );
                jQuery("#block-add-text input,#block-add-text select,#block-add-text textarea ").change(function(){
                     update_text();
                });
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
                updateUrlParts();
                jQuery("input#post_image").on("change", function() {
                    jQuery("form#form_post_image").submit();
                });
            }
            init();
        </script>
<style type="text/css">
    .modal-visit-card.text-modal .media-gallery{
        border-right: none;
    }
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
    .modal-visit-card .modal--content {
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
    .font-style-menu{
        display: block;
    }
    .font-style-menu > div {
        display: inline-block;
        width: 20%;
        padding-left: 20px;
    }
    span.item.vc-current {
        cursor: not-allowed !important;
        background: #d5e8df !important;
    }
    button.btn {
        height: 40px;
    }
    #side-property td svg {
        margin: 10px;
    }
    div.header li img {
        width: 30px;
        min-height: 25px;
    }
    .header ul {
        height: 100%;
    }
    .header ul li {
        width: 40px;
        height: 20px;
        position: relative;
            margin-left: 20px;
    }
    .header ul li img {
        position: absolute;
    }
    select {
        background: url(http://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png) no-repeat;
        -webkit-appearance: none;
        background-position: 100% 44%;
        background-size: 10px 10px;
    }
</style>
<?php get_footer(); ?>  
