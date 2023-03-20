<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Muladi Péter">
    <link href="../bootstrap-style/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card d-inline-block p-3 m-5 d-flex" style="background-color: rgb(241, 226, 226)">
            <h1 class="text-center display-4"><i class="bi bi-images"></i> Image Uploader</h1>
        </div>
        <?php echo $params['success'] ? '
        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
         <strong class="text-center"><i class="bi bi-check-circle-fill"></i> Upload Successful!</strong>
          <span type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </span>
        </div>
        ' : "" ?>
        <?php echo $params['error'] ? '
        <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role="alert">
         <strong class="text-center"><i class="bi bi-exclamation-circle-fill"></i> Upload Failed! incorrect type!</strong>
         <span type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </span>
        </div>
        ' : "" ?>
        <div class="text-center">
            <form class="d-inline-block" method="POST" action="/upload-images" enctype="multipart/form-data">
                <label class="form-label" for="customFile"></label>
                <input required type="file" name="files[]" multiple class="form-control text-center" id="customFile" />
                <button type="submit" class="btn btn-primary mt-2"><i class="bi bi-check-lg"></i> Upload</button>
            </form>
            <hr>
            <div>
                <h1 class="text-center display-4 mb-5">Images</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach ($params['images'] as $image) { ?>
                <div class="col col-md-4">
                    <div class="card" style="width: 24rem">
                        <img class="img-fluid img-thumbnail" src="/images/<?php echo $image['name'] ?>.jpg" alt="img">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--Bootstrap scripts-->
    <script src="./bootstrap-style/js/jquery-3.6.3.js"></script>
    <script src="./bootstrap-style/js/popper.min.js"></script>
    <script src="./bootstrap-style/js/bootstrap.min.js"></script>
    <script src="./bootstrap-style/js/bootstrap.min.js.map"></script>
    <script src="./bootstrap-style/js/bootstrap.bundle.min.js"></script>
</body>

</html>