<?php

  $dir = "/Users/bbo/tmp/logs";

  $needle_mode = 00775;
  $mask = 07777;

  $actual_mode  = fileperms($dir);
  $current_mode = $actual_mode & $mask;

  $format = "%14s : %15b : %5o\n";

  //echo sprintf('%o', fileperms($dir)) . " - " . sprintf('%o',$current_mode) . "\n";
  echo sprintf($format, "actual_mode", $actual_mode, $actual_mode);
  echo sprintf($format, "mask", $mask, $mask);
  echo str_repeat("=", 40)."\n";
  echo sprintf($format, "current_mode", $current_mode, $current_mode);
  echo str_repeat("+", 40)."\n";
  echo sprintf($format, "needle_mode", $needle_mode, $needle_mode);
  echo str_repeat("+", 40)."\n";

  // echo "current_mode: ".$current_mode."\n";
  // echo " needle_mode: ".$needle_mode."\n";
  // echo sprintf("%s : %o\n", "actual_mode", substr($actual_mode, -4));
  // echo sprintf("%s : %o\n", "current_mode", substr($current_mode, -4));
  //echo substr(sprintf('%s : %o\n', "needle_mode", $needle_mode), -4);
  if ( $current_mode !== $needle_mode) {
    echo "Права на каталог НАДО БЫ ПОМЕНЯТЬ!\n";
  } else {
    echo "Права на каталог менять не надо\n";
  }
?>