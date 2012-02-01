        <div class="wrapper">
            <div class="content">
            	<div class="row col2">
                    <div class="rt">
                        <h2>
                            <span><a href="/search">高级搜索</a></span>
                        </h2>
                    </div>
                    <div class="rc clearfix">
                        <div class="cl">
                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>搜索词： "<?=$key?>"</span>
                                    </h3>
									<span class="pr">共搜索出：<?=$my_page['all_num']?>条</span>
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
                                    <ul class="list openlist">
                        				<?php foreach($all as $key=>$items):?>
                                        <li <?if($key%2 == '0'){echo 'class="bg"';}?>><a href="/<?if($items['status']==1){?>open<?} else {?>train<?}?>/show/<?=$items['id']?>" title="<?=$items['classname']?>" target="_blank">【<?if($items['status']==1){?>公开课<?} else {?>企业内训<?}?>】<?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
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
                        <div class="cr">
							<?include_once('inc/search.php')?>
							<?include_once('inc/linkme.php')?>
                        </div>
					</div>
				</div>
			</div>
		</div>