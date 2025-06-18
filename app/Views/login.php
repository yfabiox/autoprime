<?= $this->extend('template_pages') ?>
<?= $this->section('banner') ?>
<div>Banner</div>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<form action="<?=url_to('login_check')?>" method="post">
    <input type="text" name="username" placeholder="Digita o user" />
    <input type="password" name="password" placeholder="Digita a pass" />
    <button type="submit">Login</button>
</form>
<?= $this->endSection() ?>