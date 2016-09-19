<?php
namespace App\Controller;

class SessionController extends AppController
{
    /**
     *
     */
    public function initialize()
    {
        $this->loadComponent('Cookie');

        $this->Cookie->configKey('demoCookie', [
            'expires' => '+1 months',
            'encryption' => false,
            'httpOnly' => true
        ]);

        parent::initialize();
    }

    /**
     * Displays a list of options.
     */
    public function index()
    {
    }

    /**
     * Starts a session.
     */
    public function start()
    {
        $this->request->session()->start();
        $this->request->session()->write('test','this string is stored in the session via start()');

        $this->Flash->success('Session has been started.');

        // avoid usage of redirect, because there could be warnings
        $this->render('index');
    }

    /**
     * Ends a session.
     */
    public function end()
    {
        $this->request->session()->destroy();

        $this->Flash->success('Session has been ended.');

        // avoid usage of redirect, because there could be warnings
        $this->render('index');
    }

    /**
     * Restores a session.
     */
    public function restore()
    {
        $this->request->session()->renew();

        $this->Flash->success('Session has been restored.');

        // avoid usage of redirect, because there could be warnings
        $this->render('index');
    }
}
