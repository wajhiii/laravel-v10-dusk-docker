@extends('layout.master')
@section('title')
   Company Form
@endsection
@section('content')
    <div class="content">
        <div class="container">
        <div class="row align-items-stretch justify-content-center no-gutters">

            <div class="col-md-7">
            <div class="form h-100 contact-wrap p-5">
                <div class="row">
                    <div class="col-md-12  error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <form class="mb-5" method="post"  action="{{route('store')}}"  id="companyForm" >
                @csrf
                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                    <label for="symbol" class="col-form-label">Comapny Symbol *</label>
                    <select name="symbol"  class="form-control"   id="symbol">
                        <option value=" " >
                            Select symbol
                        </option>
                        @foreach ($companyData as $option)
                        <option value="{{ $option->Symbol }}" >
                            {{ $option->Symbol }}
                        </option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                    <label for="email" class="col-form-label">Email *</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                    <label for="" class="col-form-label">Start Date *</label>
                    <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Start Date" autocomplete="off">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                    <label for="" class="col-form-label">End Date *</label>
                    <input type="text" class="form-control" name="end_date" id="end_date"  placeholder="End Date" autocomplete="off">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-5 form-group text-center">
                    <input type="submit" value="Send" class="btn btn-block btn-primary rounded-0 py-2 mt-5 px-4">
                    <span class="submitting"></span>
                    </div>
                </div>
                </form>
                <div id="form-message-warning mt-4"></div>
                <div id="form-message-success">
                Your message was sent, thank you!
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('js/main.js')}}"></script>
@endsection
