<?php
class reporte_solicitudes_lookup
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
          $conteudo = "Rechazado";
      } 
      if (!empty($conteudo)) 
      { 
          $aprovacion2 = $conteudo; 
      } 
   }  
//  
   function lookup_status(&$status) 
   {
      $conteudo = "" ; 
      if ($status == "0")
      { 
          $conteudo = "Creado";
      } 
      if ($status == "1")
      { 
          $conteudo = "En proceso de revisión";
      } 
      if ($status == "2")
      { 
          $conteudo = "En proceso de Autorización";
      } 
      if ($status == "3")
      { 
          $conteudo = "Proceso Terminado";
      } 
      if ($status == "4")
      { 
          $conteudo = "Proceso Anulado";
      } 
      if (!empty($conteudo)) 
      { 
          $status = $conteudo; 
      } 
   }  
}
?>
