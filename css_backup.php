<!--- styling part 1 --->
<style>
        .full-text {
            display: none;
            /* Hide the full text initially */
        }

        .read-more-btn {
            color: #007bff;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }

        .table-responsive {
            max-height: 400px;
            /* Set a maximum height */
            overflow-y: auto;
            /* Enable vertical scrolling */
        }

        /* Slideshow container */
        .slideshow-container {
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 30px;
            position: absolute;
            bottom: 50%;
            top: 50%;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .prev {
            left: 10px;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            background: #5F45EA;
            border: 2px solid #5F45EA;
            color: white
        }

        .next {
            right: 10px;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            background: #5F45EA;
            border: 2px solid #5F45EA;
            color: white;
            margin-bottom: 10px;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .slide {
            animation-name: fade;
            animation-duration: 0.5s;
            animation-timing-function: ease-in-out;
        }

        @keyframes fade {
            from {
                opacity: 0.5;
            }

            to {
                opacity: 1;
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }

        }

        /* Change the border and height to match form-control */
        .select2-container .select2-selection--single {
            height: 38px;
            /* Same height as form-control */
            border: 1px solid #ced4da;
            /* Bootstrap default border */
            border-radius: 0.25rem;
            /* Bootstrap default border-radius */
            padding: 6px 12px;
            /* Padding to match the form-control padding */
            font-size: 16px;
            /* Match form-control font-size */
        }

        /* Change the hover and focus state */
        .select2-container .select2-selection--single:hover,
        .select2-container .select2-selection--single:focus {
            border-color: #80bdff;
            /* Bootstrap form-control focus border color */
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            /* Bootstrap form-control focus shadow */
        }

        /* Change the dropdown arrow to look like Bootstrap form-control */
        .select2-container .select2-selection__arrow {
            height: 38px;
            /* Same height as the selection box */
            top: 1px;
            /* Align the arrow vertically */
            right: 10px;
            /* Space to the right */
        }

        /* Optional: change dropdown item styles */
        .select2-container .select2-dropdown {
            border: 1px solid #ced4da;
            /* Bootstrap default border */
            border-radius: 0.25rem;
            /* Rounded corners for dropdown */
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 10px 15px;
            /* Adjust padding for better spacing inside the item */
            color: var(--bs-list-group-color);
            /* Maintain your custom color variable */
            background-color: var(--bs-list-group-bg);
            /* Maintain your custom background variable */
            border: 1px solid var(--bs-list-group-border-color);
            /* Solid border for a cleaner look */
            border-radius: 8px;
            /* Add some border radius for rounded corners */
            margin-bottom: 15px;
            /* Add spacing between list items */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Add subtle shadow for depth */
            transition: all 0.3s ease;
            /* Smooth transition for hover effect */
            text-decoration: none;
            /* Remove any default text decoration */
            font-size: 1.1em;
            /* Increase font size slightly for readability */
        }

        /* Hover effect for better interactivity */
        .list-group-item:hover {
            background-color: #f0f0f0;
            /* Lighten background on hover */
            color: #333;
            /* Darker text color on hover */
            transform: translateY(-5px);
            /* Add slight lift on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            /* Enhance shadow on hover */
        }

        /* First and last child adjustments (optional) */
        .list-group-item:first-child {
            margin-top: 10px;
            /* If you need some space at the top */
        }

        .list-group-item:last-child {
            margin-bottom: 10px;
            /* If you need space at the bottom */
        }

        /* Base styling */
        .story-section-wrapper {
            position: relative;
            width: 100%;
        }

        .overlay-container {
            position: relative;
            display: inline-block;
            overflow: hidden;
        }

        .overlay-container img {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            opacity: 0;
            /* Hidden by default */
            transition: opacity 0.3s ease-in-out;
            background-color: rgba(0, 0, 0, 0.6);
            /* Semi-transparent background */
            padding: 20px;
            border-radius: 10px;
        }

        .overlay-container:hover .overlay-content {
            opacity: 1;
            /* Show on hover */
        }

        .overlay-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .overlay-content p {
            font-size: 14px;
            margin-bottom: 15px;
        }

        .overlay-button {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .overlay-button:hover {
            background-color: #005f73;
        }

        .carousel-cell {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center align items */
            text-align: center;
            /* Center align text */
            width: 20%;
        }

        .video-block {
            position: relative;
            overflow: hidden;
            width: 100%;
            /* Ensure the block takes full width */
        }

        .video-block img {
            width: 100%;
            /* Make images responsive */
            height: 200px;
            /* Set a fixed height */
            object-fit: cover;
            /* Ensures the image covers the area */
            object-position: center;
            /* Center the image */
        }

        .text-block {
            padding: 10px;
            /* Add some spacing */
            background-color: rgba(255, 255, 255, 0.8);
            /* Optional: background for text */
            width: 100%;
            /* Full width */
        }

        .text-block {
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            width: 100%;
            text-align: center;
            /* Center align text */
        }

        .product-title {
            font-size: 1.2em;
            /* Adjust font size */
            font-weight: bold;
            margin: 0;
            /* Remove default margin */
            overflow: hidden;
            /* Hide overflow text */
            text-overflow: ellipsis;
            /* Add ellipsis for overflow text */
            white-space: nowrap;
            /* Prevent text wrapping */
            max-width: 100%;
            /* Constrain the title to its container */
        }

        .product-price {
            font-size: 1em;
            /* Adjust price font size */
            color: #333;
            /* Change color for better visibility */
            margin-top: 5px;
            /* Add some space above the price */
        }


        .slider {
            height: 100px;
            overflow: hidden;
            position: relative;
            width: 100%;
            /* Make the slider responsive */
        }

        .slide-track {
            display: flex;
            width: calc(250px * 14);
            /* Total width based on slides */
            animation: scroll 40s linear infinite;
        }

        .slides {
            height: 100px;
            width: 250px;
            display: flex;
            align-items: center;
            /* Center images vertically */
            justify-content: center;
            /* Center images horizontally */
        }

        .slides img {
            height: 100%;
            /* Full height of the slide */
            width: auto;
            /* Maintain aspect ratio */
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-250px * 7));
                /* Scroll 7 images */
            }
        }

        @media only screen and (max-width: 768px) {
            .carousel-cell {
                width: 33.33%;
                /* Show 3 images on mobile */
            }

            .submit_btn {

                margin-left: 36% !important;

            }

            .mobile_attachment {
                display: block !important;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .attachment {

                display: none;
                margin-bottom: 10px;
                justify-content: center !important;
                margin-top: 0px !important;
                margin-left: 0px !important;


            }

            .user_input_web {

                display: block !important;
                /*align-items: center;*/


            }

            .checkboxes2 {
                margin-top: 0px !important;
            }

            .landing-banner-heading {

                font-size: 17px !important;
                line-height: 0px !important;
            }

            .btn_arrow {
                text-align: center;
            }

            .d-flex-mobile {
                flex-direction: column;
                /* Stack items vertically */
                text-align: center;
                /* Center-align text */
            }

            .d-flex-mobile .oc-btn {
                margin-top: 10px;
                /* Add space between text and button */
                width: auto;
                /* Optional: Adjust width to fit content */
            }

            .heading_title {
                text-align: center;
            }

            .banner-title {
                flex-direction: column;
                /* Stack items vertically */
                text-align: center;
                /* Center-align text */
            }

            .banner-main-btn {
                margin-top: 10px;
                /* Add spacing between text and button */
            }

            .banner-form {

                padding-inline: 0px !important;
            }

            .scrollbar {
                padding: 0px !important;
            }

            .chat-wrapper {
                font-size: 12px;
                word-wrap: break-word;
                overflow-wrap: break-word;
                align-items: center;
            }
        }

        .write_msg {
            width: 100%;
            min-height: 40px;
            max-height: 200px;
            /* Limit growth */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            resize: none;
            overflow-y: hidden;
            line-height: 1.4;
            font-size: 14px;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
            padding: 10px;
        }

        .input_msg_write {
            position: relative;
            display: flex;
            align-items: flex-end;
        }

        .write_msg {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
            padding-right: 50px;
            resize: none;
        }

        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            bottom: 0;
            width: 33px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .msg_send_btn i {
            font-size: 16px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            height: 516px;
            overflow-y: auto;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {

            .mobile_slideshow {
                display: block !important;
            }

            .web_slideshow {
                display: none !important;
            }

            .inbox_people {
                width: 100%;
                border-right: none;
            }

            .mesgs {
                width: 100%;
                padding: 15px 10px;
            }

            .chat_img {
                width: 12%;
            }

            .chat_ib {
                width: 85%;
            }

            .chat_list {
                padding: 10px 8px;
            }

            .type_msg {
                padding: 10px;
            }

            .input_msg_write input {
                font-size: 14px;
            }

            .msg_send_btn {
                height: 53px;
                width: 53px;
                top: 14px;
            }

        }

        @media (max-width: 480px) {
            .recent_heading h4 {
                font-size: 18px;
            }

            .srch_bar input {
                width: 70%;
            }

            .input_msg_write input {
                font-size: 13px;
            }

            .msg_send_btn {
                height: 53px;
                width: 53px;
                top: 14px;
            }

        }
    </style>
 <!---- Part 2 ----->
 <style>
                    .mobile_slideshow {
                        display: none !important;
                    }

                    .web_slideshow {
                        display: block !important;
                    }

                    .chemical-selection {
                        position: relative;
                        /* width: 300px; */
                    }

                    .suggestions {
                        /* border: 1px solid #ccc; */
                        border-top: none;
                        position: absolute;
                        z-index: 1000;
                        width: 100%;
                        background-color: white;
                    }

                    .suggestion-item {
                        padding: 10px;
                        cursor: pointer;
                    }

                    .suggestion-item:hover {
                        background-color: #f0f0f0;
                    }

                    .d-flex {
                        /* display: flex;
    align-items: center; Vertically center-aligns items */
                    }

                    .me-2 {
                        margin-right: 0.5rem;
                        /* Add some space between the select and button */
                    }

                    .btn-block {
                        flex: 0 0 auto;
                        /* Prevent button from stretching */
                    }
                </style>
                
                <!---- styling part 3 ------>
                <style>
                    .mobile_slideshow {
                        display: none !important;
                    }

                    .web_slideshow {
                        display: block !important;
                    }

                    .chemical-selection {
                        position: relative;
                        /* width: 300px; */
                    }

                    .suggestions {
                        /* border: 1px solid #ccc; */
                        border-top: none;
                        position: absolute;
                        z-index: 1000;
                        width: 100%;
                        background-color: white;
                    }

                    .suggestion-item {
                        padding: 10px;
                        cursor: pointer;
                    }

                    .suggestion-item:hover {
                        background-color: #f0f0f0;
                    }

                    .d-flex {
                        /* display: flex;
    align-items: center; Vertically center-aligns items */
                    }

                    .me-2 {
                        margin-right: 0.5rem;
                        /* Add some space between the select and button */
                    }

                    .btn-block {
                        flex: 0 0 auto;
                        /* Prevent button from stretching */
                    }
                </style>
                 <!--- part 4 ---->
                 <style>
        .scrollbar {
            max-height: 400px;
            overflow-y: scroll;
            padding: 14px;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .chat-wrapper {
            border: 1px solid lightgrey;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        /* Scrollbar Styles */
        #style-1::-webkit-scrollbar-track {
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        #style-1::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        #style-1::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #555;
            box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        }
    </style>
<!---- part 5 ----->
<style>
                    .mobile_attachment {
                        display: none;
                    }

                    .user_input_web {

                        display: flex;
                        align-items: center;


                    }

                    .attachment {

                        margin-left: -75px;
                        margin-top: 20px;
                        margin-bottom: 20px;
                        text-align: end;
                    }

                    .checkboxes1 {
                        margin-top: 20px;
                    }

                    .checkboxes2 {
                        margin-top: 20px;
                    }

                    img {
                        max-width: 100%;
                    }

                    .inbox_people {
                        background: #f8f8f8 none repeat scroll 0 0;
                        float: left;
                        overflow: hidden;
                        width: 30%;
                        border-right: 1px solid #c4c4c4;
                    }

                    .inbox_msg {
                        border: 1px solid #c4c4c4;
                        clear: both;
                        overflow: hidden;
                    }

                    .top_spac {
                        margin: 20px 0 0;
                    }

                    .recent_heading {
                        float: left;
                        width: 40%;
                    }

                    .srch_bar {
                        display: inline-block;
                        text-align: right;
                        width: 60%;
                    }

                    .headind_srch {
                        padding: 10px 29px 10px 20px;
                        overflow: hidden;
                        border-bottom: 1px solid #c4c4c4;
                    }

                    .recent_heading h4 {
                        color: #05728f;
                        font-size: 21px;
                        margin: auto;
                    }

                    .srch_bar input {
                        border: 1px solid #cdcdcd;
                        border-width: 0 0 1px 0;
                        width: 80%;
                        padding: 2px 0 4px 6px;
                        background: none;
                    }

                    .srch_bar .input-group-addon button {
                        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                        border: medium none;
                        padding: 0;
                        color: #707070;
                        font-size: 18px;
                    }

                    .srch_bar .input-group-addon {
                        margin: 0 0 0 -27px;
                    }

                    .chat_ib h5 {
                        font-size: 15px;
                        color: #464646;
                        margin: 0 0 8px 0;
                    }

                    .chat_ib h5 span {
                        font-size: 13px;
                        float: right;
                    }

                    .chat_ib p {
                        font-size: 14px;
                        color: #989898;
                        margin: auto;
                    }

                    .chat_img {
                        float: left;
                        width: 11%;
                    }

                    .chat_ib {
                        float: left;
                        padding: 0 0 0 15px;
                        width: 88%;
                    }

                    .chat_people {
                        overflow: hidden;
                        clear: both;
                    }

                    .chat_list {
                        border-bottom: 1px solid #c4c4c4;
                        margin: 0;
                        padding: 18px 16px 10px;
                    }

                    .inbox_chat {
                        height: 550px;
                        overflow-y: scroll;
                    }

                    .active_chat {
                        background: #ebebeb;
                    }

                    .incoming_msg_img {
                        display: inline-block;
                        width: 6%;
                    }

                    .received_msg {
                        display: inline-block;
                        padding: 0 0 0 10px;
                        vertical-align: top;
                        width: 92%;
                    }

                    .received_withd_msg p {
                        background: #ebebeb none repeat scroll 0 0;
                        border-radius: 3px;
                        color: #646464;
                        font-size: 14px;
                        margin: 0;
                        padding: 5px 10px 5px 12px;
                        width: 100%;
                    }

                    .time_date {
                        color: #747474;
                        display: block;
                        font-size: 12px;
                        margin: 8px 0 0;
                    }

                    .received_withd_msg {
                        width: 57%;
                    }

                    .mesgs {
                        float: left;
                        padding: 30px 15px 0 25px;
                        width: 70%;
                    }

                    .sent_msg p {
                        background: #05728f none repeat scroll 0 0;
                        border-radius: 3px;
                        font-size: 14px;
                        margin: 0;
                        color: #fff;
                        padding: 5px 10px 5px 12px;
                        width: 100%;
                    }

                    .outgoing_msg {
                        overflow: hidden;
                        margin: 26px 0 26px;
                    }

                    .sent_msg {
                        float: right;
                        width: 46%;
                    }

                    .input_msg_write input {
                        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                        border: medium none;
                        color: #4c4c4c;
                        font-size: 15px;
                        min-height: 48px;
                        width: 100%;
                    }

                    .type_msg {
                        border-top: 1px solid #c4c4c4;
                        position: relative;
                        padding: 10px;
                    }

                    .input_msg_write {
                        position: relative;
                        display: flex;
                        align-items: flex-end;
                    }

                    .write_msg {
                        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                        border: medium none;
                        color: #4c4c4c;
                        font-size: 15px;
                        min-height: 48px;
                        width: 100%;
                        padding-right: 50px;
                        resize: none;
                    }

                    .msg_send_btn {
                        background: #05728f none repeat scroll 0 0;
                        border: medium none;
                        border-radius: 50%;
                        color: #fff;
                        cursor: pointer;
                        font-size: 17px;
                        height: 33px;
                        position: absolute;
                        right: 0;
                        bottom: 0;
                        width: 33px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .msg_send_btn i {
                        font-size: 16px;
                    }

                    .messaging {
                        padding: 0 0 50px 0;
                    }

                    .msg_history {
                        height: 516px;
                        overflow-y: auto;
                    }

                    /* Media Queries for Responsiveness */
                    @media (max-width: 768px) {

                        .mobile_slideshow {
                            display: block !important;
                        }

                        .web_slideshow {
                            display: none !important;
                        }

                        .inbox_people {
                            width: 100%;
                            border-right: none;
                        }

                        .mesgs {
                            width: 100%;
                            padding: 15px 10px;
                        }

                        .chat_img {
                            width: 12%;
                        }

                        .chat_ib {
                            width: 85%;
                        }

                        .chat_list {
                            padding: 10px 8px;
                        }

                        .type_msg {
                            padding: 10px;
                        }

                        .input_msg_write input {
                            font-size: 14px;
                        }

                        .msg_send_btn {
                            height: 53px;
                            width: 53px;
                            top: 14px;
                        }

                    }

                    @media (max-width: 480px) {
                        .recent_heading h4 {
                            font-size: 18px;
                        }

                        .srch_bar input {
                            width: 70%;
                        }

                        .input_msg_write input {
                            font-size: 13px;
                        }

                        .msg_send_btn {
                            height: 53px;
                            width: 53px;
                            top: 14px;
                        }

                    }
                </style>
<!--- part 6 ------>
<style>
        .write_msg {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
            padding-right: 50px;
            resize: none;
            overflow-y: auto;
            max-height: 120px;
            line-height: 1.5;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>

    <style>
        .modal-textarea {
            min-height: 100px;
            max-height: 300px;
            resize: none;
            overflow-y: auto;
            white-space: pre-wrap;
            word-wrap: break-word;
            line-height: 1.5;
        }
    </style>

    <!--- part 7 ------>
    