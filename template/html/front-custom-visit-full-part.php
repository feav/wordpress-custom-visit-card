
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
.feedback-overlay-black {
    background-color: #000;
    opacity: 0.5;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    margin: 0;
}
</style>
    </head>
<body>

<link rel="stylesheet" href="<?php echo WPCVC_URL; ?>/assets/css/style.css">
<script src="<?php echo WPCVC_URL; ?>/assets/libs/jquery.js"></script>
<script src="<?php echo WPCVC_URL; ?>/assets/dist/clayfy.min.js"></script>
<link rel="stylesheet" href="<?php echo WPCVC_URL; ?>/assets/dist/clayfy.min.css" type="text/css">
<script src="<?php echo WPCVC_URL; ?>/assets/dist/vanilla-picker.js?123456"></script>
<script src="https://unpkg.com/vanilla-picker@2.5"></script>
<link href="http://fr.allfont.net/allfont.css?fonts=comic-sans-ms" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster+Two&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Jim+Nightshade&display=swap" rel="stylesheet">
<script src='<?php echo WPCVC_URL; ?>/assets/jsPDF/dist/jspdf.debug.js'></script>
<script src='<?php echo WPCVC_URL; ?>/assets/jsPDF/libs/html2pdf.js'></script>
<script type="text/javascript" src="<?php echo WPCVC_URL; ?>/assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo WPCVC_URL; ?>/assets/js/jscolor.js"></script>
<main id="skip_content" role="main" style="position: relative;">
    <div class="">
        <div class="main-wrapper">
            <link rel="stylesheet" href="<?php echo WPCVC_URL; ?>/assets/css/style.css">
            <main>
                <div class="main-content">
                    <div class="rendering">
                        <div class="container" id="container-6" selected="0"
                                style="height: 100%;border: 0px solid #d5e8df;width: 100%;">
                            <div class="zone-fini"></div>
                            <div class="zone-tranquille"></div>
                            
                        </div>
                    </div>
                </div>
            </main>
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
            function update_text_inner(text){
                var elt = $(elt);
                var id = parseInt(jQuery("#container-6").attr("data-selected-id"));
                if(id){

                   if(jQuery("#"+prefix_object+id).hasClass('item-text')){
                        jQuery("#"+prefix_object+id).html(text);
                        var data = {
                            'action': 'visit_card_ajax_request',
                            'object_id': id,
                            'text': text,
                            'function': 'update_inner'
                          };

                        jQuery("#loading-frame").show();

                        jQuery.post(ajaxurl, data, function(response) {jQuery("#loading-frame").hide();}, 'json');
                   }
                }else{
                    /**
                    ** Mettre une alerte qu aucun element n a ete selectionne
                    **/
                }

            }
            /**
            ** use it to update render from top dashboard and push in database
            **/
            function update_property(property,value){
                var elt = $(elt);
                var id = parseInt(jQuery("#container-6").attr("data-selected-id"));

                if(id){
                    jQuery("#"+prefix_object+id).css(property,value);     
                    var data = {
                        'action': 'visit_card_ajax_request',
                        'object_id': id,
                        'style': jQuery("#"+prefix_object+id).attr("style"),
                        'function': 'update_style'
                      };

                    jQuery("#loading-frame").show();

                    jQuery.post(ajaxurl, data, function(response) {jQuery("#loading-frame").hide();}, 'json');
                }else{
                    /**
                    ** Mettre une alerte qu aucun element n a ete selectionne
                    **/
                }
            }
            function addText(text = 'Enter your Text',style='',new_item,id){
                var id_num = id?id: ( Math.floor(Math.random() * 100) );
                var id = prefix_object+id_num;
                var class_new = "";
                if(new_item)class_new = "new-item";
                $("#container-6").append("<div class='item-text item-frame rect "+class_new+"'  id='"+id+"' style='"+style+"'>"+text+"</div>");
                var input = $("#"+id);
                initDragDrop(input,[50,10],[1000,1000]);
                return id_num;
            }
            function addImage(src = null,style,new_item,id){
                var id_num =   id?id:( Math.floor(Math.random() * 100) );
                var id = prefix_object+id_num;
                var class_new = "";
                if(new_item)class_new = "new-item";
                $("#container-6").append("<div class='item-image item-frame rect "+class_new+"' id='"+prefix_object+id_num+"'  style='"+style+"' ><img style='width: 100%; height: 100%'  src='"+src+"' ></div>");
                var input = $("#"+id);
                initDragDrop(input,[50,10],[1000,1000]);
                return id_num;
            }
            function remove_object(saved){
                var elt = $(elt);
                var id = parseInt(jQuery("#container-6").attr("data-selected-id"));

                if(id){
                     var data = {
                        'action': 'visit_card_ajax_request',
                        'object_id': id,
                        'function': 'remove_vc_element'
                      };

                    jQuery("#loading-frame").show();
                        jQuery("#"+prefix_object+id).remove();

                    jQuery.post(ajaxurl, data, function(response) {
                        jQuery("#loading-frame").hide();}, 'json');
                }else{
                    /**
                    ** Mettre une alerte qu aucun element n a ete selectionne
                    **/
                }


            }
            /**
            **
            ** to remove 
            **/
            function update_database(saved){
                var style= '';
                var val = '';

                // if(val = $("#target-background-color").val())
                    // style+= 'background-color:'+val+';';

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

            function update_bd_item($item){
                $item = jQuery($item);
                var id = $item.attr('id');
                var int_id = parseInt(id.replace(prefix_object,'').trim());
                var style = $item.attr('style');
                if(jQuery("#"+id).hasClass('selected-item')){
                    console.log($item.attr('style'));
                    var data = {
                        'action': 'visit_card_ajax_request',
                        'object_id': int_id,
                        'style': style,
                        'function': 'update_style'
                      };
                    jQuery("#loading-frame").show();

                      jQuery.post(ajaxurl, data, function(response) {
                          }, 'json').always(function() {
                        jQuery("#loading-frame").hide();
                      });
                }
                
            }
            function update_status_item($item, action){
                $item = jQuery($item);
                var id = $item.attr('id');
                var int_id = parseInt(id.replace(prefix_object,'').trim());
                $("#container-6").attr("data-selected-id",int_id);

                jQuery(".item-frame.rect").removeClass('selected-item');
                if(int_id)
                    jQuery("#"+id).addClass('selected-item');
                init_top_dashboard("#"+id);
                return ;

                $("#side-property").attr("data-selected-id",id.replace(prefix_object,'').trim());
                var node = elements.childs.find(function(item,index){if(item.id==int_id)return update_status_item});
                if(node)
                    $("#target-inner").val(node.inner);
                var style = $item.attr('style');
                console.log($item.attr('style').split(";"));
                
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
                            // update_status_item($item, 'resize');
                        }
                        ,
                        drop : function(){
                            // console.log( 'drop: ' + $item.width() + ' x '+ $item.height() +'<br>outer: ' + $item.outerWidth() + ' x '+ $item.outerHeight());
                            console.log("drop");
                            // update_database(true);
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
                $item.mouseleave(function(){
                    update_bd_item($item);
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
                            // jQuery("#"+prefix_object+tmp_id+" img").attr("src",href);

                            // var new_id = data;
                            // jQuery("#"+prefix_object+tmp_id).attr("id",prefix_object+new_id);
                            // elements.childs.push(buildItem(new_id,'image',{
                            //     style:'background-color:none;width:100px;height:100px;top:200px;left:300px;border-radius:20px;',
                            //     src:href
                            // },null));
                            // jQuery("#loading-frame").hide();

                             updateElementRoot();
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
                        jQuery("#container-6").html(
                            '<div class="zone-fini"></div><div class="zone-tranquille"></div>'
                        );
                        
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

            function loadCarton(){
                jQuery(".frame-view").removeClass("vc-current");
                jQuery("#frame-carton").addClass("vc-current");
                parent_id = part_url.carton;
                updateElementRoot();
            }

            function loadEtiquette(){
                jQuery(".frame-view").removeClass("vc-current");
                jQuery("#frame-etiquette").addClass("vc-current");
                parent_id = part_url.etiquette;
                updateElementRoot();
            }
            function initPropertyEvent(){
                 /**
                ** Update text
                **/

                jQuery("input#text-content").keydown(function(){

                        var value = jQuery(this).val();
                        update_text_inner(value );
                });

                jQuery("label.text-align-select").click(function(){
                    jQuery(".text-align-select img").removeClass("active");
                    jQuery("img",jQuery(this)).addClass("active");
                    var value = jQuery(this).attr("value");
                    update_property('text-align',value);
                });
                jQuery("#target-font-family").change(function(){
                    var value = jQuery(this).val();
                    value = value.replace(/_/gi," ");
                    update_property('font-family',value );
                });

                jQuery("#target-font-size").change(function(){
                    var value = jQuery(this).val();
                    update_property('font-size',value.trim()+"px" );
                });

                jQuery("#target-line-height").change(function(){
                    var value = jQuery(this).val();
                    update_property('line-height',value.trim()+"px" );
                });

                jQuery("#target-letter-spacing").change(function(){
                    var value = jQuery(this).val();
                    update_property('letter-spacing',value.trim()+"px" );
                });


                jQuery("#target-background-color").change(function(){
                    var value = jQuery(this).val();
                    update_property('color',value.trim() );
                });

                jQuery("#font-weight-select").click(function(){
                    var value = jQuery(this).val();
                    if(jQuery("#font-weight-select img").hasClass('active')){
                        jQuery("#font-weight-select img").removeClass('active');
                        update_property('font-weight','200' );
                    }else{
                        jQuery("#font-weight-select img").addClass('active');
                        update_property('font-weight','bold' );
                    }
                    
                });

                jQuery("#font-style-select").click(function(){
                    var value = jQuery(this).val();
                    if(jQuery("#font-style-select img").hasClass('active')){
                        jQuery("#font-style-select img").removeClass('active');
                        update_property('font-style','none' );
                    }else{
                        jQuery("#font-style-select img").addClass('active');
                        update_property('font-style','italic' );
                    }
                    
                });

                jQuery("#text-decoration-select").click(function(){
                    var value = jQuery(this).val();
                    if(jQuery("#text-decoration-select img").hasClass('active')){
                        jQuery("#text-decoration-select img").removeClass('active');
                        update_property('font-style','none' );
                    }else{
                        jQuery("#text-decoration-select img").addClass('active');
                        update_property('font-style','underline' );
                    }
                    
                });

                jQuery("#transform-select").click(function(){
                    var value = jQuery(this).val();
                    var id = parseInt(jQuery("#container-6").attr("data-selected-id"));
                    var transform = jQuery("#"+prefix_object+id).css("transform");
                    jQuery("#"+prefix_object+id).attr('style').split(';').forEach(function(item,index){ if( item.split(':')[0].trim() == 'transform' ){
                        transform = item.split(':')[1].trim() ; 
                        return item.split(':')[1].trim() ; 
                    } })
                    console.log(transform);
                    if(transform ==undefined || transform == '' || transform == 'none')
                        transform = 'rotate(0deg)'; 
                    console.log(transform);
                    transform = parseInt(transform.replace(/[a-zA-Z()]/gi,'').trim());
                    console.log(transform);
                    transform = (transform+ 10 )%360;
                    console.log(transform);
                    update_property('transform','rotate('+transform+'deg)' );
                    if(transform>0){
                        if(!jQuery("#transform-select img").hasClass('active'))
                            jQuery("#transform-select img").addClass('active');
                    }else{
                        if(jQuery("#transform-select img").hasClass('active'))
                            jQuery("#transform-select img").removeClass('active');
                    }
                    
                });
            }
            var _e_;
            function init_top_dashboard(target){
                /**
                ** Update text
                **/
                var text_ = jQuery(target).html();
                if(jQuery(target).hasClass('item-text')){

                    if(text_ != '' && text_ != undefined){
                        if(!jQuery("#text-content").removeClass("active"))
                            jQuery("#text-content").addClass("active");
                        jQuery("#text-content").val(text_);
                    }else{
                        if(jQuery("#text-content").hasClass("active"))
                            jQuery("#text-content").removeClass("active");
                    }
                }

                 /**
                ** update color
                **/
                var color = jQuery(target).css("color");
                if(color != '' && color != undefined){
                    color = color.trim();
                    console.log("update color "+color);
                    jQuery("#target-background-color").val(color);
                }

                /**
                ** update text-align
                **/
                var text_align = jQuery(target).css("text-align");
                if(text_align != '' && text_align != undefined){
                    jQuery(".text-align-select img").removeClass("active");
                    jQuery(".text-align-select[value="+text_align.trim()+"] img").addClass("active");
                }

                /**
                ** update font-family
                **/
                var font_family = jQuery(target).css("font-family");
                _e_ = font_family;
                if(font_family != '' && font_family != undefined){
                    font_family = font_family.replace(" ","_").replace(/"/gi,"").trim();
                    jQuery("#target-font-family").val(font_family);
                }
                /**
                ** update font-size
                **/
                var font_size = jQuery(target).css("font-size");
                if(font_size != '' && font_size != undefined){
                    font_size = font_size.replace(/[a-zA-Z]/gi,'').trim();
                    console.log("update font-size"+font_size);
                    jQuery("#target-font-size").val(font_size);
                }
                

                /**
                ** update line-height
                **/
                var letter_spacing = jQuery(target).css("letter-spacing");
                if(letter_spacing != '' && letter_spacing != undefined){
                    letter_spacing = letter_spacing.replace(/[a-zA-Z]/gi,'').trim();
                    console.log("update letter-spacing "+font_height);
                    jQuery("#target-letter-spacing").val(font_height);
                }


                /**
                ** update line-height
                **/
                var font_height = jQuery(target).css("line-height");
                if(font_height != '' && font_height != undefined){
                    font_height = font_height.replace(/[a-zA-Z]/gi,'').trim();
                    console.log("update font-size "+font_height);
                    jQuery("#target-line-height").val(font_height);
                }

                /**
                ** update line-height
                **/
                var font_weight = jQuery(target).css("font-weight");
                if(font_weight != '' && font_weight != undefined){
                    font_weight = font_weight.trim();
                    console.log(font_weight);
                    if(font_weight == 'bold' || font_weight == '700' || font_weight == '800'){
                        if(!jQuery("#font-weight-select img").hasClass('active'))
                            jQuery("#font-weight-select img").addClass('active');
                    }else{
                        if(jQuery("#font-weight-select img").hasClass('active'))
                            jQuery("#font-weight-select img").removeClass('active');
                    }
                }else{
                    if(jQuery("#font-weight-select img").hasClass('active')){
                        jQuery("#font-weight-select img").removeClass('active');
                     }
                }

                /**
                ** update line-height
                **/
                var font_weight = jQuery(target).css("font-weight");
                if(font_weight != '' && font_weight != undefined){
                    font_weight = font_weight.trim();
                    console.log(font_weight);
                    if(font_weight == 'bold' || font_weight == '700' || font_weight == '800'){
                        if(!jQuery("#font-weight-select img").hasClass('active'))
                            jQuery("#font-weight-select img").addClass('active');
                    }else{
                        if(jQuery("#font-weight-select img").hasClass('active'))
                            jQuery("#font-weight-select img").removeClass('active');
                    }
                }else{
                    if(jQuery("#font-weight-select img").hasClass('active')){
                        jQuery("#font-weight-select img").removeClass('active');
                     }
                }

                /**
                ** update font-style
                **/
                var font_style = jQuery(target).css("font-style");
                if(font_style != '' && font_style != undefined){
                    font_style = font_style.trim();
                    if(font_style == 'italic'){
                        if(!jQuery("#font-style-select img").hasClass('active'))
                            jQuery("#font-style-select img").addClass('active');
                    }else{
                        if(jQuery("#font-style-select img").hasClass('active'))
                            jQuery("#font-style-select img").removeClass('active');
                    }
                }else{
                    if(jQuery("#font-style-select img").hasClass('active')){
                        jQuery("#font-style-select img").removeClass('active');
                     }
                }
                
                /**
                ** update text-decoration
                **/
                var font_style = jQuery(target).css("text-decoration");
                if(font_style != '' && font_style != undefined){
                    font_style = font_style.trim();
                    if(font_style == 'underline'){
                        if(!jQuery("#text-decoration-select img").hasClass('active'))
                            jQuery("#text-decoration-select img").addClass('active');
                    }else{
                        if(jQuery("#text-decoration-select img").hasClass('active'))
                            jQuery("#text-decoration-select img").removeClass('active');
                    }
                }else{
                    if(jQuery("#text-decoration-select img").hasClass('active')){
                        jQuery("#text-decoration-select img").removeClass('active');
                     }
                }

                    
                /**
                ** transform: rotate(72deg);
                ** update text-decoration
                **/
                var transform = jQuery(target).css("transform");
                if(transform != '' && transform != undefined){
                    transform = parseInt(transform.replace(/[a-zA-Z()]/gi,'').trim());
                    if(transform > 0){
                        if(!jQuery("#transform-select img").hasClass('active'))
                            jQuery("#transform-select img").addClass('active');
                    }else{
                        if(jQuery("#transform-select img").hasClass('active'))
                            jQuery("#transform-select img").removeClass('active');
                    }
                }else{
                    if(jQuery("#transform-select img").hasClass('active')){
                        jQuery("#transform-select img").removeClass('active');
                     }
                }
            }
            function init(){
                updateElementRoot();
                initPropertyEvent();
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
        padding: 0;
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
            padding-right: 20px;
    }
    .header ul li img.active {
        background: white;
        padding: 5px;
    }
    .header ul li img{
        height: 100%;width: auto;
        padding: 3px;
    }

        /* HIDE RADIO */
    [type=radio] { 
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* IMAGE STYLES */
    [type=radio] + img {
      cursor: pointer;
    }

    /* CHECKED STYLES */
    [type=radio]:checked + img {
      outline: 2px solid #f00;
      border: 2px solid #f00;
    }
    .item-frame.rect.selected-item {
        border: 3px dashed #e89e16;
    }
    .select-small{
        border: none;width: 35px;text-align: left;padding-left: 5px;height: 25px !important;margin-left: 35px;line-height: 24px !important;line-height: 39px;overflow: visible;font-size: 15px;background-color: #ffffff7d;padding: 2px
    }
    .zone-tranquille {    
        border: 1px solid #de0a0a;
        height: 99%;
        width: 99%;
        margin: 1.5%;
        position: absolute;
        top: 0;
    }
    .zone-fini {
        border: 1px dashed black;
        height: 98%;
        width: 98%;
        margin: .4%;
    }
    .zone-fini {
        border: 1px dashed black;
        height:calc(100% - 10px);
        left: 0;
        top: 0;
        position: absolute;
        margin: 5px;
        width: calc(100% - 10px);
    }
    .zone-tranquille {
        height:calc(100% - 20px);
        left: 0;
        top: 0;
        position: absolute;
        margin: 10px;
        width: calc(100% - 20px);
    }
    .card-border hr {
        width: 65px;
        margin-right: 5px;
    }
     .card-border span {
            width: calc(100% - 65px);
    }
    .header-part{
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 30px;
        padding-bottom: 50px;
    }
    .main-content .rendering{
        min-width: 700px;
    }
    button.quit{
        background: white;
        padding: 5px 20px 5px 15px;
        margin: 4px 0px 4px 15px;
        border: 2px solid #bfbbbb;
        color: #bfbbbb;
    }
    button.quit a{
        text-decoration: none;
    }
</style>
<?php //get_footer(); ?>  

</body>
</html>
