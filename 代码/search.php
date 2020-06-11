
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>WhynotMap</title>
        
<!-- 

Sentra Template

https://templatemo.com/tm-518-sentra

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        <link rel="stylesheet" href="mdui.css">


        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>



        <header class="nav-down responsive-nav hidden-lg hidden-md">
            <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <nav>
                    <ul class="nav navbar-nav">
                        <li><a href="#blog">Home</a></li>
                        <li><a href="#blog">Search Entries</a></li>
                        <li><a href="#featured">Content</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="sidebar-navigation hidde-sm hidden-xs">
            <div class="logo">
                <a href="index.html">Whynot<em>Map</em></a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="#blog">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#blog">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Search Entires
                        </a>
                    </li>                    
                    <li>
                        <a href="#featured">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Content
                        </a>
                    </li>
                    <li>
                        <a href="#contact">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
            <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
        </div>
        

        


        <div class="page-content">
        	<section id="blog" class="content-section">
                <div class="section-heading">
                    <h1>Search<br><em>Entries</em></h1>
                    <p>You can see all the results you need.
                    <br>Switch bars to see specific result.</p>
                </div>
                <div class="section-content">
                    <div class="tabs-content">
                        <div class="wrapper">
                            <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                              <li><a href="#tab1" class="active">Multi</a></li>
                              <li><a href="#tab2">Title</a></li>
                              <li><a href="#tab3">Author Name</a></li>
                              <li><a href="#tab4">Conference Name</a></li>
                            </ul>
                            <section id="first-tab-group" class="tabgroup">
                                <div id="tab1">
                                		<?php
											$multi = $_GET["multi"];
											$paper_title = $_GET["paper_title"];
											$Authorname = $_GET["Authorname"];
											$Conferencename = $_GET["Conferencename"];
											$perNumber=4; //每页显示的记录数
											$_page0=isset($_GET['page0'])? $_GET['page0'] : 1; //获得当前的页面值
											$_page1=isset($_GET['page1'])? $_GET['page1'] : 1; //获得当前的页面值
											$_page2=isset($_GET['page2'])? $_GET['page2'] : 1;
											$_page3=isset($_GET['page3'])? $_GET['page3'] : 1;
											$start0=($_page0-1)*$perNumber;
											$start1=($_page1-1)*$perNumber;
											$start2=($_page2-1)*$perNumber;
											$start3=($_page3-1)*$perNumber;
											$preveoustips = "previous page";
											$nexttips = "next page";



											if ($multi) {
												echo "Search for: ".$multi;
												echo "<br>";
												$ch = curl_init();
												$timeout = 5;
												$query = urlencode(str_replace(' ', '+', $multi));
												$url = "http://localhost:8983/solr/Paper_Search_System/select?indent=on&start=".$start0."&rows=".$perNumber."&q=Title:".$query."%20OR%20AuthorName:".$query."%20OR%20ConferenceName:".$query."&wt=json";

												curl_setopt ($ch, CURLOPT_URL, $url);
												curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
												curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
												$result = json_decode(curl_exec($ch), true);
												curl_close($ch);



												//搜索multi翻页（开始）
												$count= $result['response']['numFound']; //获得记录总数
												if ($count/$perNumber != 0){
													$totalPage = floor($count / $perNumber) +1;
												}else{
													$totalPage = floor($count / $perNumber);
												} //计算出总页数







												if ($_page0 != 1) { //页数不等于1
													$preveous = $_page0-1;
												echo "<button class='mdui-btn mdui-ripple'><a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$preveous&page1=$_page1&page2=$page2=$_page2&page3=$_page3\">$preveoustips </a></button>";
												}





													if ($totalPage <=10){
									                for($i=1; $i<=$totalPage; ++$i )
									                {
									                    echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$i&page1=$_page1&page2=$_page2&page3=$_page3\">$i </a>";
									                }
									            	}
									            	else{
									            		for ($i=1;$i<=min(5,$totalPage);$i++) { //循环显示出页面
															echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$i&page1=$_page1&page2=$_page2&page3=$_page3\">$i </a>";
															}
														echo " …… ";
														for ($i=5;$i>0;$i--){
															$end = $totalPage-$i;
														echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$end&page1=$_page1&page2=$_page2&page3=$_page3\">$end </a>";
													}
									            	}


													if ($_page0<$totalPage) { //如果page小于总页数,显示下一页链接
														$next = $_page0+1; 
													echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$next&page1=$_page1&page2=$_page2&page3=$_page3\">$nexttips </a>";
													}


												echo "<div align='center'>";
												echo "<div class='mdui-table-fluid' style='width:100%'>";
												echo "<table class='mdui-table mdui-table-hoverable' border=\"1\"><thead><tr><th>Title</th><th>Authors</th><th>Conference</th></tr></thead>";
												//表头
												// echo "<br><br>";

												//表格内容（搜索multi）（开始）
												foreach ($result['response']['docs'] as $paper) {
													echo "<tr>";
													echo "<td>";

													//输出Paper链接(开始)
														$paper_title = $paper['Title'];
														$paper_id = $paper['PaperID'];
														
														if (strlen($paper_title) > 35) {
															$s1 = '';
															$s2 = '';
															$ar = explode(' ', $paper_title);
															$len = count($ar);
															$cul = 0;
															$i = 0;
															for (; $i < $len; $i++) {
																$cul += strlen($ar[$i]);
																$s1 = $s1.' '.$ar[$i];
																if ($cul > 25) {
																	break;
																}
															}
															$i++;
															for (; $i < $len; $i++) {
																$s2 = $s2.' '.$ar[$i];
															}
															if (strlen($s2) > 35) {
																$s3 = '';
																$s4 = '';
																$ar1 = explode(' ', $s2);
																$len1 = count($ar1);
																$cul1 = 0;
																$i1 = 0;
																for (; $i1 < $len1; $i1++) {
																	$cul1 += strlen($ar1[$i1]);
																	$s3 = $s3.' '.$ar1[$i1];
																	if ($cul1 > 25) {
																		break;
																	}
																}
																$i1++;
																for (; $i1 < $len1; $i1++) {
																	$s4 = $s4.' '.$ar1[$i1];
																}
																if(strlen($s4) > 25){
																	$s5 = '';
																	$s6 = '';
																	$ar2 = explode(' ', $s4);
																	$len2 = count($ar2);
																	$cul2 = 0;
																	$i2 = 0;
																	for (; $i2 < $len2; $i2++) {
																		$cul2 += strlen($ar2[$i2]);
																		$s5 = $s5.' '.$ar2[$i2];
																		if ($cul2 > 25)
																		{
																			break;
																		}
																	}
																	$i2++;
																	for(;  $i2 <  $len2; $i2++ ){
																		$s6 = $s6.' '.$ar2[$i2];
																	}
																	echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s3<br/>$s5<br/>$s6</button>";
																}
																else{
																	echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s3<br/>$s4</button>";
																}
																
															}
															else
															{
																echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s2</button>";
															}

														} 
														else 
														{
															echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$paper_title</button>";
														}
														//输出Paper连接（结束）
													echo "</td>";

													echo "<td>";
													foreach ($paper['AuthorName'] as $idx => $author) {
														$author_id = $paper['AuthorID'][$idx];
														echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/author.php?author_id=$author_id\"'>$author;</button>";
													}
													echo "</td>";

													# 请补充针对Conference Name的显示
													//输出会议超链接（开始）
													$conference_id = $paper['ConferenceID'];
													$conference_name = $paper['ConferenceName'];
													echo "<td>";
													echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/conference.php?conference_id=$conference_id\"'>$conference_name</button>";
													echo "</td>";
													echo "</tr>";
												}
												echo "</table></div></div><br><br>";
											}
											?>
                                </div>
                                <div id="tab2">
                                		<?php
											$multi = $_GET["multi"];
											$paper_title = $_GET["paper_title"];
											$Authorname = $_GET["Authorname"];
											$Conferencename = $_GET["Conferencename"];
											$perNumber=4; //每页显示的记录数
											$_page0=isset($_GET['page0'])? $_GET['page0'] : 1; //获得当前的页面值
											$_page1=isset($_GET['page1'])? $_GET['page1'] : 1; //获得当前的页面值
											$_page2=isset($_GET['page2'])? $_GET['page2'] : 1;
											$_page3=isset($_GET['page3'])? $_GET['page3'] : 1;
											$start0=($_page0-1)*$perNumber;
											$start1=($_page1-1)*$perNumber;
											$start2=($_page2-1)*$perNumber;
											$start3=($_page3-1)*$perNumber;
											$preveoustips = "previous page";
											$nexttips = "next page";
											if ($paper_title) {
												echo "Search for Title: ".$paper_title;
												echo "<br>";
												$ch = curl_init();
												$timeout = 5;
												$query = urlencode(str_replace(' ', '+', $paper_title));
												$url = "http://localhost:8983/solr/Paper_Search_System/select?indent=on&start=".$start1."&rows=".$perNumber."&q=Title:".$query."&wt=json";

												curl_setopt ($ch, CURLOPT_URL, $url);
												curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
												curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
												$result = json_decode(curl_exec($ch), true);
												curl_close($ch);



												//搜索Title翻页（开始）
												$count= $result['response']['numFound']; //获得记录总数
												if ($count/$perNumber != 0){
													$totalPage = floor($count / $perNumber) +1;
												}else{
													$totalPage = floor($count / $perNumber);
												} //计算出总页数

												if ($_page1 != 1) { //页数不等于1
													$preveous = $_page1-1;
												echo "<button class='mdui-btn mdui-ripple'><a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$preveous&page2=$page2=$_page2&page3=$_page3\">$preveoustips </a></button>";
												}
													if ($totalPage <=10){
									                for($i=1; $i<=$totalPage; ++$i )
									                {
									                    echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$i&page2=$_page2&page3=$_page3\">$i </a>";
									                }
									            	}
									            	else{
									            		for ($i=1;$i<=min(5,$totalPage);$i++) { //循环显示出页面
															echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$i&page2=$_page2&page3=$_page3\">$i </a>";
															}
														echo " …… ";
														for ($i=5;$i>0;$i--){
															$end = $totalPage-$i;
														echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$end&page2=$_page2&page3=$_page3\">$end </a>";
													}
									            	}

													if ($_page1<$totalPage) { //如果page小于总页数,显示下一页链接
														$next = $_page1+1; 
													echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$next&page2=$_page2&page3=$_page3\">$nexttips </a>";
													}


												echo "<div align='center'>";
												echo "<div class='mdui-table-fluid' style='width:100%'>";
												echo "<table class='mdui-table mdui-table-hoverable' border=\"1\"><thead><tr><th>Title</th><th>Authors</th><th>Conference</th></tr></thead>";
												//表头

												//表格内容（搜索标题）（开始）
												foreach ($result['response']['docs'] as $paper) {
													echo "<tr>";
													echo "<td>";






												//输出Paper链接(开始)
													$paper_title = $paper['Title'];
													$paper_id = $paper['PaperID'];
													
													if (strlen($paper_title) > 35) {
														$s1 = '';
														$s2 = '';
														$ar = explode(' ', $paper_title);
														$len = count($ar);
														$cul = 0;
														$i = 0;
														for (; $i < $len; $i++) {
															$cul += strlen($ar[$i]);
															$s1 = $s1.' '.$ar[$i];
															if ($cul > 25) {
																break;
															}
														}
														$i++;
														for (; $i < $len; $i++) {
															$s2 = $s2.' '.$ar[$i];
														}
														if (strlen($s2) > 35) {
															$s3 = '';
															$s4 = '';
															$ar1 = explode(' ', $s2);
															$len1 = count($ar1);
															$cul1 = 0;
															$i1 = 0;
															for (; $i1 < $len1; $i1++) {
																$cul1 += strlen($ar1[$i1]);
																$s3 = $s3.' '.$ar1[$i1];
																if ($cul1 > 25) {
																	break;
																}
															}
															$i1++;
															for (; $i1 < $len1; $i1++) {
																$s4 = $s4.' '.$ar1[$i1];
															}
															if(strlen($s4) > 25){
																$s5 = '';
																$s6 = '';
																$ar2 = explode(' ', $s4);
																$len2 = count($ar2);
																$cul2 = 0;
																$i2 = 0;
																for (; $i2 < $len2; $i2++) {
																	$cul2 += strlen($ar2[$i2]);
																	$s5 = $s5.' '.$ar2[$i2];
																	if ($cul2 > 25)
																	{
																		break;
																	}
																}
																$i2++;
																for(;  $i2 <  $len2; $i2++ ){
																	$s6 = $s6.' '.$ar2[$i2];
																}
																echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s3<br/>$s5<br/>$s6</button>";
															}
															else{
																echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s3<br/>$s4</button>";
															}
															
														}
														else
														{
															echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s2</button>";
														}

													} 
													else 
													{
														echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$paper_title</button>";
														}
														//输出Paper连接（结束）
																




													echo "</td>";

													echo "<td>";
													foreach ($paper['AuthorName'] as $idx => $author) {
														$author_id = $paper['AuthorID'][$idx];
														echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/author.php?author_id=$author_id\"'>$author;</button>";
													}
													echo "</td>";

													# 请补充针对Conference Name的显示
													//输出会议超链接（开始）
													$conference_id = $paper['ConferenceID'];
													$conference_name = $paper['ConferenceName'];
													echo "<td>";
													echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/conference.php?conference_id=$conference_id\"'>$conference_name</button>";
													echo "</td>";
													echo "</tr>";
												}
												echo "</table></div></div><br><br>";
											}
											//表格内容（搜索标题）（结束）
											?>									


                                </div>
                                <div id="tab3">
                                		<?php
											$multi = $_GET["multi"];
											$paper_title = $_GET["paper_title"];
											$Authorname = $_GET["Authorname"];
											$Conferencename = $_GET["Conferencename"];
											$perNumber=4; //每页显示的记录数
											$_page0=isset($_GET['page0'])? $_GET['page0'] : 1; //获得当前的页面值
											$_page1=isset($_GET['page1'])? $_GET['page1'] : 1; //获得当前的页面值
											$_page2=isset($_GET['page2'])? $_GET['page2'] : 1;
											$_page3=isset($_GET['page3'])? $_GET['page3'] : 1;
											$start0=($_page0-1)*$perNumber;
											$start1=($_page1-1)*$perNumber;
											$start2=($_page2-1)*$perNumber;
											$start3=($_page3-1)*$perNumber;
											$preveoustips = "previous page";
											$nexttips = "next page";
											if ($Authorname) {
												echo "Search for Author: ".$Authorname;
												echo "<br>";
												$ch = curl_init();
												$timeout = 5;
												$query = urlencode(str_replace(' ', '+', $Authorname));
												$url = "http://localhost:8983/solr/Paper_Search_System/select?indent=on&start=".$start2."&rows=".$perNumber."&q=AuthorName:".$query."&wt=json";

												curl_setopt ($ch, CURLOPT_URL, $url);
												curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
												curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
												$result = json_decode(curl_exec($ch), true);
												curl_close($ch);



												//搜索Title翻页（开始）
												$count= $result['response']['numFound']; //获得记录总数
												if ($count/$perNumber != 0){
													$totalPage = floor($count / $perNumber) +1;
												}else{
													$totalPage = floor($count / $perNumber);
												} //计算出总页数

												if ($_page2 != 1) { //页数不等于1
													$preveous = $_page1-1;
												echo "<button class='mdui-btn mdui-ripple'><a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$_page1&page2=$page2=$preveous&page3=$_page3\">$preveoustips </a></button>";
												}
													if ($totalPage <=10){
									                for($i=1; $i<=$totalPage; ++$i )
									                {
									                    echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$_page1&page2=$i&page3=$_page3\">$i </a>";
									                }
									            	}
									            	else{
									            		for ($i=1;$i<=min(5,$totalPage);$i++) { //循环显示出页面
															echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$_page1&page2=$i&page3=$_page3\">$i </a>";
															}
														echo " …… ";
														for ($i=5;$i>0;$i--){
															$end = $totalPage-$i;
														echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$_page1&page2=$end&page3=$_page3\">$end </a>";
													}
									            	}

													if ($_page2<$totalPage) { //如果page小于总页数,显示下一页链接
														$next = $_page2+1; 
													echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$_page1&page2=$next&page3=$_page3\">$nexttips </a>";
													}


												echo "<div align='center'>";
												echo "<div class='mdui-table-fluid' style='width:100%'>";
												echo "<table class='mdui-table mdui-table-hoverable' border=\"1\"><thead><tr><th>Title</th><th>Authors</th><th>Conference</th></tr></thead>";
												//表头

												//表格内容（搜索标题）（开始）
												foreach ($result['response']['docs'] as $paper) {
													echo "<tr>";
													echo "<td>";






												//输出Paper链接(开始)
													$paper_title = $paper['Title'];
													$paper_id = $paper['PaperID'];
													
													if (strlen($paper_title) > 35) {
														$s1 = '';
														$s2 = '';
														$ar = explode(' ', $paper_title);
														$len = count($ar);
														$cul = 0;
														$i = 0;
														for (; $i < $len; $i++) {
															$cul += strlen($ar[$i]);
															$s1 = $s1.' '.$ar[$i];
															if ($cul > 25) {
																break;
															}
														}
														$i++;
														for (; $i < $len; $i++) {
															$s2 = $s2.' '.$ar[$i];
														}
														if (strlen($s2) > 35) {
															$s3 = '';
															$s4 = '';
															$ar1 = explode(' ', $s2);
															$len1 = count($ar1);
															$cul1 = 0;
															$i1 = 0;
															for (; $i1 < $len1; $i1++) {
																$cul1 += strlen($ar1[$i1]);
																$s3 = $s3.' '.$ar1[$i1];
																if ($cul1 > 25) {
																	break;
																}
															}
															$i1++;
															for (; $i1 < $len1; $i1++) {
																$s4 = $s4.' '.$ar1[$i1];
															}
															if(strlen($s4) > 25){
																$s5 = '';
																$s6 = '';
																$ar2 = explode(' ', $s4);
																$len2 = count($ar2);
																$cul2 = 0;
																$i2 = 0;
																for (; $i2 < $len2; $i2++) {
																	$cul2 += strlen($ar2[$i2]);
																	$s5 = $s5.' '.$ar2[$i2];
																	if ($cul2 > 25)
																	{
																		break;
																	}
																}
																$i2++;
																for(;  $i2 <  $len2; $i2++ ){
																	$s6 = $s6.' '.$ar2[$i2];
																}
																echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s3<br/>$s5<br/>$s6</button>";
															}
															else{
																echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s3<br/>$s4</button>";
															}
															
														}
														else
														{
															echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s2</button>";
														}

													} 
													else 
													{
														echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$paper_title</button>";
														}
														//输出Paper连接（结束）
																




													echo "</td>";

													echo "<td>";
													foreach ($paper['AuthorName'] as $idx => $author) {
														$author_id = $paper['AuthorID'][$idx];
														echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/author.php?author_id=$author_id\"'>$author;</button>";
													}
													echo "</td>";

													# 请补充针对Conference Name的显示
													//输出会议超链接（开始）
													$conference_id = $paper['ConferenceID'];
													$conference_name = $paper['ConferenceName'];
													echo "<td>";
													echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/conference.php?conference_id=$conference_id\"'>$conference_name</button>";
													echo "</td>";
													echo "</tr>";
												}
												echo "</table></div></div><br><br>";
											}
											//表格内容（搜索标题）（结束）
											?>	
                                </div>
                                <div id="tab4">
                                		<?php
											$multi = $_GET["multi"];
											$paper_title = $_GET["paper_title"];
											$Authorname = $_GET["Authorname"];
											$Conferencename = $_GET["Conferencename"];
											$perNumber=4; //每页显示的记录数
											$_page0=isset($_GET['page0'])? $_GET['page0'] : 1; //获得当前的页面值
											$_page1=isset($_GET['page1'])? $_GET['page1'] : 1; //获得当前的页面值
											$_page2=isset($_GET['page2'])? $_GET['page2'] : 1;
											$_page3=isset($_GET['page3'])? $_GET['page3'] : 1;
											$start0=($_page0-1)*$perNumber;
											$start1=($_page1-1)*$perNumber;
											$start2=($_page2-1)*$perNumber;
											$start3=($_page3-1)*$perNumber;
											$preveoustips = "previous page";
											$nexttips = "next page";
											if ($Conferencename) {
												echo "Search for Conference: ".$Conferencename;
												echo "<br>";
												$ch = curl_init();
												$timeout = 5;
												$query = urlencode(str_replace(' ', '+', $Conferencename));
												$url = "http://localhost:8983/solr/Paper_Search_System/select?indent=on&start=".$start3."&rows=".$perNumber."&q=ConferenceName:".$query."&wt=json";

												curl_setopt ($ch, CURLOPT_URL, $url);
												curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
												curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
												$result = json_decode(curl_exec($ch), true);
												curl_close($ch);



												//搜索Title翻页（开始）
												$count= $result['response']['numFound']; //获得记录总数
												if ($count/$perNumber != 0){
													$totalPage = floor($count / $perNumber) +1;
												}else{
													$totalPage = floor($count / $perNumber);
												} //计算出总页数

												if ($_page3 != 1) { //页数不等于1
													$preveous = $_page3-1;
												echo "<button class='mdui-btn mdui-ripple'><a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$_page1&page2=$page2=$_page2&page3=$preveous\">$preveoustips </a></button>";
												}
													if ($totalPage <=10){
									                for($i=1; $i<=$totalPage; ++$i )
									                {
									                    echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$_page1&page2=$_page2&page3=$i\">$i </a>";
									                }
									            	}
									            	else{
									            		for ($i=1;$i<=min(5,$totalPage);$i++) { //循环显示出页面
															echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$_page1&page2=$_page2&page3=$i\">$i </a>";
															}
														echo " …… ";
														for ($i=5;$i>0;$i--){
															$end = $totalPage-$i;
														echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$_page1&page2=$_page2&page3=$end\">$end </a>";
													}
									            	}

													if ($_page3<$totalPage) { //如果page小于总页数,显示下一页链接
														$next = $_page3+1; 
													echo "<a href=\"/search.php?multi=$multi&paper_title=$paper_title&Authorname=$Authorname&Conferencename=$Conferencename&page0=$_page0&page1=$_page1&page2=$_page2&page3=$next\">$nexttips </a>";
													}


												echo "<div align='center'>";
												echo "<div class='mdui-table-fluid' style='width:100%'>";
												echo "<table class='mdui-table mdui-table-hoverable' border=\"1\"><thead><tr><th>Title</th><th>Authors</th><th>Conference</th></tr></thead>";
												//表头

												//表格内容（搜索标题）（开始）
												foreach ($result['response']['docs'] as $paper) {
													echo "<tr>";
													echo "<td>";






												//输出Paper链接(开始)
													$paper_title = $paper['Title'];
													$paper_id = $paper['PaperID'];
													
													if (strlen($paper_title) > 35) {
														$s1 = '';
														$s2 = '';
														$ar = explode(' ', $paper_title);
														$len = count($ar);
														$cul = 0;
														$i = 0;
														for (; $i < $len; $i++) {
															$cul += strlen($ar[$i]);
															$s1 = $s1.' '.$ar[$i];
															if ($cul > 25) {
																break;
															}
														}
														$i++;
														for (; $i < $len; $i++) {
															$s2 = $s2.' '.$ar[$i];
														}
														if (strlen($s2) > 35) {
															$s3 = '';
															$s4 = '';
															$ar1 = explode(' ', $s2);
															$len1 = count($ar1);
															$cul1 = 0;
															$i1 = 0;
															for (; $i1 < $len1; $i1++) {
																$cul1 += strlen($ar1[$i1]);
																$s3 = $s3.' '.$ar1[$i1];
																if ($cul1 > 25) {
																	break;
																}
															}
															$i1++;
															for (; $i1 < $len1; $i1++) {
																$s4 = $s4.' '.$ar1[$i1];
															}
															if(strlen($s4) > 25){
																$s5 = '';
																$s6 = '';
																$ar2 = explode(' ', $s4);
																$len2 = count($ar2);
																$cul2 = 0;
																$i2 = 0;
																for (; $i2 < $len2; $i2++) {
																	$cul2 += strlen($ar2[$i2]);
																	$s5 = $s5.' '.$ar2[$i2];
																	if ($cul2 > 25)
																	{
																		break;
																	}
																}
																$i2++;
																for(;  $i2 <  $len2; $i2++ ){
																	$s6 = $s6.' '.$ar2[$i2];
																}
																echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s3<br/>$s5<br/>$s6</button>";
															}
															else{
																echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s3<br/>$s4</button>";
															}
															
														}
														else
														{
															echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s2</button>";
														}

													} 
													else 
													{
														echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$paper_title</button>";
														}
														//输出Paper连接（结束）
																




													echo "</td>";

													echo "<td>";
													foreach ($paper['AuthorName'] as $idx => $author) {
														$author_id = $paper['AuthorID'][$idx];
														echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/author.php?author_id=$author_id\"'>$author;</button>";
													}
													echo "</td>";

													# 请补充针对Conference Name的显示
													//输出会议超链接（开始）
													$conference_id = $paper['ConferenceID'];
													$conference_name = $paper['ConferenceName'];
													echo "<td>";
													echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/conference.php?conference_id=$conference_id\"'>$conference_name</button>";
													echo "</td>";
													echo "</tr>";
												}
												echo "</table></div></div><br><br>";
											}
											//表格内容（搜索标题）（结束）
											?>	
                                </div>



                            </section> 
                        </div>
                    </div>
                </div>
            </section>
            <section id="featured" class="content-section">
                <div class="section-heading">
                    <h1>WhynotMap<br><em>Content</em></h1>
                    <p>WhynotMap provides you with accurate and comprehensive 
                    <br>information including papers, authors and conferences.</p>
                </div>
                <div class="section-content">
                    <div class="owl-carousel owl-theme" >
                        <div class="item"> <!-- 1 -->
                            <div class="image">
                                <img src="img/index_title.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#contact">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Paper</h4>
                                <span>Search by title</span>
                                <p>#1 <br>Comprehensive infomation about papers.</p>
                            </div>
                        </div>
                        <div class="item"> <!-- 2 -->
                            <div class="image">
                                <img src="img/index_planck.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#contact">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Author</h4>
                                <span>Search by author name</span>
                                <p>#2 <br>Comprehensive authors' information.</p>
                            </div>
                        </div>
                        <div class="item"> <!-- 3 -->
                            <div class="image">
                                <img src="img/index_conference.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#contact">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Conference</h4>
                                <span>Search by conference name</span>
                                <p>#3<br>Comprehensive conferences' information.</p>
                            </div>
                        </div>  
                    </div>
                </div>
            </section>
            <section id="contact" class="content-section">
                <div id="contact-content">
                    <div class="section-heading">
                        <h1>Contact<br><em>WhynotMap</em></h1>
                        <p>Your feedback matters.
                        <br>Send us message. </p>
                        
                    </div>
                    <div class="section-content">
                        <form id="contact" action="#" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                  <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-4">
                                  <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                                  </fieldset>
                                </div>
                                 <div class="col-md-4">
                                  <fieldset>
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Send Message Now</button>
                                  </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <section class="footer">
                <p>Copyright &copy; 2019 WhynotMap 
                
                . Design: He Tairan</p>
            </section>
        </div>


    <script src="js/vendor/jquery-1.11.2.min.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script> -->

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script>
        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('header').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();
            
            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;
            
            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight){
                // Scroll Down
                $('header').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    $('header').removeClass('nav-up').addClass('nav-down');
                }
            }
            
            lastScrollTop = st;
        }
    </script>

    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script> -->

</body>
</html>


