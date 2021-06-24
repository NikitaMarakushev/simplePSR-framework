<?php

namespace App\Http\Action;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ShowAction extends AbstractController
{
    public function show(): Response
    {
        return $this->render('', [

        ]);
    }
}