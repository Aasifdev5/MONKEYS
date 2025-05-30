@extends('layout.master')
@section('title')
    {{ $title }}
@endsection
@section('main_content')
    <!-- Page content area start -->

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__content__left">
                                <div class="breadcrumb__title">
                                    <h2>{{ __('Application Settings') }}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ url('admin\dashboard') }}">{{ __('Dashboard') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __(@$title) }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-lg-3 col-md-4">
                        @include('admin.application_settings.sidebar')
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h2>{{ __(@$title) }}</h2>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('settings.save.setting') }}" method="post" class="form-horizontal"
                                enctype="multipart/form-data">
                              @csrf

                              <div class="row justify-content-center p-3 pb-0">
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ $settings['paypal_title'] ?? __('PayPal') }}</h5>
                                </div>
                                <div class="admin-dashboard-payment-title-right col-6 border border-bottom-0 pl-4 text-center">
                                    <h5 class="p-2">{{ $settings['stripe_title'] ?? __('Stripe') }}</h5>
                                </div>
                            </div>


                              <div class="row justify-content-center px-3 pb-0 mb-3">
                                <div class="payment-getaway admin-dashboard-payment-content-box-left col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="paypal_currency" class="form-control paypal_currency currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['paypal_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0" name="paypal_conversion_rate" value="{{ $settings['paypal_conversion_rate'] ?? 1 }}" class="form-control">
                                                <span class="input-group-text paypal_append_currency append_currency"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="paypal_status" class="form-control">
                                                    <option value="1" {{ $settings['paypal_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['paypal_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('PayPal Mode') }} </label>
                                                <select name="PAYPAL_MODE" class="form-control">
                                                    <option value="sandbox" {{ $settings['PAYPAL_MODE'] ?? '' == 'sandbox' ? 'selected' : '' }}>{{ __('Sandbox') }}</option>
                                                    <option value="live" {{ $settings['PAYPAL_MODE'] ?? '' == 'live' ? 'selected' : '' }}>{{ __('Live') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('PayPal Client ID') }} </label>
                                                <input type="text" name="PAYPAL_CLIENT_ID" value="{{ $settings['PAYPAL_CLIENT_ID'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('PayPal Secret') }} </label>
                                                <input type="text" name="PAYPAL_SECRET" value="{{ $settings['PAYPAL_SECRET'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-getaway admin-dashboard-payment-content-box-right col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="stripe_currency" class="form-control stripe_currency currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['stripe_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0" name="stripe_conversion_rate" value="{{ $settings['stripe_conversion_rate'] ?? 1 }}" class="form-control">
                                                <span class="input-group-text stripe_append_currency append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="stripe_status" class="form-control">
                                                    <option value="1" {{ $settings['stripe_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['stripe_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group text-black">
                                                <label>{{ __('Stripe Mode') }} </label>
                                                <select name="STRIPE_MODE" class="form-control">
                                                    <option value="sandbox" {{ $settings['stripe_mode'] ?? '' == 'sandbox' ? 'selected' : '' }}>{{ __('Sandbox') }}</option>
                                                    <option value="live" {{ $settings['stripe_mode'] ?? '' == 'live' ? 'selected' : '' }}>{{ __('Live') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group text-black">
                                                <label>{{ __('Stripe Secret Key') }}</label>
                                                <input type="text" name="STRIPE_PUBLIC_KEY" value="{{ $settings['STRIPE_PUBLIC_KEY'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center p-3 pb-0">
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ __('RAZORPAY') }}</h5>
                                </div>
                                <div class="admin-dashboard-payment-title-right col-6 border border-bottom-0 pl-4 text-center">
                                    <h5 class="p-2">{{ __('SSLCOMMERZ') }}</h5>
                                </div>
                            </div>


                            <div class="row justify-content-center px-3 pb-0 mb-3">
                                <div class="payment-getaway admin-dashboard-payment-content-box-left col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="razorpay_currency" class="form-control razorpay_currency currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['razorpay_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0"
                                                       name="razorpay_conversion_rate"
                                                       value="{{ $settings['razorpay_conversion_rate'] ?? 1 }}"
                                                       class="form-control">
                                                <span class="input-group-text razorpay_append_currency append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="razorpay_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['razorpay_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['razorpay_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('RAZORPAY KEY') }} </label>
                                                <input type="text" name="RAZORPAY_KEY"
                                                       value="{{ $settings['RAZORPAY_KEY'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('RAZORPAY SECRET') }} </label>
                                                <input type="text" name="RAZORPAY_SECRET"
                                                       value="{{ $settings['RAZORPAY_SECRET'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-getaway admin-dashboard-payment-content-box-right col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="sslcommerz_currency" class="form-control sslcommerz_currency currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['sslcommerz_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0"
                                                       name="sslcommerz_conversion_rate"
                                                       value="{{ $settings['sslcommerz_conversion_rate'] ?? 1 }}"
                                                       class="form-control">
                                                <span class="input-group-text sslcommerz_append_currency append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="sslcommerz_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['sslcommerz_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['sslcommerz_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Sslcommerz Mode') }} </label>
                                                <select name="sslcommerz_mode" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="sandbox" {{ $settings['sslcommerz_mode'] ?? '' == 'sandbox' ? 'selected' : '' }}>{{ __('Sandbox') }}</option>
                                                    <option value="live" {{ $settings['sslcommerz_mode'] ?? '' == 'live' ? 'selected' : '' }}>{{ __('Live') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Sslcommerz Store ID') }} </label>
                                                <input type="text" name="SSLCZ_STORE_ID"
                                                       value="{{ $settings['SSLCZ_STORE_ID'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Sslcommerz Store Password') }} </label>
                                                <input type="text" name="SSLCZ_STORE_PASSWD"
                                                       value="{{ $settings['SSLCZ_STORE_PASSWD'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center p-3 pb-0">
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ __('Mollie') }}</h5>
                                </div>
                                <div class="admin-dashboard-payment-title-right col-6 border border-bottom-0 pl-4 text-center">
                                    <h5 class="p-2">{{ __('Instamojo') }}</h5>
                                </div>
                            </div>


                            <div class="row justify-content-center px-3 pb-0 mb-3">
                                <div class="payment-getaway admin-dashboard-payment-content-box-left col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="mollie_currency" class="form-control mollie_currency currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['mollie_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0"
                                                       name="mollie_conversion_rate"
                                                       value="{{ $settings['mollie_conversion_rate'] ?? 1 }}"
                                                       class="form-control">
                                                <span class="input-group-text mollie_append_currency append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="mollie_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['mollie_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['mollie_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('MOLLIE KEY') }} </label>
                                                <input type="text" name="MOLLIE_KEY"
                                                       value="{{ $settings['MOLLIE_KEY'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-getaway admin-dashboard-payment-content-box-right col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="im_currency" class="form-control im_currency currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['im_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0"
                                                       name="im_conversion_rate"
                                                       value="{{ $settings['im_conversion_rate'] ?? 1 }}"
                                                       class="form-control">
                                                <span class="input-group-text im_append_currency append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="im_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['im_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['im_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('API KEY') }} </label>
                                                <input type="text" name="IM_API_KEY" value="{{ $settings['IM_API_KEY'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('AUTH TOKEN') }} </label>
                                                <input type="text" name="IM_AUTH_TOKEN" value="{{ $settings['IM_AUTH_TOKEN'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Payment Mode') }} </label>
                                                <select name="IM_URL" class="form-control">
                                                    <option value="https://test.instamojo.com/api/1.1/payment-requests/"
                                                            {{ $settings['IM_URL'] ?? '' == 'https://test.instamojo.com/api/1.1/payment-requests/' ? 'selected' : '' }}>
                                                        Sandbox
                                                    </option>
                                                    <option value="https://www.instamojo.com/api/1.1/payment-requests/"
                                                            {{ $settings['IM_URL'] ?? '' == 'https://www.instamojo.com/api/1.1/payment-requests/' ? 'selected' : '' }}>
                                                        Live
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center p-3 pb-0">
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ __('Paystack') }}</h5>
                                </div>
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ __('Mercado PAGO') }}</h5>
                                </div>
                            </div>

                            <div class="row justify-content-center px-3 pb-0 mb-3">
                                <div class="payment-getaway admin-dashboard-payment-content-box-left col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="paystack_currency" class="form-control paystack_currency currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['paystack_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0" name="paystack_conversion_rate"
                                                       value="{{ $settings['paystack_conversion_rate'] ?? 1 }}" class="form-control">
                                                <span class="input-group-text paystack_append_currency append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="paystack_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['paystack_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['paystack_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Paystack Public Key') }} </label>
                                                <input type="text" name="PAYSTACK_PUBLIC_KEY" value="{{ $settings['PAYSTACK_PUBLIC_KEY'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Paystack Secret Key') }} </label>
                                                <input type="text" name="PAYSTACK_SECRET_KEY" value="{{ $settings['PAYSTACK_SECRET_KEY'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-getaway admin-dashboard-payment-content-box-right col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="mercado_currency" class="form-control mercado_currency currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['mercado_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0" name="mercado_conversion_rate"
                                                       value="{{ $settings['mercado_conversion_rate'] ?? 1 }}" class="form-control">
                                                <span class="input-group-text mercado_append_currency append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="mercado_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['mercado_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['mercado_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Mercado Client ID') }} </label>
                                                <input type="text" name="MERCADO_PAGO_CLIENT_ID" value="{{ $settings['MERCADO_PAGO_CLIENT_ID'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Mercado Client Secret') }} </label>
                                                <input type="text" name="MERCADO_PAGO_CLIENT_SECRET" value="{{ $settings['MERCADO_PAGO_CLIENT_SECRET'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center p-3 pb-0">
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ __('Flutterwave') }}</h5>
                                </div>
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ __('Coinbase') }}</h5>
                                </div>
                            </div>

                            <div class="row justify-content-center px-3 pb-0 mb-3">
                                <div class="payment-getaway admin-dashboard-payment-content-box-left col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="flutterwave_currency" class="form-control currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['flutterwave_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0" name="flutterwave_conversion_rate"
                                                       value="{{ $settings['flutterwave_conversion_rate'] ?? 1 }}" class="form-control">
                                                <span class="input-group-text append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="flutterwave_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['flutterwave_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['flutterwave_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Flutterwave Public Key') }} </label>
                                                <input type="text" name="FLW_PUBLIC_KEY" value="{{ $settings['FLW_PUBLIC_KEY'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Flutterwave Secret Key') }} </label>
                                                <input type="text" name="FLW_SECRET_KEY" value="{{ $settings['FLW_SECRET_KEY'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Flutterwave Secret Hash') }} </label>
                                                <input type="text" name="FLW_SECRET_HASH" value="{{ $settings['FLW_SECRET_HASH'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-getaway admin-dashboard-payment-content-box-left col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="coinbase_currency" class="form-control currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['coinbase_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0" name="coinbase_conversion_rate"
                                                       value="{{ $settings['coinbase_conversion_rate'] ?? 1 }}" class="form-control">
                                                <span class="input-group-text append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="coinbase_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['coinbase_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['coinbase_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Coinbase Mode') }} </label>
                                                <select name="coinbase_mode" class="form-control">
                                                    <option value="sandbox" {{ $settings['coinbase_mode'] ?? '' == 'sandbox' ? 'selected' : '' }}>{{ __('Sandbox') }}</option>
                                                    <option value="live" {{ $settings['coinbase_mode'] ?? '' == 'live' ? 'selected' : '' }}>{{ __('Live') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Coinbase Key') }} </label>
                                                <input type="text" name="coinbase_key" value="{{ $settings['coinbase_key'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center p-3 pb-0">
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ __('Zitopay') }}</h5>
                                </div>
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ __('iyzico') }}</h5>
                                </div>
                            </div>

                            <div class="row justify-content-center px-3 pb-0 mb-3">
                                <div class="payment-getaway admin-dashboard-payment-content-box-left col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="zitopay_currency" class="form-control currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['zitopay_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0" name="zitopay_conversion_rate"
                                                       value="{{ $settings['zitopay_conversion_rate'] ?? 1 }}" class="form-control">
                                                <span class="input-group-text append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="zitopay_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['zitopay_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['zitopay_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Zitopay Username') }} </label>
                                                <input type="text" name="zitopay_username" value="{{ $settings['zitopay_username'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-getaway admin-dashboard-payment-content-box-left col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="iyzipay_currency" class="form-control currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['iyzipay_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0" name="iyzipay_conversion_rate"
                                                       value="{{ $settings['iyzipay_conversion_rate'] ?? 1 }}" class="form-control">
                                                <span class="input-group-text append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="iyzipay_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['iyzipay_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['iyzipay_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Iyzico Mode') }} </label>
                                                <select name="iyzipay_mode" class="form-control">
                                                    <option value="sandbox" {{ $settings['iyzipay_mode'] ?? '' == 'sandbox' ? 'selected' : '' }}>{{ __('Sandbox') }}</option>
                                                    <option value="live" {{ $settings['iyzipay_mode'] ?? '' == 'live' ? 'selected' : '' }}>{{ __('Live') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Iyzico Key') }} </label>
                                                <input type="text" name="iyzipay_key" value="{{ $settings['iyzipay_key'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Iyzico Secret') }} </label>
                                                <input type="text" name="iyzipay_secret" value="{{ $settings['iyzipay_secret'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center p-3 pb-0">
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ __('Bitpay') }}</h5>
                                </div>
                                <div class="admin-dashboard-payment-title-left col-6 border border-bottom-0 pr-4 text-center">
                                    <h5 class="p-2">{{ __('Iyzico') }}</h5>
                                </div>
                            </div>

                            <div class="row justify-content-center px-3 pb-0 mb-3">
                                <div class="payment-getaway admin-dashboard-payment-content-box-left col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="bitpay_currency" class="form-control currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['bitpay_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0" name="bitpay_conversion_rate"
                                                       value="{{ $settings['bitpay_conversion_rate'] ?? 1 }}" class="form-control">
                                                <span class="input-group-text append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="bitpay_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['bitpay_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['bitpay_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Bitpay Mode') }} </label>
                                                <select name="bitpay_mode" class="form-control">
                                                    <option value="testnet" {{ $settings['bitpay_mode'] ?? '' == 'testnet' ? 'selected' : '' }}>{{ __('Testnet') }}</option>
                                                    <option value="livenet" {{ $settings['bitpay_mode'] ?? '' == 'livenet' ? 'selected' : '' }}>{{ __('Livenet') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Bitpay Key') }} </label>
                                                <input type="text" name="bitpay_key" value="{{ $settings['bitpay_key'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="payment-getaway admin-dashboard-payment-content-box-left col-md-6 border p-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Currency ISO Code') }} </label>
                                                <select name="braintree_currency" class="form-control currency">
                                                    @foreach(getCurrency() as $code => $currency)
                                                        <option value="{{$code}}" {{ $settings['braintree_currency'] ?? '' == $code ? 'selected' : '' }}>{{$currency}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>{{ __('Conversion Rate') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">{{ '1 ' . get_currency_symbol() . ' = ' }}</span>
                                                <input type="number" step="any" min="0" name="braintree_conversion_rate"
                                                       value="{{ $settings['braintree_conversion_rate'] ?? 1 }}" class="form-control">
                                                <span class="input-group-text append_currency"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Status') }} </label>
                                                <select name="braintree_status" class="form-control">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    <option value="1" {{ $settings['braintree_status'] ?? '' == 1 ? 'selected' : '' }}>{{ __('Enable') }}</option>
                                                    <option value="0" {{ $settings['braintree_status'] ?? '' == '0' ? 'selected' : '' }}>{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Braintree Test Mode') }} </label>
                                                <select name="braintree_test_mode" class="form-control">
                                                    <option value="1" {{ $settings['braintree_test_mode'] ?? '' == 1 ? 'selected' : '' }}>{{ __('True') }}</option>
                                                    <option value="0" {{ $settings['braintree_test_mode'] ?? '' == 0 ? 'selected' : '' }}>{{ __('False') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Braintree Merchant ID') }} </label>
                                                <input type="text" name="braintree_merchant_id" value="{{ $settings['braintree_merchant_id'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Braintree Public Key') }} </label>
                                                <input type="text" name="braintree_public_key" value="{{ $settings['braintree_public_key'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group text-black">
                                                <label>{{ __('Braintree Private Secret') }} </label>
                                                <input type="text" name="braintree_private_key" value="{{ $settings['braintree_private_key'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                              <div class="row">
                                  <div class="col-12">
                                      <div class="input__group general-settings-btn">
                                          <button type="submit" class="btn btn-primary float-right">{{ __('Update') }}</button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Page content area end -->
@endsection

@push('script')
    <script src="{{ asset('admin/js/custom/payment-method.js') }}"></script>
@endpush
