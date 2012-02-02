<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?=$webtitle?></title>
		<link rel="shortcut icon" href="/www/default/img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="/www/default/css/index.css" />
        <script type="text/javascript" src="/www/default/js/jquery.js"></script>
        <script type="text/javascript" src="/www/default/js/base.js"></script>
    </head>
    <body>
        <div class="header">
        	<div class="titlebar">
            	<div class="header_wrap">
                    <a href="/about">关于我们</a> | 
                    <!--<a href="/help">帮助中心</a> | -->
                    <a href="/linkme">联系我们</a>
                </div>
            </div>
            <div class="header_wrap">
                <h1 class="logo">
                    <a href="#">上海聚宇企业管理咨询</a>
                </h1>
                <form action="/search" method="get">
                    <div class="search">
                        <span class="search_type" id="search_type"><em id="option">课程资源</em><i class="arrow">arrow</i></span><input type="text" class="txt" name="txt" /><input type="submit" class="btn" value="搜索" />
                        <input type="hidden" value="课程资源" name="channel" id="checked" />
                        <input type="hidden" value="0" name="per_page" />
                        <ul class="typelist" id="typelist">
                            <li>课程资源</li>
                            <li>公开课</li>
                            <li>企业内训</li>
                        </ul>
                    </div>
                </form>
                <div class="nav clear">
                	<?php echo $nav;?>
                    <div class="pr">
                    	<a href="news" <?php if($this->uri->segment(1)=="news"){?>class="current"<?}?>><span>培训资讯</span></a>
                    	<!--<a href="#" <?php if($this->uri->segment(1)=="#"){?>class="current"<?}?>><span>成功案例</span></a>-->
                    	<a href="/about" <?php if($this->uri->segment(1)=="about"){?>class="current"<?}?>><span>关于我们</span></a>
                    </div>
                </div>
                <div class="hotkey">
                    <div class="bg">
                    热点词：
                    <a href="/open/hot/281" target="_blank">情商管理</a>
					<a href="/open/hot/288" target="_blank">全面管理技能提升训练</a>
					<a href="/open/hot/266" target="_blank">沟通艺术与关系协调</a>
					<a href="/trainer/show/9" target="_blank">洪剑坪</a>
					<a href="/train/show/241" target="_blank">中层管理者领导力</a>
                    </div>
                </div>
            </div>
        </div>
