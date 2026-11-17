<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
// $wa = $this->getWebAssetManager();
// $wa->useStyle('fontawesome');
use Joomla\CMS\Factory;

$app    = Factory::getApplication();
$input  = $app->getInput();
$option = $input->getCmd('option', '');
$view   = $input->getCmd('view', '');
$id     = $input->getInt('id', 0);

$isArticle = ($option === 'com_content' && $view === 'article' && $id > 0);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">  
  <jdoc:include type="head" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" />
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/svg+xml" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon.svg">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="48x48" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon-48x48.png">
  <link rel="icon" type="image/png" sizes="64x64" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon-64x64.png">
  <link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon-120x120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon-180x180.png">
  <link rel="manifest" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/manifest.webmanifest">
</head>
<body>
    <header>
		<nav id="nav" class="navbar navbar-expand-lg">
		  <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon.svg" alt="Logo" width="32" height="32" class="d-inline-block align-text-top"> Le parc des Battières</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<jdoc:include type="modules" name="header-nav-menu" />
		    </div>
		  </div>
		</nav>
    </header>
  <?php if ($isArticle && $id === 134) : ?>
    <jdoc:include type="modules" name="decoration" />
  <?php endif; ?>
    <div id="page">
	    <main>
	    	<jdoc:include type="message" />
	    	<jdoc:include type="modules" name="main" />
	       	<jdoc:include type="component" />
	    </main>
    </div>
    
    <footer>
    	<div>
        	<nav><jdoc:include type="modules" name="footer" /></nav>
        </div>
    </footer>
</body>
</html>