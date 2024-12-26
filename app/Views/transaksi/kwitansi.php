<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi <?= $data['no_transaksi']; ?> </title>
    <style>
        * {
            /* margin: 0;
            padding: 0; */
            box-sizing: border-box;
        }

        @page {
            size: F4;
            margin: 0;
        }

        /* Set content to fill the entire A4 page */
        html {
            margin: 0;
            background-color: grey;
            margin-left: auto;
            margin-right: auto;
            width: 210mm;
            /* height: 297mm; */
            height: 330mm;
            box-sizing: border-box;
            /* margin: 0;
            padding: 0; */
            /* display: flex;
            justify-content: center;
            align-items: center; */
        }

        h2 {
            padding: 0;
            margin: 0;
        }

        table#table,
        table.table3 {
            border-collapse: collapse;
            background-color: white;
        }

        table#table,
        #table tr td {
            /* border: 1px solid; */
            padding: 5px;
            /* width: 380px; */
        }

        .flex-container {
            display: flex;
            /* background-color: DodgerBlue; */
            background-color: white;
        }

        .flex-container>div {
            /* background-color: #f1f1f1; */
            width: 100%;
            /* margin: 10px;
            padding: 20px;
            font-size: 30px; */
        }

        #table1 tr td,
        #table1 tr th {
            border-bottom: 1px solid;
            padding: 10px;
            /* width: 380px; */
        }
    </style>
</head>

<body>
    <?= $this->include('transaksi/kwintasi_page'); ?>

    <?php if ($copy > 1): ?>
        <?= $this->include('transaksi/kwintasi_page'); ?>
    <?php endif; ?>

    <script>
        window.print();
    </script>
</body>

</html>