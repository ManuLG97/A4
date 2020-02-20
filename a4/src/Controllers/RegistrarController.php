<?php


namespace Rentit\Controllers;


use Rentit\Controller;

final class RegistrarController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);

    }

    public function index()

    {
        $data = ['title' => 'Crea una cuenta'];

        $this->render($data);
    }
    function error() { throw new \Exception("[ERROR::]:Non existent method"); }


    /**
     * @param $sql
     * @param null $params
     * @return mixed
     */
    public function getSingleResult($sql, $params = null)
    {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extract_one($sentencia);
        return $resultados;
    }

    public function getResults($sql, $params = null)
    {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extracts($sentencia);
        return $resultados;
    }

    public function registrar()
    {
        if (isset($_POST)){

            $pass= hash('sha256', $_POST['pwd']);
            $params=[':user'=>$_POST['user'],
                ':pwd' => $pass];
            $sql = "INSERT INTO users (user, pwd) VALUES (:user, :pwd);";
            $result = $this->getSingleResult($sql, $params);
            if (!is_array($result)) {
                session_start();
                $_SESSION['user'] = $_POST['user'];
                header('location:/default');
                return true;
            } else {
                header('location:/registrar');
                return false;
            }
        } else {
            return false;
        }
    }

}



