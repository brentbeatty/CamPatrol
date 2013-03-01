<?php

use \Model\search;

class Controller_Search extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'Search &raquo; Index';
		$this->template->content = View::forge('search/index');
	}

	public function action_search()
	{
		if ($_POST['Search']) {



			// This will be nested in if statements for the different possible queries... Zip -> City -> etc. start with largest option and else if down
			if (isset($_POST['name']) && isset($_POST['neighborhoodPost'])) {
				$name['communities'] = Model_Search::query()->where(array('zip' => $_POST['Search'], (array('name', 'LIKE', '%'.$_POST['name']."%")), 'location' => $_POST['neighborhoodPost']))->get();
			} else if (isset($_POST['neighborhoodPost'])) {
				$name['communities'] = Model_Search::query()->where(array('zip' => $_POST['Search'], 'location' => $_POST['neighborhoodPost']))->get();
			} else {
				$name['communities'] = Model_Search::query()->where('zip', '=', $_POST['Search'])->get();
			}

			// Variables
			$name['count'] = count($name['communities']);
			$name['canShow'] = true;
			$name['searchPost'] = $_POST['Search'];
			if (isset($_POST['neighborhoodPost'])) {
				$name['locationPost'] = $_POST['neighborhoodPost'];
 			} else {
 				$name['locationPost'] = false;
 			}
 			if (isset($_POST['name'])) {
 				$name['namePost'] = $_POST['name'];
 			} else {
 				$name['namePost'] = false;
 			}		
			$this->template->title = 'Search &raquo; Search';
			// Final view forge
			$this->template->content = View::forge('search/search', $name);

		} else {
			// This is for if there is nothing to be displayed
			$name['count'] = 0;
			$this->template->title = 'Search &raquo; Search';
			$name['canShow'] = false;
			$this->template->content = View::forge('search/search', $name);
		}
	}
}