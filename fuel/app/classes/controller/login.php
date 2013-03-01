<?php

class Controller_Login extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'Login &raquo; Index';
		$this->template->content = View::forge('login/index');
	}

	public function action_logout()
	{
        Auth::instance()->logout();
        Response::redirect('/');
	}

	public function action_auth()
	{
		$this->template->title = 'Login &raquo; Auth';

		if(Auth::check()) {
            Response::redirect('/'); // user already logged in
        }

        $val = Validation::forge('users');
        $val->add_field('username', 'Your username', 'required|min_length[3]|max_length[20]');
        $val->add_field('password', 'Your password', 'required|min_length[3]|max_length[20]');

        if($val->run()) {
			
			$auth = Auth::instance();
	        if($auth->login($val->validated('username'), $val->validated('password')))
	        {
	            Session::set_flash('notice', 'FLASH: logged in');
	            Response::redirect('index');
	        }
	        else
	        {
	            $data['username'] = $val->validated('username');
	            $data['errors'] = 'Wrong username/password. Try again';
	        }
    	} 
		$this->template->content = View::forge('login/auth', $data);
	}

}
