<div class="content">
    <table id="myTable" class="table table-bordered mt-5" style="width: 100%;  table-layout:fixed;">
        <thead>
            <tr>
                <th style="width: 10%;">No</th>
                <th style="width: 25%; ">Bill ID</th>
                <form>
                <th style="width: 30% ">Date<i type="button" class="fas fa-sort text-right" style="margin-left:250px;" onclick=""></th>
                </form>
                <th style="width: 20%">Jumlah</th>
                <th style="width: 15%;">Action </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $idx = 0;
            foreach ($data['bill']['bill'] as $bill) :
                $idx += 1;
            ?>
                <tr>
                    <td scope="row"><?= $idx ?></td>
                    <td><?= $bill['bill_Id'] ?></td>
                    <td><?= $bill['bill_date'] ?></td>
                    <td><?= $bill['amount'] ?></td>
                    <td class="justify-content-between">
                        <a class=" btn btn-md btn-danger">
                            Detail</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
    <div class="modal fade" id="BillModal" tabindex="-1" role="dialog" aria-labelledby="BillModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Receipt Bill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    
</div>






<?php
function sortArrayByDate($array)
{
    usort($array, function ($a, $b) {
        return ($a['date'] < $b['date']) ? -1 : 1;
    });
}
?>