<div class="row row-cols-4">
    <?php if (sizeof($model['todolists']) < 1) { ?>
        <div class="mx-auto text-center">
            <img class="empty-box" src="../assets/todolist.svg" alt="note" height="300" width="250">
            <h5 class="mt-4">Tidak ada todolist nih, buat yuk.</h5>
        </div>
    <?php } else { ?>
        <?php foreach ($model['todolists'] as $todolist) : ?>
            <div class="col mb-4 zoom">
                <div class="card animate__animated animate__zoomIn">
                    <div class="card-body">
                        <h5 class="card-title"><?= $todolist->getTitle() ?></h5>
                        <p class="card-text"><?= $todolist->getActivity() ?></p>
                        <a href="/todolist/delete?id=<?= $todolist->getId() ?>" class="btn btn-primary">Selesai</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } ?>
</div>