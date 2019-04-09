<?php
   namespace App\Controller;
   use Symfony\Component\HttpFoundation\Response;
   use Symfony\Component\Routing\Annotation\Route;
   use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
   use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class LoginController extends Controller {

        /**
         *  @Route("/")
         *  @Method({"GET"})
         */
        public function index() {

            $user = array(
                "email" => "pandeyarun@709gmail.com",
                "password" => "123"
            );
            return $this->render('/views/login.html.twig');
        }

      
        
    }




?>
