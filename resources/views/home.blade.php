@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Make a payment</div>
                    <div class="card-body">
                        <form action="{{ route('pay') }}" method="post" id="paymentForm">
                            @csrf
                            <div class="row">
                                <div class="col-auto">
                                    <label for="muchId">How much you want to pay?</label>
                                    <input type="text"
                                           name="value"
                                           min="5"
                                           step="0.01"
                                           required
                                           class="form-control"
                                           value="{{ mt_rand(500, 100000) / 100 }}">
                                    <small class="form-text text-muted">Use values with up to two decimal positions,
                                        using a dot "."
                                    </small>
                                </div><!-- form group -->

                                <div class="col-auto">
                                    <label for="currencyId">Currency</label>
                                    <select required name="currency" id="currencyId" class="custom-select">
                                        @foreach($currencies as $currency)
                                            <option value="{{ $currency->iso }}">
                                                {{ strtoupper($currency->iso) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- form group -->
                            </div><!-- end of currency -->

                            <div class="row">
                                <div class="col mt-3">
                                    <label for="platformId">
                                        Select the desired payment platform
                                    </label>

                                    <div class="form-group" id="toggler">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            @foreach($paymentPlatforms as $paymentPlatform)
                                                <label class="btn btn-secondary rounded m-2 p-1"
                                                       data-target="#{{ $paymentPlatform->name }}Collapse"
                                                       data-toggle="collapse">
                                                    <input type="radio"
                                                           required
                                                           name="payment_platform"
                                                           value="{{ $paymentPlatform->id }}">
                                                    <img class="img-thumbnail"
                                                         src="{{ asset($paymentPlatform->image) }}"
                                                         alt="">
                                                </label>
                                            @endforeach

                                        </div>

                                        @foreach($paymentPlatforms as $paymentPlatform)
                                            <div id="{{$paymentPlatform->name}}Collapse" class="collapse" data-parent="#toggler">
                                                @includeIf('components.'. strtolower($paymentPlatform->name).'-collapse')
                                            </div>
                                        @endforeach
                                    </div>
                                </div><!-- end of col -->
                            </div><!-- end of row -->

                            <div class="text-center mt-3">
                                <button type="submit" id="payButton" class="btn btn-primary btn-lg">Pay</button>
                            </div><!-- payment button -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
