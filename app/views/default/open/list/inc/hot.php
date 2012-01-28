                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/open/hot">热门课程</a></span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/open/hot">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($recommend as $items):?>
                                        <li><a href="/open/hot/<?=$items['id']?>"><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>