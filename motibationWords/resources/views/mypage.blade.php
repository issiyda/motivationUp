@extends('layouts.app')

@section('content')


    <router-view></router-view>

    <div class ="container">
        <h1>Mypage</h1>

        <h2>上がる投稿</h2>
        <div class ="row justify-content-around">
            <post-component></post-component>

            <div class="w-100 m-3"></div>
            <post-component></post-component>
            <post-component></post-component>

            <div class="w-100 m-3"></div>

            <post-component></post-component>
            <post-component></post-component>
            <post-component></post-component>

        </div>
    </div>

@endsection
