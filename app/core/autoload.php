<?php
function ClassAutoloader($className) {
    $className = trim($className, '\\');
    $classNameArray = explode('\\', $className);
    $baseDIR = __DIR__ . DIRECTORY_SEPARATOR . $classNameArray[0] . DIRECTORY_SEPARATOR;
    $className = $classNameArray[1];
    $filePath = $baseDIR . $className . ".php";

    if(file_exists($filePath)) {
        include_once($filePath);
    }else {
        echo "$className وجود ندارد";
    }
}

spl_autoload_register("classAutoloader");