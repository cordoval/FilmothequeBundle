<?php

namespace Cordova\FilmothequeBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Cordova\FilmothequeBundle\Entity\CategoryMovie;

class DefaultController extends ContainerAware
{
    public function indexAction()
    {
        $message = 'My first message';

        return $this->container->get('templating')
            ->renderResponse('CordovaFilmothequeBundle:Default:index.html.twig',
            array('message' => $message));
    }

    public function registerAction()
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $categoriea = new CategoryMovie();
        $categoriea->setName('Comedy');
        $em->persist($categoriea);

        $categorieb = new CategoryMovie();
        $categorieb->setName('Science-fiction');
        $em->persist($categorieb);

        $em->flush();

        $message = 'Categories added successfully';

        return $this->container->get('templating')
            ->renderResponse('CordovaFilmothequeBundle:Default:index.html.twig',
            array('message' => $message));
    }

}
