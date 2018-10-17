<?php
foreach ($this->stylesheets as $stylesheet) {
	echo '<link href="' . $stylesheet . '" rel="stylesheet" type="text/css" />' . "\n";
	
}
?>

<div class="container-fluid">
        <p>This is main page start</p>
        <?php echo $this->body; ?>
        <p>This is main'paragraph</p>
        <button>Open new page</button>
</div>