

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
        <title>WhynotMap-Conference</title>
        
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
                        <li><a href="#top">Home</a></li>
                        <li><a href="#blog">Search Entries</a></li>
                        <li><a href="#featured">Bar graph</a></li>
                        <li><a href="#projects">Polar graphs</a></li>
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
                        <a href="#top">
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
                            Bar Graphs
                        </a>
                    </li>
                    <li>
                        <a href="#projects">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Polar Graphs
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
                <?php  
                    echo "<div class='mdui-card' style='height: 300px'><div style='width:50%;display:inline-block;margin:3% 5%'>";
                    echo "<br><br><br><br><br>";
                    $conference_id = $_GET["conference_id"];
                    $link = mysqli_connect("localhost:3306", 'root', 'neal5060066', 'test');
                    $result_conference_name = mysqli_query($link, "SELECT ConferenceName FROM conferences WHERE ConferenceID='$conference_id'");
                    if ($result_conference_name) {                                                                                                                                           
                        $conference_name = mysqli_fetch_array($result_conference_name)['ConferenceName'];
                        echo "Conference : $conference_name<br>";
                    } else {
                        echo "Conference not found";
                    }
                    echo "</div><div style='z-index:10;float:right;height: 110%;width:40%; background-size:contain|cover;'><img src='img/card' style='width:100%;height:100%;margin:0 0' /></div></div>";
                    echo "<br><br><br>";


                ?>
                <div class="section-content">
                    <div class="tabs-content">
                        <div class="wrapper">
                            <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                              <li><a href="#tab1" class="active">Graph</a></li>
                              <li><a href="#tab2">Recommended Papers</a></li>

                            </ul>
                            <section id="first-tab-group" class="tabgroup">
                                <div id="tab1">
                                    <ul>
                                        <li>
                                            <div class="item">
                                                <img src="img/conference_bargraph.png" alt="">
                                                <div class="text-content">
                                                    <h4>Papers of all time</h4>
                                                    <span></span>
                                                    <p>You can have a brief view of papers that the conference published by year. Moreover, our bar graph is able to zoom. Try clicking or swaping to zoom the bar graph inorder to have a better  view of this conference.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#featured">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>                                
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="item">
                                                <img src="img/conference_polargraph.png" alt="">
                                                <div class="text-content">
                                                    <h4>Papers of all time</h4>
                                                    <span></span>
                                                    <p>You can have a brief view of papers that the conference published by year. Moreover, our bar graph is able to zoom. Try clicking or swaping to zoom the bar graph inorder to have a better  view of this conference.</p>
                                                    
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
                                        $conference_id = $_GET["conference_id"];
                                        $link = mysqli_connect("localhost:3306", 'root', 'neal5060066', 'test');
                                        $result_conference_name = mysqli_query($link, "SELECT ConferenceName FROM conferences WHERE ConferenceID='$conference_id'");
                                        if ($result_conference_name) {                                                                                                                                           
                                            $conference_name = mysqli_fetch_array($result_conference_name)['ConferenceName'];
                                            echo "Conference : $conference_name<br>";
                                        } else {
                                            echo "Conference not found";
                                        }

                                        
                                        $perNumber=4; //每页显示的记录数
                                        $_page1=isset($_GET['page1'])? $_GET['page1'] : 1;
                                        $start1=($_page1-1)*$perNumber;
                                        $preveoustips = "previous page";
                                        $nexttips = "next page";





                                        //按照citation数量把这个conference的paper排序
                                        $result_paper_id_by_citation= mysqli_query($link, "SELECT PaperPublishYear,Title, ReferenceID,cnt from papers INNER JOIN (SELECT paper_references.ReferenceID,count(*) as cnt FROM paper_references INNER JOIN  (SELECT PaperID FROM papers WHERE ConferenceID = '$conference_id') as tmp WHERE  paper_references.ReferenceID = tmp.PaperID GROUP BY tmp.PaperID ORDER BY cnt DESC) as haha WHERE papers.PaperID = haha.ReferenceID LIMIT $start1,$perNumber");
                                        

                                        if ($result_paper_id_by_citation) {
                                    
                                            //获得搜索总条数¥count          
                                            $result_count = mysqli_query($link, "SELECT COUNT(*) as number FROM (SELECT paper_references.ReferenceID,count(*) as cnt FROM paper_references INNER JOIN  (SELECT PaperID FROM papers WHERE ConferenceID = '$conference_id') as tmp WHERE  paper_references.ReferenceID = tmp.PaperID GROUP BY tmp.PaperID ORDER BY cnt DESC) as tmp");
                                            $count = mysqli_fetch_array($result_count)['number'];
                                            if ($count/$perNumber != 0){
                                                $totalPage = floor($count / $perNumber) +1;
                                            }else{
                                                $totalPage = floor($count / $perNumber);
                                            } //计算出总页数


                                            if ($count <=10){
                                                for($i=1; $i<=$count; ++$i )
                                                {
                                                    echo "<a href=\"/conference.php?conference_id=$conference_id&page1=$i\">$i </a>";
                                                }
                                            }
                                            else{
                                                if ($_page1 != 1) { //页数不等于1
                                                    $preveous = $_page1-1;
                                                echo "<button class='mdui-btn mdui-ripple'><a href=\"/conference.php?conference_id=$conference_id&page1=$preveous\">$preveoustips </a></button>";
                                                }
                                                for ($i=1;$i<=min(5,$totalPage);$i++) { //循环显示出页面
                                                echo "<a href=\"/conference.php?conference_id=$conference_id&page1=$i\">$i </a>";
                                                }
                                                echo " …… ";
                                                for ($i=5;$i>0;$i--){
                                                    $end = $totalPage-$i;
                                                echo "<a href=\"/conference.php?conference_id=$conference_id&page1=$end\">$end </a>";
                                                }
                                                if ($_page1<$totalPage) { //如果page小于总页数,显示下一页链接
                                                    $next = $_page1+1; 
                                                echo "<button class='mdui-btn mdui-ripple'><a href=\"/conference.php?conference_id=$conference_id&page1=$next\">$nexttips </a></button>";
                                                }
                                        }
                                            //搜索Title翻页（结束）






                                            echo "<div align='center'>";
                                            echo "<div class='mdui-table-fluid' style='width:100%'>";
                                            echo "<table class='mdui-table mdui-table-hoverable' border=\"1\"><thead><tr><th>Sequence</th><th>Title</th><th>Citation</th><th>Publish Year</th></tr></thead>";
                                            //表头
                                            // echo "Papers recommended";
                                            $k=1;
                                            while ($row = mysqli_fetch_array($result_paper_id_by_citation)) {
                                                $paper_id = $row['ReferenceID'];
                                                $paper_title = $row['Title'];
                                                $citation = $row['cnt'];
                                                $publish_year = $row['PaperPublishYear'];
                                                echo "<tr>";
                                                echo "<td>$k</td>";
                                                $k++;
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

                                                
                                                echo "<td>";
                                                echo "$citation";
                                                echo "</td>";



                                                echo "<td>";
                                                echo "$publish_year";
                                                echo "</td>";   


                                                        
                                            }
                                            




                                            echo "</table>";
                                        }
                                        else
                                        {
                                            echo "ConferenceID not found";
                                        }
                                        // echo "<br><br>";
    ?>           

                                </div>




                                
                            </section> 
                        </div>
                    </div>
                </div>
            </section>
            <section id="featured" class="content-section">
                <div class="section-heading">
                    <h1>Bar<br><em>Graphs</em></h1>
                    <p>You can have a breif view of papers that the conference published by year. 
                    <br>Try clicking or swaping to zoom the bar graph  </p>
                </div>
                <div class="section-content">
