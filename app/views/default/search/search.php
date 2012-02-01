        <div class="wrapper">
            <div class="content">
            	<div class="row col2">
                    <div class="rt">
                        <h2>
                            <span><a href="/search">课程搜索</a></span>
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cl" id="content_1">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>课程搜索：</span>
                                    </h3>
                                </div>
								<div class="bc">
									<form action="/search/" onsubmit="/search" method="GET">
									<ul class="search_area">
										<li>
											<span>课程名称：</span>
											<input type="text" name="txt" value="" class="txt" alt="" />
										</li>
										<li>
											<span>搜索类型：</span>
											<select name="channel">
												<option value="课程资源">课程资源</option>
												<option value="公开课">公开课</option>
												<option value="企业内训">企业内训</option>
											</select>
										</li>
										<li>
											<input type="hidden" value='0' name="per_page" />
											<input type="submit" class="smt" value="搜索" />
										</li>
									</ul>
									</form>
								</div>
                            </div>
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>联系我们：</span>
                                    </h3>
                                </div>
								<div class="bc">
									<dl class="linkme">
										<dt>您好，尊敬的顾客。上海聚宇企业管理培训网隶属于上海聚宇企业管理咨询有限公司，目前网站尚处测试阶段，给您带来的不便深感抱歉。欢迎您来索取您需要的培训信息，您可以通过以下方式与我们进行联系：</dt>
										<dd>咨询电话：021 - 20903136</dd>
										<dd>咨询邮箱：service@waysfor.com</dd>
										<dd>客服热线1：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3915085&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3915085:41" alt="欢迎咨询！" title="欢迎咨询！"></a></dd>
										<dd>客服热线2：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2528902526&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:2528902526:41" alt="欢迎咨询！" title="欢迎咨询！"></a></dd>
										<dd>客服热线3：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1372336529&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1372336529:41" alt="欢迎咨询！" title="欢迎咨询！"></a></dd>
									</dl>
								</div>
                            </div>
                        </div>
                        <div class="cr">
							<?include_once('inc/now.php')?>
							<?include_once('inc/hot.php')?>
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