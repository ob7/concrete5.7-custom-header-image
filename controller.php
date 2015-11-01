<?php

namespace Application\Block\HeaderImage;
use Concrete\Core\Block\BlockController;
use Loader;
use File;
use Page;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends BlockController
{
	protected $btTable = "btHeaderImage";
	protected $btInterfaceWidth = "650";
	protected $btInterfaceHeight = "465";
	protected $btWrapperClass = 'ccm-ui';

	public function getBlockTypeName()
	{
		return t("Header image block");
	}

	public function getBlockTypeDescription()
	{
		return t("Select a image to use as the header image");
	}

	public function view()
	{
		$file = File::getByID($this->photoID);
		$page = Page::getCurrentPage();

		$pagelink = $file->getDownloadURL();
		$this->set('link',$pagelink);
		if(!$this->title) {
			$pagetitle = $page->getCollectionName();
		} else {
			$pagetitle = $this->title;
		}
		$this->set('title',$pagetitle);
	}
	
	public function save($data)
	{
		$args['photoID'] = ($args['photoID'] != '') ? intval($args['photoID']) : 0;
		$data['titlestate'] = intval($data['titlestate']);
		parent::save($data);
	}
}
