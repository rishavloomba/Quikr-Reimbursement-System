<?php
  
  namespace App\Controller;
  
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LogoutController extends Controller
{

    /**
     * @Route("/logout")
     * @Method({"GET"})
     */
    public function logout()
    {
        session_destroy ( void ) ; 
        return $this->redirectToRoute('root');
    }
}
?>