<?php
/**
 * Skytells PHP Framework --------------------------------------------------*
 * @category   Web Development ( Programming )
 * @package    Skytells PHP Framework
 * @version 1.2.2
 * @license Freeware
 * @copyright  2007-2017 Skytells, Inc. All rights reserved.
 * @license    https://www.skytells.net/us/terms  Freeware.
 * @author Dr. Hazem Ali ( fb.com/Haz4m )
 * @see The Framework's changelog to be always up to date.
 */

    $startScriptTime=microtime(TRUE);
    require_once("Misc/Settings.php");
    global $Settings;
    ini_set('zlib.output_compression_level', $Settings['GZIP_COMPRESSION_LEVEL']);
    if ($Settings['ENABLE_COMPRESSION'] == true) { if(!ob_start("ob_gzhandler")) ob_start(); }else { ob_start(); }


    define('MAINDIR',BASEPATH. '/Application/');
    define('LIB_DIR', MAINDIR . 'Library/');
    define('CL_DIR',MAINDIR . 'Library/Classes/');
    define('MVC_BS',MAINDIR . 'Library/Bases/');
    define('FN_DIR',MAINDIR . 'Library/Functions/');
    define('MD_DIR',MAINDIR . 'Library/Modules/');
    define('MDL_DIR',MAINDIR . 'Models/');
    define('VW_DIR',MAINDIR . 'Views/');
    define('LANG_DIR',MAINDIR . 'Library/Languages/');
    define('SYS_VIEWS',MAINDIR . 'Library/System/');
    define('ENGINES_DIR',MAINDIR . 'Library/Engines/');
    define('DB_ENG_DIR',MAINDIR . 'Library/Engines/Databases/');
    define('CONTROLLERS_DIR',MAINDIR . 'Controllers/');
    define('TEMPLATES_DIR',MAINDIR . 'Templates/');
    define('LIBRARIES_DIR',MAINDIR . 'Library/Libraries/');
    define('LOCAL_DIR',MAINDIR . 'Library/Local/');


    //define('TEMPLATES_DIR',MAINDIR . 'Templates/');
    $lang = array();
    if ($Settings['DEVELOPMENT_MODE'] == TRUE)
    {
      ini_set("display_errors", 1);
      error_reporting(E_ALL | E_STRICT);

    if ($Settings['INTILISENSE_DEBUGGER'] === TRUE)
    {

      if (strtolower($Settings['INTILISENSE_INTERFACE']) == 'ui') {
        require_once __DIR__ . '/Library/Vendor/autoload.php';
        $IntiliSense = new \IntiliSense\Run;
        $IntiliSense->pushHandler(new \IntiliSense\Handler\PrettyPageHandler);
        $IntiliSense->register();
      }else
      {
        require_once ( 'Library/Local/IntiliSense.php' );
          \php_error\reportErrors();
      }

    }
  }

    require_once("Library/Autoloader.php");
    require_once("Library/Functions/Core.php");
    require_once("Library/Functions/Exceptions.php");
    DefSettings();
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
    define('SITEBASE', $protocol.BASE_URL."/");
    //LoadFunctions();
    if (INTILISENSE_DEBUGGER === FALSE){
    set_error_handler(function($errno, $errstr, $errfile, $errline, array $errcontext) {
        // error was suppressed with the @-operator
        if (0 === error_reporting()) {
            return false;
        }
        $_Content = file_get_contents(SYS_VIEWS."html/debug_log.html");
        $_Content = str_replace("{MSG}", $errstr, $_Content);
        $_Content = str_replace("{ERR_LINE}", $errline, $_Content);
        $_Content = str_replace("{ERR_NO}", $errno, $_Content);
        $_Content = str_replace("{ERR_FILE}", $errfile, $_Content);

        exit($_Content);
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    });
    set_exception_handler("default_exception_handler");
  }
    global $_SESSION;
    $_SESSION["DEV_LOADED_PAGES"] = array();
    $_SESSION["DEV_LOADED_CONTROLLERS"] = array();
    $_SESSION["DEV_LOADED_ENGINES"] = array();
    $_SESSION["DEV_LOADED_MODELS"] = array();
    $_SESSION["DEV_LOADED_HELPERS"] = array();
    $_SESSION["DB_QUERIES_C"] = 0;

    global $DBCONFIG;
    static $_DB_CONNECTION_STATUS;
    static $_LOADED_CONTROLLERS = array();
    static $_DEV_LOADED_PAGES = array();
    static $_DEV_LOADED_MODELS = array();
    static $_DEV_LOADED_ENGINES = array();
    static $_DEV_LOADED_LIBRARIES = array();
    static $_DEV_LOADED_HELPERS = array();
    static $_CONSOLE_OUTPUT   = array();
    static $_FILES_AUTOLOADED = array();
    static $_FRAMEWORK_VER = "1.2.2";
    $db = ($Settings["USE_SQL"]) ? new mysqli($DBCONFIG["DB_HOST"], $DBCONFIG["DB_USER"], $DBCONFIG["DB_PASS"], $DBCONFIG["DB_NAME"]) : false;

     Autoloader(array(
            MVC_BS,
            CL_DIR,
            FN_DIR,
            MD_DIR,
            LANG_DIR,
            DB_ENG_DIR,
            MDL_DIR,
            CONTROLLERS_DIR), false);

      // For Debugging, We can print the output.
      $_AUTOLOADED = Autoloader();
      // print array of class autoload paths:
      //  print_r($_AUTOLOADED);

      // -----------------------------------

    $Core = new  Controller();
      $Core->Init();
      global $router;
