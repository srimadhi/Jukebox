<?php require_once("helpers/functions.php"); ?>
<?php require_once("helpers/db_connect.php"); ?>
<?php site_header(); ?>

<div class="container-fluid position-relative">
    <div class="row mt-4 mb-4">
        <div class="col-md-3 rounded ms-5 ml-2 d-flex mb-4">
            <div class="sidebar-container text-light rounded p-2" style="flex: 1 1 auto;">
                <div class="row m-3">
                    <div class="col-md-12">
                        <button data-bs-toggle="modal" data-bs-target="#music_modal" class="btn btn-primary btn-sm float-end" type="button"><i class="fa-solid fa-plus"></i> ADD</button>
                    </div>
                </div>
                <p>RECENTS /</p>
            </div>
        </div>
        <div class="col-md-8 rounded d-flex mb-4">
            <div class="songs-container text-light rounded p-2" style="flex: 1 1 auto;">
                <div class="row m-3">
                    <div class="col-md-12">
                        <h3 class="float-start" id="greeting">Good Evening</h3>
                        <h3 class="float-end">Enjoy Music <i class="fa-solid fa-music"></i> <i class="fa-solid fa-music"></i> <i class="fa-solid fa-music"></i></h3>
                    </div>
                </div>
                <div class="row" id="music-list">
                    <?php
                    $music = $conn->query('SELECT * FROM `music_list` order by title asc');

                    while ($row = $music->fetch_assoc()) :
                    ?>
                        <div class="col-md-3 text-dark item" data-id="<?= $row['id'] ?>">
                            <div class="card mt-2">
                                <img src="<?= is_file(explode("?", $row['image_path'])[0]) ? $row['image_path'] : "./resources/images/music_icon.png" ?>" alt="" class="card-img img-fluid rounded-start mx-auto" style="height:6rem;width:6rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate"><?= $row['title'] ?></h5>
                                    <p class="card-text text-truncate"><?= $row['description'] ?></p>
                                </div>
                                <div class="card-footer mx-auto">
                                    <button class="btn btn-outline-secondary btn-sm rounded-circle play" data-id="<?= $row['id'] ?>" data-type="pause"><i class="fa fa-play"></i></button>
                                    <button class="btn btn-outline-primary btn-sm rounded-circle edit" data-id="<?= $row['id'] ?>"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-outline-danger btn-sm rounded-circle delete" data-id="<?= $row['id'] ?>"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row fixed-bottom m-1 p-2 bg-dark border rounded">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-3 text-end">
                <img src="resources/images/music_icon.png" class="img-thumbnail rounded float-start" width="70px" height="70px" alt="">
            </div>
            <div class="col-md-9 text-start">
                <h5><b id="inplay-title">---</b></h5>
                <p id="inplay-description">---</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="d-flex w-100 justify-content-center">
                <div class="mx-1">
                    <button class="btn btn-sm btn-dark text-light" id="shuffle-btn"><i class="fa-solid fa-shuffle"></i></button>
                </div>
                <div class="mx-1">
                    <button class="btn btn-sm btn-dark text-light" id="prev-btn"><i class="fa fa-step-backward"></i></button>
                </div>
                <div class="mx-1">
                    <button class="btn btn-sm btn-light text-dark rounded-button" id="play-btn" data-value="play"><i class="fa fa-play"></i></button>
                </div>
                <div class="mx-1">
                    <button class="btn btn-sm btn-dark text-light" id="next-btn"><i class="fa fa-step-forward"></i></button>
                </div>
                <div class="mx-1">
                    <button class="btn btn-sm btn-dark text-light visually-hidden" id="repeat-btn"><i class="fa-solid fa-repeat"></i></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
                <span id="currentTime">--:--</span>
            </div>
            <div class="col-md-10">
                <div id="range-holder" class="mx-1">
                    <input type="range" id="playBackSlider" value="0" style="width:100%">
                </div>
            </div>
            <div class="col-md-1">
                <small class="text-muted" id="inplay-duration">--:--</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 text-end">
        <div class="row">
            <div class="mx-1">
                <button class="btn btn-sm btn-dark text-light" id="like-btn"><i class="fa-regular fa-heart"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="mx-1">
                <span id="vol-icon"><i class="fa fa-volume-up"></i></span> <input type="range" value="100" id="volume">
            </div>
        </div>
    </div>
</div>

<div class="modal text-dark" id="music_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-music"></i> Add New Music</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="helpers/functions.php" id="music-form" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="id">
                        <div class="form-group mb-3">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control form-control-sm rounded-0" required placeholder="XYZ Music">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="control-label">Description</label>
                            <textarea rows="3" name="description" id="description" class="form-control form-control-sm rounded-0" required placeholder="Write the description here"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="audio" class="control-label">Audio File</label>
                            <input type="file" name="audio" id="audio" class="form-control form-control-sm rounded-0" required accept="audio/*" onchange="displayFileText(this)">
                        </div>
                        <div class="form-group mb-3">
                            <label for="img" class="control-label">Display Image</label>
                            <input type="file" name="img" id="img" class="form-control form-control-sm rounded-0" accept="image/*" onchange="displayImg(this,'dImage')">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <div class="col-md-6">
                                <img src="resources/images/music_icon.png" alt="Image" class="img-fluid img-thumbnail bg-gradient bg-dark" id="dImage">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm rounded-0" form="music-form">Save</button>
                <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal text-dark" id="update_music_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-music"></i> Update Music Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="" id="update-music-form">
                        <input type="hidden" name="id">
                        <div class="form-group mb-3">
                            <label for="title2" class="control-label">Title</label>
                            <input type="text" name="title" id="title2" class="form-control form-control-sm rounded-0" required placeholder="XYZ Music">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description2" class="control-label">Description</label>
                            <textarea rows="3" name="description" id="description2" class="form-control form-control-sm rounded-0" required placeholder="Write the description here"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="audio2" class="control-label">Audio File</label>
                            <input type="file" name="audio" id="audio2" class="form-control form-control-sm rounded-0" accept="audio/*" onchange="displayFileText(this)">
                            <small><i><span class="text-muted">Current:</span> <span id="audio-current"></span></i></small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="img2" class="control-label">Display Image</label>
                            <input type="file" name="img" id="img2" class="form-control form-control-sm rounded-0" accept="image/*" onchange="displayImg(this,'dImage2')">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <div class="col-md-6">
                                <img src="./resources/images/music_icon.png" alt="Image" class="img-fluid img-thumbnail bg-gradient bg-dark" id="dImage2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm rounded-0" form="update-music-form">Save</button>
                <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php site_footer(); ?>