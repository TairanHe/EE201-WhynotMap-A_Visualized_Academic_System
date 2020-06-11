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
        <title>WhynotMap-Paper</title>
        
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

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>




        <title>ECharts</title>
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
                        <li><a href="#blog">Home</a></li>
                        <li><a href="#blog">Search Entries</a></li>
                        <li><a href="#featured">Paper graph</a></li>
                        <li><a href="#projects">Star graphs</a></li>
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
                            Paper Graph
                        </a>
                    </li>
                    <li>
                        <a href="#projects">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Star Graphs
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
                        <?php

                            echo "<div class='mdui-card' style='height: 300px'><div style='width:50%;display:inline-block;margin:3% 5%'>";

                            $paper_id = $_GET["paper_id"];
                            $link = mysqli_connect("localhost:3306", 'root', 'neal5060066', 'test');
                            echo "<br>";

                            $result_title = mysqli_query($link, "SELECT Title FROM papers WHERE PaperID='$paper_id'");
                            if ($result_title) {                                                                                                                                           
                                $paper_title = mysqli_fetch_array($result_title)['Title'];
                                echo "PaperTitle:$paper_title<br><br>";
                            } else {
                                echo "paper not found";
                            }




                            $result_conference = mysqli_query($link, "SELECT ConferenceName FROM conferences INNER JOIN papers ON papers.ConferenceID = conferences.ConferenceID WHERE PaperID='$paper_id'");
                            if ($result_conference)
                            {
                                $conference_name = mysqli_fetch_array($result_conference)['ConferenceName'];
                                echo "Conference: $conference_name<br><br>";
                            } else{
                                echo "Conference not found";
                            }







                            $result_year = mysqli_query($link, "SELECT PaperPublishYear FROM papers WHERE PaperID='$paper_id'");
                            if ($result_year) {
                                $publish_year=mysqli_fetch_array($result_year)['PaperPublishYear'];
                                echo "Publish Year: $publish_year<br><br>";
                            } else {
                                echo "Year not found";
                            }






                            //引用
                            $result_citation = mysqli_query($link, "SELECT ReferenceID FROM paper_references WHERE PaperID = '$paper_id'");
                            if ($result_citation)
                            {
                                $i=0;
                                while ($row = mysqli_fetch_array($result_citation)) {
                                    $i++;
                                }
                                echo "Citation: $i";
                            } else{
                                echo "Citation: 0";
                            }

                            echo "</div><div style='z-index:10;float:right;height: 110%;width:40%; background-size:contain|cover;'><img src='img/card' style='width:100%;height:100%;margin:0 0' /></div></div>";


                            ?>
                </div>
                <div class="section-content">
                    <div class="tabs-content">
                        <div class="wrapper">
                            <ul class="tabs clearfix" data-tabgroup="first-tab-group">

                              <li><a href="#tab1" class="active">Graph</a></li>
                              <li><a href="#tab2">Authors</a></li>
                              <li><a href="#tab3">Recommend Papers</a></li>

                            </ul>
                            <section id="first-tab-group" class="tabgroup">
                                <div id="tab1">
                                    <ul>
                                        <li style="width: 100%">
                                            <div class="item">
                                                <img src="img/paper_year.png" alt="">
                                                <div class="text-content">
                                                    <h4>Papers of all time</h4>
                                                    <span></span>
                                                    <p>You can have a breif view of papers that the conference published by year. Moreover, our bar graph is able to zoom. Try clicking or swaping to zoom the bar graph inorder to have a better  view of this conference.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#featured">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>                                
                                    </ul>
                                    <ul>
                                        <li style="width: 100%">
                                            <div class="item">
                                                <img src="img/paper_star.png" alt="">
                                                <div class="text-content">
                                                    <h4>Whynot Stars of authors</h4>
                                                    <span></span>
                                                    <p>You can have a breif view of authors allever all ratings.We consider papers, citations, CPP and H_index and use Whynot star to reveal  the capability of an author.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#projects">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>                                
                                    </ul>                                    


                                </div>


                                <div id="tab2">
                                   <?php
                                        $paper_id=$_GET['paper_id'];
                                        $link = mysqli_connect("localhost:3306", 'root', 'neal5060066', 'test');

                                        $result = mysqli_query($link, "SELECT AuthorName, paper_author_affiliation.AuthorID from paper_author_affiliation INNER JOIN authors ON paper_author_affiliation.AuthorID=authors.AuthorID WHERE PaperID='$paper_id' ORDER BY AuthorSequence");



                                    if ($result) {
                                        echo "<div align='center'>";
                                        echo "<div class='mdui-table-fluid' style='width:100%'>";
                                        echo "<table class='mdui-table mdui-table-hoverable' border=\"1\"><thead><tr><th>Sequence</th><th>Author</th><th>Affiliation</th><th>Whynot Star</th></tr></thead>";
                                        //表头
                                        // echo "Authors";
                                        // echo "<br><br>";

                                        $i=1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";

                                            $paper_id = $row['PaperID'];
                                            

                                            echo "<td>$i</td>";

                                            $i++;
                                            $auth_name=$row['AuthorName'];
                                            $auth_id=$row['AuthorID'];
                                            echo "<td>";
                                            echo "<button class='mdui-btn mdui-ripple' onclick='location.href=\"/author.php?author_id=$auth_id\"'>$auth_name;</button>";
                                            echo "</td>";

                                            




                                            echo "<td>";
                                            $aff = mysqli_query($link, "SELECT affiliations.AffiliationID, affiliations.AffiliationName from (select AffiliationID, count(*) as cnt from paper_author_affiliation where AuthorID='$auth_id' and AffiliationID is not null group by AffiliationID order by cnt desc) as tmp inner join affiliations on tmp.AffiliationID = affiliations.AffiliationID");
                                            if ($aff)
                                            {
                                                $main = mysqli_fetch_array($aff);
                                                echo " ".$main['AffiliationName'] ;
                                            } else{
                                                echo "Affiliation not found.";
                                            }
                                            

                                            echo "</td>";   


                                            echo "<td>";
                                            $result_whynot = mysqli_query($link, "SELECT whynotstar from whynotstar WHERE AuthorID='$auth_id'");
                                            $whynotstar = mysqli_fetch_array($result_whynot)['whynotstar'];
                                            for ($k=0; $k <$whynotstar ; $k++) { 
                                                echo "🌟";
                                            }
                                            
                                            echo "</td>";           
                                        }
                                        




                                        echo "</table>";
                                    }
                                    else
                                    {
                                        echo "PaperID not found";
                                    }

                                    ?>           

                                </div>
                                </div>
                                </div>




                                <div id="tab3">
                                   <?php
                                        $paper_id = $_GET["paper_id"];
                                        $link = mysqli_connect("localhost:3306", 'root', 'neal5060066', 'test');

                                        $recommend_result = mysqli_query($link, "SELECT PaperID from paper_references WHERE ReferenceID='$paper_id' LIMIT 0,5 " );
                                        // $recommend_paper_id = mysqli_fetch_all($recommend_result);




                                        echo "<div align='center'>";
                                        echo "<div class='mdui-table-fluid' style='width:99%'>";
                                        echo "<table class='mdui-table mdui-table-hoverable' border=\"1\"><thead><tr><th>Title</th><th>Authors</th><th>Conference</th></tr></thead>";
                                            //表头
 
                                        while ($row = mysqli_fetch_array($recommend_result)) {
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




                                    ?>           
                                </div>
                                
                                
        



                                
                            </section> 
                        </div>
                    </div>
                </div>
            </section>
            <section id="featured" class="content-section">
                <div class="section-heading">
                    <h1>Paper<br><em>Graph</em></h1>
                    <p>You can have a breif view of all the authors of the paper. 
                    <br>check how many papers they published every year.  </p>
                </div>


                <?php 
                    $paper_id = $_GET["paper_id"];
                    $eesult_author = mysqli_query($link, "SELECT AuthorName, paper_author_affiliation.AuthorID from paper_author_affiliation INNER JOIN authors ON paper_author_affiliation.AuthorID=authors.AuthorID WHERE PaperID='$paper_id' ORDER BY AuthorSequence");
                    if($eesult_author)
                    {   
                        $data = array();  //这个data用于画折线图
                        $erow = mysqli_fetch_array($eesult_author);
                        $eauthor_name = $erow['AuthorName'];
                        $eauthor_id = $erow['AuthorID']; 
                        // echo "$eauthor_name";
                        // echo "$eauthor_id";

                        $eesult_totalpaper = "SELECT distinct PaperPublishYear FROM paper_author_affiliation INNER JOIN papers WHERE paper_author_affiliation.AuthorID = '$eauthor_id' and papers.PaperID =  paper_author_affiliation.PaperID ORDER BY PaperPublishYear asc";
                        $total_paper = mysqli_fetch_all(mysqli_query($link,$eesult_totalpaper));
                        $allyear = array();
                       foreach ($total_paper as $year ) 
                        {
                            array_push($allyear, $year[0]);
                        }


                        // var_dump($allyear);


                        $a = array();
                        foreach ($total_paper as $year)
                        {
                    
                            $eesult_papersearch = "SELECT count(*) as cnt FROM paper_author_affiliation INNER JOIN papers WHERE papers.PaperPublishYear = $year[0] and paper_author_affiliation.AuthorID = '$eauthor_id' and papers.PaperID = paper_author_affiliation.PaperID";
                            $paper_search = mysqli_fetch_array(mysqli_query($link, $eesult_papersearch));
                            $allpaper = $paper_search['cnt'];
                            array_push($a, $allpaper);
                        }
                        // var_dump($a);
                        $add_first = array();
                        array_push($add_first, "paper");
                        for ($i=0; $i < sizeof($allyear); $i++)
                        {   
                            array_push($add_first, $allyear[$i]);
                        }
                        array_push($data, $add_first);


                        $add = array();
                        array_push($add, $eauthor_name);
                        for ($i=0; $i < sizeof($a) ; $i++) 
                        { 
                            array_push($add, $a[$i]);
                        }
                        array_push($data, $add);
                        // var_dump($data);
                        
                        while ($erow = mysqli_fetch_array($eesult_author))
                        {   
                            $eauthor_name = $erow['AuthorName'];
                            $eauthor_id = $erow['AuthorID']; 
                            $a = array();
                            foreach ($total_paper as $year)
                            {
                                $eesult_papersearch = "SELECT count(*) as cnt FROM paper_author_affiliation INNER JOIN papers WHERE papers.PaperPublishYear = $year[0] and paper_author_affiliation.AuthorID = '$eauthor_id' and papers.PaperID = paper_author_affiliation.PaperID";
                                $paper_search = mysqli_fetch_array(mysqli_query($link, $eesult_papersearch));
                                $allpaper = $paper_search['cnt'];
                                array_push($a, $allpaper);
                            }
                            // var_dump($a);

                            $add = array();
                            array_push($add, $eauthor_name);
                            for ($i=0; $i < sizeof($a) ; $i++) 
                            { 
                                array_push($add, $a[$i]);
                            }
                            array_push($data, $add);

                        }
                        echo "<script type=\"text/javascript\"> var data = ".json_encode($data).";";
                        echo "</script>";


                        } 
                ?>
                <div class="section-content">






                    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                    <div id="conference_paper" style="width: 800px;height:600px; margin: 0 auto"></div>
                    <script type="text/javascript">
                        // 基于准备好的dom，初始化echarts
                        var myChart = echarts.init(document.getElementById('conference_paper'),'light');
                        
                        setTimeout(function () {

                            option = {
                                legend: {},
                                tooltip: {
                                    trigger: 'axis',
                                    showContent: false
                                },
                                dataset: {
                                    source: data
                                },
                                xAxis: {type: 'category'},
                                yAxis: {gridIndex: 0},
                                grid: {top: '55%'},
                                series: [
                                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},

                                    {
                                        type: 'pie',
                                        id: 'pie',
                                        radius: '30%',
                                        center: ['50%', '25%'],
                                        label: {
                                            formatter: '{b}: {@2012} ({d}%)'
                                        },
                                        encode: {
                                            itemName: 'product',
                                            value: '2012',
                                            tooltip: '2012'
                                        }
                                    }
                                ]
                            };

                            myChart.on('updateAxisPointer', function (event) {
                                var xAxisInfo = event.axesInfo[0];
                                if (xAxisInfo) {
                                    var dimension = xAxisInfo.value + 1;
                                    myChart.setOption({
                                        series: {
                                            id: 'pie',
                                            label: {
                                                formatter: '{b}: {@[' + dimension + ']} ({d}%)'
                                            },
                                            encode: {
                                                value: dimension,
                                                tooltip: dimension
                                            }
                                        }
                                    });
                                }
                            });

                            myChart.setOption(option);

                });
        // 使用刚指定的配置项和数据显示图表。


    </script>                        
    <div class="accent-button button">        
        <a href="#projects">Continue Reading</a>
    </div>

                
    </div>
            </section>
            <section id="projects" class="content-section">
                <div class="section-heading">
                    <h1>Star<br><em>Graphs</em></h1>
                    <p>You can have a breif view of authors 
                    <br>according to Whynot Star.</p>
                </div>
                <?php 
                    $paper_id = $_GET["paper_id"];
                    $eesult_author = mysqli_query($link, "SELECT AuthorName, paper_author_affiliation.AuthorID from paper_author_affiliation INNER JOIN authors ON paper_author_affiliation.AuthorID=authors.AuthorID WHERE PaperID='$paper_id' ORDER BY AuthorSequence");
                    $data_name = array();
                    $data_value = array();
                    while ($row = mysqli_fetch_array($eesult_author))
                    {
                        $auth_name=$row['AuthorName'];
                        $auth_id= $row['AuthorID'];
                        $result_whynot = mysqli_query($link, "SELECT whynotstar from whynotstar WHERE AuthorID='$auth_id'");
                        $whynotstar = mysqli_fetch_array($result_whynot)['whynotstar'];
                        array_push($data_name, $auth_name);
                        array_push($data_value, $whynotstar);


                    }
                    // var_dump($data_name);
                    // var_dump($data_value);
                    echo "<script type=\"text/javascript\"> var data_name = ".json_encode($data_name).";";
                    echo "var data_value = ".json_encode($data_value).";";
                    echo "</script>";

                 ?>
                <div class="section-content">

                 <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                    <div id="whynot" style="width: 800px;height:500px; margin: 0 auto"></div>
                    <script type="text/javascript">
                        var data_all = new Array();
                        var len = data_name.length;
                        for (var i = 0; i < len; i++) {
                            data_all.push({value:data_value[i], name:data_name[i]});                     
                        }
                        // 基于准备好的dom，初始化echarts
                        var chart = echarts.init(document.getElementById('whynot'),'light');
                        whynot.title = 'whynot';
                        option = {
    title : {
        text: 'Whynot Star',
        subtext: 'WhynotMap',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        x : 'center',
        y : 'bottom',
        data:data_name

    },
    toolbox: {
        show : false,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {
                show: true,
                type: ['pie', 'funnel']
            },
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    series : [
        {
            name:'半径模式',
            type:'pie',
            radius : [20, 110],
            center : ['25%', '50%'],
            roseType : 'radius',
            label: {
                normal: {
                    show: false
                },
                emphasis: {
                    show: true
                }
            },
            lableLine: {
                normal: {
                    show: false
                },
                emphasis: {
                    show: true
                }
            },
            data:data_all

        },
        {
            name:'面积模式',
            type:'pie',
            radius : [30, 110],
            center : ['75%', '50%'],
            roseType : 'area',
            data:data_all

        }
    ]
};


                        // 使用刚指定的配置项和数据显示图表。
                        chart.setOption(option);

                    </script>
                    <div class="accent-button button">
                        <a href="#blog">Continue Reading</a>
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








<!DOCTYPE html> 
<html>
<head>
<title>Paper page </title>
<style type="text/css">
	body {
		text-align: center;
	}
</style>
<link rel="stylesheet" href="mdui.css">
</head>


















