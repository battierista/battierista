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
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="apple-touch-icon" sizes="167x167" href="/apple-touch-icon-167x167.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/apple-touch-icon-precomposed-60x60.png">
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/apple-touch-icon-precomposed-76x76.png">
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/apple-touch-icon-precomposed-120x120.png">
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/apple-touch-icon-precomposed-152x152.png">
</head>
<body>
    <header>
		<nav id="nav" class="navbar navbar-expand-lg">
		  <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/img/favicon2.svg" alt="Logo" width="32" height="32" class="d-inline-block align-text-top"> Le parc des Battières</a>
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