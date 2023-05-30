<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak All</title>
    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            font-size: 13px
        }

        .header h4 {
            font-size: 21px;
            margin: 0;
        }

        .body .des {
            display: grid;
            width: 100%;
            grid-template-columns: 15% 16% 15% 13% 42%;
            grid-row-gap: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            border-top: 1px solid #aaa;
            border-bottom: 1px solid #aaa;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .body .des .member,
        .body .des .note,
        .body .des .note-admin {
            grid-column-start: 2;
            grid-column-end: 6;
        }

        .body .des .value {
            position: relative;
        }

        .body .des .value::before {
            position: absolute;
            content: ':';
            left: -10px;
        }

        .body .des .date {
            display: flex;
            margin-left: auto
        }

        .body .des .date .value {
            position: relative;
            margin-left: 30px;
            margin-right: 10px;
        }

        .body .des .date .value::before {
            position: absolute;
            content: ':';
            left: -10px;
        }

        .body .des .uniq {
            display: flex;
        }


        .body .des .uniq .value {
            position: relative;
            margin-left: 14px;
        }

        .body .des .uniq .value::before {
            position: absolute;
            content: ":";
            left: -6px;
        }

        .body .des .uniq .value.first {
            margin-right: 10px;
        }

        .body .des .uniq .value.first::after {
            position: absolute;
            margin-right: -6px;
            content: ",";
        }

        .body .item h6 {
            font-size: 12px;
            margin: 0;
            font-weight: normal;
        }

        .body .item table {
            width: 100%;
            border: none;
            margin-top: 8px;
            margin-bottom: 10px;
        }

        .body .item table thead tr th {
            background-color: #333333;
            color: white;
            font-size: 13px;
            padding: 6px 0;

        }

        .body .item table tbody tr td {
            border-bottom: 1px solid black;

        }

        .body .item table tbody tr td:nth-child(2) {
            text-align: center;
        }

        .body .item table tbody tr td:nth-child(3) {
            text-align: right;
        }

        .body .item .notes,
        .body .item .bonus {
            display: grid;
            grid-template-columns: 100px auto;
            margin-bottom: 10px;
        }

        .body .item .value {
            position: relative;
        }

        .body .item .value::before {
            position: absolute;
            left: -10px;
            content: ":";
        }

        .body .signature {
            display: grid;
            width: 100%;
            grid-template-columns: 25% 25% 25% 25%;
            margin-top: 40px
        }

        .body .signature .sign-item {
            height: 120px;
            font-size: 16px;
            text-align: center;

        }

        .body .signature .sign-item h6 {
            margin: 0;
            font-weight: normal;
        }

        .body .signature .sign-item .space {
            height: 80px;
        }

        .body .signature .sign-item p {
            margin: 0;
        }

        .send-recipient h5 {
            font-weight: bold;
            font-size: 14px;
        }

        .send-recipient .desctioption {
            display: grid;
            grid-template-columns: 100px auto;
            font-size: 14px;
            grid-row-gap: 10px;
        }

        .send-recipient .desctioption .value {
            position: relative;
            margin-left: 20px;
        }

        .send-recipient .desctioption .value::before {
            position: absolute;
            content: ":";
            left: -24px;
        }

        .note-footer {
            border: 5px solid black;
            width: 300px;
            margin-top: 10px;
            float: right;
            padding: 10px 12px;
        }

        @media print {
            .break-print {
                page-break-after: always;
            }

        }
    </style>
</head>

<body>
    @php
        ob_start();
        
    @endphp
    <div class="break-print">
        <div class="header">
            <h4>INVOICE</h4>
        </div>
        <div class="body">
            <div class="des">
                <div>No Invoice</div>
                <div class="value">{{ $data->noinvoice }}</div>
                <div>No Trx</div>
                <div class="value">{{ $data->paid_at->format('Ymd') . $data->id }} </div>
                <div class="date">
                    <div>Tanggal </div>
                    <div class="value">{{ $data->created_at }}</div>
                </div>
                <div>Data Member</div>
                <div class="member value">
                    <div>
                        {{ $data->customer->customer_name }} / {{ $data->customer->member_id }}
                    </div>
                    <div>
                        @php
                            $t = str_ireplace(',', ", \r\n", $data->shipping->shipping_address);
                            echo nl2br($t);
                        @endphp
                    </div>
                    <div>
                        No HP : {{ $data->shipping->phone }}
                    </div>
                </div>
                <div>Ekspedisi</div>
                <div class="value">{{ $data->shipping->shipping_service }}</div>
                <div>Pembayaran</div>
                <div class="value">
                    @switch($data->payment_type)
                        @case('manual')
                            {{ $data->bank }}
                        @break

                        @case('va')
                            {{ $data->bank }}
                        @break

                        @case('vmoney')
                            V-Money
                        @break

                        @default
                            Cash
                    @endswitch
                </div>
                <div class="uniq">
                    <div>Kode Unik</div>
                    <div class="value first">Rp {{ number_format($data->total, 0, ',', '.') }}</div>
                    <div>Ongkir</div>
                    <div class="value">Rp {{ number_format($data->shipping->shipping_cost, 0, ',', '.') }}</div>
                </div>
                <div>Keterangan </div>
                <div class="note value">{{ $data->shipping->shipping_note }}</div>
                <div>Catatan Admin</div>
                <div class="note-admin value">{{ $data->order_note }}</div>
            </div>
            <div class="item">
                <h6><b>Detail Belanja</b></h6>
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <th width="70%">Nama Barang</th>
                            <th width="10%">Qty</th>
                            <th width="20%">Harga Paket</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->details as $item)
                            <tr height=30>
                                @switch($item->code)
                                    @case('MTA30')
                                        <td>
                                            {!! str_replace(['30', 'ml'], ['', ''], $item->fullItemName) !!}
                                        </td>
                                    @break

                                    @default
                                        @if ($item->order->transaction_type == 'non_poin')
                                            <td>{{ $item->item_name }}</td>
                                        @elseif ($item->item_type == 'variants')
                                            @if ($item->code == 'VCN')
                                                <td>{{ str_replace(['100', 'ml'], ['', ''], App\Models\ProductVariant::find($item->item_id)->product->product_name) }}
                                                </td>
                                            @else
                                                <td>{{ App\Models\ProductVariant::find($item->item_id)->product->product_name }}
                                                </td>
                                            @endif
                                        @else
                                            <td>{!! $item->fullItemName !!}</td>
                                        @endif
                                @endswitch
                                @if ($item->code == 'ASCFW' || $item->code == 'ASCFM')
                                    <td>{{ App\Models\PackageItem::where('package_id', $item->item_id)->sum('qty') * $item->qty }}
                                    @else
                                    <td>{{ $item->qty * $item->content }}</td>
                                @endif
                                <td>Rp. {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="notes">
                    <div>
                        <h6><b>KETERANGAN</b></h6>
                    </div>
                    <div class="value">
                        @if ($data->details->item_type = 'starter-kit')
                            @foreach ($starterkit_items as $starterkit_item)
                                {{ $starterkit_item->qty }} {{ $starterkit_item->product_name }}
                                @if ($loop->iteration < count($starterkit_items))
                                    +
                                @endif
                            @endforeach
                            @if ($data->transaction_type == 'register')
                                + 25 lembar brosur
                            @endif

                        @endif
                        <br>
                        @if ($data->details->code = 'PFK05' || ($data->details->code = 'PFK1' || ($data->details->code = 'PFK2')))
                            @foreach ($package_items as $package_item)
                                {{ $package_item->qty }} {{ $package_item->product_name }}
                                @if ($loop->iteration < count($package_items))
                                    +
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="bonus">
                    <div>
                        <h6><b>Bonus</b></h6>
                    </div>
                    <div class="value">
                        <strong></strong>
                    </div>
                </div>
            </div>
            <div class="signature">
                <div class="sign-item">
                    <h6>Di cetak oleh,</h6>
                    <div class="space"></div>
                    <p class="name">({{ $printed_by }})</p>
                </div>
                <div class="sign-item">
                    <h6>Disiapkan oleh,</h6>
                    <div class="space"></div>
                    <p class="name">(...........)</p>
                </div>
                <div class="sign-item">
                    <h6>Dicek oleh,</h6>
                    <div class="space"></div>
                    <p class="name">(...........)</p>
                </div>
                <div class="sign-item">
                    <h6>Diterima oleh,</h6>
                    <div class="space"></div>
                    <p class="name">(...........)</p>
                </div>
            </div>
        </div>
    </div>
    @php
        $content = ob_get_contents();
        ob_clean();
        switch ($type) {
            case 'all':
                for ($i = 0; $i < 4; $i++) {
                    echo $content;
                }
                break;
            case 'storagehouse':
                echo $content;
                break;
            default:
                break;
        }
    @endphp
    @if ($type == 'all' || $type == 'address')
        <div class="break-print">
            <div class="send-recipient">
                <div>
                    <h5>PENERIMA</h5>
                    <div class="desctioption">
                        <div>
                            Nama
                        </div>
                        <div class="value">
                            Up. {{ explode(',', $data->shipping->shipping_address)[0] ?? '' }} /
                            {{ $data->customer->customer_name }} / {{ $data->customer->member_id }} /
                            {{ $data->noinvoice }}
                        </div>
                        <div>
                            Alamat
                        </div>
                        <div class="value">
                            {{-- {{$data->customer->address}}, Kec.{{$data->customer->subdistrict}}, Kab. {{$data->customer->city}}, {{$data->customer->province}} --}}
                            {{ $data->shipping->shipping_address }}
                        </div>
                        <div>
                            No HP
                        </div>
                        <div class="value">
                            {{ $data->shipping->phone }}
                        </div>
                        <div>
                            Ekspedisi
                        </div>
                        <div class="value">
                            {{ $data->shipping->shipping_service }}
                        </div>
                    </div>
                </div>
                <div>
                    <h5>PENGIRIM</h5>
                    <div class="desctioption">

                        <div>
                            Nama
                        </div>
                        <div class="value">
                            VARASH SADDAN NUSANTARA
                        </div>
                        <div>
                            Alamat
                        </div>
                        <div class="value">
                            JALAN AHMAD YANI UTARA SRITI RESIDENCE NO. 88 DENPASAR, BALI
                        </div>
                        <div>
                            No Telp
                        </div>
                        <div class="value">
                            0361 9008384
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="note-footer">
                <h4>MAAF KAMI TIDAK MENERIMA
                    KOMPLIN TANPA ADA FOTO + VIDEO
                    SAAT MEMBUKA PAKET</h4>
            </div> --}}
        </div>
    @endif
</body>

</html>
<script>
    window.print();
</script>
