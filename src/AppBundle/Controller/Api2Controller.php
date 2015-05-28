<?php

namespace AppBundle\Controller;

use AppBundle\Entity\QuestionsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class Api2Controller
 *
 * @package AppBundle\Controller
 *
 * @Route("/api")
 */
class Api2Controller extends Controller
{
    /**
     * @Route("/questions/{id}", name="api_questions", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function questionsAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** var QuestionsRepository $repo */
        $repo = $em->getRepository('AppBundle:Questions');

        $questions = $repo->findApi($id);

       // var_dump($questions);die;

        return new JsonResponse($questions);
    }

}