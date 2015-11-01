<?php

namespace Application\Block\ParallaxImage;
use Concrete\Core\Block\BlockController;
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

	public function registerViewAssets()
	{
		$blockID=$this->bID;
		$pkg = 'parallax_image';
		$al = \Concrete\Core\Asset\AssetList::getInstance();
		$al->register('javascript','parallax_function','blocks/parallax_image/parallax.js',array('version'=>'1.0.0','minify'=>false,'combine'=>true),$pkg);
		$al->registerGroup('parallax_function', array(
			array('javascript', 'parallax_function')
			));
	}

	public function on_page_view()
	{
		$html = loader::helper('html');
		// $parallaxstate=$this->parallaxstate;
		// if ($parallaxstate) {
		// 	// $this->addFooterItem($html->javascript('parallax.js','parallax_image'));
		// 	$this->requireAsset('parallax_function');
		// }
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
		$data['parallaxstate'] = intval($data['parallaxstate']);
		parent::save($data);
	}
}
