<?= $this->extend('layout/Template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Detail Komik</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="/img/<?= $komik['Sampul'] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $komik['Judul'] ?></h5>
                        <p class="card-text"><b>Penulis :</b><?= $komik['Penulis'] ?></p>
                        <p class="card-text"><small class="text-muted"><b>Penerbit :</b>
                        <?= $komik['Penerbit'] ?></small></p>
                        <a href=""class="btn btn-warning">edit</a>
                        <a href="" class="btn btn-danger">hapus</a>
                        <br><br>
                        <a href="/komik">kembali</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>