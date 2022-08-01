<?php
class pdfreport_reporte_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $pagos = array();
   var $cuotas = array();
   var $clave = array();
   var $fecha = array();
   var $nombre = array();
   var $ncedula = array();
   var $ncuenta = array();
   var $valor = array();
   var $tiempo = array();
   var $aprovacion1 = array();
   var $aprovacion2 = array();
   var $tipo = array();
   var $departamento = array();
   var $status = array();
   var $look_aprovacion1 = array();
   var $look_aprovacion2 = array();
   var $look_tipo = array();
   var $look_status = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("es");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "A4";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_reporte']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_reporte", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "off";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->clave[0] = $Busca_temp['clave']; 
       $tmp_pos = strpos($this->clave[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->clave[0]))
       {
           $this->clave[0] = substr($this->clave[0], 0, $tmp_pos);
       }
       $this->fecha[0] = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->fecha[0]))
       {
           $this->fecha[0] = substr($this->fecha[0], 0, $tmp_pos);
       }
       $fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->nombre[0] = $Busca_temp['nombre']; 
       $tmp_pos = strpos($this->nombre[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->nombre[0]))
       {
           $this->nombre[0] = substr($this->nombre[0], 0, $tmp_pos);
       }
       $this->ncedula[0] = $Busca_temp['ncedula']; 
       $tmp_pos = strpos($this->ncedula[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->ncedula[0]))
       {
           $this->ncedula[0] = substr($this->ncedula[0], 0, $tmp_pos);
       }
       $this->status[0] = $Busca_temp['status']; 
       $tmp_pos = strpos($this->status[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->status[0]))
       {
           $this->status[0] = substr($this->status[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->fecha_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_reporte']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_reporte']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_reporte']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_reporte']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_orig'] = " where clave=" . $_SESSION['par'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT clave, fecha, nombre, ncedula, ncuenta, valor, tiempo, aprovacion1, aprovacion2, tipo, departamento, STATUS from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT clave, fecha, nombre, ncedula, ncuenta, valor, tiempo, aprovacion1, aprovacion2, tipo, departamento, STATUS from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT clave, fecha, nombre, ncedula, ncuenta, valor, tiempo, aprovacion1, aprovacion2, tipo, departamento, STATUS from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__Mesa de trabajo 1.png", "1", "1", "210", "297", '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_reporte']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_reporte']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_reporte']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->Text(0.000000, 0.000000, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->clave[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->clave[$this->nm_grid_colunas] = (string)$this->clave[$this->nm_grid_colunas];
          $this->fecha[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->nombre[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->ncedula[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->ncuenta[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->valor[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->valor[$this->nm_grid_colunas] =  str_replace(",", ".", $this->valor[$this->nm_grid_colunas]);
          $this->valor[$this->nm_grid_colunas] = (strpos(strtolower($this->valor[$this->nm_grid_colunas]), "e")) ? (float)$this->valor[$this->nm_grid_colunas] : $this->valor[$this->nm_grid_colunas]; 
          $this->valor[$this->nm_grid_colunas] = (string)$this->valor[$this->nm_grid_colunas];
          $this->tiempo[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->tiempo[$this->nm_grid_colunas] = (string)$this->tiempo[$this->nm_grid_colunas];
          $this->aprovacion1[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->aprovacion1[$this->nm_grid_colunas] = (string)$this->aprovacion1[$this->nm_grid_colunas];
          $this->aprovacion2[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->aprovacion2[$this->nm_grid_colunas] = (string)$this->aprovacion2[$this->nm_grid_colunas];
          $this->tipo[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->tipo[$this->nm_grid_colunas] = (string)$this->tipo[$this->nm_grid_colunas];
          $this->departamento[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->status[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->status[$this->nm_grid_colunas] = (string)$this->status[$this->nm_grid_colunas];
          $this->look_aprovacion1[$this->nm_grid_colunas] = $this->aprovacion1[$this->nm_grid_colunas]; 
   $this->Lookup->lookup_aprovacion1($this->look_aprovacion1[$this->nm_grid_colunas]); 
          $this->look_aprovacion2[$this->nm_grid_colunas] = $this->aprovacion2[$this->nm_grid_colunas]; 
   $this->Lookup->lookup_aprovacion2($this->look_aprovacion2[$this->nm_grid_colunas]); 
          $this->look_tipo[$this->nm_grid_colunas] = $this->tipo[$this->nm_grid_colunas]; 
   $this->Lookup->lookup_tipo($this->look_tipo[$this->nm_grid_colunas]); 
          $this->look_status[$this->nm_grid_colunas] = $this->status[$this->nm_grid_colunas]; 
   $this->Lookup->lookup_status($this->look_status[$this->nm_grid_colunas]); 
          $this->pagos[$this->nm_grid_colunas] = "";
          $this->cuotas[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['pdfreport_reporte']['contr_erro'] = 'on';
  $this->calcular();
$_SESSION['scriptcase']['pdfreport_reporte']['contr_erro'] = 'off';
          $this->clave[$this->nm_grid_colunas] = sc_strip_script($this->clave[$this->nm_grid_colunas]);
          if ($this->clave[$this->nm_grid_colunas] === "") 
          { 
              $this->clave[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              $this->clave[$this->nm_grid_colunas] = str_replace($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_reporte']['decimal_db'], "", $this->clave[$this->nm_grid_colunas]); 
              $this->nm_gera_mask($this->clave[$this->nm_grid_colunas], "xxxxxx"); 
          } 
          $this->clave[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->clave[$this->nm_grid_colunas]);
          $this->fecha[$this->nm_grid_colunas] = sc_strip_script($this->fecha[$this->nm_grid_colunas]);
          if ($this->fecha[$this->nm_grid_colunas] === "") 
          { 
              $this->fecha[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->fecha[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->fecha[$this->nm_grid_colunas] = substr($this->fecha[$this->nm_grid_colunas], 0, 10) . " " . substr($this->fecha[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->fecha[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->fecha[$this->nm_grid_colunas] = substr($this->fecha[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->fecha[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->fecha[$this->nm_grid_colunas], 17);
               } 
               $fecha_x =  $this->fecha[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecha_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($fecha_x) && strlen($fecha_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fecha[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->fecha[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecha[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecha[$this->nm_grid_colunas]);
          $this->nombre[$this->nm_grid_colunas] = sc_strip_script($this->nombre[$this->nm_grid_colunas]);
          if ($this->nombre[$this->nm_grid_colunas] === "") 
          { 
              $this->nombre[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nombre[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nombre[$this->nm_grid_colunas]);
          $this->ncedula[$this->nm_grid_colunas] = sc_strip_script($this->ncedula[$this->nm_grid_colunas]);
          if ($this->ncedula[$this->nm_grid_colunas] === "") 
          { 
              $this->ncedula[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ncedula[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ncedula[$this->nm_grid_colunas]);
          $this->ncuenta[$this->nm_grid_colunas] = sc_strip_script($this->ncuenta[$this->nm_grid_colunas]);
          if ($this->ncuenta[$this->nm_grid_colunas] === "") 
          { 
              $this->ncuenta[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ncuenta[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ncuenta[$this->nm_grid_colunas]);
          $this->valor[$this->nm_grid_colunas] = sc_strip_script($this->valor[$this->nm_grid_colunas]);
          if ($this->valor[$this->nm_grid_colunas] === "") 
          { 
              $this->valor[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->valor[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->valor[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valor[$this->nm_grid_colunas]);
          $this->tiempo[$this->nm_grid_colunas] = sc_strip_script($this->tiempo[$this->nm_grid_colunas]);
          if ($this->tiempo[$this->nm_grid_colunas] === "") 
          { 
              $this->tiempo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tiempo[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->tiempo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tiempo[$this->nm_grid_colunas]);
          $this->aprovacion1[$this->nm_grid_colunas] = trim(sc_strip_script($this->look_aprovacion1[$this->nm_grid_colunas])); 
          if ($this->aprovacion1[$this->nm_grid_colunas] === "") 
          { 
              $this->aprovacion1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->aprovacion1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->aprovacion1[$this->nm_grid_colunas]);
          $this->aprovacion2[$this->nm_grid_colunas] = trim(sc_strip_script($this->look_aprovacion2[$this->nm_grid_colunas])); 
          if ($this->aprovacion2[$this->nm_grid_colunas] === "") 
          { 
              $this->aprovacion2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->aprovacion2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->aprovacion2[$this->nm_grid_colunas]);
          $this->tipo[$this->nm_grid_colunas] = trim(sc_strip_script($this->look_tipo[$this->nm_grid_colunas])); 
          if ($this->tipo[$this->nm_grid_colunas] === "") 
          { 
              $this->tipo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tipo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tipo[$this->nm_grid_colunas]);
          $this->departamento[$this->nm_grid_colunas] = sc_strip_script($this->departamento[$this->nm_grid_colunas]);
          if ($this->departamento[$this->nm_grid_colunas] === "") 
          { 
              $this->departamento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->departamento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->departamento[$this->nm_grid_colunas]);
          $this->status[$this->nm_grid_colunas] = trim(sc_strip_script($this->look_status[$this->nm_grid_colunas])); 
          if ($this->status[$this->nm_grid_colunas] === "") 
          { 
              $this->status[$this->nm_grid_colunas] = "" ;  
          } 
          $this->status[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->status[$this->nm_grid_colunas]);
          if ($this->pagos[$this->nm_grid_colunas] === "") 
          { 
              $this->pagos[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pagos[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pagos[$this->nm_grid_colunas]);
          if ($this->cuotas[$this->nm_grid_colunas] === "") 
          { 
              $this->cuotas[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->cuotas[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->cuotas[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cuotas[$this->nm_grid_colunas]);
            $cell_clave = array('posx' => '157.9033333333134', 'posy' => '21.11374999999734', 'data' => $this->clave[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fecha = array('posx' => '57.890833333326036', 'posy' => '54.92300208332641', 'data' => $this->fecha[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nombre = array('posx' => '57.890833333326036', 'posy' => '50.372168749993655', 'data' => $this->nombre[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ncedula = array('posx' => '57.890833333326036', 'posy' => '60.37341874999239', 'data' => $this->ncedula[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ncuenta = array('posx' => '57.890833333326036', 'posy' => '70.90383541665773', 'data' => $this->ncuenta[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_valor = array('posx' => '171.92624999997832', 'posy' => '51.267518749993535', 'data' => $this->valor[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tiempo = array('posx' => '172.19083333331162', 'posy' => '59.945852083325775', 'data' => $this->tiempo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_aprovacion1 = array('posx' => '126.94708333331731', 'posy' => '151.4387687499809', 'data' => $this->aprovacion1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_aprovacion2 = array('posx' => '125.88874999998413', 'posy' => '214.08760416663966', 'data' => $this->aprovacion2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tipo = array('posx' => '19.261666666664237', 'posy' => '115.87427083331872', 'data' => $this->tipo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_STATUS = array('posx' => '17.938749999997736', 'posy' => '199.11218749997488', 'data' => $this->status[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_departamento = array('posx' => '57.9437499999927', 'posy' => '65.8812499999917', 'data' => $this->departamento[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pagos = array('posx' => '19.314583333330898', 'posy' => '124.35416666665098', 'data' => $this->SC_conv_utf8('Cuotas a pagar'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cuotas = array('posx' => '47.624999999993996', 'posy' => '124.8833333333176', 'data' => $this->cuotas[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_clave['font_type'], $cell_clave['font_style'], $cell_clave['font_size']);
            $this->pdf_text_color($cell_clave['data'], $cell_clave['color_r'], $cell_clave['color_g'], $cell_clave['color_b']);
            if (!empty($cell_clave['posx']) && !empty($cell_clave['posy']))
            {
                $this->Pdf->SetXY($cell_clave['posx'], $cell_clave['posy']);
            }
            elseif (!empty($cell_clave['posx']))
            {
                $this->Pdf->SetX($cell_clave['posx']);
            }
            elseif (!empty($cell_clave['posy']))
            {
                $this->Pdf->SetY($cell_clave['posy']);
            }
            $this->Pdf->Cell($cell_clave['width'], 0, $cell_clave['data'], 0, 0, $cell_clave['align']);

            $this->Pdf->SetFont($cell_fecha['font_type'], $cell_fecha['font_style'], $cell_fecha['font_size']);
            $this->pdf_text_color($cell_fecha['data'], $cell_fecha['color_r'], $cell_fecha['color_g'], $cell_fecha['color_b']);
            if (!empty($cell_fecha['posx']) && !empty($cell_fecha['posy']))
            {
                $this->Pdf->SetXY($cell_fecha['posx'], $cell_fecha['posy']);
            }
            elseif (!empty($cell_fecha['posx']))
            {
                $this->Pdf->SetX($cell_fecha['posx']);
            }
            elseif (!empty($cell_fecha['posy']))
            {
                $this->Pdf->SetY($cell_fecha['posy']);
            }
            $this->Pdf->Cell($cell_fecha['width'], 0, $cell_fecha['data'], 0, 0, $cell_fecha['align']);

            $this->Pdf->SetFont($cell_nombre['font_type'], $cell_nombre['font_style'], $cell_nombre['font_size']);
            $this->pdf_text_color($cell_nombre['data'], $cell_nombre['color_r'], $cell_nombre['color_g'], $cell_nombre['color_b']);
            if (!empty($cell_nombre['posx']) && !empty($cell_nombre['posy']))
            {
                $this->Pdf->SetXY($cell_nombre['posx'], $cell_nombre['posy']);
            }
            elseif (!empty($cell_nombre['posx']))
            {
                $this->Pdf->SetX($cell_nombre['posx']);
            }
            elseif (!empty($cell_nombre['posy']))
            {
                $this->Pdf->SetY($cell_nombre['posy']);
            }
            $this->Pdf->Cell($cell_nombre['width'], 0, $cell_nombre['data'], 0, 0, $cell_nombre['align']);

            $this->Pdf->SetFont($cell_ncedula['font_type'], $cell_ncedula['font_style'], $cell_ncedula['font_size']);
            $this->pdf_text_color($cell_ncedula['data'], $cell_ncedula['color_r'], $cell_ncedula['color_g'], $cell_ncedula['color_b']);
            if (!empty($cell_ncedula['posx']) && !empty($cell_ncedula['posy']))
            {
                $this->Pdf->SetXY($cell_ncedula['posx'], $cell_ncedula['posy']);
            }
            elseif (!empty($cell_ncedula['posx']))
            {
                $this->Pdf->SetX($cell_ncedula['posx']);
            }
            elseif (!empty($cell_ncedula['posy']))
            {
                $this->Pdf->SetY($cell_ncedula['posy']);
            }
            $this->Pdf->Cell($cell_ncedula['width'], 0, $cell_ncedula['data'], 0, 0, $cell_ncedula['align']);

            $this->Pdf->SetFont($cell_ncuenta['font_type'], $cell_ncuenta['font_style'], $cell_ncuenta['font_size']);
            $this->pdf_text_color($cell_ncuenta['data'], $cell_ncuenta['color_r'], $cell_ncuenta['color_g'], $cell_ncuenta['color_b']);
            if (!empty($cell_ncuenta['posx']) && !empty($cell_ncuenta['posy']))
            {
                $this->Pdf->SetXY($cell_ncuenta['posx'], $cell_ncuenta['posy']);
            }
            elseif (!empty($cell_ncuenta['posx']))
            {
                $this->Pdf->SetX($cell_ncuenta['posx']);
            }
            elseif (!empty($cell_ncuenta['posy']))
            {
                $this->Pdf->SetY($cell_ncuenta['posy']);
            }
            $this->Pdf->Cell($cell_ncuenta['width'], 0, $cell_ncuenta['data'], 0, 0, $cell_ncuenta['align']);

            $this->Pdf->SetFont($cell_valor['font_type'], $cell_valor['font_style'], $cell_valor['font_size']);
            $this->pdf_text_color($cell_valor['data'], $cell_valor['color_r'], $cell_valor['color_g'], $cell_valor['color_b']);
            if (!empty($cell_valor['posx']) && !empty($cell_valor['posy']))
            {
                $this->Pdf->SetXY($cell_valor['posx'], $cell_valor['posy']);
            }
            elseif (!empty($cell_valor['posx']))
            {
                $this->Pdf->SetX($cell_valor['posx']);
            }
            elseif (!empty($cell_valor['posy']))
            {
                $this->Pdf->SetY($cell_valor['posy']);
            }
            $this->Pdf->Cell($cell_valor['width'], 0, $cell_valor['data'], 0, 0, $cell_valor['align']);

            $this->Pdf->SetFont($cell_tiempo['font_type'], $cell_tiempo['font_style'], $cell_tiempo['font_size']);
            $this->pdf_text_color($cell_tiempo['data'], $cell_tiempo['color_r'], $cell_tiempo['color_g'], $cell_tiempo['color_b']);
            if (!empty($cell_tiempo['posx']) && !empty($cell_tiempo['posy']))
            {
                $this->Pdf->SetXY($cell_tiempo['posx'], $cell_tiempo['posy']);
            }
            elseif (!empty($cell_tiempo['posx']))
            {
                $this->Pdf->SetX($cell_tiempo['posx']);
            }
            elseif (!empty($cell_tiempo['posy']))
            {
                $this->Pdf->SetY($cell_tiempo['posy']);
            }
            $this->Pdf->Cell($cell_tiempo['width'], 0, $cell_tiempo['data'], 0, 0, $cell_tiempo['align']);

            $this->Pdf->SetFont($cell_aprovacion1['font_type'], $cell_aprovacion1['font_style'], $cell_aprovacion1['font_size']);
            $this->pdf_text_color($cell_aprovacion1['data'], $cell_aprovacion1['color_r'], $cell_aprovacion1['color_g'], $cell_aprovacion1['color_b']);
            if (!empty($cell_aprovacion1['posx']) && !empty($cell_aprovacion1['posy']))
            {
                $this->Pdf->SetXY($cell_aprovacion1['posx'], $cell_aprovacion1['posy']);
            }
            elseif (!empty($cell_aprovacion1['posx']))
            {
                $this->Pdf->SetX($cell_aprovacion1['posx']);
            }
            elseif (!empty($cell_aprovacion1['posy']))
            {
                $this->Pdf->SetY($cell_aprovacion1['posy']);
            }
            $this->Pdf->Cell($cell_aprovacion1['width'], 0, $cell_aprovacion1['data'], 0, 0, $cell_aprovacion1['align']);

            $this->Pdf->SetFont($cell_aprovacion2['font_type'], $cell_aprovacion2['font_style'], $cell_aprovacion2['font_size']);
            $this->pdf_text_color($cell_aprovacion2['data'], $cell_aprovacion2['color_r'], $cell_aprovacion2['color_g'], $cell_aprovacion2['color_b']);
            if (!empty($cell_aprovacion2['posx']) && !empty($cell_aprovacion2['posy']))
            {
                $this->Pdf->SetXY($cell_aprovacion2['posx'], $cell_aprovacion2['posy']);
            }
            elseif (!empty($cell_aprovacion2['posx']))
            {
                $this->Pdf->SetX($cell_aprovacion2['posx']);
            }
            elseif (!empty($cell_aprovacion2['posy']))
            {
                $this->Pdf->SetY($cell_aprovacion2['posy']);
            }
            $this->Pdf->Cell($cell_aprovacion2['width'], 0, $cell_aprovacion2['data'], 0, 0, $cell_aprovacion2['align']);

            $this->Pdf->SetFont($cell_tipo['font_type'], $cell_tipo['font_style'], $cell_tipo['font_size']);
            $this->pdf_text_color($cell_tipo['data'], $cell_tipo['color_r'], $cell_tipo['color_g'], $cell_tipo['color_b']);
            if (!empty($cell_tipo['posx']) && !empty($cell_tipo['posy']))
            {
                $this->Pdf->SetXY($cell_tipo['posx'], $cell_tipo['posy']);
            }
            elseif (!empty($cell_tipo['posx']))
            {
                $this->Pdf->SetX($cell_tipo['posx']);
            }
            elseif (!empty($cell_tipo['posy']))
            {
                $this->Pdf->SetY($cell_tipo['posy']);
            }
            $this->Pdf->Cell($cell_tipo['width'], 0, $cell_tipo['data'], 0, 0, $cell_tipo['align']);

            $this->Pdf->SetFont($cell_STATUS['font_type'], $cell_STATUS['font_style'], $cell_STATUS['font_size']);
            $this->pdf_text_color($cell_STATUS['data'], $cell_STATUS['color_r'], $cell_STATUS['color_g'], $cell_STATUS['color_b']);
            if (!empty($cell_STATUS['posx']) && !empty($cell_STATUS['posy']))
            {
                $this->Pdf->SetXY($cell_STATUS['posx'], $cell_STATUS['posy']);
            }
            elseif (!empty($cell_STATUS['posx']))
            {
                $this->Pdf->SetX($cell_STATUS['posx']);
            }
            elseif (!empty($cell_STATUS['posy']))
            {
                $this->Pdf->SetY($cell_STATUS['posy']);
            }
            $this->Pdf->Cell($cell_STATUS['width'], 0, $cell_STATUS['data'], 0, 0, $cell_STATUS['align']);

            $this->Pdf->SetFont($cell_departamento['font_type'], $cell_departamento['font_style'], $cell_departamento['font_size']);
            $this->pdf_text_color($cell_departamento['data'], $cell_departamento['color_r'], $cell_departamento['color_g'], $cell_departamento['color_b']);
            if (!empty($cell_departamento['posx']) && !empty($cell_departamento['posy']))
            {
                $this->Pdf->SetXY($cell_departamento['posx'], $cell_departamento['posy']);
            }
            elseif (!empty($cell_departamento['posx']))
            {
                $this->Pdf->SetX($cell_departamento['posx']);
            }
            elseif (!empty($cell_departamento['posy']))
            {
                $this->Pdf->SetY($cell_departamento['posy']);
            }
            $this->Pdf->Cell($cell_departamento['width'], 0, $cell_departamento['data'], 0, 0, $cell_departamento['align']);

            $this->Pdf->SetFont($cell_pagos['font_type'], $cell_pagos['font_style'], $cell_pagos['font_size']);
            $this->pdf_text_color($cell_pagos['data'], $cell_pagos['color_r'], $cell_pagos['color_g'], $cell_pagos['color_b']);
            if (!empty($cell_pagos['posx']) && !empty($cell_pagos['posy']))
            {
                $this->Pdf->SetXY($cell_pagos['posx'], $cell_pagos['posy']);
            }
            elseif (!empty($cell_pagos['posx']))
            {
                $this->Pdf->SetX($cell_pagos['posx']);
            }
            elseif (!empty($cell_pagos['posy']))
            {
                $this->Pdf->SetY($cell_pagos['posy']);
            }
            $this->Pdf->Cell($cell_pagos['width'], 0, $cell_pagos['data'], 0, 0, $cell_pagos['align']);

            $this->Pdf->SetFont($cell_cuotas['font_type'], $cell_cuotas['font_style'], $cell_cuotas['font_size']);
            $this->pdf_text_color($cell_cuotas['data'], $cell_cuotas['color_r'], $cell_cuotas['color_g'], $cell_cuotas['color_b']);
            if (!empty($cell_cuotas['posx']) && !empty($cell_cuotas['posy']))
            {
                $this->Pdf->SetXY($cell_cuotas['posx'], $cell_cuotas['posy']);
            }
            elseif (!empty($cell_cuotas['posx']))
            {
                $this->Pdf->SetX($cell_cuotas['posx']);
            }
            elseif (!empty($cell_cuotas['posy']))
            {
                $this->Pdf->SetY($cell_cuotas['posy']);
            }
            $this->Pdf->Cell($cell_cuotas['width'], 0, $cell_cuotas['data'], 0, 0, $cell_cuotas['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
 }
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
function calcular()
{
$_SESSION['scriptcase']['pdfreport_reporte']['contr_erro'] = 'on';
  
$this->cuotas[$this->nm_grid_colunas] =$this->valor[$this->nm_grid_colunas] /$this->tiempo[$this->nm_grid_colunas] ;

$_SESSION['scriptcase']['pdfreport_reporte']['contr_erro'] = 'off';
}
}
?>
