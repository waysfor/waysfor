                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>内训案例</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/train/hot">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="imgtxt">
                        				<?php foreach($recommend as $items):?>
                                        <li><a href="/train/hot/<?=$items['id']?>"><img src="/www/default/img/nav_bg.png" width="60" height="60" alt="" /><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>