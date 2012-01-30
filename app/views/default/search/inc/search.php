                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/search">高级搜索</a></span>
                                    </h3>
                                </div>
								<form action="/search/" method="GET">
								<div class="bc">
									<form method="post">
									<ul class="search_area">
										<li>
											<span>课程名称</span>
											<input type="text" value="" alt="" />
										</li>
										<li>
											<span>搜索类型</span>
											<select>
												<?foreach($statusarray as $key=>$v):?>
												<option value="<?=$key?>"><?=$v?></option>
												<?endforeach;?>
											</select>
										</li>
										<li>
											<span>课程类型</span>
											<select>
												<?foreach($typearray as $key=>$v):?>
												<option value="<?=$key?>"><?=$v?></option>
												<?endforeach;?>
											</select>
										</li>
										<li>
											<span>开课地点</span>
											<select>
												<?foreach($cityarray as $key=>$v):?>
												<option value="<?=$key?>"><?=$v?></option>
												<?endforeach;?>
											</select>
										</li>
										<li>
											<span>课程内容</span>
										</li>
										<li>
											<span>价格范围</span>
										</li>
										<li>
											<a href="javascript:go();">开始</a>
										</li>
									</ul>
									</form>
								</div>
								</form>
                            </div>
<script language="javascript">
function go(){
	$('#content_1').ajax({
		type = "POST",
		url = '/search/result';
	});
}
</script>