<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Editable Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

    <h2>Daftar Tamu</h2>
    <div class="alert alert-warning" role="alert">
        Shortcut Desktop<br>
        <span class="badge text-bg-warning"><i class="bi bi-arrow-right-square"></i></span> Untuk pindah cell<br>
        <span class="badge text-bg-warning">Tab</span> Tambah baris baru<br>
      </div>

    <table id="editableTable" class="table-striped" contenteditable="true">
        <thead>
            <tr>
                <th contenteditable="false">Nama Tamu</th>
                <th contenteditable="false">Alamat</th>
                <th contenteditable="false">Nomor HP</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td  contenteditable="true" style="height: 50px;"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td>
            </tr>
        </tbody>
    </table>

    <button class="btn btn-success add-row-btn" onclick="addRow()">Tambah Baris</button>
    <button class="btn btn-primary" onclick="simpanData()">Simpan Data</button>
    <script src="{{asset('FreeDash-lite-master/src')}}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script>
        document.addEventListener('input', function (e) {
            if (e.target.dataset.type === 'number') {
                // Hanya biarkan angka
                e.target.textContent = e.target.textContent.replace(/[^0-9]/g, '');
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var editableTable = document.getElementById('editableTable');

            editableTable.addEventListener('keydown', function (event) {
                // Hanya mencegah aksi enter jika sedang di dalam sel
                if (event.key === 'Enter' && event.target.tagName !== 'TD') {
                    event.preventDefault();
                }
            });
        });
    </script>
    <script>
        function addRow() {
            var table = document.getElementById("editableTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            cell1.contentEditable = true;
            cell2.contentEditable = true;
        }
    </script>
    <script>
        function addRow() {
            var table = document.getElementById("editableTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            cell1.contentEditable = true;
            cell2.contentEditable = true;
            cell3.contentEditable = true;

            // Set focus to the first cell of the new row
            cell1.focus();
        }

        document.getElementById("editableTable").addEventListener("keydown", function(event) {
            if (event.key === "Tab") {
                event.preventDefault();
                addRow();
            }
        });

        
    </script>
    <script>
        function simpanData() {
            var data = [];
    
            // Ambil data dari setiap baris tabel
            $('#editableTable tbody tr').each(function () {
               
                var nama = $(this).find('td:nth-child(1)').text().trim();
                var alamat = $(this).find('td:nth-child(2)').text().trim();
                var hp = $(this).find('td:nth-child(3)').text().trim();
                // Pastikan nama dan alamat tidak kosong sebelum menambahkannya ke data
                if (nama !== "" && alamat !== "" && hp !== "") {
                    data.push({
                        nama: nama,
                        alamat: alamat,
                        hp : hp,
                    });
                }
            });
            var code = "{{$code}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/simpan-tamu/'+"{{$code}}",
                data: { data: data},
                success: function (response) {
                    window.location.href = "/undangan/"+"{{$client}}"+"/add-tamu/"+"{{$code}}";
                },
               error: function (error) {
                    console.error(error);

                    // Tampilkan pesan kesalahan pada alert atau konsol
                    alert('Terjadi kesalahan saat menyimpan data: ');
                }
            });
            
        }
    </script>
    <script>
        document.getElementById("editableTable").addEventListener("input", function (event) {
            // Hanya memungkinkan input nomor di kolom nomor (kolom ke-2)
            if (event.target.cellIndex === 2) {
                // Hapus karakter yang bukan nomor
                event.target.textContent = event.target.textContent.replace(/[^0-9]/g, '');
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Menggunakan jQuery (pastikan jQuery sudah dimuat sebelumnya)
            $(document).on("keydown", ":input:not(textarea)", function (event) {
                return event.key !== "Enter";
            });
            
            // Alternatif tanpa jQuery
            // document.addEventListener("keydown", function (event) {
            //     if (event.key === "Enter" && event.target.tagName !== "TEXTAREA") {
            //         event.preventDefault();
            //     }
            // });
        });
    </script>

</body>
</html>
