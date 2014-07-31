<?php
defined('SSFA_FILE') or die("Shirley, you can't be serious.");
$ssfa_customcss = ssfa_customcss();
if (!empty($ssfa_customcss) and (!file_exists(css_path()))){
	ssfa_create_css();
}
function css_path(){
	global $blog_id; $cssid = ($blog_id > "1") ? $cssid = "_id-".$blog_id : $cssid = null;
	$css_path = SSFA_CUSTOM_CSS_UPLOADS."ssfa-custom-styles".$cssid.".css";
	return $css_path;
}
function css_url(){
	global $blog_id; $cssid = ($blog_id > "1") ? $cssid = "_id-".$blog_id : $cssid = null;
	$css_url = SSFA_CUSTOM_CSS_UPLOADS_URL."ssfa-custom-styles".$cssid.".css";
	return $css_url;
}
function ssfa_customcss(){
	$ssfa_customcss = strip_tags(SSFA_CUSTOMCSS); 
	return $ssfa_customcss;
}
function ssfa_create_css(){
	$ssfa_create_css = file_put_contents(css_path(), "/********* Do not edit this file. It is dynamically generated. *********/\n\n\n".ssfa_customcss());
	return $ssfa_create_css;
}
function ssfa_add_custom_css(){
	$ssfa_customcss = ssfa_customcss();
	if (!empty($ssfa_customcss)){
		echo "\n<!-- File Away Custom CSS Begins -->\n<style type=\"text/css\">\n@import url('".css_url()."?".filemtime(css_path())."');\n\n</style>\n<!-- File Away Custom CSS Concludes -->\n";
	}
}
add_action('wp_head', 'ssfa_add_custom_css', 999);
function ssfacss_resources(){
	?>
	<link type="text/css" rel="stylesheet" href="<?php echo SSFA_ADMIN_RESOURCES_URL; ?>codemirror.css" />
	<script language="javascript" src="<?php echo SSFA_ADMIN_RESOURCES_URL; ?>codemirror.js"></script>
	<script language="javascript" src="<?php echo SSFA_ADMIN_RESOURCES_URL; ?>css.js"></script>
	<?php
}