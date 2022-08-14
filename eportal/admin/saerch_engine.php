

<?php
/*
// Database Structure 
CREATE TABLE `search` (
 `title` text NOT NULL,
 `description` text NOT NULL,
 `link` text NOT NULL,
 FULLTEXT KEY ('title','description')
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1
*/
if(isset($_POST['search']))
{
 $host="localhost";
 $username="root";
 $password="";
 $databasename="sample";
 $connect=mysqli_connect($host,$username,$password);
 $db=mysqli_select_db($connect,$databasename);

 $search_val=$_POST['search_term'];
	
 $get_result = mysql_query("select * from search where MATCH(title,description) AGAINST('$search_val')");
 while($row=mysql_fetch_array($get_result))
 {
  echo "<li><a href='http://talkerscode.com/webtricks/".$row['link']."'><span class='title'>".$row['title']."</span><br><span class='desc'>".$row['description']."</span></a></li>";
 }
 exit();
}
?>

<html>
<head>
    <style>
        body
{
 margin:0 auto;
 padding:0px;
 text-align:center;
 width:100%;
 font-family: "Myriad Pro","Helvetica Neue",Helvetica,Arial,Sans-Serif;
 background-color:#F2F2F2;
}
#wrapper
{
 margin:0 auto;
 padding:0px;
 text-align:center;
 width:995px;
}
#wrapper h1
{
 margin-top:50px;
 font-size:45px;
 color:#585858;
}
#wrapper h1 p
{
 font-size:18px;
}
#search_box input[type="text"]
{
 width:450px;
 height:45px;
 padding-left:10px;
 font-size:18px; 
 margin-bottom:15px;
 color:#424242;
 border:none;
}
#search_box input[type="submit"]
{
 width:100px;
 height:45px;
 background-color:#585858;
 color:white;
 border:none;
}
#result_div
{
 width:555px; 
 margin-left:220px;
}
#result_div li
{ 
 margin-bottom:20px;
 list-style-type:none;
}
#result_div li a
{
 text-decoration:none;
 display:block;
 text-align:left;
}
#result_div li a .title
{
 font-weight:bold;
 font-size:18px;
 color:#5882FA;
}
#result_div li a .desc
{
 color:#6E6E6E;
}
    </style>
<!-- <link type="text/css" rel="stylesheet" href="search_style.css"/> -->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function do_search()
{
 var search_term=$("#search_term").val();
 $.ajax
 ({
  type:'post',
  url:'get_results.php',
  data:{
   search:"search",
   search_term:search_term
  },
  success:function(response) 
  {
   document.getElementById("result_div").innerHTML=response;
  }
 });
 
 return false;
}
</script>
</head>
<body>
<div id="wrapper">

<div id="search_box">
 <form method="post"action="get_results.php" onsubmit="return do_search();">
  <input type="text" id="search_term" name="search_term" placeholder="Enter Search" onkeyup="do_search();">
  <input type="submit" name="search" value="SEARCH">
 </form>
</div>

<div id="result_div"></div>

</div>
</body>
</html>