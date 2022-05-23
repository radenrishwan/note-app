<?php require_once __DIR__ . '/../component/navbar.php'; ?>

<div class="container my-5">
    <!--  Jumbotron  -->
    <div class="container-fluid">
        <h3 class="animate__animated animate__backInLeft welcome-message">Selamat Datang, <?= $model['session']->getUsername(); ?></h3>
        <p class="animate__animated animate__backInLeft animate__delay-1s"><?= $model['message'] ?></p>
    </div>
    <!--  Jumbotron  -->

    <hr class="mt-5">

    <!--  Jadwal  -->
    <div class="mt-2 my-4 d-flex flex-row justify-content-between align-items-center" id="jadwal">
        <h3 class="animate__animated animate__fadeInLeft">Jadwal Kamu</h3>
        <a type="button" class="py-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 color="#4A8FE7"
                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd"
                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
        </a>
    </div>

    <!-- Create Jadwal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Jadwal Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/schedule/create" method="post">
                    <div class="modal-body">
                        <input class="form-control form-control-sm my-2" type="text" placeholder="judul"
                               aria-label="title" maxlength="18" id="title" name="title">
                        <textarea class="form-control form-control-sm my-2" placeholder="deskripsi"
                                  maxlength="128" aria-label="description" id="description" name="description"
                                  cols="3"></textarea>
                        <input class="form-control form-control-sm my-2" type="date" placeholder="judul"
                               aria-label="date" maxlength="18" id="date" name="date">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include_once 'schedule-card.php'?>
    <!--  Jadwal  -->

    <hr class="mt-5">

    <!--  Todolist  -->
    <div class="mt-2 my-4 d-flex flex-row justify-content-between align-items-center" id="todolist">
        <h3 class="animate__animated animate__fadeInLeft animate__delay-1s">Todolist</h3>
        <a type="button" class="py-2" data-bs-toggle="modal" data-bs-target="#todolistModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 color="#4A8FE7"
                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd"
                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
        </a>
    </div>

    <!--  modal  -->
    <div class="modal fade" id="todolistModal" tabindex="-1" aria-labelledby="todolistModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Todolist Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/todolist/create" method="post">
                    <div class="modal-body">
                        <input class="form-control form-control-sm my-2" type="text" placeholder="judul"
                               aria-label="title" maxlength="18" id="title" name="title">
                        <textarea class="form-control form-control-sm my-2" placeholder="deskripsi"
                                  maxlength="128" aria-label="description" id="description" name="description"
                                  cols="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include_once 'todolist-card.php'?>
    <!--  Todolist  -->

    <!--  Note  -->
    <hr class="mt-5">


    <!--  Todolist  -->
    <div class="mt-2 my-4 d-flex flex-row justify-content-between align-items-center" id="catatan">
        <h3 class="animate__animated animate__fadeInLeft animate__delay-2s">Catatan</h3>
        <a type="button" class="py-2" data-bs-toggle="modal" data-bs-target="#noteModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 color="#4A8FE7"
                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd"
                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
        </a>
    </div>

    <!--  modal  -->
    <div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="todolistModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Note Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/notes/create" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input class="form-control form-control-sm my-2" type="text" placeholder="judul"
                               aria-label="title" maxlength="20" id="title" name="title">
                        <input class="form-control form-control-sm my-2" type="text" placeholder="subjudul"
                               aria-label="subtitle" maxlength="23" id="subtitle" name="subtitle">
                        <input class="form-control form-control-sm my-2" type="text" placeholder="tag"
                               aria-label="tag" maxlength="10" id="tag" name="tag">
                        <input class="form-control form-control-sm" id="note-image" name="note-image" accept="image/jpg" type="file" >
                        <textarea class="form-control form-control-sm my-2" placeholder="body"
                                  maxlength="3000" aria-label="description" id="body" name="body"
                                  cols="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include_once 'note-card.php';?>

    <div class="ini" style="height: 10vh"></div>
</div>
