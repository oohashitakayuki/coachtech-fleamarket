@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase/checkout.css') }}">
@endsection

@section('content')
<div class="purchase-form">
  <form class="purchase-form__inner" action="{{ route('purchase.store', ['item_id' => $item->id]) }}" method="post">
    @csrf
    <div class="purchase-info">
      <img class="purchase-info__image" src="{{ asset('storage/' . $item->image) }}" alt="商品画像">
      <div class="purchase-info__summary">
        <h3 class="purchase-info__name">{{ $item->name }}</h3>
        <div class="purchase-info__price">
          <span class="purchase-info__price-yen">¥</span><p class="purchase-info__price-number">{{ number_format($item->price) }}</p>
        </div>
      </div>
    </div>
    <div class="payment-method">
      <p class="payment-method__heading">支払い方法</p>
      <select class="payment-method__option" name="payment_method" id="payment_method">
        <option disabled selected>選択して下さい</option>
        <option value="コンビニ払い">コンビニ払い</option>
        <option value="カード払い">カード払い</option>
      </select>
      <div class="payment-method__error-message">
        @error('payment_method')
        {{ $message }}
        @enderror
      </div>
    </div>

    <div class="shipping-address">
      <div class="shipping-address__head">
        <p class="shipping-address__heading">配送先</p>
        <a class="shipping-address__link link-button" href="{{ route('purchase.edit', ['item_id' => $item->id]) }}">変更する</a>
      </div>
      <div class="shipping-address__confirm">
        <label class="shipping-address__radio">
          <input type="radio" name="shipping-address" id="shipping-address" value="{{ Auth::user()->profile->id }}">
          <span class="postal-code__mark">〒</span><span class="postal-code__number">{{ Auth::user()->profile->postal_code }}</span><br>
          <span class="shipping-address__address">{{ Auth::user()->profile->address }}</span><br>
          <span class="shipping-address__building">{{ Auth::user()->profile->building }}</span>
        </label>
        <div class="shipping-address__error-message">
          @error('shipping-address')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <table class="purchase-form__confirm">
      <tr class="confirm-price">
        <th class="confirm-price__label">商品代金</th>
        <td class="confirm-price__content"><span class="confirm-price__price-yen">¥</span><p class="confirm-price__price-number">{{ number_format($item->price) }}</p></td>
      </tr>
      <tr class="confirm-payment">
        <th class="confirm-payment__label">支払い方法</th>
        <td class="confirm-payment__content" id="confirm-payment"></td>
      </tr>
    </table>

    <div class="purchase-form__button">
      <button class="purchase-form__button-submit submit-button">購入する</button>
    </div>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const paymentSelect = document.getElementById('payment_method');
    const confirmPayment = document.getElementById('confirm-payment');

    paymentSelect.addEventListener('change', function() {
      confirmPayment.textContent = paymentSelect.options[paymentSelect.selectedIndex].text;
    });
  });
</script>
@endsection