<?= $this->extend('layout/Template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Daftar Komik</h1>
      <?php if (session()->getflashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getflashdata('pesan'); ?>
        </div>
      <?php endif; ?>
      <a href="/komik/create">Tambah</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Sampul</th>
            <th scope="col">Judul</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($komik as $k) : ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><img src="/img/<?= $k['Sampul'] ?>" alt="" class="Sampul"></td>
              <td><?= $k['Judul'] ?></td>
              <td>
                <a href="/komik/detail/<?= $k['Slug']; ?>" class="btn btn-success">Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
  </div>
</div>
<?= $this->endsection(); ?>