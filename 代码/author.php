
<!DOCTYPE html> 
<html>
<head>
<!-- <title>search page </title>
 --><style type="text/css">
    body {
        text-align: center;
    }
</style>
<link rel="stylesheet" href="mdui.css">
</head>
</html>

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





    <!-- 引入 echarts.js -->
    <script src="echarts.js"></script>
    <script src="theme/vintage.js"></script>
    <script src="theme/shine.js"></script>
    <script src="theme/macarons.js"></script>
    <script src="theme/roma.js"></script>
    <script src="theme/dark.js"></script>
    <script src="theme/infographic.js"></script>

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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#blog">Search Entries</a></li>
                        <li><a href="#projects">Radar Graph</a></li>
                        <li><a href="#featured">Paper Graph</a></li>
                        <li><a href="#aff">Affiliation Graph</a></li>
                        <li><a href="#contact">Relation Graph</a></li>
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
                        <a href="index.html">
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
                        <a href="#projects">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Radar Graph
                        </a>
                    </li>
                   
                    <li>
                        <a href="#featured">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Paper Graph
                        </a>
                    </li>
                    <li>
                        <a href="#aff">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Affiliation Graph

                        </a>
                    </li>
                    <li>
                        <a href="#contact">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Relation Graph
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
                <?php 

                                    echo "<div class='mdui-card' style='height: 300px'><div style='width:50%;display:inline-block;margin:3% 5%'>";
                    $author_id = $_GET["author_id"];
                    $link = mysqli_connect("localhost:3306", 'root', 'neal5060066', 'test');

                    echo "<br><br>";

                    $result_author = mysqli_query($link, "SELECT AuthorName from authors where AuthorID='$author_id'");

                    if ($result_author) {                                                   
                        $author_name = mysqli_fetch_array($result_author)['AuthorName'];
                        echo "<script type=\"text/javascript\"> var author_name = \"$author_name\" ";
                        echo "</script>";

                    // var author_name="$author_name";

                        echo "Name: $author_name<br><br>";
                    } else {
                        echo "Name not found";
                    }

                    echo "<br><br>";
                    $result_affiliation = mysqli_query($link, "SELECT affiliations.AffiliationID, affiliations.AffiliationName from (select AffiliationID, count(*) as cnt from paper_author_affiliation where AuthorID='$author_id' and AffiliationID is not null group by AffiliationID order by cnt desc) as tmp inner join affiliations on tmp.AffiliationID = affiliations.AffiliationID");
                    # 请补充对主要机构名的显示
                    $main = mysqli_fetch_array($result_affiliation);
                    echo "Main Affiliation: ".$main['AffiliationName'] ;
                    echo "<br><br>";



                    echo "</div><div style='z-index:10;float:right;height: 110%;width:40%; background-size:contain|cover;'><img src='img/card' style='width:100%;height:100%;margin:0 0' /></div></div>";
                    echo "<br><br>";
                 ?>
                <div class="section-content">
                    <div class="tabs-content">
                        <div class="wrapper">
                            <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                              <li><a href="#tab1" class="active">Radar</a></li>
                              <li><a href="#tab2">Graph</a></li>
                              <li><a href="#tab3">Relation</a></li>
                              <li><a href="#tab4">Paper</a></li>


                            </ul>
                            <section id="first-tab-group" class="tabgroup">
                                <div id="tab1">
                                    <ul>
                                        <li style="width: 100%">
                                            <div class="item">
                                                <img src="img/author_radar.png" alt="">
                                                <div class="text-content">
                                                    <h4>Radar Graph</h4>
                                                    <span>in four dimensions</span>
                                                    <p>At WhynotMap, we offer you the best radar graph to judge the capability of an anthor. The graph is based on 4 basic datas: Papers, Citations, CCP(Citation Per Paper) and H-index.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#projects">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>                                
                                    </ul>    
                                </div>
                                <div id="tab2">
                                    <ul>
                                        <li style="width: 100%">
                                            <div class="item">
                                                <img src="img/author_bargraph.png" alt="">
                                                <div class="text-content">
                                                    <h4>Papers of all time</h4>
                                                    <span>Bar Graph</span>
                                                    <p>WhynotMap provides you with Bar Graph of all time which enables you to have a brief and clear view of how many papers the author published every yeay. Clink or swap to zoom the Graph.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#featured">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li style="width: 100%">
                                            <div class="item">
                                                <img src="img/author_affiliation" alt="">
                                                <div class="text-content">
                                                    <h4>Affiliation of all time</h4>
                                                    <span>Pie Graph</span>
                                                    <p>WhynotMap provides you with Pie Graph of all time which enables you to have a brief and clear view of how many papers the author published from a specific affiliation.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#aff">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="tab3">
                                    <ul>
                                        <li style="width: 100%">
                                            <div class="item">
                                                <img src="img/author_relation.png" alt="">
                                                <div class="text-content">
                                                    <h4>Cooperations of all time</h4>
                                                    <span>Force Graph</span>
                                                    <p>WhynotMap provides you with Force Graph of all time which enables you to have a brief and clear view of who the author has cooperated with and how many times they have cooperated. Swap to zoom the Graph.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div id="tab4">
                                    <?php                                          
                                        $perNumber=4; //每页显示的记录数
                                        $_page1=isset($_GET['page1'])? $_GET['page1'] : 1;
                                        $start1=($_page1-1)*$perNumber;
                                        $preveoustips = "previous page";
                                        $nexttips = "next page";  
                                        $author_id = $_GET['author_id'];
                                        $link = mysqli_connect("localhost:3306", 'root', 'neal5060066', 'test');
                                        $result = mysqli_query($link, "SELECT PaperID from paper_author_affiliation where AuthorID='$author_id' LIMIT $start1,$perNumber");
                                        if ($result) {


                                            //获得搜索总条数¥count 
                                            $result_count = mysqli_query($link, "SELECT COUNT(*) as number FROM paper_author_affiliation where AuthorID='$author_id' ");
                                            $count = mysqli_fetch_array($result_count)['number'];

                                            if ($count/$perNumber != 0){
                                                $totalPage = floor($count / $perNumber) +1;
                                            }else{
                                                $totalPage = floor($count / $perNumber);
                                            } 
                                            //计算出总页数
                                            
                                            if ($_page1 != 1) 
                                            { //页数不等于1
                                                        $preveous = $_page1-1;
                                                        echo "<button class='mdui-btn mdui-ripple'><a href=\"/author.php?author_id=$author_id&page1=$preveous\">$preveoustips </a></button>";
                                            }
                                            if ($totalPage <=10){
                                                for($i=1; $i<=$totalPage; ++$i )
                                                {
                                                    echo "<a href=\"/author.php?author_id=$author_id&page1=$i\">$i </a>";
                                                }
                                            }
                                            else{
                                                    
                                                    for ($i=1;$i<=min(5,$totalPage);$i++) 
                                                    { //循环显示出页面
                                                            echo "<a href=\"/author.php?author_id=$author_id&page1=$i\">$i </a>";
                                                    }
                                                    echo " …… ";
                                                    for ($i=5;$i>0;$i--)
                                                    {
                                                        $end = $totalPage-$i;
                                                        echo "<a href=\"/author.php?author_id=$author_id&page1=$end\">$end </a>";
                                                    }
                                                    
                                            }
                                            if ($_page1<$totalPage) 
                                                    { //如果page小于总页数,显示下一页链接
                                                        $next = $_page1+1; 
                                                        echo "<a href=\"/author.php?author_id=$author_id&page1=$next\">$nexttips </a>";
                                            }
                                                
                                            
                                            //搜索Title翻页（结束）






                                            echo "<div align='center'>";
                                            echo "<div class='mdui-table-fluid' style='width:100%'>";
                                            echo "<table class='mdui-table mdui-table-hoverable' border=\"1\"><thead><tr><th>Title</th><th>Authors</th><th>Conference</th></tr></thead>";
                                            //表头
                                            // echo "<br><br>";


                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                $paper_id = $row['PaperID'];
                                                # 请增加对mysqli_query查询结果是否为空的判断
                                                $paper_info = mysqli_fetch_array(mysqli_query($link, "SELECT Title, ConferenceID from papers where PaperID='$paper_id'"));
                                                $paper_title = $paper_info['Title'];
                                                $conf_id = $paper_info['ConferenceID'];
                                                
                                                echo "<td>";
                                                if (strlen($paper_title) > 40) {
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
                                                        if (strlen($s2) > 40) {
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
                                                            echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/paper.php?paper_id=$paper_id\"'  style='text-align:left'>$s1<br/>$s3<br/>$s4</button>";
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
                                                    //输出Paper连接（结束）                echo "</td>";
                                                # 请增加根据paper id在PaperAuthorAffiliations与Authors两个表中进行联合查询，找到根据AuthorSequenceNumber排序的作者列表，并且显示出来的部分
                                                
                                                $auth_check = mysqli_query($link, "SELECT AuthorName, paper_author_affiliation.AuthorID FROM paper_author_affiliation INNER JOIN authors ON paper_author_affiliation.AuthorID=authors.AuthorID WHERE PaperID='$paper_id' ORDER BY AuthorSequence");
                                                if($auth_check) # 检查是否为空
                                                {
                                                    echo "<td>";
                                                    while($auth_info = mysqli_fetch_array($auth_check))
                                                    {
                                                        $auth_name=$auth_info['AuthorName'];
                                                        $auth_id=$auth_info['AuthorID'];
                                                        echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/author.php?author_id=$auth_id\"'>$auth_name;</button>";
                                                    }
                                                    echo "</td>";
                                                }
                                                else
                                                {
                                                    echo "AuthorName not found";
                                                }


                                                # 请补充根据$conf_id查询conference name并显示的部分

                                                $conf_check = mysqli_query($link,"SELECT ConferenceName,ConferenceID from conferences where ConferenceID='$conf_id'");
                                                if($conf_check)
                                                {
                                                    $conf_info = mysqli_fetch_array($conf_check);
                                                    $conf_name = $conf_info['ConferenceName'];
                                                    $conf_id = $conf_info['ConferenceID'];
                                                    echo "<td>";
                                                    echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/conference.php?conference_id=$conf_id\"'>$conf_name</button>";    
                                                    echo "</td>";                
                                                    echo "</tr>";
                                                }
                                                else
                                                {
                                                    echo "Conference not found";
                                                }
                                            }
                                            
                                            echo "</table>";
                                        }
                                        else
                                        {
                                            echo "PaperID not found";
                                        }





















                                    ?>

                                </div>


                                


                                    
                                
                            </section> 
                        </div>
                    </div>
                </div>
            </section>

            <section id="projects" class="content-section">
                <div class="section-heading">
                    <h1>Radar<br><em>Graph</em></h1>
                    <p>Papers & Citations <br>CPP & H-index
                    </p>
                </div>
                
                <div class="section-content">
                    <?php 



                    // echo "<div class='mdui-card' style='height: 300px'><div style='width:50%;display:inline-block;margin:3% 5%'>";
                    // $author_id = $_GET["author_id"];
                    // $link = mysqli_connect("localhost:3306", 'root', 'neal5060066', 'test');


                    // $result_author = mysqli_query($link, "SELECT AuthorName from authors where AuthorID='$author_id'");

                    // if ($result_author) {                                                   
                    //     $author_name = mysqli_fetch_array($result_author)['AuthorName'];
                    //     echo "<script type=\"text/javascript\"> var author_name = \"$author_name\" ";
                    //     echo "</script>";

                    // // var author_name="$author_name";

                    //     echo "Name: $author_name<br><br>";
                    // } else {
                    //     echo "Name not found";
                    // }


                    // $result_affiliation = mysqli_query($link, "SELECT affiliations.AffiliationID, affiliations.AffiliationName from (select AffiliationID, count(*) as cnt from paper_author_affiliation where AuthorID='$author_id' and AffiliationID is not null group by AffiliationID order by cnt desc) as tmp inner join affiliations on tmp.AffiliationID = affiliations.AffiliationID");
                    // # 请补充对主要机构名的显示
                    // $main = mysqli_fetch_array($result_affiliation);
                    // echo "Main Affiliation: ".$main['AffiliationName'] ;
                    // echo "<br><br>";



                    // echo "</div><div style='z-index:10;float:right;height: 110%;width:40%; background-size:contain|cover;'><img src='img/card' style='width:100%;height:100%;margin:0 0' /></div></div>";







                    $result_star = mysqli_query($link, "SELECT i_paper,i_citation,CPP,i_H,whynotstar from whynotstar where AuthorID='$author_id'");
                    $i_paper = 0;
                    $i_citation  = 0;
                    $format_CPP = 0;
                    $i_H = 0;
                    $whynotstar = 0;
                    $auth=mysqli_fetch_array($result_star);
                    $i_paper = $auth['i_paper'];
                    $i_citation = $auth['i_citation'];
                    $format_CPP = $auth['CPP'];
                    $i_H = $auth['i_H'];
                    $whynotstar = $auth['whynotstar'];
                    
                    echo "whynot star";            
                    for ($i=0; $i <$whynotstar ; $i++) { 
                        echo "🌟";
                    }
                    echo "<br><br><br>";

                            
                    echo "<script type=\"text/javascript\">var PAPER =$i_paper;";
                    echo "var CITATION = $i_citation;";
                    echo "var CPP = $format_CPP;";
                    echo "var H_index =$i_H; </script>";

                 ?>




                    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                <div id="radar" style="width: 600px;height:400px;margin: 0 auto"></div>
                    <script type="text/javascript">
                        // 基于准备好的dom，初始化echarts实例
                        var myChart = echarts.init(document.getElementById('radar'));

                        var dataBJ = [
                            [Math.sqrt(PAPER/167),Math.sqrt(CITATION/1000),Math.sqrt(CPP/50),Math.sqrt(H_index/30)],
                        ];

                        var lineStyle = {
                            normal: {
                                width: 3,
                                opacity: 1
                            }
                        };

                        option = {
                            backgroundColor: '#45489a',
                            title: {
                                text: 'Radar',
                                left: 'left',
                                textStyle: {
                                    color: '#eee'
                                }
                            },
                            legend: {
                                bottom: 5,
                                data: [author_name],
                                left: 'left',
                                itemGap: 20,
                                textStyle: {
                                    color: '#fff',
                                    fontSize: 14
                                },
                                selectedMode: 'single'
                            },

                            radar: {
                                indicator: [
                                    {name: 'PAPER: '+PAPER, max: 1},
                                    {name: 'CITATION: \n'+CITATION+"        ", max: 1},
                                    {name: 'CPP: '+CPP, max: 1},
                                    {name: 'H-index: \n     '+H_index, max: 1}
                                ],
                                shape: 'circle',
                                splitNumber: 5,
                                name: {
                                    textStyle: {
                                        color: 'rgb(238, 197, 102)'
                                    }
                                },
                                splitLine: {
                                    lineStyle: {
                                        color: [
                                            'rgba(238, 197, 102, 0.2)', 'rgba(238, 197, 102, 0.2)',
                                            'rgba(238, 197, 102, 0.2)', 'rgba(238, 197, 102, 0.2)'
                                        ].reverse()
                                    }
                                },
                                splitArea: {
                                    show: false
                                },
                                axisLine: {
                                    lineStyle: {
                                        color: 'rgba(238, 197, 102, 0.3)'
                                    }
                                }
                            },
                            series: [
                                {
                                    name: author_name,
                                    type: 'radar',
                                    lineStyle: lineStyle,
                                    data: dataBJ,
                                    symbol: 'none',
                                    itemStyle: {
                                        normal: {
                                            color: '#F9713C'
                                        }
                                    },
                                    areaStyle: {
                                        normal: {
                                            opacity: 0.1
                                        }
                                    }
                                }
                            ]
                        };

                        // 使用刚指定的配置项和数据显示图表。
                        myChart.setOption(option);

                    </script>
                    <br>
                    <br>
                    <div class="accent-button button">  
                        <a href="#featured">Continue Reading</a>
                    </div>

                </div>            
            </section>




























            <section id="featured" class="content-section">
                <div class="section-heading">
                    <h1>Paper<br><em>Graph</em></h1>
                    <p>Papers of all time <br>Enjoy searching!</p>
                </div>





                <?php 
                    $eesult_totalpaper = "SELECT distinct PaperPublishYear FROM paper_author_affiliation INNER JOIN papers WHERE paper_author_affiliation.AuthorID = '$author_id' and papers.PaperID =  paper_author_affiliation.PaperID ORDER BY PaperPublishYear asc";
                    $total_paper = mysqli_fetch_all(mysqli_query($link,$eesult_totalpaper));
                    $allyear = array();
                    foreach ($total_paper as $year ) 
                    {
                        array_push($allyear, $year[0]);
                    }
                    $a = array();



                    foreach ($total_paper as $year)
                    {
                        
                        $eesult_papersearch = "SELECT count(*) as cnt FROM paper_author_affiliation INNER JOIN papers WHERE papers.PaperPublishYear = $year[0] and paper_author_affiliation.AuthorID = '$author_id' and papers.PaperID = paper_author_affiliation.PaperID";
                        $paper_search = mysqli_fetch_array(mysqli_query($link, $eesult_papersearch));
                        $allpaper = $paper_search['cnt'];
                        array_push($a, $allpaper);

                    }
                    
                    $b = array();
                    foreach ($total_paper as $year)
                    {
                        $eesult_firstsearch = "SELECT count(*) as cnt from paper_author_affiliation INNER JOIN papers WHERE papers.PaperPublishYear = $year[0] and paper_author_affiliation.AuthorID = '$author_id' and papers.PaperID = paper_author_affiliation.PaperID and paper_author_affiliation.AuthorSequence = 1";
                        $first_search= mysqli_fetch_array(mysqli_query($link,$eesult_firstsearch));
                        $firstpaper = $first_search['cnt'];
                        array_push($b,  $firstpaper);
                    }
                    $c = array();
                    foreach ($a as $idx => $num)
                    {
                        array_push($c, $a[$idx]-$b[$idx]);
                    }



                    echo "<script type=\"text/javascript\"> var all_year = ".json_encode($allyear).";";
                    echo "var total_paper = ".json_encode($a).";";
                    echo "var first_paper = ".json_encode($b).";";
                    echo "var notfirst_paper = ".json_encode($c).";";
                    echo "</script>";
                 ?>




                <div class="section-content">
                    <div class="owl-carousel owl-theme">
                        <div class="item"> <!-- 1 -->
                            <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                            <div id="total_paper" style="width: 850px;height:550px;margin:0 auto"></div>
                            <script type="text/javascript">
                                // 基于准备好的dom，初始化echarts实例
                                var myChart = echarts.init(document.getElementById('total_paper'));
                                var dataAxis = all_year;
                                var data = total_paper;
                                var yMax = Math.max.apply(null, data);
                                var dataShadow = [];

                                for (var i = 0; i < data.length; i++) {
                                    dataShadow.push(yMax);
                                }

                                option = {
                                    title: {
                                        text: 'Papers of all time',
                                        subtext: 'Click to Zoom'
                                    },
                                xAxis: {
                                    data: all_year,
                                    axisLabel: {
                                        inside: true,
                                        textStyle: {
                                            color: '#fff'
                                    }
                                    },
                                axisTick: {
                                    show: false
                                    },
                                axisLine: {
                                    show: false
                                    },
                                z: 10
                                    },
                                yAxis: {
                                    axisLine: {
                                        show: false
                                    },
                                    axisTick: {
                                        show: false
                                    },
                                    axisLabel: {
                                        textStyle: {
                                            color: '#999'
                                        }
                                    }
                                },
                                dataZoom: [
                                    {
                                        type: 'inside'
                                    }
                                ],
                                series: [
                                    { // For shadow
                                        type: 'bar',
                                        itemStyle: {
                                            normal: {color: 'rgba(0,0,0,0.05)'}
                                        },
                                        barGap:'-100%',
                                        barCategoryGap:'40%',
                                        data: dataShadow,
                                        animation: true
                                    },
                                    {
                                        type: 'bar',
                                        itemStyle: {
                                            normal: {
                                                color: new echarts.graphic.LinearGradient(
                                                    0, 0, 0, 1,
                                                    [
                                                        {offset: 0, color: '#09F7F7'},
                                                        {offset: 0.5, color: '#188df0'},
                                                        {offset: 1, color: '#3F60E2'}
                                                    ]
                                                )
                                            },
                                            emphasis: {
                                                color: new echarts.graphic.LinearGradient(
                                                    0, 0, 0, 1,
                                                    [
                                                        {offset: 0, color: '#FFFF00'},
                                                        {offset: 0.7, color: '#F79709'},
                                                        {offset: 1, color: '#EE6911'}
                                                    ]
                                                )
                                            }
                                        },
                                        data: data
                                    }
                                ]
                                };

                                // Enable data zoom when user click bar.
                                var zoomSize = 6;
                                myChart.on('click', function (params) {
                                    console.log(dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)]);
                                    myChart.dispatchAction({
                                        type: 'dataZoom',
                                        startValue: dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)],
                                        endValue: dataAxis[Math.min(params.dataIndex + zoomSize / 2, data.length - 1)]
                                    });
                                });

                                // 使用刚指定的配置项和数据显示图表。
                                myChart.setOption(option);

                            </script>
                            

                        </div>

                        <div class="item"> <!-- 2 -->

                        </div>
                        <div class="item"> <!-- 3 -->
                               
                        </div>

                        <div class="item"> <!-- 4 -->
                            <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                            <div id="first_paper" style="width: 850px;height:550px;margin:0 auto;"></div>
                                <script type="text/javascript">
                                    // 基于准备好的dom，初始化echarts实例
                                    var myChart = echarts.init(document.getElementById('first_paper'));
                                    var dataAxis = all_year;
                                    var data = first_paper;
                                    var yMax = Math.max.apply(null, data);
                                    var dataShadow = [];

                                    for (var i = 0; i < data.length; i++) {
                                        dataShadow.push(yMax);
                                    }

                                    option = {
                                        title: {
                                            text: 'Papers of the first author',
                                            subtext: 'Click to Zoom'
                                        },
                                    xAxis: {
                                        data: all_year,
                                        axisLabel: {
                                            inside: true,
                                            textStyle: {
                                                color: '#fff'
                                        }
                                        },
                                    axisTick: {
                                        show: false
                                        },
                                    axisLine: {
                                        show: false
                                        },
                                    z: 10
                                        },
                                    yAxis: {
                                        axisLine: {
                                            show: false
                                        },
                                        axisTick: {
                                            show: false
                                        },
                                        axisLabel: {
                                            textStyle: {
                                                color: '#999'
                                            }
                                        }
                                    },
                                    dataZoom: [
                                        {
                                            type: 'inside'
                                        }
                                    ],
                                    series: [
                                        { // For shadow
                                            type: 'bar',
                                            itemStyle: {
                                                normal: {color: 'rgba(0,0,0,0.05)'}
                                            },
                                            barGap:'-100%',
                                            barCategoryGap:'40%',
                                            data: dataShadow,
                                            animation: true
                                        },
                                        {
                                            type: 'bar',
                                            itemStyle: {
                                                normal: {
                                                    color: new echarts.graphic.LinearGradient(
                                                        0, 0, 0, 1,
                                                        [
                                                            {offset: 0, color: '#09F7F7'},
                                                            {offset: 0.5, color: '#188df0'},
                                                            {offset: 1, color: '#3F60E2'}
                                                        ]
                                                    )
                                                },
                                                emphasis: {
                                                    color: new echarts.graphic.LinearGradient(
                                                        0, 0, 0, 1,
                                                        [
                                                            {offset: 0, color: '#FFFF00'},
                                                            {offset: 0.7, color: '#F79709'},
                                                            {offset: 1, color: '#EE6911'}
                                                        ]
                                                    )
                                                }
                                            },
                                            data: data
                                        }
                                    ]
                                    };

                                    // Enable data zoom when user click bar.
                                    var zoomSize = 6;
                                    myChart.on('click', function (params) {
                                        console.log(dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)]);
                                        myChart.dispatchAction({
                                            type: 'dataZoom',
                                            startValue: dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)],
                                            endValue: dataAxis[Math.min(params.dataIndex + zoomSize / 2, data.length - 1)]
                                        });
                                    });

                                    // 使用刚指定的配置项和数据显示图表。
                                    myChart.setOption(option);

                                </script>
                            
                        </div>
                        <div class="item"> <!-- 5 -->
                            
                        </div>
                        <div class="item"> <!-- 6 -->
             
                        </div>
                        <div class="item"> <!-- 7 -->
                            <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                            <div id="notfirst_paper" style="width: 850px;height:550px; margin: 0 auto;"></div>
                                <script type="text/javascript">
                                    // 基于准备好的dom，初始化echarts实例
                                    var myChart = echarts.init(document.getElementById('notfirst_paper'));
                                    var dataAxis = all_year;
                                    var data = notfirst_paper;
                                    var yMax = Math.max.apply(null, data);
                                    var dataShadow = [];

                                    for (var i = 0; i < data.length; i++) {
                                        dataShadow.push(yMax);
                                    }

                                    option = {
                                        title: {
                                            text: 'Papers of not first author',
                                            subtext: 'Click to Zoom'
                                        },
                                    xAxis: {
                                        data: all_year,
                                        axisLabel: {
                                            inside: true,
                                            textStyle: {
                                                color: '#fff'
                                        }
                                        },
                                    axisTick: {
                                        show: false
                                        },
                                    axisLine: {
                                        show: false
                                        },
                                    z: 10
                                        },
                                    yAxis: {
                                        axisLine: {
                                            show: false
                                        },
                                        axisTick: {
                                            show: false
                                        },
                                        axisLabel: {
                                            textStyle: {
                                                color: '#999'
                                            }
                                        }
                                    },
                                    dataZoom: [
                                        {
                                            type: 'inside'
                                        }
                                    ],
                                    series: [
                                        { // For shadow
                                            type: 'bar',
                                            itemStyle: {
                                                normal: {color: 'rgba(0,0,0,0.05)'}
                                            },
                                            barGap:'-100%',
                                            barCategoryGap:'40%',
                                            data: dataShadow,
                                            animation: true
                                        },
                                        {
                                            type: 'bar',
                                            itemStyle: {
                                                normal: {
                                                    color: new echarts.graphic.LinearGradient(
                                                        0, 0, 0, 1,
                                                        [
                                                            {offset: 0, color: '#09F7F7'},
                                                            {offset: 0.5, color: '#188df0'},
                                                            {offset: 1, color: '#3F60E2'}
                                                        ]
                                                    )
                                                },
                                                emphasis: {
                                                    color: new echarts.graphic.LinearGradient(
                                                        0, 0, 0, 1,
                                                        [
                                                            {offset: 0, color: '#FFFF00'},
                                                            {offset: 0.7, color: '#F79709'},
                                                            {offset: 1, color: '#EE6911'}
                                                        ]
                                                    )
                                                }
                                            },
                                            data: data
                                        }
                                    ]
                                    };

                                    // Enable data zoom when user click bar.
                                    var zoomSize = 6;
                                    myChart.on('click', function (params) {
                                        console.log(dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)]);
                                        myChart.dispatchAction({
                                            type: 'dataZoom',
                                            startValue: dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)],
                                            endValue: dataAxis[Math.min(params.dataIndex + zoomSize / 2, data.length - 1)]
                                        });
                                    });

                                    // 使用刚指定的配置项和数据显示图表。
                                    myChart.setOption(option);

                                </script>            
                        </div>
                        <div class="item"> <!-- 8 -->
                            
                        </div>
                        <div class="item"> <!-- 9 -->
                               
                        </div>
                    </div>
                </div>
                <div class="accent-button button" style="margin: 0 auto">
                    <a href="#aff">Continue Reading</a>
                </div>
            </section>




            <section id="aff" class="content-section">
                <div class="section-heading" style="margin-left: 60px">
                    <h1>Affiliation<br><em>Graph</em></h1>
                    <p>Check infomation <br> of affiliations</p>
                </div>
                <!-- 从mysql找conference数据-->
                    <?php
                        $confsearch = "SELECT AffiliationName,cnt from  (SELECT AffiliationID, count(*) as cnt from test.paper_author_affiliation where AuthorID='$author_id' and AffiliationID is not null group by AffiliationID order by cnt desc) as temp inner join test.affiliations where temp.AffiliationID = affiliations.AffiliationID";
                        $result = mysqli_fetch_all(mysqli_query($link,$confsearch));
                        $confname = array();
                        $confnum = array();
                        foreach ($result as $conf)
                        {
                            array_push($confname, $conf[0]);
                            array_push($confnum, $conf[1]);
                        }
                        echo "<script type=\"text/javascript\">var confname =".json_encode($confname).";";
                        echo "var count = $count;";
                        echo "var confnum =".json_encode($confnum)."; </script>";
                    ?>

                 
                <!-- affiliation的表 -->
                    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                    <div id="affiliation" style="width: 600px;height:450px; margin: 0 auto"></div>
                    <script type="text/javascript">
                        // 基于准备好的dom，初始化echarts实例
                        var chart = echarts.init(document.getElementById('affiliation'), 'light');
                        var data = genData(50);
                        var len = confnum.length-1;
                        var lengend_data = new Array();
                        for (var i = len - 1; i >= 0; i--) {
                            lengend_data.push(confname[i]);
                        }
                        var series_data = new Array();
                        for (var i = len - 1; i >= 0; i--) {
                            series_data.push({
                            name: confname[i],
                            value: confnum[i]
                        })
                        }
                        var selected_data = len;
                    option = {
                        title : {
                        text: 'Affiliation',
                        // subtext: '纯属虚构',
                        x:'center'
                        },
                    tooltip : {
                        trigger: 'item',
                        formatter: "{a} <br/>{b} : {c} ({d}%)"
                    },
                    legend: {
                        type: 'scroll',
                        orient: 'vertical',
                        right: 10,
                        top: 20,
                        bottom: 20,
                        data: lengend_data,


                        // data.legendData,

                        selected: selected_data

                        // data.selected
                    },
                    series : [
                        {
                            name: 'Affiliation',
                            type: 'pie',
                            radius : '55%',
                            center: ['40%', '50%'],
                            data: series_data,

                            // data.seriesData,
                            itemStyle: {
                                emphasis: {
                                    shadowBlur: 10,
                                    shadowOffsetX: 0,
                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                }
                            }
                        }
                    ]
                };




                function genData(count) {
                    var nameList = [];
                    var legendData = [];
                    var seriesData = [];
                    var selected = {};
                    for (var i = 0; i < 50; i++) {
                        name = Math.random() > 0.65
                            ? makeWord(4, 1) + '·' + makeWord(3, 0)
                            : makeWord(2, 1);
                        legendData.push(name);
                        seriesData.push({
                            name: name,
                            value: Math.round(Math.random() * 100000)
                        });
                        selected[name] = i < 6;
                    }

                    return {
                        legendData: legendData,
                        seriesData: seriesData,
                        selected: selected
                    };

                    function makeWord(max, min) {
                        var nameLen = Math.ceil(Math.random() * max + min);
                        var name = [];
                        for (var i = 0; i < nameLen; i++) {
                            name.push(nameList[Math.round(Math.random() * nameList.length - 1)]);
                        }
                        return name.join('');
                    }
                }
                chart.setOption(option);


                    </script>
                <div class="accent-button button">
                    <a href="#contact">Continue Reading</a>
                </div>
                   
            </section>






            <section id="contact" class="content-section">
                <div id="contact-content">
                    <div class="section-heading">
                        <h1>Relation<br><em>Graph</em></h1>
                        <p>WhynotMap provides you with force map
                        <br>in order to show the cooperation.</p>
                        
                    </div>
                    <?php  
                        $eesult_relation = "SELECT t.cnt, AuthorName, t.AuthorID from (SELECT AuthorID , count(*) as cnt FROM (SELECT PaperID FROM test.paper_author_affiliation WHERE AuthorID ='$author_id') AS temp INNER JOIN test.paper_author_affiliation on temp.PaperID = paper_author_affiliation.PaperID WHERE paper_author_affiliation.AuthorID != '$author_id' GROUP BY AuthorID ORDER BY cnt DESC) AS t INNER JOIN test.authors ON authors.AuthorID = t.AuthorID";
                        $relation = mysqli_fetch_all(mysqli_query($link, $eesult_relation));
                        $related_author_name = array(); //共同写作者
                        $related_paper_num = array();    //共同写作篇数
                        $related_author_paper = array(); //关联作者自己的写作篇数
                        $related_id = array();
                        foreach ($relation as $re) 
                        {
                            $author_num = "SELECT count(*) as cnt FROM test.paper_author_affiliation WHERE AuthorID = '$re[2]'";
                            $author_paper = mysqli_fetch_array(mysqli_query($link, $author_num));
                            array_push($related_id, $re[2]);
                            array_push($related_author_paper, $author_paper['cnt']);
                            array_push($related_author_name, $re[1]);
                            array_push($related_paper_num, $re[0]);
                        }


                        //php数组转换为js数组
                        echo "<script type=\"text/javascript\"> var related_author_name = ".json_encode($related_author_name).";";
                        echo "var related_paper_num = ".json_encode($related_paper_num).";";
                        echo "var related_author_paper = ".json_encode($related_author_paper).";";
                        echo "var related_id = ".json_encode($related_id).";";
                        echo "</script>";

                    ?>
                    <body>
                        <!-- 为 ECharts 准备一个具备大小（宽高）的 容器 -->
                    <div id="chart1" style="width: 80%;height: 800px;top: 50px;"></div>

                        <script type="text/javascript">
                            // 基于准备好的容器(这里的容器是id为chart1的div)，初始化echarts实例
                            var chart1 = echarts.init(document.getElementById("chart1"));
                            var len = related_author_name.length; //叶子结点的个数（related author的个数）


                            //开始填充点结点需要的数据
                            var dotdata = new Array();

                            dotdata.push({name: author_name, draggable:true, symbolSize: [100,100], itemStyle:{color: new echarts.graphic.LinearGradient(
                                                    0, 0, 0, 1,
                                                    [
                                                        {offset: 0, color: '#FFFF00'},
                                                        {offset: 0.7, color: '#F79709'},
                                                        {offset: 1, color: '#EE6911'}
                                                    ]
                                                )},category:"center_author"});
                            for (var i = related_author_name.length - 1; i >= 0; i--)
                            {   
                                var x=15*Math.log(related_author_paper[i]);
                                dotdata.push({name: related_author_name[i], id: related_id[i], draggable:true, symbolSize: [x,x], itemStyle:{color: new echarts.graphic.LinearGradient(
                                                    0, 0, 0, 1,
                                                    [
                                                        {offset: 0, color: '#09F7F7'},
                                                        {offset: 0.5, color: '#188df0'},
                                                        {offset: 1, color: '#3F60E2'}
                                                    ])}, category:"related_author"});
                            }

                            //开始填充线节点需要的数据
                            
                            var linkdata = new Array();

                            for (var i = related_author_name.length - 1; i >= 0; i--)
                             {
                                linkdata.push({target:related_id[i], source:author_name, des: related_paper_num[i], category:"related_author"});
                            }

                            var option
                             = {
                                   
                                title: {                    // 图表标题
                                    text: "",           // 标题文本
                                    left : '3%',                    // 标题距离左侧边距
                                    top : '3%',                     // 标题距顶部边距
                                    textStyle : {                       // 标题样式
                                        color : '#000',                     // 标题字体颜色
                                        fontSize : '30',                    // 标题字体大小
                                    }
                                },
                                tooltip: {                  // 提示框的配置
                                    formatter: function(param) {
                                        if (param.dataType === 'edge') {
                                            //return param.data.category + ': ' + param.data.target;
                                            return 'Cooperation Times:'+ param.data.des;
                                        }
                                        //return param.data.category + ': ' + param.data.name;
                                        return param.data.name;
                                    }
                                },
                                
                                series: [{
                                    type: "graph",          // 系列类型:关系图
                                    top: '10%',             // 图表距离容器顶部的距离
                                    roam: true,             // 是否开启鼠标缩放和平移漫游。默认不开启。如果只想要开启缩放或者平移，可以设置成 'scale' 或者 'move'。设置成 true 为都开启
                                    focusNodeAdjacency: true,   // 是否在鼠标移到节点上的时候突出显示节点以及节点的边和邻接节点。[ default: false ]
                                            force: {                // 力引导布局相关的配置项，力引导布局是模拟弹簧电荷模型在每两个节点之间添加一个斥力，每条边的两个节点之间添加一个引力，每次迭代节点会在各个斥力和引力的作用下移动位置，多次迭代后节点会静止在一个受力平衡的位置，达到整个模型的能量最小化。
                                                            // 力引导布局的结果有良好的对称性和局部聚合性，也比较美观。
                                        repulsion: 500,            // [ default: 50 ]节点之间的斥力因子(关系对象之间的距离)。支持设置成数组表达斥力的范围，此时不同大小的值会线性映射到不同的斥力。值越大则斥力越大
                                        edgeLength: [150, 100]      // [ default: 30 ]边的两个节点之间的距离(关系对象连接线两端对象的距离,会根据关系对象值得大小来判断距离的大小)，
                                                                    // 这个距离也会受 repulsion。支持设置成数组表达边长的范围，此时不同大小的值会线性映射到不同的长度。值越小则长度越长。如下示例:
                                                                    // 值最大的边长度会趋向于 10，值最小的边长度会趋向于 50      edgeLength: [10, 50]
                                    },
                                    layout: "force",            // 图的布局。[ default: 'none' ]
                                                                // 'none' 不采用任何布局，使用节点中提供的 x， y 作为节点的位置。
                                                                // 'circular' 采用环形布局;'force' 采用力引导布局.
                                    // 标记的图形
                                    //symbol: "path://M19.300,3.300 L253.300,3.300 C262.136,3.300 269.300,10.463 269.300,19.300 L269.300,21.300 C269.300,30.137 262.136,37.300 253.300,37.300 L19.300,37.300 C10.463,37.300 3.300,30.137 3.300,21.300 L3.300,19.300 C3.300,10.463 10.463,3.300 19.300,3.300 Z",
                                    symbol: 'circle',
                                    lineStyle: {            // 关系边的公用线条样式。其中 lineStyle.color 支持设置为'source'或者'target'特殊值，此时边会自动取源节点或目标节点的颜色作为自己的颜色。
                                        normal: {
                                            color:  new echarts.graphic.LinearGradient(
                                                    0, 0, 0, 1,
                                                    [
                                                        {offset: 0, color: '#FFFF00'},
                                                        {offset: 0.7, color: '#F79709'},
                                                        {offset: 1, color: '#EE6911'}
                                                    ]
                                                ),          // 线的颜色[ default: '#aaa' ]
                                            width: 2,               // 线宽[ default: 1 ]
                                            type: 'solid',          // 线的类型[ default: solid ]   'dashed'    'dotted'
                                            opacity: 0.5,           // 图形透明度。支持从 0 到 1 的数字，为 0 时不绘制该图形。[ default: 0.5 ]
                                            curveness: 0.5            // 边的曲度，支持从 0 到 1 的值，值越大曲度越大。[ default: 0 ]
                                        }
                                    },
                                    label: {                // 关系对象上的标签
                                        normal: {
                                            show: false,                 // 是否显示标签
                                            position: "inside",         // 标签位置:'top''left''right''bottom''inside''insideLeft''insideRight''insideTop''insideBottom''insideTopLeft''insideBottomLeft''insideTopRight''insideBottomRight'
                                            textStyle: {                // 文本样式
                                                fontSize: 16
                                            }
                                        }
                                    },
                                    edgeLabel: {                // 连接两个关系对象的线上的标签
                                        normal: {
                                            show: false,
                                            textStyle: {                
                                                fontSize: 14
                                            },
                                            formatter: function(param) {        // 标签内容
                                                return param.data.category;
                                            }
                                        }
                                    },

                                    data: dotdata,
                                    categories: [{              // 节点分类的类目，可选。如果节点有分类的话可以通过 data[i].category 指定每个节点的类目，类目的样式会被应用到节点样式上。图例也可以基于categories名字展现和筛选。
                                        name: 0           // 类目名称，用于和 legend 对应以及格式化 tooltip 的内容。
                                    }, {
                                        name: 1
                                    }],





                                    links: linkdata  
                                }],
                                
                                animationEasingUpdate: "quinticInOut",          // 数据更新动画的缓动效果。[ default: cubicOut ]    "quinticInOut"
                                animationDurationUpdate: 100                    // 数据更新动画的时长。[ default: 300 ]
                            };
                            
                            // 使用刚指定的配置项和数据显示图表
                            chart1.setOption(option)
                        </script>



                    </body>




                </div>
                <div class="accent-button button">
                    <a href="#blog">Continue Reading</a>
                    <br>
                    <br>
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




