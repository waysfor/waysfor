        <div class="wrapper">
            <div class="content">
            	<div class="row col2">
                    <div class="rt">
                        <h2>
                            <span>公开课</span>
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cr">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>课程类型</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                                        <li><a href="#">人力资源</a></li>
                                        <li><a href="#">综合管理</a></li>
                                        <li><a href="#">生产管理</a></li>
                                        <li><a href="#">营销管理</a></li>
                                        <li><a href="#">财务管理</a></li>
                                        <li><a href="#">物流采购</a></li>
                                    </ul>
                                </div>
                            </div>
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
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>热门课程</span>
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
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>已开课程</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($recommend as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>公开课程</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="#">上海</a>
                                    	<a href="#">北京</a>
                                    	<a href="#">广州</a>
                                    	<a href="#">其他</a> &nbsp;|&nbsp;
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                	<div class="">人力资源课程</div>
                                    <ul class="list">
                        				<?php foreach($now as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                                <div class="bc">
                                	<div class="">综合管理课程</div>
                                    <ul class="list">
                        				<?php foreach($now as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                                <div class="bc">
                                	<div class="">生产管理课程</div>
                                    <ul class="list">
                        				<?php foreach($now as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                                <div class="bc">
                                	<div class="">营销管理课程</div>
                                    <ul class="list">
                        				<?php foreach($now as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                                <div class="bc">
                                	<div class="">财务管理课程</div>
                                    <ul class="list">
                        				<?php foreach($now as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                                <div class="bc">
                                	<div class="">物流采购课程</div>
                                    <ul class="list">
                        				<?php foreach($now as $items):?>
                                        <li><a href="#"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
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