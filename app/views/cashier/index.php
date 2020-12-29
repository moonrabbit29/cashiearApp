<div class="content">
    <form>
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
                        <select id="item1" onchange="newRow(this)">
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
                        <input id="item1-Quantity"  name="item1-quantity" type="number" onkeyup="quantityOnchange(this)">
                    </td>
                    <td>
                        <input id="item1-Price" name="item1-Price" type="number" placeholder="normal price">
                    </td>
                    <td>
                        <input id="item1-Subtotal"  name="item1-Subtotal" type="text" placeholder="Subtotal">
                    </td>
                </tr>
                <tr id="total-payment">
                    <td colspan="4">Total : </td>
                    <td>
                        <p></p>
                    </td>
                    </td>
                </tr>
            </tbody>
        </table>
        <a class=" btn btn-md btn-success">Selesai</a>
    </form>
</div>