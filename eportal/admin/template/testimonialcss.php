<style type="text/css">
main{
    margin: 0;
    padding: 0;
    height: 12in;
    width: 8in;
    margin: auto;
    border: 3px solid rgb(0, 0, 0);
    padding: 50px;
    background-image: url('<?php echo $Configuration->get_schoolLogoImage(); ?>');
    background-size: 0.25in 0.25in;
    background-position: center center;
    z-index: -999;
}
section{
    background-color: rgba(228, 228, 228, 0.95);
    height: calc(12in - 5px);
    width: calc(8in - 20px);
    margin: auto;
    border: 3px solid rgb(0, 0, 0);
    position: relative;
    overflow: hidden;
}
#fet-bg-repeat{
    position: absolute;
    top: 0;
    left: 0;
    color: red;
    opacity: 0.1;
    z-index: 1 ;
    height: inherit;
    width: inherit;
}
section > div{
    padding-left: 20px;
    padding-right: 20px;
    overflow: hidden;
}
.fet-upper-part{ 
    display: block;  
    text-align: center;
}
.fet-schLogo{
    position: absolute;
    left: 5px;
    top: 25px;
    width: 100px;
    height: auto;
    border-radius: 50%;
}
.fet-passport{
    position: absolute;
    right: 40px;
    top: 120px;
    width: 120px;
    height: 150px;
    border-radius: 10%;
    border: 2px solid blue;
    z-index: 200;
}
.fet-sch-name{
    font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    font-size: 50px;
    text-align: center;
    line-height: 70px;
    justify-content: center;

}
.fet-schScope{
    line-height: 3px;
}
.fet-levels{
    background-color: red; padding: 5px;
    color: white;
    font-weight: 600;
    border-radius: 5px;
}
.fet-cert-name{
    font-family: 'Gwendolyn', cursive;
    font-size: 70px;
    font-weight: 700;
    text-decoration: underline;
    text-align: center;
    color: red;
    margin-top: -2px;
}
.fet-intro {
    text-align: center;
    font-size: 28px;
    font-family: 'Satisfy', cursive;
    margin-top: -50px;
    font-style: italic;
}
.fet-nameOfStudent p:first-child{
    font-weight: 600;
    text-align: center;
    font-family: 'Aclonica', sans-serif;
    font-size: xx-large;
    margin-top: -3px;
}
.fet-nameOfStudent p:last-child{
    width: 100%;
    border-top: 1px dashed black;
    margin-top: -30px;
}
.fet-entrybg-values{
    margin-top: -170px;
}
.fet-entrybg-values{
    margin-top: -46px;
    font-family: 'Special Elite', cursive;
    font-size: smaller;
}
.fet-entrybg-values1{
    margin-top: -75px;
    font-family: 'Special Elite', cursive;
    font-size: smaller;
}
.fet-subject-offered{
    display: flex;
    flex-wrap: nowrap;
    justify-content:space-around;
    margin-left: auto;
    margin-right: auto;
    background-color: rgba(128, 128, 128, 0.719);
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-weight: 550;
}
.fet-subject-offered::before{
    content: "SUBJECTS STUDIED";
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    font-weight: 600;
    background-color: white;
    height: inherit;
    width: 20%;
    text-align: center;
    padding-top: 15%;
    box-shadow: 10px 10px rgba(0, 0, 0, 0.226);
}
.fet-subject-offered > div{
    margin: 5px;
}
.fet-ln-un{
    border-top: 1px dashed black;
    margin-top: -7px;
    margin-bottom: -7px;
}
.fet-signature{
    display: flex;
    bottom: 10px;
    left: 10px;
}
.fet-sign-principal{
    position: absolute;
    bottom: 10px;
    right: 10px;
}
.fet-sign-director{
    position: absolute;
    bottom: 10px;
    left: 30px;
}
nav{
    text-align: center;
    position: absolute;
    left: 40px;
    top: 150px;
    z-index: 300;
    border-radius: 10%;
    border: 2px solid rgb(255, 255, 255);
    padding: 10px;
    box-shadow: 0 0 10px rgb(138, 104, 104);
}
</style>