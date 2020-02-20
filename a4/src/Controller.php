<?php


namespace Rentit;


//use http\Exception;

abstract class Controller implements View,Model
{
    protected $request;
    function __construct($request) {
        $this->request = $request;
    }


    function error(){ throw new \Exception("[ERROR::]:Non existent method"); }

    public function render(array $dataview=null,string $template=null)
    {
        if ($dataview) {
            extract($dataview);
            include 'templates/' . $this->request->getController() . '.tpl.php';
            if ($template != "") {
                include 'templates/' . $template . '.tpl.php';
            }
        }
    }

    /*
  * $db      =   la base de datos
  * $sql     =   la sentencia sql
  * $params  =   los parametros (los valores que cojen nuestras variables en la sentencia sql)
  */

    function getDB(){
        $db=DB::singleton(); //para hacer instancia a unico objeto(vive en un objeto)
        return $db;
    }
    public function query($db,$sql,$params=null){
        try{
            $stmt=$db->prepare($sql);
            if($params){
                $res=$stmt->execute($params);
            }else{
                $res=$stmt->execute();
            }
            return $stmt;
        }
        catch (\PDOException $e){
            echo $e->getMessage();
        }
    }


    /*Aqui genera el array con resultados
     * Aqui pasamos $stmt que se obtiene de "private function query($db, $sql, $params = null)"
     */

    protected function row_extract_one($stmt) {
        $rows = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $rows;
    }

    public function row_extracts($stmt){
        //despues de la query
        $rows=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
}