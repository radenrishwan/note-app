<?php $index = 0; ?>

<div class="row row-cols-2">
    <?php if (sizeof($model['notes']) < 1) { ?>
        <div class="mx-auto text-center">
            <img class="empty-box" src="../assets/note.svg" alt="note" height="300" width="250">
            <h5 class="mt-4">Note kamu kosong. yuk buat sekarang</h5>
        </div>
    <?php } else { ?>
        <?php foreach ($model['notes'] as $note) : ?>
            <div class="col">
                <div class="row-md-6 animate__animated animate__zoomIn animate__delay-1s">
                    <div class="zoom-sm row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary"><?= $note->getTag() ?></strong>
                            <h3 class="mb-0"><?= $note->getTitle() ?></h3>
                            <div class="mb-1 text-muted"><?= $note->getSubtitle() ?></div>
                            <p class="card-text mb-auto my-1 card-body" id="card-body">
                                <?php if (strlen($note->getBody()) > 150) { ?>
                                    <?= substr($note->getBody(), 0, 150) . '...' ?>
                                <?php } else { ?>
                                    <?= $note->getBody() ?>
                                <?php } ?>
                            </p>
                            <a data-bs-toggle="modal" data-bs-target="#openNote-<?= $index ?>"
                               class="stretched-link mt-2">Continue
                                reading</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="/images/<?= $note->getImage() ?>"
                                 alt="" height="250" width="250" class="img-note">
                        </div>
                    </div>
                </div>
            </div>

            <!--  modal  -->
            <div class="modal fade" id="openNote-<?= $index ?>" tabindex="-1" aria-labelledby="openModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= $note->getTitle() ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mx-3 my-2 d-flex flex-column">
                            <p><?= $note->getSubtitle() ?> / <span class="text-primary"><?= $note->getTag() ?></span>
                            </p>
                            <div class="mx-auto">
                                <img src="/images/<?php echo $note->getImage() ?>"
                                     alt="" height="250" width="250" class="img-note my-3">

                            </div>
                            <p class="text-justify note-body"><?= $note->getBody() ?></p>
                            <form action="/notes/delete" method="post" id="deleteNoteForm">
                                <input type="hidden" name="id" value="<?= $note->getId() ?>" hidden>
                                <a href="/notes/delete?id=<?= $note->getId() ?>" class="stretched-link text-danger"
                                   id="deleteBTN"
                                   onclick="document.getElementById('deleteNoteForm').submit()">Hapus</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php $index++ ?>
        <?php endforeach; ?>
    <?php } ?>
</div>