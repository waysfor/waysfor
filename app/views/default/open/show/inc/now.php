                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/open/nowlist">近期开课</a></span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/open/nowlist">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($now as $items):?>
                                        <li><a href="/open/now/<?=$items['id']?>" title="<?=$items['classname']?>" target="_blank"><?=mb_substr($items['classname'],0,18)?></a><span class="time"><?=$items['opentime']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>