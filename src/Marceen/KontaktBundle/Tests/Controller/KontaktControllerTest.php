<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 23.10.15
 * Time: 13:36
 */

namespace Marceen\KontaktBundle\Tests\Controller;


use Marceen\KontaktBundle\Controller\KontaktController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\Form;
use Component\UnitOfWork;
use Marceen\Test\TestCase;
use Mockery as M;
use SimpleBus\Message\Bus\MessageBus;

class KontaktControllerTest extends TestCase
{
	/** @var M\Mock */
	private $commandBus;

	/** @var M\Mock */
	private $container;

	/** @var M\Mock */
	private $request;

	/** @var M\Mock */
	private $formFactory;

	/** @var M\Mock */
	private $form;

	/** @var M\Mock */
	private $unitOfWork;

	public function setUp()
	{
		$this->commandBus = M::mock(MessageBus::class);
		$this->container = M::mock(ContainerInterface::class);
		$this->request = M::mock(Request::class);
		$this->formFactory = M::mock(FormFactory::class);
		$this->form = M::mock(Form::class);
		$this->unitOfWork = M::mock(UnitOfWork::class);
	}

	public function testIndexActionFormInvalid()
	{
		$this->container->shouldReceive('getParameter')->once();
		$this->request->shouldReceive('getClientIp')->once();
		$this->container->shouldReceive('get')->once()->andReturn($this->formFactory);
		$this->formFactory->shouldReceive('create')->once()->andReturn($this->form);
		$this->form->shouldReceive('handleRequest')->once();
		$this->form->shouldReceive('isValid')->once()->andReturn(false);
		$this->form->shouldReceive('createView')->once();

		$kontaktController = new KontaktController($this->commandBus);
		$kontaktController->setContainer($this->container);
		$kontaktController->indexAction($this->request);

	}

	public function testIndexActionFormValid()
	{
		//$this->container->shouldReceive('getParameter')->once();
		//$this->request->shouldReceive('getClientIp')->once();
		//$this->container->shouldReceive('get')->once()->andReturn($this->formFactory);
		//$this->formFactory->shouldReceive('create')->once()->andReturn($this->form);
		//$this->form->shouldReceive('handleRequest')->once();
		//$this->form->shouldReceive('isValid')->once()->andReturn(true);
		//$this->commandBus->shouldReceive('handle')->once();
		//$this->unitOfWork->shouldReceive('commit')->once();
		//$this->formFactory->shouldReceive('generate')->once();
		//$this->form->shouldReceive('createView')->once();
		//
		//$kontaktController = new KontaktController($this->commandBus);
		//$kontaktController->setContainer($this->container);
		//$kontaktController->setUnitOfWork($this->unitOfWork);
		//$kontaktController->indexAction($this->request);

	}
}