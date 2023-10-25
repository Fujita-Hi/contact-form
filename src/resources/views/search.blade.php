@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
<style>
  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>
@endsection
@section('content')
<div class="todo__alert">
  @if(session('message'))
    <div class="todo__alert--success">
    {{ session('message') }}
    </div>
  @endif
</div>
<div class="search-form__content">
  <div class="search-form__heading">
    <h2>管理システム</h2>
  </div>
  <div class="search-form__item--border">
    <form class="search-form__item" action="/search/filter" method="get">
      <div class="search-form__item--line">
        <span class="search__label--item" >お名前</span>
        <input class="form__input--text1" type="text" name="name" value="{{old('name')}}">
        <div class="serch-form__item--row2">
          <span class="search__label--gender">性別</span>
          <input class="form_input--radio" type="radio" name="gender" style="transform:scale(3.0);" value="" checked>全て
          <input class="form_input--radio" type="radio" name="gender" style="transform:scale(3.0);" value="1" {{ old ('gender') == '1' ? 'checked' : '' }}>男性
          <input class="form_input--radio" type="radio" name="gender" style="transform:scale(3.0);" value="2" {{ old ('gender') == '2' ? 'checked' : '' }}>女性
        </div>
      </div>
      <div class="search-form__item--line">
        <span class="search__label--item" >登録日</span>
        <input class="form__input--text1" type="date" name="from" value="{{old('from')}}">
        <span class="form__input--textspan"> ～ </span>
        <input class="form__input--text2" type="date" name="to" value="{{old('to')}}">
      </div>
      <div class="search-form__item--line">
        <span class="search__label--item" >メールアドレス</span>
        <input class="form__input--text1" type="email" name="email" value="{{ old('email') }}">
      </div>
      <div class="search-form__item--line">
        <button class="search__button-submit" type="submit">検索</button>
      </div>
      <div class="search-form__item--line">
        <button class="search__button-reset" type="reset">リセット</button>
      </div>
    </form>
  </div>
</div>

{{ $contacts->appends(request()->query())->links() }}

<table class="contact-table">
  <thead class="contact-table__header">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">お名前</th>
      <th scope="col">性別</th>
      <th scope="col">メールアドレス</th>
      <th scope="col">ご意見</th>
    </tr>
  </thead>
  @foreach ($contacts as $contact)
  <tr class="contact-table__row">
    <td scope="row" class="contact-table__item-id">{{ $contact['id'] }}</td>
    <td scope="row" class="contact-table__item-name">{{ $contact['name'] }}</td>
    @if($contact['gender'] === 1)
      <td scope="row" class="contact-table__item-gender">男性</td>
    @else
      <td scope="row" class="contact-table__item-gender">女性</td>
    @endif
    <td scope="row" class="contact-table__item-email">{{ $contact['email'] }}</td>
    @php
      if(mb_strlen($contact['content'])>25):
        $text = mb_substr($contact['content'],0,25).'...';
      else:
        $text = $contact['content'];
      endif;
    @endphp
    <td scope="row" class="contact-table__item-content" data-fulltext="{{ $contact['content'] }}">{{$text}}</td>
    <td scope="row" class="contact-table__item-delete">
      <form class="delete-form" action='/search/delete' method="POST">
        @csrf
        <div class="delete-form__button">
          <input type="hidden" name="id" value="{{ $contact['id'] }}">
          <button class="delete-form__button-submit" type="submit">削除</button>
        </div>
      </form>
    </td>
  </tr> 

  @endforeach
</table>
<div id="popup-container">
    <div id="popup-content"></div>
</div>
<script>
  // 削除ボタン押下時の確認フォーム表示
  document.querySelectorAll('.delete-form__button-submit').forEach(triggerElement => {
    triggerElement.addEventListener('click', function (event) {
      var result = confirm("本当にこの項目を削除しますか？");
      // ユーザーがキャンセルした場合、フォーム送信をキャンセル
      if (!result) {
          event.preventDefault(); // デフォルトのアクション（フォーム送信）をキャンセル
      }
    });
  });
</script>
<script>
  // ご意見欄にマウスオーバーした際に全文を表示する
  const popupTriggerElements = document.querySelectorAll('.contact-table__item-content');
  const popupContainer = document.getElementById('popup-container');
  const popupContent = document.getElementById('popup-content');
  popupTriggerElements.forEach(triggerElement => {
      triggerElement.addEventListener('mouseover', function (event) {
          // マウスオーバー時にポップアップを表示
          const fullText = triggerElement.getAttribute('data-fulltext');
          popupContent.textContent = fullText;
          popupContainer.style.display = 'block';

          // ポップアップをマウスの位置に配置
          popupContainer.style.top = (event.clientY + 10) + 'px';
          popupContainer.style.left = (event.clientX + 10) + 'px';
      });

      triggerElement.addEventListener('mouseout', function () {
          // マウスが要素から外れたときにポップアップを非表示
          popupContainer.style.display = 'none';
      });
  });
</script>
@endsection
