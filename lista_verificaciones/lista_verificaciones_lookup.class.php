<?php
class lista_verificaciones_lookup
{
//  
   function lookup_persona(&$conteudo , $persona) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $persona; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT login + ' : ' + name + '  ' + apellido  FROM sec_users where login = '" . substr($this->Db->qstr($persona), 1 , -1) . "' order by login" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(login, ' : ', name, '  ', apellido)  FROM sec_users where login = '" . substr($this->Db->qstr($persona), 1 , -1) . "' order by login" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT login&' : '&name&'  '&apellido  FROM sec_users where login = '" . substr($this->Db->qstr($persona), 1 , -1) . "' order by login" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT login||' : '||name||'  '||apellido  FROM sec_users where login = '" . substr($this->Db->qstr($persona), 1 , -1) . "' order by login" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT login||' : '||name||'  '||apellido  FROM sec_users where login = '" . substr($this->Db->qstr($persona), 1 , -1) . "' order by login" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_aprovacion1(&$aprovacion1) 
   {
      $conteudo = "" ; 
      if ($aprovacion1 == "1")
      { 
          $conteudo = "Aprobada";
      } 
      if ($aprovacion1 == "0")
      { 
          $conteudo = "Rechazada";
      } 
      if (!empty($conteudo)) 
      { 
          $aprovacion1 = $conteudo; 
      } 
   }  
}
?>
