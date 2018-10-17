
<?php
/**
 * Student scripts
 * by YoungK
 * 9/16/2018 09:42
 */
class Page {
	private $title, $stylesheets=array(), $javascripts=array(), $body;
	
	function Page() {
		$this->addCSS('./assets/bootstrap/bootstrap.css');
		$this->addCSS('./assets/css/main.css');
		$this->addCSS('../vendors/iconfonts/mdi/css/materialdesignicons.min.css');
		$this->addCSS('../vendors/css/vendor.bundle.base.css');
		$this->addCSS('../vendors/css/vendor.bundle.addons.css');
		$this->addCSS('../fa/css/font-awesome.css');
		$this->addCSS('../css2/style.css');
		

		$this->addJavascript('../vendors/js/vendor.bundle.base.js');
		$this->addJavascript('../vendors/js/vendor.bundle.addons.js');
		$this->addJavascript('../js/off-canvas.js');
		$this->addJavascript('../js/misc.js');
		$this->addJavascript('../js/dashboard.js');
		$this->addJavascript('../js/main.js');
		
	}
	
	function setTitle($title) {
		$this->title = $title;
	}
	
	function addCSS($path) {
		$this->stylesheets[] = $path;
	}
	
	function addJavascript($path) {
		$this->javascripts[] = $path;
	}
	
	function startBody() {
		ob_start();
	}
	
	function endBody() {
		$this->body = ob_get_clean();
	}
	
	function render($path) {
		ob_start();
		include($path);
		return ob_get_clean();
	}
}