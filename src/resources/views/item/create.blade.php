@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item/create.css') }}">
@endsection

@section('content')
<div class="exhibition-form">
  <h2 class="exhibition-form__heading">商品の出品</h2>
  <form class="exhibition-form__inner" action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="exhibition-image">
      <p class="exhibition-image__heading">商品画像</p>
      <img src="{{ asset('img/no-image.jpg') }}" alt="商品画像" class="exhibition-image__preview" id="exhibition-preview">
      <div class="exhibition-image__upload-form">
        <input class="upload-form__select-file" type="file" name="image" id="image" accept="image/*">
        <button class="upload-form__select-button edit-button" type="button" id="select-image">画像を選択する</button>
        <div class="exhibition-image__error-message">
          @error('image')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="exhibition-detail">
      <h3 class="exhibition-detail__heading">商品の詳細</h3>
      <div class="exhibition-category">
        <p class="exhibition-category__heading">カテゴリー</p>
        <div class="exhibition-category__content">
          @foreach($categories as $category)
          <input class="exhibition-category__checkbox" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}">
          <label class="exhibition-category__label" for="category-{{ $category->id }}">{{ $category->name }}</label>
          @endforeach
        </div>
        <div class="exhibition-category__error-message">
          @error('categories')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="exhibition-condition">
        <p class="exhibition-condition__heading">商品の状態</p>
        <select class="exhibition-condition__select" name="condition" id="condition">
          <option disabled selected>選択して下さい</option>
          <option value="良好">良好</option>
          <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
          <option value="やや傷や汚れあり">やや傷や汚れあり</option>
          <option value="状態が悪い">状態が悪い</option>
        </select>
        <div class="exhibition-condition__error-message">
          @error('condition')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="exhibition-info">
      <h3 class="exhibition-info__heading">商品名と説明</h3>
      <div class="exhibition-info__group">
        <div class="exhibition-name">
          <label class="exhibition-name__label" for="name">商品名</label>
          <input class="exhibition-name__input" type="text" name="name" id="name">
        </div>
        <div class="exhibition-name__error-message">
          @error('name')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="exhibition-info__group">
        <div class="exhibition-brand">
          <label class="exhibition-brand__label" for="brand">ブランド名</label>
          <input class="exhibition-brand__input" type="text" name="brand" id="brand">
        </div>
        <div class="exhibition-brand__error-message">
          @error('brand')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="exhibition-info__group">
        <div class="exhibition-description">
          <label class="exhibition-description__label" for="description">商品の説明</label>
          <textarea class="exhibition-description__textarea" name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="exhibition-description__error-message">
          @error('description')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="exhibition-info__group">
        <div class="exhibition-price">
          <label class="exhibition-price__label" for="price">販売価格</label>
          <input class="exhibition-price__input" type="number" name="price" id="price">
        </div>
        <div class="exhibition-price__error-message">
          @error('price')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="exhibition-form__button">
      <button class="exhibition-form__button-submit submit-button" type="submit">出品する</button>
    </div>
  </form>
</div>

<script>
document.getElementById('select-image').addEventListener('click', function() {
    document.getElementById('image').click();
});

document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('exhibition-preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection