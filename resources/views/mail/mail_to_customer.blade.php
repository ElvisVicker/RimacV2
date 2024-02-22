<h1>Thank You.</h1>
<div>
    <div>Hi {{ $buyer[0]->first_name }}</div>
    <div>Thanks for your purchase from Rimac</div>
    <div>ORDER ID: {{ $buy_order[0]->id }}</div>
</div>
<br>
<div>YOUR ORDER INFORMATION:</div>
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Buyer ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Car Name</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{ $buyer[0]->id }}</td>
                    <td>{{ $buyer[0]->first_name }}</td>
                    <td>{{ $buyer[0]->car_name }}</td>
                    <td>{{ $buy_order[0]->total_price }} USD</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<div>Have a good day!</div>
