# **INIZIALIZZAZIONE PROGETTO**

- ### CREAZIONE PROGETTO LARAVEL

	* #### Terminale:
		```
    composer create-project --prefer-dist laravel/laravel:^7.0 REPO
    ```

- ### UTILIZZO LOCAL-HOST PERSONALE
	* #### Terminale:
  ```
		  php artisan serve
  ```

- ### AGGIORNAMENTO SCSS
	* #### File *package.json*:
	  ```
	  "laravel-mix": "^6.0.13"
	  ```
	* #### Terminale:
  ```
	npm install

	npx mix
  ```

- ### INSTALLAZIONE BOOTSTRAP
	* #### Terminale:
	  ```
	    composer require laravel/ui:^2.4
	    php artisan ui bootstrap --auth
	    npm install
	  ```
		* il comando ***--auth*** crea dei layouts per le aree d'accesso.

- ### INSTALLAZIONE FONTAWESOME
	* #### Terminale:
  ```
		npm install --save-dev @fortawesome/fontawesome-free
  ```
	* #### File *app.scss*
  ```php
		@import '~@fortawesome/fontawesome-free/css/all.min.css';
  ```

# **LARAVEL + DATABASE**

- ### MODIFICA DATABASE DA FILE *.elm*

	```
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=nome_database
	DB_USERNAME=root
	DB_PASSWORD=root
	```

- ### VERIFICA COLLEGAMENTO DATABASE
	* #### Terminale:
  ```
		  php artisan tinker

		  DB::Connection()->getPdo()
  ```

- ### CREAZIONE TABELLA TRAMITE *MIGRATION*
Il nome della tabella-database (es. ___items___ ) deve essere plurale.
	* #### Terminale:
  ```
  php artisan make:migration create_items
  ```

- ### AGGIUNTA COLONNE NELLA TABELLA CREATA
  * #### Locazione: *database/migrations*
    ```php
	public function up() {
		$table->string('content', 255);
	}
    ```

- ### ESPORTAZIONE TABELLE NEL DB
	* #### Terminale:
  	```
  php artisan migrate
  	```

- ### AGGIUNTA / MODIFICA COLONNA IN TABELLA ESISTENTE
(*Esempio colonna "type"*)
	* #### Terminale:
    ```
	php artisan make:migration add_type_to_items_table --table=items

    ```
	* #### File (*database/migrations*):
		**public function up( )**
    ```php
      $table->string('type')->after('specific_column');
    ```
		**public function down( )**
    ```php
      $table->dropColumn('type');
    ```
	* #### Terminale:
    ```
		php artisan migrate
    ```

- ### CREAZIONE *MODEL* COLLEGATO ALLA TABELLA
Il model dovrà essere al singolare della tabella a cui si riferisce
	* #### Terminale:
    ```
		repo>
			php artisan make:model Item
    ```
	* #### **Combo** (Creazione Model + Tabella associata)
    ```
		repo>
			php artisan make:model Item --Migration
    ```
	 Locazione: *app/Item.php*


- ### POPOLAZIONE CLASSE DEL MODEL
  * #### File: *app/Item.php*
  Da scrivere se il nome tabella non è già plurale
  ```
	protected $table = 'nometabella';
  ```
	Proprietà-colonne tabella ( *fillable* )
  ```
	protected $fillable = [
    'content',
    'content2'
  ];
  ```

- ### CREAZIONE *CONTROLLER*
	* #### Terminale:
    ```
		  php artisan make:controller ItemController
    ```

# **CRUD**

- ### CREAZIONE *CONTROLLER* ___CRUD___
	* #### Terminale:
    ```
		repo>
		  php artisan make:controller --resource ItemController
    ```

- ### RICHIAMO CRUD NELLE ROTTE
* #### Area pubblica
  ```php
	Route::resources('uri' , 'ItemController');
		// oppure
	Route::resources('uri' , ItemController::class);
  ```
* #### Area privata (in autenticazione user)
  ```php
  Route::prefix('admin')
  ->namespace('Admin')
  ->middleware('auth')
  ->group(function () {
      Route::resource('uri', ItemController);
  });
  ```

