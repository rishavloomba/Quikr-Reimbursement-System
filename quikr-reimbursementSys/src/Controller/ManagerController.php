<?php 
 namespace App\Controller;
   
  
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;
 use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;

 class ManagerController extends Controller {
      
       private $curlApi;   

       public function __construct() {
         $this->curlApi = new CurlApiRequest();
       }

    }
?>