        <div class="wrapper">
            <div class="content">
                <!--col2表示有两列-->
                <div class="row col2">
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
                                <img src="/www/default/img/nav_bg.png" width="652px" height="195" alt="" />
                            </div>
                        </div>
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>培训新闻</span>
                                    </h3>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($news as $items):?>
                                        <li><a href="#"><?=$items['title']?></a><span class="time"><?=$items['entertime']?></span></li> 
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
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($now as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
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
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($recommend as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
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
                                        <li><a href="#"><?=$items['name']?></a></li> 
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
                                    	<a href="#">更多</a>
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
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
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
                                        <li><a href="#"><?=$items['name']?></a></li> 
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
                            <span><a href="/train">培训分类资讯</a></span>
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
                                    模块内容
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
                        				<?php foreach($train as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
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
                        				<?php foreach($train as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
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
                                    模块内容
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
                        				<?php foreach($train as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
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
                        				<?php foreach($train as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
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