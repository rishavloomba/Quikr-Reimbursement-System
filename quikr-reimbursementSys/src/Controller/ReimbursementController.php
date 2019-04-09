<?php
   namespace App\Controller;
   
  
   use Symfony\Component\HttpFoundation\Request;
   use Symfony\Component\HttpFoundation\Response;
   use Symfony\Component\Routing\Annotation\Route;
   use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
   use Symfony\Bundle\FrameworkBundle\Controller\Controller;

   class ReimbursementController extends Controller {
        
         private $curlApi;   

         public function __construct() {
           $this->curlApi = new CurlApiRequest();
         }
        /**
         *  @Route("/reimbursement", name="view_reimbursement")
         *  @Method({"GET"})
         */
        public function reimbursement() {
           // $curlApi = new CurlApiRequest();
            $get_data = $this->curlApi->callAPI('GET', 'localhost:8080/tasks/emp/3/all', false);
            $response = json_decode($get_data, true);

            return $this->render('views/reimbursement.html.twig', array(
                "result" => $response
            ));
        }
        /**
         *  @Route("/reimbursement/{id}/addExpense")
         *  @Method({"POST"})
         */
        public function addExpense(Request $request , $id) {
            $data = array_merge(array('id' => $id), $request->request->all());
            print_r($data);exit;
            //$get_data = $this->curlApi->callAPI('POST', 'localhost:8080/tasks', false);
            //$response = json_decode($get_data, true);
            
            //return $this->redirectToRoute('view_reimbursement');
            return $this->render("views/login.html.twig");

        }


   }

 ?>  