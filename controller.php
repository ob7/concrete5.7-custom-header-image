<?php

namespace Application\Block\ParallaxImage;
use Concrete\Core\Block\BlockController;
use Core;
use Loader;
use File;
use Page;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends BlockController
{
	protected $btTable = "btParallaxImage";
	protected $btInterfaceWidth = "650";
	protected $btInterfaceHeight = "465";
	protected $btWrapperClass = 'ccm-ui';

	public function getBlockTypeName()
	{
		return t("Parallax image block");
	}

	public function getBlockTypeDescription()
	{
		return t("Select a image and add caption or parallax effect. Originally built as a large header image.");
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

	public function validate($data)
	{
		$e = Core::make('error');
		if(!$data['photoID']) {
			$e->add(t('You must select an image for this plugin to work'));
		}
		return $e;
	}
	
	public function save($data)
	{
		$args['photoID'] = ($args['photoID'] != '') ? intval($args['photoID']) : 0;
		$data['titlestate'] = intval($data['titlestate']);
		$data['parallaxstate'] = intval($data['parallaxstate']);
		parent::save($data);
	}
}
