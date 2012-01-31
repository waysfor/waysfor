                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/trainer/recommend">推荐讲师</a></span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/trainer/recommend">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($recommend as $items):?>
                                        <li><a href="/trainer/recommend/<?=$items['id']?>"><?=$items['name']?>老师</a><span class="time"><?=$items['trainertype']?></span></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>