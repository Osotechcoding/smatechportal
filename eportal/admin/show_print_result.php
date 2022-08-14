<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
 <link rel="stylesheet" href="../assets/result_css.css">
    <?php include "../template/MetaTag.php";?>
    <title><?php echo __SCHOOL_NAME__ ?> :: Student Result Page</title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#"> Report Sheet for 3rd Term</a>
                  </li>
                  <li class="breadcrumb-item active">Result Page
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-2x"></span> Adewumi Adekunle's Report Sheet </h3>
  </div>
    </div>
    <!-- content goes here -->
  <center>
<table width="1000" border="0" cellpadding="0" cellspacing="0" style="border: thin solid #ccc ; background:#fff">
  <!--DWLayoutTable-->
  <tbody><tr>
    <td height="178" colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tbody><tr>
        <td width="1000" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tbody><tr>
            <td width="1000" valign="top"><img src="assets/loaders/visap-result-heading-logo2.jpg" width="1000" height="160"></td>
          </tr>
        </tbody></table>        </td>
      </tr>
      <tr>
        <td height="40" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
      </tr>
    </tbody></table>    </td>
  </tr>
  <tr>
    <td width="7" height="273">&nbsp;</td>
    <td width="987" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tbody><tr>
        <td width="987" height="163" valign="top"><div>
          <form id="printresult" name="printresult" method="post" action="https://loclahost/fresh/printresults3rdterm?reg_no=VISAP/2021/502&amp;session_desc=2021/2022&amp;stuclass=JSS%201">
            <table width="100%" border="0" cellpadding="3" cellspacing="3">
              <tbody><tr>
                <td width="16%" rowspan="4" align="right">                                                    <img id="file-img" src="assets/loaders/avatar.jpg" style=" padding:5px; border: thin solid #ccc; width:148px; height:148px; position: relative;" alt="...">
                                                    </td>
                <td width="2%" rowspan="4" align="left">&nbsp;</td>
                <td width="17%" align="left" class="studentlisttxt"><strong>Report Sheet for: </strong></td>
                <td align="left" class="aca_txt">3rd Term</td>
                <td align="left" class="studentlisttxt">&nbsp;</td>
                <td width="8%" align="left" class="studentlisttxt"><strong>Session:</strong></td>
                <td width="20%" align="left" class="studentlisttxt"><span class="aca_txt">2021/2022</span></td>
                <td width="5%" align="left" class="aca_txt">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="studentlisttxt">Student Name: </td>
                <td colspan="2" align="left" class="aca_txt"><strong>Adeola</strong><strong> Adewumi Ayomide</strong></td>
                <td align="left" class="studentlisttxt">&nbsp;</td>
                <td align="left" class="studentlisttxt">&nbsp;</td>
                <td align="left" class="studentlisttxt">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="studentlisttxt">Admisson No:</td>
                <td width="17%" align="left" class="aca_txt"><strong>VISAP/2021/502</strong></td>
                <td width="15%" align="left">&nbsp;</td>
                <td align="left" class="studentlisttxt"><strong>Class:</strong></td>
                <td align="left" class="studentlisttxt"><span class="aca_txt">JSS 1</span></td>
                <td align="left" class="aca_txt">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" class="studentlisttxt">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
            </tbody></table>
            <table width="281" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-left:20px">
                <caption>&nbsp;
                </caption>
                <tbody><tr>
                  <td colspan="2">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3"><div align="center"><strong class="attendance">1. SCHOOL ATTENDANCE</strong></div></td>
                </tr>
                <tr style="border:thin solid #000000">
                  <td height="25">&nbsp;</td>
                  <td><strong>Frequency</strong></td>
                  <td><strong>School</strong></td>
                </tr>
                <tr>
                  <td colspan="2" align="left" class="listsbar1">No of time school opened</td>
                  <td align="left" class="listsbar2"><strong>
                                      65</strong></td>
                </tr>
                <tr>
                  <td colspan="2" align="left" class="listsbar1">No of time Present</td>
                  <td align="left" class="listsbar2"><strong>60</strong></td>
                </tr>
                <tr>
                  <td colspan="2" align="left" class="listsbar1">No of time Absent</td>
                  <td align="left" class="listsbar2"><strong>05</strong></td>
                </tr>
                <tr>
                  <td colspan="2" align="left" class="listsbar1">&nbsp;</td>
                  <td align="left" class="listsbar2">&nbsp;</td>
                </tr>
              </tbody></table>
              <table width="500" border="0" align="right" cellspacing="0" style="margin-right:20px">
                <caption class="attendance">
                  2. STUDENT TRAITS
                  </caption>
                <tbody><tr style="border:thin solid #000000">
                  <td width="132" align="center"><strong>Qualities</strong></td>
                  <td width="108" align="center"><strong>Excellent</strong></td>
                  <td width="80" align="center"><strong>Good</strong></td>
                  <td width="83" align="center"><strong>Fair</strong></td>
                  <td width="87" align="center"><strong>Poor</strong></td>
                </tr>
                <tr>
                  <td align="left" class="listsbar1"> Neatness</td>
                  <td align="center" class="listsbar1">4</td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar2"></td>
                </tr>
                <tr>
                  <td align="left" class="listsbar1"> Attitude to work</td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar1">3</td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar2"></td>
                </tr>
                <tr>
                  <td align="left" class="listsbar1"> Attentiveness</td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar1">2</td>
                  <td align="center" class="listsbar2"></td>
                </tr>
                <tr>
                  <td align="left" class="listsbar1"> Verbal Frequency</td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar1">2</td>
                  <td align="center" class="listsbar2"></td>
                </tr>
                <tr>
                  <td align="left" class="listsbar1"> Hand writing</td>
                  <td align="center" class="listsbar1">4</td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar2"></td>
                </tr>
                <tr>
                  <td align="left" class="listsbar1"> Honesty</td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar1"></td>
                  <td align="center" class="listsbar2">1</td>
                </tr>
              </tbody></table>
              <br><br>
            </form>
          </div></td>
          </tr>
      <tr>
        <td height="20" align="center"><p>&nbsp;</p>
          <table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tbody><tr>
              <td colspan="2" class="attendance">3. ANNUAL REPORT </td>
              <td width="133">&nbsp;</td>
              <td width="80">&nbsp;</td>
              <td width="82">&nbsp;</td>
              <td width="72">&nbsp;</td>
              <td width="65">&nbsp;</td>
              <td width="100">&nbsp;</td>
              <td width="155">&nbsp;</td>
              <td width="155">&nbsp;</td>
              </tr>
            <tr>
              <td width="250">&nbsp;</td>
              <td width="133">(a)</td>
              <td>(b)</td>
              <td>(c)</td>
              <td>(d)</td>
              <td>(e)</td>
              <td>(f)</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
            <tr>
              <td align="center" class="tableheads">SUBJECTS</td>
              <td align="center" class="tableheads">Test(40)</td>
              <td align="center" class="tableheads">Exam(60)</td>
              <td align="center" class="tableheads">Total</td>
              <td align="center" class="tableheads">1st Term</td>
              <td align="center" class="tableheads">2nd Term</td>
              <td align="center" class="tableheads">3rd Term</td>
              <td class="tableheads">Cum Score</td>
              <td align="center" class="tableheads">Grade</td>
              <td align="center" class="tableheads">Remarks</td>
              </tr>            <tr>
              <td class="listsbar1"><strong>English Language</strong></td>
              <td align="center" class="listsbar1">38</td>
              <td align="center" class="listsbar1">52</td>
              <td align="center" class="listsbar1">90</td>
              <td align="center" class="listsbar1">61</td>
              <td align="center" class="listsbar1">78</td>
              <td align="center" class="listsbar1">81</td>
              <td class="listsbar1">73</td>
              <td class="listsbar2"><strong>A1</strong></td>
              <td align="left" class="listsbar2">Good Result</td>
              </tr>            <tr>
              <td class="listsbar1"><strong>Basic Science</strong></td>
               <td align="center" class="listsbar1">38</td>
              <td align="center" class="listsbar1">52</td>
              <td align="center" class="listsbar1">90</td>
              <td align="center" class="listsbar1">61</td>
              <td align="center" class="listsbar1">78</td>
              <td align="center" class="listsbar1">81</td>
              <td class="listsbar1">73</td>
              <td class="listsbar2"><strong>A1</strong></td>
              <td align="left" class="listsbar2">Good Result</td>
              </tr>
             </tbody></table> 
          <table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tbody><tr>
              <td align="left" class="studentlisttxt">&nbsp;</td>
              <td align="right" class="studentlisttxt">&nbsp;</td>
              <td align="left" class="studentlisttxt">&nbsp;</td>
              <td class="studentlisttxt">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="18%" align="left" class="studentlisttxt"><strong>Total:<strong>0</strong></strong></td>
              <td width="14%" align="right" class="studentlisttxt"><strong>Percentage:</strong></td>
              <td width="16%" align="left" class="studentlisttxt"><strong id="perc1">0</strong><strong>%</strong></td>
              <td width="16%" class="studentlisttxt">SET: </td>
              <td width="9%">&nbsp;</td>
              <td width="27%">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" class="studentlisttxt">&nbsp;</td>
              <td align="left" class="studentlisttxt">&nbsp;</td>
              <td align="left" class="studentlisttxt">&nbsp;</td>
              <td class="studentlisttxt">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" class="line">&nbsp;</td>
              <td align="left" class="line">&nbsp;</td>
              <td align="left" class="line">&nbsp;</td>
              <td class="line">&nbsp;</td>
              <td class="line">&nbsp;</td>
              <td class="line">&nbsp;</td>
            </tr>
            
            <tr>
              <td align="left" valign="bottom" class="FirstName">Class Teacher's Comments<br></td>
              <td colspan="3" align="left" class="aca_txt"></td>
              <td align="center" valign="bottom" class="FirstName">Signature/Date</td>
              <td class="line">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="bottom" class="FirstName"><br>
                Principal's Comment<br></td>
              <td colspan="3" align="left" class="aca_txt" id="p_comment"> You need to be more focused and work harder for better result.</td>
              <td align="center" valign="bottom" class="FirstName">Signature/Date</td>
              <td class="line">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="bottom" class="FirstName"><br>
                Next Term Begins On<br></td>
              <td align="center" class="line"><?php echo date("D jS F Y");?></td>
              <td align="left" class="line">&nbsp;</td>
              <td class="line">&nbsp;</td>
              <td align="center" valign="bottom" class="FirstName">Promoted To</td>
              <td class="line"><strong class="aca_txt">JSS2</strong></td>
            </tr>
          </tbody></table>          </td>
      </tr>
      <tr>
        <td height="19" valign="top"><div>
          <p>&nbsp;</p>
          </div></td>
      </tr>
    </tbody></table></td>
  <td width="6">&nbsp;</td>
  </tr>
</tbody></table><br>
</center>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
    <!-- BEGIN: Footer-->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>