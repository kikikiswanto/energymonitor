<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= (empty($this->uri->segment(1))) ? 'Dashboard' : ucfirst($this->uri->segment(1)); ?>
        <small><?= (empty($this->uri->segment(2))) ? 'index' : $this->uri->segment(2); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= (empty($this->uri->segment(1))) ? 'Dashboard' : ucfirst($this->uri->segment(1)); ?></li>
      </ol>
    </section>