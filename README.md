# Flash
Simple flash messaging for Laravel.

# Installation

You can install this package by loading it from it's Github repository. Just add the following lines to your composer file.

``` 
{
	...
	"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/jbpapp/flash"
        }
    ],
    "require": {
		"jbpapp/flash": "^1.0.0"
	}
    ...
}
```  

# Usage

From now on you can create flash messages anywhere in your code using the ``` flash ``` helper function.

```php
public function store()

{
	// app logic here
	// ...

	// Flash a message to the next response
	flash('This is a default message.', 'The title is optional');

	// Redirect the user
	return redirect()->route('admin.users.index');
}
```

Success message:

```php
public function store()

{
	// app logic here
	// ...

	// Flash a message to the next response
	flash()->success('Hooray, we just created a new user profile.', 'Success (still optional)');

	// Redirect the user
	return redirect()->route('admin.users.index');
}
```

The error message is very similar, just swap the ``` success ``` method to ``` error ```.

```php
public function store()

{
	// app logic here
	// ...

	// Flash a message to the next response
	flash()->errror(
		'We are sorry, but we could not create the profile for the new user.',
		'Oh crap, something went wrong (still optional)'
	);

	// Redirect the user
	return redirect()->route('admin.users.index');
}
```

# Displaying the messages

The following two snippets are just some examples how to display the messages in your application.  

### Bootstrap and Blade

Create a partial based on this snippet:

```html
@if (session()->has('flash_message'))
	<div class="alert alert-{{ session()->get('flash_message.level') }} alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  			<span aria-hidden="true">&times;</span>
  		</button>
  		{!! sesssion()->get('flash_message.message') !!}
  	</div>
@endif
```

Than include this partial anywhere in your view files.

```html
	@include('partials.flash')
```

### Sweetalert and Blade

Create a partial based on this snippet:

```html
@if (session()->has('flash_message'))
    <script>
        swal({
            title: "{!! session()->get('flash_message.title') !!}",
            text: "{!! session()->get('flash_message.message') !!}",
            type: "{!! session()->get('flash_message.level') !!}",
            timer: 2000
        });
    </script>
@endif
```

Again, include this partial whenever you need it.

```html
	@include('partials.flash')
```

Of course, you have to pull in the Sweetalert js and css files to make it work properly.
