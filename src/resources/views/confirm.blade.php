@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>内容確認</h2>
  </div>
  <form class="form" action="/contacts" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <input type="text" name="name" value="{{ $contact['name'] }}" readonly />
            <input type="hidden" name="lastname" value="{{ $contact['lastname'] }}" readonly />
            <input type="hidden" name="firstname" value="{{ $contact['firstname'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            @if($contact['gender'] === '1')
              <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />男性
            @else
              <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />女性
            @endif
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">郵便番号</th>
          <td class="confirm-table__text">
            <input type="text" name="addrcode" value="{{ $contact['addrcode'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="addr" value="{{ $contact['addr'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <input type="text" name="builname" value="{{ $contact['builname'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">ご意見</th>
          <td class="confirm-table__text">
            <input type="text" name="content" value="{{ $contact['content'] }}" readonly />
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
      <button class="form__button-back" type="submit" name='back' value="back">修正する</button>
    </div>
  </form>
</div>
@endsection