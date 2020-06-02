<?php

def("DOMPDF_ENABLE_REMOTE", true);
include WPCVC_DOMP_DIR.'/vendor/autoload.php';
    
use Dompdf\Dompdf;


// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('<div class="rendering"><div class="container" id="container-6" selected="0" style="height: 100%;border: 0px solid #d5e8df;width: 100%;" data-selected-id="8385"><div class="zone-fini"></div><div class="zone-tranquille"></div><div class="item-text item-frame rect  clayfy-box" id="vc_object-7266" style="font-family: &quot;Dancing Script&quot;; font-size: 55px; top: 86px; left: 148px;">Justine et François</div><div class="item-text item-frame rect  clayfy-box selected-item" id="vc_object-8385" style="border-radius: 0px; opacity: 1; width: 391px; font-family: &quot;Lobster Two&quot;; height: 77px; text-align: center; top: 359px; left: 156px;">Bonjour nous sommes ravis de vous convier à notre mariage le 17 aout 2020 1h</div><div class="item-image item-frame rect  clayfy-box" id="vc_object-8392" style="border-radius: 0px; opacity: 1; font-size: 10px; width: 153px; height: 142px; top: 179px; left: 262px;"><img style="width: 100%; height: 100%" src="http://pngimg.com/uploads/mario/mario_PNG129.png"></div></div></div>');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();


