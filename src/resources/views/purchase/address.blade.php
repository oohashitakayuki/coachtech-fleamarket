@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase/address.css') }}">
@endsection

@section('content')
<div class="address-form">
  <h2 class="address-form__heading">住所の変更</h2>
  <form class="address-form__inner" action="{{ route('purchase.update', ['item_id' => $item->id]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="address-form__group">
      <div class="address-form__group-content">
        <label class="address-form__label" for="postal_code">郵便番号</label>
        <input class="address-form__input" type="text" name="postal_code" id="postal_code" value="{{ old('postal_code', Auth::user()->profile->postal_code ?? '') }}">
      </div>
      <div class="address-form__error-message">
        @error('postal_code')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="address-form__group">
      <div class="address-form__group-content">
        <label class="address-form__label" for="address">住所</label>
        <input class="address-form__input" type="text" name="address" id="address" value="{{ old('address', Auth::user()->profile->address ?? '') }}">
      </div>
      <div class="address-form__error-message">
        @error('address')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="address-form__group">
      <div class="address-form__group-content">
        <label class="address-form__label" for="building">建物名</label>
        <input class="address-form__input" type="text" name="building" id="building" value="{{ old('building', Auth::user()->profile->building ?? '') }}">
      </div>
      <div class="address-form__error-message">
        @error('building')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="address-form__button">
      <button class="address-form__button-submit submit-button" type="submit">更新する</button>
    </div>
  </form>
</div>
@endsection