<?php
namespace App\Controller;

use Swift_Mailer;
use Swift_MailTransport;
use Swift_Message;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;




class HomeController extends AbstractController
{
    
    public function contactForm(Request $request, Swift_Mailer $mailer) {

        $error = array();

        $request->request->get('name');
        $request->request->get('email');
        $request->request->get('message');
        $request->request->get('value');

        !$request->request->get('name') ? $error[] = 'name' : false;
        !$request->request->get('email') ? $error[] = 'email' : false;
        !$request->request->get('message') ? $error[] = 'message' : false;
        !$request->request->get('value') ? $error[] = 'value' : false;


        if (count($error)>0){
              return new JsonResponse(array('status' => 0,'err' => $error)); 
        } else { 

            /*$transport = (new \Swift_SmtpTransport('mail.intouchbiz.com', 465, 'ssl'))
              ->setUsername('andre@intouchbiz.com')
              ->setPassword('andre#2019')
            ;

            // Create the Mailer using your created Transport
            $mailer = new \Swift_Mailer($transport);                     

            // Create a message
            $message = (new \Swift_Message('Wonderful Subject'))
              ->setFrom(['andre@intouchbiz.com' => 'Tomás'])
              ->setTo(['tomas.f47@hotmail.com' => 'Pedro'])
              ->setBody('Here is the message itself')
            ;

            // Send the message
            $mailer->send($message);*/

            $transport = (new \Swift_SmtpTransport('mail.intouchbiz.com', 465, 'ssl'))
              ->setUsername('tomas.goncalves@intouchbiz.com')
              ->setPassword('intouchbiz#2019')
            ;

            // Create the Mailer using your created Transport
            $mailer = new \Swift_Mailer($transport);

            // Create a message
            $mail = (new \Swift_Message(''))
              ->setFrom(['tomas.goncalves@intouchbiz.com' => 'Tomás'])
              ->setTo(['tafg2000@gmail.com' => 'Tomás'])
              ->setBody('asda')
              ;

            // Send the message
            $result = $mailer->send($mail);

            return new JsonResponse(array('status' => 1, 'name' => $request->request->get('name'), 'email' => $request->request->get('email'), 'message' => $request->request->get('message'), 'value' => $request->request->get('value')));
        }
    }
 
    public function index()
    {  

    	$array1 = array (
    		 "HOME",
    		 "BAND",
    		 "TOUR",
    		 "CONTACT",
    	);

        $array4 = array (
             "BAND",
             "TOUR",
             "CONTACT",
             "MERCH",
        );


        $array2 = array (
            "September",
            "October",
            "November",
        );

        $r =  array();
        
        $r[] = array('id' => '1', 'city' => 'New York', 'date' => 'Set 12 Abr 2019', 'desc' => 'Praesent tincidunt sed tellus ut rutrum sed vitae justo.', 'img' => 'https://www.w3schools.com/w3images/newyork.jpg');

        $r[] = array('id' => '2', 'city' => 'Paris', 'date' => '13 abril', 'desc' => 'Praesent tincidunt sed tellus ut rutrum sed vitae justo.', 'img' => 'https://www.w3schools.com/w3images/paris.jpg');

        $r[] = array('id' => '3', 'city' => 'London', 'date' => '14 abril', 'desc' => 'Praesent tincidunt sed tellus ut rutrum sed vitae justo.', 'img' => 'https://www.w3schools.com/w3images/sanfran.jpg');

        $r[] = array('id' => '4', 'city' => 'Lisbon', 'date' => '15 abril', 'desc' => 'Praesent tincidunt sed tellus ut rutrum sed vitae justo.', 'img' => 'https://www.w3schools.com/w3images/newyork.jpg');

        $r[] = array('id' => '5', 'city' => 'Sydney', 'date' => '16 abril', 'desc' => 'Praesent tincidunt sed tellus ut rutrum sed vitae justo.', 'img' => 'https://www.w3schools.com/w3images/newyork.jpg');

        $r[] = array('id' => '6', 'city' => 'Madrid', 'date' => '17 abril', 'desc' => 'Praesent tincidunt sed tellus ut rutrum sed vitae justo.', 'img' => 'https://www.w3schools.com/w3images/newyork.jpg');

       
		    dump($array1);
        dump($array2);
        dump($array4);
        dump($r);

        return $this->render('/lucky/index.html.twig', [ 
        	'array1' => $array1 , 'tours' => $r, 'array2' => $array2, 'array4' => $array4
        ]);   
    }
}