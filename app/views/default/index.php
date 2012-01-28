        <div class="wrapper">
            <div class="content">
                <!--col2表示有两列-->
                <div class="row col2">
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
								<div class="slide">
									<ul id="slide_img">
										<li><a href="#"><img src="/www/default/img/nav_bg.png" width="652px" height="253" alt="焦点图1" title="焦点图1" /></a></li>
										<li><a href="#"><img src="/www/default/img/nav_bg.png" width="652px" height="253" alt="焦点图2" title="焦点图2" /></a></li>
										<li><a href="#"><img src="/www/default/img/nav_bg.png" width="652px" height="253" alt="焦点图3" title="焦点图3" /></a></li>
										<li><a href="#"><img src="/www/default/img/nav_bg.png" width="652px" height="253" alt="焦点图4" title="焦点图4" /></a></li>
									</ul>
									<div class="slide_txt">
										<p id="slide_txt"></p>
									</div>
									<span id="slide_btn">
										<i class="current" rel="1">&nbsp;</i>
										<i rel="2">&nbsp;</i>
										<i rel="3">&nbsp;</i>
										<i rel="4">&nbsp;</i>
									</span>	
								</div>
                            </div>
                        </div>
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>培训新闻</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="news/list">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($news as $items):?>
                                        <li><a href="news/show/<?=$items['id']?>"><?=$items['title']?></a><span class="time"><?=$items['entertime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!--col3 表示有3列-->
                <div class="row col3">
                    <div class="rt">
                        <h2>
                            <span><a href="/open">公开课</a></span>
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>近期开课</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/open/now">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($now as $items):?>
                                        <li><a href="/open/now/<?=$items['id']?>"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cm">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>推荐课程</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/open/hot">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($recommend as $items):?>
                                        <li><a href="/open/hot/<?=$items['id']?>"><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>公开课分类</span>
                                    </h3>
                                </div>
                                <div class="bc">
                                    <ul class="traintype clearfix">
                        				<?php foreach($cate as $items):?>
                                        <li><a href="/open/classtype/<?=$items['id']?>"><?=$items['name']?></a></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="emptytips">
                    <a href="#" target="_blank"><img src="/www/default/img/nav_bg.png" width="980" height="80" alt="" /></a>
                </div>

                <!--col3 表示有3列-->
                <div class="row col3">
                    <div class="rt">
                        <h2>
                            <span><a href="/train">企业内训</a></span>
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>讲师介绍</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/trainer">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($trainer as $items):?>
                                        <li><a href="#"><?=$items['fname']?>老师</a><span class="time"><?=$items['listtime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cm">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>内训课程</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($train as $items):?>
                                        <li><a href="/train/show/<?=$items['id']?>"><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>内训分类</span>
                                    </h3>
                                </div>
                                <div class="bc">
                                    <ul class="traintype clearfix">
                        				<?php foreach($cate as $items):?>
                                        <li><a href="/train/classtype/<?=$items['id']?>"><?=$items['name']?></a></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--没有内容的时候显示以下提示信息-->
            </div>

                <!--col3 表示有3列-->
                <div class="row col3">
                    <div class="rt">
                        <h2>
                            <span><a href="news">培训分类资讯</a></span>
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>人力资源</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($news_type1 as $items):?>
                                        <li><a href="#"><?=$items['title']?></a><span class="time"><?=$items['entertime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cm">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>综合管理</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($news_type2 as $items):?>
                                        <li><a href="#"><?=$items['title']?></a><span class="time"><?=$items['entertime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>生产管理</span>
                                    </h3>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($news_type3 as $items):?>
                                        <li><a href="#"><?=$items['title']?></a><span class="time"><?=$items['entertime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>营销管理</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($news_type4 as $items):?>
                                        <li><a href="#"><?=$items['title']?></a><span class="time"><?=$items['entertime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cm">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>财务管理</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($news_type5 as $items):?>
                                        <li><a href="#"><?=$items['title']?></a><span class="time"><?=$items['entertime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>物流采购</span>
                                    </h3>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($news_type6 as $items):?>
                                        <li><a href="#"><?=$items['title']?></a><span class="time"><?=$items['entertime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--没有内容的时候显示以下提示信息-->
            </div>
            <div class="footer">
                <p>
                    <a href="#">关于我们</a> |
                    <a href="#">广告服务</a> |
                    <a href="#">免责声明</a> |
                    <a href="#">网站地图</a> |
                    <a href="#">版权信息</a> |
                    <a href="#">友情链接</a>
                </p>
                <p>
                    Copyright &copy; 2011-2020 上海聚宇培训网
                </p>
                <p>
                沪ICP备:1000000号
                </p>
            </div>
        </div>
<script language="javascript">
	var t = n = 0, count;
	$(document).ready(function(){    
		count=$("#slide_img li").length;
		$("#slide_img li:not(:first-child)").hide();
		$("#slide_txt").html($("#slide_img li:first-child").find("img").attr('alt'));
		$("#banner_txt").click(function(){window.open($("#slide_img li:first-child a").attr('href'), "_blank")});
		$("#slide_btn i").click(function() {
			var i = $(this).attr('rel') - 1;//获取Li元素内的值，即1，2，3，4
			n = i;
			if (i >= count) return;
			$("#slide_txt").html($("#slide_img li a").eq(i).find("img").attr('alt'));
			$("#slide_txt").unbind().click(function(){window.open($("#slide_img li a").eq(i).attr('href'), "_blank")})
			$("#slide_img li").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
			document.getElementsByClassName("slide")[0].style.background="";
			$(this).toggleClass("current");
			$(this).siblings().removeAttr("class");
		});
		t = setInterval("showAuto()", 4000);
		$(".slide").eq(0).hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});
	})

	function showAuto()
	{
		n = n >=(count - 1) ? 0 : ++n;
		$("#slide_btn i").eq(n).trigger('click');
	}
</script>