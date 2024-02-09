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
							 <form action="<?php echo site_url('Traitement/enregistrer'); ?>" method="post">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Equipement</th>
                                           <?php foreach($moisAvecSemaine as $moisAvecSemaine => $nbrSeamines)
										   { ?>
											<th colspan="<?php echo $nbrSeamines  ; ?>"><?php echo $moisAvecSemaine ; ?></th>
										 <?php  } ?>
                                        </tr>
										<tr>
											 <th></th>
											 <?php 
												   for($i=1;$i<53;$i++)
												{ ?>
											<th><?php echo $i ; ?></th>
												<?php 
												} ?>
                                    </thead>
                                  
                                    <tbody>
									<?php	for($a=0 ;$a<count($liste);$a++) 
														{ ?>	
                                        <tr>
																					
                                            <td><?php echo $liste[$a]['nom']; 	?></td>
                                             <?php  
											 
												   for($c=1;$c<53;$c++)
												{ ?>
												
											<td>
													<input type="checkbox" name="maintenance[<?php echo $liste[$a]['idEquipement']; ?>][<?php echo $c; ?>]" value="<?php echo $c; ?>" >
											</td>
												<?php 
														
													
												} ?>
										
                                        </tr>
                                       <?php 	 }
														?>	
                                    </tbody>
                                </table>
								<input type="submit" value="Enregistrer">
								</form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->