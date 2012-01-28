                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/trainer/trainertype">讲师类型</a></span>
                                    </h3>
                                    <span class="pr">
                                    	<a href="/trainer/trainertype">更多</a>
                                    </span>
                                </div>
                                <div class="bc">
                                    <ul class="list">
                        				<?php foreach($cate as $items):?>
                                        <li><a href="/trainer/trainertype/<?=$items['id']?>"><?=$items['name']?></a></li> 
                        				<?php endforeach;?>
                                    </ul>
                                </div>
                            </div>