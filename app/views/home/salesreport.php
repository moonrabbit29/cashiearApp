<div class="content">
    <nav class="navbar navbar-light justify-content-between" style="background-color: #e3f2fd;">
        <a class="navbar-brand ">Total Penjualan : </a>
        <h3><?=$data['bill']['total']?></h3>
    </nav>

    <table id="myTable" class="table table-bordered mt-5" style="width: 100%;  table-layout:fixed;">

        <thead>
            <tr>
                <th style="width: 20%;">No</th>
                <th style="width: 40%; ">Date</th>
                <th style="width: 40%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $idx = 1;
        foreach($data['bill']['date'] as $dt):
        ?>
        <tr>
        <td scope="row"><?= $idx ?></td>
                    <td><?= $dt['date']?></td>
                    <td><?= $dt['nominal'] ?></td>
        </tr>
        <?php
        $idx+=1;
        endforeach;
        ?>
        </tbody>

    </table>
</div>