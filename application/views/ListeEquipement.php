	<?php 
	$update = $this->session->userdata('afficherSuccesUpdate');
	$delete = $this->session->userdata('afficherSuccesDelete');
	
?>
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
							<?php if(isset($update)) { ?>
								<div class="alert alert-success">
								  <strong>Success!</strong> Update Succes <a href="#" class="alert-link"></a>.
								</div>
							<?php } ?>
					<?php if(isset($delete)) { ?>
								<div class="alert alert-success">
								  <strong>Success!</strong> Supprimer Succes <a href="#" class="alert-link"></a>.
								</div>
							<?php } ?>									
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Reference</th>
											<th>Option</th>
											<th>Option</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
									<?php	for($i=0 ;$i<count($liste);$i++)
														{ ?>	
                                        <tr>																				
                                            <td><a href="<?php echo site_url('CategorieController/ListeSousEnsemble')?>?idEquipement=<?php echo  $liste[$i]['idEquipement'];  ?> "><?php echo $liste[$i]['nom']; 	?></a></td>
                                            <td><?php echo $liste[$i]['reference']; 	?></td>	
											 <td><a href="<?php echo site_url('EquipementController/pageModif')?>?idEquipementModif=<?php echo  $liste[$i]['idEquipement'];  ?> " class="btn btn-primary btn-icon-split">
													<span class="icon text-white-50">
														<i class="fas fa-flag"></i>
													</span></td>	
											 <td><a href="<?php echo site_url('EquipementController/SupprEquipement')?>?idEquipementSupp=<?php echo  $liste[$i]['idEquipement'];  ?> "class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></td>	
                                        </tr>
                                       <?php 	 }
														?>	
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
	