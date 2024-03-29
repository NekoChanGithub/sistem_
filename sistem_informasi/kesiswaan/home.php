<!-- Page Heading  -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
 <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
 </div>

<!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Pelatih</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-700">
                                                <?php    
                                            $ambl = $kn->query("SELECT COUNT(*) as total_pelatih FROM tb_pelatih_ekstra");
                                            $pelatih = $ambl->fetch_assoc();
                                            ?>
                                            <?php  
                                             echo $pelatih["total_pelatih"]; 
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Total Ekstrakurikuler
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-700">
                                                 <?php    
                                            $ambl = $kn->query("SELECT COUNT(*) as total_ekstra FROM tb_ekstra");
                                            $ekstra = $ambl->fetch_assoc();
                                            ?>
                                            <?php  
                                             echo $ekstra["total_ekstra"]; 
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-school fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Total Siswa Mengikuti Ekstrakurikuler
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-700">
                                                 <?php    
                                            $ambl = $kn->query("SELECT COUNT(*) as total_siswa FROM tb_ekstra_diikuti WHERE id_user GROUP BY id_user");
                                            $siswa = $ambl->fetch_assoc();
                                            ?>
                                            <?php  
                                             echo $siswa["total_siswa"]; 
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>