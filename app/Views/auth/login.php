<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
   <div class="col-md-4 offset-4 mt-5 p-5 border ">
       <form action="<?=base_url("auth/save")  ?>" method="post" autoComplete="off">
       <?= csrf_field(); ?>
          
          <div class="form-group my-3 ">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
          </div>
          <div class="form-group my-3 ">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" class="form-control">
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