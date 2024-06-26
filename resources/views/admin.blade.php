@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header" style="position: fixed; z-index: 3; background-color: #12263F; width: 100vw; top: 0;">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="header-title">
                        Фотоальбом Молдовы (режим Админки)
                    </h1>
                </div>
                <div class="col-auto" data-toggle="modal" data-target="#photo_modal">
                    <a href="#" class="btn btn-primary">
                        Добавить фото
                    </a>
                </div>
                <a href="/logout">Выйти из режима Админки</a>
            </div>

        </div>
    </div>
    <div class="nav">
        <form id="filter" action="/" method="get">
            {{csrf_field()}}
            <div class="form-group">
                <label class="mb-3">
                    Город
                </label>
                <select name="location_id" class="browser-default custom-select custom-select-lg mb-3">
                <option value="">Выберите город</option>
                @foreach($locations as $location)
                        <option value="{{$location->id}}">{{$location->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mb-3">
                    Год
                </label>
                <select name="year" class="browser-default custom-select custom-select-lg mb-3">
                <option value="">Выберите год</option>
                @foreach($years as $year)
                  <option value="{{$year}}">{{$year}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mb-3">
                    Поиск по словам
                </label>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">-O</span>
                    </div>
                    <input type="text" name="search" class="form-control" aria-label="Amount (to the nearest dollar)" />
                </div>

            </div>
            <div class="row">
                <div class="col-auto" style="margin-top: 7%;">
                    <button type="submit" class="btn btn-primary">Применить фильтр</button>
                </div>
                <div class="col-auto" style="margin-top: 7%;">
                    <a href="/"><button type="button" class="btn btn-primary">Сбросить</button></a>
                </div>
            </div>
        </form>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade active show" id="tabPaneOne" role="tabpanel">
            <div class="row listAlias">
                @foreach($images as $image)
                    {{--        <li>--}}
                    {{--            <h3>{{$image->name}}</h3>--}}
                    {{--            <p>{{ $image->discription}}</p>--}}
                    {{--            <p>{{ $image->date}}</p>--}}
                    {{--            <img src="{{asset($image->path)}}" alt="{{$image->name}}" title="{{$image->name}}"/>--}}
                    {{--        </li>--}}
                    <div class="col-12 col-md-6 col-xl-4">

                        <!-- Card -->
                        <div class="card">
                            <img src="{{$image->path}}" alt="{{$image->name}}" class="card-img-top" height="400">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Name -->
                                        <h4 class="card-title mb-2 name">
                                            {{$image->name}}
                                        </h4>

                                        <!--is_verified-->
                                        @if($image->is_verified == 0)
                                            <span aria-hidden="true">&times;</span>
                                        @endif

                                        <!-- Location -->
                                        <p class="card-text small text-muted">
                                            @foreach($locations as $location)
                                              @if($location->id == $image->location_id)
                                                {{$location->name}}
                                              @endif
                                            @endforeach
                                        </p>


                                        <!-- Date -->
                                        <p class="card-text small text-muted">
                                            {{$image->date}}
                                        </p>

                                        <!-- Description -->
                                        <p class="card-text mb-2">
                                            {{$image->description}}
                                        </p>

                                        <div class="row">
                                          <form action="/delete" method="post">
                                          {{csrf_field()}}
                                          {{method_field('delete')}}
                                            <div class="col-4">
                                                <button type="submit" name="id" value="{{$image->id}}" class="btn btn-primary">Удалить</button>
                                            </div>
                                          </form>
                                          <form action="/edit/{{$image->id}}" method="post">
                                          {{csrf_field()}}
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary">Редактировать</button>
                                            </div>
                                          </form>
                                          <form action="/perm" method="post">
                                          {{csrf_field()}}
                                            <div class="col-4">
                                                <button type="submit" name="id" value="{{$image->id}}" class="btn btn-primary">
                                                  @if($image->is_verified == 0)
                                                    Разрешить
                                                  @elseif($image->is_verified == 1)
                                                    Запретить
                                                  @endif
                                                </button>
                                            </div>
                                          </form>
                                        </div>


                                    </div>
                                </div> <!-- / .row -->

                            </div> <!-- / .card-body -->
                        </div>

                    </div>
                @endforeach
          </div>
        <div style="padding: 0 45%;">
            {{$images->links()}}
        </div>

      </div>
  </div>
</div>


    <!-- Modal -->
        @if($errors->any())
        <div class="modal fade show" style="display: block;" id="photo_modal" tabindex="-1" role="dialog" aria-labelledby="photo_modal" aria-hidden="true">
        @else
        <div class="modal fade" id="photo_modal" tabindex="-1" role="dialog" aria-labelledby="photo_modal" aria-hidden="true">
        @endif

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photo_modal">Добавление фотографии</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  @if($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                          @if($error != "")
                            <li>{{$error}}</li>
                          @endif
                        @endforeach
                          <li>Пожалуйста, выберите файл заново</li>
                      </ul>
                      </div>
                  @endif
                    <form action="/photo" method="post" enctype="multipart/form-data" class="mb-4" data-select2-id="4">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="mb-4">
                                Название фотографии
                            </label>
                            <input name="name" value="{{ Request::old('name') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-4">
                                Описание
                            </label>
                            <textarea name="description" cols="30" rows="10" class="form-control">{{ Request::old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="mb-4">
                                Город
                            </label>
                        <select name="location_id" class="browser-default custom-select custom-select-lg mb-3">
                            <option value="0">Выберите город</option>
                            @foreach($locations as $location)
                                @if($errors->any)
                                  @if(Request::old('location_id') == $location->id)
                                    <option value="{{$location->id}}" selected>{{$location->name}}</option>
                                  @else
                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                  @endif
                                @else
                                  <option value="{{$location->id}}">{{$location->name}}</option>
                                @endif()
                            @endforeach
                        </select>
                        </div>


                        <div class="row">
                            <div class="col-12 col-md-12">

                                <!-- Start date -->
                                <div class="form-group">
                                    <label>
                                        Дата
                                    </label>
                                    <input name="date" value="{{ Request::old('date') }}" type="date" class="form-control flatpickr-input" data-toggle="flatpickr">
                                </div>

                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input name="file" type="file" value="{{ Request::old('file') }}" class="custom-file-input" id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02"
                                       aria-describedby="inputGroupFileAddon02">Выберите файл file</label>
                            </div>

                        </div>
                        <hr class="my-4">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
