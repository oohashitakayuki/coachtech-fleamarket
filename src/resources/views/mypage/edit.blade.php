@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage/edit.css') }}">
@endsection

@section('content')
<div class="profile-form">
  <h2 class="profile-form__heading">プロフィール設定</h2>
  <form class="profile-form__inner" action="{{ route('mypage.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="profile-image">
      <img src="{{ optional(Auth::user()->profile)->profile_image ? asset('storage/' . Auth::user()->profile->profile_image) : asset('img/default-profile.jpg') }}" alt="プロフィール画像" class="profile-image__preview" id="profile-preview">
      <div class="profile-image__upload-form">
        <input class="upload-form__select-file" type="file" name="profile_image" id="profile_image" accept="image/*">
        <button class="upload-form__select-button edit-button" type="button" id="select-image">画像を選択する</button>
        <div class="upload-form__error-message">
          @error('profile_image')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="profile-form__group">
      <div class="profile-form__group-content">
        <label class="profile-form__label" for="user_name">ユーザー名</label>
        <input class="profile-form__input" type="text" name="user_name" id="user_name" value="{{ old('user_name', Auth::user()->profile->user_name ?? '') }}">
      </div>
      <div class="profile-form__error-message">
        @error('user_name')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="profile-form__group">
      <div class="profile-form__group-content">
        <label class="profile-form__label" for="postal_code">郵便番号</label>
        <input class="profile-form__input" type="text" name="postal_code" id="postal_code" value="{{ old('postal_code', Auth::user()->profile->postal_code ?? '') }}">
      </div>
      <div class="profile-form__error-message">
        @error('postal_code')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="profile-form__group">
      <div class="profile-form__group-content">
        <label class="profile-form__label" for="address">住所</label>
        <input class="profile-form__input" type="text" name="address" id="address" value="{{ old('address', Auth::user()->profile->address ?? '') }}">
      </div>
      <div class="profile-form__error-message">
        @error('address')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="profile-form__group">
      <div class="profile-form__group-content">
        <label class="profile-form__label" for="building">建物名</label>
        <input class="profile-form__input" type="text" name="building" id="building" value="{{ old('building', Auth::user()->profile->building ?? '') }}">
      </div>
      <div class="profile-form__error-message">
        @error('building')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="profile-form__button">
      <button class="profile-form__button-submit submit-button" type="submit">更新する</button>
    </div>
  </form>
</div>

<script>
document.getElementById('select-image').addEventListener('click', function() {
    document.getElementById('profile_image').click();
});

document.getElementById('profile_image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection