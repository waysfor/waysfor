        <div class="wrapper">
            <div class="content">
            	<div class="row col2">
                    <div class="rt">
                        <h2>
                            <span><a href="/news">培训资讯</a></span> - <?=$all['title']?>
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><?=$all['title']?></span>
                                    </h3>
									<?if(empty($all['source'])){?>
										<span class="pr"><a href="/news/my_news">更多公司资讯</a></span>
									<?} else {?>
										<span class="pr"><a href="/news/oth_news">更多行业新闻</a></span>
									<?}?>
                                </div>
                                <div class="bc">
									<div class="step_content" style="display:block">
										<div class="newinfo">
											<?if(empty($all['source'])){?>
											<span class="author"><strong>发布者：</strong><?=$all['author']?></span>
											<span><strong>发布时间：</strong><?=$all['entertime']?></span>
											<?} else {?>
											<span><strong>新闻来源：</strong><a href="<?=$all['url']?>"><?=$all['source']?></a></span>
											<span class="author"><strong>发布者：</strong><?=$all['author']?></span>
											<span><strong>发布时间：</strong><?=$all['entertime']?></span>
											<?}?>
										</div>
										<?=$all['content']?>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
							<?include_once('inc/type.php')?>
							<?include_once('inc/t_news.php')?>
                        </div>
                    </div>
                </div>


                <!--没有内容的时候显示以下提示信息-->
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
                    Copyright &copy; 2010-2015 上海聚宇培训网 
                </p>
                <!--<p>
                沪ICP备:1000000号
                </p>-->
            </div>
        </div>
<script type="text/javascript">
function show_step(step){
	$(".tags a")
		.attr("class","");
	$(".tags a")
		.eq(step)
		.attr("class","cerrent");
	$(".step_content")
			.hide()
			.eq(step)
			.show();
}
</script>