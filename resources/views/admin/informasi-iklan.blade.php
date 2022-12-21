<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Informasi Iklan</title>
  <link rel="stylesheet" href="/css/admin2.css">
  <script src="/js/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="box">

    <div class="invoice-box" id="invoice">
              <table cellpadding="0" cellspacing="0">
                <tr class="top">
                  <td colspan="2">
                    <table>
                      <tr>
                        <td class="title">
                          <img src="/img/logo.png" style="width: 100%; max-width: 300px" />
                        </td>
  
                        <td>
                          <?php
                          $sekarang = now();
                          ?>
                          Invoice #: 123<br />
                          Tanggal dibuat: {{$sekarang}}<br />
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
  
                <tr class="information">
                  <td colspan="2">
                    <table>
                      <tr>
                        <td>
                          Media Andalas Group.<br />
                          Jl. Raya Panaragan Jaya <br />
                          Tulang Bawang Barat, Lampung 34693
                        </td>
  
                        <td>
                          PT. Andalas Media Group<br />
                          Zuli AG<br />
                          mediaandalas@gmail.com
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr class="heading">
                  <td>Nama iklan</td>
  
                  <td>Nama Pengiklan</td>
                </tr>
                <tr class="details">
                  <td>{{$informasi->nama_iklan}}</td>
  
                  <td>{{$informasi->nama_pengiklan}}</td>
                </tr>
                
                <tr class="heading">
                  <td>Tanggal Mulai</td>
  
                  <td>Tanggal Selesai</td>
                </tr>
  
                <tr class="details">
                  <td>{{$informasi->Tanggal_mulai}}</td>
  
                  <td>{{$informasi->Tanggal_selesai}}</td>
                </tr>
  
  
                <tr class="heading">
                  <td>Item</td>
  
                  <td>Price</td>
                </tr>
  
                <tr class="item">
                  <?php
                  $now = new DateTime("{$informasi->Tanggal_mulai}");
                  $your_date = new DateTime("{$informasi->Tanggal_selesai}");
                  
                  
                  $totalhari = $your_date->diff($now)->format("%a");

                  if(('{{$informasi->ukuran_iklan}}') == '256x617'){
                    $biaya = $totalhari * 100000;
                  }
                  else{
                    $biaya = $totalhari * 150000;
                  }
                  ?>
                  <td>Iklan ukuran {{$informasi->ukuran_iklan}} <Span>  {{$totalhari}} hari</Span></td>
  
                  <td>@currency($biaya)</td>
                </tr>
  
                <tr class="total">
                  <td></td>
  
                  <td>Total: @currency($biaya)</td>
                </tr>
              </table>
              <tr class="total">
                
              </tr>
            </div>

            <button id="btn" onclick=" generatePDF()"><i class="fa fa-download"></i> Download</button>
  </div>
<script>
  function generatePDF() {
    const element = document.getElementById("invoice");

    html2pdf()
    .from(element)
    .save();
  }
</script>

</body>
</html>