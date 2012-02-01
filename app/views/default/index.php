        <div class="wrapper">
            <div class="content">
                <!--col2表示有两列-->
                <div class="row col2">
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
								<div class="slide">
									<ul id="slide_img">
										<li><a href="#"><img src="/www/default/img/image/02.jpg" width="652px" height="253" alt="热烈祝贺上海聚宇企业管理咨询网二期改版上线" title="热烈祝贺上海聚宇企业管理咨询网二期改版上线" /></a></li>
										<li><a href="#"><img src="/www/default/img/image/01.jpg" width="652px" height="253" alt="卓有成效的解决方案，帮助企业提升绩效" title="卓有成效的解决方案，帮助企业提升绩效" /></a></li>
										<li><a href="#"><img src="/www/default/img/image/03.jpg" width="652px" height="253" alt="企业管理 -- 专业" title="企业管理 -- 专业" /></a></li>
										<li><a href="#"><img src="/www/default/img/image/04.jpg" width="652px" height="253" alt="企业管理 -- 责任" title="企业管理 -- 责任" /></a></li>
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
                                    	<a href="/news" target="_blank">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($news as $items):?>
                                        <li><a href="news/show/<?=$items['id']?>" title="<?=$items['title']?>"><?=mb_substr($items['title'],0,18)?></a><span class="time"><?=$items['entertime']?></span></li> 
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
                                        <span><a href="/open/nowlist">近期开课</a></span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/open/nowlist">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($now as $items):?>
                                        <li><a href="/open/now/<?=$items['id']?>" title="开课:<?=$items['address']?> | <?=$items['classname']?>" target="_blank"><?=mb_substr($items['classname'],0,16)?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cm">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/open/hotlist">推荐课程</a></span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/open/hotlist">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($recommend as $items):?>
                                        <li><a href="/open/hot/<?=$items['id']?>" title="<?=$items['classname']?>" target="_blank"><?=mb_substr($items['classname'],0,22)?></a><span class="time"><?=$items['trainername']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/open/classtype">公开课分类</a></span>
                                    </h3>
                                </div>
                                <div class="bc">
                                    <ul class="traintype clearfix">
                        				<?php foreach($cate as $items):?>
                                        <li><a href="/open/classtype/<?=$items['id']?>"><?=$items['name']?></a></li> 
                        				<?php endforeach;?>
                                    </ul>
									<div>
										<img src='/www/default/img/image/main01.jpg' alt="" />
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="emptytips">
                    <img src="/www/default/img/image/baner001.jpg" width="980" alt="" />
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
                                        <span><a href="/trainer">讲师介绍</a></span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/trainer" target="_blank">更多</a></a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($trainer as $items):?>
                                        <li><a href="/trainer/show/<?=$items['id']?>" title="<?=$items['name']?>老师" target="_blank"><?=$items['name']?>老师</a><span class="time"><?=$items['trainertype']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cm">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/train">内训课程</a></span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/train" target="_blank">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($train as $items):?>
                                        <li><a href="/train/show/<?=$items['id']?>" title="<?=$items['classname']?>" target="_blank"><?=mb_substr($items['classname'],0,22)?></a><span class="time"><?=$items['trainername']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/train/classtype">内训分类</a></span>
                                    </h3>
                                </div>
                                <div class="bc">
                                    <ul class="traintype clearfix">
                        				<?php foreach($cate as $items):?>
                                        <li><a href="/train/classtype/<?=$items['id']?>"><?=$items['name']?></a></li> 
                        				<?php endforeach;?>
                                    </ul>
									<div>
										<img src='/www/default/img/image/main02.jpg' alt="" />
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--没有内容的时候显示以下提示信息-->
                <div class="row col3">
                    <div class="rt">
                        <h2>
                            <span><a href="/news">培训分类资讯</a></span>
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/news/newstype/1">人力资源</a></span>
                                    </h3>
                                    <span class="pr">
                                        <a href="/news" target="_blank">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                                        <?php foreach($news_type1 as $items):?>
                                        <li><a href="/news/show/<?=$items['id']?>" title="<?=$items['title']?>" target="_blank"><?=mb_substr($items['title'],0,16)?></a><span class="time"><?=$items['entertime']?></span></li> 
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cm">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/news/newstype/2">综合管理</a></span>
                                    </h3>
                                    <span class="pr">
                                        <a href="/news/newstype/2" target="_blank">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                                        <?php foreach($news_type2 as $items):?>
                                        <li><a href="/news/show/<?=$items['id']?>" title="<?=$items['title']?>" target="_blank"><?=mb_substr($items['title'],0,21)?></a><span class="time"><?=$items['entertime']?></span></li> 
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/news/newstype/3">生产管理</a></span>
                                    </h3>
                                    <span class="pr">
                                        <a href="/news/newstype/3" target="_blank">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                                        <?php foreach($news_type3 as $items):?>
                                        <li><a href="/news/show/<?=$items['id']?>" title="<?=$items['title']?>" target="_blank"><?=mb_substr($items['title'],0,18)?></a><span class="time"><?=$items['entertime']?></span></li> 
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
                                        <span><a href="/news/newstype/4">营销管理</a></span>
                                    </h3>
                                    <span class="pr">
                                        <a href="/news/newstype/4" target="_blank">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                                        <?php foreach($news_type4 as $items):?>
                                        <li><a href="/news/show/<?=$items['id']?>" title="<?=$items['title']?>" target="_blank"><?=mb_substr($items['title'],0,16)?></a><span class="time"><?=$items['entertime']?></span></li> 
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cm">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/news/newstype/5">财务管理</a></span>
                                    </h3>
                                    <span class="pr">
                                        <a href="/news/newstype/5" target="_blank">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                                        <?php foreach($news_type5 as $items):?>
                                        <li><a href="/news/show/<?=$items['id']?>" title="<?=$items['title']?>" target="_blank"><?=mb_substr($items['title'],0,21)?></a><span class="time"><?=$items['entertime']?></span></li> 
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/news/newstype/6">物流采购</a></span>
                                    </h3>
                                    <span class="pr">
                                        <a href="/news/newstype/6" target="_blank">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                                        <?php foreach($news_type6 as $items):?>
                                        <li><a href="/news/show/<?=$items['id']?>" title="<?=$items['title']?>" target="_blank"><?=mb_substr($items['title'],0,18)?></a><span class="time"><?=$items['entertime']?></span></li> 
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col3">
                    <div class="rt">
                        <h2>
                            <span><a href="/flink">友情链接</a></span>
                        </h2>
                    </div>
                    <div class="rc clearfix">
                    	<a href=""></a>
                    </div>
                </div>
        	</div>
            <div class="footer">
                <p>
                    <a href="/about" target="_blank">关于我们</a> |
                    <!--<a href="#">广告服务</a> |
                    <a href="#">免责声明</a> |
                    <a href="#">网站地图</a> |-->
                    <a href="/copyright" target="_blank">版权信息</a> |
                    <a href="/flink" target="_blank">友情链接</a>
                </p>
                <p>
                    Copyright &copy; 2010-2015 上海聚宇培训网 <script src="http://s19.cnzz.com/stat.php?id=2883866&web_id=2883866" language="JavaScript"></script>
                </p>
                <!--<p>
                沪ICP备:1000000号
                </p>-->
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