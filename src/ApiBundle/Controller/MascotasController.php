<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Mascota;
use ApiBundle\Form\Type\MascotaType;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class MascotasController extends FOSRestController
{
    /**
     * @Rest\View
     */
    public function getMascotasAction() {
        $mascotas = $this->getDoctrine()->getRepository('ApiBundle:Mascota')->findAll();
        
        return array(
            'mascotas' => $mascotas
        );
    }
    
    /**
     * @Rest\View
     */
    public function getMascotaAction($id) {
        $mascota = $this->getDoctrine()->getRepository('ApiBundle:Mascota')->find($id);
        if(!$mascota){
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException();
        }
        
        return array(
            'mascota' => $mascota
        );
    }
    
    public function postMascotasAction(Request $request) {
        try{
            $mascota = new Mascota();
            $form  = $this->createForm(new MascotaType(), $mascota)
                    ->handleRequest($request);
            $view = $this->view();
        
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($mascota);
                $em->flush();

                $view->setStatusCode(201); //Created
                $response = $this->handleView($view);
                $response->headers->set('Location', 
                        $this->generateUrl('get_usuario', array(
                            'id' => $mascota->getId()
                        ), true));
                return $response;

            }

            $view->setStatusCode(400) //Bad request
                 ->setData($form); 
            return $this->handleView($view);
        } catch (\Exception $ex) {
            throw new \Symfony\Component\HttpKernel\Exception\BadRequestHttpException($ex->getMessage());
        }
    }
}
