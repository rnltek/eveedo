<?php
session_start();
if(!isset($_COOKIE['ecn'])){header("Location:/");}
include ("inc.config.php");
$ecn = $_COOKIE['ecn'];
$quser = "SELECT * FROM `users` WHERE `ecn`='$ecn'";
$ruser = $connect->query($quser);
$user = mysqli_fetch_array($ruser);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Eveedo</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-theme.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/pace.css" />
        <style>
            #pinBoot {
                position: relative;
                max-width: 100%;
                width: 100%;
            }
            .white-panel {
                position: absolute;
                background: white;
                box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
                padding: 0px;
            }
            /*
            stylize any heading tags withing white-panel below
            */

            .white-panel h1 {
                font-size: 1em;
            }
            .white-panel h1 a {
                color: #A92733;
            }
            /*
            .white-panel:hover {
            box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
            margin-top: -5px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            }
            */
        </style>
    </head>
    <body style="background:#ffffff;background-color:#ffffff;">
        <div style="height:40px;line-height:40px;position:fixed;top:0px;left:0px;width:100%;background:#0240a8;background-color:#0240a8;padding:0px;z-index:9999;">
            <div style="float:left;width:120px;line-height:40px;height:auto;margin-left:10px;"><img src="logo.png" style="width:110px;margin-bottom:7px;"/></div>
            <div style="float:right;width:200px;line-height:40px;height:auto;margin-right:10px;">
                <form style="line-height:40px;" action="search.results.php" method="get">
                    <table>
                        <tr>
                            <td>
                                <input type="search" class="form-control" placeholder="Search" style="border:0px;background:Transparent;color:#f2f2f2;" id="q" name="q"/>
                            </td>
                            <td style="padding-left:4px;">
                                <span style="color:#f2f2f2;width:32px;text-align:center;cursor:pointer;"  class="fa fa-search"></span>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div style="height:40px;line-height:40px;position:fixed;top:40px;left:0px;right:0px;width:100%;background:#7989a5;background-color:#7989a5;z-index:9999;">
            <table width="100%" height="100%">
                <tr>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="home.php"><span class="fa fa-columns fa-lg"></span></a>
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="folders.php"><span class="fa fa-folder fa-lg"></span></a>
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="discover.php"><span class="fa fa-binoculars fa-lg"></span></a>
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a style="color:#ffffff;" href="extended.php"><span class="fa fa-bars fa-lg"></span></a>
                    </td>
                </tr>
            </table>
        </div>
        <div style="height:40px;line-height:40px;position:fixed;top:80px;left:0px;right:0px;width:100%;background:#f2f2f2;background-color:#f2f2f2;z-index:9999;">
            <table width="100%" height="100%">
                <tr>
                    <td width="25%" valign="middle" align="center">
                    </td>
                    <td width="25%" valign="middle" align="center">
                    </td>
                    <td width="25%" valign="middle" align="center">
                    </td>
                    <td width="25%" valign="middle" align="center">
                        <a href="javascript:void(0);" onclick="history.back();"><span class="fa fa-arrow-left fa-lg"></span></a>
                    </td>
                </tr>
            </table>
        </div>
        <form action="do/do.details.update.php" method="POST">
            <div class="container" style="margin-top:150px;">
                <div class="row" style="margin-bottom:15px;">
                    <div class="col-md-12">
                        <h4><?php echo $user['first_name'].' '.$user['last_name'];?> (Edit Details)</h4>
                    </div>
                </div>
                <div class="row" style="margin-bottom:15px;">
                    <div class="col-md-6">
                        <p>
                            First Name
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="<?php echo $user['first_name'];?>"/>
                        </p>
                        <p>
                            Gender
                            <select name="gender" id="gender" class="form-control">
                                <option <?php if($user['gender']=='Male'){echo 'selected';}?> value="Male">Male</option>
                                <option <?php if($user['gender']=='Female'){echo 'selected';}?> value="Female">Female</option>
                            </select>
                        </p>
                        <p>
                            Email
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $user['email'];?>"/>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            Last Name
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="<?php echo $user['last_name'];?>"/>
                        </p>
                        Birthday
                        <table width="100%" style="margin-bottom:10px;">
                            <tr>
                                <td>
                                    <select class="form-control" name="dob_month" id="dob_day">
                                        <option <?php if($user['dob_month']=='1'){echo 'selected';}?> value="1">Jan</option>
                                        <option <?php if($user['dob_month']=='2'){echo 'selected';}?> value="2">Feb</option>
                                        <option <?php if($user['dob_month']=='3'){echo 'selected';}?> value="3">Mar</option>
                                        <option <?php if($user['dob_month']=='4'){echo 'selected';}?> value="4">Apr</option>
                                        <option <?php if($user['dob_month']=='5'){echo 'selected';}?> value="5">May</option>
                                        <option <?php if($user['dob_month']=='6'){echo 'selected';}?> value="6">Jun</option>
                                        <option <?php if($user['dob_month']=='7'){echo 'selected';}?> value="7">Jul</option>
                                        <option <?php if($user['dob_month']=='8'){echo 'selected';}?> value="8">Aug</option>
                                        <option <?php if($user['dob_month']=='9'){echo 'selected';}?> value="9">Sep</option>
                                        <option <?php if($user['dob_month']=='10'){echo 'selected';}?> value="10">Oct</option>
                                        <option <?php if($user['dob_month']=='11'){echo 'selected';}?> value="11">Nov</option>
                                        <option <?php if($user['dob_month']=='12'){echo 'selected';}?> value="12">Dec</option>
                                    </select>
                                </td>
                                <td style="padding-right:4px;padding-left:4px;">
                                    <select class="form-control" name="dob_day" id="dob_day">
                                        <option <?php if($user['dob_day']=='1'){echo 'selected';}?> value="1">01</option>
                                        <option <?php if($user['dob_day']=='2'){echo 'selected';}?> value="2">02</option>
                                        <option <?php if($user['dob_day']=='3'){echo 'selected';}?> value="3">03</option>
                                        <option <?php if($user['dob_day']=='4'){echo 'selected';}?> value="4">04</option>
                                        <option <?php if($user['dob_day']=='5'){echo 'selected';}?> value="5">05</option>
                                        <option <?php if($user['dob_day']=='6'){echo 'selected';}?> value="6">06</option>
                                        <option <?php if($user['dob_day']=='7'){echo 'selected';}?> value="7">07</option>
                                        <option <?php if($user['dob_day']=='8'){echo 'selected';}?> value="8">08</option>
                                        <option <?php if($user['dob_day']=='9'){echo 'selected';}?> value="9">09</option>
                                        <option <?php if($user['dob_day']=='10'){echo 'selected';}?> value="10">10</option>
                                        <option <?php if($user['dob_day']=='11'){echo 'selected';}?> value="11">11</option>
                                        <option <?php if($user['dob_day']=='12'){echo 'selected';}?> value="12">12</option>
                                        <option <?php if($user['dob_day']=='13'){echo 'selected';}?> value="13">13</option>
                                        <option <?php if($user['dob_day']=='14'){echo 'selected';}?> value="14">14</option>
                                        <option <?php if($user['dob_day']=='15'){echo 'selected';}?> value="15">15</option>
                                        <option <?php if($user['dob_day']=='16'){echo 'selected';}?> value="16">16</option>
                                        <option <?php if($user['dob_day']=='17'){echo 'selected';}?> value="17">17</option>
                                        <option <?php if($user['dob_day']=='18'){echo 'selected';}?> value="18">18</option>
                                        <option <?php if($user['dob_day']=='19'){echo 'selected';}?> value="19">19</option>
                                        <option <?php if($user['dob_day']=='20'){echo 'selected';}?> value="20">20</option>
                                        <option <?php if($user['dob_day']=='21'){echo 'selected';}?> value="21">21</option>
                                        <option <?php if($user['dob_day']=='22'){echo 'selected';}?> value="22">22</option>
                                        <option <?php if($user['dob_day']=='23'){echo 'selected';}?> value="23">23</option>
                                        <option <?php if($user['dob_day']=='24'){echo 'selected';}?> value="24">24</option>
                                        <option <?php if($user['dob_day']=='25'){echo 'selected';}?> value="25">25</option>
                                        <option <?php if($user['dob_day']=='26'){echo 'selected';}?> value="26">26</option>
                                        <option <?php if($user['dob_day']=='27'){echo 'selected';}?> value="27">27</option>
                                        <option <?php if($user['dob_day']=='28'){echo 'selected';}?> value="28">28</option>
                                        <option <?php if($user['dob_day']=='29'){echo 'selected';}?> value="29">29</option>
                                        <option <?php if($user['dob_day']=='30'){echo 'selected';}?> value="30">30</option>
                                        <option <?php if($user['dob_day']=='31'){echo 'selected';}?> value="31">31</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="dob_year" id="dob_year">
                                        <option <?php if($user['dob_year']=='2017'){echo 'selected';}?> value="2017">2017</option>
                                        <option <?php if($user['dob_year']=='2016'){echo 'selected';}?> value="2016">2016</option>
                                        <option <?php if($user['dob_year']=='2015'){echo 'selected';}?> value="2015">2015</option>
                                        <option <?php if($user['dob_year']=='2014'){echo 'selected';}?> value="2014">2014</option>
                                        <option <?php if($user['dob_year']=='2013'){echo 'selected';}?> value="2013">2013</option>
                                        <option <?php if($user['dob_year']=='2012'){echo 'selected';}?> value="2012">2012</option>
                                        <option <?php if($user['dob_year']=='2011'){echo 'selected';}?> value="2011">2011</option>
                                        <option <?php if($user['dob_year']=='2010'){echo 'selected';}?> value="2010">2010</option>
                                        <option <?php if($user['dob_year']=='2009'){echo 'selected';}?> value="2009">2009</option>
                                        <option <?php if($user['dob_year']=='2008'){echo 'selected';}?> value="2008">2008</option>
                                        <option <?php if($user['dob_year']=='2007'){echo 'selected';}?> value="2007">2007</option>
                                        <option <?php if($user['dob_year']=='2006'){echo 'selected';}?> value="2006">2006</option>
                                        <option <?php if($user['dob_year']=='2005'){echo 'selected';}?> value="2005">2005</option>
                                        <option <?php if($user['dob_year']=='2004'){echo 'selected';}?> value="2004">2004</option>
                                        <option <?php if($user['dob_year']=='2003'){echo 'selected';}?> value="2003">2003</option>
                                        <option <?php if($user['dob_year']=='2002'){echo 'selected';}?> value="2002">2002</option>
                                        <option <?php if($user['dob_year']=='2001'){echo 'selected';}?> value="2001">2001</option>
                                        <option <?php if($user['dob_year']=='2000'){echo 'selected';}?> value="2000">2000</option>
                                        <option <?php if($user['dob_year']=='1999'){echo 'selected';}?> value="1999">1999</option>
                                        <option <?php if($user['dob_year']=='1998'){echo 'selected';}?> value="1998">1998</option>
                                        <option <?php if($user['dob_year']=='1997'){echo 'selected';}?> value="1997">1997</option>
                                        <option <?php if($user['dob_year']=='1996'){echo 'selected';}?> value="1996">1996</option>
                                        <option <?php if($user['dob_year']=='1995'){echo 'selected';}?> value="1995">1995</option>
                                        <option <?php if($user['dob_year']=='1994'){echo 'selected';}?> value="1994">1994</option>
                                        <option <?php if($user['dob_year']=='1993'){echo 'selected';}?> value="1993">1993</option>
                                        <option <?php if($user['dob_year']=='1992'){echo 'selected';}?> value="1992">1992</option>
                                        <option <?php if($user['dob_year']=='1991'){echo 'selected';}?> value="1991">1991</option>
                                        <option <?php if($user['dob_year']=='1990'){echo 'selected';}?> value="1990">1990</option>
                                        <option <?php if($user['dob_year']=='1989'){echo 'selected';}?> value="1989">1989</option>
                                        <option <?php if($user['dob_year']=='1988'){echo 'selected';}?> value="1988">1988</option>
                                        <option <?php if($user['dob_year']=='1997'){echo 'selected';}?> value="1997">1997</option>
                                        <option <?php if($user['dob_year']=='1986'){echo 'selected';}?> value="1986">1986</option>
                                        <option <?php if($user['dob_year']=='1985'){echo 'selected';}?> value="1985">1985</option>
                                        <option <?php if($user['dob_year']=='1984'){echo 'selected';}?> value="1984">1984</option>
                                        <option <?php if($user['dob_year']=='1983'){echo 'selected';}?> value="1983">1983</option>
                                        <option <?php if($user['dob_year']=='1982'){echo 'selected';}?> value="1982">1982</option>
                                        <option <?php if($user['dob_year']=='1981'){echo 'selected';}?> value="1981">1981</option>
                                        <option <?php if($user['dob_year']=='1980'){echo 'selected';}?> value="1980">1980</option>
                                        <option <?php if($user['dob_year']=='1979'){echo 'selected';}?> value="1979">1979</option>
                                        <option <?php if($user['dob_year']=='1978'){echo 'selected';}?> value="1978">1978</option>
                                        <option <?php if($user['dob_year']=='1977'){echo 'selected';}?> value="1977">1977</option>
                                        <option <?php if($user['dob_year']=='1976'){echo 'selected';}?> value="1976">1976</option>
                                        <option <?php if($user['dob_year']=='1975'){echo 'selected';}?> value="1975">1975</option>
                                        <option <?php if($user['dob_year']=='1974'){echo 'selected';}?> value="1974">1974</option>
                                        <option <?php if($user['dob_year']=='1973'){echo 'selected';}?> value="1973">1973</option>
                                        <option <?php if($user['dob_year']=='1972'){echo 'selected';}?> value="1972">1972</option>
                                        <option <?php if($user['dob_year']=='1971'){echo 'selected';}?> value="1971">1971</option>
                                        <option <?php if($user['dob_year']=='1970'){echo 'selected';}?> value="1970">1970</option>
                                        <option <?php if($user['dob_year']=='1969'){echo 'selected';}?> value="1969">1969</option>
                                        <option <?php if($user['dob_year']=='1968'){echo 'selected';}?> value="1968">1968</option>
                                        <option <?php if($user['dob_year']=='1967'){echo 'selected';}?> value="1967">1967</option>
                                        <option <?php if($user['dob_year']=='1966'){echo 'selected';}?> value="1966">1966</option>
                                        <option <?php if($user['dob_year']=='1965'){echo 'selected';}?> value="1965">1965</option>
                                        <option <?php if($user['dob_year']=='1964'){echo 'selected';}?> value="1964">1964</option>
                                        <option <?php if($user['dob_year']=='1963'){echo 'selected';}?> value="1963">1963</option>
                                        <option <?php if($user['dob_year']=='1962'){echo 'selected';}?> value="1962">1962</option>
                                        <option <?php if($user['dob_year']=='1961'){echo 'selected';}?> value="1961">1961</option>
                                        <option <?php if($user['dob_year']=='1960'){echo 'selected';}?> value="1960">1960</option>
                                        <option <?php if($user['dob_year']=='1959'){echo 'selected';}?> value="1959">1959</option>
                                        <option <?php if($user['dob_year']=='1958'){echo 'selected';}?> value="1958">1958</option>
                                        <option <?php if($user['dob_year']=='1957'){echo 'selected';}?> value="1957">1957</option>
                                        <option <?php if($user['dob_year']=='1956'){echo 'selected';}?> value="1956">1956</option>
                                        <option <?php if($user['dob_year']=='1955'){echo 'selected';}?> value="1955">1955</option>
                                        <option <?php if($user['dob_year']=='1954'){echo 'selected';}?> value="1954">1954</option>
                                        <option <?php if($user['dob_year']=='1953'){echo 'selected';}?> value="1953">1953</option>
                                        <option <?php if($user['dob_year']=='1952'){echo 'selected';}?> value="1952">1952</option>
                                        <option <?php if($user['dob_year']=='1951'){echo 'selected';}?> value="1951">1951</option>
                                        <option <?php if($user['dob_year']=='1950'){echo 'selected';}?> value="1950">1950</option>
                                        <option <?php if($user['dob_year']=='1949'){echo 'selected';}?> value="1949">1949</option>
                                        <option <?php if($user['dob_year']=='1948'){echo 'selected';}?> value="1948">1948</option>
                                        <option <?php if($user['dob_year']=='1947'){echo 'selected';}?> value="1947">1947</option>
                                        <option <?php if($user['dob_year']=='1946'){echo 'selected';}?> value="1946">1946</option>
                                        <option <?php if($user['dob_year']=='1945'){echo 'selected';}?> value="1945">1945</option>
                                        <option <?php if($user['dob_year']=='1944'){echo 'selected';}?> value="1944">1944</option>
                                        <option <?php if($user['dob_year']=='1943'){echo 'selected';}?> value="1943">1943</option>
                                        <option <?php if($user['dob_year']=='1942'){echo 'selected';}?> value="1942">1942</option>
                                        <option <?php if($user['dob_year']=='1941'){echo 'selected';}?> value="1941">1941</option>
                                        <option <?php if($user['dob_year']=='1940'){echo 'selected';}?> value="1940">1940</option>
                                        <option <?php if($user['dob_year']=='1939'){echo 'selected';}?> value="1939">1939</option>
                                        <option <?php if($user['dob_year']=='1938'){echo 'selected';}?> value="1938">1938</option>
                                        <option <?php if($user['dob_year']=='1937'){echo 'selected';}?> value="1937">1937</option>
                                        <option <?php if($user['dob_year']=='1936'){echo 'selected';}?> value="1936">1936</option>
                                        <option <?php if($user['dob_year']=='1935'){echo 'selected';}?> value="1935">1935</option>
                                        <option <?php if($user['dob_year']=='1934'){echo 'selected';}?> value="1934">1934</option>
                                        <option <?php if($user['dob_year']=='1933'){echo 'selected';}?> value="1933">1933</option>
                                        <option <?php if($user['dob_year']=='1932'){echo 'selected';}?> value="1932">1932</option>
                                        <option <?php if($user['dob_year']=='1931'){echo 'selected';}?> value="1931">1931</option>
                                        <option <?php if($user['dob_year']=='1930'){echo 'selected';}?> value="1930">1930</option>
                                        <option <?php if($user['dob_year']=='1929'){echo 'selected';}?> value="1929">1929</option>
                                        <option <?php if($user['dob_year']=='1928'){echo 'selected';}?> value="1928">1928</option>
                                        <option <?php if($user['dob_year']=='1927'){echo 'selected';}?> value="1927">1927</option>
                                        <option <?php if($user['dob_year']=='1926'){echo 'selected';}?> value="1926">1926</option>
                                        <option <?php if($user['dob_year']=='1925'){echo 'selected';}?> value="1925">1925</option>
                                        <option <?php if($user['dob_year']=='1924'){echo 'selected';}?> value="1924">1924</option>
                                        <option <?php if($user['dob_year']=='1923'){echo 'selected';}?> value="1923">1923</option>
                                        <option <?php if($user['dob_year']=='1922'){echo 'selected';}?> value="1922">1922</option>
                                        <option <?php if($user['dob_year']=='1921'){echo 'selected';}?> value="1921">1921</option>
                                        <option <?php if($user['dob_year']=='1920'){echo 'selected';}?> value="1920">1920</option>
                                        <option <?php if($user['dob_year']=='1919'){echo 'selected';}?> value="1919">1919</option>
                                        <option <?php if($user['dob_year']=='1918'){echo 'selected';}?> value="1918">1918</option>
                                        <option <?php if($user['dob_year']=='1917'){echo 'selected';}?> value="1917">1917</option>
                                        <option <?php if($user['dob_year']=='1916'){echo 'selected';}?> value="1916">1916</option>
                                        <option <?php if($user['dob_year']=='1915'){echo 'selected';}?> value="1915">1915</option>
                                        <option <?php if($user['dob_year']=='1914'){echo 'selected';}?> value="1914">1914</option>
                                        <option <?php if($user['dob_year']=='1913'){echo 'selected';}?> value="1913">1913</option>
                                        <option <?php if($user['dob_year']=='1912'){echo 'selected';}?> value="1912">1912</option>
                                        <option <?php if($user['dob_year']=='1911'){echo 'selected';}?> value="1911">1911</option>
                                        <option <?php if($user['dob_year']=='1910'){echo 'selected';}?> value="1910">1910</option>
                                        <option <?php if($user['dob_year']=='1909'){echo 'selected';}?> value="1909">1909</option>
                                        <option <?php if($user['dob_year']=='1908'){echo 'selected';}?> value="1908">1908</option>
                                        <option <?php if($user['dob_year']=='1907'){echo 'selected';}?> value="1907">1907</option>
                                        <option <?php if($user['dob_year']=='1906'){echo 'selected';}?> value="1906">1906</option>
                                        <option <?php if($user['dob_year']=='1905'){echo 'selected';}?> value="1905">1905</option>
                                        <option <?php if($user['dob_year']=='1904'){echo 'selected';}?> value="1904">1904</option>
                                        <option <?php if($user['dob_year']=='1903'){echo 'selected';}?> value="1903">1903</option>
                                        <option <?php if($user['dob_year']=='1902'){echo 'selected';}?> value="1902">1902</option>
                                        <option <?php if($user['dob_year']=='1901'){echo 'selected';}?> value="1901">1901</option>
                                        <option <?php if($user['dob_year']=='1900'){echo 'selected';}?> value="1900">1900</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <p>
                            <input type="submit" value="Save Details" class="btn btn-success btn-block"/>
                        </p>
                    </div>
                </div>
            </div>
        </form>
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.js"></script>
    </body>
</html>