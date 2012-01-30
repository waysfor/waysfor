                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/search">高级搜索</a></span>
                                    </h3>
                                </div>
								<form action="/search/" onsubmit="return false" method="GET">
								<div class="bc">
									<form method="post">
									<ul class="search_area">
										<li>
											<span>课程名称</span>
											<input type="text" name="classname" value="" alt="" />
										</li>
										<li>
											<span>搜索类型</span>
											<select name="status">
												<?foreach($statusarray as $key=>$v):?>
												<option value="<?=$key?>"><?=$v?></option>
												<?endforeach;?>
											</select>
										</li>
										<li>
											<span>课程类型</span>
											<select class="classtype">
												<?foreach($typearray as $key=>$v):?>
												<option value="<?=$key?>"><?=$v?></option>
												<?endforeach;?>
											</select>
										</li>
										<li>
											<input type="submit" value="搜索" />
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