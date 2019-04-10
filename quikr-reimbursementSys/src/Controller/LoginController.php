<?php
   namespace App\Controller;

   use Symfony\Component\HttpFoundation\Request;
   use Symfony\Component\HttpFoundation\Response;
   use Symfony\Component\Routing\Annotation\Route;
   use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
   use Symfony\Bundle\FrameworkBundle\Controller\Controller;
   use Symfony\Component\HttpFoundation\Session\Session;
    class LoginController extends Controller {

        private $curlApi;   

        public function __construct() {
          $this->curlApi = new CurlApiRequest();
        }
       
        /**
         *  @Route("/" , name="root")
         *  @Method({"GET"})
         */
        public function index() {

            return $this->render('/views/login.html.twig');
        }

        /**
         * @Route("/login")
         * @Method({"POST"})
         */
        public function login(Request $request) {
            $data = $request->request->all();
            $get_data = $this->curlApi->callAPI('GET', 'localhost:8080/login/'.$data['id'], false);
            $user = json_decode($get_data, true);
        
            if( $user  && $user['password'] == $data['password']) {
               
                $session = new Session();
                $session->start();
                $session->set('islogin' , true);
                $session->set('empid' , $user['empid']);
              return $this->redirectToRoute('reimbursemet_sys');
            } else {
                return $this->redirectToRoute('root');
            }
           
             
         }
        


    }

?>
