<?php


namespace Rentit\Controllers;


use Rentit\Controller;

class DefaultController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);


    }

    public function index()

    {
        $data = ['title' => 'Encuentra tu casa ideal'];

        $this->render($data);
    }
    function error() { throw new \Exception("[ERROR::]:Non existent method"); }



    public function getSingleResult($sql, $params = null)
    {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extract_one($sentencia);
        return $resultados;
    }

    /**
     * @return mixed
     */
    public function getResults($sql, $params = null)
    {
        $db = $this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extracts($sentencia);
        return $resultados;


    }
  /*  public function login(){
        if (isset($_POST)){
            if (!empty($_POST['user']) && !empty($_POST['pwd'])){
                $pass= hash('sha256', $_POST['pwd']);
                $params=[':user'=>$_POST['user'],
                    ':pwd' => $pass];

                $sql="SELECT * FROM users WHERE user= :user AND pwd= :pwd;";
                $result = $this->getSingleResult($sql, $params);
                if (is_array($result)){

                    $_SESSION['user']=$_POST['user'];
                    header('location:/default');
                    return true;
                }else{

                    header('location:/registrar');
                    return false;
                }
            } else{
                header('location:/registrar');
            }

        } else{
            return false;
        }

    } */



}
