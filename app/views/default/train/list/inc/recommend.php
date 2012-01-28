                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/train/recommend">热点内训</a></span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/train/recommend">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($recommend as $items):?>
                                        <li><a href="/train/recommend/<?=$items['id']?>"><?=$items['classname']?></a><span class="time"><?=$items['trainername']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>