<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/enkripsi.php');

$result = mysqli_query($connect, "SELECT tu.id_user, tu.username, tp.id_partner FROM table_partner tp
RIGHT JOIN table_user tu ON  tp.id_user = tu.id_user WHERE tp.id_partner is NULL");
?>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Create Partner
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php
                        if($_GET['msg'] == 'error-image'){
                            echo '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                Extensions allowed is jpg, jpeg, png
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>';
                        }
                        if($_GET['msg'] == 'file-to-large'){
                            echo '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                Maximum file is 2 MB
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>';
                        }
                        if($_GET['msg'] == 'failed'){
                            echo '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                               Failed store data
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>';
                        }
                    ?>
                   
                    <form method="POST" enctype="multipart/form-data" action="<?= $base_url ?>/admin/actions/action_partner.php" id="validation-form">
                        <div class="form-group">
                            <label class="form-label">User</label>
                            <select name="id_user" class="form-control">
                                <option selected disabled>--pilih user--</option>
                                <?php
                                while($user = mysqli_fetch_array($result)):
                                ?>
                                <option value="<?= encryptId($user['id_user']) ?>"><?= $user['username']?></option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama toko</label>
                            <input type="text" name="nama_toko" class="form-control" placeholder="Nama toko">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lokasi kota toko</label>
                            <select name="lokasi" class="form-control select-city">
                                <option disabled selected>--pilih kota/kabupaten--</option>
                                <?php
                                    $result = mysqli_query($connect, "SELECT city_id, city_name FROM table_cities");
                                    while($city = mysqli_fetch_array($result)):
                                ?>
                                <option value="<?= $city['city_name'] ?>"><?= $city['city_name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">No. Hp</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+62</span>
                                </div>
                                <input type="text" name="no_hp" class="form-control" placeholder="81234xxxx">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tentang toko</label>
                            <textarea name="tentang_toko" rows="6" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label w-100" for="choose-thumbnail">Foto profile toko</label>
                            <input type="file" name="picture" id="choose-thumbnail">
                            <div id="thumbnail-preview" class="img-preview"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="form-label w-100" for="picture_portfolio_1">Foto portfolio 1</label>
                                <input type="file" name="picture_portfolio_1" id="picture_portfolio_1">
                                <div id="preview-portfolio-1" class="img-preview"></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label w-100" for="picture_portfolio_2">Foto portfolio 2</label>
                                <input type="file" name="picture_portfolio_2" id="picture_portfolio_2">
                                <div id="preview-portfolio-2" class="img-preview"></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label w-100" for="picture_portfolio_3">Foto portfolio 3</label>
                                <input type="file" name="picture_portfolio_3" id="picture_portfolio_3">
                                <div id="preview-portfolio-3" class="img-preview"></div>
                            </div>
                        </div>
                        <a href="<?= $base_url ?>/admin/partners" class="btn btn-lg btn-secondary mr-2">kembali</a>
                        <input type="submit" name="create" value="create" class="btn btn-lg btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("input[name=\"validation-bs-tagsinput\"]").on("itemAdded itemRemoved", function() {
        $(this).valid();
    });
    $("#validation-form").validate({
        rules: {
            "id_user": {
                required: true,
            },
            "nama_toko": {
                required: true,
            },
            "lokasi": {
                required: true,
            },
            "no_hp": {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 12
            },
            "tentang_toko": {
                required: true
            },
            "picture": {
                required: true,
                extension: "jpg|jpeg|png",
                messages: {
                    extension: "extension allowed are jpg, jpeg, png"
                }
            },
            "picture_portfolio_1": {
                required: true,
                extension: "jpg|jpeg|png",
                messages: {
                    extension: "extension allowed are jpg, jpeg, png"
                }
            },
            "picture_portfolio_2": {
                required: true,
                extension: "jpg|jpeg|png",
                messages: {
                    extension: "extension allowed are jpg, jpeg, png"
                }
            },
            "picture_portfolio_3": {
                required: true,
                extension: "jpg|jpeg|png",
                messages: {
                    extension: "extension allowed are jpg, jpeg, png"
                }
            }
        },
        errorPlacement: function errorPlacement(error, element) {
            var $parent = $(element).parents(".form-group");
            // Do not duplicate errors
            if ($parent.find(".jquery-validation-error").length) {
                return;
            }
            $parent.append(
                error.addClass("jquery-validation-error small form-text invalid-feedback")
            );
        },
        highlight: function(element) {
            var $el = $(element);
            var $parent = $el.parents(".form-group");
            $el.addClass("is-invalid");
            // Select2 and Tagsinput
            if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                $el.parent().addClass("is-invalid");
            }
        },
        unhighlight: function(element) {
            $(element).parents(".form-group").find(".is-invalid").removeClass("is-invalid");
        }
    });
    
</script>
<script>
    const chooseFileThumbnail = document.getElementById("choose-thumbnail");
    const chooseFilePicture1 = document.getElementById("picture_portfolio_1");
    const chooseFilePicture2 = document.getElementById("picture_portfolio_2");
    const chooseFilePicture3 = document.getElementById("picture_portfolio_3");

    const thumbnail = document.getElementById("thumbnail-preview");
    const picture1 = document.getElementById("preview-portfolio-1");
    const picture2 = document.getElementById("preview-portfolio-2");
    const picture3 = document.getElementById("preview-portfolio-3");

    chooseFileThumbnail.addEventListener("change", function () {
        getImgData(chooseFileThumbnail, thumbnail);
    });
    chooseFilePicture1.addEventListener("change", function () {
        getImgData(chooseFilePicture1, picture1);
    });
    chooseFilePicture2.addEventListener("change", function () {
        getImgData(chooseFilePicture2, picture2);
    });
    chooseFilePicture3.addEventListener("change", function () {
        getImgData(chooseFilePicture3, picture3);
    });
    function getImgData(fileParam, tagHtml) {
        const files = fileParam.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
                tagHtml.innerHTML = '<img src="' + this.result + '" />';
            });    
        }
    }
</script>