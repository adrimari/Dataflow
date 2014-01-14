<?php
class ArticleHolder extends Page{
	private static $icon = "themes/tutorial/images/treeicons/news-file.gif";
	private static $allowed_children = array('ArticlePage');
}

class ArticleHolder_Controller extends Page_Controller
{
	private static $allowed_actions = array(
	'rss'
	);
	
	public function rss()
	{
		$rss = new RSSFeed($this->Children(), $this->Link(), "The coolest news around");
		return $rss->outputToBrowser();
	}
	
	public function init()
	{
	RSSFeed::linkToFeed($this->Link()."rss");
	parent::init();
	}
}