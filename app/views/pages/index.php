<?php require APPROOT . '/views/inc/header.php'; ?>

<head>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-size: 16px;
            font-family: "Lato", sans-serif;
            font-weight: 400;
            line-height: 1.8em;
            color: #666;
        }

        .pimg1, .pimg2, .pimg3 {
            position: relative;
            opacity: 0.70;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            
            /* Fixed = Parallax
               Scroll = Normal
             */
            background-attachment: fixed;
        }

        .pimg1 {
            background-image: url(<?php echo URLROOT . '/images/parallax/image1.jpg';?>);
            min-height: 100%;
        }

        .pimg2 {
            background-image: url(<?php echo URLROOT . '/images/parallax/image2.jpg';?>);
            min-height: 400px;
        }

        .pimg3 {
            background-image: url(<?php echo URLROOT . '/images/parallax/image3.jpg';?>);
            min-height: 400px;
        }

        .section {
            text-align: center;
            padding: 50px 50px;
        }

        .section-light {
            background-color: #f4f4f4;
            color: #666;
        }

        .section-dark {
            background-color: #282e34;
            color: #ddd;
        }

        .ptext {
            position: absolute;
            top: 50%;
            width: 100%;
            text-align: center;
            color: #000;
            font-size: 27px;
            letter-spacing: 8px;
            text-transform: uppercase;
        }

        .ptext .pborder {
            background-color: #111;
            color: #fff;
            padding: 20px;
        }

        .ptext .trans {
            background-color: transparent;
        }

    </style>
</head>

<div class="pimg1">
    <div class="ptext" style="top: 35%">
        <span class="pborder">
            Speed Grader
        </span>
    </div>
</div>

<section class="section section-dark">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>About</h1>
                <p class="">
                    Speed Gradr was designed as summative project for a computer science course for grade 12. It's now being further developed into a complete web application. 
                    Currently, it's free to sign up and begin using. Use at your own risk, as data may be lost in the development phase, marks may also be off compared to traditional Markbook.

                </p>
            </div>
        </div>
    </div>
</section>

<div class="pimg2">
    <div class="ptext">
        <span class="pborder">
            "A simple solution to automatic grading"
        </span>
    </div>
</div>

<section class="section section-dark">
<div class="container">
        <div class="row">
            <div class="col">
                <h1>Pricing</h1>
            </div>
        </div>
        <div class="row">
            <div class="card col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 bg-dark">
                
            </div>
        </div>
    </div>
</section>



<?php require APPROOT . '/views/inc/footer.php'; ?>