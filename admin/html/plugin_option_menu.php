<div id="icon-options-general" class="icon32"></div>
<?php settings_errors(); ?>
<?php
    $active_tab = $this->admin_menu[0]['url'];
    if(isset($_GET["tab"]) && $_GET["tab"] !=='')$active_tab = $_GET["tab"];
    $menu = '<h2 class="nav-tab-wrapper">';
    foreach ($this->admin_menu  as $key => $value) {
        $active = '';
        if($value['url'] == $active_tab){
            $active = 'nav-tab-active';
        }
        $menu .= '<a href="edit.php?post_type='.$this->post_type.'&page='.$this->admin_page.'&tab='.$value['url'].'" class="nav-tab '.$active.' ">'.$value["title"].'</a>';
    }
    $menu .= '</h2>';
    echo  $menu;
?>
