
<?php include_once ("MetaTags.php");?>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- local devlopement -->
<?php include_once "Templates/MetaTags.php";?>
        <title> Result Portal :: <?php echo ($Osotech->getConfigData()->school_name); ?></title>
<link href="assets/css/bootstrap.min.css"  rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
        <style>
            img{
                width: 50px;
                height: auto;
                border-radius: 50%;
                margin-right: 10px;
            }
            .fet-card{
                background-color: whitesmoke;
                padding: 10px; border-radius: 18px;
                 color: black;
        box-shadow: -13px 8px 5px 6px rgba(0,0,0,0.75);
        -webkit-box-shadow: -13px 8px 5px 6px rgba(0,0,0,0.75);
        -moz-box-shadow: -13px 8px 5px 6px rgba(0,0,0,0.75);
            }
             .fet-card p {
                font-size: 18px !important;
                color:orangered;
               text-shadow: -1px -1px 1px rgba(0,0,0,0.6);
               border: 3px solid darkgreen;
               border-radius: 10px 25px !important;
               padding: 5px;
             }
             .fet-text{
                font-size: 28px !important;
               text-shadow: -2px -2px 2px rgba(0,0,0,0.6);
               border-radius: 15px !important;
               padding: 5px;
             }
             a{
                text-decoration: none;
                color:orange;
             }
             a:hover{
                color:orangered;
                transition: 0.2ms ease-out;
             }
            form input, select {
                border-radius: 20px 0px 20px 0px !important;
                height: 50px;
                border: 2px solid orangered;
             }
             .blinking {
    animation: blinkingText 3.5s infinite;
  }

  @keyframes blinkingText {
    0% {
      color: #f00;
    }

    49% {
      color: #f00;
    }

    60% {
      color: transparent;
    }

    99% {
      color: transparent;
    }

    100% {
      color: #2CA67A;
    }
  }
        </style>
