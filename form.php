<?php

defined('C5_EXECUTE') or die(_("Access Denied."));
$al = loader::helper('concrete/asset_library');
$fm = loader::helper('form');
$photo = false;
if ($photoID) {
	$photo = \File::getByID($photoID);
}

?>

<div class="form-group">
	<label class="control-label"><?=t('Choose image')?>
	</label>
	<?php print $al->file('photo','photoID','Select Photo',$photo);?>
</div>
<div class="form-group">
	<label class="control-label"><?=t('Select background position of image for when parallax is disabled')?></label>
	<?php echo $form->label('position',"Position"); ?>
	<select name="position" value="<?php echo $position?>">
		<option <?php if($position=='Top'){echo" selected";}?>>Top</option>
		<option <?php if($position=='Center'){echo " selected";}?>>Center</option>
		<option <?php if($position=='Bottom'){echo " selected";}?>>Bottom</option>
	</select>
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			<input type="checkbox" name="parallaxstate" value="1" <?php if ($parallaxstate) { ?>checked<?php } ?>>
			<?php echo t('Enable parallax on image?')?>
		</label>
	</div>
</div>

<div class="form-group">
	<label class="control-label"><?=t('Select the offset of the image while in parallax, this can help you position the image correctly while in parllax. Example: -500, or +350, must include operator.')?></label>
	<input type="text" class="form-control" name="offset" value="<?php echo $offset?>">
</div>

<div class="form-group">
	<div class="checkbox">
		<label>
			<input type="checkbox" name="titlestate" value="1" <?php if ($titlestate) { ?>checked<?php } ?>>
			<?php echo t('Show title ontop of image?')?>
		</label>
	</div>
</div>
<div class="form-group">
<?php echo $fm->text('title',$title,array('placeholder'=>'Header text'))?>
Leave blank to use page title
</div>
