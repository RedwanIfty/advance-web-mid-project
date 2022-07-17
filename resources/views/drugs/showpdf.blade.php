<div class="table-wrapper">
    @php
        $totalDrugs=0;
        $totalPrice=0;
    @endphp
<table class="fl-table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Formula</th>
        <th>Price</th>
        <th>Available</th>
    </tr>
    @foreach($drugs as $d)
    <tr>
        <td>{{$d->id}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->formula}}</td>
        <td>{{$d->price}}</td>
        <td>{{$d->available}}</td>
    </tr>
    @php
        $totalDrugs=$totalDrugs+$d->available;
        $totalPrice=($d->price*$d->available)+$totalPrice; 
    @endphp
    @endforeach
</table>
<p>Total drugs :{{$totalDrugs}}</p>
<p>Total Price :{{$totalPrice}} TK</p>
</div>
