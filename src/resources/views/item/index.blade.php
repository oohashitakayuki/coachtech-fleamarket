@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item/index.css') }}">
@endsection

@section('content')
<div class="item">
  @php
      $recommendParams = [];
      if (!empty($keyword)) {
          $recommendParams['keyword'] = $keyword;
      }

      $mylistParams = ['tab' => 'mylist'];
      if (!empty($keyword)) {
          $mylistParams['keyword'] = $keyword;
      }
  @endphp
  <div class="item-tab">
    <a href="{{ route('item.index',  $recommendParams) }}" class="item-tab__recommend tab-switch {{ $tab === 'recommend' ? 'active' : '' }}">おすすめ</a>
    <a href="{{ route('item.index', $mylistParams) }}" class="item-tab__mylist tab-switch {{ $tab === 'mylist' ? 'active' : '' }}">マイリスト</a>
  </div>
  <div class="item-list">
    @forelse ($items as $item)
    <a href="{{ route('item.show', ['item_id' => $item->id]) }}" class="item__card">
      @if ($item->is_sold)
      <div class="sold-label">sold</div>
      @endif
      <img class="item__image" src="{{ asset('storage/' . $item->image) }}" alt="商品画像">
      <p class="item__name">{{ $item->name }}</p>
    </a>
    @empty
    @endforelse
  </div>
</div>
@endsection