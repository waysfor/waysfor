        <div class="wrapper">
            <div class="content">
            	<div class="row col2">
                    <div class="rt">
                        <h2>
                            <span><a href="/open">公开课</a></span> - <?=$showinfo['classname']?>
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><?=$showinfo['classname']?></span>
                                    </h3>
                                </div>
                                <div class="bc">
									<?include_once('inc/classinfo.php')?>
									<div class="tags">
										<a href="javascript:show_step(0)" class="cerrent">课程大纲</a>
										<a href="javascript:show_step(1)">讲师介绍</a>
									</div>
									<div class="step_content" style="display:block">
										<?=$showinfo['classcontent']?>
									</div>
									<div class="step_content">
										<div>
											<span style="color:#e53333;"><b>培训讲师：</b></span><?=$showinfo['trainername']?> 老师
										</div>
										<?=$showinfo['trainercontent']?>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
							<!--<?include_once('inc/keyword.php')?>-->
							<?include_once('inc/type.php')?>
							<?include_once('inc/now.php')?>
							<?include_once('inc/hot.php')?>
							<?include_once('inc/old.php')?>
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
                    Copyright &copy; 2010-2015 上海聚宇培训网 <script src="http://s19.cnzz.com/stat.php?id=2883866&web_id=2883866" language="JavaScript"></script>
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