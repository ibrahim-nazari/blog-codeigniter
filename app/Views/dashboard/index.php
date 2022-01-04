<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
   <h1>Welcome to Dashboard <?= $user["name"];?></h1>
</div>
<?= $this->endSection() ?>