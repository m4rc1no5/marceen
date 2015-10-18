<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 18.10.15
 * Time: 11:33
 */

namespace Component;


use Symfony\Bundle\TwigBundle\TwigEngine;

class Mail
{
    /** @var \Swift_Mailer */
    protected $mailer;

    /** @var TwigEngine */
    protected $twig;

    /** @var \Swift_Mime_Message */
    private $message;

    /**
     * Mail constructor.
     * @param \Swift_Mailer $mailer
     * @param TwigEngine $twig
     */
    public function __construct(\Swift_Mailer $mailer, TwigEngine $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    /**
     * Przygotowanie maila
     *
     * @param string $subject temat wiadomości
     * @param string $from adres email od kogo
     * @param string $to adres email do kogo
     * @param string $twig_template template (np. test => emails/test.html.twig)
     * @param array $ar_twig_template_variables
     */
    public function prepare($subject, $from, $to, $twig_template = 'default', Array $ar_twig_template_variables = [])
    {
        $this->message = $this->mailer->createMessage()
            ->setSubject($subject)
            ->setFrom($from)
            ->setTo($to)
            ->setBody(
                $this->twig->render(
                    // app/Resources/views/emails/test.html.twig
                    'emails/' . $twig_template . '.html.twig',
                    $ar_twig_template_variables
                ),
                'text/html'
            );
    }

    public function send()
    {
        $this->mailer->send($this->message);
    }
}