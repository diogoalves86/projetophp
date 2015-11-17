<?php 
class ManageLevel{
      const ADMIN = 1;
      const ALUNO = 2;
      const PROFESSOR = 3;
      
      private $niveisUsuario;

      public static function getLevel($nivelUsuario)
      {
          $niveisUsuario['ADMIN']          = 1;
          $niveisUsuario['ALUNO']          = 2;
          $niveisUsuario['PROFESSOR']          = 3;
          return isset($niveisUsuario[$nivelUsuario]) ? $niveisUsuario[$nivelUsuario] : null;
      }
}