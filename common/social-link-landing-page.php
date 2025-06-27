<?php
$supplier_total = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `user_type`='supplier'"));
$buyer_total = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `user_type`='buyer'"));
$chemical_total = count($chemicalModel);
?>

<ul id="social-sidebar-right">
    <li>
            <a class="whatsapp bt_bb_link" target="_blank" href="http://wa.me/918882335624">
                <i class="bi bi-whatsapp" aria-hidden="true"></i>
            </a>
            <!-- <a class="telephone bt_bb_link" target="_blank" href="#">
                <i class="bi bi-telephone" aria-hidden="true"></i>
            </a>
            <a class="instagram bt_bb_link" target="_blank" href="https://www.instagram.com/fyndsupplier">
                <i class="bi bi-instagram" aria-hidden="true"></i>
            </a>
            <a class="facebook bt_bb_link" target="_blank" href="https://www.facebook.com/profile.php?id=100065126965765">
                <i class="bi bi-facebook" aria-hidden="true"></i>
            </a> -->

    </li>
</ul>

<ul id="social-sidebar-left">
    <li>
        <a class="oc-btn" <?= pop_buyers($db) ?>>Buyer <?= $buyer_total ?>+</a>
        <a class="oc-btn" href="<?= get_root() ?>supplier">Supplier <?= $supplier_total ?>+</a>
        <a class="oc-btn" href="<?=get_root()?>chemical-all">Chemicals <?= $chemical_total ?>+</a>
    </li>
</ul>

<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");

    #social-sidebar-right {
        position: fixed;

        /* bottom: 0%; */


        bottom: 5%;
        transform: translate(0, -5%);
        right: 0%;
        z-index: 9999;
        margin-right: 10px;
        padding-bottom: 10px;
    }

    #social-sidebar-right,
    #social-sidebar-right li,
    #social-sidebar-left,
    #social-sidebar-left li {
        list-style-type: none;
        margin-bottom: 0px;
    }

    #social-sidebar-right li a,
    #social-sidebar-left li a {
        border-radius: 8%;
        text-decoration: none;
        display: block;
        height: 50px;
        width: 60px;
        line-height: 1;
        position: relative;
        text-align: center;
        cursor: pointer;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;

        color: #e7e0da !important;
        background-color: var(--primary-bg-color);

        color: var(--primary-bg-color) !important;
        background-color: var(--white) !important;

        font-size: 30px;

        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-bottom: 10px;
    }

    #social-sidebar-right li a i,
    #social-sidebar-left li a i{
        font-size:15px
    }

    #social-sidebar-right li a div span {
        font-size: 10px;
        display: block;
    }

    #social-sidebar-right a:hover,
    #social-sidebar-left a:hover {



        color: #e7e0da !important;
        background-color: var(--primary-bg-color) !important;
    }

    /*
    #social-sidebar-right a[class*="whatsapp"]:hover {
        background: #075e54;
    }

    #social-sidebar-right a[class*="phone"]:hover {
        background: #07247e;
    }

    #social-sidebar-right a[class*="instagram"]:hover {
        background: #8a3ab9;
    }

    #social-sidebar-right a[class*="facebook"]:hover {
        background: #3b5998;
    }
    */


    #social-sidebar-right li a {
        border-radius: 50%;
        height: 50px;
        width: 50px;
        background-color: #5F45EA !important;
    }

    #social-sidebar-right li a i {
        font-size: 25px !important;
        color: #fff;
    }


    #social-sidebar-left {
        position: fixed;
        top: 50%;
        transform: translate(-0%, -50%);
        left: -0%;
        z-index: 9999;
        margin-left: -78px;
    }


    #social-sidebar-left li a {
        transform: rotate(90deg);
        margin-bottom: 0px !important;
        width: auto !important;
        font-size: 12px !important;
        height: 30px !important;
    }

    #social-sidebar-left li a:first-child{
        top: -200px;
    }

    #social-sidebar-left li a:nth-child(2){
        top: -100px;
    }

    #social-sidebar-left li a{
        background: #E3DFFA !important;
        color: #2D2929 !important;
        border: none;
        font-weight: bold;
    }


    @media screen and (max-width: 767px){
        #social-sidebar-left li a:first-child {
            top: -50px;
        }

        #social-sidebar-left li a:nth-child(2) {
            top: 50px;
        }

        #social-sidebar-left li a:last-child{
            top: 150px;
        }
    }

</style>