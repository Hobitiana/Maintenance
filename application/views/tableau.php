<style>
.tete {
background-color: white;
  text-align: center;
  color: black;
  margin: 20px;
  padding: 20px;
}
.teteAGauche {
	background-color: white;
  text-align: left;
  color: black;
  margin: 20px;
  padding: 20px;
}
.teteADroite {
	background-color: white;
  text-align: right;
  color: black;
  margin: 20px;
  padding: 20px;
}
</style>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Liste</h1>
					<h6>REPRESENTATION ASECNA MADAGASCAR</br>														 
					SERVICE INFRASTRUCTURES RADIOELECTRIQUES</br>															
					UNITE DE MAINTENANCE RSI </h6>
				
			 <div class="tete">	
				TABLEAU DE SUIVI DES MAINTENANCES PREVENTIVES </br>
				ENSEMBLE SUPERIEUR	: 
			</div>
			 <div class="teteAGauche">	
			<u> Annee:</u>
			</div>
			 <div class="teteADroite">	
			<u> Semaine :</u> <?php echo $semaine[0]['semaine']; ?> 
			</div>
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
									<?php	for($a=0 ;$a<count($detail);$a++) 
														{ ?>	
                                        <tr>
																					
														
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $detail[$a]['designation']; 	?></td>
                                            <td></td>
                                            <td><?php echo $detail[$a]['emplacement']; 	?></td>
                                            <td></td>
											 <td></td>
										
                                        </tr>
                                       <?php 	 }
														?>	
                                    </tbody>
                                </table>
			
			
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
     
