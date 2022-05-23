<div class="row row-cols-4">
    <?php if (sizeof($model['schedules']) < 1) { ?>
        <div class="mx-auto text-center">
            <img class="empty-box" src="../assets/schedule.svg" alt="note" height="300" width="230">

            <h5 class="mt-4">Jadwal kamu masih kosong nih. Bikin jadwal yuk</h5>
        </div>
    <?php } else { ?>
        <?php foreach ($model['schedules'] as $schedule) : ?>
            <div class="col mb-4 zoom">
                <div class="card animate__animated animate__zoomIn" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $schedule->getTitle() ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $schedule->getDate() ?></h6>
                        <p class="card-text"><?= $schedule->getActivity() ?></p>
                        <form action="/schedule/delete" method="get" id="deleteForm">
                            <input type="hidden" name="id" value="<?= $schedule->getId() ?>" hidden>
                            <a href="#" class="card-link" id="deleteBTN"
                               onclick="document.getElementById('deleteForm').submit()">Selesai</a>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } ?>
</div>