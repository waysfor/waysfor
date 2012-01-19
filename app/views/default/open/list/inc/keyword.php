                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span>标签云</span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="#">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($old as $items):?>
                                        <li><a href="/open/old/<?=$items['id']?>"><?=$items['classname']?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>