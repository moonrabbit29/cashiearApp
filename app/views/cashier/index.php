<div class="content">
    <form id="submit-payment" method="post" action="<?= BASEURL ?>/public/cashier/createbill">
        <table id="myTable" class="table table-bordered">
            <thead>
                <tr class="">
                    <th>No</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Cost(Per Item)</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr class=" " id="1">
                    <td scope="row">1</td>
                    <td>
                        <select id="item1" name="item1-name" onchange="newRow(this)">
                            <option value=""></option>
                            <?php
                            foreach ($data['product'] as $product) :
                            ?>
                                <option value="<?= $product['P_name']; ?>"><?= $product['P_name']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </td>
                    <td>
                        <input id="item1-Quantity" name="item1-quantity" type="number" onkeyup="quantityOnchange(this)">
                    </td>
                    <td>
                        <input id="item1-Price" name="item1-Price" type="number" placeholder="normal price">
                    </td>
                    <td>
                        <input id="item1-Subtotal" name="item1-Subtotal" type="text" placeholder="Subtotal">
                    </td>
                </tr>
                <tr id="total-payment">
                    <td colspan="4">Total : </td>
                    <td>
                        <p id="totalToPay"></p>
                        <input id="totalTopayInput" name="totalToPay" type="hidden" value="0">
                        <input type="hidden" name="rowCount" value="1"></input>
                    </td>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-5 form-group">
                <label for="pay">Bayar</label>
                <input type="number" class="form-control" id="payTotal" placeholder="Jumlah dibayarkan" onkeyup="giveChange(this)">
            </div>
            <div class="col-5 form-group">
                <label for="change">Change</label>
                <input type="text" class="form-control" id="change" placeholder="Change/kembalian">
            </div>
            
            <button type="submit" name="payment_success" class=" col-2 btn btn-primary">Pay</button>
        </div>

    </form>






    <!-- <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="public/cashier/createBill" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pname">Total Checkout</label>
                            <p id="pname" ></p>
                            
                        </div>
                        <div class="form-group">
                            <label for="pay"></label>
                            <input type="number" class="form-control" id="payTotal" placeholder="Jumlah dibayarkan" onkeyup="giveChange(<?= $_POST['totalToPay'] ?>)">
                        </div>
                        <div class="form-group">
                            <label for="change">Change</label>
                            <input type="text" class="form-control" id="change" placeholder="Change/kembalian">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-dismiss="modal" onclick="javascript:window.location='<?= BASEURL ?>public/cashier/'" href="">Close</a>
                        <button type="submit" name="payment_success" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->