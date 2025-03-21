@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage/profile.css') }}">
@endsection

@section('content')
<div class="profile">
  <div class="profile__content">
    <img src="{{ Auth::user()->profile->profile_image ? asset('storage/' . Auth::user()->profile->profile_image) : asset('img/default-profile.jpg') }}" alt="" class="profile__image">
    <h2 class="profile__user-name">{{ Auth::user()->profile->user_name }}</h2>
    <button onclick="location.href='/mypage/profile'" class="profile__link edit-button">プロフィールを編集</button>
  </div>

  <div class="item">
    <div class="item-tab">
      <a href="{{ route('mypage.index', ['tab' => 'sell']) }}" class="item-tab__sell tab-switch {{ $tab === 'sell' ? 'active' : '' }}">出品した商品</a>
      <a href="{{ route('mypage.index', ['tab' => 'buy']) }}" class="item-tab__buy tab-switch {{ $tab === 'buy' ? 'active' : '' }}">購入した商品</a>
    </div>
    <div class="item-list">
      @foreach ($items as $item)
      <a href="{{ route('item.show', ['item_id' => $item->id]) }}" class="item__card">
        <img class="item__image" src="{{ asset('storage/' . $item->image) }}" alt="商品画像">
        <p class="item__name">{{ $item->name }}</p>
      </a>
      @endforeach
    </div>
  </div>
</div>
@endsection