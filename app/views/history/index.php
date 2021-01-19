<div class="content">
    <nav class="navbar navbar-light justify-content-between" style="background-color: #e3f2fd;">
        <a class="navbar-brand ">Bill History</a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dateModal">
            <i class="fas fa-calendar"></i>
        </button>
    </nav>

    <!-- modal for date select -->
    <div class="modal fade" id="dateModal" tabindex="-1" role="dialog" aria-labelledby="dateModalLabel" aria-hidden="true">
        <form action="<?= BASEURL ?>public/history/getBillByDate" method="post">
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
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" method="POST" action="<?= BASEURL ?>public/history/search">
            <input name="BillSearch" class="form-control mr-sm-2" type="search" placeholder="Search by Bill ID" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
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
            $batas = 4;
            $halaman = $data['halaman'];
            $halaman_awal = $data['halaman_awal'];
            $total_halaman = ceil($data['dataRange'] / $batas);
            $previous = $halaman - 1;
            $next = $halaman + 1;
            foreach ($data['bill']['bill'] as $bill) :
                $idx += 1;
            ?>
                <tr>
                    <td scope="row"><?= $idx ?></td>
                    <td><?= $bill['bill_Id'] ?></td>
                    <td><?= $bill['bill_date'] ?></td>
                    <td><?= $bill['amount'] ?></td>
                    <td class="justify-content-between">
                        <button class=" btn btn-md btn-danger" data-toggle="modal" data-target="#BillModal<?= $idx ?>">
                            Detail</button>
                    </td>
                </tr>
                <div class="modal fade" id="BillModal<?= $idx ?>" tabindex="-1" role="dialog" aria-labelledby="BillModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Receipt Bill</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <?php

                                foreach ($data['bill']['billDetail'] as $billDetail) :
                                    if ($billDetail['bill_Id'] == $bill['bill_Id']) {
                                ?>
                                        <label>Product Name</label>
                                        <input readonly type="text" value="<?= $billDetail['P_name'] ?>" class="form-control" id="pname" name="P_name">
                                        <label>Quantity</label>
                                        <input readonly type="number" value="<?= $billDetail['jumlah'] ?>" class="form-control" id="pname" name="P_name">
                                        <label>Subtotal</label>
                                        <input readonly type="number" value="<?= $billDetail['subtotal'] ?>" class="form-control" id="pname" name="P_name">
                                        <br>
                                <?php
                                    }
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
    <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href=".BASEURL."public/history/index/$previous"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="<?php echo BASEURL."public/history/index/$x" ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href=".BASEURL."public/history/index/$next"; } ?>>Next</a>
				</li>
			</ul>
		</nav>



</div>






<?php
function sortArrayByDate($array)
{
    usort($array, function ($a, $b) {
        return ($a['date'] < $b['date']) ? -1 : 1;
    });
}
?>