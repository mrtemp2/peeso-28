<?php 
$club_id = $this->input->get('id_club');
$club = $this->model_clubs->get_clubs($club_id);
$evenement = $this->model_news_clubs->get_news_by_club($club_id);

?>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb__content__wraper" data-aos="fade-up">
                <div class="breadcrumb__title">
                    <h2 class="heading">Actualité de <?php echo htmlspecialchars($club["nom_du_club"]); ?></h2>
                </div>
                <div class="breadcrumb__inner">
                    <ul>
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li>actualité de club</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <ul class="nav property__team__tap" id="myTab" role="tablist">
        <?php for ($i = 0; $i < ceil(count($evenement) / 8); $i++): ?>
        <li class="nav-item" role="presentation">
            <a class="single__tab__link <?= $i === 0 ? 'active' : '' ?>" 
               data-bs-toggle="tab" 
               data-bs-target="#projects__<?= $i + 1 ?>" 
               role="tab">
                Page <?= $i + 1 ?>
            </a>
        </li>
        <?php endfor; ?>
    </ul>

    <!-- Tabs Content -->
    <div class="tab-content tab__content__wrapper" id="myTabContent">
        <?php
        $counter = 0;
        foreach ($evenement as $index => $event):
            if ($counter % 8 === 0): // Start a new tab every 8 events
        ?>
        <div class="tab-pane fade <?= $counter === 0 ? 'show active' : '' ?>" id="projects__<?= intval($counter / 8) + 1 ?>" role="tabpanel">
            <div class="row">
        <?php endif; ?>

                <!-- Event Card -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 aos-init aos-animate" data-aos="fade-up">
                    <div class="gridarea__wraper gridarea__wraper__2">
                        <div class="gridarea__img">
                            <a href="#"><img loading="lazy" src="<?= base_url('assets/assets/images/'. $event['image']);?>" alt="grid"></a>
                            <div class="gridarea__small__icon">
                                <a href="#"><i class="icofont-heart-alt"></i></a>
                            </div>
                        </div>
                        <div class="gridarea__content">
                            <div class="gridarea__list">
                                <ul>
                                    <li><i class="icofont-clock-time"></i> <?= htmlspecialchars($event['created_at']); ?></li>
                                </ul>
                            </div>
                            <div class="gridarea__heading">
                                <h3><a href="#"><?= htmlspecialchars($event['titre']); ?></a></h3>
                                <p><?= htmlspecialchars($event['content']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Event Card -->

        <?php
            $counter++;
            if ($counter % 8 === 0 || $index === count($evenement) - 1): // Close the tab or at the last item
        ?>
            </div>
        </div>
        <?php endif; endforeach; ?>
    </div>

    <!-- Pagination -->
    <div class="main__pagination__wrapper aos-init aos-animate" data-aos="fade-up">
        <ul class="main__page__pagination">
            <li><a href="#" class="disable"><i class="icofont-double-left"></i></a></li>
            <?php for ($i = 0; $i < ceil(count($evenement) / 8); $i++): ?>
            <li><a href="#" onclick="changePage(<?= $i + 1 ?>)" class="<?= $i === 0 ? 'active' : '' ?>"><?= $i + 1 ?></a></li>
            <?php endfor; ?>
            <li><a href="#" onclick="changePage(2)"><i class="icofont-double-right"></i></a></li>
        </ul>
    </div>
</div>
