<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/getpatients/{withradio}/{withscan}/{withmammo}/{withnrd}/{withpediatrie}/{withpatientproc}/{offset}", name="getpatients")
     */
    public function getpatients($withradio,$withscan,$withmammo,$withnrd,$withpediatrie,$withpatientproc,$offset): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
