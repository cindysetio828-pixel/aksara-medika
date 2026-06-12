<div class="content">

    <div class="topbar">
        <div>
            <h3><?= $title; ?></h3>
            <p><?= isset($subtitle) ? $subtitle : 'Kelola data sistem Aksara Medika.'; ?></p>
        </div>

        <?php if (isset($button_url) && isset($button_text)) : ?>
            <a href="<?= base_url($button_url); ?>" class="btn-add">
                <?php if (isset($button_icon)) : ?>
                    <i class="<?= $button_icon; ?> me-1"></i>
                <?php else : ?>
                    <i class="fa-solid fa-plus me-1"></i>
                <?php endif; ?>

                <?= $button_text; ?>
            </a>
        <?php endif; ?>
    </div>