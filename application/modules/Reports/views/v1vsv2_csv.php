<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=Report_V1_vs_V2.xls");
?>

					<table>
						<tr>
							<th>Center Name</th>
							<!-- <th>No of Patient</th>
							<th>At Time Of Diagnosis Patient HbA1c</th> -->
							<!-- <th>Prescription With HbA1c</th> -->
							<th>Visit 1 HbA1c</th>
							<!-- <th>Visit 1 HbA1c (Paid)</th>
							<th>Visit 1 HbA1c (Free)</th> -->
							<th>Visit 2 HbA1c</th>
							<!-- <th>Visit 2 HbA1c (Paid)</th>
							<th>Visit 2 HbA1c (Free)</th> -->
							<!-- <th>OGLD</th>
							<th>HI</th>
							<th>MI</th> -->
						</tr>
						<?php if(isset($reports['centers'])){
							foreach($reports['centers'] as $report):
                                if($report['name']!='CThealth LTD'){ 
								?>
						<tr>
							<td><?= $report['name']?></td>
							<!-- <td><?= $report['p']['count']?></td>
							<td><?= $report['ph']['count']?></td> -->
							<!-- <td><?= $report['prh']['count']?></td> -->
							<td><?= $report['visit1']['count']?></td>
							<!-- <td><?= $report['visit1p']['count']?></td>
							<td><?= $report['visit1f']['count']?></td> -->
							<td><?= $report['visit2']['count']?></td>
							<!-- <td><?= $report['visit2p']['count']?></td>
							<td><?= $report['visit2f']['count']?></td> -->
							<!-- <td><?= $report['og']['count']?></td>
							<td><?= $report['hi']['count']?></td>
							<td><?= $report['mi']['count']?></td> -->
						</tr>
						<?php 
						if(isset($report['doctor'])){
							foreach($report['doctor'] as $doctor):
							?>
							<tr>
								<td ><?= $doctor['name']?></td>
								<!-- <td><?= $doctor['p']['count']?></td>
								<td><?= $doctor['ph']['count']?></td> -->
								<!-- <td><?= $doctor['prh']['count']?></td> -->
								<td><?= $doctor['visit1']['count']?></td>

								<!-- <td><?= $doctor['visit1p']['count']?></td>
								<td><?= $doctor['visit1f']['count']?></td> -->
								<td><?= $doctor['visit2']['count']?></td>
								<!-- <td><?= $doctor['visit2p']['count']?></td>
								<td><?= $doctor['visit2f']['count']?></td> -->

								<!-- <td><?= $doctor['og']['count']?></td>
								<td><?= $doctor['hi']['count']?></td>
								<td><?= $doctor['mi']['count']?></td> -->
							</tr>
							<?php endforeach;} } endforeach; }?>
					</table>