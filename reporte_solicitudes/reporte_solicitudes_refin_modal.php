<?php
   include_once('reporte_solicitudes_session.php');
   session_start();
   if (!isset($_SESSION['sc_session']))
   {
?>
   <html>
    <body>
     <form name="F0" method=post
           target="_parent"
           action="./">
     </form>
     <script type="text/javascript">
        self.parent.tb_remove();
        document.F0.submit();
     </script>
    </body>
   </html>
<?php
     exit;
   }
   $proc_modal = new refin_search_modal();
   $proc_modal->init_modal();
/*------------------------------------------------------------------------------------*/
class refin_search_modal
{
   function init_modal()
   {
       global $_GET;
       $this->sc_init = (isset($_GET['sc_init']))   ? $_GET['sc_init']   : "1";
       $cmp_process   = (isset($_GET['cmp_modal'])) ? $_GET['cmp_modal'] : "";
       $tp_obj        = (isset($_GET['tp_obj']))    ? $_GET['tp_obj']    : "tx";
       $label_cmp     = $_SESSION['sc_session'][$this->sc_init]['reporte_solicitudes']['int_search_label'][$cmp_process];
       $lim_col       = 3;
       $qtd_col       = 0;
       include_once ("../_lib/lang/" . $_SESSION['scriptcase']['str_lang'] . ".lang.php");
       $this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Lemon/Sc9_Lemon";
   include("../_lib/css/" . $this->str_schema_all . "_grid.php");
   $NM_dir_atual = getcwd();
   if (empty($NM_dir_atual))
   {
       $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
       $str_path_sys          = str_replace("\\", '/', $str_path_sys);
   }
   else
   {
       $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
       $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
   }
   $str_path_web   = $_SERVER['PHP_SELF'];
   $str_path_web   = str_replace("\\", '/', $str_path_web);
   $str_path_web   = str_replace('//', '/', $str_path_web);
   $str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
   $path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
   $path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
   $path_btn       = $str_root . $path_link . "_lib/buttons/";
   $Str_btn_grid = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
   include("../_lib/buttons/" . $Str_btn_grid);
   ini_set('default_charset', $_SESSION['scriptcase']['charset']);
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   if (!function_exists("nmButtonOutput"))
   {
       include_once("../_lib/lib/php/nm_gp_config_btn.php");
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <HEAD>
  <TITLE></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup'] ?>" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['sc_session']['path_third'] ?>/font-awesome/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
 </HEAD>
 <body class="scGridPage">
<?php
       $Cod_Btn_Apply = nmButtonOutput($this->arr_buttons, "bfilref_apply", "nm_proc_int_search_check()", "nm_proc_int_search_check()", "app_int_search_all", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
       $bol_submit_onclick = false;
           $Cod_Btn_Cancel = nmButtonOutput($this->arr_buttons, "bfilref_limpar", "$('input[name=\'result[]\']').prop('checked', false); parent.$('input[name=\'int_search_{$cmp_process}[]\']').prop('checked', false);", "$('input[name=\'result[]\']').prop('checked', false); parent.$('input[name=\'int_search_{$cmp_process}[]\']').prop('checked', false);", "app_int_search_all_cancel", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $Cod_Btn_Close = nmButtonOutput($this->arr_buttons, "bfilref_close", "self.parent.tb_remove();", "self.parent.tb_remove();", "app_int_search_all_close", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $arr_field = $_SESSION['sc_session'][$this->sc_init]['reporte_solicitudes']['int_search_dados'][$cmp_process]; 
?>
    <div class="scGridRefinedSearchMoldura">
        <div>
            <div class="scGridRefinedSearchLabel">
                <?php echo $label_cmp ?>
                <br />
                <br />
                <input type="text" id="search" placeholder="<?php echo sprintf($this->Nm_lang['lang_srch_impt_placeholder'], $label_cmp); ?>" size=36 value='' onkeyup="int_search_sel_opcs('result[]');"> <i class="fas fa-times" style="cursor:pointer;" onclick="$('#search').val('');int_search_sel_opcs('result[]');"></i>
            </div>
            <div class="scGridRefinedSearchMolduraResult scGridRefinedSearchCampo" style="overflow-y: scroll;">
                <div style="display: flex; flex-flow: row wrap;">
                    <?php
                    foreach ($arr_field as $cada_opc => $dados_opc)
                    {
                        $descr = $dados_opc['val'] . " (" . $dados_opc['qtd'] . ")";
                        $checked = (isset($_SESSION['sc_session'][$this->sc_init]['reporte_solicitudes']['interativ_search'][$cmp_process]['val_sel']) && in_array($cada_opc, $_SESSION['sc_session'][$this->sc_init]['reporte_solicitudes']['interativ_search'][$cmp_process]['val_sel'])) ? " checked" : "";
                        $evt  = "";
                        if($bol_submit_onclick)
                        {
                            $evt = "parent.nm_proc_int_search('link','" . $tp_obj . "','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $label_cmp) . "','" . $cmp_process . "', int_search_get_checkbox('result_". md5($cada_opc) ."', ''), '" . $cmp_process . "', '');";
                        }
                        ?>
                        <div class="scGridRefinedSearchCampoFont">
                            <input type="checkbox" onclick="<?php echo $evt ?>" id='result_<?php echo md5($cada_opc) ?>' name="result[]" value="<?php echo $cada_opc ?>##@@<?php echo $dados_opc['val']; ?>" <?php echo $checked ?>> <label id="id_result_<?php echo md5($cada_opc) ?>" for="result_<?php echo md5($cada_opc) ?>"><?php echo $descr ?></label>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="scGridRefinedSearchToolbar" style="text-align: center;">
                <span id="id_check" style="position: absolute; left: +40px;">
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick="refinedSearchCheckUncheckAllModal('<?php echo $cmp_process; ?>', true); this.checked=true;" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick="refinedSearchCheckUncheckAllModal('<?php echo $cmp_process; ?>', false); this.checked=false;" \>
                </span>
                <?php echo $Cod_Btn_Apply; ?> <?php echo $Cod_Btn_Cancel; ?> <?php echo $Cod_Btn_Close; ?>
            </div>
        </div>
    </div>
 </body>
</HTML>
<script type="text/javascript">

$( document ).ready(function() {
    setTimeout("fixWindowSize();", 50);
});

    function fixWindowSize()
    {
        if(3 > 0 && <?php echo (count($arr_field) >= 4)?'true':'false' ?>)
        {
            $('.scGridRefinedSearchCampoFont').css('width', 'calc(('+ $('.scGridRefinedSearchCampo').css('width') +' - '+ $('.scGridRefinedSearchCampo').css('padding-left') +' - '+ $('.scGridRefinedSearchCampo').css('padding-right') +')/3 - '+ $('.scGridRefinedSearchCampo').css('margin-left') +' - '+ $('.scGridRefinedSearchCampoFont').css('margin-left') +' - '+ $('.scGridRefinedSearchCampoFont').css('margin-right') +' - '+ $('.scGridRefinedSearchCampoFont').css('padding-right') +' - '+ $('.scGridRefinedSearchCampoFont').css('padding-left') +')');
        }
        else
        {
          var maxWidth = 0;
          $('.scGridRefinedSearchCampoFont').each(function(){
            var itemWidth = $(this).outerWidth(true);
            maxWidth = Math.max(maxWidth, itemWidth)
          });

          if(maxWidth > 0)
          {
              $('.scGridRefinedSearchCampoFont').css('width', maxWidth);
          }
        }

        $('.scGridRefinedSearchCampo').css('height', ($( window  ).height() - $( '.scGridRefinedSearchLabel'  ).outerHeight() - $( '.scGridRefinedSearchToolbar'  ).outerHeight() - $( '.scGridPage'  ).css('margin-top').replace("px", "") - $( '.scGridPage'  ).css('margin-bottom').replace("px", "")- $( '.scGridRefinedSearchCampo'  ).css('padding-top').replace("px", "")- $( '.scGridRefinedSearchCampo'  ).css('padding-bottom').replace("px", "")-4) + "px");

        $('#id_check').css('left', $('input[type=checkbox]').offset().left);
    }

    function int_search_get_checkbox(obj_id, Nobj)
    {
       if(Nobj == '')
       {
        Nobj = document.getElementById(obj_id).name;
       }
       var obj  = document.getElementsByName(Nobj);
       var val  = "";
       if (!obj.length)
       {
           if (obj.checked)
           {
               val = obj.value;
           }
           return val;
       }
       else
       {
           for (iCheck = 0; iCheck < obj.length; iCheck++)
           {
               if (obj[iCheck].checked)
               {
                   val += (val != "") ? "_VLS_" : "";
                   val += obj[iCheck].value;
               }
           }
       }
       return val;
    }

    function int_search_sel_opcs(obj_name)
    {
      $("input[name='" + obj_name + "']").each(function(){
           pos     = $('#id_' + $(this).attr('id')).html().toLowerCase().indexOf($('#search').val().toLowerCase());
           if (pos != -1) {
               $(this).parent().show();
           }
           else
           {
               $(this).parent().hide();
           }
      });
    }

    function nm_proc_int_search_check()
    {
        parent.nm_proc_int_search('link','<?php echo $tp_obj; ?>','<?php echo str_replace(array("'",'"'), array('__sasp__','__dasp__'), $label_cmp) ; ?>','<?php echo $cmp_process; ?>', int_search_get_checkbox('', 'result[]'), '<?php echo $cmp_process; ?>', '');
        self.parent.tb_remove();
    }

    function refinedSearchCheckUncheckAllModal(field_name, bol_value)
    {
        $("input[name='result[]']").prop('checked', bol_value);
    }

    setTimeout("fixWindowSize();", 50);
</script>
<?php
   }
 }
