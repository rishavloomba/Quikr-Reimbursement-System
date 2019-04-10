<?php
   namespace App\Controller;
   
  
   use Symfony\Component\HttpFoundation\Request;
   use Symfony\Component\HttpFoundation\Response;
   use Symfony\Component\Routing\Annotation\Route;
   use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
   //use Symfony\Bundle\FrameworkBundle\Controller\Controller;
   

   class ReimbursementController extends Controller {
        
         private $curlApi;   
         private $session;

         public function __construct() {
           $this->curlApi = new CurlApiRequest();
           $this->session = new Session();
         }


        /**
         *  @Route("/reimbursement", name="reimbursemet_sys")
         *  @Method({"GET"})
         */
        public function reimbursement() {
           // $curlApi = new CurlApiRequest();
             
           if($this->session->get('islogin'))
              return $this->redirectToRoute('root');

            $get_data = $this->curlApi->callAPI('GET', 'localhost:8080/tasks', false);
            $response = json_decode($get_data, true);

            return $this->render('views/reimbursement.html.twig', array(
                "result" => $response
            ));
        }


        /**
         *  @Route("/reimbursement/{id}/addexpense" ,name="add_exp")
         *  @Method({"POST"})
         */
        public function addExpense(Request $request , $id) {

            if(!$_SESSION['is_login'])
              return $this->redirectToRoute('root');
           
           $data = $request->request->all();
            
           // Totalling Expenses
            $total = $data['travel_exp'] + $data['telephone_exp']+$data['hotel_stay']+$data['business_meal'];
            $data = array_merge(array('total_expense' => $total), $request->request->all());
            
            // Making Api Call
            $urlString = 'localhost:8080/tasks/emp/'.$id.'/addTask';
            $get_data = $this->curlApi->callAPI('POST', $urlString ,  json_encode($data));
            
        
            //Pass name of route in Redirect
            return $this->redirectToRoute('reimbursemet_sys');
            

        }


   }

 ?>  