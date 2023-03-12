# BLOG ADVANCED WITH LARAVEL 10 TAILWINDCSS AND ADMINLTE3


## Description

This repository is a Software of Application with Laravel,MySQL,TailwindCSS,LaravelCollective/HTML,Spatie,Alpine,etc

## Installation

Using Laravel 10 and AdminLTE3 preferably.

## DataBase

Using MySQL preferably.
Create a MySQL database and configure the .env file.

## Apps

Using Postman, Insomnia,etc

## Usage

```html
$ git clone https://github.com/DanielArturoAlejoAlvarez/Blog-Advanced-With-Laravel10-TailwindCSS-And-AdminLTE3.git[NAME APP]

$ composer install

$ copy .env.example .env

$ php artisan key:generate

$ composer require livewire/livewire

$ php artisan migrate:refresh --seed

$ php artisan serve

$ npm install (Frontend)

$ npm run dev

```

Follow the following steps and you're good to go! Important:

![alt text](https://laravel-livewire.com/img/screencast-head.png)

## Coding

![alt text](https://camo.githubusercontent.com/fe61a257108351b886a3b642b81104cb658088de7e8dc74189a07a006e9b7a0d/68747470733a2f2f692e696d6775722e636f6d2f4d5446536d39622e676966)

### Controllers

```php
...
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit','update');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()//: Response
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)//: Response
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)//: RedirectResponse
    {
        $user->roles()->sync($request->roles);
        return redirect()
                    ->route('admin.users.edit', $user)
                    ->with('info','Roles are assigned correctly!');
    }    
}
...
```

### Models

```php
...
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
...
```

### Routes

```php
...
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

//Adding prefix in RouteServiceProvider to 'admin'
Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');

Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->except('show')->names('admin.posts');
...
```

### Requests
```php
...
class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // if ($this->user_id == auth()->user()->id) {
        //     return true;
        // }else{
        //     return false;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $post = $this->route()->parameter('post');

        $rules = [
            'title'         =>      'required',
            'slug'          =>      'required|unique:posts',
            'status'        =>      'required|in:1,2',
            'file'          =>      'image'
        ];

        if ($post) {
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id'       =>      'required',
                'tags'              =>      'required',
                'excerpt'           =>      'required',
                'body'              =>      'required'
            ]);
        }

        return $rules;
    }
}

...
```

### Factory
```php
...
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence();
        return [
            'title'         =>      $title,
            'slug'          =>      Str::slug($title),
            'excerpt'       =>      $this->faker->text(250),
            'body'          =>      $this->faker->text(2000),
            'status'        =>      $this->faker->randomElement([1,2]),
            'category_id'   =>      Category::all()->random()->id,
            'user_id'       =>      User::all()->random()->id,
        ];
    }
}

...
```

### Seeders
```php
...
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(300)->create();

        foreach ($posts as $post) {
            Image::factory(1)->create([
                'imageable_id'  =>  $post->id,
                'imageable_type'=>  Post::class,
            ]);

            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }
    }
}
...
```

### Components

```php
...
class PostsIndex extends Component
{

    use WithPagination;

    public $search;//$search='Test'

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
                        ->where('title','LIKE','%' . $this->search . '%')
                        ->latest('id')
                        ->paginate(7);
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
...
```

### Views

```php
...
@extends('adminlte::page')

@section('title', 'Create Post')

@section('content_header')
<h1>Create Post</h1>
@stop

    @section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.posts.store','autocomplete'=>'off','files'=>true]) !!}
            {{-- Config user_id with user authenticated from PostObserver--}}
            
            @include('admin.posts.partials.form')

            {!! Form::submit('CREATE POST', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @stop

        @section('css')
        <style>
            .image-wrapper {
                position: relative;
                padding-bottom: 56.25%;
            }

            .image-wrapper img {
                position: absolute;
                object-fit: cover;
                width: 100%;
                height: 100%;
            }

        </style>
        @stop

            @section('js')
            <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
            <script
                src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}">
            </script>
            <script>
                //TODO:Config Slugged
                $(document).ready(function () {
                    $('#title').stringToSlug({
                        setEvents: 'keyup keydown blur',
                        getPut: '#slug',
                        space: '-'
                    })
                })

                //TODO:Config CKEditor to excerpt and body
                ClassicEditor
                    .create(document.querySelector('#excerpt'))
                    .catch(error => {
                        console.error(error);
                    });
                ClassicEditor
                    .create(document.querySelector('#body'))
                    .catch(error => {
                        console.error(error);
                    });

                //TODO:Changed Image PRE-Visualization from Form Post
                document.getElementById('file').addEventListener('change', changeImagePicture);

                function changeImagePicture(e) {
                    var file = e.target.files[0];
                    var reader = new FileReader();
                    reader.onload = (ev) => {
                        document.getElementById('picture').setAttribute('src', ev.target.result);
                    }
                    reader.readAsDataURL(file);
                }

            </script>
            @stop
...
```

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/DanielArturoAlejoAlvarez/Blog-Advanced-With-Laravel10-TailwindCSS-And-AdminLTE3. This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [Contributor Covenant](http://contributor-covenant.org) code of conduct.

## License

The gem is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).

```

```