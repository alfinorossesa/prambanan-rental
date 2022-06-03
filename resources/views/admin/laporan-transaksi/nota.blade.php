<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Nota Transaksi</title>

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

            .text-success{
                color: rgb(26, 226, 26);
            }

            .text-danger{
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
									Tanggal : {{ date('d-m-Y', strtotime($detailTransaksi->tanggal_pemesanan)) }} <br>
                                    Pelanggan : {{ $detailTransaksi->user->nama }} <br>
                                    Kode Reservasi : {{ $detailTransaksi->kode_reservasi }}
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
                    <td>Merk Kendaraan</td>
                    <td>{{ $detailTransaksi->kendaraan->merk->nama_merk }}</td>
                    <td>-</td>
                </tr>
                <tr class="item">
                    <td scope="row">2.</td>
                    <td>Tipe</td>
                    <td>{{ $detailTransaksi->kendaraan->tipe }}</td>
                    <td>-</td>
                </tr>
                <tr class="item">
                    <td scope="row">3.</td>
                    <td>Tanggal Peminjaman</td>
                    <td>{{ date('d-m-Y', strtotime($detailTransaksi->tanggal_peminjaman)) }}</td>
                    <td>-</td>
                </tr>
                <tr class="item">
                    <td scope="row">4.</td>
                    <td>Jam Peminjaman</td>
                    <td>{{ date('H:i', strtotime($detailTransaksi->jam_peminjaman)) }} WIB</td>
                    <td>-</td>
                </tr>
                <tr class="item">
                    <td scope="row">5.</td>
                    <td>Durasi </td>
                    <td>{{ $detailTransaksi->durasi_peminjaman }} Jam</td> 
                    <td>-</td>
                </tr>
                <tr class="item aturan-dikembalikan">
                    <td scope="row">6.</td>
                    <td>Aturan Dikembalikan Tanggal</td>
                    <td>{{ date('d-m-Y', strtotime($tanggalPengembalian)) }} / {{ date('H:i', strtotime($jamPengembalian)) }} WIB</td>
                    <td>-</td>
                </tr>
                <tr class="item">
                    <td scope="row">7.</td>
                    <td>Supir</td>
                    <td>{{ $detailTransaksi->supir == 1 ? 'Ya' : 'Tidak' }}</td>
                    <td>Rp. {{ $detailTransaksi->supir == 1 ? number_format(100000) : number_format(0) }}</td>
                </tr>
                <tr class="item">
                    <td scope="row">8.</td>
                    <td>BBM</td>
                    <td>{{ $detailTransaksi->bbm == 1 ? 'Ya' : 'Tidak' }}</td>
                    <td>Rp. {{ number_format($bbm) }}</td>
                </tr>
                <tr class="item">
                    <td scope="row">9.</td>
                    <td>Harga Sewa Kendaraan</td>
                    <td>Rp. {{ number_format($detailTransaksi->kendaraan->hargaSewa[0]->harga) }} / {{ $detailTransaksi->kendaraan->hargaSewa[0]->keterangan }}</td>
                    <td>Rp. {{ number_format($hargaSewaPerDurasi) }}</td>
                </tr>
                <tr class="item">
                    <td>10.</td>
                    <td>Dikembalikan Tanggal</td>
                    <td class="{{ $detailTransaksi->pengembalian->denda == 0 ? 'text-success' : 'text-danger' }}">{{ date('d-m-Y', strtotime($detailTransaksi->pengembalian->tanggal_pengembalian)) }} / {{ date('H:i', strtotime($detailTransaksi->pengembalian->tanggal_pengembalian)) }} WIB</td>
                    <td>-</td>
                </tr>
                <tr class="item">
                    <td>11.</td>
                    <td>Telat Pengembalian</td>
                        @if ($detailTransaksi->pengembalian->denda !== 0)
                            <td>{{ ($telat->d * 24) + $telat->h }} Jam</td>
                        @else
                            <td>-</td>
                        @endif
                    <td>-</td>
                </tr>
                <tr class="item">
                    <td>12.</td>
                    <td>Denda</td>
                    <td>-</td>
                    <td>Rp. {{ number_format($detailTransaksi->pengembalian->denda) }}</td>
                </tr>

				<tr class="harga-total">
					<td></td>
					<td></td>
					<td>Harga Total: </td>
					<td>Rp. {{ number_format(($detailTransaksi->supir ? 100000 : 0) + $bbm + $hargaSewaPerDurasi + ($detailTransaksi->pengembalian->denda)) }}</td>
				</tr>
            </table>
			<br>
			<p>Terima Kasih Telah Menggunakan Layanan Kami.</p>
			<br><br>

            @if ($detailTransaksi->pengembalian->denda !== 0)
                @if ($detailTransaksi->kendaraan->kategori == 'mobil')
                    <p class="telat-pengembalian">**Jika telat waktu pengembalian akan di denda Rp. 10,000 / jam</p>
                @else 
                    <p class="telat-pengembalian">**Jika telat waktu pengembalian akan di denda Rp. 5,000 / jam</p>
                @endif
            @endif
			
		</div>
	</body>
</html>