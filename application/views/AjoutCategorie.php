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
                            <h6 class="m-0 font-weight-bold text-primary">Categorie</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               <form class="user" action="<?php echo site_url('CategorieController/enregistrer'); ?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="equipement">
											<?php 
														for($i=0 ;$i<count($liste);$i++)
														{ ?>	
															
																<option value="<?php echo $liste[$i]['idEquipement']; ?>"><?php echo $liste[$i]['nom']; 	?></option>
															 
														<?php 	 }
														?>
									 </select>					
							
										</div>
                                    <div class="col-sm-6">
                                        <input type="text" name="nom" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Nom">
                                    </div>
                                </div>
                              
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="designation" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Designation">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="emplacement" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Emplacement">
                                    </div>
                                </div>
                              
                                     <input  class="btn btn-primary btn-user btn-block" type="submit" value="Enregistrer">
                               
                            </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->