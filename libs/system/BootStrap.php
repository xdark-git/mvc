<?php   
    namespace libs\system;
    
    class BootStrap
    {
        public function __construct()
        {
            
            if(isset($_GET["url"]))
            {
                $url = explode("/", $_GET["url"]);
               
                $controller_file = "src/controller/".$url[2]."Controller.php";
                if(file_exists($controller_file))
                {
                    require_once $controller_file;
                    $file = $url[2]."Controller";
                    $controller_object = new $file();
                    if(isset($url[4]))
                    {
                        $method = $url[3];
                        if(method_exists($controller_object, $method))
                        {
                            $controller_object->$method($url[4]);
                        }else{
                            die($method." n'existe pas dans le controlleur ".$file);
                        }
                    }
                    else if(isset($url[3]))
                    {
                        $method = $url[3];
                        if(method_exists($controller_object, $method))
                        {
                            $controller_object->$method();
                        }else{
                            die($method." n'existe pas dans le controlleur ".$file);
                        }
                        
                    }
                }
                else{
                    die($controller_file." n'exitste pas");
                }
            }
            else
            {
                echo "MVC";
            }
        }
    }

?>