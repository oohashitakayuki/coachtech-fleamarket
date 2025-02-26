@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item/show.css') }}">
@endsection

@section('content')
<div class="item-detail">
  <img class="item-detail__image" src="{{ asset('storage/' . $item->image) }}" alt="商品画像">
  <div class="item-detail__content">
    <h2 class="item-detail__name">{{ $item->name }}</h2>
    <p class="item-detail__brand">{{ $item->brand }}</p>
    <div class="item-detail__price">
      <span class="item-detail__price-yen">¥</span><p class="item-detail__price-number">{{ number_format($item->price) }}</p><span class="item-detail__price-tax">(税込)</span>
    </div>
    <div class="item-detail__service">
      <div class="item-detail__like">
        @if (Auth::check())
        <form class="like__button" action="{{ Auth::user()->profile->is_like($item->id) ? route('like.destroy', $item->id) : route('like.store', $item->id) }}" method="post">
          @csrf
          @if (Auth::user()->profile->is_like($item->id))
            @method('delete')
          @endif
          <button class="like__button-submit {{ Auth::user()->profile->is_like($item->id) ? 'active' : '' }}" type="submit">
            <i class="fa-regular fa-star"></i>
          </button>
        </form>
        @else
        <button class="like__button-submit" onclick="location.href='{{ route('login') }}'">
          <i class="fa-regular fa-star"></i>
        </button>
        @endif
        <span class="like__count">{{ $likeCount }}</span>
      </div>
      <div class="item-detail__comment">
        <i class="fa-regular fa-comment"></i>
        <span class="comment__count">{{ $commentCount }}</span>
      </div>
    </div>
    <div class="item-detail__link">
      <button onclick="location.href='{{ route('purchase.create', ['item_id' => $item->id]) }}'" class="item-detail__link-button submit-button">購入手続きへ</button>
    </div>
    <div class="item-description">
      <h3 class="item-description__heading">商品説明</h3>
      <p class="item-description__content">{{ $item->description }}</p>
    </div>
    <div class="item-info">
      <h3 class="item-info__heading">商品の情報</h3>
      <table class="item-info__content">
        <tr class="item-info__category">
          <th>カテゴリー</th>
          @foreach($item->categories as $category)
          <td>{{ $category->name }}</td>
          @endforeach
        </tr>
        <tr class="item-info__condition">
          <th>商品の状態</th>
          <td>{{ $item->condition }}</td>
        </tr>
      </table>
    </div>
    <div class="item-detail__comment-form">
      <h3 class="comment-form__heading">コメント({{ $commentCount }})</h3>
      <div class="comment-form__user-comment">
        @if($latestComment)
        <div class="comment-form__user-profile">
          <img src="{{ $latestComment->profile->profile_image ? asset('storage/' . $latestComment->profile->profile_image) : asset('img/default-profile.jpg') }}" alt="プロフィール画像" class="comment-form__user-image">
          <p class="comment-form__user-name">{{ $latestComment->profile->user_name }}</p>
        </div>
        <p class="comment-form__content">{{ $latestComment->comment }}</p>
        @endif
      </div>
      <form class="comment-form__inner" action="{{ route('comment.store', ['item_id' => $item->id]) }}" method="post">
        @csrf
        <div class="comment-form__group">
          <label class="comment-form__label" for="comment">商品へのコメント</label>
          <textarea class="comment-form__textarea" name="comment" id="comment" cols="30" rows="10"></textarea>
        </div>
        <div class="comment-form__error-message">
          @error('comment')
          {{ $message }}
          @enderror
        </div>
        <div class="comment-form__button">
          <button class="comment-form__button-submit submit-button">コメントを送信する</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection