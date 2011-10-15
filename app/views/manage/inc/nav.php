		<!--  start nav-outer-repeat................................................................................................. START -->
		<div class="nav-outer-repeat"> 
		<!--  start nav-outer -->
		<div class="nav-outer">
		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="/www/manage/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="/index.php/manage/logout" id="logout"><img src="/www/manage/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">账户设置</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">个人信息</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">操作细节</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">收信箱</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">账户统计</a> 
			</div>
			</div>
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="<?php if ($this->uri->segment(2)=='open' || ($this->uri->segment(3)=='open' && $this->uri->segment(2)=='add')){echo 'current';}else{echo 'select';};?>"><li><a href="/admin/open"><b>公开课管理</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if ($this->uri->segment(2)=='open' || $this->uri->segment(2)=='add'){echo 'show';};?>">
			<ul class="sub">
				<li<?php if($this->uri->segment(2)=='open'){echo ' class="sub_show"';};?>><a href="/admin/open">查看列表</a></li>
				<li<?php if($this->uri->segment(3)=='open'){echo ' class="sub_show"';}?>><a href="/admin/add/open">添加公开课</a></li>
				<li<?php if($this->uri->segment(3)=='cate'){echo ' class="sub_show"';}?>><a href="/admin/add/open">分类管理</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="<?php if ($this->uri->segment(2)=='train' || ($this->uri->segment(3)=='train' && $this->uri->segment(2)=='add')){echo 'current';}else{echo 'select';};?>"><li><a href="/admin/train"><b>内训管理</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if ($this->uri->segment(2) == 'train' || $this->uri->segment(2)=='add'){echo 'show';};?>">
			<ul class="sub">
				<li<?php if($this->uri->segment(2)=='train'){echo ' class="sub_show"';};?>><a href="/admin/train">查看列表</a></li>
				<li<?php if($this->uri->segment(2)=='add'){echo ' class="sub_show"';}?>><a href="/admin/add/train">添加内训</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if ($this->uri->segment(2)=='trainer' || ($this->uri->segment(3)=='trainer' && $this->uri->segment(2)=='add')){echo 'current';}else{echo 'select';};?>"><li><a href="/admin/trainer"><b>讲师管理</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if ($this->uri->segment(2)=='trainer' || $this->uri->segment(2)=='add'){echo 'show';};?>">
			<ul class="sub">
				<li<?php if($this->uri->segment(2)=='trainer'){echo ' class="sub_show"';};?>><a href="/admin/trainer">查看列表</a></li>
				<li<?php if($this->uri->segment(2)=='add'){echo ' class="sub_show"';}?>><a href="/admin/add/trainer">添加讲师</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if ($this->uri->segment(2)=='news' || ($this->uri->segment(3)=='news' && $this->uri->segment(2)=='add')){echo 'current';}else{echo 'select';};?>"><li><a href="/admin/news"><b>新闻管理</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if ($this->uri->segment(2)=='news' || $this->uri->segment(2)=='add'){echo 'show';};?>">
			<ul class="sub">
				<li<?php if($this->uri->segment(2)=='news'){echo ' class="sub_show"';};?>><a href="/admin/news">查看列表</a></li>
				<li<?php if($this->uri->segment(2)=='add'){echo ' class="sub_show"';}?>><a href="/admin/add/news">添加新闻</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if ($this->uri->segment(2)=='resource' || ($this->uri->segment(3)=='resource' && $this->uri->segment(2)=='add')){echo 'current';}else{echo 'select';};?>"><li><a href="/admin/resource"><b>资源管理</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if ($this->uri->segment(2)=='resource' || $this->uri->segment(2)=='add'){echo 'show';};?>">
			<ul class="sub">
				<li<?php if($this->uri->segment(2)=='resource'){echo ' class="sub_show"';};?>><a href="/admin/resource">查看列表</a></li>
				<li<?php if($this->uri->segment(2)=='add'){echo ' class="sub_show"';}?>><a href="/admin/add/resource">添加资源</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if ($this->uri->segment(2)=='member' || ($this->uri->segment(3)=='member' && $this->uri->segment(2)=='add')){echo 'current';}else{echo 'select';};?>"><li><a href="/admin/member"><b>员工管理</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if ($this->uri->segment(2)=='member' || $this->uri->segment(2)=='add'){echo 'show';};?>">
			<ul class="sub">
				<li<?php if($this->uri->segment(2)=='member'){echo ' class="sub_show"';};?>><a href="/admin/member">查看列表</a></li>
				<li<?php if($this->uri->segment(2)=='add'){echo ' class="sub_show"';}?>><a href="/admin/add/member">员工管理</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if ($this->uri->segment(2)=='robot' || ($this->uri->segment(3)=='robot' && $this->uri->segment(2)=='add')){echo 'current';}else{echo 'select';};?>"><li><a href="/admin/robot"><b>爬虫管理</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if ($this->uri->segment(2)=='robot' || $this->uri->segment(2)=='add'){echo 'show';};?>">
			<ul class="sub">
				<li><a href="#nogo">查看列表</a></li>
				<li><a href="#nogo">添加记录</a></li>
			 
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->
		</div>
		<div class="clear"></div>
		<!--  start nav-outer -->
		</div>
		<!--  start nav-outer-repeat................................................... END -->