- ### CONTROLLER _CRUD_
* #### app/Http/Controllers/ItemController.php

	* **Collegamento col Model**
	  ```php
		use App\Item;
	  ```
	* **Index**
	```php
	public function index()
	{
		$items = Item::all();
		return view('items.index', compact('items'));
	}
	```
	* **Show**
	```php
	public function show(Item $item)
	{
		return view('items.show', compact('item'));
	}
	```
	* **Create**
	```php
	public function create()
	{
		return view('items.create');
	}
	```
	* **Store**
	```php
	public function store(Request $request)
	{
		$this->isValid($request);

		$data = $request->all();
		$item = new Item();
		$item->fill($data);
		$item->save();

		return redirect()->route('items.index');
	}
	```
	* **Edit**
	```php
	public function show(Item $item)
	{
		return view('items/edit', compact('item'));
	}
	```
	* **Update**
	```php
	public function update(Request $request, Item $item)
	{
		$this->isValid($request);

		$data = $request->all();
		$item->fill($data);
		$item->update();

		return redirect()->route('items.index');
	}
	```
	* **Destroy**
	```php
	public function destroy(Item $item)
	{
		$item->delete();
		return redirect()->route('items.index');
	}
	```
	* **Validation**
	```php
	public function isValid($list)
	{
		$list->validate([
		'item' => 'required|numeric|between:0,99.99',
		]);
	}
	```

- ### FILTRO CONTENUTI TABELLA DA "CONTROLLER"
  ```php
	$filtrato = Item::where('type', =, 'book')
	->orderBy('type', 'desc');
	->limit(1);
	->get();
	```

# **UPLOAD FILES**

- ### INSERIMENTO INPUT-UPLOAD NELLA FORM

	* #### Form:
	`enctype="multipart/form-data"`
		```php
		<input type="file" name="picture" class="form-control" id="picture">
    ```
- ### ABILITAZIONE (DECOMMENTAZIONE) FILE INFO IN _MAMP_

	* MAMP/bin/php/php7.4.1/php.ini:
		```
		extension=fileinfo
    ```

- ### INSERIMENTO INPUT-UPLOAD NELLA FORM

	* #### Controller (_update_ o _store_):
		```php
        $path = $request->file('image')->store('images');

    ```
		Lo store _images_ si troverà all'interno della cartella _storage/app_.


- ### GENERAZIONE SYM-LINK (LINK SIMBOLICO)
* #### Config/filesystems.php:
	```php
	public_path('images') => storage_path('app/images'),

	```
	Modifica dell'array _links_ per coincidere il nome del **symlink** con quello della cartella in *storage/app*

	* #### Terminale:
		```
        php artisan storage:link

    ```


# **FORMS**

- ### CREATE / EDIT
	```php
		@php
		if ($edit) {
		  $method = 'PATCH';
		  $url = route('posts.update', ['post' => $item->id]);
		  $submit = 'Edit';
		} else {
		  $method = 'POST';
		  $url = route('posts.store');
		  $submit = 'Create';
		}
		@endphp

		<form action="{{ $url }}" method="post" enctype="multipart/form-data">
		  @csrf
		  @method( $method )

		  <div class="form-group">
		      <label for="name">Name</label>
		      <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
		      type="text" name="name" value="{{ isset($item) ? $item->name : '' }}">
		      <div class="invalid-feedback">
		          {{ $errors->first('name') }}
		      </div>
		  </div>

		  <button type="submit" class="btn btn-primary">
		      {{ $submit }} Post
		  </button>
		</form>
	```

- ### INSERIMENTO MODALE PER CANCELLAZIONE

	```php
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete{{$item->id}}">
			Delete item
		</button>
		<!-- Modal -->
		<div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						Do you want delete this item?
					</div>
					<div class="modal-footer">
						<form method="post" action="{{route('items.destroy', compact('item'))}}">
							@csrf
							@method('DELETE')
							<input type="submit" class="btn btn-primary" name="Yes" value="Yes">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	```




- ### COLLEGAMENTI "CRUD" IN PAGINA WEB
```php
	<a href="{{ route('items.show') }}">
	<a href="{{route('items.show', $item->id)}}">
	<a href="{{route('items.show', compact('item'))}}">
	```
