                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/train/classtype">课程类型</a></span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/train/classtype">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list fmenu">
                        				<?php foreach($cate as $items):?>
                                        <li><a href="/train/classtype/<?=$items['id']?>" title="<?=$items['name']?>"><?=$items['name']?></a></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>