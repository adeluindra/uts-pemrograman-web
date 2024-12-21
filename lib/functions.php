<?php
require_once __DIR__ . "/../vendor/autoload.php"; 

function getJSON($jsonResponse){
    $data = json_decode($jsonResponse);

    // Check if the JSON decoding was successful
    if ($data !== null) {
        // Access the values
        $success = $data->success; // true
        $message = $data->message; // "Update successful"

        // Now you can use $success and $message in your PHP code
        if ($success) {
            $val = true;
        } else {
            $val = false;
        }
    } else {
        // JSON parsing failed
        $val = "error";
    }
    return $val;
}

function base_url(){
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
    $dotenv->load();
    $base = $_ENV["BASE_URL"];
    return $base;
}

function ShowCheckBoxValue($val){
    if($val===0){
        $result = "Tidak";
    } else {
        $result = "Ya";
    }
    return $result;
}

function setTheme(){
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
    $dotenv->load();
    $theme = $_ENV["THEME"];
    return $theme;
}

function getHeader($theme_name){
    include("../themes/".$theme_name."/header.php"); 
    include("../themes/".$theme_name."/leftmenu.php"); 
    include("../themes/".$theme_name."/topnav.php");
    include("../themes/".$theme_name."/upper_block.php");
}

function getFooter($theme_name, $extra){
    include("../themes/".$theme_name."/lower_block.php"); 
    echo $extra;
    include("../themes/".$theme_name."/footer.php"); 
    
    echo '</body>
    </html>';
}
function getHeaderLogin($theme_name){
    include("themes/".$theme_name."/headerlogin.php"); 
    include("themes/".$theme_name."/leftmenulogin.php"); 
    include("themes/".$theme_name."/topnav.php");
    include("themes/".$theme_name."/upper_block.php");
}

function getFooterLogin($theme_name, $extra){
    include("themes/".$theme_name."/lower_block.php"); 
    echo $extra;
    include("themes/".$theme_name."/footerlogin.php"); 
    
    echo '</body>
    </html>';
}
function getFilename(){
    $host = $_SERVER["HTTP_HOST"];
    $uri = $_SERVER["REQUEST_URI"];
    $url = "http://".$host.$uri;
    $parsed_url = parse_url($url);

    // Get the path from the parsed URL
    $path = $parsed_url["path"];

    // Use pathinfo to extract the filename
    $file_info = pathinfo($path);

    // Get the filename
    $filename = $file_info["basename"];

    return $filename;
}
?>
