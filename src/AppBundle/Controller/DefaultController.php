<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request){
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }
	
	/**
     * @Route("/create", name="Registrar Empleado")
     */
    public function craeteAction(Request $request){
        // replace this example code with whatever you need
        return $this->render('crud/create.html.twig');
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
