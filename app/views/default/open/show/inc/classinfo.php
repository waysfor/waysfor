                                	<div class="ciarea">
										<table class="classinfo">
											<thead>
												<tr>
													<th>开课地址</th>
													<th>开课时间</th>
													<th>结束时间</th>
													<th>培训费用</th>
												</tr>
											</thead>
											<tbody>
											<?if(!empty($openinfo)){?>
												<?foreach($openinfo as $key=>$v):?>
												<tr>
													<td><?=$v['address']?></td>
													<td><?=$v['opentime']?></td>
													<td><?=$v['endtime']?></td>
													<td><?=$showinfo['price']?>/人</td>
												</tr>
												<?endforeach;?>
											<?} else {?>
												<tr>
													<td colspan="4"><span>请拨打我们的客服热线</span>：021-20903136-802 ，真诚为您服务！</td>
												</tr>
											<?}?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="4">
														<span>授课对象：</span>
														<?=$showinfo['object']?>
													</td>
												</tr>
												<?if(!empty($openinfo)){?>
												<tr>
													<td colspan="4">
														<span><strong>报名电话</strong></span>：021-20903136-801
													</td>
												</tr>
												<?}?>
											</tfoot>
										</table>
									</div>