<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cordoval
 * Date: 6/9/11
 * Time: 2:29 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Cordova\FilmothequeBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Cordova\FilmothequeBundle\Entity\Actor;
//use MyApp\FilmothequeBundle\Form\ActeurForm;

class ActorController extends ContainerAware
{
    public function listAction()
    {
        return $this->container->get('templating')->renderResponse(
            'CordovaFilmothequeBundle:Actor:list.html.twig');
    }

    public function addAction()
    {
        return $this->container->get('templating')->renderResponse(
            'CordovaFilmothequeBundle:Actor:add.html.twig');
    }

    public function modifyAction($id)
    {
       return $this->container->get('templating')->renderResponse(
            'CordovaFilmothequeBundle:Actor:modify.html.twig');
    }

    public function deleteAction($id)
    {
        return $this->container->get('templating')->renderResponse(
            'CordovaFilmothequeBundle:Actor:delete.html.twig');
    }
}