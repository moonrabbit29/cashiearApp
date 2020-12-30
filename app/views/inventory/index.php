<div class="content">
    <nav class="navbar navbar-light justify-content-between" style="background-color: #e3f2fd;">
        <a class="navbar-brand ">Inventory</a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
            <i class="fas fa-plus"></i>
        </button>
    </nav>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

    <table id="myTable" class="table table-bordered mt-5" style="width: 100%;  table-layout:fixed;">
        <thead>
            <tr>
                <th style="width: 10%;">No</th>
                <th style="width: 25%; ">Item name</th>
                <th style="width: 15% ">Quantitys</th>
                <th style="width: 15%">Sell price(Per Item)</th>
                <th style="width: 15% ">Buy Cost(per item)</th>
                <th style="width: 20%;">Action </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $idx = 0;
            foreach ($data['inventory'] as $product) :
                $idx += 1;
            ?>
                <tr>
                    <td scope="row"><?= $idx ?></td>
                    <td><?= $product['P_name'] ?></td>
                    <td><?= $product['P_stock'] ?></td>
                    <td><?= $product['P_sell'] ?></td>
                    <td><?= $product['P_price'] ?></td>
                    <td class="justify-content-between">
                        <a class=" btn btn-md btn-success">Edit</a>
                        <a class=" btn btn-md btn-danger">
                            Detail</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan item baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= BASEURL; ?>public/inventory/tambah" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pname">Product Name</label>
                            <input type="text" class="form-control" id="pname" name="P_name" placeholder="nama produk">
                        </div>
                        <div class="form-group">
                            <label for="mfdate">Manufacture Date</label>
                            <input type="date" class="form-control" id="mfdate" name="P_mfdate" placeholder="Manufacture date">
                        </div>
                        <div class="form-group">
                            <label for="expdate">Expire Date</label>
                            <input type="date" class="form-control" id="expdate" name="P_expdate" placeholder="Exp date">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="price">
                        </div>
                        <div class="form-group">
                            <label for="splier">Supplier</label>
                            <input type="text" class="form-control" id="splier" name="P_suplier" placeholder="Suplier name">
                        </div>
                        <div class="form-group">
                            <label for="sellp">Sell price</label>
                            <input type="number" class="form-control" id="sellp" name="P_sell" placeholder="sell price">
                        </div>
                        <div class="form-group">
                            <label for="sellp">Stock</label>
                            <input type="number" class="form-control" id="pstock" name="P_stock" placeholder="Stock">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>