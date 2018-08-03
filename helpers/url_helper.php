<?php

// Simple page redirect
// works based off the URL root: localhost/our_app_name/create_topic.php
// example: redirect(create_topic.php)

  function redirect($page){
    header('location: '.URLROOT.'/'.$page);
  }