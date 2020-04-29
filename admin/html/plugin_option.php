<div class="wrap">            
    <form method="post" action="options.php" enctype="multipart/form-data">
    <?php
        $active_tab = $this->admin_menu[0]['url'];
        if(isset($_GET["tab"]) && $_GET["tab"] !=='')$active_tab = $_GET["tab"];
        $template_html = "";
        foreach ($this->admin_menu  as $key => $value) {
            if($value['url'] == $active_tab){
                $template_html = $value['template'];
                settings_fields($this->admin_section);       
                do_settings_sections("theme-options");
                break;
            }
        }
        submit_button();
    ?>          
    </form>
</div>