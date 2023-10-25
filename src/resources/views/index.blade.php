@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection
@section('content')

<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>お問い合わせ</h2>
  </div>
  <form class="form" action="contacts/confirm" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content-inline">
        <div class="form__input--text">
          <input type="text" id="lastname"  name="lastname" value="{{old('lastname')}}" oninput="nameChange()" />
          <input type="text" id="firstname" name="firstname" value="{{old('firstname')}}" oninput="nameChange()" />
          <input type="hidden" id="name" name="name" value="{{ old('name') }}" />
          <script>
            function nameChange() {
              $('#name').val($('#lastname').val() + ' ' + $('#firstname').val());
            }
          </script>
        </div>
        <div class="form__example--inline">
          <div class="form__example">例）山田</div>
          <div class="form__example--firstname">例）太郎</div>
        </div>
        <div class="form__error">
          @error('name')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--radio">
          <div class="form__radio--male">
            <input type="radio" name="gender" id="male" style="transform:scale(3.0);" value="1" {{ old ('gender') == '1' ? 'checked' : '' }} checked>
            <label for="male" class="form__input--label">男性</label>
          </div>
          <div class="form__radio--female">
            <input type="radio" name="gender" id="female" style="transform:scale(3.0);" value="2" {{ old ('gender') == '2' ? 'checked' : '' }} >
            <label for="female" class="form__input--label">女性</label>
          </div>
        </div>
        <div class="form__error">
          @error('gender')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" value="{{ old('email') }}" />
        </div>
        <div class="form__example">例）test@example.com</div>
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">郵便番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <div class="form__input--addrcode">
            <input type="text" id="addrcode" onblur="addrcodeChange()" name="addrcode" value="{{ old('addrcode') }}" />
            <div class="form__example--addrcode">例）123-4567</div>
            </div>
            
        </div>
        
        <script>
          function convertStrHalf(str) {
            return str.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
                return String.fromCharCode(s.charCodeAt(0)-0xFEE0);
            });
          }
          function addrcodeChange() {
              let $addrcode = $(addrcode);
              let str = $addrcode.val();
              // 半角英数に変換
              $addrcode.val(convertStrHalf(str));
            $.getJSON('http://zipcloud.ibsnet.co.jp/api/search?callback=?',
                {
                zipcode: $('#addrcode').val()
                }
            )
            .done(function(data) {
                  let result = data.results[0];
                  $('#addr').val(result.address1 + result.address2 + result.address3);
            }).fail(function(){
                alert('入力値を確認してください。');
            })
          }
        </script>
        <div class="form__error">
          @error('addrcode')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" id="addr" name="addr" value="{{ old('addr') }}" />
        </div>
        <div class="form__example">例）東京都渋谷区千駄ヶ谷1-2-3</div>
        <div class="form__error">
          @error('addr')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="builname" value="{{ old('builname') }}" />
        </div>
        <div class="form__example">例）千駄ヶ谷マンション101</div>
        <div class="form__error">
          @error('builname')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">ご意見</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="content">{{ old('content') }}</textarea>
        </div>
        <div class="form__error">
          @error('content')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認</button>
    </div>
  </form>
  <script>
    function InputCheck(text){
      if 
    }
  </script>
</div>
@endsection