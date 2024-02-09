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
                            <h6 class="m-0 font-weight-bold text-primary">Equipement</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="<?php echo site_url('EquipementController/enregistrer'); ?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="nom" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nom Equipement">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="reference" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Reference">
                                    </div>
                                </div>
                               
                               <input type="submit" value="Enregistrer">
                                <hr>
                                
                            </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->