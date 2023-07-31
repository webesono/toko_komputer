<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
<!-- jika menggunakan bootstrap4 gunakan css ini  -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->



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


<!-- DataTables Club -->

<div class="w-full">
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive" style="margin:10px;">

            <table class="table table-hover table-striped align-middle" id="jualTable" style="width: 100%;max-width:100%;">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Konsumen</th>
                        <th>Alamat</th>
                        <th>Tanggal Penjualan</th>
                        <th>Detail</th>

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


<!-- </div> -->
<!-- </div> -->


<script src="<?= base_url('assets/js/index.js'); ?>"></script>
<script src="<?= base_url('assets/js/slick.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/landingpage.js'); ?>"></script>
<script src="<?= base_url('assets/js/jual.js'); ?>"></script>