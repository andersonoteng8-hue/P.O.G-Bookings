<?php
$data = json_decode(file_get_contents("php://input"), true);
if(!$data){ exit; }

$dir = __DIR__ . "/data";
if(!file_exists($dir)){ mkdir($dir,0777,true); }

$file = $dir . "/records.json";
$existing = [];

if(file_exists($file)){
  $existing = json_decode(file_get_contents($file), true) ?: [];
}

$existing[] = $data;
file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT));
echo json_encode(["success"=>true]);
