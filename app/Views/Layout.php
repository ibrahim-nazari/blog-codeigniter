<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	
	<meta name="description" content="Programming is one of the best field for everybody">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link href="<?= base_url('bootstrap.css')?>" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Programming</title>
</head>
<body>
    <div class="d-flex justify-content-between flex-column" style="min-height:100vh">
        <header >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid px-5">
    <a class="navbar-brand" href="#">Programming</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        
        
      </ul>
      <?php if(session()->has("loggedUserId")) :   ?>
        <div class="d-flex align-items-center">
          <div><?= session()->get("username"); ?>&nbsp; | </div>
         <form action="<?=base_url("/auth/logout")?>" method="post">
            <button class="btn btn-default">Logout</button>
          </form>
        </div>
         

         <?php  else:  ?>
          
          <a class="" href="<?=site_url("auth")?>">Login</a>
          
          
          
      <?php endif ?>
    </div>
  </div>
</nav>
        </header>
        <main class="flex-grow-1 container-fluid px-5">
        <?= $this->renderSection('content') ?>
        </main>

        <footer class="px-5">footer</footer>
    </div>
    
</body>
</html>