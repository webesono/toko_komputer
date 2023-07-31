<style>
    /* a {
        color: inherit;
        text-decoration: inherit;
    } */

    button {
        background: none;
        color: inherit;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;
    }

    .w-fit {
        width: -moz-fit-content;
        width: fit-content;
    }

    .h-fit {
        height: -moz-fit-content;
        height: fit-content;
    }

    .m-5 {
        margin: 1.25rem;
    }

    .flex {
        display: flex;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }

    .items-center {
        align-items: center;
    }

    .justify-center {
        justify-content: center;
    }

    .text-center {
        text-align: center;
    }

    .border-b-2 {
        border-bottom-width: 2px;
    }

    .w-full {
        width: 100%;
    }

    .h-\[114px\] {
        height: 114px;
    }

    .w-\[114px\] {
        width: 114px;
    }

    .rounded-full {
        border-radius: 9999px;
    }
</style>

<div class="container mt-5">
    <div class="container d-flex">
        <div class="w-50">
            <canvas id="myChart"></canvas>
        </div>
        <div class="w-50">
            <canvas id="myChart2"></canvas>
        </div>

    </div>


    <!-- DataTables Club -->

    <div class="w-full">
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive" style="margin:10px;">

                <table class="table table-hover table-striped align-middle" id="lastTable" style="width: 100%;max-width:100%;">
                    <thead class="">
                        <tr>
                            <th>No</th>
                            <th>Konsumen</th>
                            <th>Alamat</th>
                            <th>Tanggal Penjualan</th>
                            <th>Total Penjualan</th>

                        </tr>
                    </thead>
                    <tbody id="tbl_data">

                    </tbody>
                </table>
                <!-- Paginate -->
                <div class="pagination"></div>
            </div>
        </div>
    </div>
</div>



<!-- </div> -->
<!-- </div> -->


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                if (count($sell_graph) > 0) {
                    foreach ($sell_graph as $data) {
                        echo "'" . $data['day'] . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: 'Jumlah Penjualan',
                backgroundColor: '#ADD8E6',
                borderColor: '##93C3D2',
                data: [
                    <?php
                    if (count($sell_graph) > 0) {
                        foreach ($sell_graph as $data) {
                            echo $data['num'] . ", ";
                        }
                    }
                    ?>
                ]
            }]
        },
    });
</script>

<script type="text/javascript">
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                <?php
                if (count($kategori_graph) > 0) {
                    foreach ($kategori_graph as $data) {
                        echo "'" . $data['nama_kategori'] . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: 'Jumlah Barang',
                backgroundColor: [
                    <?php
                    if (count($kategori_graph) > 0) {
                        foreach ($kategori_graph as $data) {
                            echo "'" . $data['bg'] . "', ";
                        }
                    }
                    ?>
                ],
                borderColor: '##93C3D2',
                data: [
                    <?php
                    if (count($kategori_graph) > 0) {
                        foreach ($kategori_graph as $data) {
                            echo $data['jumlah_barang'] . ", ";
                        }
                    }
                    ?>
                ]
            }]
        },
    });
</script>

<script src="<?= base_url('assets/js/index.js'); ?>"></script>
<script src="<?= base_url('assets/js/slick.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/landingpage.js'); ?>"></script>
<script src="<?= base_url('assets/js/jual.js'); ?>"></script>