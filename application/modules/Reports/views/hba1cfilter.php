<table id="example" class="table table-striped table-bordered w-100">
											<thead>
												<tr>
													<th class="twd-23p">Center Name</th>
													<th class="twd-7p">No. Of Patient</th>
													<th class="twd-7p">Prescription <br>With HbA1c</th>
													<th class="twd-7p">Visit 1 <br>HbA1c</th>
													<th class="twd-7p">Visit 1 <br>HbA1c (Paid)</th>
													<th class="twd-7p">Visit 1 <br>HbA1c (Free)</th>
													<th class="twd-7p">Visit 2 <br>HbA1c</th>
													<th class="twd-7p">Visit 2 <br>HbA1c (Paid)</th>
													<th class="twd-7p">Visit 2 <br>HbA1c (Free)</th>
													<th class="twd-7p">OGLD</th>
													<th class="twd-7p">HI</th>
													<th class="twd-7p">MI</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($hba1c_byfilter as $hba1cfilter) {?>
													
												
												<tr>
													<td><?php echo $hba1cfilter->center_name;?></td>
													<td><?php echo $hba1cfilter->totalpt;?></td>
													<td><?php echo $hba1cfilter->totalhba1c;?></td>
													<td>4</td>
													<td>5</td>
													<td>6</td>
													<td>7</td>
													<td>8</td>
													<td>9</td>
													<td>10</td>
													<td>11</td>
													<td>12</td>
												</tr>
												<?php }?>
											</tbody>
										</table>