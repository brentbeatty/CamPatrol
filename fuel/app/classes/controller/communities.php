<?php

use \Model\search;

class Controller_Communities extends Controller_Template
{

	public function action_index($id = null)
	{
        $data['community'] = Model_Search::find($id);        
		$this->template->title = 'Communities &raquo; Index';
		$this->template->content = View::forge('communities/index', $data);
	}

}
