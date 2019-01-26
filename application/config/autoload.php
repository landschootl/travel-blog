<?php

/**
 * the auto-loading function, which will be called every time a file "is missing"
 * NOTE: don't get confused, this is not "__autoload", the now deprecated function
 * The PHP Framework Interoperability Group (@see https://github.com/php-fig/fig-standards) recommends using a
 * standardized auto-loader https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md, so we do:
 */
function autoload($className) {
    // if file does not exist in LIBS_PATH folder [set it in config/config.php]
    if (file_exists(LIBS_PATH . $className . ".php")) {
        require LIBS_PATH . $className . ".php";
    } else {
        $pp="./application/modele/";
        if(strpos($className,"PDO")===0) {
        include "$pp/model/base/db/pdo/$className.class.php";
        return;
        }
        if(strpos($className,"Adapter")!==false) {
            include "$pp/model/base/db/$className.class.php";
            return;
        }

        if($className=="Table") {
            include "$pp/model/base/tables/Table.class.php";
            return;
        }
    
        if($className=="Query") {
            include "$pp/model/base/queries/Query.class.php";
            return;
        }
    
        if(strpos($className,"SQL")!==false) {
            include "$pp/model/mymodel/queries/$className.class.php";
            return;
        }

        include "$pp/model/mymodel/tables/$className.class.php";
    }
}

// spl_autoload_register defines the function that is called every time a file is missing. as we created this
// function above, every time a file is needed, autoload(THENEEDEDCLASS) is called
spl_autoload_register("autoload");
