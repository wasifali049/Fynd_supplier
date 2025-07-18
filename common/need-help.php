<ul id="social-sidebar-right">
    <li>
        <a class="whatsapp bt_bb_link" href="http://wa.me/918882335624" target="_blank">
            <i class="bi bi-whatsapp"></i>
            <div><span class="px-1">Need Help</span></div>
        </a>

        <!-- <a class="whatsapp bt_bb_link" href="http://wa.me/918882335624" target="_blank">
            <i class="bi bi-whatsapp"></i>
            <div><span class="px-1">Need Help</span></div>
        </a> -->
    </li>
</ul>

<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");

    #social-sidebar-right {
        position: fixed;
        /* top: 39%; */
        bottom: 0%;
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
        height: 80px;
        width: 80px;
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
    }

    #social-sidebar-right li a div span{
        font-size:14px
    } 

    #social-sidebar-right a:hover,
    #social-sidebar-left a:hover {
        color: var(--primary-bg-color) !important;
        background-color: var(--white) !important;

        color: #e7e0da !important;
        background-color: var(--primary-bg-color);
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



    #social-sidebar-left {
        position: fixed;
        top: 50%;
        left: 0%;
        z-index: 9999;
        margin-left: -30px;
    }
</style>