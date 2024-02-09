<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Date/Heure</th>
                                            <th>N°BT</th>
                                            <th>Equipement</th>
                                            <th>Type de Maintenance</th>
                                            <th>Site/Emplacement</th>
                                            <th>INTERVENANT</th>
											<th>OBSERVATION</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
									<?php	for($i=0 ;$i<count($liste);$i++)
														{ ?>	
                                        <tr>
																					
														
                                            <td>Date</td>
                                            <td>N°BT</td>
                                            <td><?php echo $liste[$i]['designation']; 	?></td>
                                            <td>RIEN</td>
                                            <td><?php echo $liste[$i]['emplacement']; 	?></td>
                                            <td>Interv</td>
											 <td>Obs</td>
										
                                        </tr>
                                       <?php 	 }
														?>	
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
	<?php $mois=['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre']; ?>
	<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Equipement</th>
                                           <?php  for($i=0;$i<12;$i++)
										   { ?>
											<th><?php echo $mois[$i] ; ?></th>
										 <?php  } ?>
                                        </tr>
										<tr>
											 <th></th>
											 <?php  for($i=1;$i<12;$i++)
										   { 
												   for($i=1;$i<52;$i++)
												{ ?>
											<th><?php echo $i ; ?></th>
												<?php }
												} ?>
                                    </thead>
                                  
                                    <tbody>
									<?php	for($i=0 ;$i<count($liste);$i++)
														{ ?>	
                                        <tr>
																					
                                            <td><?php echo $liste[$i]['designation']; 	?></td>
                                             <?php  for($i=1;$i<12;$i++)
										   { 
												   for($i=1;$i<52;$i++)
												{ ?>
											<td>
													<input type="checkbox" name="">
											</td>
												<?php }
												} ?>
										
                                        </tr>
                                       <?php 	 }
														?>	
                                    </tbody>
                                </table>
								<input type="submit" value="Enregistrer">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->