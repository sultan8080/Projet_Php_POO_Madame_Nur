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
  function upload_img($imageName , $path){
      $image1 = $_FILES[$imageName]['name']; 
      $expimage1=explode('.',$image1);
      $expimagetype=$expimage1[1];
      date_default_timezone_set('Australia/Melbourne');
      $date = date('m/d/Yh:i:sa', time());
      $rand=rand(10000,99999);
      $encname=$date.$rand;
      $image1=md5($encname).'.jpg';
      $bannerpath=$path.$image1;
      move_uploaded_file($_FILES[$imageName]["tmp_name"],$bannerpath);
      return $image1;
  }

 function data_security($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
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
