<?php
class HomePage extends Page{
	private static $icon = "themes/tutorial/images/treeicons/home-file.gif";

}

class HomePage_Controller extends Page_Controller{
	private static $allowed_actions = array('BrowserPollForm');

	public function LatestNews($num=5){
		$holder = ArticleHolder::get()->First();
		return ($holder) ? ArticlePage::get()->filter('ParentID', $holder->ID)->sort('Date ASC')->limit($num):false;
	}

	public function BrowserPollForm(){
		$fields = new FieldList(
			new TextField('Name'),
			new OptionsetField('Browser', 'Your favorite browser', array
				(
					'Firefox'=> 'Firefox',
					'Chrome' =>'Chrome',
					'Internet Explorer' => 'Internet Explorer',
					'Safari'=>'Safari',
					'Opera'=>'Opera'
				)
			)
		);

		$actions = new FieldList(
			new FormAction('doBrowserPoll', 'Submit')
		);

		$validator = new RequiredFields('Name', 'Browser');

		if(Session::get('BrowserPollVoted'))
			return false;
		
		return new Form($this, 'BrowserPollForm', $fields, $actions, $validator);
	}

	public function doBrowserPoll($data, $form)
	{
		$submission = new BrowserPollSubmission();
		$form->saveInto($submission);
		$submission->write();
		Session::set('BrowserPollVoted', true);
		return $this->redirectBack();
	}

	public function BrowserPollResults(){
		$submissions = new GroupedList(BrowserPollSubmission::get());
		$total = $submissions->Count();

		$list = new ArrayList();
		foreach ($submissions->groupBy('Browser') as $browserName => $browserSubmissions) {
			$percentage = (int) ($browserSubmissions->Count()/$total*100);
			$list->push(new ArrayData(array(
				'Browser'=>$browserName,
				'Percentage'=>$percentage
				)));
			
		}
		return $list;
	}


}