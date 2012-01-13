    <!--  start nav -->
    <?php foreach($nav as $navper):?>
	<a href="/<?php echo $navper['item'];?>" <?php if ($this->uri->segment(1)==$navper['item']){ ?>class="current"<?php } ?>><span><?php echo $navper['name'];?></span></a>
	<?php endforeach; ?>
    <!--  start nav ... END -->