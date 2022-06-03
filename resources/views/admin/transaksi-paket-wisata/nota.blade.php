<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Nota Paket Wisata</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

            .aturan-dikembalikan{
                background-color: rgb(165, 239, 245);
            }

            .info-rental{
                text-align: right; 
				font-size: 12px;
            }

			.nama-rental{
				text-align: right; 
				margin-right: 10px;
			}

			.harga-total{
				font-weight: 600;
			}

			.telat-pengembalian{
				color: red;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
            <div id='container'>
                <h1 class="nama-rental">Prambanan Rental</h1>
            </div>
			<table cellpadding="0" cellspacing="0">
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Tanggal : {{ date('d-m-Y', strtotime($paketWisata->tanggal_pemesanan)) }} <br>
                                    Pelanggan : {{ $paketWisata->user->nama }} <br>
                                    Kode Reservasi : {{ $paketWisata->kode_reservasi }}
								</td>
								<td class="info-rental">
									Jl. Sambiroto Gang Pucanganom 43 Yogyakarta<br />
									No. Telp : (0274) 884372<br />
									WhatsApp : 0897 4567 0000
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Jenis Pembayaran</td>

					<td></td>
				</tr>
				<tr class="details">
					<td>Cash</td>
				</tr>
			</table>

            <table  cellpadding="0" cellspacing="0">
				<tr class="heading">
					<td>No.</td>
					<td>Jenis</td>
					<td>Keterangan</td>
					<td>Total</td>
				</tr>
                <tr class="item">
                    <td scope="row">1.</td>
                    <td>Nama Paket Wisata</td>
                    <td>{{ $paketWisata->dataPaketWisata->nama_paket }}</td>
                    <td>-</td>
                </tr>
                <tr class="item">
                    <td scope="row">2.</td>
                    <td>Tanggal Berangkat</td>
                    <td>{{ date('d-m-Y', strtotime($paketWisata->tanggal_berangkat)) }}</td>
                    <td>-</td>
                </tr>
                <tr class="item">
                    <td scope="row">3.</td>
                    <td>Harga Paket</td>
                    <td>-</td>
                    <td>Rp. {{ number_format($paketWisata->dataPaketWisata->harga) }}</td>
                </tr>

				<tr class="harga-total">
					<td></td>
					<td></td>
					<td>Harga Total: </td>
					<td>Rp. Rp. {{ number_format($paketWisata->dataPaketWisata->harga) }}</td>
				</tr>
            </table>
			<br>
			<p>Terima Kasih Telah Menggunakan Layanan Kami.</p>
		</div>
	</body>
</html>