<?php


namespace App\Controller;


use App\Entity\GameForm;
use App\Entity\Platform;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    private $repository;

    /**
     * @Route("/game/platform-select")
     */
    public function platformSelect() {
        $response = "";
        $repository = $this->getDoctrine()->getRepository(Platform::class);
        $platf = $repository->findAll();
        foreach ($platf as $p) {
            $line = "<a href='/game/add?platform=" . $p->getId() . "'>" . $p->getName() . "</a><br>";
            $response .= $line;
        }
        return new Response($response);
    }

    /**
     * @Route("/game/add")
     */
    public function add(Request $request) {

        if ($request->isMethod('POST')) {
            $entityManager = $this->getDoctrine()->getManager();
            $result = "<h1>Well Done!</h1>";
            try {
                $form = new GameForm();
                $form->save($entityManager);
            } catch (\Exception $e) {
                $result = "<h1>Something went wrong</h1>";
            }
            return new Response($result);
        }

        /** @var Platform $platform */
        $platform = $this->getPlatform();
        if (empty($platform)) {
            return $this->redirect('/game/platform-select');
        }
        $features = $platform->getExtraFeatures();
        $line = '';
        foreach ($features as $f) {
            $line .= "<label>" . $f->getName() . "</label>";
            $line .= "<input name=\"value" . $f->getId() . "\" type=\"text\"><br>";
        }
        return $this->render('game_form.twig', ['platform_id' => $platform->getId(), 'features' => $features]);
    }

    public function getPlatform() {
        $empty = true;
        $platf = null;
        if (!empty($_GET['platform'])) {
            $repository = $this->getDoctrine()->getRepository(Platform::class);
            $platf = $repository->find($_GET['platform']);
        }
        return $platf;
    }

}