<!--                     <div class="owl-carousel owl-theme"> -->




                        <?php 
                            $confy = "SELECT temp1.PaperPublishYear,count(*) as cnt from (SELECT PaperPublishYear from test.papers where ConferenceID = '$conference_id') as temp1 inner join (SELECT distinct PaperPublishYear from test.papers where ConferenceID = '$conference_id') as temp2 on temp2.PaperPublishYear = temp1.PaperPublishYear group by PaperPublishYear order by PaperPublishYear asc";
                            $confresult = mysqli_fetch_all(mysqli_query($link,$confy));
                            $confyear = array();
                            $confpaper = array();
                            foreach ($confresult as $conre) {
                                    array_push($confyear, $conre[0]);
                                    array_push($confpaper, $conre[1]);
                                }
                            echo "<script type=\"text/javascript\"> var confyear = ".json_encode($confyear).";";
                            echo "var confpaper =".json_encode($confpaper).";</script>";
                            // echo "wdnmd";
                        ?>
                        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                        <div id="conference_paper" style="width: 800px;height:500px; margin: 0 auto"></div>
                        <script type="text/javascript">
                            // 基于准备好的dom，初始化echarts
                            var myChart = echarts.init(document.getElementById('conference_paper'),'light');
                            var dataAxis = confyear;
                            var data = confpaper;
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
                                data: confyear,
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
                        <div class="accent-button button">
                            <a href="#projects">Continue Reading</a>
                        </div>

                
                </div>
            </section>
            <section id="projects" class="content-section">
                <div class="section-heading">
                    <h1>Polar<br><em>Graphs</em></h1>
                    <p>You can have a breif view of papers 
                    <br>the conference published by year.</p>
                </div>
                <div class="section-content">

                 <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                    <div id="polar" style="width: 800px;height:500px; margin: 0 auto"></div>
                    <script type="text/javascript">
                        // 基于准备好的dom，初始化echarts
                        var chart = echarts.init(document.getElementById('polar'),'light');
                        polar.title = '极坐标系下的堆叠柱状图';
                        var predata = new Array();
                        for (var i = 0; i <= confpaper.length - 1; i++) {
                            predata.push([0,confpaper[i],(confpaper[i]/2)]);
                        }
                        // alert(predata);
                        var data = predata;
                        var cities = confyear;
                        var barHeight = 50;

                        option = {
                            title: {
                                text: 'Papers of all time',
                                subtext: 'WhynotMap'
                            },
                            legend: {
                                show: true,
                                data: ['价格范围', '均值']
                            },
                            grid: {
                                top: 100
                            },
                            angleAxis: {
                                type: 'category',
                                data: cities
                            },
                            tooltip: {
                                show: true,
                                formatter: function (params) {
                                    var id = params.dataIndex;
                                    return "Year:" + cities[id] +"\t"+ 'Papers:' + data[id][1] ;
                                }
                            },
                        radiusAxis: {//极坐标系的径向轴。
                    　　 min: 0,
                    　　 axisLine: { //坐标轴轴线设置
                    　　　　show: false,
                    　　　　// lineStyle: {
                    　　　　　　// color: "#ccc"
                    　　　　// }
                    　　 },
                    　　 axisTick: { //坐标轴刻度设置
                    　　　　show: false,
                    　　 },
                    　　 axisLabel: { //刻度标签设置
                           show:false, 
                    　　　　margin: 0, //刻度与坐标轴之间的距离
                    　　　　textStyle: {
                    　　　　　　color:  '#333'
                    　　　　}
                    　　 }
                        },
                        polar: {
                        },
                        series: [{
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: 'transparent'
                                }
                            },
                            data: data.map(function (d) {
                                return d[0];
                            }),
                            coordinateSystem: 'polar',
                            stack: '最大最小值',
                            silent: true
                        }, {
                            type: 'bar',
                            data: data.map(function (d) {
                                return d[1] - d[0];
                            }),
                            coordinateSystem: 'polar',
                            name: '价格范围',
                            stack: '最大最小值'
                        }, {
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: 'transparent'
                                }
                            },
                            data: data.map(function (d) {
                                return d[2] ;
                            }),
                            coordinateSystem: 'polar',
                            stack: '均值',
                            silent: true,
                            z: 10
                        }, {
                            type: 'bar',
                            data: data.map(function (d) {
                                return barHeight * 2
                            }),
                            coordinateSystem: 'polar',
                            name: '均值',
                            stack: '均值',
                            barGap: '-100%',
                            z: 10
                        }],
                        legend: {
                            show: true,
                            data: ['A', 'B', 'C']
                        }
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









