<?php
$footerModel = fetch_object($db, "SELECT * FROM `footer`");
?>
<footer class="footer" style="background-color: #e3f2fd;">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="footer-logo pb-3">
                    <a href="<?= get_root() ?>"><img src="<?= get_root() ?>assets/img/<?= $footerModel->logo ?>" style="height:70px"></a>
                </div>
                <p class="desc">
                    <?= $footerModel->about ?>
                </p>
            </div>

            <div class="col-md-3">
                <h5><?= $footerModel->heading1 ?></h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="<?= $footerModel->link1 ?>" class="nav-link p-0"><?= $footerModel->text1 ?></a></li>
                    <li class="nav-item mb-2"><a href="<?= $footerModel->link2 ?>" class="nav-link p-0"><?= $footerModel->text2 ?></a></li>
                    <li class="nav-item mb-2"><a href="<?= $footerModel->link3 ?>" class="nav-link p-0"><?= $footerModel->text3 ?></a></li>
                    <li class="nav-item mb-2"><a href="mailto:<?= $footerModel->email ?>" class="nav-link p-0"><?= $footerModel->email ?></a></li>
                    <li class="nav-item mb-2"><a href="<?=get_root()?>chemical-glossary" class="nav-link p-0">Chemical Glossary</a></li>
                </ul>


            </div>

            <div class="col-md-3">
                <h5><?= $footerModel->heading2 ?></h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="<?= $footerModel->link4 ?>" class="nav-link p-0"><?= $footerModel->text4 ?></a></li>
                    <li class="nav-item mb-2"><a href="<?= $footerModel->link5 ?>" class="nav-link p-0"><?= $footerModel->text5 ?></a></li>
                    <li class="nav-item mb-2"><a href="<?= $footerModel->link6 ?>" class="nav-link p-0"><?= $footerModel->text6 ?></a></li>
                    <li class="nav-item mb-2"><a href="<?= $footerModel->link7 ?>" class="nav-link p-0"><?= $footerModel->text7 ?></a></li>
                    <?php /*<li class="nav-item mb-2"><a href="<?= $footerModel->link8 ?>" class="nav-link p-0"><?= $footerModel->text8 ?></a></li>*/ ?>
                    <li class="nav-item mb-2"><a href="<?= $footerModel->link9 ?>" class="nav-link p-0"><?= $footerModel->text9 ?></a></li>
                </ul>
            </div>

            <div class="col-md-2">
                <h5><?= $footerModel->heading3 ?></h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0">
                            <?= $footerModel->address ?>
                        </a>
                    </li>
                </ul>

                <ul class="nav flex-wrap flex-row gap-2">
                    <li class="nav-item mb-2"><a class="nav-link p-0" href="https://www.facebook.com/profile.php?id=100065126965765"> <i class="bi bi-facebook" aria-hidden="true"></i> </a></li>
                    <li class="nav-item mb-2"><a class="nav-link p-0" href="https://www.linkedin.com/company/fyndsupplier1/mycompany/?viewAsMember=true"> <i class="bi bi-linkedin" aria-hidden="true"></i> </a></li>
                    <li class="nav-item mb-2"><a class="nav-link p-0" href="https://twitter.com/FyndSupplier"> <i class="bi bi-twitter" aria-hidden="true"></i> </a></li>

                </ul>

                <ul class="nav flex-wrap flex-row gap-2">
                    <li class="nav-item mb-2"><a class="nav-link p-0" href="https://www.instagram.com/fyndsupplier"> <i class="bi bi-instagram" aria-hidden="true"></i> </a></li>
                    <li class="nav-item mb-2"><a class="nav-link p-0" href=" https://www.youtube.com/@fyndsupplier786"> <i class="bi bi-youtube" aria-hidden="true"></i> </a></li>
                    <li class="nav-item mb-2"><a class="nav-link p-0" href="https://chat.whatsapp.com/KM0FlJWsb6QHArBvLtzaBN"> <i class="bi bi-whatsapp" aria-hidden="true"></i> </a></li>
                </ul>

            </div>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <p class="py-2 mb-0 text-center"><?= $footerModel->copyright ?></p>
        </div>

    </div>
</footer>
<input type="hidden" id="loggedinUserId" value="<?= get_user_id() ?>">
<input type="hidden" id="loggedinUserPremuim" value="<?= is_premium_member($db) ?>">