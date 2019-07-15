<?php


namespace App\Controller;

use App\Entity\Platform;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TestController extends AbstractController
{

    /**
     * @Route("/test/test")
     */
    public function test() {
        $response = "";
        $repository = $this->getDoctrine()->getRepository(Platform::class);
        $platf = $repository->findAll();
        foreach ($platf as $p) {
            $line = "<h1>" . $p->getName() . "</h1><br>";
            $response .= $line;
        }
        return new Response($response);
    }
}