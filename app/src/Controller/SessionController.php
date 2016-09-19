<?php
namespace App\Controller;

use Cake\Core\Configure;

class SessionController extends AppController
{
    /**
     * This is all it takes to reproduce.
     */
    public function index() {
        $user = $this->read_session();
        if($user) {
            // session already exists.
            $this->set('message','Okay, we are ready. Truncate the session table and refresh the page.');
            return;
        }

        // attempt to restore
        $this->restore_session();
        $this->set('message','Session was restored');
    }

    /**
     * This is basically what the Auth component does to see if a user is already authorized. Note that it does not
     * start the session. So the first entry point for a session is an attempted read (which triggers the session object
     * to start the session).
     *
     * @return null|string
     */
    private function read_session()
    {
        return $this->request->session()->read('user');
    }

    /**
     * This is basically when the Auth component does when it's told to manually authorize a user (i.e. restoring
     * a login session from a cookie).
     */
    private function restore_session()
    {
        $this->request->session()->renew();
        $this->request->session()->write('user', 'John Smith');
    }
}
