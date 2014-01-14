<?php
class Project extends Page{
	private static $has_many = array(
			'Students'=>"Student"
		);

	private static $many_many = array(
			'Mentors' => 'Mentor'
		);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$config = GridFieldConfig_RelationEditor::create();
		$config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
				'Name'=>'Name',
				'Project.Title' => 'Project'
			));

		$studentField = new GridField(
				'Students',
				'Students',
				Student::get(),
				$config
			);

		$fields->addFieldToTab('Root.Students', $studentField);

		$mentorField = new GridField(
				'Mentors',
				'Mentors',
				Mentor::get(),
				GridFieldConfig_RelationEditor::create()
			);

		$fields->addFieldToTab('Root.Mentors', $mentorField);
		return $fields;
	}

}

class Project_Controller extends Page_Controller{

}