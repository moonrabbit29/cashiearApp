<div class="content ">



   
`
    <div class="card" style="width: 18rem; float:left;  
                width:80%; 
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
                            <input type="text" class=" form-control" id="username" name="username" placeholder="Cashier username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text"  class=" form-control" id="password" name="password" placeholder="Cashier password" required>
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