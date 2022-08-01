<?php
class lista_autorizaciones_lookup
{
//  
   function lookup_aprovacion1(&$aprovacion1) 
   {
      $conteudo = "" ; 
      if ($aprovacion1 == "1")
      { 
          $conteudo = "Aprobado";
      } 
      if ($aprovacion1 == "0")
      { 
          $conteudo = "Rechazado";
      } 
      if (!empty($conteudo)) 
      { 
          $aprovacion1 = $conteudo; 
      } 
   }  
//  
   function lookup_aprovacion2(&$aprovacion2) 
   {
      $conteudo = "" ; 
      if ($aprovacion2 == "1")
      { 
          $conteudo = "Aprobado";
      } 
      if ($aprovacion2 == "0")
      { 
          $conteudo = "Rechazado ";
      } 
      if (!empty($conteudo)) 
      { 
          $aprovacion2 = $conteudo; 
      } 
   }  
}
?>
