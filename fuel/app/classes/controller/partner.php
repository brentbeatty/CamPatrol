<?php

class Controller_Partner extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'Partner &raquo; Index';
		$this->template->content = View::forge('partner/index');
	}

}
