<?php

use \Model\user;

class Controller_User extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'User &raquo; Index';
		$this->template->content = View::forge('user/index');
	}

	public function action_userpage($id = null)
	{
		$this->template->title = 'User &raquo; Userpage';
		if($id !== null ) {
			$data['user'] = Model_User::find($id);
		} else {
			$data['user'] = null;
		}

		$this->template->content = View::forge('user/userpage', $data);
	}

}
