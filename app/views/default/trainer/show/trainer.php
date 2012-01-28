        <div class="wrapper">
            <div class="content">
            	<div class="row col2">
                    <div class="rt">
                        <h2>
                            <span><a href="/trainer">培训讲师</a></span> - <?=$allarray['fname']?>老师
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><?=$allarray['fname']?><?=$allarray['trainertype']?></span>
                                    </h3>
                                </div>
                                <div class="bc">
									<div class="step_content" style="display:block">
										<?=$allarray['content']?>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
							<!--<?include_once('inc/keyword.php')?>-->
							<?include_once('inc/type.php')?>
							<?include_once('inc/recommend.php')?>
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