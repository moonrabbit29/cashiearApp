<div class="content ">

    <div class="card" style="width: 18rem; float:left;  
                width:30%; 
                height:280px; 
                margin-right:40px;
                ">
        <img class="card-img-top" src="<?= BASEURL ?>public/img/newemployee.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Register Pegawai Baru</h5>
            <p class="card-text">Registrasi Pegawai Baru oleh manager</p>
            <button class="btn btn-primary" data-toggle="modal" data-target="#formNewEmModal">Masukan Data</button>
        </div>
    </div>

    <!-- Modal untuk register pegawai baru-->

    <div class="modal fade" id="formNewEmModal" tabindex="-1" role="dialog" aria-labelledby="formNewEmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data baru Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= BASEURL; ?>public/home/new/" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="c_name">Cashier Name</label>
                            <input type="text" " class=" form-control" id="c_pname" name="c_name" placeholder="Cashier Name">
                        </div>
                        <div class="form-group">
                            <label for="c_address">Cashier address</label>
                            <input type="text" " class=" form-control" id="c_address" name="c_address" placeholder="Cashier Name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" " class=" form-control" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" " class=" form-control" id="password" name="password" placeholder="password" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save new data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- modal for sales report --> 
    <div class="modal fade" id="dateModal" tabindex="-1" role="dialog" aria-labelledby="dateModalLabel" aria-hidden="true">
        <form action="<?= BASEURL ?>public/home/salesreport" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dateModalLabel">Pilih rentang tanggal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="sdate" style="margin-right: 87px;">StartDate</label>
                            <label for="edate">EndDate</label>
                        </div>
                        <div class="form-group">
                            <input id="sdate" type="date" name="StartDate" require>
                            <input id="edate" type="date" name="EndDate" require>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="Submit" class="btn btn-primary"> Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="card" style="width: 18rem; float:left;  
                width:30%; 
                height:280px;
                margin-right:40px;
                
                ">
        <img id="report" class="card-img-top" style="" src="<?= BASEURL ?>public/img/report.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Laporan Keuangan</h5>
            <p class="card-text">Lihat laporan keuangan perminggu/perbulan/pertahun</p>
            <btn data-toggle="modal" data-target="#dateModal" class="btn btn-primary">Buka Laporan</btn>
        </div>
    </div>

    <div class="card" style="width: 18rem; float:left;  
                width:20%; 
                height:280px;
                ">
        <img id="report" class="card-img-top" style="" src="<?= BASEURL ?>public/img/cashier.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Edit Profile</h5>
            <p class="card-text">Edit Profile Pengguna</p>
            <button data-toggle="modal" data-target="#formEditModal" class="btn btn-primary">Edit</a>
        </div>
    </div>

    <!-- Modal untuk register edit profile baru-->

    <div class="modal fade" id="formEditModal" tabindex="-1" role="dialog" aria-labelledby="formEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= BASEURL; ?>public/home/edit/<?=$_SESSION['id']?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="c_name"> Name</label>
                            <input value="<?=$_SESSION['name']?>" type="text" class=" form-control" id="c_pname" name="M_name" placeholder="Cashier Name">
                        </div>
                        <div class="form-group">
                            <label for="c_address">address</label>
                            <input type="text" value="<?=$_SESSION['address']?>" class=" form-control" id="c_address" name="M_address" placeholder="Cashier Name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input require type="text" class=" form-control" id="username" name="username" placeholder="Cashier Name">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input require type="text"  class=" form-control" id="password" name="password" placeholder="Cashier Name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save new data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal untuk register edit profile baru-->


</div>