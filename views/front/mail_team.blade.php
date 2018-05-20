

<?php

    $url_host = 'http://'.$_SERVER['HTTP_HOST'];
    $pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
    $pattern_uri = '/' . $pattern_document_root . '(.*)$/';
    
    preg_match_all($pattern_uri, __DIR__, $matches);
    $url_path = $url_host . $matches[1][0];
    $url_path = str_replace('\\', '/', $url_path);

    
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="vi">
   @include('mail::front.head')
   <body>
      @include('mail::front.1232')
      @include('mail::front.1225')
      @include('mail::front.1226')
      @include('mail::front.1223')
      @include('mail::front.1216')
        

  
   </body>
</html>
// cái này thằng thoại đánh á nó ko có hiểu package-mail.ok để a viết php