
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Liste</h1>
					<?php $rotation=[
							'ordie' => 8,
							'Meteo' => 5,
							'suppo' => 7,
							];
					$semaine=1;
					foreach($rotation as $equipement => $sousEnsembles) {
							for($sousEnsembles=1; $sousEnsembles <=50;$sousEnsembles++) {
								echo "semaine";
								if($sousEnsembles == $sousEnsembles) {
										$semaine++;
									}
							} 
					}?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
     
