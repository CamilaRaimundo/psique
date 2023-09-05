<?php
  session_start();

  if (isset($_SESSION['isAuth'])) {
      if ($_SESSION['idUser'] != -1) {
          if ($_SESSION['access_level'] == 'valor_do_access_level_profissional') {
              header("Location: URL_para_pagina_do_profissional");
              exit();
          } else { //ja tem login
            header("Location: /index");
            exit(); 
          }
      } else { //não cadastrado
        header("Location: /cadastro");
        exit(); 
      }
  }
?>