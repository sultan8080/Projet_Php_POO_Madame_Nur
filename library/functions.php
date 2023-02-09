<?php

 function formatDate($date)
  {
    return date('F j, Y', strtotime($date));
  }

function formatImage($image){
  return "data:image/jpg;charset=utf8;base64,". base64_encode($image);
}
  
function shortText($text, $limit)
  {
    if(strlen($text) > $limit){
      return substr($text, 0 , $limit)." ...";
    }else{
      return $text;
    }
  }
 function data_security($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function title()
  {
    $path = $_SERVER['SCRIPT_FILENAME'];
    $titel = basename($path, '.php');
    $titel = str_replace('_', ' ', $titel);
    if ($titel == 'index') {
      $titel = 'home';
    } elseif ($titel == 'about') {
      $titel = 'about';
    } elseif ($titel == 'category') {
      $titel = 'category';
    } elseif ($titel == 'posts') {
      $titel = 'posts';
    } elseif ($titel == 'post') {
      $titel = 'post';
    } elseif ($titel == 'search') {
      $titel = 'search';
    } elseif ($titel == 'mention_legal') {
      $titel = 'mention_legal';
    } elseif ($titel == 'contact') {
      $titel = 'contact';
    } elseif ($titel == '404') {
      $titel = '404';
    }
    return $titel = ucfirst($titel);
  }
