                            <div class="box">
                                <div class="bt">
                                    <h3>
                                        <span><a href="/search">高级搜索</a></span>
                                    </h3>
                                </div>
								<div class="bc">
									<form action="/search/" onsubmit="/search" method="GET">
									<ul class="search_area">
										<li>
											<span>课程名称：</span>
											<input type="text" name="txt" value="" class="txt" alt="" />
										</li>
										<li>
											<span>搜索类型：</span>
											<select name="channel">
												<option value="课程资源">课程资源</option>
												<option value="公开课">公开课</option>
												<option value="企业内训">企业内训</option>
											</select>
										</li>
										<li>
											<input type="hidden" value='0' name="per_page" />
											<input type="submit" class="smt" value="搜索" />
										</li>
									</ul>
									</form>
								</div>
                            </div>
<script language="javascript">
function go(){
	$('#content_1').ajax({
		type = "POST",
		url = '/search/result';
	});
}
</script>