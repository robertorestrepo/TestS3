<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request){
        // replace this example code with whatever you need
//        $csrfToken = $this->get('security.csrf.token_manager')->isGranted('ROLE_ADMIN');
//        return $this->render('default/index.html.twig', array('ROLE' => $csrfToken ));
        return $this->render('default/index.html.twig');
    }
	
	/**
     * @Route("/create", name="Registrar Empleado")
     */
    public function craeteAction(Request $request){
        // replace this example code with whatever you need
        //return $this->render('crud/create.html.twig');
        
        $usuario = new User();
        
        $form = $this->createFormBuilder($usuario)
                ->add('email', EmailType::class, array('label' => 'Correo Electronico'))
                ->add('username', TextType::class, array('label' => 'Usuario'))
                ->add('plainPassword', RepeatedType::class , array(
                'type' => PasswordType::class ,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
                ->add('save', SubmitType::class, array('label' => 'Create Task'))
                ->getForm();
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();
            return $this->redirectToRoute('task_success');
            
        }
        
        return $this->render('crud/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
	/**
     * @Route("/list", name="Listar_Empleados")
     */
    public function listAction(){
        // replace this example code with whatever you need
        return $this->render('crud/list.html.twig');
    }
	
	/**
     * @Route("/edit/{id}", name="Editar_Empleado")
     */
    public function editAction($id, Request $request){
        // replace this example code with whatever you need
        return $this->render('crud/edit.html.twig');
    }
	
}
