<?php

/*
 * This file is part of the Symfony framework.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Cordova\FilmothequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $message = 'My first message';

        return $this->container->get( 'templating' )->renderResponse( 'CordovaFilmothequeBundle:Default:index.html.twig', array('message' => $message) );
        //return $this->render('CordovaFilmothequeBundle:Default:index.html.twig');
    }
}
