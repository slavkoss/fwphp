<?php
$images = [
['file' => '01_MVC', 'caption' => '01_MVC']
,['file' => '05_n_tier_phisical_servers_like_MVCcode'
    , 'caption' => '05_n_tier_phisical_servers_like_MVCcode.jpg']
,['file' => '01MVC_M_C_V', 'caption' => '01MVC_M_C_V.jpg'],
['file' => '01MVC_M_V', 'caption' => '01MVC_M_V.jpg']
,['file' => '02_OO_data_method_M_eg_NoSQL_server', 'caption' => '02_OO_data_method_M_eg_NoSQL_server.jpg']
,['file' => '02_relational_data_method_model', 'caption' => '02_relational_data_method_model.jpg']
,['file' => '03_multiple_V_submodules_for_different_displ_envir'
     , 'caption' => '03_multiple_V_submodules_for_different_displ_envir.jpg']
,['file' => '04_M_V_presenter_method', 'caption' => '04_M_V_presenter_method.jpg']
,['file' => '04_M_V_viewmodel_method', 'caption' => '04_M_V_viewmodel_method.jpg']
,['file' => 'header', 'caption' => 'header.jpg']
,['file' => 'meatmirror', 'caption' => 'meatmirror.jpg']
// same again :
,['file' => '01_MVC', 'caption' => '01_MVC']
,['file' => '05_n_tier_phisical_servers_like_MVCcode'
     , 'caption' => '05_n_tier_phisical_servers_like_MVCcode.jpg']
,['file' => '01MVC_M_C_V', 'caption' => '01MVC_M_C_V.jpg'],
['file' => '01MVC_M_V', 'caption' => '01MVC_M_V.jpg']
,['file' => '02_OO_data_method_M_eg_NoSQL_server'
    , 'caption' => '02_OO_data_method_M_eg_NoSQL_server.jpg']
,['file' => '02_relational_data_method_model', 'caption' => '02_relational_data_method_model.jpg']
,['file' => '03_multiple_V_submodules_for_different_displ_envir'
    , 'caption' => '03_multiple_V_submodules_for_different_displ_envir.jpg']
,['file' => '04_M_V_presenter_method', 'caption' => '04_M_V_presenter_method.jpg']
,['file' => '04_M_V_viewmodel_method', 'caption' => '04_M_V_viewmodel_method.jpg']
,['file' => 'header', 'caption' => 'header.jpg']
,['file' => 'meatmirror', 'caption' => 'meatmirror.jpg']
];
$i = rand(0, count($images)-1);
//$selectedImage = $IMGPATH."/{$images[$i]['file']}.jpg";
$selectedImage = $IMGPATH.'/'.$images[$i]['file'].'.jpg';
$caption = $images[$i]['caption'];

$imgpath = $_SERVER['DOCUMENT_ROOT'].$selectedImage ;
if ( file_exists($imgpath) && is_readable($imgpath)) {
    $imageSize = getimagesize($imgpath);
}
