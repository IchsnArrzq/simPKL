@extends('layouts.app')

@section('content')
@if(auth()->user()->role == 'admin')
<div id="card-stats">
    <div class="row mt-1">
        <div class="col s12 m6 l3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                <div class="padding-4">
                    <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">add_shopping_cart</i>
                        <p>Orders</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0">690</h5>
                        <p class="no-margin">New</p>
                        <p>6,00,00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                <div class="padding-4">
                    <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">perm_identity</i>
                        <p>Clients</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0">1885</h5>
                        <p class="no-margin">New</p>
                        <p>1,12,900</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
                <div class="padding-4">
                    <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">timeline</i>
                        <p>Sales</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0">80%</h5>
                        <p class="no-margin">Growth</p>
                        <p>3,42,230</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
                <div class="padding-4">
                    <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>Profit</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0">$890</h5>
                        <p class="no-margin">Today</p>
                        <p>$25,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
