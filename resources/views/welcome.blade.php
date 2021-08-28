<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card mt-2">
                        <div class="card-header">
                            New Tournament
                        </div>
                        <div class="card-body">
                          <form action="{{ route('submit-turnament') }}" method="POST">
                              @csrf

                              <div class="form-group">
                                  <label for="">Full Name</label>
                                  <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                                    @error('full_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                      @error('email')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="address" class="form-control" cols="5" rows="3"></textarea>
                                      @error('address')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>



                          </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    </body>
</html>
