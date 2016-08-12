<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Usuario;
use ApiBundle\Form\Type\UsuarioType;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class UsuariosController extends FOSRestController
{
    /**
     * @Rest\View
     */
    public function getUsuariosAction() {
        $usuarios = $this->getDoctrine()->getRepository('ApiBundle:Usuario')->findAll();
        
        return array('usuarios' => $usuarios);
    }
    
    /**
     * @Rest\View
     */
    public function getUsuarioAction($id) {
        $usuario = $this->getDoctrine()->getRepository('ApiBundle:Usuario')->find($id);
        if(!$usuario){
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException();
        }
        
        return array('usuario' => $usuario);
    }

    public function postUsuariosAction(Request $request) {
        try{
            $usuario = new Usuario();
            $form  = $this->createForm(new UsuarioType, $usuario)
                    ->handleRequest($request);
            $view = $this->view();

            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($usuario);
                $em->flush();

                $view->setStatusCode(201); //Created
                $response = $this->handleView($view);
                $response->headers->set('Location', 
                        $this->generateUrl('get_usuario', array(
                            'id' => $usuario->getId()
                        ), true));
                return $response;

            }

            $view->setStatusCode(400) //Bad request
                 ->setData($form); 
        return $this->handleView($view);
        }  catch (\Exception $ex) {
            throw new \Symfony\Component\HttpKernel\Exception\BadRequestHttpException($ex->getMessage());
        }       
    }
}
