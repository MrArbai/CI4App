<?= $this->extend('layout/Template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 my-3>
                Tambah Data Komik
            </h2>
            <form action="/komik/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->haserror('judul')) ?
                        'is-invalid' : '' ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->geterror('judul'); ?>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">sampul</label>
                    <div class="col-sm-3">
                        <img src="/img/default.jpg" class="img-thumbail img-preview">
                    </div>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->haserror('sampul')) ?
                                     'is-invalid' : '' ?>" id="sampul" name="sampul" onchange="previewimg">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->geterror('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="sampul">Pilih File..</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>