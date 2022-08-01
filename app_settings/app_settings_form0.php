<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags(""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_settings'] . ""); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
            <meta name="viewport" content="minimal-ui, width=300, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
            <meta name="mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="apple-touch-icon"   sizes="57x57" href="">
            <link rel="apple-touch-icon"   sizes="60x60" href="">
            <link rel="apple-touch-icon"   sizes="72x72" href="">
            <link rel="apple-touch-icon"   sizes="76x76" href="">
            <link rel="apple-touch-icon" sizes="114x114" href="">
            <link rel="apple-touch-icon" sizes="120x120" href="">
            <link rel="apple-touch-icon" sizes="144x144" href="">
            <link rel="apple-touch-icon" sizes="152x152" href="">
            <link rel="apple-touch-icon" sizes="180x180" href="">
            <link rel="icon" type="image/png" sizes="192x192" href="">
            <link rel="icon" type="image/png"   sizes="32x32" href="">
            <link rel="icon" type="image/png"   sizes="96x96" href="">
            <link rel="icon" type="image/png"   sizes="16x16" href="">
            <meta name="msapplication-TileColor" content="___">
            <meta name="msapplication-TileImage" content="">
            <meta name="theme-color" content="___">
            <meta name="apple-mobile-web-app-status-bar-style" content="___">
            <link rel="shortcut icon" href=""> <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
            <?php
               if ($_SESSION['scriptcase']['display_mobile'] && $_SESSION['scriptcase']['device_mobile']) {
                   $sc_app_data = json_encode([
                       'appType' => 'form',
                       'improvements' => true,
                       'displayOptionsButton' => false,
                       'displayScrollUp' => true,
                       'scrollUpPosition' => 'A',
                       'toolbarOrientation' => 'H',
                       'mobilePanes' => 'true',
                       'navigationBarButtons' => unserialize('a:0:{}'),
                       'mobileSimpleToolbar' => false,
                       'bottomToolbarFixed' => true
                   ]); ?>
            <input type="hidden" id="sc-mobile-app-data" value='<?php echo $sc_app_data; ?>' />
            <script type="text/javascript" src="../_lib/lib/js/nm_modal_panes.jquery.js"></script>
            <script type="text/javascript" src="../_lib/lib/js/nm_form_mobile.js"></script>
            <link rel='stylesheet' href='../_lib/lib/css/nm_form_mobile.css' type='text/css'/>
            <script>
                $(document).ready(function(){

                    bootstrapMobile();

                });
            </script>
            <?php } ?> <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
 <style type="text/css">
  .scSpin_cookie_expiration_time_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  #id_read_off_cookie_expiration_time .ui-spinner {
   display: flex;
   width: 100%;
  }
  .scSpin_brute_force_time_block_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  #id_read_off_brute_force_time_block .ui-spinner {
   display: flex;
   width: 100%;
  }
  .scSpin_brute_force_attempts_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  #id_read_off_brute_force_attempts .ui-spinner {
   display: flex;
   width: 100%;
  }
  .scSpin_enable_2fa_expiration_time_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  #id_read_off_enable_2fa_expiration_time .ui-spinner {
   display: flex;
   width: 100%;
  }
 </style>
 <style type="text/css">
   .select2-container {
     width: auto !important;
     flex-grow: 1;
   }
   .select2-selection {
     width: 100% !important;
   }
 </style>
