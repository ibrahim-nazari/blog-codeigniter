<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
   <div class="col-md-4 offset-4 mt-5 p-5 border ">
   <?php if(!empty(session()->getFlashdata("fail"))) :   ?>
         <div class="alert alert-danger"><?= session()->getFlashdata("fail"); ?></div>
      <?php endif ?>
     <?php if(!empty(session()->getFlashdata("success"))) :   ?>
        <div class="alert alert-success"><?= session()->getFlashdata("success"); ?></div>
      <?php endif ?>
       <form action="<?=base_url("auth/check")  ?>" method="post" autoComplete="off">
       <?= csrf_field(); ?>
          
          <div class="form-group my-3 ">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?=set_value("email");?>">
            <span class="text-danger"><?=isset($validation)?display_error($validation,"email"):""?></span>
          </div>
          <div class="form-group my-3 ">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" class="form-control" value="<?=set_value("password");?>">
            <span class="text-danger"><?=isset($validation)?display_error($validation,"password"):""?></span>
          </div>
         
          <div class="form-group my-3 ">
            <button class="btn btn-block btn-primary">Login</button>
          </div>
        </form>
        <br>
        <a href="<?=site_url("auth/register")?>">Don't have an account signup</a>
   </div>
</div>
<?= $this->endSection() ?>