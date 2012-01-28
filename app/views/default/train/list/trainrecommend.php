        <div class="wrapper">
            <div class="content">
            	<div class="row col2">
                    <div class="rt">
                        <h2>
                            <span><a href="/train">企业内训</a></span> - 热点内训
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cr">
							<?include_once('inc/type.php')?>
							<!--<?include_once('inc/demo.php')?>-->
							<?include_once('inc/recommend.php')?>
                        </div>
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>热点内训列表</span>
                                    </h3>
                                </div>
								<div class="mypage">
									<a href="<?=$my_page['url'].$my_page['min_pages']?>" class="page-far-left" title="第一页">第一页</a>
									<?php if($my_page['current_pages']>'1'){?>
									<a href="<?=$my_page['url'].$my_page['previous_pages']?>" class="page-left" title="上一页">上一页</a>
									<?php }?>
									<span>页数 <strong><?=$my_page['current_pages']?></strong> / <?=$my_page['pages']?></span>
									<?php if($my_page['current_pages']<$my_page['pages']){?>
									<a href="<?=$my_page['url'].$my_page['next_pages']?>" class="page-right" title="下一页">下一页</a>
									<?php }?>
									<a href="<?=$my_page['url'].$my_page['max_pages']?>" class="page-far-right" title="尾页">最后页</a>
									跳转到 <select onchange="javascript:window.location.href='<?=$my_page['url']?>'+(this.value-1)*<?=$my_page['sub_num']?>;">
										<?php
											for($i = 1; $i <= $my_page['pages']; $i++){
												if($i == $my_page['current_pages']){
													echo "<option value='$i' selected>$i</option>";
												}else{
													echo "<option value='$i'>$i</option>";
												}
											?>
										<?php }?>
									</select>
								</div>
                                <div class="bc">
                                    <ul class="list"> 
                        				<?php foreach($hotlist as $key=>$items):?>
                                        <li <?if($key%2 == '0'){echo 'class="bg"';}?>><a href="/train/recommend/<?=$items['id']?>"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
								<div class="mypage">
									<a href="<?=$my_page['url'].$my_page['min_pages']?>" class="page-far-left" title="第一页">第一页</a>
									<?php if($my_page['current_pages']>'1'){?>
									<a href="<?=$my_page['url'].$my_page['previous_pages']?>" class="page-left" title="上一页">上一页</a>
									<?php }?>
									<span>页数 <strong><?=$my_page['current_pages']?></strong> / <?=$my_page['pages']?></span>
									<?php if($my_page['current_pages']<$my_page['pages']){?>
									<a href="<?=$my_page['url'].$my_page['next_pages']?>" class="page-right" title="下一页">下一页</a>
									<?php }?>
									<a href="<?=$my_page['url'].$my_page['max_pages']?>" class="page-far-right" title="尾页">最后页</a>
									跳转到 <select onchange="javascript:window.location.href='<?=$my_page['url']?>'+(this.value-1)*<?=$my_page['sub_num']?>;">
										<?php
											for($i = 1; $i <= $my_page['pages']; $i++){
												if($i == $my_page['current_pages']){
													echo "<option value='$i' selected>$i</option>";
												}else{
													echo "<option value='$i'>$i</option>";
												}
											?>
										<?php }?>
									</select>
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