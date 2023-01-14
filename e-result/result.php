<style> 
html {
  font-family:arial;
  font-size: 9.3px;
}

body {
        /* background-color: #726E6D; */
        height: 842px;
        width: 595px;
        margin-left: auto;
        margin-right: auto;
    }

    .desc {
  margin-top:6px;
  background-color: black;
  color: aliceblue;
    }
td {
  border: 1px solid black;
  /* padding: 2px; */
}

thead{
  font-weight:bold;
  text-align:center;
  background: #625D5D;
  color:white;
}

table {
  border-collapse: collapse;
}

.footer {
  text-align:right;
  font-weight:bold;
}

tbody >tr:nth-child(odd) {
  background: #d1d0ce3a;
}
.schname{
    display: block;
    /* margin-left: auto; */
    margin-right: auto;
    width: 80%;
}
.container-ca{
    display: flex;
    flex-wrap: nowrap;
}
.cog-domain{
    width: 400px;
    margin-right: 10px;
    background-color: rgba(173, 216, 230, 0.062);

}
.attendance{
    width: 185px;
    background-color: rgba(255, 255, 224, 0.137);
}

.footer-area{
  margin-top: 10px;
  width: 100%;
  display: flex;
  flex-wrap: nowrap;
}
.teacher{
  width: 180px;
  border: 2px solid grey;
  border-top-right-radius: 30px;
  margin-right: 10px;
  padding: 5px;
}
.principal{
  width: 180px;
  border: 2px solid grey;
  border-bottom-left-radius: 30px;
  margin-right: 10px;
  padding: 5px;
}
.signarea{
  width: 195px;
  background-image: url(<?php echo $Osotech->getSchoolStamp();?>);
  background-repeat: no-repeat;
  background-size:contain;
}
.upperSection{
  display: flex;
  flex-direction: grid;
  gap: 2;
  margin-top: 5px;
}
.textArea {
  width: 80%;
  max-width: fit-content;
  text-align: center;
  justify-items: center;
 justify-content: center;
}
.schLogo{
  /* width: 100px; */
  /* height: auto; */
    margin-top: 20px;
    width: 17%;
    height: 17%;
    border-radius: 20px !important;
}
.schScope{
  margin-top: 5px;
  line-height: 3px;
}
.schName{
  width: fit-content;
  text-align: center;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  font-size: 24px;
  text-shadow: -2px -2px 2px rgba(0, 0, 0, 0.6);
  line-height: 2px;
  color: red;
  font-weight: 1000;
  margin-left: auto;
}
.textArea p:first-of-type{
  margin-top: 3px;
  /* background-color: red; */
  text-align: center;
  justify-items: center;
  justify-content: center;
  color: white;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  font-size: 14px;
  line-height: 20px;
  border-radius: 10px;
  width: fit-content;
  padding-left: 20px;
  padding-right: 20px;
  margin-left: auto;
  margin-right: 80px;
  font-weight: bold;
}
.textArea p {
  text-align: center;
  justify-items: center;
  justify-content: center;
  color: black;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  font-size: 12px;
  border-radius: 10px;
  width: fit-content;
  padding-left: 20px;
  padding-right: 20px;
  margin-left: auto;
  margin-right: 80px;
  font-weight: bold;
}

 .osotech-style{
  color:red;
  justify-content: center;
  align-items: center;
  margin-left: 20px;
} 

</style>