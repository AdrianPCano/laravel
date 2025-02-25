@extends('admin.layout.crud')

@section("table")

  <section class="table-buttons">
    <div class="table-button filter-button">
      <button>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>filter-menu</title><path d="M11 11L16.76 3.62A1 1 0 0 0 16.59 2.22A1 1 0 0 0 16 2H2A1 1 0 0 0 1.38 2.22A1 1 0 0 0 1.21 3.62L7 11V16.87A1 1 0 0 0 7.29 17.7L9.29 19.7A1 1 0 0 0 10.7 19.7A1 1 0 0 0 11 18.87V11M13 16L18 21L23 16Z" /></svg>
      </button>
    </div>
    @component('admin.components.table-filter')
      <form>
        <div class="form-elements">
          <div class="form-label">
            <label for="name">Nombre</label>
          </div>
          <div class="form-input">
            <input type="text" id="name" name="name">
          </div>
        </div>
        <div class="form-elements">
          <div class="form-label">
            <label for="email">Email</label>
          </div>
          <div class="form-input">
            <input type="email" id="email" name="email">
          </div>
        </div>
      </form>
    @endcomponent
  </section>
  
  <div class="table-records">
    @isset($users)
      @foreach($users as $user_element)
        <article class="table-record">
          <div class="table-record-buttons">
            <div class="edit-button" data-endpoint="{{route('users_edit', ["user" => $user_element->id])}}">
              <button>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path
                    d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                </svg>
              </button>
            </div>
            <div class="destroy-button"  data-endpoint="{{route('users_destroy', ["user" => $user_element->id])}}">
              <button>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
              </button>
            </div>
          </div>
          <div class="table-data">
            <ul>
              <li><span>Email</span>{{$user_element->email}}</li>
              <li><span>Nombre</span>{{$user_element->name}}</li>
            </ul>
          </div>
        </article>
      @endforeach
    @endisset
  </div>

  <div class="table-pagination">
    <span>{{trans_choice("admin/pagination.total", 1 , ["count" => 1])}}</span>
  </div>
  
@endsection


@section("form")
  <div class="form-buttons">
    <div class="create-button" data-endpoint="{{route('users_create')}}">
      <button>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>broom</title><path d="M19.36,2.72L20.78,4.14L15.06,9.85C16.13,11.39 16.28,13.24 15.38,14.44L9.06,8.12C10.26,7.22 12.11,7.37 13.65,8.44L19.36,2.72M5.93,17.57C3.92,15.56 2.69,13.16 2.35,10.92L7.23,8.83L14.67,16.27L12.58,21.15C10.34,20.81 7.94,19.58 5.93,17.57Z" /></svg>
      </button>
    </div>
    <div class="store-button" data-endpoint="{{route('users_store')}}">
      <button>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>content-save</title><path d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" /></svg>
      </button>
    </div>
  </div>
  <form class="admin-form">
    <input type="hidden" name="id" value="{{$user->id ?? ''}}">
    <div class="form-row">
      <div class="form-element">
        <div class="form-element-label">
          <label for="name">
            Nombre
          </label>
        </div>
        <div class="form-element-input">
          <input type="text" name="name" value="{{$user->name ?? ''}}">
        </div>
      </div>
      <div class="form-element">
        <div class="form-element-label">
          <label for="email">
            Email
          </label>
        </div>
        <div class="form-element-input">
          <input type="email" name="email" value="{{$user->email ?? ''}}">
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-element">
        <div class="form-element-label">
          <label for="password">
            Contraseña
          </label>
        </div>
        <div class="form-element-input">
          <input type="password" name="password">
        </div>
      </div>
      <div class="form-element">
        <div class="form-element-label">
          <label for="confirmar-password">
            Repetir contraseña
          </label>
        </div>
        <div class="form-element-input">
          <input type="password" name="password_confirmation">
        </div>
      </div>
    </div>
  </form>
@endsection
