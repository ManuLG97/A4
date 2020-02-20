<?php


namespace Rentit;


class App
{
    //public $routes=[];

    static function run()
    {
        //cornstruir rutas

        $routes=self::getRoutes();
        //capturar Request
        $request = new Request();
        $controller=$request->getController();
        $action=$request->getAction();


        try {
            if (in_array($controller, $routes)) {
                $nameController = '\\Rentit\Controllers\\' . ucfirst($controller) . 'Controller';
                $objCont = new $nameController($request);
                if (is_callable([$objCont, $action])) {
                    call_user_func([$objCont, $action]);

                } else {
                    call_user_func([$objCont, 'error']);

                }
            } else {
                throw new \Exception("[ERROR]: Ruta no definida");
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    /**
     * @return Array
     * prepares route array from directory Controllers
     */
    static function getRoutes(){
        $dir=__DIR__.'/Controllers';
        $handle=opendir($dir);
        while(false!=($entry=readdir($handle))){
            if($entry!="·" && $entry!=".."){
                $routes[]=strtolower(substr($entry, 0, -14));
            }
        }
        return $routes;
    }
    /**
     * Extracts controller and mehotd
     * @return array
     */

    private function getArrayController(){
        $requestString=htmlentities($_SERVER['REQUEST_URI']);
        $requestArr=explode('/', $requestString);
        array_shift($requestArr);

        if($requestArr[0]==""){
            $controller='Default';
            $method="index";
        } else {
            $controller=ucfirst($requestArr[0]);
            $method=$requestArr[1];
        }

        return [$controller, $method];

    }

}