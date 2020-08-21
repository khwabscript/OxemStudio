@extends('layout')

@section('style')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <?php
        dump( $json = \File::get(storage_path('app\public\json\products.json')));
        dump( $params = (array) json_decode($json)[0]);
        // $v = $params->validate([
        //     'name' => ['required', 'string', 'max:200'],
        //     'description' => ['nullable', 'string', 'max:1000'],
        //     'price' => ['required', 'between:0,999999.99'],
        //     'quantity' => ['required', 'integer'],
        //     'category_id' => ['required', 'array', 'exists:categories,id'],
        //     'external_id' => ['required', 'integer', 'unique:products'],
        // ]);
        // dump($v);
        // $client = new \GuzzleHttp\Client();
        // // $res = $client->request('POST', '/products', (array) json_decode($json)[0]);
        // $res = $client->request('GET', 'http://localhost/products');
        // dump($res->getBody);
        // use Illuminate\Support\Facades\Http;
        // $params = (array) json_decode($json)[0];
        $params['_token'] = csrf_token();
        // dump($params);
        // // $response = Http::get('http://localhost/products');
        // $response = Http::post('http://localhost/products', [
        //     'cookies' => [
        //         'XSRF-TOKEN' => $params['_token'],
        //     ],
        //     'form_params' => $params
        // ]);
        $response = Http::withToken($params['_token'])->post('http://localhost/products', ['form_params' => $params]);
        dump($response->body());
        // $test = new \Tests\Feature\UserTest();
        // dump($test->testExample());
        ?>
        <!-- <div class="title m-b-md">
            <a href="/products" style="text-decoration: none; color: #636b6f;">Products</a>
        </div> -->

        <div class="links">
            <a href="/products">Products</a>
            <a href="/categories">Categories</a>
        </div>
        @foreach(['products', 'categories'] as $item)
        <table>
            
            <tr>
               <td>GET</td>
               <td><a href="/{{ $item }}">{{ $item }}</a></td> 
            </tr>
            <tr>
               <td>GET</td>
               <td><a href="/{{ $item }}/create">{{ $item }}/create</a></td> 
            </tr>
            <tr>
                <td>DELETE</td>
                <td>
                    <form method="POST" action="/{{ $item }}/id">
                        @csrf
                        @method('DELETE')

                        <input type="submit">
                    </form>
                </td> 
            </tr>
            
        </table>
        @endforeach
    </div>
</div>
@endsection