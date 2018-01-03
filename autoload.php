<?php

require_once "config.php";

function carregaClasse($class){
   $caminhosArquivos = ['../classes/'.$class.'.php',
                         'classes/'.$class.'.php',
                         '../login/classes/'.$class.'.php',
                         'login/classes/'.$class.'.php',
                         'dinheiro/classes/'.$class.'.php'];
  foreach ($caminhosArquivos as $caminho) {
      if(file_exists($caminho)){
        require_once $caminho;
      }
  }
}

spl_autoload_register('carregaClasse');