<style type="text/css">
	.sc.switch {
		position: relative;
		display: inline-flex;
	}

	.sc.switch span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.switch span {
		background: #DFDFDF;
		width: 22px;
		height: 14px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		padding: 0 3px;
		transition: all .2s linear;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.switch span:before {
		content: '\2713';
		display: inline-block;
		color: white;
		font-size: 10px;
		z-index: 0;
		position: absolute;
		top: 0;
		left: 4px;
	}

	.sc.switch span:after {
		content: '';
		background: white;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 1px;
		left: 1px;
		border-radius: 15px;
		transition: all .2s linear;
		z-index: 1;
	}

	.sc.switch input {
		margin-right: 10px;
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.switch input:disabled + span {
		opacity: 0.35;
	}

	.sc.switch input:checked + span {
		background: #66AFE9;
	}

	.sc.switch input:checked + span:after {
		left: calc(100% - 1px);
		transform: translateX(-100%);
	}

	.sc.radio {
		position: relative;
		display: inline-flex;
	}

	.sc.radio span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.radio span {
		background: #ffffff;
		border: 1px solid #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.radio span:after {
		content: '';
		background: #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		z-index: 1;
		transform: scale(0);
	}

	.sc.radio input {
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.radio input:disabled + span {
		opacity: 0.35;
	}

	.sc.radio input:checked + span {
		background: #66AFE9;
	}

	.sc.radio input:checked + span:after {
		transform: translateX(-100%);
		transform: scale(1);
	}
</style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>app_settings/app_settings_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("app_settings_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['last'] : 'off'); ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       if ("off" == Nav_binicio_macro_disabled) { $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       if ("off" == Nav_bretorna_macro_disabled) { $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       if ("off" == Nav_bfinal_macro_disabled) { $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       if ("off" == Nav_bavanca_macro_disabled) { $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
<?php

include_once('app_settings_jquery.php');

?>

 var Dyn_Ini  = true;
function setLabelCellMaxWidth()
{
    var $labelList = $(".scUiLabelWidthFix"), $spanList, i, testWidth, maxLabelWidth = 0;
    for (i = 0; i < $labelList.length; i++) {
        $spanList = $($labelList[i]).find("span");

        if ($spanList.length) {
            testWidth  = $($spanList[0]).width();

            maxLabelWidth = Math.max(maxLabelWidth, testWidth);
        }
    }

    if (0 < maxLabelWidth) {
        maxLabelWidth += 20;
        $labelList.css("width", maxLabelWidth + "px");
    }
}

 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

        setLabelCellMaxWidth();

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 2; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage sc-app-contr" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("app_settings_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['app_settings'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['app_settings'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?>ERROR</td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="60%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo ""; } else { echo "" . $this->Ini->Nm_lang['lang_settings'] . ""; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['session_expire']))
   {
       $this->nm_new_label['session_expire'] = "" . $this->Ini->Nm_lang['lang_sec_set_session_expire'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $session_expire = $this->session_expire;
   $sStyleHidden_session_expire = '';
   if (isset($this->nmgp_cmp_hidden['session_expire']) && $this->nmgp_cmp_hidden['session_expire'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['session_expire']);
       $sStyleHidden_session_expire = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_session_expire = 'display: none;';
   $sStyleReadInp_session_expire = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['session_expire']) && $this->nmgp_cmp_readonly['session_expire'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['session_expire']);
       $sStyleReadLab_session_expire = '';
       $sStyleReadInp_session_expire = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['session_expire']) && $this->nmgp_cmp_hidden['session_expire'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="session_expire" value="<?php echo $this->form_encode_input($this->session_expire) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_session_expire_label" id="hidden_field_label_session_expire" style="<?php echo $sStyleHidden_session_expire; ?>"><span id="id_label_session_expire"><?php echo $this->nm_new_label['session_expire']; ?></span></TD>
    <TD class="scFormDataOdd css_session_expire_line" id="hidden_field_data_session_expire" style="<?php echo $sStyleHidden_session_expire; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["session_expire"]) &&  $this->nmgp_cmp_readonly["session_expire"] == "on") { 

$session_expire_look = "";
 if ($this->session_expire == "N") { $session_expire_look .= "" . $this->Ini->Nm_lang['lang_sec_sess_no'] . "" ;} 
 if ($this->session_expire == "R") { $session_expire_look .= "" . $this->Ini->Nm_lang['lang_sec_sess_redir'] . "" ;} 
 if ($this->session_expire == "M") { $session_expire_look .= "" . $this->Ini->Nm_lang['lang_sec_sess_msg'] . "" ;} 
 if (empty($session_expire_look)) { $session_expire_look = $this->session_expire; }
?>
<input type="hidden" name="session_expire" value="<?php echo $this->form_encode_input($session_expire) . "\">" . $session_expire_look . ""; ?>
<?php } else { ?>
<?php

$session_expire_look = "";
 if ($this->session_expire == "N") { $session_expire_look .= "" . $this->Ini->Nm_lang['lang_sec_sess_no'] . "" ;} 
 if ($this->session_expire == "R") { $session_expire_look .= "" . $this->Ini->Nm_lang['lang_sec_sess_redir'] . "" ;} 
 if ($this->session_expire == "M") { $session_expire_look .= "" . $this->Ini->Nm_lang['lang_sec_sess_msg'] . "" ;} 
 if (empty($session_expire_look)) { $session_expire_look = $this->session_expire; }
?>
<span id="id_read_on_session_expire" class="css_session_expire_line"  style="<?php echo $sStyleReadLab_session_expire; ?>"><?php echo $this->form_format_readonly("session_expire", $this->form_encode_input($session_expire_look)); ?></span><span id="id_read_off_session_expire" class="css_read_off_session_expire<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_session_expire; ?>">
 <span id="idAjaxSelect_session_expire" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_session_expire_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_session_expire" name="session_expire" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="N" <?php  if ($this->session_expire == "N") { echo " selected" ;} ?><?php  if (empty($this->session_expire)) { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_sec_sess_no']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['Lookup_session_expire'][] = 'N'; ?>
 <option  value="R" <?php  if ($this->session_expire == "R") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_sec_sess_redir']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['Lookup_session_expire'][] = 'R'; ?>
 <option  value="M" <?php  if ($this->session_expire == "M") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_sec_sess_msg']; ?></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['Lookup_session_expire'][] = 'M'; ?>
 </select></span>
</span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['remember_me']))
   {
       $this->nm_new_label['remember_me'] = "" . $this->Ini->Nm_lang['lang_sec_set_remember_me'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $remember_me = $this->remember_me;
   $sStyleHidden_remember_me = '';
   if (isset($this->nmgp_cmp_hidden['remember_me']) && $this->nmgp_cmp_hidden['remember_me'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['remember_me']);
       $sStyleHidden_remember_me = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_remember_me = 'display: none;';
   $sStyleReadInp_remember_me = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['remember_me']) && $this->nmgp_cmp_readonly['remember_me'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['remember_me']);
       $sStyleReadLab_remember_me = '';
       $sStyleReadInp_remember_me = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['remember_me']) && $this->nmgp_cmp_hidden['remember_me'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="remember_me" value="<?php echo $this->form_encode_input($this->remember_me) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->remember_me_1 = explode(";", trim($this->remember_me));
  } 
  else
  {
      if (empty($this->remember_me))
      {
          $this->remember_me_1= array(); 
          $this->remember_me= "N";
      } 
      else
      {
          $this->remember_me_1= $this->remember_me; 
          $this->remember_me= ""; 
          foreach ($this->remember_me_1 as $cada_remember_me)
          {
             if (!empty($remember_me))
             {
                 $this->remember_me.= ";"; 
             } 
             $this->remember_me.= $cada_remember_me; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_remember_me_label" id="hidden_field_label_remember_me" style="<?php echo $sStyleHidden_remember_me; ?>"><span id="id_label_remember_me"><?php echo $this->nm_new_label['remember_me']; ?></span></TD>
    <TD class="scFormDataOdd css_remember_me_line" id="hidden_field_data_remember_me" style="<?php echo $sStyleHidden_remember_me; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["remember_me"]) &&  $this->nmgp_cmp_readonly["remember_me"] == "on") { 

$remember_me_look = "";
 if ($this->remember_me == "Y") { $remember_me_look .= "" ;} 
 if (empty($remember_me_look)) { $remember_me_look = $this->remember_me; }
?>
<input type="hidden" name="remember_me" value="<?php echo $this->form_encode_input($remember_me) . "\">" . $remember_me_look . ""; ?>
<?php } else { ?>

<?php

$remember_me_look = "";
 if ($this->remember_me == "Y") { $remember_me_look .= "" ;} 
 if (empty($remember_me_look)) { $remember_me_look = $this->remember_me; }
?>
<span id="id_read_on_remember_me" class="css_remember_me_line" style="<?php echo $sStyleReadLab_remember_me; ?>"><?php echo $this->form_format_readonly("remember_me", $this->form_encode_input($remember_me_look)); ?></span><span id="id_read_off_remember_me" class="css_read_off_remember_me css_remember_me_line" style="<?php echo $sStyleReadInp_remember_me; ?>"><?php echo "<div id=\"idAjaxCheckbox_remember_me\" style=\"display: inline-block\" class=\"css_remember_me_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_remember_me_line"><?php $tempOptionId = "id-opt-remember_me" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-remember_me sc-ui-checkbox-remember_me" name="remember_me[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['Lookup_remember_me'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->remember_me_1))  { echo " checked" ;} ?> onClick="do_ajax_app_settings_event_remember_me_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cookie_expiration_time']))
    {
        $this->nm_new_label['cookie_expiration_time'] = "" . $this->Ini->Nm_lang['lang_sec_set_cookie_exp_time'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cookie_expiration_time = $this->cookie_expiration_time;
   $sStyleHidden_cookie_expiration_time = '';
   if (isset($this->nmgp_cmp_hidden['cookie_expiration_time']) && $this->nmgp_cmp_hidden['cookie_expiration_time'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cookie_expiration_time']);
       $sStyleHidden_cookie_expiration_time = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cookie_expiration_time = 'display: none;';
   $sStyleReadInp_cookie_expiration_time = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cookie_expiration_time']) && $this->nmgp_cmp_readonly['cookie_expiration_time'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cookie_expiration_time']);
       $sStyleReadLab_cookie_expiration_time = '';
       $sStyleReadInp_cookie_expiration_time = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cookie_expiration_time']) && $this->nmgp_cmp_hidden['cookie_expiration_time'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cookie_expiration_time" value="<?php echo $this->form_encode_input($cookie_expiration_time) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cookie_expiration_time_label" id="hidden_field_label_cookie_expiration_time" style="<?php echo $sStyleHidden_cookie_expiration_time; ?>"><span id="id_label_cookie_expiration_time"><?php echo $this->nm_new_label['cookie_expiration_time']; ?></span></TD>
    <TD class="scFormDataOdd css_cookie_expiration_time_line" id="hidden_field_data_cookie_expiration_time" style="<?php echo $sStyleHidden_cookie_expiration_time; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cookie_expiration_time"]) &&  $this->nmgp_cmp_readonly["cookie_expiration_time"] == "on") { 

 ?>
<input type="hidden" name="cookie_expiration_time" value="<?php echo $this->form_encode_input($cookie_expiration_time) . "\">" . $cookie_expiration_time . ""; ?>
<?php } else { ?>
<span id="id_read_on_cookie_expiration_time" class="sc-ui-readonly-cookie_expiration_time css_cookie_expiration_time_line" style="<?php echo $sStyleReadLab_cookie_expiration_time; ?>"><?php echo $this->form_format_readonly("cookie_expiration_time", $this->form_encode_input($this->cookie_expiration_time)); ?></span><span id="id_read_off_cookie_expiration_time" class="css_read_off_cookie_expiration_time<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cookie_expiration_time; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_cookie_expiration_time_obj css_cookie_expiration_time_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cookie_expiration_time" type=text name="cookie_expiration_time" value="<?php echo $this->form_encode_input($cookie_expiration_time) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cookie_expiration_time']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cookie_expiration_time']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cookie_expiration_time']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_cookie_expiration_time_label scFormDataHelpOdd">&nbsp;<?php echo $this->Ini->Nm_lang['lang_sec_days'] ?>
</span></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['retrieve_password']))
   {
       $this->nm_new_label['retrieve_password'] = "" . $this->Ini->Nm_lang['lang_sec_set_retrieve_password'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $retrieve_password = $this->retrieve_password;
   $sStyleHidden_retrieve_password = '';
   if (isset($this->nmgp_cmp_hidden['retrieve_password']) && $this->nmgp_cmp_hidden['retrieve_password'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['retrieve_password']);
       $sStyleHidden_retrieve_password = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_retrieve_password = 'display: none;';
   $sStyleReadInp_retrieve_password = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['retrieve_password']) && $this->nmgp_cmp_readonly['retrieve_password'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['retrieve_password']);
       $sStyleReadLab_retrieve_password = '';
       $sStyleReadInp_retrieve_password = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['retrieve_password']) && $this->nmgp_cmp_hidden['retrieve_password'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="retrieve_password" value="<?php echo $this->form_encode_input($this->retrieve_password) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->retrieve_password_1 = explode(";", trim($this->retrieve_password));
  } 
  else
  {
      if (empty($this->retrieve_password))
      {
          $this->retrieve_password_1= array(); 
          $this->retrieve_password= "N";
      } 
      else
      {
          $this->retrieve_password_1= $this->retrieve_password; 
          $this->retrieve_password= ""; 
          foreach ($this->retrieve_password_1 as $cada_retrieve_password)
          {
             if (!empty($retrieve_password))
             {
                 $this->retrieve_password.= ";"; 
             } 
             $this->retrieve_password.= $cada_retrieve_password; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_retrieve_password_label" id="hidden_field_label_retrieve_password" style="<?php echo $sStyleHidden_retrieve_password; ?>"><span id="id_label_retrieve_password"><?php echo $this->nm_new_label['retrieve_password']; ?></span></TD>
    <TD class="scFormDataOdd css_retrieve_password_line" id="hidden_field_data_retrieve_password" style="<?php echo $sStyleHidden_retrieve_password; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["retrieve_password"]) &&  $this->nmgp_cmp_readonly["retrieve_password"] == "on") { 

$retrieve_password_look = "";
 if ($this->retrieve_password == "Y") { $retrieve_password_look .= "" ;} 
 if (empty($retrieve_password_look)) { $retrieve_password_look = $this->retrieve_password; }
?>
<input type="hidden" name="retrieve_password" value="<?php echo $this->form_encode_input($retrieve_password) . "\">" . $retrieve_password_look . ""; ?>
<?php } else { ?>

<?php

$retrieve_password_look = "";
 if ($this->retrieve_password == "Y") { $retrieve_password_look .= "" ;} 
 if (empty($retrieve_password_look)) { $retrieve_password_look = $this->retrieve_password; }
?>
<span id="id_read_on_retrieve_password" class="css_retrieve_password_line" style="<?php echo $sStyleReadLab_retrieve_password; ?>"><?php echo $this->form_format_readonly("retrieve_password", $this->form_encode_input($retrieve_password_look)); ?></span><span id="id_read_off_retrieve_password" class="css_read_off_retrieve_password css_retrieve_password_line" style="<?php echo $sStyleReadInp_retrieve_password; ?>"><?php echo "<div id=\"idAjaxCheckbox_retrieve_password\" style=\"display: inline-block\" class=\"css_retrieve_password_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_retrieve_password_line"><?php $tempOptionId = "id-opt-retrieve_password" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-retrieve_password sc-ui-checkbox-retrieve_password" name="retrieve_password[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['Lookup_retrieve_password'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->retrieve_password_1))  { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['new_users']))
   {
       $this->nm_new_label['new_users'] = "" . $this->Ini->Nm_lang['lang_sec_set_new_users'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $new_users = $this->new_users;
   $sStyleHidden_new_users = '';
   if (isset($this->nmgp_cmp_hidden['new_users']) && $this->nmgp_cmp_hidden['new_users'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['new_users']);
       $sStyleHidden_new_users = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_new_users = 'display: none;';
   $sStyleReadInp_new_users = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['new_users']) && $this->nmgp_cmp_readonly['new_users'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['new_users']);
       $sStyleReadLab_new_users = '';
       $sStyleReadInp_new_users = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['new_users']) && $this->nmgp_cmp_hidden['new_users'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="new_users" value="<?php echo $this->form_encode_input($this->new_users) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->new_users_1 = explode(";", trim($this->new_users));
  } 
  else
  {
      if (empty($this->new_users))
      {
          $this->new_users_1= array(); 
          $this->new_users= "N";
      } 
      else
      {
          $this->new_users_1= $this->new_users; 
          $this->new_users= ""; 
          foreach ($this->new_users_1 as $cada_new_users)
          {
             if (!empty($new_users))
             {
                 $this->new_users.= ";"; 
             } 
             $this->new_users.= $cada_new_users; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_new_users_label" id="hidden_field_label_new_users" style="<?php echo $sStyleHidden_new_users; ?>"><span id="id_label_new_users"><?php echo $this->nm_new_label['new_users']; ?></span></TD>
    <TD class="scFormDataOdd css_new_users_line" id="hidden_field_data_new_users" style="<?php echo $sStyleHidden_new_users; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["new_users"]) &&  $this->nmgp_cmp_readonly["new_users"] == "on") { 

$new_users_look = "";
 if ($this->new_users == "Y") { $new_users_look .= "" ;} 
 if (empty($new_users_look)) { $new_users_look = $this->new_users; }
?>
<input type="hidden" name="new_users" value="<?php echo $this->form_encode_input($new_users) . "\">" . $new_users_look . ""; ?>
<?php } else { ?>

<?php

$new_users_look = "";
 if ($this->new_users == "Y") { $new_users_look .= "" ;} 
 if (empty($new_users_look)) { $new_users_look = $this->new_users; }
?>
<span id="id_read_on_new_users" class="css_new_users_line" style="<?php echo $sStyleReadLab_new_users; ?>"><?php echo $this->form_format_readonly("new_users", $this->form_encode_input($new_users_look)); ?></span><span id="id_read_off_new_users" class="css_read_off_new_users css_new_users_line" style="<?php echo $sStyleReadInp_new_users; ?>"><?php echo "<div id=\"idAjaxCheckbox_new_users\" style=\"display: inline-block\" class=\"css_new_users_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_new_users_line"><?php $tempOptionId = "id-opt-new_users" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-new_users sc-ui-checkbox-new_users" name="new_users[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['Lookup_new_users'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->new_users_1))  { echo " checked" ;} ?><?php  if (empty($this->new_users)) { echo " checked" ;} ?> onClick="" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['brute_force']))
   {
       $this->nm_new_label['brute_force'] = "" . $this->Ini->Nm_lang['lang_sec_set_brute_force'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $brute_force = $this->brute_force;
   $sStyleHidden_brute_force = '';
   if (isset($this->nmgp_cmp_hidden['brute_force']) && $this->nmgp_cmp_hidden['brute_force'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['brute_force']);
       $sStyleHidden_brute_force = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_brute_force = 'display: none;';
   $sStyleReadInp_brute_force = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['brute_force']) && $this->nmgp_cmp_readonly['brute_force'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['brute_force']);
       $sStyleReadLab_brute_force = '';
       $sStyleReadInp_brute_force = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['brute_force']) && $this->nmgp_cmp_hidden['brute_force'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="brute_force" value="<?php echo $this->form_encode_input($this->brute_force) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->brute_force_1 = explode(";", trim($this->brute_force));
  } 
  else
  {
      if (empty($this->brute_force))
      {
          $this->brute_force_1= array(); 
          $this->brute_force= "N";
      } 
      else
      {
          $this->brute_force_1= $this->brute_force; 
          $this->brute_force= ""; 
          foreach ($this->brute_force_1 as $cada_brute_force)
          {
             if (!empty($brute_force))
             {
                 $this->brute_force.= ";"; 
             } 
             $this->brute_force.= $cada_brute_force; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_brute_force_label" id="hidden_field_label_brute_force" style="<?php echo $sStyleHidden_brute_force; ?>"><span id="id_label_brute_force"><?php echo $this->nm_new_label['brute_force']; ?></span></TD>
    <TD class="scFormDataOdd css_brute_force_line" id="hidden_field_data_brute_force" style="<?php echo $sStyleHidden_brute_force; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["brute_force"]) &&  $this->nmgp_cmp_readonly["brute_force"] == "on") { 

$brute_force_look = "";
 if ($this->brute_force == "Y") { $brute_force_look .= "" ;} 
 if (empty($brute_force_look)) { $brute_force_look = $this->brute_force; }
?>
<input type="hidden" name="brute_force" value="<?php echo $this->form_encode_input($brute_force) . "\">" . $brute_force_look . ""; ?>
<?php } else { ?>

<?php

$brute_force_look = "";
 if ($this->brute_force == "Y") { $brute_force_look .= "" ;} 
 if (empty($brute_force_look)) { $brute_force_look = $this->brute_force; }
?>
<span id="id_read_on_brute_force" class="css_brute_force_line" style="<?php echo $sStyleReadLab_brute_force; ?>"><?php echo $this->form_format_readonly("brute_force", $this->form_encode_input($brute_force_look)); ?></span><span id="id_read_off_brute_force" class="css_read_off_brute_force css_brute_force_line" style="<?php echo $sStyleReadInp_brute_force; ?>"><?php echo "<div id=\"idAjaxCheckbox_brute_force\" style=\"display: inline-block\" class=\"css_brute_force_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_brute_force_line"><?php $tempOptionId = "id-opt-brute_force" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-brute_force sc-ui-checkbox-brute_force" name="brute_force[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['Lookup_brute_force'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->brute_force_1))  { echo " checked" ;} ?> onClick="do_ajax_app_settings_event_brute_force_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['brute_force_time_block']))
    {
        $this->nm_new_label['brute_force_time_block'] = "" . $this->Ini->Nm_lang['lang_sec_set_bf_time_bl'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $brute_force_time_block = $this->brute_force_time_block;
   $sStyleHidden_brute_force_time_block = '';
   if (isset($this->nmgp_cmp_hidden['brute_force_time_block']) && $this->nmgp_cmp_hidden['brute_force_time_block'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['brute_force_time_block']);
       $sStyleHidden_brute_force_time_block = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_brute_force_time_block = 'display: none;';
   $sStyleReadInp_brute_force_time_block = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['brute_force_time_block']) && $this->nmgp_cmp_readonly['brute_force_time_block'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['brute_force_time_block']);
       $sStyleReadLab_brute_force_time_block = '';
       $sStyleReadInp_brute_force_time_block = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['brute_force_time_block']) && $this->nmgp_cmp_hidden['brute_force_time_block'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="brute_force_time_block" value="<?php echo $this->form_encode_input($brute_force_time_block) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_brute_force_time_block_label" id="hidden_field_label_brute_force_time_block" style="<?php echo $sStyleHidden_brute_force_time_block; ?>"><span id="id_label_brute_force_time_block"><?php echo $this->nm_new_label['brute_force_time_block']; ?></span></TD>
    <TD class="scFormDataOdd css_brute_force_time_block_line" id="hidden_field_data_brute_force_time_block" style="<?php echo $sStyleHidden_brute_force_time_block; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["brute_force_time_block"]) &&  $this->nmgp_cmp_readonly["brute_force_time_block"] == "on") { 

 ?>
<input type="hidden" name="brute_force_time_block" value="<?php echo $this->form_encode_input($brute_force_time_block) . "\">" . $brute_force_time_block . ""; ?>
<?php } else { ?>
<span id="id_read_on_brute_force_time_block" class="sc-ui-readonly-brute_force_time_block css_brute_force_time_block_line" style="<?php echo $sStyleReadLab_brute_force_time_block; ?>"><?php echo $this->form_format_readonly("brute_force_time_block", $this->form_encode_input($this->brute_force_time_block)); ?></span><span id="id_read_off_brute_force_time_block" class="css_read_off_brute_force_time_block<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_brute_force_time_block; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_brute_force_time_block_obj css_brute_force_time_block_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_brute_force_time_block" type=text name="brute_force_time_block" value="<?php echo $this->form_encode_input($brute_force_time_block) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['brute_force_time_block']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['brute_force_time_block']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['brute_force_time_block']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_brute_force_time_block_label scFormDataHelpOdd">&nbsp;<?php echo $this->Ini->Nm_lang['lang_sec_minutes'] ?>
</span></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['brute_force_attempts']))
    {
        $this->nm_new_label['brute_force_attempts'] = "" . $this->Ini->Nm_lang['lang_sec_set_bf_attempts'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $brute_force_attempts = $this->brute_force_attempts;
   $sStyleHidden_brute_force_attempts = '';
   if (isset($this->nmgp_cmp_hidden['brute_force_attempts']) && $this->nmgp_cmp_hidden['brute_force_attempts'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['brute_force_attempts']);
       $sStyleHidden_brute_force_attempts = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_brute_force_attempts = 'display: none;';
   $sStyleReadInp_brute_force_attempts = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['brute_force_attempts']) && $this->nmgp_cmp_readonly['brute_force_attempts'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['brute_force_attempts']);
       $sStyleReadLab_brute_force_attempts = '';
       $sStyleReadInp_brute_force_attempts = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['brute_force_attempts']) && $this->nmgp_cmp_hidden['brute_force_attempts'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="brute_force_attempts" value="<?php echo $this->form_encode_input($brute_force_attempts) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_brute_force_attempts_label" id="hidden_field_label_brute_force_attempts" style="<?php echo $sStyleHidden_brute_force_attempts; ?>"><span id="id_label_brute_force_attempts"><?php echo $this->nm_new_label['brute_force_attempts']; ?></span></TD>
    <TD class="scFormDataOdd css_brute_force_attempts_line" id="hidden_field_data_brute_force_attempts" style="<?php echo $sStyleHidden_brute_force_attempts; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["brute_force_attempts"]) &&  $this->nmgp_cmp_readonly["brute_force_attempts"] == "on") { 

 ?>
<input type="hidden" name="brute_force_attempts" value="<?php echo $this->form_encode_input($brute_force_attempts) . "\">" . $brute_force_attempts . ""; ?>
<?php } else { ?>
<span id="id_read_on_brute_force_attempts" class="sc-ui-readonly-brute_force_attempts css_brute_force_attempts_line" style="<?php echo $sStyleReadLab_brute_force_attempts; ?>"><?php echo $this->form_format_readonly("brute_force_attempts", $this->form_encode_input($this->brute_force_attempts)); ?></span><span id="id_read_off_brute_force_attempts" class="css_read_off_brute_force_attempts<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_brute_force_attempts; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_brute_force_attempts_obj css_brute_force_attempts_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_brute_force_attempts" type=text name="brute_force_attempts" value="<?php echo $this->form_encode_input($brute_force_attempts) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['brute_force_attempts']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['brute_force_attempts']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['brute_force_attempts']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['enable_2fa']))
   {
       $this->nm_new_label['enable_2fa'] = "" . $this->Ini->Nm_lang['lang_sec_set_2fa'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $enable_2fa = $this->enable_2fa;
   $sStyleHidden_enable_2fa = '';
   if (isset($this->nmgp_cmp_hidden['enable_2fa']) && $this->nmgp_cmp_hidden['enable_2fa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enable_2fa']);
       $sStyleHidden_enable_2fa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enable_2fa = 'display: none;';
   $sStyleReadInp_enable_2fa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enable_2fa']) && $this->nmgp_cmp_readonly['enable_2fa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enable_2fa']);
       $sStyleReadLab_enable_2fa = '';
       $sStyleReadInp_enable_2fa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enable_2fa']) && $this->nmgp_cmp_hidden['enable_2fa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="enable_2fa" value="<?php echo $this->form_encode_input($this->enable_2fa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->enable_2fa_1 = explode(";", trim($this->enable_2fa));
  } 
  else
  {
      if (empty($this->enable_2fa))
      {
          $this->enable_2fa_1= array(); 
          $this->enable_2fa= "N";
      } 
      else
      {
          $this->enable_2fa_1= $this->enable_2fa; 
          $this->enable_2fa= ""; 
          foreach ($this->enable_2fa_1 as $cada_enable_2fa)
          {
             if (!empty($enable_2fa))
             {
                 $this->enable_2fa.= ";"; 
             } 
             $this->enable_2fa.= $cada_enable_2fa; 
          } 
      } 
  } 
?> 

    <TD class="scFormLabelOdd scUiLabelWidthFix css_enable_2fa_label" id="hidden_field_label_enable_2fa" style="<?php echo $sStyleHidden_enable_2fa; ?>"><span id="id_label_enable_2fa"><?php echo $this->nm_new_label['enable_2fa']; ?></span></TD>
    <TD class="scFormDataOdd css_enable_2fa_line" id="hidden_field_data_enable_2fa" style="<?php echo $sStyleHidden_enable_2fa; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enable_2fa"]) &&  $this->nmgp_cmp_readonly["enable_2fa"] == "on") { 

$enable_2fa_look = "";
 if ($this->enable_2fa == "Y") { $enable_2fa_look .= "" ;} 
 if (empty($enable_2fa_look)) { $enable_2fa_look = $this->enable_2fa; }
?>
<input type="hidden" name="enable_2fa" value="<?php echo $this->form_encode_input($enable_2fa) . "\">" . $enable_2fa_look . ""; ?>
<?php } else { ?>

<?php

$enable_2fa_look = "";
 if ($this->enable_2fa == "Y") { $enable_2fa_look .= "" ;} 
 if (empty($enable_2fa_look)) { $enable_2fa_look = $this->enable_2fa; }
?>
<span id="id_read_on_enable_2fa" class="css_enable_2fa_line" style="<?php echo $sStyleReadLab_enable_2fa; ?>"><?php echo $this->form_format_readonly("enable_2fa", $this->form_encode_input($enable_2fa_look)); ?></span><span id="id_read_off_enable_2fa" class="css_read_off_enable_2fa css_enable_2fa_line" style="<?php echo $sStyleReadInp_enable_2fa; ?>"><?php echo "<div id=\"idAjaxCheckbox_enable_2fa\" style=\"display: inline-block\" class=\"css_enable_2fa_line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_enable_2fa_line"><?php $tempOptionId = "id-opt-enable_2fa" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-enable_2fa sc-ui-checkbox-enable_2fa" name="enable_2fa[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['Lookup_enable_2fa'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->enable_2fa_1))  { echo " checked" ;} ?> onClick="do_ajax_app_settings_event_enable_2fa_onclick();" ><span></span>
<label for="<?php echo $tempOptionId ?>"></label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['enable_2fa_expiration_time']))
    {
        $this->nm_new_label['enable_2fa_expiration_time'] = "" . $this->Ini->Nm_lang['lang_sec_set_2fa_exp_time'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $enable_2fa_expiration_time = $this->enable_2fa_expiration_time;
   $sStyleHidden_enable_2fa_expiration_time = '';
   if (isset($this->nmgp_cmp_hidden['enable_2fa_expiration_time']) && $this->nmgp_cmp_hidden['enable_2fa_expiration_time'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enable_2fa_expiration_time']);
       $sStyleHidden_enable_2fa_expiration_time = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enable_2fa_expiration_time = 'display: none;';
   $sStyleReadInp_enable_2fa_expiration_time = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enable_2fa_expiration_time']) && $this->nmgp_cmp_readonly['enable_2fa_expiration_time'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enable_2fa_expiration_time']);
       $sStyleReadLab_enable_2fa_expiration_time = '';
       $sStyleReadInp_enable_2fa_expiration_time = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enable_2fa_expiration_time']) && $this->nmgp_cmp_hidden['enable_2fa_expiration_time'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="enable_2fa_expiration_time" value="<?php echo $this->form_encode_input($enable_2fa_expiration_time) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_enable_2fa_expiration_time_label" id="hidden_field_label_enable_2fa_expiration_time" style="<?php echo $sStyleHidden_enable_2fa_expiration_time; ?>"><span id="id_label_enable_2fa_expiration_time"><?php echo $this->nm_new_label['enable_2fa_expiration_time']; ?></span></TD>
    <TD class="scFormDataOdd css_enable_2fa_expiration_time_line" id="hidden_field_data_enable_2fa_expiration_time" style="<?php echo $sStyleHidden_enable_2fa_expiration_time; ?>">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enable_2fa_expiration_time"]) &&  $this->nmgp_cmp_readonly["enable_2fa_expiration_time"] == "on") { 

 ?>
<input type="hidden" name="enable_2fa_expiration_time" value="<?php echo $this->form_encode_input($enable_2fa_expiration_time) . "\">" . $enable_2fa_expiration_time . ""; ?>
<?php } else { ?>
<span id="id_read_on_enable_2fa_expiration_time" class="sc-ui-readonly-enable_2fa_expiration_time css_enable_2fa_expiration_time_line" style="<?php echo $sStyleReadLab_enable_2fa_expiration_time; ?>"><?php echo $this->form_format_readonly("enable_2fa_expiration_time", $this->form_encode_input($this->enable_2fa_expiration_time)); ?></span><span id="id_read_off_enable_2fa_expiration_time" class="css_read_off_enable_2fa_expiration_time<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_enable_2fa_expiration_time; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_enable_2fa_expiration_time_obj css_enable_2fa_expiration_time_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_enable_2fa_expiration_time" type=text name="enable_2fa_expiration_time" value="<?php echo $this->form_encode_input($enable_2fa_expiration_time) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['enable_2fa_expiration_time']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['enable_2fa_expiration_time']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['enable_2fa_expiration_time']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
<span class="css_enable_2fa_expiration_time_label scFormDataHelpOdd">&nbsp;<?php echo $this->Ini->Nm_lang['lang_sec_seconds'] ?>
</span></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['ok']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['ok']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['ok']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['ok']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['ok'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bok", "scBtnFn_sys_format_ok()", "scBtnFn_sys_format_ok()", "sub_form_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
?>
       
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
    if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("app_settings");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("app_settings");
 parent.scAjaxDetailHeight("app_settings", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("app_settings", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("app_settings", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-1").length && $("#sub_form_b.sc-unique-btn-1").is(":visible")) {
		    if ($("#sub_form_b.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
		    if ($("#sc_b_hlp_b").hasClass("disabled")) {
		        return;
		    }
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#Bsair_b.sc-unique-btn-2").length && $("#Bsair_b.sc-unique-btn-2").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-3").length && $("#Bsair_b.sc-unique-btn-3").is(":visible")) {
		    if ($("#Bsair_b.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_saida_glo(); return false;
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['app_settings']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
