        <div class="wrapper">
            <div class="content">
            	<div class="row col2">
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
                                        <span><?=$showall['classname']?></span>
                                    </h3>
                                </div>
                                <div class="bc">
                                	<div class="">
										<ul>
											<li>
												<span>授课对象：</span>
												<?=$showall['object']?>
											</li>
										</ul>
									</div>
									<div class="">
										<a href="javascript:show_step(0)">课程大纲</a>
										<a href="javascript:show_step(1)">讲师选择</a>
									</div>
									<div class="step_content" style="display:block">
										<?=$showall['classcontent']?>
									</div>
									<div class="step_content">
										暂无讲师<?=$showall['trainercontent']?>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="cr">
							<?include_once('inc/about_client.php')?>
							<?include_once('inc/keyword.php')?>
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
	$(".step_content",document.getElementById("demo"))
			.hide()
			.eq(step)
			.show();
}
</script>