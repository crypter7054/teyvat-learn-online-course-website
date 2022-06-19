<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>TP12 - CRUD CI4</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tugas Praktikum 12</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href=" <?php echo base_url('/dosen') ?>">Dosen</a>
                    <a class="nav-link" href=" <?php echo base_url('/mahasiswa') ?>">Mahasiswa</a>
                    <a class="nav-link" href=" <?php echo base_url('/matkul') ?>">Mata Kuliah</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper" class="p-4">
        <!-- Page content-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>